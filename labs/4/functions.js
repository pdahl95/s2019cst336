// JavaScript File
$(".btn").on("click", function() {
    $.ajax({
        type: "GET",
        url: "itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?",
        dataType: "json",
        data: {
            "zip": $("#zip").val()
        },
        success: function(data) {
            console.log(data);
            // Updating based on the zip code 
            $('.city').html(data.city);
            $('#lati').html(data.latitiude);
            $('#longi').html(data.longitude);

            // Zip Not found or is empty 
            zipValidation();

            // List of counties 


            // Invalid username message 
            invalidUsername();
        }
    });

});

function zipValidation() {
    // make sure zip input is not empty, if it is empty display a message next to it! 
    var checkZip = $('.zip').val();
    if (checkZip == '') {
        $('#errorZip').html("Zip Code not found!");
    }
}

function invalidUsername() {
    var notEmptyUserName = $('#userName').val();
    if (notEmptyUserName != '') {
        addUserName();
        $("#message").html("Username is available!").css("color", "green");
    }
    else {
        $("#message").html("Username is not available!").css("color", "red");

    }
}
function updateTextFromZip(data) { // function to update city, longitude and latitiude 
    // city 
    // $('.city').html(data.city);
}

Array.prototype.contains = function(obj) {
    var i = this.length;
    while (i--) {
        if (this[i] == obj) {
            return true;
        }
    }
    return false;
}

var usernamesArray = [];

function addUserName() {
    username = $('#userName').val();
    usernamesArray.push(username);
    console.log("Username: " + usernamesArray.join(", "));
    // must check if username is not already in the array
}


function getListOfCountiesBasedOnState() {

}

function userNameAvailable() {

}

function validateEqualPassword() {

}

// function getZipCodeFromApi() { // ajax call here for Zipcode 
//     $.ajax({
//         type: "GET",
//         url: "https://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?zip=93955",
//         dataType: "json",
//         data: {
//             // "zip": $("#zip").val()
//         },
//         success: function(data) {
//             console.log(data);
//             $('.city').html(data.city);

//         }
//     });
// }

