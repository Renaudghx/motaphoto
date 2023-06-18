/**
 * @property {HTMLElement} element
 * @property {string[]} images Chemins des images de la lightbox
 * @property {string} url image actuellement affiché
 * @property {string[]} cat Tableau des catégories
 * @property {string[]} ref Tableau des ref
 */
class Lightbox {
  static init() {
    const links = Array.from(document.querySelectorAll(".js-img-lightbox"));
    const gallery = links.map((link) => link.srcset.split(" ").slice(8, 9));
    const catref = Array.from(document.querySelectorAll(".container-photo-hover-description"));
    const ref = catref.map((r) => r.innerText.split("\n").slice(0, 1));
    const cat = catref.map((c) => c.innerText.split("\n").slice(1, 2));
    const signFull = document.querySelectorAll(".sign-full-screen");
    signFull.forEach((sign) =>
      sign.addEventListener("click", (e) => {
        e.preventDefault();
        new Lightbox(
          // Target l'URL de l'image
          e.target
            .closest(".photo-overlay")
            .previousSibling.srcset.split(" ")
            .slice(8, 9),
          gallery,
          // Target le référence de la photo
          e.target
          .closest(".photo-overlay")
          .lastChild.previousSibling.innerText.split("\n")
          .slice(1, 2),
          // Target la catégorie de la photo
          e.target
         .closest(".photo-overlay")
         .lastChild.previousSibling.innerText.split("\n")
         .slice(0, 1), ref, cat
        );
      })
    );
  }

  /**
   * @param {string} url URL de l'image
   * @param {string[]} images Chemins des images de la lightbox
   * @property {string[]} cat Tableau des catégories
   * @property {string[]} ref Tableau des ref   
   * @property {string} targetCat Catégorie de la photo au click
   * @property {string} targetRef Réference de la photo au click 
   */
  constructor(url, images, targetCat, targetRef, ref, cat) {
    this.element = this.buildDOM(url);
    this.images = images;
    this.ref = ref;
    this.cat = cat;
    this.targetCat = targetCat;
    this.targetRef = targetRef;
    this.loadImage(url, targetRef, targetCat);
    this.onKeyUp = this.onKeyUp.bind(this);
    document.body.appendChild(this.element);
    document.addEventListener("keyup", this.onKeyUp);
  }

  /**
   * @param {string} url URL de l'image
   * @return {HTMLElement}
   */
  buildDOM() {
    const dom = document.createElement("div");
    dom.classList.add("lightbox", "fadeIn");
    dom.innerHTML = `
      <button class="lightbox__close">Fermer</button>
      <button class="lightbox__next">Suivante</button>
      <button class="lightbox__prev">Précédente</button>
      <div class="lightbox__container"></div>
      <div class="container-photo-lightbox-description">
        <div class="lightbox-photo-ref"></div>
        <div class="lightbox-photo-cat"></div>
      </div>
      `;
    dom
      .querySelector(".lightbox__close")
      .addEventListener("click", this.close.bind(this));
    dom
      .querySelector(".lightbox__next")
      .addEventListener("click", this.next.bind(this));
    dom
      .querySelector(".lightbox__prev")
      .addEventListener("click", this.prev.bind(this));
    return dom;
  }

  /**
   * @param {KeyboardEvent} e
   */
  onKeyUp(e) {
    if (e.key === "Escape") {
      this.close(e);
    } else if (e.key === "ArrowLeft") {
      this.prev(e);
    } else if (e.key === "ArrowRight") {
      this.next(e);
    }
  }

  /**
   * Ferme la lightbox
   * @param {MouseEvent|KeyboardEvent} e
   */
  close(e) {
    e.preventDefault;
    this.element.classList.remove("fadeIn");
    this.element.classList.add("fadeOut");
    window.setTimeout((e) => {
      this.element.parentElement.removeChild(this.element);
    }, 500);
    document.removeEventListener("keyup", this.onKeyUp);
  }

  /**
   * @param {string} url URL de l'image
   * @property {string} loadCat catégorie de l'image actuellement affiché
   * @property {string} loadRef ref de l'image actuellement affiché
   */
  loadImage(url, loadRef, loadCat) {
    this.url = null;
    const image = new Image();
    const container = this.element.querySelector(".lightbox__container");
    const containerCat = this.element.querySelector(".lightbox-photo-cat");
    const containerRef = this.element.querySelector(".lightbox-photo-ref");
    container.innerHTML = "";
    containerCat.innerText = "";
    containerRef.innerText = "";
    image.onload = () => {
      container.appendChild(image);
      this.url = url;
    };
      image.src = url;
      containerCat.innerText = loadCat;
      containerRef.innerText = loadRef;
  };  

  /**
   * @param {MouseEvent|KeyboardEvent} e
   */
  next(e) {
    e.preventDefault();
    let i = this.images.findIndex((image) => image[0] === this.url[0]);
    if (i === this.images.length - 1) {
      i = -1;
    }
    this.loadImage(this.images[i + 1], this.ref[i + 1], this.cat[i + 1]);
  }

  /**
   * @param {MouseEvent|KeyboardEvent} e
   */
  prev(e) {
    e.preventDefault();
    let i = this.images.findIndex((image) => image[0] === this.url[0]);
    if (i === 0) {
      i = this.images.length;
    }
    this.loadImage(this.images[i - 1], this.ref[i - 1], this.cat[i - 1]);
  }
}

Lightbox.init();
