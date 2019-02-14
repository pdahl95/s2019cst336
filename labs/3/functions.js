// JavaScript File
var answerToQuestion1 = "2";
var answerToQuestion2 = "4";
var answerToQuestion3 = "5";
var answerToQuestion4 = "8";
var answerToQuestion5 = "10";
var answerToQuestion6 = "12";

var totalPoints = 100;
var guessCorrect = 0; 

$("button.checker").one("click", function(e) {
    // Don't need e.preventDefault() because we have <button type="button">
    // Question 1 
    var selectedRadio = $("input[name='choice1']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion1) {
        $("#result1").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        $("#result1").append('<img class="imageSize" src="img/correct.png">');
        guessCorrect++;
    }
    else {
        $("#result1").html(selectedLabelHtml + " is NOT correct").css("color", "red");
        $("#result1").append('<img class="imageSize" src="img/fail.png">');
    }

    // Question 2
    var selectedRadio = $("input[name='choice2']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion2) {
        $("#result2").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        guessCorrect++;
        $("#result2").append('<img class="imageSize" src="img/correct.png">');
    }
    else {
        $("#result2").html(selectedLabelHtml + " is NOT correct!").css("color", "red");
        $("#result2").append('<img class="imageSize" src="img/fail.png">');
    }
    
    // Question 3
    var selectedRadio = $("input[name='choice3']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion3) {
        $("#result3").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        guessCorrect++;
        $("#result3").append('<img class="imageSize" src="img/correct.png">');
    }
    else {
        $("#result3").html(selectedLabelHtml + " is NOT correct!").css("color", "red");
        $("#result3").append('<img class="imageSize" src="img/fail.png">');
    }
    
    // Question 4
    var selectedRadio = $("input[name='choice4']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion4) {
        $("#result4").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        guessCorrect++;
        $("#result4").append('<img class="imageSize" src="img/correct.png">');
    }
    else {
        $("#result4").html(selectedLabelHtml + " is NOT correct!").css("color", "red");
        $("#result4").append('<img class="imageSize" src="img/fail.png">');
    }
    // Question 5
    var selectedRadio = $("input[name='choice5']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion5) {
        $("#result5").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        guessCorrect++;
        $("#result5").append('<img class="imageSize" src="img/correct.png">');
    }
    else {
        $("#result5").html(selectedLabelHtml + " is NOT correct!").css("color", "red");
        $("#result5").append('<img class="imageSize" src="img/fail.png">');
    }
    // Question 6
    var selectedRadio = $("input[name='choice6']:checked");
    var selectedQuestionValue = selectedRadio.val();
    var selectedRadioId = selectedRadio.attr("id");
    var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();

    if (selectedQuestionValue === answerToQuestion6) {
        $("#result6").html(selectedLabelHtml + " is correct! Good Job!").css("color", "green");
        guessCorrect++;
        $("#result6").append('<img class="imageSize" src="img/correct.png">');
    }
    else {
        $("#result6").html(selectedLabelHtml + " is NOT correct!").css("color", "red");
        $("#result6").append('<img class="imageSize" src="img/fail.png">');
    }
    
    if(guessCorrect === 6){
        $('#totalScore').html("Total Score is 100%! " + guessCorrect + " out of 6 questions correct!");
    }else{
        $('#totalScore').html("Total Score: " + guessCorrect + " correct out of 6 questions!");
    }
    
    if(guessCorrect >= 5){
        $('#congrats').html("Congratulations! You score is higher than 90%!").css("color", "green");
    }
});
