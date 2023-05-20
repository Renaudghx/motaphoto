// Gestion de la modale de contact
const modaleContent = document.querySelector(".modale-content");
const btnContact = document.getElementById("menu-item-21");

// Fait apparaitre la modale au clic
btnContact.addEventListener("click", openModale);
function openModale() {
  modaleContent.classList.remove("modale-hide");
}

// Fait disparaitre la modale au clic & echap

function closeModale() {
  modaleContent.classList.add("modale-hide");
}

window.addEventListener('keydown', function (e) {
  if (e.key === "Escape" || e.key === "Esc"){
    closeModale()
  }
})