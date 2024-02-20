let modifyButton = document.getElementById("modifyButton_1");

  modifyButton.addEventListener("click", function() {
    let cardElement = modifyButton.closest(".card");
    let title = cardElement.querySelector(".card-title").innerText;
    let accroche = cardElement.querySelector(".accroche").innerText;
    let price = cardElement.querySelector("#price").innerText;
    let year = cardElement.querySelector("#year").innerText;
    let km = cardElement.querySelector("#km").innerText;
    let id = modifyButton.id.split("_")[1];
    
    createCarModal(id, title, "", accroche, price, km, year);

    // Add event listener after the modal has been added to the DOM
    document.querySelector("#modifyAnnonce_" + id + " form").addEventListener("submit", function(event) {
      event.preventDefault();

      let newTitle = document.getElementById("NameAutoInput").value;
      let newPrice = document.getElementById("PriceInput").value;
      let newYear = document.getElementById("YearInput").value;
      let newKm = document.getElementById("KmInput").value;
      let newAccroche = document.getElementById("AccrocheArea").value;

      // Update the card content with the new values
      cardElement.querySelector(".card-title").innerText = newTitle;
      cardElement.querySelector(".accroche").innerText = newAccroche;
      cardElement.querySelector("#price").innerText = newPrice;
      cardElement.querySelector("#year").innerText = newYear;
      cardElement.querySelector("#km").innerText = newKm;

      // Close the modal
      $('#modifyAnnonce_' + id).modal('hide');
    });
  });

  function createCarModal(id, title, imageSrc, accroche, price, km, year) {
    let modalId = "modifyAnnonce_" + id;
  
    let modalContent = `
      <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="ModifyAnnonceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title fs-5" id="ModifyAnnonceModalLabel">Modifier Annonce</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="NameAutoInput" class="form-label">Modèle</label>
                  <input type="text" class="form-control" id="NameAutoInput" placeholder="Bugatti Veyron" name="AutoName"> 
                </div>
                <div class="mb-3">
                  <label for="PriceInput" class="form-label">Prix</label>
                  <input type="text" class="form-control" id="PriceInput" placeholder="1 000 000" name="Price"> 
                </div>
                <div class="mb-3">
                  <label for="YearInput" class="form-label">Année de mise en circulation</label>
                  <input type="text" class="form-control" id="YearInput" placeholder="2018" name="Year"> 
                </div>
                <div class="mb-3">
                  <label for="KmInput" class="form-label">Kilométrage</label>
                  <input type="text" class="form-control" id="KmInput" placeholder="50 000" name="Km"> 
                </div>
                <div class="mb-3">
                  <label for="AccrocheArea" class="form-label">Accroche</label>
                  <textarea class="form-control" id="AccrocheArea" placeholder="Éveillez l'admiration à chaque coup d'accélérateur avec la Bugatti Veyron - l'essence de la performance automobile redéfinie." name="Accroche"></textarea>
                </div>
                <div class="mb-3">
                  <label for="ImageInput" class="form-label">Photo du véhicule</label>
                  <input type="file" class="form-control" id="ImageInput" name="Image">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    `;

    document.body.insertAdjacentHTML("beforeend", modalContent);

    document.getElementById("ModifyAnnonceModalLabel").innerText = "Modifier Annonce - " + title;
    document.getElementById("NameAutoInput").value = title;
    document.getElementById("PriceInput").value = price;
    document.getElementById("YearInput").value = year;
    document.getElementById("KmInput").value = km;
    document.getElementById("AccrocheArea").value = accroche;
  
    document.querySelector(`#modifyForm_${id}`).addEventListener("submit", function(event) {
      event.preventDefault();
  
      let newTitle = document.getElementById("NameAutoInput").value;
      let newPrice = document.getElementById("PriceInput").value;
      let newYear = document.getElementById("YearInput").value;
      let newKm = document.getElementById("KmInput").value;
      let newAccroche = document.getElementById("AccrocheArea").value;
  
      let cardElement = document.getElementById(`modifybutton_${id}`).closest(".card");
  
      cardElement.querySelector(".card-title").innerText = newTitle;
      cardElement.querySelector(".accroche").innerText = newAccroche;
      cardElement.querySelector("#price").innerText = newPrice;
      cardElement.querySelector("#year").innerText = newYear;
      cardElement.querySelector("#km").innerText = newKm;
  
      $('#modifyAnnonce_' + id).modal('hide');
    });
  }



  document.addEventListener('DOMContentLoaded', function () {
    let saveButton = document.getElementById('saveNewAnnonce');
  
    if (saveButton) { // Check if the button is found
      saveButton.addEventListener('click', function (event) {
        event.preventDefault();
  
        let autoName = document.getElementById('NameAutoInput').value;
        let price = document.getElementById('PriceInput').value;
        let year = document.getElementById('YearInput').value;
        let km = document.getElementById('KmInput').value;
        let accroche = document.getElementById('AccrocheArea').value;
        let image = document.getElementById('ImageInput').value;
  
        let newCard = `
          <div class="card w-100 bg-primary shadow-lg cursor-pointer">
            <!-- Add other card content here based on your existing structure -->
            <h2 class="card-title">${autoName}</h2>
            <p class="accroche">${accroche}</p>
            <div class="card-body d-flex justify-content-between align-items-center m-4">
              <p class="mb-0 text-white" id="price">${price}</p>
              <p class="mb-0 text-white" id="km">${km}</p>
              <p class="mb-0 text-white" id="year">${year}</p>
              <button class="btn btn-primary type-1">Prendre Contact</button>
            </div>
          </div>
        `;
  
        let container = document.querySelector('.voitures .container');
        container.insertAdjacentHTML('beforeend', newCard);
  
        let modal = new bootstrap.Modal(document.getElementById('createAnnonce'));
        modal.hide();
      });
    }
  });
  
