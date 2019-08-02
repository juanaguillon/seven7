<?php get_header() ?>
<?php
$current_object = get_queried_object();

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
      </div>
    </div>
  </div>
</section> -->

<section class="section-lg bg-default text-center">
  <div class="bg-decor d-flex align-items-center" data-parallax-scroll="{&quot;y&quot;: 50,  &quot;smoothness&quot;: 30}"><img src="images/bg-decor-6.png" alt="" />
  </div>
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <div class="slick-gallery">
          <!-- Slick Carousel-->
          <?php
          $photos = get_field("galeria", $current_object);
          ?>
          <div class="slick-slider carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-lightgallery="group">
            <?php
            foreach ($photos as $photo) : ?>
              <div class="item single_portfolio_img_wrap">
                <img src="<?php echo $photo["url"] ?>" alt="" width="1200" height="800" />
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
                <span><strong>Material: </strong><?php the_field("material",$current_object) ?></span>
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
                    <strong>Tallas: </strong><?php the_field("tallas",$current_object) ?>
                    </span>
                </div>
                
              </div>
                <div class="single_product_colors col-md-6 p-0">
                <div class="d-flex">
                    <img src="<?php echo get_template_directory_uri() ?>/images/color.svg" alt="">
                    <span><strong>Color: </strong><?php the_field("colores",$current_object) ?></span>
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
          <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum aliquam necessitatibus dolorem, ab eaque quasi aspernatur, aut dolor explicabo repudiandae reprehenderit inventore. Eaque doloribus vero minus odio perspiciatis, velit?</p>

          <p><?php echo $current_object->post_excerpt ?></p>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer() ?>