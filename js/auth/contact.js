const inputNom = document.getElementById("LastNameInput");
const inputPrenom = document.getElementById("FirstNameInput");
const inputMail = document.getElementById("EmailInput");
const inputsujet = document.getElementById("SubjectInput");
const areaMessage = document.getElementById("MessageArea");

inputNom.addEventListener("keyup", validateForm); 
inputPrenom.addEventListener("keyup", validateForm);
inputMail.addEventListener("keyup", validateForm);
inputsujet.addEventListener("keyup", validateForm);
areaMessage.addEventListener("keyup", validateForm);



function validateForm(){
    const nomOK = validateRequired(inputNom);
    const prenomOK = validateRequired(inputPrenom);
    const sujetOk = validateRequired(inputsujet)
    const areaMessageOK = validateTextarea(areaMessage,255)
    const emailOK = validateEMail(inputMail)

    if(nomOK && prenomOK && sujetOk && areaMessageOK && emailOK){
        btnValidation.disabled = false;
    }
    else{
        btnValidation.disabled = true;
    }

    
}
function validateEMail(input){

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mailUser = input.value;
    if(mailUser.match(emailRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
        return true;
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

function validateRequired(input){
    if(input.value != ''){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
        return true;
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}
function validateTextarea(textarea, maxLength) {
    if (textarea.value.trim() !== '' && textarea.value.length <= maxLength) {
        textarea.classList.add("is-valid");
        textarea.classList.remove("is-invalid");
        return true;
    } else {
        textarea.classList.remove("is-valid");
        textarea.classList.add("is-invalid");
        return false;
    }
}

const textareaElement = document.getElementById("MessageArea");
validateTextarea(textareaElement, 255);
