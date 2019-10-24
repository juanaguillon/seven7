<section class="pre-footer-corporate bg-image-7 bg-overlay-darkest">
  <div class="container">
    <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
      <div class="col-sm-10 col-md-6 col-lg-3 "><a class="brand" href="index.html"><img src="<?php echo get_template_directory_uri() ?>/images/logo_white.svg" alt="" width="108" height="40" srcset="<?php echo get_template_directory_uri() ?>/images/logo_white.svg 2x" /></a>
        <p><?php the_field("seccion_footer_descripcion", "option") ?></p>
        <div class="contacto-redes redes-footer">
          <a href="https://www.facebook.com/SEVENSIETEJEANS/" target="_blank" class="fa fa-facebook"></a>
          <a href="https://www.instagram.com/seven7jeans_oficial/?hl=es-la" target="_blank" class="fa fa-instagram"></a>
          <a href="#" target="_blank" class="fa fa-whatsapp whatsapp_link" id=""></a>
          <a href="https://www.youtube.com/channel/UC22AYpiP_UcoAJHxiW5HOKQ" target="_blank" class="fa fa-youtube"></a>
        </div>
        <div class="marca-colombia">
          <img src="<?php echo home_url() ?>/wp-content/uploads/2019/09/marca-pais-colombia-blanco.png" alt="">
        </div>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-2 ">
        <h6>Navegación</h6>
        <ul class="list-xxs list-primary">
          <li>
            <a href="<?php echo esc_attr(home_url()) ?>">Inicio</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(590) ?>">Blog</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(65) ?>">Nosotros</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(9) ?>">Colecciones</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(49) ?>">Catálogo</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(11) ?>">Políticas</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(53) ?>">Contacto</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-4 ">
        <h6>Contacto</h6>
        <ul class="list-xs footer_list_contact">
          <?php
          $lis = get_field("seccion_footer_contacto", "option");
          foreach ($lis as $li) : ?>
            <li>
              <span><?php echo $li["titulo_de_contacto"]; ?></span>
              <?php
                if ($li["latitud_de_mapa"] !== "") {
                  $attrsNew = "data-lat='{$li["latitud_de_mapa"]}' data-lon='{$li["longitud_de_mapa"]}'";
                  $className = "footer_list_p";
                } else {
                  $className = "";
                  $attrsNew = "";
                }

                ?>

              <p class="<?= $className ?>" <?= $attrsNew ?>>
                <?php
                  $isWhatsapp = false;
                  if (strtolower(str_replace(" ", "", $li["titulo_de_contacto"])) == "whatsapp") {
                    $isWhatsapp = true;
                  }
                  ?>

                <?php
                  echo $isWhatsapp ? "<a class='footer_list_link whatsapp_link' target='blank'>" : "";

                  $textCon = $li["texto_de_contacto"];
                  $textArr = explode("|", $textCon);
                  foreach ($textArr as $key => $value) {
                    if ($key !== 0) {
                      echo "<br>";
                    }

                    echo $value;
                  }

                  echo $isWhatsapp ? " </a>" : "";

                  ?>
              </p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-3 ">
        <div class="google-map-footer" id="map_foot">
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer-corporate bg-gray-darkest">
  <div class="container">
    <div class="footer-corporate__inner">
      <p class="rights"><span>Seven7Jeans</span><span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span>.
        Todos los derechos reservados <a href="privacy-policy.html">Terminos de uso y política de Privacidad</a></p>
    </div>
  </div>
</footer>
</div>
<!-- Modal login window-->
<div class="modal fade" id="modal_link_broke" role="dialog">
  <div class="modal-dialog modal-dialog_custom">
    <!-- Modal content-->
    <div class="modal-dialog__inner">
      <button class="close" type="button"></button>
      <div class="modal-dialog__content">
        <h5>Link deshabilitado</h5>
        <!-- RD Mailform-->
        <p>Actualmente estamos haciendo unas moficicaciones a este link, pronto estará disponible</p>
        <button class="btn btn-primary web-btn">Aceptar</button>

      </div>
    </div>
  </div>
</div>

<div id="modal_search" class="modal_container">
  <div class="modal_wrapper">
    <div class="modal_inner">
      <form action="<?php echo home_url() ?>">

        <input type="text" name="s" class="modal_input_text form-control stepper-input" placeholder="Buscar en web">
        <input type="submit" value="Buscar" class="web-btn button mt-2 mx-auto">
      </form>
    </div>
  </div>
</div>

<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
<script src="<?php echo get_template_directory_uri() ?>/js/core.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/custom.core.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Seven7 Jeans Levanta Cola",
    "url": "<?php echo get_home_url() ?>",
    "sameAs": [
      "https://www.instagram.com/seven7jeans_oficial",
      "https://www.facebook.com/852937958066715"
    ]
  }
</script>
</body><!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
</script>

<script>
  function initMap(latOptions) {

    if (!latOptions) {
      var latOptions = {

        lat: 4.598914,
        lng: -74.079264

      };
    }


    var mapFoot = new google.maps.Map(document.getElementById('map_foot'), {

      zoom: 16,

      disableDefaultUI: true,

      gestureHandling: 'greedy',

      // scrollwheel: false,

      center: latOptions,

      // styles: color1,

      // draggable: false

    });

    var markerFoot = new google.maps.Marker({

      position: latOptions,

      map: mapFoot

    });

    /*MAP NOSOTROS*/

    /*marker.addListener('click', function () {

      infowindow.open(map, marker);

    });*/

  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL38SPiX3ET5uymp-IWbCS2eDio-O_a8A&callback=initMap"></script>
<!-- End Google Tag Manager -->
<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  window.fbAsyncInit = function() {
    FB.init({
      appId: 495223124376380,
      autoLogAppEvents: true,
      xfbml: true,
      version: 'v3.3'
    });
    FB.AppEvents.logPageView();
  };
  (function($) {
    $('.facebook_share').on('click', function(event) {

      event.preventDefault();
      event.stopImmediatePropagation();

      var linkshare = window.location.href;
      var titleshare = $(this).data("nombre");
      var descripshare = $(this).data("descrip");
      var imgshare = $(this).data("urlimg");
      var FBDesc = descripshare;
      var FBTitle = titleshare;
      var FBLink = linkshare;
      var FBPic = imgshare;
      FB.ui({
        method: 'share',
        action_type: 'og.likes',
        mobile_iframe: true,
        action_properties: JSON.stringify({
          object: {
            'og:url': FBLink,
            'og:title': FBTitle,
            'og:description': FBDesc,
            'og:image': FBPic
          }
        })
      }, function(response) {})
    })
  })(jQuery);
</script>

</html>