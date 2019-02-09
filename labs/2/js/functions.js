// jQuery Functions 
/* global $ */
$(document).ready(function() {
    $('.title').css("font-family", "Times New Roman");
    $('div').css("font-family", "Times New Roman");
    
    $("label").mouseout(function(){
        $("label").css("color", "black");
    });
    $("input").mouseover(function(){
        $("input.guessSubmit").css({
            'backgroundColor' : 'pink',
            'color' : 'white'
        });
    });
    $("input").mouseout(function(){
        $("input.guessSubmit").css({
            'backgroundColor' : '',
            'color' : 'black'
        });
    });
    $('button').mouseover(function(){
        $('button#reset').css({
            'backgroundColor' : 'pink',
            'color' : 'white'
        });
    });
});

// JavaScript File
var randomNumber = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastRes = document.querySelector('#lastRes');
var lowOrHi = document.querySelector('#lowOrHi');
var message = document.querySelector('#message');

var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

var guessCount = 1;
var won = 0;
var lost = 0;

var resetButton = document.querySelector('#reset');
resetButton.style.display = 'none';
guessField.focus();

function checkGuess() {
    var userGuess = Number(guessField.value);
    if (guessCount === 1) {
        guesses.innerHTML = 'Previous Guesses: ';
    }
    guesses.innerHTML += userGuess + ' ';

    if (userGuess === randomNumber) {
        lastRes.innerHTML = 'Congratulations! You got it right!';
        won++;
        lastRes.style.backgroundColor = '#7fff7f';
        lowOrHi.innerHTML = '';
        setGameOver();
        score();
    }
    else if (guessCount === 7) {
        lastRes.innerHTML = 'Sorry, you lost!';
        lost++;
        setGameOver();
        score();
    }
    else if (userGuess > 99) {
        lastRes.innerHTML = 'Error! The number entered is higher than 99!';
    }
    else if (isNaN(userGuess)) {
        lastRes.innerHTML = 'Error! Pleaser enter a number!';
        guessCount--;
    }
    else {
        lastRes.innerHTML = 'Wrong!';
        lastRes.style.backgroundColor = '#ff554c';
        if (userGuess < randomNumber) {
            lowOrHi.innerHTML = 'Last guess was too low!';
        }
        else if (userGuess > randomNumber) {
            lowOrHi.innerHTML = 'Last guess was too high!';
        }
    }
    guessCount++;
    guessField.value = '';
    guessField.focus();
}

guessSubmit.addEventListener('click', checkGuess);

function setGameOver() {
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
}

function resetGame() {
    guessCount = 1;

    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0; i < resetParas.length; i++) {
        resetParas[i].textContent = '';
    }

    resetButton.style.display = 'none';

    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();

    lastRes.style.backgroundColor = 'white';

    randomNumber = Math.floor(Math.random() * 99) + 1;
}

function score() {
    message.innerHTML = 'You have won ' + won + " time(s) and lost " + lost + " time(s)!";
}