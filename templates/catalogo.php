<?php /* Template Name: Catalogo */ ?>
<?php get_header() ?>
<section>
  <section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean007.jpg">
    <div class="parallax-content parallax-header">
      <div class="parallax-header__inner context-dark">
        <div class="parallax-header__content">
          <div class="container">
            <div class="row justify-content-sm-center">
              <div class="col-md-10 col-xl-8">
                <h2 class="heading-decorated">Nuestro Catálogo</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</section>
<section class="bg-default section-md">
  <div class="container colecciones">



    <?php
    $breadData = array(
      "Inicio" => home_url(),
      "Actual" => "Portafolio"
    );
    seven_breadcrumb($breadData);

    $colleciones = new WP_Query(array(
      "post_type" => "colleciones",
      "posts_per_page" => -1,
    ));
    $i = 0;
    foreach ($colleciones->posts as $col) :
      ?>
      <div class="row <?php if ($i % 2) echo "flex-row-reverse" ?>">
        <div class="col-sm-12 col-lg-4 coleccion-info">
          <div class="t-coleccion">
            <?php
              $cuImage = get_field("icono_de_coleccion", $col);
              $alt = $cuImage["alt"];
              $img = $cuImage["url"];
              ?>
            <img src="<?php echo $img ?>" alt="<?php echo $alt ?>">
            <h3><?php echo $col->post_title; ?></h3>
          </div>

          <p><?php echo $col->post_content; ?></p>

          <a href="<?php echo get_field("pdf_de_coleccion", $col)["url"] ?>" target="_blank" class="descargar-btn button">Descargar <img src="<?php echo get_template_directory_uri() ?>/images/descargar_1.svg" alt=""></a>
        </div>
        <div class="col-sm-12 col-lg-8">

          <a target="_blank" href="<?php echo get_field("pdf_de_coleccion", $col)["url"] ?>" class="coleccion-img img-thumbnail-variant-3">
            <img src="<?php echo get_the_post_thumbnail_url($col, "full") ?>" alt="">
            <div class="caption">

              <span class="icon hover-top-element linear-icon-folder-picture"></span>

              <p class="heading-5 hover-top-element"><?php echo $col->post_title; ?></p>

              <div class="divider"></div>

              <p class="small hover-bottom-element">Descargar</p>


            </div>
          </a>

        </div>
      </div>

    <?php
      $i++;
    endforeach;

    ?>


  </div>
</section>
<!-- Modal-->

<!-- Page Footer-->

<?php get_footer() ?>