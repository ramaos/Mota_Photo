// document.addEventListener("DOMContentLoaded", function () {
//   const fullscreens = document.querySelectorAll(".icon_fullscreen");
//   for (let i = 0; i < fullscreens.length; i++) {
//     const fullscreen = fullscreens[i];
//     const visionneuse = document.querySelector(".visionneuse");

//     const visionneusePopup = document.querySelector(".visionneuse__popup");

//     fullscreen.addEventListener("click", function () {
//       visionneuse.style.display = "flex";
//       visionneusePopup.style.display = "flex";
//     });
//     visionneuse.addEventListener("click", function () {
//       visionneuse.style.display = "none";
//       visionneusePopup.style.display = "none";
//     });
//   }
// });
//======================================================
document.addEventListener("DOMContentLoaded", function () {
  /**
   * @property {HTMLElement} element
   * @property {string[]} images chemins des image de la lightbox
   * @property {string} url image actuellement affichée
   */
  class Lightbox {
    static init() {
      const links = Array.from(
        document.querySelectorAll(
          'a[href$=".png"],a[href$=".jpg"],a[href$=".jpeg"]'
        )
      );
      const gallery = links.map((link) => link.getAttribute("href"));

      links.forEach((link) =>
        link.addEventListener("click", (e) => {
          e.preventDefault();
          new Lightbox(e.currentTarget.getAttribute("href"), gallery);
        })
      );
    }
    /**
     * @param {string} url URL de l'image
     * @param {string} images chemins des image de la lightbox
     */
    constructor(url, images) {
      this.element = this.buildDom(url);
      this.images = images;
      this.loadImage(url);
      this.onKeyUp = this.onKeyUp.bind(this);
      document.body.appendChild(this.element);
      document.addEventListener("keyup", this.onKeyUp);
    }

    /**
     * @param {string} url url de l'image
     */
    loadImage(url) {
      this.url = null;
      const image = new Image();
      const container = this.element.querySelector(".lightbox__container");
      const loader = document.createElement("div");
      loader.classList.add("lightbox__loader");
      container.innerHTML = "";
      container.appendChild(loader);
      image.onload = () => {
        container.removeChild(loader);
        container.appendChild(image);
        this.url = url;
      };
      image.src = url;
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
     * ferme la lightbox
     * @param {MouseEvent/KeyboardEvent} e
     */
    close(e) {
      e.preventDefault();
      this.element.classList.add("fadeOut");
      window.setTimeout(() => {
        this.element.parentElement.removeChild(this.element);
      }, 300);
      document.removeEventListener("keyup", this.onKeyUp);
    }

    /**
     * @param {MouseEvent/KeyboardEvent} e
     */
    next(e) {
      e.preventDefault();
      let i = this.images.findIndex((image) => image === this.url);
      if (i === this.images.length - 1) {
        i = -1;
      }
      this.loadImage(this.images[i + 1]);
    }

    /**
     * @param {MouseEvent/KeyboardEvent} e
     */
    prev(e) {
      e.preventDefault();
      let i = this.images.findIndex((image) => image === this.url);
      if (i === 0) {
        i = this.images.length;
      }
      this.loadImage(this.images[i - 1]);
    }

    /**
     * @param {string} url URL de l'image
     * @return {HTMLElement}
     */
    buildDom(url) {
      const dom = document.createElement("article");
      dom.classList.add("lightbox");
      dom.innerHTML = `<div class="lightbox__close"></div>
    <div class="lightbox__next"></div>
    <div class="lightbox__prev"></div>
    <div class="lightbox__container"></div>`;
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
  }
  Lightbox.init();
});
