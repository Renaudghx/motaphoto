// Gestion de la modale de contact
const modaleContent = document.querySelector(".modale-content");
const btnContact = document.getElementById("menu-item-21");
const modaleBox = document.querySelector(".modale-box");

// Fait apparaitre la modale au clic
btnContact.addEventListener("click", openModale);
function openModale() {
  modaleContent.classList.remove("modale-hide");
}

// Fait disparaitre la modale au clic & echap

function closeModale() {
  modaleContent.classList.add("modale-hide");
}

modaleContent.addEventListener("click", closeModale);

modaleBox.addEventListener("click", function(e) {
  e.stopPropagation();
})

window.addEventListener('keydown', function (e) {
  if (e.key === "Escape" || e.key === "Esc"){
    closeModale()
  }
})