// Initialize counts
let yesCount = 0;
let noCount = 0;

// Get DOM elements
const yesButton = document.getElementById('yes-button');
const noButton = document.getElementById('no-button');
const yesCountDisplay = document.getElementById('yes-count');
const noCountDisplay = document.getElementById('no-count');
const clearButton = document.getElementById('clear-button');

// Event listeners for buttons
yesButton.addEventListener('click', () => {
    yesCount++;
    yesCountDisplay.textContent = yesCount;
});

noButton.addEventListener('click', () => {
    noCount++;
    noCountDisplay.textContent = noCount;
});

// Clear counts
clearButton.addEventListener('click', () => {
    yesCount = 0;
    noCount = 0;
    yesCountDisplay.textContent = yesCount;
    noCountDisplay.textContent = noCount;
});
