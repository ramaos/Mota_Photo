// jQuery(document).ready(function ($) {
//   if (document.getElementById("form-ajax-test")) {
//     $("form#form-ajax-test").on("submit", function (e) {
//       e.preventDefault();

//       var myValue = $("#send-value").val();

//       $.ajax({
//         url: ajaxVars.url,
//         dataType: "json",
//         method: "post",
//         data: {
//           action: "mon_test_ajax",
//           data1: myValue,
//           data2: "xxxxxx",
//         },
//         success: function (response) {
//           if (response.success) {
//             console.log("resultat: " + response.retour);
//           }
//         },
//         error: function (xhr, error, exception) {
//           console.log("massage d'erreur" + error);
//           console.log("massage exception" + exception);
//           console.log("contenu de l'objet xhr");
//           console.log(xhr);
//         },
//       }); //fin de ajax
//     }); // fin de submit
//   } // fin du document if
// }); // fin de ready

//===========================================================================amar
// document.addEventListener("DOMContentLoaded", function () {
//   const formAjax_1 = document.querySelector("#ajax_call_1");
//   const formAjax_2 = document.querySelector("#ajax_call_2");
//   formAjax_1.addEventListener("click", function () {
//     console.log("coucou");
//     let formData = new FormData();
//     formData.append("action", "affichage_plus");
//     fetch(ajaxVars.url, {
//       method: "POST",
//       body: formData,
//     })
//       .then(function (response) {
//         if (!response.ok) {
//           throw new Error("Network response error.");
//         }
//         return response.json();
//       })

//       .then(function (data) {
//         data.posts.forEach(function (post) {
//           document
//             .querySelector("#posts")
//             .insertAdjacentHTML(
//               "beforeend",
//               '<article class="container__posts">' +
//                 '<p class="categorie">' +
//                 post.post_title +
//                 "</p>" +
//                 post.post_content +
//                 '<a href="<?= $thumbnail_src; ?>">' +
//                 '<img src="http://motaphoto/wp-content/themes/motaphoto/assets/images/icon_fullscreen.png" class="icon_fullscreen" alt="icon fullscreen"">' +
//                 "</a>" +
//                 '<img src="http://motaphoto/wp-content/themes/motaphoto/assets/images/icon_eye.png" class="icon_eye" alt="icon eye"' +
//                 "</article>"

//             );
//           // const fullscreens = document.querySelectorAll(".icon_fullscreen");
//           // for (let i = 0; i < fullscreens.length; i++) {
//           //   const fullscreen = fullscreens[i];
//           //   const visionneuse = document.querySelector(".visionneuse");

//           //   const visionneusePopup = document.querySelector(
//           //     ".visionneuse__popup"
//           //   );
//           //   console.log(visionneusePopup);
//           //   fullscreen.addEventListener("click", function () {
//           //     visionneuse.style.display = "flex";
//           //     visionneusePopup.style.display = "flex";
//           //   });
//           //   visionneuse.addEventListener("click", function () {
//           //     visionneuse.style.display = "none";
//           //     visionneusePopup.style.display = "none";
//           //   });
//           // }
//         });
//       });

//     // formAjax_1.style.display = "none";
//     // formAjax_2.style.display = "block";
//   }); //  fin du addEvenListner au click
// }); //  fin du DOMContentLoaded

//======================================================================justine

//justine

// jQuery(document).ready(function ($) {
//   $(
//     "#category-select , #category-select-format, #category-select-date "
//   ).change(function () {
//     let category = $("#category-select").val();
//     let format = $("#category-select-format").val();
//     let order = $("#category-select-date").val();

//     $.ajax({
//       url: ajaxVars.url,
//       type: "POST",
//       data: {
//         action: "filtre_des_posts",
//         category: category,
//         format: format,
//         order: order,
//       },

//       success: function (response) {
//         // Mettez à jour la zone d'affichage des publications filtrées.
//         $("#container").html(response);
//       },
//     });
//   });

//   $(".cat-titre").click(function () {
//     $(".choix-cat").css("display", "flex");
//   });
// });
//==============================================================================//
(function ($) {
  $(document).ready(function () {
    $(document).on("change", "#filter", function (e) {
      e.preventDefault();

      let category = $(this).find("#category-select option:selected").val();

      let format = $(this).find("#format-select option:selected").val();
      let order = $(this).find("#order-select option:selected").val();
      console.log(order);
      $.ajax({
        url: ajaxVars.url,
        type: "POST",
        data: {
          action: "filtre_des_posts",
          category: category,
          format: format,
          order: order,
        },
        success: function (result) {
          $("#container").html(result);
        },
        error: function (result) {
          console.warn(result);
        },
      });
    });
  });
})(jQuery);
// ==================   load more =================//
(function ($) {
  $(document).ready(function () {
    let page = 3;
    $(document).on("click", "#ajax_call", function (e) {
      e.preventDefault();
      console.log("coucou");
      $.ajax({
        url: ajaxVars.url,
        type: "POST",

        data: {
          action: "affichage_plus",
          page: page,
        },
        success: function (result) {
          $("#container").append(result);
          page++;
        },
      });
    });
  });
})(jQuery);

//============================== justine ====================================//

//load more post
// jQuery(function ($) {
//   let page = 1; // Numéro de page initial

//   $("#ajax_call_1").on("click", function () {
//     if (page) {
//       $.ajax({
//         type: "POST",
//         url: ajaxVars.url, // Utilisez l'ajax
//         data: {
//           action: "affichage_plus",
//           page: page,
//         },
//         success: function (response) {
//           $("#container").html(response);
//           page++;
//         },
//       });
//     }
//     return false;
//   });
// });

//===========================  nouveau   =================//
// var page = 2;
// jQuery(function ($) {
//   $("body").on("click", "#ajax_call_1", function () {
//     var data = {
//       action: "affichage_plus",
//       page: page,
//       security: ajaxVars.security,
//     };

//     $.post(ajaxVars.url, data, function (response) {
//       if ($.trim(response) != "") {
//         $(".container__posts").append(response);
//         console.log(response);
//         page++;
//       } else {
//         console.log("pas de photos ");
//       }
//       console.log(response);
//     });
//   });
// });
