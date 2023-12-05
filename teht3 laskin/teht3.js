let displayValue = '';
let currentOperation = '';
let firstOperand = '';
let secondOperand = '';

function appendToDisplay(value) {
    displayValue += value;
    updateDisplay();
}

function appendOperation(operation) {
    if (currentOperation === '' && displayValue !== '') {
        firstOperand = displayValue;
        currentOperation = operation;
        displayValue = '';
        updateDisplay();
    }
}

function calculateResult() {
    if (currentOperation !== '' && displayValue !== '') {
        secondOperand = displayValue;
        let result;
        switch (currentOperation) {
            case '+':
                result = parseFloat(firstOperand) + parseFloat(secondOperand);
                break;
            case '-':
                result = parseFloat(firstOperand) - parseFloat(secondOperand);
                break;
            case '*':
                result = parseFloat(firstOperand) * parseFloat(secondOperand);
                break;
            case '/':
                result = parseFloat(firstOperand) / parseFloat(secondOperand);
                break;
        }
        displayValue = result.toString();
        currentOperation = '';
        firstOperand = '';
        secondOperand = '';
        updateDisplay();
    }
}

function appendDecimal() {
    if (displayValue.indexOf('.') === -1) {
        appendToDisplay('.');
    }
}

function clearDisplay() {
    displayValue = '';
    currentOperation = '';
    firstOperand = '';
    secondOperand = '';
    updateDisplay();
}

function updateDisplay() {
    document.getElementById('display').value = displayValue;
}
