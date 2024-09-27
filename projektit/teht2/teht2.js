let secretNumber;
let totalGames = 0;
let totalGuesses = 0;
 
function generateSecretNumber() {
    return Math.floor(Math.random() * 10) + 1;
}
 
function startNewGame() {
    secretNumber = generateSecretNumber();
    totalGames++;
    totalGuesses = 0;
    document.getElementById('totalGames').textContent = totalGames;
    document.getElementById('totalGuesses').textContent = totalGuesses;
    document.getElementById('result').textContent = '';
}
 
function handleGuess(event) {
    event.preventDefault();
 
    const guessInput = document.getElementById('guess');
    const guess = parseInt(guessInput.value, 10);
    guessInput.value = '';
 
    totalGuesses++;
    document.getElementById('totalGuesses').textContent = totalGuesses;
 
    if (guess < secretNumber) {
        document.getElementById('result').textContent = 'Luku on suurempi.';
    } else if (guess > secretNumber) {
        document.getElementById('result').textContent = 'Luku on pienempi.';
    } else {
        document.getElementById('result').textContent = 'Oikein! Arvasit numeron ' + secretNumber + ' oikein.';
        document.getElementById('playButton').textContent = 'Pelaa uudelleen';
    }
}
 
document.getElementById('playButton').addEventListener('click', function () {
    if (this.textContent === 'Pelaa uudelleen') {
        this.textContent = 'Pelaa';
    }
    startNewGame();
});
 
document.getElementById('guessForm').addEventListener('submit', handleGuess);
 
startNewGame();