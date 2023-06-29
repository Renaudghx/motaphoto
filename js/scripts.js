// Gestion de la modale de contact
const modaleContent = document.querySelector(".modale-content");
const btnContact = document.getElementById("menu-item-21");
const modaleBox = document.querySelector(".modale-box");
const postCta = document.getElementById("js-post-cta");
const refPhoto = document.getElementById("ref-photo");
const formRefPhoto = document.getElementById("form-ref-photo");
const btnContactMobile = document.getElementById("js-mobile-contact");

// Fait apparaitre la modale au clic
btnContact.addEventListener("click", openModale);
btnContactMobile.addEventListener("click", openModale);
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

// ----- Script Load more jQuery-----

let currentPage = 1;
jQuery("#js-load-more").on("click", function () {
  currentPage++;

  jQuery.ajax({
    type: "POST",
    url: "wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "photo_load_more",
      paged: currentPage,
    },
    success: function (res) {
      jQuery(".row").append(res);
    },
  });
});

// ----- Script Filters cat jQuery-----
jQuery(".js-list-li").click(function () {
  var liValue = jQuery(this).attr("data-value");
  jQuery.ajax({
    type: "POST",
    url: "wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "photo_filters",
      taxonomy: "categorie",
      terms: liValue,
    },
    success: function (res) {
      document.getElementById("row").innerHTML = "";
      jQuery("#row").append(res);
    },
  });
});

// Gestion animation filters Cat

jQuery(".select-cat").click(function () {
  var is_open = jQuery(this).hasClass("open");
  if (is_open) {
    jQuery(this).removeClass("open");
    jQuery(".filter-chevron").removeClass("filter-chevron-rotate");
    jQuery(".init-select").removeClass("init-select-active");
  } else {
    jQuery(this).addClass("open");
    jQuery(".select-cat li:first-child").html(
      'Catégories <img class="filter-chevron" src="./wp-content/themes/MotaPhoto/assets/images/chevron.png">'
    );
    jQuery(".filter-chevron").addClass("filter-chevron-rotate");
    jQuery(".init-select").addClass("init-select-active");
  }
});

jQuery(".js-list-li").click(function () {
  var selected_li = jQuery(this).html();
  jQuery(".select-cat li:first-child").html(selected_li);
  jQuery(".js-list-li").removeClass("color-li");
  jQuery(this).addClass("color-li");
});

// ----- Script Filters format jQuery-----
jQuery(".js-list-li-format").click(function () {
  var liValueFormat = jQuery(this).attr("data-value");
  jQuery.ajax({
    type: "POST",
    url: "wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "photo_filters",
      taxonomy: "format",
      terms: liValueFormat,
    },
    success: function (res) {
      document.getElementById("row").innerHTML = "";
      jQuery("#row").append(res);
    },
  });
});

// Gestion animation filters format

jQuery(".select-format").click(function () {
  var is_open = jQuery(this).hasClass("open");
  if (is_open) {
    jQuery(this).removeClass("open");
    jQuery(".filter-chevron-format").removeClass(
      "filter-chevron-rotate-format"
    );
    jQuery(".init-select-format").removeClass("init-select-active-format");
  } else {
    jQuery(this).addClass("open");
    jQuery(".select-format li:first-child").html(
      'Formats <img class="filter-chevron-format" src="./wp-content/themes/MotaPhoto/assets/images/chevron.png">'
    );
    jQuery(".filter-chevron-format").addClass("filter-chevron-rotate-format");
    jQuery(".init-select-format").addClass("init-select-active-format");
  }
});

jQuery(".js-list-li-format").click(function () {
  var selected_li_format = jQuery(this).html();
  jQuery(".select-format li:first-child").html(selected_li_format);
  jQuery(".js-list-li-format").removeClass("color-li-format");
  jQuery(this).addClass("color-li-format");
});

// ----- Script Filters Date jQuery-----
jQuery(".js-list-li-date").click(function () {
  var liValueDate = jQuery(this).attr("data-value");
  jQuery.ajax({
    type: "POST",
    url: "wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "photo_filters_date",
      date: liValueDate,
    },
    success: function (res) {
      document.getElementById("row").innerHTML = "";
      jQuery("#row").append(res);
    },
  });
});

// Gestion animation filters date

jQuery(".select-date").click(function () {
  var is_open = jQuery(this).hasClass("open");
  if (is_open) {
    jQuery(this).removeClass("open");
    jQuery(".filter-chevron-date").removeClass("filter-chevron-rotate-date");
    jQuery(".init-select-date").removeClass("init-select-active-date");
  } else {
    jQuery(this).addClass("open");
    jQuery(".select-date li:first-child").html(
      'Trier par <img class="filter-chevron-date" src="./wp-content/themes/MotaPhoto/assets/images/chevron.png">'
    );
    jQuery(".filter-chevron-date").addClass("filter-chevron-rotate-date");
    jQuery(".init-select-date").addClass("init-select-active-date");
  }
});

jQuery(".js-list-li-date").click(function () {
  var selected_li_date = jQuery(this).html();
  jQuery(".select-date li:first-child").html(selected_li_date);
  jQuery(".js-list-li-date").removeClass("color-li-date");
  jQuery(this).addClass("color-li-date");
});