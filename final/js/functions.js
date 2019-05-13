// JavaScript File
/* global $ */
$(document).ready(function() {
    // Functionality to add slots to the dahsboard table 
    $("#modalAddSlot").on("click", function() {
        // START DATE 
        var day, month, year;
        var date = new Date($('[name=datepicker]').val());

        // START TIME 
        var startTime = $("#startTime option:selected").val();
        var time_start = startTime.split(':', '2');

        var hour_start = time_start[0];
        var min_start = time_start[1];

        date.setHours(hour_start);
        date.setMinutes(min_start);

        var dateString = date.toISOString().replace('T', " ");
        var mysqlDateTimeStart = dateString.substring(0, dateString.indexOf('.'));

        // END DATE
        var dayE, monthE, yearE;
        var dateE = new Date($('[name=datepickerEnd]').val());

        // END TIME 
        var endTime = $("#endTime option:selected").val();
        var time_end = endTime.split(':', '2');

        var hour_end = time_end[0];
        var min_end = time_end[1];

        dateE.setHours(hour_end);
        dateE.setMinutes(min_end);

        var dateStringEnd = dateE.toISOString().replace('T', " ");
        var mysqlDateTimeEnd = dateStringEnd.substring(0, dateStringEnd.indexOf('.'));

        $.ajax({
            type: "POST",
            url: "php/addSlot.php",
            dataType: "json",
            data: {
                'startDate': mysqlDateTimeStart,
                'endDate': mysqlDateTimeEnd
            },
            success: function(data, status) {
                console.log(data);
            },
            error: function() {
                alert("Fail!");
            }
        });
        $("#myModal").modal('hide');
        location.reload();
    });


    // Functionality to display the slot on the dashboard page 
    $.ajax({
        type: "POST",
        url: "php/displaySlots.php",
        dataType: "json",
        data: {},
        success: function(data, status) {
            console.log(data);

            for (var d in data) {
                var newRow = $("<tr>");
                var cols = "";

                var hours = Math.floor(data[d].duration / 60);
                var mins = data[d].duration % 60;

                cols += '<td><div class="date' + d + '"/div>' + new Date(data[d].start_time + " UTC").toLocaleDateString() + '</td>';
                cols += '<td><div class="startTime' + d + '"/div>' + new Date(data[d].start_time + " UTC").toLocaleTimeString() + '</td>';
                cols += '<td><div class="duration' + d + '"/div>' + hours + ' hour ' + mins + ' min' + '</td>';
                if (data[d].booked_by_flag == '1') {
                    cols += '<td><div class="booked' + d + '"/div>' + 'Not Booked' + '</td>';
                }
                else {
                    //dont know the person until I have the log in working... 
                    cols += '<td><div class="booked' + d + '"/div>' + 'Some Person' + '</td>';
                }
                cols += '<td><button type="button" class="btn btn-info" class="btn btn"> Details </button> <button type="button" class="btn btn-danger" id="' + data[d].id + '" data-toggle="modal" data-target="#myModalDelete" data-backdrop="static" data-keyboard="false">Delete </button></td>';

                newRow.append(cols);
                $(".table").append(newRow);
            }
            // Deleting the time slots function 
            $("td button").on("click", function(event) {
                var id = event.target.id;
                $.ajax({
                    type: "POST",
                    url: "php/getSelectedSlot.php",
                    dataType: "json",
                    data: {
                        'id': id
                    },
                    success: function(data, status) {
                        console.log(data);
                        $(".modal-body").append("<div> Start Time: " + new Date(data.start_time + " UTC").toLocaleString() + "</div>");
                        // $(".modal-body").append("<div> <br></div>");
                        $(".modal-body").append("<div> Start Time: " + new Date(data.end_time + " UTC").toLocaleString() + "</div>");
                        // $(".modal-body").append("<div> <br></div>");
                        $(".modal-body").append("<div class='deleteInfo'> Are you sure you want to remove the time slot? <br> This can not be undone.</div>");

                        // when yes delete it in the modal is click --> ajax call to delete from database
                        $("#deleteSlot").on("click", function() {
                            $.ajax({
                                type: "POST",
                                url: "php/deleteSlot.php",
                                dataType: "json",
                                data: {
                                    'id': id
                                },
                                success: function(data, status) {
                                    console.log(data);
                                },
                                error: function() {
                                    alert("Fail!");
                                }
                            });
                            $("#myModalDelete").modal('hide');
                            location.reload();
                        });
                    },
                    error: function() {
                        alert("Fail!");
                    }
                });
            });
            $("#cancelDelete").on("click", function() {
                $(".modal-body").html('');
            });

        },
        error: function() {
            alert("Fail!");
        }
    });

    $("#btnToAvailApp").on("click", function() {
        window.location = 'availableApp.php';
    });
     $("#linkToRubric").on("click", function() {
        window.location = 'rubric.html';
    });

    // $("#calIcon").on("click", function() {
    //     var date = new Date($('[name=datepickerAvailable]').val());
    //     var dateString = date.toISOString().replace('T', " ");
    //     var mysqlDateTimeStart = dateString.substring(0, dateString.indexOf('.'));
        
    //     $.ajax({
    //         type: "POST",
    //         url: "php/displayAvailableSlotsByDate.php",
    //         dataType: "json",
    //         data: {
    //             'date': mysqlDateTimeStart
    //         },
    //         success: function(data, status) {
    //             console.log(data);

    //             for (var d in data) {
    //                 var newRow = $("<tr>");
    //                 var cols = "";

    //                 var hours = Math.floor(data[d].duration / 60);
    //                 var mins = data[d].duration % 60;

    //                 cols += '<td><div class="date' + d + '"/div>' + new Date(data[d].start_time + " UTC").toLocaleDateString() + '</td>';
    //                 cols += '<td><div class="startTime' + d + '"/div>' + new Date(data[d].start_time + " UTC").toLocaleTimeString() + '</td>';
    //                 cols += '<td><div class="duration' + d + '"/div>' + hours + ' hour ' + mins + ' min' + '</td>';
    //                 if (data[d].booked_by_flag == '1') {
    //                     cols += '<td><div class="booked' + d + '"/div>' + 'Not Booked' + '</td>';
    //                 }
    //                 else {
    //                     //dont know the person until I have the log in working... 
    //                     cols += '<td><div class="booked' + d + '"/div>' + 'Some Person' + '</td>';
    //                 }
    //                 cols += '<td><button type="button" class="btn btn-info" class="btn btn"> Details </button> <button type="button" class="btn btn-danger" id="' + data[d].id + '" data-toggle="modal" data-target="#myModalDelete" data-backdrop="static" data-keyboard="false">Delete </button></td>';

    //                 newRow.append(cols);
    //                 $(".table").append(newRow);
    //             }
    //         }

    //     });
    // });

});
