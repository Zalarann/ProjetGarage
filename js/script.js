const tokenCookieName ="accestoken";
const btnDisconnected = document.getElementById("btn-disconnected")
const RoleCookieName = "role";

document.addEventListener('DOMContentLoaded', function() {
  const btnDisconnected = document.getElementById("btn-disconnected");
  btnDisconnected.addEventListener("click", disconnected);
});


function getRole(){
  return getCookie(RoleCookieName);
}

function disconnected(){
  eraseCookie(tokenCookieName);
  eraseCookie("role");
  window.location.reload();
}

function setToken(token){
    setCookie(tokenCookieName, token, 1);
}

function getToken(){
    return getCookie(tokenCookieName);
}
function setCookie(name,value,days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {   
  document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function isConnected(){
    if(getToken() == null || getToken == undefined){
      return false;
    }
    else{
      return true;
    }
}


/*
disconnect
Connect
  -admin
  -employer
*/

function showAndHideElementsForRoles(){
  const userConnected = isConnected();
  const role = getRole();

  let allElementsToEdit = document.querySelectorAll('[data-show]');

  allElementsToEdit.forEach(element =>{
      switch(element.dataset.show){
          case 'disconnect': 
              if(userConnected){
                  element.classList.add("d-none");
              }
              break;
          case 'connect': 
              if(!userConnected){
                  element.classList.add("d-none");
              }
              break;
          case 'admin': 
              if(!userConnected || role != "admin"){
                  element.classList.add("d-none");
              }
              break;
          case 'employee': 
              if(!userConnected || role != "employee"){
                  element.classList.add("d-none");
              }
              break;
          case 'admin employee':
              if (!userConnected && role !== 'admin' && role !== 'employee') {
                  element.classList.add('d-none');
              }
              break;
      }
  })
}

