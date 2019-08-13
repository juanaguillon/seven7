<?php get_header() ?>
<section>
  <section class="section parallax-container context-dark" data-parallax-img="<?php echo get_template_directory_uri() ?>/images/parallax-1.jpg">
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
  </section>

</section>
<section class="bg-default section-md">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h4 class="heading-decorated">Portafolio</h4>
      </div>
    </div>
    <div class="row row-70 flex-lg-row-reverse col-reverse">
      <div class="col-lg-8 col-xl-9 section-divided__main section-divided__main-left">

        <div class="col-sm-12">

          <div class="row no-gutters" id="products_ajax_paginator" style="position: relative; height: auto;">

            <?php
            $currentObject = get_queried_object();
            $products = new WP_Query(array(
              "post_type" => "productos",
              "tax_query" => array(
                array(
                  "taxonomy" => $currentObject->taxonomy,
                  "terms" => $currentObject->term_id
                )
              )

            ));
            seven_products_loop($products);
            ?>
          </div>

        </div>
        <div class="col-sm-12 portafolio-nav-pages">
          <!-- Classic Pagination-->
          <nav>
            <ul class="pagination-classic">
              <input type="hidden" id="current_taxonomy" value="<?php echo $currentObject->taxonomy ?>">
              <input type="hidden" id="current_term_id" value="<?php echo $currentObject->term_id ?>">
              <input type="hidden" id="curremt_posts_per_page" value="<?php echo $products->query["posts_per_page"] ?>">
              <?php
              seven_pagination($products->query["posts_per_page"], $products->found_posts);
              ?>
            </ul>
          </nav>
        </div>

      </div>
      <div class="col-lg-4 col-xl-3 section-divided__aside section__aside-left">


        <!-- Categories-->
        <?php get_template_part("contents/content", "portfolio_sidebar") ?>



      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>