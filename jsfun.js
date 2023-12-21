// constants for game
// includinf photo , keyboard , words and litters 
const wordDisplay = document.querySelector(".word-display");
const guessesText = document.querySelector(".guesses-text b");
const keyboardDiv = document.querySelector(".keyboard");
const hangmanImage = document.querySelector(".hangman-box img");
const gameModal = document.querySelector(".game-modal");
const playAgainBtn = gameModal.querySelector("button");

// starting  game variables
//correctword , correct litter , wrong 
let currentWord, correctLetters, wrongGuessCount;
const maxGuesses = 6; // set max trys for 6
// resrt the game 
const resetGame = () => {
    // Ressetting game variables and UI elements
    correctLetters = [];
    // start with zero wrong answer 
    wrongGuessCount = 0;
    hangmanImage.src = "home pic Large.png";
    // to count the wrong count and display it in the screen 
    guessesText.innerText = `${wrongGuessCount} / ${maxGuesses}`;
    wordDisplay.innerHTML = currentWord.split("").map(() => `<li class="letter"></li>`).join("");
    keyboardDiv.querySelectorAll("button").forEach(btn => btn.disabled = false);
    gameModal.classList.remove("show");
}
// to get random word 
const getRandomWord = () => {
    // select the word with the hint 
    const { word, hint } = wordList[Math.floor(Math.random() * wordList.length)];
    // assign the word to current 
    currentWord = word; 
    // display the hint 
    document.querySelector(".hint-text b").innerText = hint;
    // reset the game 
    resetGame();
}
// game over message 
// when user inter coorect , image correct display with congrate message 
// if wronf false image shows with game over message 
const gameOver = (isVictory) => {
    // After game complete.. showing modal with relevant details
    const modalText = isVictory ? `You found the word:` : 'The correct word was:';
    gameModal.querySelector("img").src = isVictory ? 'correct.png' : 'false.png';
    gameModal.querySelector("h4").innerText = isVictory ? 'Congrats!' : 'Game Over!';
    gameModal.querySelector("p").innerHTML = `${modalText} <b>${currentWord}</b>`;
    gameModal.classList.add("show");
}

const initGame = (button, clickedLetter) => {
    // checck if the litter is in current word 
    if(currentWord.includes(clickedLetter)) {
        // to show the correct selections 
        [...currentWord].forEach((letter, index) => {
            if(letter === clickedLetter) {
                //push the litter to the dashes
                correctLetters.push(letter);
                wordDisplay.querySelectorAll("li")[index].innerText = letter;
                wordDisplay.querySelectorAll("li")[index].classList.add("guessed");
            }
        });
    } else {
        // if wronge litter , increase the wronge litter counter 
        wrongGuessCount++;
        hangmanImage.src = `home pic Large.png`;
    }
    // display the number of current wrong answers 
    button.disabled = true; 
    guessesText.innerText = `${wrongGuessCount} / ${maxGuesses}`;

    // call game over mwthod 
    if(wrongGuessCount === maxGuesses) return gameOver(false);
    if(correctLetters.length === currentWord.length) return gameOver(true);
}

// create the keyboard
// display each in button
// as string 
for (let i = 97; i <= 122; i++) {
    const button = document.createElement("button");
    button.innerText = String.fromCharCode(i);
    keyboardDiv.appendChild(button);
    button.addEventListener("click", (e) => initGame(e.target, String.fromCharCode(i)));
}
// to get random word 
getRandomWord();
playAgainBtn.addEventListener("click", getRandomWord);

