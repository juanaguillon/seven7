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

/**
 * Cuando se de click eb el item buscar del header, aparece un modal para buscar en la web.
 */
function openModalSearch() {
  $("#search_in_web").click(function() {
    $("#modal_search").addClass("show");

    // Evitar multiple listeners.
    $("html, body").off("keydown click");
    $("html").keydown(function(e) {
      if (e.keyCode == 27) {
        $("#modal_search").removeClass("show");
      }
    });
    $("body").click(function(e) {
      $("#modal_search").removeClass("show");
    });
  });

  $(".modal_wrapper, #search_in_web").click(function(e) {
    e.stopPropagation();
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

// function makeTabsInPolicy(){
//   $("#tabs_policy a").click(function(){
//     $("#tabs_policy a").removeClass("active")
//     $(this).addClass("active")
//     var tabToggle = $(this).data("toggle");
//     var newDiv = $("#" + tabToggle);
//     $(".tab-pane").removeClass("active")
//     newDiv.addClass("active")
//   })
// }

function initSelectFilter() {
  $("#filter_talla_select, #filter_color_select, #filter_material_select").on(
    "change",
    function() {
      window.location.href = $(this).val();
    }
  );
}

$window.on("load", function() {
  initiPlugins();
  makePaginatorAjax();
  loadContactAjax();
  initSelectFilter();
  openModalSearch();
  $(".show_when_load").addClass("showing");
  $(".hide_when_load").addClass("hiding");
});
