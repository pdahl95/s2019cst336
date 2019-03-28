// JavaScript File
/* global $ */
$(document).ready(function() {

    // call to display one user on the match site 
    $.ajax({
        type: "GET",
        url: "api/getUser.php",
        dataType: "json",
        success: function(data) {
            console.log(data);

            $("#userNameTile").html(data.username);
            $("#aboutTheUser").html(data.about_me);
            $("#imageOfUser").html("<img src='" + data.picture_url + "' width='auto' /> <br />");

        }
    });


    $("#dislike").click(function() {
        $.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data) {
                console.log(data);

                $("#userNameTile").html(data.username);
                $("#aboutTheUser").html(data.about_me);
                $("#imageOfUser").html("<img src='" + data.picture_url + "' width='auto' /> <br />");

            }
        });
    });
    $("#like").click(function() {
        $.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data) {
                console.log(data);

                $("#userNameTile").html(data.username);
                $("#aboutTheUser").html(data.about_me);
                $("#imageOfUser").html("<img src='" + data.picture_url + "' width='auto' /> <br />");

            }
        });
    });
     $("#neh").click(function() {
        $.ajax({
            type: "GET",
            url: "api/getUser.php",
            dataType: "json",
            success: function(data) {
                console.log(data);

                $("#userNameTile").html(data.username);
                $("#aboutTheUser").html(data.about_me);
                $("#imageOfUser").html("<img src='" + data.picture_url + "' width='auto' /> <br />");

            }
        });
    });

});
