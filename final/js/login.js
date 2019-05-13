// JavaScript File
/* global $ */
$(document).ready(function() {
    // login button starts 
    $("#loginBtn").on("click", function() {
        $.ajax({
            type: "POST",
            url: "php/addUser.php",
            dataType: "json",
            data: {
                'email': $('[name=email]').val(),
                'password': $('[name=password').val()
            },
            success: function(data, status) {
                console.log(data);
            },
            error: function() {
                alert("Fail!");
            }
        });
    });
    // login button ends 


});
