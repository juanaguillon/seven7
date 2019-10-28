<?php get_header();
$current_object = get_queried_object();

$terms = get_the_terms($current_object, array("category"));
$isJean = false;
foreach ($terms as $cat) {
  if ($cat->slug == "jeans") {
    $isJean = true;
    break;
  }
}

// Se mostrará la tabla de mediciones en el actual producto?
$showTableMeditions = get_field("show_table_dimensions", $current_object) && $isJean;

?>


<!-- <section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/parallax-1.jpg">
  <div class="parallax-content parallax-header">
    <div class="parallax-header__inner context-dark">
      <div class="parallax-header__content">
        <div class="container">
          <div class="row justify-content-sm-center">
            <div class="col-md-10 col-xl-8">
              <h2 class="heading-decorated">Nuestro Portafolio</h2>
            </div>
          </div>
        </div>
      </div>c
    </div>
  </div>
</section> -->

<section class="section-lg bg-default text-center">
  <div class="bg-decor d-flex align-items-center" data-parallax-scroll="{&quot;y&quot;: 50,  &quot;smoothness&quot;: 30}"><img src="images/bg-decor-6.png" alt="" />
  </div>
  <div class="container">
    <?php
    $breadData = array(
      "Inicio" => home_url(),
      "Productos" =>  get_permalink(9),
      "Actual" => $current_object->post_title
    );
    seven_breadcrumb($breadData);
    ?>

    <div class="row">

      <div class="col-md-6">
        <div class="slick-gallery">
          <!-- Slick Carousel-->
          <?php
          $photos = get_field("galeria", $current_object);
          ?>
          <div class="slick-slider carousel-parent" id="slick_product_bigger" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
            <?php
            foreach ($photos as $photo) : ?>
              <div class="item single_portfolio_img_wrap">
                <a class="single_portfolio_link" href="<?php echo $photo["url"] ?>">
                  <img src="<?php echo $photo["url"] ?>" alt="<?php echo $photo["alt"] ?>" width="1200" height="800" />
                </a>
              </div>

            <?php endforeach; ?>

          </div>
          <div class="slick-slider" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="3" data-xs-items="3" data-sm-items="3" data-md-items="3" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">


            <?php
            foreach ($photos as $photo) : ?>
              <div class="item"><img src="<?php echo $photo["sizes"]["thumbnail"] ?>" alt="" width="168" height="112" />
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="single_product_title">

          <h3><?php echo $current_object->post_title ?></h3>
        </div>

        <div class="single_product_data producto-info">


          <div class="">
            <div class="single_product_material">
              <div class="d-flex">
                <img src="<?php echo get_template_directory_uri() ?>/images/material.svg" alt="">
                <span><strong>Material: </strong><?php echo strip_tags(get_the_term_list($current_object, "material", "", ", ")) ?></span>
              </div>
            </div>

            <div class="single_product_category">
              <div class="d-flex">
                <img src="<?php echo get_template_directory_uri() ?>/images/categoria-2.svg" alt="" width="22px">
                <span><strong>Categoría: </strong><?php echo strip_tags(get_the_term_list($current_object, "category", "", ", ")) ?></span>
              </div>
            </div>
          </div>

          <div class="row m-0">
            <div class="single_product_talls col-md-6 p-0">
              <div class="d-flex">
                <img src="<?php echo get_template_directory_uri() ?>/images/talla.svg" alt="">
                <span>
                  <strong>Tallas: </strong><?php echo strip_tags(get_the_term_list($current_object, "talla", "", ", ")) ?>
                </span>
              </div>


            </div>
            <div class="single_product_colors col-md-6 p-0">
              <div class="d-flex">
                <img src="<?php echo get_template_directory_uri() ?>/images/color.svg" alt="">
                <span><strong>Color: </strong><?php echo strip_tags(get_the_term_list($current_object, "color", "", ", ")) ?></span>
              </div>

            </div>
          </div>

          <div class="single_product_ref">
            <div class="d-flex">
              <img src="<?php echo get_template_directory_uri() ?>/images/etiqueta.svg" alt="">
              <span><strong>Referencia: </strong><?php the_field("referencia", $current_object) ?></span>
            </div>

          </div>
        </div>
        <div class="single_product_description description">
          <strong><span>Descripción</span></strong>
          <p class="m-0"><?php echo $current_object->post_excerpt ?></p>
        </div>
        <?php
        if ($showTableMeditions) : ?>
          <div class="text-left">
            <a id="show_medida_table" class="button web-btn">Ver tabla de medidas</a>
          </div>

        <?php endif; ?>
      </div>


    </div>
    <div class="relation_single_product">
      <h4 class="heading-decorated">Productos Relacionados</h4>
      <div class="relations_single_wrap">
        <div class="row">
          <?php
          $relationProducts = new WP_Query(array(
            "post_type" => "productos",
            "posts_per_page" => "3",
            "post__not_in" => array($current_object->ID),
            "tax_query" => array(
              array(
                "taxonomy" => "category",
                "terms" => $terms[0]->term_id
              )
            )
          ));

          seven_products_loop($relationProducts);

          ?>
        </div>
      </div>

    </div>

  </div>
</section>

<?php
if ($showTableMeditions) : ?>

  <?php
    function setValueTable($pais, $index, $default)
    {
      global $current_object;
      $val = get_field("tabla_de_medida", $current_object)[$index][$pais];
      if ($val !== "") {
        return $val;
      }
      return $default;
    }
    ?>

  <div class="modal fade" id="medida_table_wrap" role="dialog">
    <div class="modal-dialog modal-dialog_custom">
      <!-- Modal content-->
      <div class="modal-dialog__inner">
        <button class="close" type="button"></button>
        <div class="modal-dialog__content">
          <h5>Tabla de medidas</h5>
          <!-- RD Mailform-->
          <table id="modal_table_dimension">

            <tbody>
              <tr>
                <td class="tdcountry">COLOMBIA</td>
                <td><?php echo setValueTable("colombia", 0, 6) ?></td>
                <td><?php echo setValueTable("colombia", 1, 8) ?></td>
                <td><?php echo setValueTable("colombia", 2, 10) ?></td>
                <td><?php echo setValueTable("colombia", 3, 12) ?></td>
                <td><?php echo setValueTable("colombia", 4, 14) ?></td>
                <td><?php echo setValueTable("colombia", 5, 16) ?></td>
                <td><?php echo setValueTable("colombia", 6, 18) ?></td>
              </tr>
              <tr>
                <td class="tdcountry">PERÚ</td>
                <td><?php echo setValueTable("peru", 0, 26) ?></td>
                <td><?php echo setValueTable("peru", 1, 28) ?></td>
                <td><?php echo setValueTable("peru", 2, 30) ?></td>
                <td><?php echo setValueTable("peru", 3, 32) ?></td>
                <td><?php echo setValueTable("peru", 4, 34) ?></td>
                <td><?php echo setValueTable("peru", 5, 36) ?></td>
                <td><?php echo setValueTable("peru", 6, 38) ?></td>
              </tr>
              <tr>
                <td class="tdcountry">BOLIVIA</td>
                <td><?php echo setValueTable("peru", 0, 26) ?></td>
                <td><?php echo setValueTable("peru", 1, 28) ?></td>
                <td><?php echo setValueTable("peru", 2, 30) ?></td>
                <td><?php echo setValueTable("peru", 3, 32) ?></td>
                <td><?php echo setValueTable("peru", 4, 34) ?></td>
                <td><?php echo setValueTable("peru", 5, 36) ?></td>
                <td><?php echo setValueTable("peru", 6, 38) ?></td>

              </tr>
              <tr>
                <td class="tdcountry">USA</td>
                <td><?php echo setValueTable("peru", 0, "0-2") ?></td>
                <td><?php echo setValueTable("peru", 1, "3-4") ?></td>
                <td><?php echo setValueTable("peru", 2, "5-6") ?></td>
                <td><?php echo setValueTable("peru", 3, "7-8") ?></td>
                <td><?php echo setValueTable("peru", 4, "9-10") ?></td>
                <td><?php echo setValueTable("peru", 5, "11-12") ?></td>
                <td><?php echo setValueTable("peru", 6, "13-14") ?></td>

              </tr>
              <tr>
                <td class="tdcountry">EUROPA</td>
                <td><?php echo setValueTable("peru", 0, 32) ?></td>
                <td><?php echo setValueTable("peru", 1, 34) ?></td>
                <td><?php echo setValueTable("peru", 2, 36) ?></td>
                <td><?php echo setValueTable("peru", 3, 38) ?></td>
                <td><?php echo setValueTable("peru", 4, 40) ?></td>
                <td><?php echo setValueTable("peru", 5, 42) ?></td>
                <td><?php echo setValueTable("peru", 6, 44) ?></td>

              </tr>
              <tr>
                <td class="tdcountry">MÉXICO</td>
                <td><?php echo setValueTable("peru", 0, "0-2") ?></td>
                <td><?php echo setValueTable("peru", 1, "3-4") ?></td>
                <td><?php echo setValueTable("peru", 2, "5-6") ?></td>
                <td><?php echo setValueTable("peru", 3, "7-8") ?></td>
                <td><?php echo setValueTable("peru", 4, "9-10") ?></td>
                <td><?php echo setValueTable("peru", 5, "11-12") ?></td>
                <td><?php echo setValueTable("peru", 6, "13-14") ?></td>

              </tr>
              <tr>
                <td class="tdcountry">CHILE</td>
                <td><?php echo setValueTable("peru", 0, 36) ?></td>
                <td><?php echo setValueTable("peru", 1, 38) ?></td>
                <td><?php echo setValueTable("peru", 2, 40) ?></td>
                <td><?php echo setValueTable("peru", 3, 42) ?></td>
                <td><?php echo setValueTable("peru", 4, 44) ?></td>
                <td><?php echo setValueTable("peru", 5, 46) ?></td>
                <td><?php echo setValueTable("peru", 6, 48) ?></td>
              </tr>
              <tr>
                <td class="tdcountry">CADERA</td>
                <td><?php echo setValueTable("peru", 0, "90-94") ?></td>
                <td><?php echo setValueTable("peru", 1, "95-99") ?></td>
                <td><?php echo setValueTable("peru", 2, "100-104") ?></td>
                <td><?php echo setValueTable("peru", 3, "105-109") ?></td>
                <td><?php echo setValueTable("peru", 4, "110-114") ?></td>
                <td><?php echo setValueTable("peru", 5, "115-119") ?></td>
                <td><?php echo setValueTable("peru", 6, "120-124") ?></td>

              </tr>

            </tbody>
          </table>
          <small>Las dimensiones de los jeans pueden variar debido a los distintos procesos o la tela. </small>
          <button class="btn btn-primary web-btn">Cerrar</button>

        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php get_footer() ?>