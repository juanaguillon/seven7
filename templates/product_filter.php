<?php

/** Template Name: Product Filter */
get_header()
?>

<section class="bg-default section-md">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h4 class="heading-decorated">Colección</h4>
        <div class="portfolio_data_filter" style="margin-top:10px;">
          <span style="font-weight:bold">Filtros actuales: </span>
          <ul class="data_filters">
            <?php
            foreach ($_GET as $getkey => $getval) {
              $term = get_term($getval, $getkey);
              if ($term->taxonomy == "category") {
                $taxonomy = "categoría";
              } else {
                $taxonomy = $term->taxonomy;
              }
              echo "<li data-category='" . $getkey . "'><span class='filter_term_name'>" .  ucfirst($taxonomy) . ":</span><span class='filter_term_val'>" . $term->name . "</span><i>&#x2716;</i></li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="row row-70 flex-lg-row-reverse col-reverse">
      <div class="col-lg-8 col-xl-9 section-divided__main section-divided__main-left">

        <div class="col-sm-12">

          <div class="row no-gutters" id="products_ajax_paginator" style="position: relative; height: auto;">
            <?php
            $currentObject = get_queried_object();


            $products = array(
              "post_type" => "productos",
              "posts_per_page" => 12,

            );
            $taxQuery = array();

            foreach ($_GET as $keyget => $valget) {
              $taxQuery[] = array(
                "taxonomy" => $keyget,
                "terms" => $valget
              );
            }
            $products["tax_query"] = $taxQuery;
            $wpQuery = new WP_Query($products);
            seven_products_loop($wpQuery);
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