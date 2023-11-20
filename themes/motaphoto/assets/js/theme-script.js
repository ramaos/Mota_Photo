//============= modal burger ===============//
const burger = document.querySelector(".burger");
const btn = document.querySelector(".burger__btn");
btn.addEventListener("click", function () {
  console.log("coucou");
  burger.classList.toggle("active");
});

//============  popup contact   ==============//
const contact1 = document.querySelector(".contact__motaphoto");
const contact2 = document.querySelector(".contact-single__form--btn");
const popupOverlay = document.querySelector(".popup__overlay");
const popup = document.querySelector(".popup");

contact1.addEventListener("click", function () {
  popupOverlay.style.display = "flex";
  popup.style.display = "block";
});
popupOverlay.addEventListener("click", function () {
  popupOverlay.style.display = "none";
  popup.style.display = "none";
});
contact2.addEventListener("click", function () {
  popupOverlay.style.display = "flex";
  popup.style.display = "block";
});
popupOverlay.addEventListener("click", function () {
  popupOverlay.style.display = "none";
  popup.style.display = "none";
});
//==============  reference photo   ==============//
(function ($) {
  $(document).ready(function () {
    $(".contact__ref").click(function () {
      $reference = $(".ref__photo").text();
      $('input[name="wpforms[fields][3]"]').val($reference);
    });
  });
})(jQuery);
