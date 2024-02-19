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


  document.addEventListener('DOMContentLoaded', function () {
    // Select all filter input elements
    const filterInputs = document.querySelectorAll('.filter input');

    // Select all card elements
    const cards = document.querySelectorAll('.voitures .card');

    // Function to apply filters
    function applyFilters() {
      // Get filter values
      const minPrice = parseInt(document.getElementById('minPrice').value) || 0;
      const maxPrice = parseInt(document.getElementById('maxPrice').value) || Infinity;
      const minYear = parseInt(document.getElementById('minYear').value) || 0;
      const maxYear = parseInt(document.getElementById('maxYear').value) || Infinity;
      const minKm = parseInt(document.getElementById('minKm').value) || 0;
      const maxKm = parseInt(document.getElementById('maxKm').value) || Infinity;

      // Loop through cards and check if they match the filters
      cards.forEach(card => {
        const price = parseInt(card.querySelector('.card-body p:nth-child(1)').textContent.replace('€', '').trim());
        const year = parseInt(card.querySelector('.card-body p:nth-child(3)').textContent.trim());
        const km = parseInt(card.querySelector('.card-body p:nth-child(2)').textContent.replace('km', '').trim());

        // Hide or show the card based on filters
        if (
          price >= minPrice && price <= maxPrice &&
          year >= minYear && year <= maxYear &&
          km >= minKm && km <= maxKm
        ) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Attach event listener to filter input elements
    filterInputs.forEach(input => {
      input.addEventListener('input', applyFilters);
    });

    // Function to reset filters
    function resetFilters() {
      filterInputs.forEach(input => {
        input.value = '';
      });
      // Show all cards when filters are reset
      cards.forEach(card => {
        card.style.display = 'block';
      });
    }

    // Attach event listener to reset button
    document.querySelector('.filter button[type="reset"]').addEventListener('click', resetFilters);
  });

