//==============  filtres  ===========================//
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
