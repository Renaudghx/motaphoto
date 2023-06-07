// Gestion de la modale de contact
const modaleContent = document.querySelector(".modale-content");
const btnContact = document.getElementById("menu-item-21");
const modaleBox = document.querySelector(".modale-box");
const postCta = document.getElementById("js-post-cta");
const refPhoto = document.getElementById("ref-photo");
const formRefPhoto = document.getElementById("form-ref-photo");

// Fait apparaitre la modale au clic
btnContact.addEventListener("click", openModale);
if (postCta != null) {
  postCta.addEventListener("click", openModale);
}
function openModale() {
  modaleContent.classList.remove("modale-hide");
  //Ajout de la rèf photo pour single post
  if (refPhoto != null) {
    formRefPhoto.value = refPhoto.innerText;
  }
}

// Fait disparaitre la modale au clic & echap

function closeModale() {
  modaleBox.classList.remove("modale-box-anim-in");
  modaleContent.classList.add("modale-anim-out");
  modaleBox.classList.add("modale-box-anim-out");
  window.setTimeout(function () {
    modaleContent.classList.add("modale-hide");
    modaleContent.classList.remove("modale-anim-out");
    modaleBox.classList.remove("modale-box-anim-out");
    modaleBox.classList.add("modale-box-anim-in");
  }, 500);
}

modaleContent.addEventListener("click", closeModale);

modaleBox.addEventListener("click", function (e) {
  e.stopPropagation();
});

window.addEventListener("keydown", function (e) {
  if (e.key === "Escape" || e.key === "Esc") {
    closeModale();
  }
});

// ----- Script Load more ----- 

let currentPage = 1;
jQuery('#js-load-more').on('click', function() {
  currentPage++;

  jQuery.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'weichie_load_more',
      paged: currentPage,
    },
    success: function (res) {
      jQuery('.row').append(res);
    }
  });
});