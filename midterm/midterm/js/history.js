// JavaScript File
/* global $ */
$(document).ready(function() {

    // call to display one user on the match site 
    $.ajax({
        type: "GET",
        url: "api/matchHistory.php",
        dataType: "json",
        success: function(data) {
            console.log(data);
            // data.forEach(function(prod) {
            //     var i = 0; 
            $("#username0").html(data[0].username);
            if (data[0].answer_type_id == 1) {
                $("#status0").html("Like");
            }
            else if (data[0].answer_type_id == 2) {
                $("#status0").html("Dislike");
            }
            else {
                $("#status0").html("Neeh");
            }
            $("#timestamp0").html(data[0].answer_timestamp);




            $("#username1").html(data[20].username);
             if (data[20].answer_type_id == 1) {
                $("#status1").html("Like");
            }
            else if (data[20].answer_type_id == 2) {
                $("#status1").html("Dislike");
            }
            else {
                $("#status1").html("Neeh");
            }
            $("#timestamp1").html(data[20].answer_timestamp);
            
            

            $("#username2").html(data[10].username);
             if (data[10].answer_type_id == 1) {
                $("#status2").html("Like");
            }
            else if (data[10].answer_type_id == 2) {
                $("#status2").html("Dislike");
            }
            else {
                $("#status2").html("Neeh");
            }
            $("#timestamp2").html(data[10].answer_timestamp);
            //     i++;
            // });
            $("#details0").click(function() {
                $('#purchaseHistoryModal').modal("show");
                if (data.length != 0) {
                    $("#history").html("");
                    $("#history").append("About @ " + data[0].username + "<br />" + "<br />");
                    $("#history").append(data[0].about_me + "<br />");
                }
                else {
                    $("#history").append("Product not found!");
                }
            });
            $("#details1").click(function() {
                $('#purchaseHistoryModal').modal("show");
                if (data.length != 0) {
                    $("#history").html("");
                    $("#history").append("About @ " + data[20].username + "<br />" + "<br />");
                    $("#history").append(data[20].about_me + "<br />");
                }
                else {
                    $("#history").append("Product not found!");
                }
            });
            $("#details2").click(function() {
                $('#purchaseHistoryModal').modal("show");
                if (data.length != 0) {
                    $("#history").html("");
                    $("#history").append("About @ " + data[10].username + "<br />" + "<br />");
                    $("#history").append(data[10].about_me + "<br />");
                }
                else {
                    $("#history").append("Product not found!");
                }
            });
        }
    });

});
