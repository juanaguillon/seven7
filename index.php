<?php

/** Template Name: Index */

get_header();

function hone_shortcode()
{
  ob_start();
  $current_object = get_queried_object();

  ?>

  <div class="swiper-container swiper-slider context-dark swiper-slider_fullheight" data-effect="cropping-circle" data-loop="true" data-direction="vertical" data-autoplay="5500" data-speed="1200" data-mousewheel="false" data-keyboard="true" data-frame-bg="<?php echo get_template_directory_uri() ?>/images/slider-slide-10-1920x1080.jpg">
    <div class="black_background"></div>
    <div id="swipper_wrapper" class="swiper-wrapper">
      <?php
        $sliders = get_field("seccion_banner", $current_object);
        foreach ($sliders as $slider) :
          ?>

        <div class="swiper-slide">
          <div class="swiper-slide-img" style="background-image: url(<?php echo $slider["imagen"]["url"] ?>);"></div>
          <div class="swiper-slide-caption text-left">
            <h3 class="text-transform-none slider_title" data-swiper-anime="{ &quot;animation&quot;: &quot;swiperContentFade&quot;, &quot;duration&quot;: 600, &quot;delay&quot;: 500 }">
              <?php echo $slider["texto"] ?></h3>
            <a href="<?php echo  $slider["link_de_boton"]["url"] ?>" class="button slider_button"><?php echo $slider["texto_de_boton"] ?></a>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
    <div class="swiper-button-prev linear-icon-chevron-left"></div>
    <div class="swiper-button-next linear-icon-chevron-right"></div>
  </div>
  <!-- Our Services-->
  <section class="section-md bg-default text-center" id="features">
    <div class="container">
      <h2 class="heading-decorated">BIENVENIDOS</h2>
      <div class="row row-50 justify-content-md-center justify-content-lg-start">
        <?php
          $welcome = get_field("seccion_bienvenidos", $current_object);
          foreach ($welcome as $wc) : ?>
          <div class="col-md-6 col-lg-4">
            <!-- Blurb circle-->
            <article class="blurb blurb-minimal">
              <div class="unit flex-row unit-spacing-md">
                <div class="unit-left">
                  <div class="blurb-minimal__icon">
                    <span class="general_icon welcome_icon">
                      <img src="<?php echo $wc["icono"]["sizes"]["medium"] ?>" alt="<?php echo $wc["icono"]["alt"] ?>">
                    </span>
                  </div>
                </div>
                <div class="unit-body">
                  <p class="blurb__title"><a class="heading-6" href="#"><?php echo $wc["titulo"] ?></a></p>
                  <p><?php echo $wc["descripcion"] ?></p>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <!-- About us-->
  <section class="bg-gray-lighter section-lg decor-text" data-content="Nosotros">

    <div class="container">
      <div class="row justify-content-md-center justify-content-lg-between row-50 align-items-center">
        <div class="col-lg-6">
          <h2 class="heading-decorated">Nosotros</h2>
          <p><?php echo get_field("seccion_nosotros_desc", $current_object) ?></p>
          <div class="row row-30">

            <div class="col-6">
              <!-- Blurb minimal-->
              <article class="blurb">
                <ul class="list-marked-primary">
                  <?php
                    $weList = get_field("seccion_nosotros_lista", $current_object);
                    $weList = explode(",", $weList);
                    $count = count($weList);
                    $allList1 = array_slice($weList, 0, $count / 2);
                    $allList2 = array_slice($weList, $count / 2);


                    foreach ($allList2 as $al2) :
                      ?>
                    <li><?php echo $al2 ?></li>
                  <?php endforeach; ?>

                </ul>
                <a class="button button-primary" href="<?php echo get_permalink(65) ?>">Saber Más</a>
              </article>
            </div>
            <div class="col-6">
              <!-- Blurb minimal-->
              <article class="blurb">
                <ul class="list-marked-primary">
                  <?php
                    foreach ($allList1 as $al1) : ?>
                    <li><?php echo $al1 ?></li>
                  <?php endforeach; ?>
                </ul>
              </article>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-6 image-none">
          <figure class="image-sizing-1 nosotros_global_figure">
            <?php $image = get_field("seccion_nosotros_imagen", $current_object) ?>
            <img src="<?php echo $image["url"] ?>" alt="<?php echo $image["alt"] ?>" width="391" height="642" />
          </figure>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-md bg-default text-center">


    <div class="container">
      <h2 class="heading-decorated">Beneficios</h2>
      <div class="row row-50">
        <?php
          $beneficios = get_field("seccion_beneficios", $current_object);
          foreach ($beneficios  as $bnf) : ?>
          <div class="col-md-6">
            <div class="thumbnail-classic-minimal"><img src="<?php echo $bnf["imagen"]["url"] ?>" alt="<?php echo $bnf["imagen"]["alt"] ?>" width="652" height="491" />
              <div class="caption">
                <h5><a class="thumbnail-classic-title" href="single-service.html"><?php echo $bnf["titulo"] ?></a></h5>
                <p><?php echo $bnf["descipcion"] ?></p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>
    </div>
  </section>
  <!-- Call to Action-->
  <!-- <section class="section section-sm context-dark bg-gray-darker section-cta">
      <div class="container">
        <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">
          <div class="col-xl-8 text-xl-left">
            <h2><span class="text-transform-none heading-5">the</span><span
                class="text-transform-none">FUTURE</span><br><span>is a flexible solution with lots of advantages</span>
            </h2>
            <p>Our template offers you a variety of elements to be combined.</p>
          </div>
          <div class="col-xl-2 text-xl-right"><a class="button button-primary" target="_blank" href="#">Get it now</a>
          </div>
        </div>
      </div>
    </section> -->
  <!-- portfolio-->
  <!-- <section class="section-md bg-default text-center">

    <div class="container">
      <h2 class="heading-decorated">COLECCIONES</h2>
      <div class="isotope-wrap row row-70">
        <div class="col-sm-12">
          <?php

            $terms = get_terms(array(
              "taxonomy" => "category",
              "hide_empty" => true,
              "orderby" => "count",
              "order" => "DESC"
            ));


            $categories = new WP_Query(array(
              "post_type" => "productos",
              "posts_per_page" => -1,
              'orderby' => 'rand',
              'order'    => 'ASC',

            ));
            ?>
          <ul class="list-nav isotope-filters isotope-filters-horizontal">
            <li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="#">Todo</a></li>
            <?php
              foreach ($terms as $term) : ?>
              <li><a data-isotope-filter="<?php echo $term->name ?>" data-isotope-group="gallery" href="#"><?php echo $term->name ?></a></li>

            <?php endforeach; ?>
          </ul>
          <div class="isotope row" data-isotope-layout="fitRows" data-isotope-group="gallery">
            <?php
              foreach ($categories->posts as $post) : ?>
              <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="<?php echo get_the_terms($post, "category")[0]->name ?>"><a class="img-thumbnail-variant-3" href="<?php echo get_permalink($post) ?>">
                  <figure>
                    <img class="abs_image_top" src="<?php echo get_the_post_thumbnail_url($post, "medium_large") ?>" alt="<?php echo seven_get_alt_image_by_post($post) ?>" width="418" height="315" />
                  </figure>
                  <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                    <ul class="list-inline-tag hover-top-element">
                      <li><?php echo $post->post_title; ?></li>
                    </ul>
                    <p class="heading-5 hover-top-element"><?php echo get_the_terms($post, "category")[0]->name ?></p>
                    <div class="divider"></div>
                    <p class="small hover-bottom-element">Nuestra Colección</p>
                    <span class="icon arrow-right linear-icon-plus"></span>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="section-md bg-default text-center">

    <div class="container">
      <h2 class="heading-decorated">CATEGORÍAS</h2>
      <div class="isotope-wrap row row-70">
        <?php

          $terms = get_terms(array(
            "taxonomy" => "category",
            "hide_empty" => true,
            "orderby" => "count",
            "order" => "DESC"
          ));

          foreach ($terms as $term) : ?>
          <div class="col-12 col-md-6 col-lg-4 isotope-item"><a class="img-thumbnail-variant-3" href="<?php echo get_term_link($term) ?>">
              <figure>
                <img class="abs_image_top" src="<?php echo get_field("imagen_de_categoria", $term)["url"] ?>" alt="<?php echo get_field("imagen_de_categoria", $term)["alt"]  ?>" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li><?php echo $term->name; ?></li>
                </ul>
                <p class="heading-5 hover-top-element"><?php echo $term->name ?></p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestra Colección</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- get a quote-->

  <section class="section-sm">
    <div class="container">
      <div class="row ultimos-post">
        <div class="col-12">

          <h2 class="text-center mb-4">Últimos Posts</h2>
        </div>

        <?php
          $allNotices = new WP_Query(array(
            "post_type" => "noticia",
            "posts_per_page" => 3
          ));
          foreach ($allNotices->posts as $notice) : ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-12">

            <!-- Post classic-->
            <a style="display:block" href="<?php echo get_permalink($notice) ?>">
              <article class="post-classic post-minimal">
                <div class="image_fill">
                  <img src="<?php echo get_the_post_thumbnail_url($notice, "medium") ?>" alt="<?php echo seven_get_alt_image_by_post($notice) ?>" width="418" height="315" />
                </div>
                <div class="post-classic-title">
                  <h6><?php echo $notice->post_title; ?>
                  </h6>
                  <p class="notice_excerpt"><?php echo $notice->post_excerpt ?></p>
                </div>
                <div class="post-meta">
                  <div class="group">
                    <time datetime="2018"><?php echo get_the_date("M d, Y", $notice) ?></time>
                  </div>
                </div>
              </article>
            </a>
          </div>

        <?php endforeach; ?>

      </div>
    </div>

  </section>

  <section class="bg-gray-lighter object-wrap decor-text" data-content="Contact">
    <div class="section-lg">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-lg-6">
            <h2 class="heading-decorated">Contáctanos</h2>
            <!-- RD Mailform-->
            <form id="contact_form_main" class="rd-mailform rd-mailform_style-1" data-form-output="form-output-global">
              <div class="form-wrap">
                <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-name">Nombre</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="contact-email">E-Mail</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-cedula" type="number" name="number" data-constraints="@Required">
                <label class="form-label" for="contact-cedula">Cédula</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-phone" type="number" name="number" data-constraints="@Required">
                <label class="form-label" for="contact-phone">Teléfono</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-ciudad" type="text" data-constraints="@Required">
                <label class="form-label" for="contact-ciudad">Ciudad</label>
              </div>
              <div class="form-wrap">

                <input class="form-input" id="contact-pais" type="text" data-constraints="@Required">
                <label class="form-label" for="contact-ciudad">Pais</label>

              </div>
              <div class="form-wrap">
                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                <label class="form-label" for="contact-message">Mensaje</label>
              </div>

              <div class="terms_of_data">
                <p class="contact_terms">
                  <?php the_field("texto_de_contacto", "option"); ?>
                </p>

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">He leido y entiendo el trato de datos
                    personales.</label>
                </div>

              </div>

              <div id="contact_form_loading">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>

              <button id="send_form" class="button button-primary" type="submit">Enviar</button>

              <div id="contact_form_messaje_success">
                <div class="alert alert-success" id="contact_success_alert" role="alert">
                  Se ha enviado su mensaje correctamente.
                </div>
              </div>
              <div id="contact_form_messaje_error">
                <div class="alert alert-danger" id="contact_error_alert" role="alert">
                  Ha ocurrido un error, intente nuevamente mas tarde.
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-left bg-image" style="background-image: url(<?php the_field("imagen_de_contacto", "option") ?>)"></div>
  </section>

<?php
  return ob_get_clean();
} // End function 
echo hone_shortcode()
?>


<?php get_footer() ?>