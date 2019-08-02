<?php /* Template Name: Contacto */ ?>
<?php get_header() ?>
<section>
  <section class="section parallax-container context-dark header-contacto" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean043.jpg">
    <div class="parallax-header">
      <div class="parallax-header__inner context-dark">
        <div class="parallax-header__content">
          <div class="container">
            <div class="row justify-content-sm-center">
              <div class="col-md-10 col-xl-8">
                <h2 class="heading-decorated">Contáctanos</h2>
                <span>Get in touch with us, don't be shy any advice or dude you have tell us</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</section>
<section class="bg-default section-md">
  <div class="container formulario-contacto">
    <div class="row">
      <div class=" col-sm-12 col-md-7 margin-b5">
        <h3>Enviar mensaje</h3>
        <form action="/action_page.php">
          <div class="row m-0">
            <div class="form-group col-sm-12 col-md-6">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="">
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <label for="">Apellido</label>
              <input type="text" class="form-control" id="">
            </div>

          </div>
          <div class="row m-0">
            <div class="form-group col-6">
              <label for="phone">Numero celular</label>
              <input type="text" class="form-control" id="">
            </div>
            <div class="form-group col-6">
              <label for="pwd">Email</label>
              <input type="email" class="form-control" id="email">
            </div>

          </div>
          <div class="row m-0">
            <div class="form-group col-12">
              <label for="name">Vienes de una compañia ?</label>
              <input type="text" class="form-control" id="">
            </div>

            <div class="col-12">
              <label for="name">Como te podemos ayudar</label>
              <textarea rows="6" name="comment" class="form-control"></textarea>
            </div>

            <div class="col-12">
              <button class="web-btn button">Enviar</button>
            </div>

          </div>


        </form>

      </div>

      <div class=" col-sm-12 col-md-5">
        <div class="row">
          <div class="col-md-12">
            <h3>Infomación de contacto</h3>
            <div class="contacto-info">
              <span>Telefono: 018000315</span>
              <span>Email: Someemail@gmail.com</span>
              <div class="contacto-redes">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-youtube"></a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.024897463485!2d-74.10792798527311!3d4.589554843889284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9942302896cb%3A0x102b6cdea4c0bbf8!2sSEVEN+7+JEANS+SAS!5e0!3m2!1ses-419!2sco!4v1564511414497!5m2!1ses-419!2sco" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>

      </div>
    </div>


  </div>
</section>
<!-- Modal-->
<!-- Page Footer-->

<?php get_footer() ?>