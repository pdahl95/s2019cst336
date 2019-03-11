// JavaScript File
// NB! This javascript file is making two ajax calls to two different PHP files!
/* global $ */

$(document).ready(function() {
    // code to make sure the form is updated before pressing the button
    $("#state").keydown(function() {
        addListOfCounties();
    });
    $("#state").focusout(function() {
        addListOfCounties();
    });
    $("#zip").focusout(function() {
        updateFromZipCode();
    });
    $('#passWord').on("click", function() {
        generatePasswordPHP();
    });
    $('#checkToggle').click(function(){
       showPassword(); 
    });

    // calling the function here which I need to be executed when the button is click and only then 
    $(".btn").on("click", function() {
        validateEqualPassword();
        validateUsernamePHP();
        //calling the function to check the username and password
        // providing the value of the current password and username to be check in the php file 
        passwordContainsUsername($("#userName").val(),$("#passWord").val());
    });

    // function to PHP to be able to validate username 
    function validateUsernamePHP() {
        // getting the array from the PHP file named lab5.php
        $.ajax({
            url: 'php/lab5.php',
            type: 'POST',
            dataType: "json",
            data: {},
            success: function(data) {
                console.log(data);

                // logic to check if the current username is in the array we got from the PHP file 
                var username = $('#userName').val();
                for (var i = 0; i < data.length; i++) {
                    if (username != '') {
                        if (data.includes(username)) {
                            $("#message").html("Username is not available!").css({
                                "color": "red",
                                "font-size": "22px"
                            });
                        }
                        else {
                            $("#message").html("Username is available!").css({
                                "color": "green",
                                "font-size": "22px"
                            });
                        }
                    }
                }
            }
        });

    }

// calling the second PHP file to access the auto generated password and adding them to the html input box
    function generatePasswordPHP() {
        $.ajax({
            url: 'php/generatedpassword.php',
            type: 'POST',
            dataType: "json",
            data: {},
            success: function(data) {
                console.log(data);
                var suggestion;
                // using a confirm popup box to show and confirm the password
                if (confirm("Want to use this suggested password " + data)) {
                    suggestion = data;
                }
                else {
                    suggestion = "";
                }
                // if the user confirms the password will be update with the new suggested password
                $("#passWord").val(suggestion);
                $("#retypePassword").val(suggestion);
            }
        });
    }

    // Function to toggle between password type or tezxt type so the user can see the password one more time
    function showPassword() {
        var showPass = document.getElementById("passWord");
        if (showPass.type === "password") {
            showPass.type = "text";
        }
        else {
            showPass.type = "password";
        }
    }
    
    //function to call the checkusername php file to see if password contains the username 
    function passwordContainsUsername(username,password){
         $.ajax({
            url: 'php/checkusername.php',
            type: 'POST',
            dataType: "json",
            data: {"username":username,"password":password},
            success: function(data) {
                console.log(data);
                $("#errorWithPassword").html(data).css("color", "red");
            }
        });
    }

    // function to update the text on the html from the zip code provided 
    function updateFromZipCode() {
        var zipValue = $('#zip').val();
        // if the zipcode is less than 5 characters it will show as not a valid Zip Code
        if (zipValue == "" || zipValue.length < 5) {
            // alert('enter a zip code!');
            $('#errorZip').html("Zip Code not found!").css({
                "color": "red",
                "font-size": "22px"
            });
        }
        else {
            //process ajax request
            var zipcodeRequest = $.ajax({
                type: "GET",
                url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                dataType: "json",
                data: {
                    "zip": $("#zip").val()
                }
            });

            zipcodeRequest.done(function(data) {
                $('.city').html(data.city);
                $('#lati').html(data.latitude);
                $('#longi').html(data.longitude);
            });
            
            
            // error message if the ajax call fails! 
            zipcodeRequest.fail(function(jqXHR, textStatus) {
                $('#errorZip').html("We could not find your zip code (" + textStatus + ").").css("color", "red");
            });
        }
    }

    // function to add the counties from the state to the dropdown 
    function addListOfCounties() {
        $.ajax({
            type: "GET",
            url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
            dataType: "json",
            data: {
                "state": $("#state").val()
            },
            success: function(data) {
                // console.log(data);
                var res = '';
                $.each(data, function(v) {
                    var val = data[v].county;
                    res += "<option value='" + val + "'>" + val + "</option>";
                });
                $('#selectList').html(res);
            }
        });
    }

    // function to make sure password and the retype is the same
    function validateEqualPassword() {
        var password = $('#passWord').val();
        var retypePassword = $('#retypePassword').val();

        if (password != retypePassword) {
            $("#passwordValidation").html("Password does to match! Please retype password!").css({
                "color": "red",
                "font-size": "18px"
            });
        }
    }

});
