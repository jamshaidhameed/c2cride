var input = document.querySelector("#phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Please provide the correct mobile number", "Please provide the Correct mobile number", "Invalid number"];
// errorMap.style.color="#FF0000";

// initialise plugin
var utilsScriptPath = document.getElementById('js-settings').getAttribute('data-utils-path');

var iti = window.intlTelInput(input, {
    utilsScript: utilsScriptPath + "?1613236686837",
});


var reset = function () {
    console.log('reset')
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function () {

    reset();
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
        } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            console.log('errorCode',errorCode)
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
