var $window = $(window);
var $document = $(document);

/* Inicializar Plugins */
function initiPlugins() {
  $(".img-thumbnail-variant-3").imagefill();
  // $("#slick_product_bigger").lightGallery({
  //   selector: $("a.single_portfolio_link")
  // });
  $("#slick_product_bigger").lightGallery({
    selector: $("a.single_portfolio_link"),
    mode: "lg-fade",
    download: false
  });
}

/** Crear el paginador en el portafolio, taxonomia, categoria, etc.
 *
 */
function makePaginatorAjax() {
  $(".classic_paginator_item").click(function(e) {
    e.preventDefault();
    var page = $(this).data("page");
    var posts_per_page = $("#curremt_posts_per_page").val();

    // Condicional ternaria en portafolio. En esta página no existe taxonomia
    var taxonomy =
      $("#current_taxonomy").val() !== ""
        ? $("#current_taxonomy").val()
        : "empty";

    // Condicional ternaria en portafolio. En esta página no existe termID
    var termid =
      $("#current_term_id").val() !== ""
        ? $("#current_term_id").val()
        : "empty";

    $.ajax({
      // ajaxURL se puede encontrar en el archivo header.php
      url: ajaxURL,
      method: "POST",
      data: {
        action: "seven_paginator_works",
        page: page,
        posts_per_page: posts_per_page,
        taxonomy: taxonomy,
        termid: termid
      },
      success: function(data) {
        $("#products_ajax_paginator").html(data);
        $(".img-thumbnail-variant-3").imagefill();
      }
    });
  });
}

/** Cuando se envie el formulario de contacto */
function loadContactAjax() {
  $("#send_form").click(function(event) {
    event.preventDefault();
    $("#contact_form_loading").css("display", "block");
    $.ajax({
      url: ajaxURL,
      method: "POST",
      data: {
        action: "seven_mail",
        form_nombre: $("#contact-name").val(),
        form_email: $("#contact-email").val(),
        form_cedula: $("#contact-cedula").val(),
        form_telefono: $("#contact-phone").val(),
        form_mensaje: $("#contact-message").val()
      },
      success: function(ev) {
        $("#contact_form_loading").css("display", "none");
        if (ev == 1) {
          $("#contact_form_messaje_success").css("display", "block");
        } else {
          $("#contact_form_messaje_error").css("display", "block");
        }
      },
      error: function() {
        $("#contact_form_loading").css("display", "none");
        $("#contact_form_messaje_error").css("display", "block");
      }
    });
  });
}

$window.on("load", function() {
  initiPlugins();
  makePaginatorAjax();
  loadContactAjax();
});
