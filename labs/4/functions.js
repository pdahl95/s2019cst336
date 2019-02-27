// JavaScript File
/* global $ */

$(document).ready(function() {
    $("#state").keydown(function(){
       addListOfCounties(); 
    });
    $("#state").focusout(function(){
        addListOfCounties(); 
    });
    $("#zip").focusout(function(){
        updateFromZipCode(); 
    });
    $(".btn").on("click", function() {
        checkIfUserNameIsAvailable();
        validateEqualPassword();

    });

    function updateFromZipCode() {
        var zipValue = $('#zip').val();
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

            zipcodeRequest.fail(function(jqXHR, textStatus) {
                $('#errorZip').html("We could not find your zip code (" + textStatus + ").").css("color", "red");
            });
        }
    }

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

    function checkIfUserNameIsAvailable() {
        var usernamesArray = ["pdahl95", "isThisAvailable", "Jolleen89", "Jason", "Rosario"];
        var username = $('#userName').val();
        for (var i = 0; i < usernamesArray.length; i++) {
            if (username != '') {
                if (usernamesArray.includes(username)) {
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
