<?php get_header() ?>
<section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/404-page.jpg">
  <div class="parallax-content parallax-header text-center">
    <div class="parallax-header__inner context-dark">
      <div class="parallax-header__content">
        <div class="container">
          <div class="row justify-content-sm-center">
            <div class="col-md-10 col-xl-8">
              <div class="section-xxl">
                <h2>Página no encontrada</h2>
                <p>La página que estás buscando no se ha encontrado, intenta navegar, o puedes ir a el inicio.</p><a class="button button-black button-shadow" href="<?php echo home_url() ?>">Atras</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>