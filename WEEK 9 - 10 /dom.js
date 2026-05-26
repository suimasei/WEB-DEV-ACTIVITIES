// Select DOM elements
const gameInput = document.getElementById('gameInput');
const addGameBtn = document.getElementById('addGameBtn');
const gameList = document.getElementById('gameList');

// Function to add a new game
function addGame() {
    const gameText = gameInput.value.trim();

    // Validation: Don't add empty text
    if (gameText === "") {
        alert("Please type a game title first!");
        return;
    }

    // 1. Create a new <li> element
    const newLi = document.createElement('li');
    
    // 2. Set the text content of the <li> to the input value
    newLi.textContent = gameText;

    // 3. Append the new <li> to the <ul>
    gameList.appendChild(newLi);

    // 4. Clear the input field for the next entry
    gameInput.value = "";
    
    // Put focus back on the input field automatically
    gameInput.focus();
}

// Event listener for the button click
addGameBtn.addEventListener('click', addGame);

// Optional: Allow pressing "Enter" key to add a game too
gameInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        addGame();
    }
});
