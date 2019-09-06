/**
 * props.fullWidth: (bool>false) Permitir que la lista este a 100% del contenedor.
 *
 * @param {string} selectorSelect Selector de el select a ser procesado
 * @param {any[]} props Objeto para personalizar el select.
 *
 */
function sevenSelect(selectorSelect, props = {}) {
  var select = document.querySelector("select#" + selectorSelect),
    childs = select.childNodes,
    list = [];

  for (var i = 0; i < childs.length; i++) {
    var children = childs[i];
    if (children.nodeName == "OPTION") {
      list.push(children);
    }
  }
  var divElm = document.createElement("div");
  divElm.className = "seven_select_wrap";
  divElm.setAttribute("id", selectorSelect + "_prsel");
  var htmlResult = "";
  htmlResult =
    '<div class="seven_select_wrap_rel"><span>Seleccionar</span><i class="icon-down"></i></div>';
  if (props.fullWidth) {
    htmlResult += '<div style="width:100%" class="seven_select_list"><ul>';
  } else {
    htmlResult += '<div class="seven_select_list"><ul>';
  }
  for (var j = 0; j < list.length; j++) {
    htmlResult += "<li data-label='" + j + "'>" + list[j].textContent + "</li>";
  }
  htmlResult += '</ul></div><div class="seven_select_vals"><ul>';

  for (var j = 0; j < list.length; j++) {
    htmlResult +=
      "<li  data-value='" +
      j +
      "'>" +
      list[j].textContent +
      "<i class='icon-close prime_close_val'></i></li>";
  }
  htmlResult += "</ul></div>";

  divElm.innerHTML = htmlResult;
  select.parentNode.insertBefore(divElm, select.nextSibling);
  select.style.position = "absolute";
  select.style.opacity = "0";
  select.style.zIndex = "-10";
}

/**
 * Llame esta funciÃ³n cuando acabe de inicializar todos los selects.
 */
function afterInitsevenSelect() {
  var variables = {
    selectContainer: "seven_select_wrap_rel",
    selectwrap: "seven_select_wrap",
    selectList: "seven_select_list"
  };
  var wrapSelect = document.querySelectorAll("." + variables.selectContainer);
  for (var i = 0; i < wrapSelect.length; i++) {
    var elm = wrapSelect[i];
    elm.addEventListener("click", function(evn) {
      var items = this.nextElementSibling;
      items.classList.toggle("showing");
    });
  }
  var wrapSelectAll = document.querySelectorAll("." + variables.selectwrap);
  for (var i = 0; i < wrapSelectAll.length; i++) {
    var elm = wrapSelectAll[i];
    elm.addEventListener("click", function(evn) {
      evn.stopPropagation();
    });
  }

  var prList = document.querySelectorAll("." + variables.selectList);
  for (var i = 0; i < prList.length; i++) {
    var element = prList[i];
    var ul = null; // Obtener UL

    for (var x = 0; x < element.childNodes.length; x++) {
      if (element.childNodes[x].nodeName === "UL") {
        ul = element.childNodes[x];
      }
    }
    for (var j = 0; j < ul.childNodes.length; j++) {
      if (ul.childNodes[j].nodeName === "LI") {
        ul.childNodes[j].addEventListener("click", function(evt) {
          this.parentNode.parentNode.classList.remove("showing");

          this.classList.add("li_active");
          var dataLabel = this.getAttribute("data-label");

          // Obtener todos los li seleccionados. Estos son los recuadros azules que aparecen despues del select.
          var listVals = this.closest("." + variables.selectList)
            .nextElementSibling.childNodes;
          var ulx = null;

          for (var x = 0; x < listVals.length; x++) {
            if (listVals[x].nodeName == "UL") {
              ulx = listVals[x];
            }
          }
          var prliVals = ulx.childNodes;
          for (var k = 0; k < prliVals.length; k++) {
            if (prliVals[k].nodeName === "LI") {
              if (prliVals[k].getAttribute("data-value") == dataLabel) {
                prliVals[k].classList.add("showing");
              }
            }
          }
        });
      }
    }
  }

  // Cuando se de click en el icono "x" de los iconos seleccionados
  var closes = document.querySelectorAll(".prime_close_val");
  for (var i = 0; i < closes.length; i++) {
    var currentClose = closes[i];
    currentClose.addEventListener("click", function(evt) {
      var parentLi = this.parentElement;
      var dataValue = parentLi.getAttribute("data-value");
      parentLi.classList.remove("showing");
      var selectUlList = this.parentElement.parentElement.parentElement
        .previousElementSibling;
      var ulx = null;
      for (var x = 0; x < selectUlList.childNodes.length; x++) {
        if (selectUlList.childNodes[x].nodeName == "UL") {
          ulx = selectUlList.childNodes[x];
        }
      }
      // console.log(ulx)
      var listSelectUL = ulx.childNodes;
      for (var j = 0; j < listSelectUL.length; j++) {
        if (listSelectUL[j].nodeName === "LI") {
          if (_fn.hasClass(listSelectUL[j], "no_label")) {
            return;
          }
          if (listSelectUL[j].getAttribute("data-label") == dataValue) {
            listSelectUL[j].classList.remove("li_active");
          }
        }
      }
    });
  }

  document.body.addEventListener("click", function() {
    for (var i = 0; i < prList.length; i++) {
      var elm = prList[i];
      elm.classList.remove("showing");
    }
  });
}

function reIntitsevenSelect(selectorSelect) {
  var divSelect = document.getElementById(selectorSelect + "_prsel");
  if (divSelect) {
    divSelect.parentNode.removeChild(divSelect);
    sevenSelect(selectorSelect);
    afterInitsevenSelect();
  }
}
