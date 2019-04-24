// JavaScript File
/* global $ */
$(document).ready(function() {

    var flag = false;

    $("#viewFav").hide();

    // WHEN CLICKING THE SEARCH BUTTON
    $(".searchbtn").on("click", function() {
        $("#viewFav").show();
        // function call to the API 
        $.ajax({
            type: "GET",
            url: "https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&",
            dataType: "json",
            data: {
                'q': $('#inputSearch').val()
            },
            success: function(data) {
                // console.log(data); 
                // function to loop through and dynamically add the images and icons 
                $(".column").each(function(i) {
                    $(this).append("<img id='img" + i + "' src='" + data.hits[i]['webformatURL'] + "' width='408' height='250'/> ");
                    $(this).append("<img id='heart" + i + "' src='img/dilike.png'>");
                    $("#heart" + i).css({
                        'width': '50px',
                        'height': '50px'
                    });

                });
                console.log("start as false : " + flag);
                // function to get the ID of the clicked Image and change the icon to red
                $('.column').on("click", function() {
                    if (flag == false) {
                        var imageID = $(this).find('img');
                        var idForImage = imageID[1].id;

                        $("#" + idForImage).attr('src', 'img/like.png');

                        var imgID = $(this).find("img");
                        var imgURL = imgID[0].id;
                        // console.log(imgURL);
                        var srcImg = $("#" + imgURL).attr("src");
                        console.log(srcImg);

                        // AJAX CALL TO ADD IMAGES TO TABLE
                        $.ajax({
                            type: "GET",
                            url: "php/addLikes.php",
                            dataType: "json",
                            data: {
                                'src': srcImg
                            },
                            success: function(data, status) {
                                // console.log(data);
                                // alert("Image added to the Favorites!");
                            },
                            error: function() {
                                // alert("Fail!");
                            }
                        });
                        flag = true;
                        console.log("should be true " + flag);
                    }
                    else {
                        // FUNCTION TO REMOVE IMAGE FROM TABLE AND CHANGE ICON
                        // function to get the ID of the clicked Image and change the icon to white
                        // $('.column').on("click", function() {
                        var imageID = $(this).find('img');
                        var idForImage = imageID[1].id;

                        $("#" + idForImage).attr('src', 'img/dilike.png');

                        var imgID = $(this).find("img");
                        var imgURL = imgID[0].id;
                        // console.log(imgURL);
                        var srcImg = $("#" + imgURL).attr("src");
                        // console.log(srcImg);

                        // ajax call to remove the img to the table 
                        $.ajax({
                            type: "GET",
                            url: "php/removeLikes.php",
                            dataType: "json",
                            data: {
                                'src': srcImg
                            },
                            success: function(data, status) {
                                console.log(data);
                                // alert("Image removed from the Favorites!");
                            },
                            error: function() {
                                // alert("Fail!");
                            }
                        });
                        flag = false;
                        console.log("should be false : " + flag);
                    }

                });


                $("#viewFav").mouseover(function() {
                    $("#viewFav").css({
                        "color": "black",
                        "width": "180px",
                        "padding": "10px",
                        "background-color": '#ADD8E6',
                        "border-radius": '5px',
                        "font-height": "bold"
                    });
                });
                $("#viewFav").mouseout(function() {
                    $("#viewFav").css({
                        "color": "black",
                        "background-color": 'white',
                        "font-height": "normal"
                    });
                });

                // WHEN CLIKCING THE VIEW FAVORITES
                $("#viewFav").on("click", function() {
                    // links of the images are displayed
                    // ajax call to get the links 
                    // when clicking the link, the image should be displayed 
                    $.ajax({
                        type: "GET",
                        url: "php/getAll.php",
                        dataType: "json",
                        data: {

                        },
                        success: function(data, status) {
                            console.log(data);
                            $("#results").html("<h3> Here are your favorite images: </h3>");
                            $("#results").append("<h6> Click the link to see the image </h6>");
                            // data.each(function(key) {
                            for (var key in data) {
                                $("#results").append("<a href='" + data[key]['img_url'] + "'> Image" + "<br>");
                            }
                            // });
                            // alert("Success!");
                        },
                        error: function() {
                            // alert("Fail!");
                        }
                    });

                });

            }
        });

    });


});
