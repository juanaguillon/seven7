<?php

/** Template Name: Index */

get_header();

$current_object = get_queried_object();
?>

<div class="swiper-container swiper-slider context-dark swiper-slider_fullheight" data-effect="cropping-circle" data-loop="true" data-direction="vertical" data-autoplay="5500" data-speed="1200" data-mousewheel="false" data-keyboard="true" data-frame-bg="<?php echo get_template_directory_uri() ?>/images/slider-slide-10-1920x1080.jpg">
  <div class="swiper-wrapper">
    <?php
    $sliders = get_field("seccion_banner", $current_object);
    foreach ($sliders as $slider) : ?>

    <div class="swiper-slide">
      <div class="swiper-slide-img" style="background-image: url(<?php echo $slider["imagen"] ?>);"></div>
      <div class="swiper-slide-caption text-left">
        <h1 class="text-transform-none" data-swiper-anime="{ &quot;animation&quot;: &quot;swiperContentFade&quot;, &quot;duration&quot;: 600, &quot;delay&quot;: 500 }">
          <?php echo $slider["texto"] ?></h1>
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
    <h4 class="heading-decorated">BIENVENIDOS</h4>
    <div class="row row-50 justify-content-md-center justify-content-lg-start">
      <?php
      $welcome = get_field("seccion_bienvenidos", $current_object);
      // printcode($welcome);
      foreach ($welcome as $wc) : ?>
      <div class="col-md-6 col-lg-4">
        <!-- Blurb circle-->
        <article class="blurb blurb-minimal">
          <div class="unit flex-row unit-spacing-md">
            <div class="unit-left">
              <div class="blurb-minimal__icon">
                <span class="general_icon welcome_icon">
                  <img src="<?php echo $wc["icono"] ?>" alt="">
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
<section class="bg-gray-lighter section-lg decor-text" data-content="About">
  <div class="bg-decor d-flex align-items-center justify-content-end" data-parallax-scroll="{&quot;x&quot;: -100, &quot;y&quot;: -30, &quot;smoothness&quot;: 30}"><img src="<?php echo get_template_directory_uri() ?>/images/bg-decor-9.png" alt="" />
  </div>
  <div class="container">
    <div class="row justify-content-md-center justify-content-lg-between row-50 align-items-center">
      <div class="col-lg-6">
        <h4 class="heading-decorated">Nosotros</h4>
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
              <a class="button button-primary" href="single-service.html">Saber Más</a>
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
          <img src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean023.jpg" alt="" width="391" height="642" />
        </figure>
      </div>
    </div>
  </div>
</section>

<section class="section section-md bg-default text-center">
  <div class="bg-decor d-flex align-items-start" data-parallax-scroll="{&quot;x&quot;: 80, &quot;y&quot;: -80,  &quot;smoothness&quot;: 30}"><img src="<?php echo get_template_directory_uri() ?>/images/bg-decor-3.png" alt="" />
  </div>
  <div class="bg-decor d-flex align-items-end" data-parallax-scroll="{&quot;x&quot;: 120, &quot;smoothness&quot;: 60}"><img src="<?php echo get_template_directory_uri() ?>/images/bg-decor-1.png" alt="" />
  </div>
  <div class="container">
    <h4 class="heading-decorated">Beneficios</h4>
    <div class="row row-50">
      <?php
      $beneficios = get_field("seccion_beneficios", $current_object);
      foreach ($beneficios  as $bnf) : ?>
      <div class="col-md-6">
        <div class="thumbnail-classic-minimal"><img src="<?php echo $bnf["imagen"] ?>" alt="" width="652" height="491" />
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
            <h4><span class="text-transform-none heading-5">the</span><span
                class="text-transform-none">FUTURE</span><br><span>is a flexible solution with lots of advantages</span>
            </h4>
            <p>Our template offers you a variety of elements to be combined.</p>
          </div>
          <div class="col-xl-2 text-xl-right"><a class="button button-primary" target="_blank" href="#">Get it now</a>
          </div>
        </div>
      </div>
    </section> -->
<!-- portfolio-->
<section class="section-md bg-default text-center">
  <div class="bg-decor d-flex align-items-center" data-parallax-scroll="{&quot;y&quot;: 50,  &quot;smoothness&quot;: 30}"><img src="<?php echo get_template_directory_uri() ?>/images/bg-decor-6.png" alt="" />
  </div>
  <div class="container">
    <h4 class="heading-decorated">CATÁLOGO</h4>
    <div class="isotope-wrap row row-70">
      <div class="col-sm-12">
        <ul class="list-nav isotope-filters isotope-filters-horizontal">
          <li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="#">Todo</a></li>
          <li><a data-isotope-filter="Jeans" data-isotope-group="gallery" href="#">Jeans</a></li>
          <li><a data-isotope-filter="Prendas" data-isotope-group="gallery" href="#">Prendas</a></li>
          <li><a data-isotope-filter="Calzado" data-isotope-group="gallery" href="#">Calzado</a></li>
        </ul>
        <div class="isotope row" data-isotope-layout="fitRows" data-isotope-group="gallery">

          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean001.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean001.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean002.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean002.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Prendas"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean003.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean003.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Prendas</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Calzado"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean004.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean004.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Calzado</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean005.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean005.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean006.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean006.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Calzado"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean007.jpg" data-lightgallery="item">
              <figure>
                <img class="" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean007.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Calzado</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Prendas"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean008.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean008.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Prendas</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean009.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean009.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Calzado"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean010.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean010.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Calzado</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Jeans"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean011.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean011.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Jeans</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Calzado"><a class="img-thumbnail-variant-3" href="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean012.jpg" data-lightgallery="item">
              <figure>
                <img class="abs_image_top" src="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean012.jpg" alt="" width="418" height="315" />
              </figure>
              <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <li>Calzado</li>
                </ul>
                <p class="heading-5 hover-top-element">Fotografia</p>
                <div class="divider"></div>
                <p class="small hover-bottom-element">Nuestro Portafolio</p>
                <span class="icon arrow-right linear-icon-plus"></span>
              </div>
            </a>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>
<!-- get a quote-->
<section class="bg-gray-lighter object-wrap decor-text" data-content="Contact">
  <div class="section-lg">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-6">
          <h4 class="heading-decorated">Contáctanos</h4>
          <!-- RD Mailform-->
          <form class="rd-mailform rd-mailform_style-1" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
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
              <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
              <label class="form-label" for="contact-message">Mensaje</label>
            </div>
            <div class="terms_of_data">
              <p class="contact_terms">Los datos personales aquí están relacionados por usted, serán utilizados para
                los fines de validar la información entregada, promover, proveer, facturar y distribuir los
                productos, garantizar el servicios postventa de la empresa, establecer un canal para la adecuada
                comuncación entre <strong>LINEA DIRECTA</strong> y sis clientes, proveedores, aliados comerciales,
                etc; Fidelizarlos, hacer investigaciones de cliente, sobre sus gustos, hábitos de consumo, análisis
                de características demográficas; Mejora de la atención, innovar y perfeccionar los productos y
                servicios ofrecidos, al igual que dar a conocer las noticias de interés y novedades; Y en general
                mantener un adecuado conocimiento y comunicación del y con el cliente. </p>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">He leido y entiendo el trato de datos
                  personales.</label>
              </div>

            </div>

            <button class="button button-primary" type="submit">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-left bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/bg-image-3.jpg)"></div>
</section>
<section class="section-lg bg-default text-center">
  <div class="bg-decor d-flex align-items-center justify-content-end" data-parallax-scroll="{&quot;y&quot;: 50,  &quot;smoothness&quot;: 30}"><img src="<?php echo get_template_directory_uri() ?>/images/bg-decor-11.png" alt="" />
  </div>
  <div class="container">
    <h4 class="heading-decorated">QUE DICEN DE NOSOTROS</h4>
    <div class="row row-50">
      <div class="col-lg-5">
        <div class="row row-30">
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-1-126x102.png" alt="" width="126" height="102" /></a></figure>
          </div>
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-2-134x102.png" alt="" width="134" height="102" /></a></figure>
          </div>
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-3-132x102.png" alt="" width="132" height="102" /></a></figure>
          </div>
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-4-126x102.png" alt="" width="126" height="102" /></a></figure>
          </div>
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-5-138x102.png" alt="" width="138" height="102" /></a></figure>
          </div>
          <div class="col-sm-6">
            <figure class="box-icon-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/company-6-143x102.png" alt="" width="143" height="102" /></a></figure>
          </div>
        </div>
      </div>
      <div class="col-lg-7 text-left">
        <!-- Owl Carousel-->
        <div class="owl-carousel" data-items="1" data-stage-padding="15" data-loop="true" data-margin="30" data-nav="true" data-autoplay="true">
          <div class="item">
            <!-- Quote classic-->
            <div class="quote-classic">
              <div class="quote-classic__main">
                <svg class="quote-classic__mark" version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40.234px" height="33.484px" viewbox="0 0 30.234 23.484" xml:space="preserve">
                  <g>
                    <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959              c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246              c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885              c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723              c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984              c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635              s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z">
                    </path>
                  </g>
                </svg>
                <div class="quote-classic__text">
                  <p class="q">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eos fugiat debitis odit ut perferendis consequatur eveniet, facere accusamus ratione. Libero qui aliquam vero unde!</p>
                </div>
              </div>
              <div class="quote-classic__caption">
                <div class="quote-classic__image quote-classic__caption-aside"><img src="<?php echo get_template_directory_uri() ?>/images/testimonials-1-120x120.jpg" alt="" width="120" height="120" />
                </div>
                <div class="quote-classic__caption-main">
                  <p class="quote-classic__cite">Jane Smith</p>
                  <p class="quote-classic__small">Customer</p>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <!-- Quote classic-->
            <div class="quote-classic">
              <div class="quote-classic__main">
                <svg class="quote-classic__mark" version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40.234px" height="33.484px" viewbox="0 0 30.234 23.484" xml:space="preserve">
                  <g>
                    <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959              c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246              c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885              c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723              c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984              c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635              s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z">
                    </path>
                  </g>
                </svg>
                <div class="quote-classic__text">
                  <p class="q">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque earum qui, minus ducimus exercitationem voluptatibus itaque quam fuga consequuntur, id ipsam voluptates inventore quis! Vero?</p>
                </div>
              </div>
              <div class="quote-classic__caption">
                <div class="quote-classic__image quote-classic__caption-aside"><img src="<?php echo get_template_directory_uri() ?>/images/testimonials-2-120x120.jpg" alt="" width="120" height="120" />
                </div>
                <div class="quote-classic__caption-main">
                  <p class="quote-classic__cite">James Wilson</p>
                  <p class="quote-classic__small">Customer</p>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <!-- Quote classic-->
            <div class="quote-classic">
              <div class="quote-classic__main">
                <svg class="quote-classic__mark" version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40.234px" height="33.484px" viewbox="0 0 30.234 23.484" xml:space="preserve">
                  <g>
                    <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959              c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246              c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885              c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723              c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984              c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635              s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z">
                    </path>
                  </g>
                </svg>
                <div class="quote-classic__text">
                  <p class="q">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, culpa? Quo dolore cum magni facilis modi voluptates. Maiores natus excepturi, mollitia id inventore optio sed hic minima, aliquid perspiciatis numquam blanditiis, voluptatibus tempora officia repudiandae!</p>
                </div>
              </div>
              <div class="quote-classic__caption">
                <div class="quote-classic__image quote-classic__caption-aside"><img src="<?php echo get_template_directory_uri() ?>/images/testimonials-3-120x120.jpg" alt="" width="120" height="120" />
                </div>
                <div class="quote-classic__caption-main">
                  <p class="quote-classic__cite">Samantha Lee</p>
                  <p class="quote-classic__small">Customer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>