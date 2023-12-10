console.log("coucou");
const contact2 = document.querySelector(".contact-single__form--btn");
console.log(contact2);
const popupOverlay2 = document.querySelector(".popup__overlay");
const popup2 = document.querySelector(".popup");
contact2.addEventListener("click", function () {
  popupOverlay2.style.display = "flex";
  popup.style.display = "block";
});
popupOverlay.addEventListener("click", function () {
  popupOverlay2.style.display = "none";
  popup2.style.display = "none";
});
