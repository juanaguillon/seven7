<?php



/** Template Name: Nosotros */

get_header();

$currentObject = get_queried_object();

?>

<section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean007.jpg">

  <div class="parallax-content parallax-header">

    <div class="parallax-header__inner context-dark text-center">

      <div class="parallax-header__content">

        <div class="container">

          <div class="row justify-content-sm-center">

            <div class="col-md-10 col-xl-8">

              <h2 class="heading-decorated">Sobre nosotros</h2>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<!--features-->

<!-- Our Features-->

<section class="section-md bg-gray-lighter text-center decor-text" data-content="Services">

  <div class="container">

    <div class="row justify-content-lg-center">

      <div class="col-lg-10 col-xl-8">

        <h4 class="heading-decorated">Nuestros servicios</h4>

        <p><?php the_field("descripcion_servicios", $currentObject) ?></p>

      </div>

    </div>

    <div class="row row-50">

      <?php

      foreach (get_field("servicios_lista", $currentObject) as $service) : ?>

        <div class="col-md-6 col-lg-3">

          <!-- Blurb circle-->

          <article class="blurb blurb-circle blurb-circle_centered">

            <div class="blurb-circle__icon"><span class="icon">

                <img src="<?php echo $service["icono"]["sizes"]["medium"] ?>" alt="<?php echo $service["icono"]["alt"] ?>">

              </span></div>

            <p class="blurb__title"><?php echo $service["titulo"] ?></p>

            <p><?php echo $service["descripcion"] ?></p>

          </article>

        </div>



      <?php endforeach; ?>



    </div>

  </div>

</section>

<!-- About us-->

<section class="object-wrap decor-text" data-content="Talento">

  <div class="bg-decor d-flex align-items-center justify-content-center" data-parallax-scroll="{&quot;y&quot;: 70, &quot;x&quot;: 50, &quot;smoothness&quot;: 30}"><img src="images/bg-decor-10.png" alt="" />

  </div>

  <div class="section-lg">

    <div class="container">

      <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-7">

          <h4 class="heading-decorated">Nuestro talento</h4>

          <p><?php echo get_field("nuestro_talento_descripcion", $currentObject) ?></p>



          <div class="row row-30">

            <?php

            foreach (get_field("nuestro_talento_lista", $currentObject) as $li) : ?>

              <div class="col-xl-6">

                <!-- Blurb minimal-->

                <article class="blurb blurb-minimal">

                  <div class="unit flex-row unit-spacing-md">

                    <div class="unit-left">

                      <div class="blurb-minimal__icon"><span class="icon talent_icon">

                          <img src="<?php echo $li["icono"]["sizes"]["medium"] ?>" alt="<?php echo $li["icono"]["alt"] ?>">

                        </span></div>

                    </div>

                    <div class="unit-body">

                      <p class="blurb__title heading-6"><a href="single-service.html"><?php echo $li["titulo"] ?></a></p>

                      <p><?php echo $li["descripcion"] ?></p>

                    </div>

                  </div>

                </article>

              </div>



            <?php endforeach; ?>



          </div>

          <!-- <div class="row justify-content-md-center">



            <div class="col-md-12">

              <?php

              foreach (get_field("nuestro_talento_graficos") as $graph) : ?>

              <div class="progress-linear progress-linear-modern">

                <div class="progress-header">

                  <p><?php echo $graph["titulo"] ?></p><span class="progress-value"><?php echo $graph["porcentaje"] ?></span>

                </div>

                <div class="progress-bar-linear-wrap">

                  <div class="progress-bar-linear" style="width: <?php echo $graph["porcentaje"] ?>%;"></div>

                </div>

              </div>



              <?php endforeach; ?>



            </div>



          </div> -->

        </div>

        <div class="col-md-7 col-lg-5 image-none">

          <?php

          $nuestroTalentoImage = get_field("nuestro_talento_imagen", $currentObject);

          ?>

          <figure class="button-shadow"><img src="<?php echo $nuestroTalentoImage["url"] ?>" alt="<?php echo $nuestroTalentoImage["alt"] ?>" width="555" height="800">

          </figure>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- services-->



<!-- Counters-->

<!-- counters-->

<!-- <section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/medios/seven_7_jeans-jean040.jpg">

  <div class="parallax-content">

    <div class="container section-md">

      <div class="row justify-content-md-center row-50">

        <div class="col-md-6 col-lg-3">

          <article class="box-counter">

            <div class="box-counter__icon linear-icon-coffee-cup"></div>

            <div class="box-counter__wrap">

              <div class="counter">100</div>

            </div>

            <p class="box-counter__title">Ventas anuales</p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="box-counter">

            <div class="box-counter__icon linear-icon-cube"></div>

            <div class="box-counter__wrap">

              <div class="counter">45</div>

            </div>

            <p class="box-counter__title">Sucursales</p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="box-counter">

            <div class="box-counter__icon linear-icon-chevrons-expand-horizontal"></div>

            <div class="box-counter__wrap">

              <div class="counter">98</div><span>%</span>

            </div>

            <p class="box-counter__title">Impresiones positivas</p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="box-counter">

            <div class="box-counter__icon linear-icon-mustache-glasses"></div>

            <div class="box-counter__wrap">

              <div class="counter">147</div><span>k</span>

            </div>

            <p class="box-counter__title">Clientes satisfechos</p>

          </article>

        </div>

      </div>

    </div>

  </div>

</section> -->



<!-- Testimonials-->

<section class="section-md bg-default text-center decor-text" data-content="Testimonios">

  <div class="container">

    <h4 class="heading-decorated">Testimonios clientes</h4>

    <div class="row row-50">

      <?php

      foreach (get_field("testimonios", $currentObject) as $testimonio) : ?>

        <div class="col-md-6">

          <!-- Quote default-->

          <div class="quote-default quote-default_left">

            <div class="quote-default__image"><img src="<?php echo $testimonio["imagen"]["url"] ?>" alt="Testimonio seven7 Jeans" />

            </div>

            <svg class="quote-default__mark" version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40.234px" height="33.484px" viewbox="0 0 30.234 23.484" xml:space="preserve">

              <g>

                <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959              c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246              c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885              c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723              c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984              c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635              s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426              s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z">

                </path>

              </g>

            </svg>

            <div class="quote-default__text">

              <p class="q"><?php echo $testimonio["descripcion"] ?></p>

            </div>

            <p class="quote-default__cite"><?php echo $testimonio["nombre"] ?></p>

          </div>

        </div>



      <?php endforeach; ?>



    </div>

  </div>

</section>



<?php get_footer() ?>