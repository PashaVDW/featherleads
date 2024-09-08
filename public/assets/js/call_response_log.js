// Initialize counts
let yesCount = 0;
let noCount = 0;

// Get DOM elements
const yesButton = document.getElementById('yes-button');
const noButton = document.getElementById('no-button');
const yesCountDisplay = document.getElementById('yes-count');
const noCountDisplay = document.getElementById('no-count');

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

