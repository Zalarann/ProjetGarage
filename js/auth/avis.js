const inputNom = document.getElementById("LastNameInput");
const inputPrenom = document.getElementById("FirstNameInput");
const inputMail = document.getElementById("EmailInput");
const inputComment = document.getElementById("CommentArea");
const selectNote = document.getElementById("NoteSelect");

inputNom.addEventListener("keyup", validateForm); 
inputPrenom.addEventListener("keyup", validateForm);
inputMail.addEventListener("keyup", validateForm);
inputComment.addEventListener("keyup", validateForm);
selectNote.addEventListener("change", validateForm);



function validateForm() {
    const nomOK = validateRequired(inputNom);
    const prenomOK = validateRequired(inputPrenom);
    const emailOK = validateEMail(inputMail);
    const commentOK = validateRequired(inputComment);
    const noteOK = validateSelect(selectNote);

    if (nomOK && prenomOK && emailOK && commentOK && noteOK) {
        btnValidation.disabled = false;
    } else {
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
function validateSelect(select) {
    if (select.value !== "") {
        select.classList.add("is-valid");
        select.classList.remove("is-invalid");
        return true;
    } else {
        select.classList.remove("is-valid");
        select.classList.add("is-invalid");
        return false;
    }
}
