document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("bmiForm");
    const resultDiv = document.getElementById("result");
 
    form.addEventListener("submit", function (event) {
        event.preventDefault();
 
        const height = parseFloat(document.getElementById("height").value);
        const weight = parseFloat(document.getElementById("weight").value);
 
        if (isNaN(height) || isNaN(weight) || height < 1 || height > 2.5 || weight < 30 || weight > 500) {
            resultDiv.innerHTML = "Tarkista syötetyt tiedot. Pituuden tulee olla välillä 1-2.5 metriä ja painon välillä 30-500 kg.";
        } else {
            const bmi = calculateBMI(height, weight);
            const message = getBMIMessage(bmi);
            resultDiv.innerHTML = `BMI: ${bmi.toFixed(2)} - ${message}`;
        }
    });
 
    function calculateBMI(height, weight) {
        return weight / (height * height);
    }
 
    function getBMIMessage(bmi) {
        if (bmi < 18.5) {
            return "Alipaino";
        } else if (bmi < 24.9) {
            return "Normaalipaino";
        } else {
            return "Ylipaino";
        }
    }
});