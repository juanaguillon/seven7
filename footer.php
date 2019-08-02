<section class="pre-footer-corporate bg-image-7 bg-overlay-darkest">
  <div class="container">
    <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
      <div class="col-sm-10 col-md-6 col-lg-3 "><a class="brand" href="index.html"><img src="<?php echo get_template_directory_uri() ?>/images/logo_white.svg" alt="" width="108" height="40" srcset="<?php echo get_template_directory_uri() ?>/images/logo_white.svg 2x" /></a>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem natus numquam quo quibusdam blanditiis non ex error quae corrupti accusantium nam excepturi, modi ad fuga animi, officiis ea voluptatum libero molestiae assumenda nulla deleniti ipsa quidem. Inventore quaerat nostrum possimus amet, placeat tempora ut tenetur autem! Magni ea voluptatum illo.</p>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-2 ">
        <h6>Navigation</h6>
        <ul class="list-xxs list-primary">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Nosotros</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Catálogo</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-4 ">
        <h6>Contacto</h6>
        <ul class="list-xs">
          <li>
            <dl class="list-terms-minimal">
              <dt>Dirección</dt>
              <dd>C.C. Visto - Av. Caracas #9 - 48 Local 1011</dd>
              <dd>C.C. Gran San - Carrera 10 # 9 - 37 Local 2243</dd>
              <dd>Gran Centro Mayoritsta - Cra 24 # 15 – 61</dd>
              <dd>C.C. Astrocentro 24 Local 8 Primer piso</dd>
            </dl>
          </li>
          <li>
            <dl class="list-terms-minimal">
              <dt>Teléfonos</dt>
              <dd>
                <ul class="list-semicolon">
                  <li><a href="tel:#">(1) 744 28 35 - (+57) 321 264 2361</a></li>
                  <li><a href="tel:#">(800) 123-0045 - (+57) 321 348 0784</a></li>
                </ul>
              </dd>
            </dl>
          </li>
          <li>
            <dl class="list-terms-minimal">
              <dt>E-mail</dt>
              <dd>mercadeoycomunicacionseven7@gmail.com</dd>
              <dd>gerenciaseven7@hotmail.com</dd>
            </dl>
          </li>
          <li>
            <dl class="list-terms-minimal">
              <dt>Abierto de:</dt>
              <dd>Todos los días: 8am - 8pm</dd>
            </dl>
          </li>
        </ul>
      </div>
      <div class="col-sm-10 col-md-6 col-lg-3 ">
        <div class="google-map-footer">
          <!-- RD Google Map-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.024927258388!2d-74.10792798523809!3d4.589549496665709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9942302896cb%3A0x102b6cdea4c0bbf8!2sSEVEN+7+JEANS+SAS!5e0!3m2!1ses-419!2sco!4v1564756224739!5m2!1ses-419!2sco" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
      <ul class="list-inline-xxs">
        <li><a class="icon icon-xxs icon-gray-darker fa fa-facebook" href="#"></a></li>
        <li><a class="icon icon-xxs icon-gray-darker fa fa-twitter" href="#"></a></li>
        <li><a class="icon icon-xxs icon-gray-darker fa fa-google-plus" href="#"></a></li>
        <li><a class="icon icon-xxs icon-gray-darker fa fa-vimeo" href="#"></a></li>
        <li><a class="icon icon-xxs icon-gray-darker fa fa-youtube" href="#"></a></li>
        <li><a class="icon icon-xxs icon-gray-darker fa fa-pinterest" href="#"></a></li>
      </ul>
    </div>
  </div>
</footer>
</div>
<!-- Modal login window-->
<div class="modal fade" id="modalLogin" role="dialog">
  <div class="modal-dialog modal-dialog_custom">
    <!-- Modal content-->
    <div class="modal-dialog__inner">
      <button class="close" type="button" data-dismiss="modal"></button>
      <div class="modal-dialog__content">
        <h5>Login Form</h5>
        <!-- RD Mailform-->
        <form class="rd-mailform rd-mailform_responsive">
          <div class="form-wrap form-wrap_icon linear-icon-envelope">
            <input class="form-input" id="modal-login-email" type="email" name="email" data-constraints="@Email @Required">
            <label class="form-label" for="modal-login-email">Your e-mail</label>
          </div>
          <div class="form-wrap form-wrap_icon linear-icon-lock">
            <input class="form-input" id="modal-login-password" type="password" name="password" data-constraints="@Required">
            <label class="form-label" for="modal-login-password">Your password</label>
          </div>
          <button class="button button-primary" type="submit">Login</button>
        </form>
        <ul class="list-small">
          <li><a href="#">Forgot your username?</a></li>
          <li><a href="#">Forgot your password?</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Modal register window-->
<div class="modal fade" id="modalRegister" role="dialog">
  <div class="modal-dialog modal-dialog_custom">
    <!-- Modal content-->
    <div class="modal-dialog__inner">
      <button class="close" type="button" data-dismiss="modal"></button>
      <div class="modal-dialog__content">
        <h5>Register Form</h5>
        <!-- RD Mailform-->
        <form class="rd-mailform rd-mailform_responsive" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
          <div class="form-wrap form-wrap_icon linear-icon-envelope">
            <input class="form-input" id="modal-register-email" type="email" name="email" data-constraints="@Email @Required">
            <label class="form-label" for="modal-register-email">Your e-mail</label>
          </div>
          <div class="form-wrap form-wrap_icon linear-icon-lock">
            <input class="form-input" id="modal-register-password" type="password" name="password" data-constraints="@Required">
            <label class="form-label" for="modal-register-password">Your password</label>
          </div>
          <div class="form-wrap form-wrap_icon linear-icon-lock">
            <input class="form-input" id="modal-register-password2" type="password" name="password2" data-constraints="@Required">
            <label class="form-label" for="modal-register-password2">Confirm password</label>
          </div>
          <div class="form-wrap">
            <label class="checkbox-inline">
              <input type="checkbox" name="remember">Remember me
            </label>
          </div>
          <button class="button button-primary" type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
<script src="<?php echo get_template_directory_uri() ?>/js/core.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>
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
<!-- End Google Tag Manager -->

</html>