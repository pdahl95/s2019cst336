// JavaScript File
$(document).ready(function() {
    $(".checker").mouseover(function() {
        $(".checker").css({
            'backgroundColor': 'pink',
            'color': 'white'
        });
    });
    $(".checker").mouseout(function() {
        $(".checker").css({
            'backgroundColor': '',
            'color': 'black'
        });
    });

    $(".checker").one("click", function(e) {
        // Time Frame 
        var selectedRadio = $("input[name='timeframe']:checked");
        var selectedValue = selectedRadio.val();
        var selectedRadioId = selectedRadio.attr("id");
        var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

        if (selectedValue === "1") {
            $("#timeRes").html("Wow! " + selectedLabelHtml + ". Newbee, that's great! Welcome!").css("color", "pink");
        }
        else if (selectedValue === "2") {
            $("#timeRes").html(selectedLabelHtml + " that is awesome! Hope you like it!").css("color", "pink");
        }
        else if (selectedValue === "3") {
            $("#timeRes").html(selectedLabelHtml + ". Good job! Are you ready for new challenge? ").css("color", "pink");
        }

        // Topic 
        var isChecked = $("input[name='topic']:checked").prop('checked');

        if (isChecked === true) {
            $("#topicRes").html("That is good for you!").css("color", "pink");
        }
        else {
            $("#topicRes").html("Mhm, do you not like any of them? ").css("color", "pink");
        }

        var firstName = $('input[name=firstname]').val();
        $("#feedbackRes").html("Hi, " + firstName + " thank you for sharing! ").css("color", "pink");

    });
});
