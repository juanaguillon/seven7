var $window = $(window);
var $document = $(document);

/* Inicializar Plugins */
function initiPlugins() {
  $(".img-thumbnail-variant-3").imagefill();
  $(".search_result_img").imagefill();

  $("#slick_product_bigger").lightGallery({
    selector: $("a.single_portfolio_link"),
    mode: "lg-fade",
    download: false
  });
}

/**
 * Crear el envio de el mensaje de whatsapp.
 * Se verificará se se envia directamente a la apliacion android o a la aplicación web.
 */
function sendWhatsappMessage() {
  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
    navigator.userAgent
  );
  var tagHrf = $(".whatsapp_link");
  if (tagHrf.length) {
    if (isMobile) {
      var link =
        "whatsapp://send?phone=573505904528&text=Buen día, quiero saber más información";
    } else {
      var link =
        "https:///api.whatsapp.com/send?phone=573505904528&text=Buen día, quiero saber más información";
    }
    tagHrf.attr("href", link);
  }
}

function changeFooterMap() {
  $(".footer_list_p").click(function() {
    if ($(this).data("lat")) {
      initMap({
        lat: $(this).data("lat"),
        lng: $(this).data("lon")
      });
    }
  });
}

/**
 * Cuando se de click eb el item buscar del header, aparece un modal para buscar en la web.
 */
function openModalSearch() {
  $("#search_in_web, .search_in_web a").click(function() {
    $("#modal_search").addClass("show");

    // Evitar multiple listeners.
    $("html, body").off("keydown click");
    $("html").keydown(function(e) {
      if (e.keyCode == 27) {
        $("#modal_search").removeClass("show");
      }
    });
  });

  $(".modal_wrapper, #search_in_web, .search_in_web").click(function(e) {
    e.stopPropagation();
  });
}

/**
 * Cuando se dé click en distribuidores del header, se moestrara el modal con texto de "página deshabilidata."
 *  */
function openModalDisablePage() {
  $("#show_distribuidores").click(function(e) {
    e.stopPropagation();
    e.preventDefault();

    $("#modal_link_broke").addClass("show");
  });
  $("body").click(function(e) {
    $(".modal").removeClass("show");
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
        $(".show_when_load").addClass("showing");
        $(".hide_when_load").addClass("hiding");
      }
    });
  });
}

/** Cuando se envie el formulario de contacto */
function loadContactAjax() {
  $("#send_form").click(function(event) {
    event.preventDefault();
    $("#contact_form_loading").css("display", "block");
    var nombre = $("#contact-name").val(),
      email = $("#contact-email").val(),
      cedula = $("#contact-cedula").val(),
      phone = $("#contact-phone").val(),
      message = $("#contact-message").val(),
      ciudad = $("#contact-ciudad").val(),
      pais = $("#contact-pais").val();

    var allVals = new Array(
      nombre,
      email,
      cedula,
      phone,
      message,
      ciudad,
      pais
    );

    for (var i = 0; i < allVals.length; i++) {
      if (allVals[i] === "") {
        $("#contact_form_loading").css("display", "none");
        $("#contact_error_alert").text("Todos los campos son requeridos");
        $("#contact_form_messaje_error").css("display", "block");
        return false;
      }
    }
    $.ajax({
      url: ajaxURL,
      method: "POST",
      data: {
        action: "seven_mail",
        form_nombre: nombre,
        form_email: email,
        form_cedula: cedula,
        form_telefono: phone,
        form_mensaje: message,
        form_ciudad: ciudad,
        form_pais: pais
      },
      success: function(ev) {
        alert("Se envió");
        console.log(ev);
        $("#contact_form_loading").css("display", "none");
        if (ev == 1) {
          $("#contact_form_messaje_error").css("display", "none");
          $("#contact_form_messaje_success").css("display", "block");
        } else {
          $("#contact_error_alert").text(
            " Ha ocurrido un error, intente nuevamente mas tarde."
          );
          $("#contact_form_messaje_error").css("display", "block");
        }
      },
      error: function() {
        $("#contact_error_alert").text(
          " Ha ocurrido un error, intente nuevamente mas tarde."
        );
        $("#contact_form_loading").css("display", "none");
        $("#contact_form_messaje_error").css("display", "block");
      }
    });
  });
}

function makeTabsInPolicy() {
  $(".tabs_toggle a").click(function() {
    $(".tabs_toggle a").removeClass("active");
    $(this).addClass("active");
    var tabToggle = $(this).data("toggle");
    var newDiv = $("#" + tabToggle);
    $(".tab-pane").removeClass("active");
    newDiv.addClass("active");
  });
}

/**
 * Inicializar los filtros de las colecciones, ( categoria, talla, color, material)
 */
function initSelectFilter() {
  var tallaHTML = $("#filter_talla_select");
  var colorHTML = $("#filter_color_select");
  var materialHTML = $("#filter_material_select");
  var categoriaHTML = $("#filter_category_select");

  var talla = tallaHTML.val();
  var color = colorHTML.val();
  var material = materialHTML.val();
  var categoria = categoriaHTML.val();
  var urlParams = new URLSearchParams();
  $(
    "#filter_talla_select, #filter_color_select, #filter_material_select,#filter_category_select"
  ).on("change", function() {
    if (
      color === "null" &&
      talla === "null" &&
      material === "null" &&
      categoria === "null"
    ) {
      // Si se está accediendo desde portafolio.
      // En teoria, es cuando no se haya hecho un filtro anterior a el actual.
      window.location.href = $(this).val();
    } else {
      if (talla != "null") {
        urlParams.set(
          "talla",
          tallaHTML.children("option:selected").attr("data-termid")
        );
      }
      if (color != "null") {
        urlParams.set(
          "color",
          colorHTML.children("option:selected").attr("data-termid")
        );
      }
      if (material != "null") {
        urlParams.set(
          "material",
          materialHTML.children("option:selected").attr("data-termid")
        );
      }
      if (categoria != "null") {
        urlParams.set(
          "category",
          categoriaHTML.children("option:selected").attr("data-termid")
        );
      }

      urlParams.set(
        $(this).data("prop"),
        $(this)
          .children("option:selected")
          .data("termid")
      );

      // La variable "pages" se puede encontrar en el header.php
      window.location.href = pages["productos"] + "?" + urlParams.toString();
    }
  });
}

/**
 * Comportamiento de eliminar filtros actuales en la página "productos"
 */
function removeFiltersActuals() {
  $(".data_filters li i").click(function() {
    var urlParams = new URLSearchParams(window.location.search);
    urlParams.delete(
      $(this)
        .closest("li")
        .data("category")
    );
    console.log(
      $(this)
        .closest("li")
        .data("category")
    );
    window.location.href = pages.productos + "?" + urlParams.toString();
  });
}

function policySelectBehiavor() {
  $("#policy_select").change(function() {
    var tab = $(this).val();
    $(".tab-pane").removeClass("active");
    $("#" + tab).addClass("active");
  });
}

/**
 * Mostrar la tabla de dimensiones en la ficha de producto interna.
 */
function showTableDimensions() {
  $("#show_medida_table").click(function(e) {
    e.preventDefault();
    e.stopPropagation()
    $("#medida_table_wrap").addClass("show");
  });
}

$window.on("load", function() {
  initiPlugins();
  makePaginatorAjax();
  loadContactAjax();
  makeTabsInPolicy();
  policySelectBehiavor();
  initSelectFilter();
  removeFiltersActuals();
  sendWhatsappMessage();
  openModalSearch();
  openModalDisablePage();
  changeFooterMap();
  showTableDimensions();
  $(".show_when_load").addClass("showing");
  $(".hide_when_load").addClass("hiding");
});
