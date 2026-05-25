let currentInput = '0';
let previousInput = '';
let operator = null;
let resetScreen = false;

const screen = document.getElementById('screen');
const operatorIndicator = document.getElementById('operator-indicator');

// Appends pressed numbers to the screen display
function appendNumber(number) {
    if (currentInput === '0' || resetScreen) {
        currentInput = number;
        resetScreen = false;
    } else {
        if (number === '.' && currentInput.includes('.')) return; // Prevent multiple decimals
        currentInput += number;
    }
    updateScreen();
}

// Sets the active math operator and displays its symbol on the upper right screen
function setOperator(op) {
    if (operator !== null && !resetScreen) calculate();
    previousInput = currentInput;
    operator = op;
    resetScreen = true;

    // Display the corresponding math symbol on the screen indicator
    if (op === '*') {
        operatorIndicator.textContent = 'x';
    } else if (op === '/') {
        operatorIndicator.textContent = '÷';
    } else {
        operatorIndicator.textContent = op;
    }
}

// C Button (Clear) - Resets all inputs and clears the operator indicator
function clearScreen() {
    currentInput = '0';
    previousInput = '';
    operator = null;
    operatorIndicator.textContent = ''; 
    updateScreen();
}

// DEL Button (Backspace) - Removes the last typed character from the screen
function deleteLast() {
    if (currentInput.length > 1) {
        currentInput = currentInput.slice(0, -1);
    } else {
        currentInput = '0';
    }
    updateScreen();
}

// Updates the HTML screen container text content
function updateScreen() {
    screen.textContent = currentInput;
}

// Calculates the math expression when the '=' key is triggered
function calculate() {
    if (operator === null || resetScreen) return;

    let result = 0;
    const num1 = parseFloat(previousInput);
    const num2 = parseFloat(currentInput);

    // Input Validation: Prevent division by zero
    if (operator === '/' && num2 === 0) {
        currentInput = 'Error';
        operator = null;
        operatorIndicator.textContent = '';
        resetScreen = true;
        updateScreen();
        return;
    }

    switch (operator) {
        case '+': result = num1 + num2; break;
        case '-': result = num1 - num2; break;
        case '*': result = num1 * num2; break;
        case '/': result = num1 / num2; break;
        default: return;
    }

    // Limit decimal places to avoid overflow and remove trailing zeros
    currentInput = String(Number(result.toFixed(8)));
    operator = null;
    operatorIndicator.textContent = ''; // Clear operator indicator after calculation
    resetScreen = true;
    updateScreen();
}

// Keyboard input compatibility layer for physical numpads
document.addEventListener('keydown', (event) => {
    if ((event.key >= '0' && event.key <= '9') || event.key === '.') {
        appendNumber(event.key);
    } else if (event.key === '+' || event.key === '-' || event.key === '*' || event.key === '/') {
        setOperator(event.key);
    } else if (event.key === 'Enter' || event.key === '=') {
        event.preventDefault(); // Prevent default browser scaling or form submission behaviors
        calculate();
    } else if (event.key === 'Backspace') {
        deleteLast();
    } else if (event.key === 'Escape') {
        clearScreen();
    }
});
