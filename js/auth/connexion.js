const emailInput = document.getElementById("EmailInput")
const passwordInput = document.getElementById("PasswordInput")
const btnConnect =document.getElementById("BtnConnect")

btnConnect.addEventListener("click", checkInfo);

function checkInfo(){
    // API pour infos en remplacement du test
    if(emailInput.value == "florian@studi.com" && passwordInput.value =="azerty"){
        alert("testco")

        const token = "tokentest"
        setToken(token);
       //recupération du vrai token 

       setCookie("role", "admin", 1)

        window.location.replace("/")
    }
    else{
        emailInput.classList.add("is-invalid");
        passwordInput.classList.add("is-invalid");
        }
    }


