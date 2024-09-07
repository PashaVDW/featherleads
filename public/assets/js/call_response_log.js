// Initialize counts
let yesCount = 0;
let noCount = 0;

// Get DOM elements
const yesButton = document.getElementById('yes-button');
const noButton = document.getElementById('no-button');
const yesCountDisplay = document.getElementById('yes-count');
const noCountDisplay = document.getElementById('no-count');
const clearButton = document.getElementById('clear-button');

// Event listener for "Yes" button click
yesButton.addEventListener('click', () => {
    yesCount++;
    yesCountDisplay.textContent = yesCount;  // Update Yes count display
});

// Event listener for "No" button click
noButton.addEventListener('click', () => {
    noCount++;
    noCountDisplay.textContent = noCount;  // Update No count display
});

// Event listener for "Clear" button click
clearButton.addEventListener('click', () => {
    yesCount = 0;  // Reset Yes count
    noCount = 0;   // Reset No count
    yesCountDisplay.textContent = yesCount;  // Reset Yes count display
    noCountDisplay.textContent = noCount;    // Reset No count display
});
