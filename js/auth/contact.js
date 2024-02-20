const nameInput = document.getElementById("LastNameInput");
const prenomInput = document.getElementById("FirstNameInput");
const mailInput = document.getElementById("EmailInput");
const sujetInput = document.getElementById("SubjectInput");
const messageArea = document.getElementById("MessageArea");

nameInput.addEventListener("keyup", validateForm); 
prenomInput.addEventListener("keyup", validateForm);
mailInput.addEventListener("keyup", validateForm);
sujetInput.addEventListener("keyup", validateForm);
messageArea.addEventListener("keyup", validateForm);



function validateForm(){
    const nomOK = validateRequired(nameInput);
    const prenomOK = validateRequired(prenomInput);
    const sujetOk = validateRequired(sujetInput)
    const messageAreaOK = validateTextarea(messageArea,255)
    const emailOK = validateEMail(mailInput)

    if(nomOK && prenomOK && sujetOk && messageAreaOK && emailOK){
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





