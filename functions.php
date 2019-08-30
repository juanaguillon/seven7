<?php

include_once "includes/seven_post_types.php";
include_once "includes/seven_acf_options.php";
include_once "includes/seven_mail.php";

function printcode($code)
{
  echo "<pre>" . print_r($code, true) . "</pre>";
}

function seven_init_theme()
{
  add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "seven_init_theme");


/** Agregar la paginación a el portafolio */
function seven_pagination($posts_per_page, $all_posts)
{
  if (!is_numeric($posts_per_page) || !is_numeric($all_posts)) return;
  if ($all_posts > $posts_per_page) :
    $count = 1;
    while (($posts_per_page * $count) - $posts_per_page < $all_posts) :

      ?>
      <li class="classic_paginator_item" data-page="<?php echo $count ?>"><a href="#"><?php echo $count ?></a></li>
    <?php
          $count++;

        endwhile;
      endif;
    }

    /** 
     * Mostrar un item de los productos.
     * En el loop de los productos (Portafolio, categoria, taxonomi, etc.) se crea un foreach ( loop ) de los productos.
     * Esta funcion ejecutará el loop de los productos, pasando el parametró instancia WP_Query .
     * @param Object $wp_query
     *  */
    function seven_products_loop($wp_query)
    {
      foreach ($wp_query->posts as $product) : ?>
    <div class="col-12 col-md-6 col-lg-4">
      <a class="img-thumbnail-variant-3" href="<?php echo get_permalink($product) ?>">
        <img src="<?php echo get_the_post_thumbnail_url($product, "thubmnail") ?>" alt="" width="418" height="315">
        <!-- <span class="label-custom label-white">Link</span> -->
        <div class="caption">
          <span class="icon hover-top-element linear-icon-folder-picture"></span>
          <ul class="list-inline-tag hover-top-element">
            <?php
                foreach (get_the_terms($product, "category") as $term) : ?>
              <li> <?php echo $term->name ?></li>
            <?php endforeach; ?>
          </ul>

          <p class="heading-5 hover-top-element"><?php echo $product->post_title ?></p>
          <div class="divider"></div>
          <p class="small hover-bottom-element">Nuestro Portfolio.</p>
          <span class="icon arrow-right linear-icon-arrow-right"></span>
        </div>
      </a>
    </div>

<?php endforeach;
}



// PETICIONES AJAX


/**
 * Peticion que se creará en el paginador de los productos.
 * Estas peticiones ajax, se encuentran en el archivo custom.js
 */
function seven_paginator_works()
{

  $page = $_POST["page"];
  $posts_per_page = $_POST["posts_per_page"];
  $taxonomy = $_POST["taxonomy"];
  $termid = $_POST["termid"];

  $args = array(
    "post_type" => "productos",
    "posts_per_page" => $posts_per_page,
    "paged" => $page,
  );
  if ($taxonomy !== "empty" && $termid !== "empty") {
    $args["tax_query"] = array(
      array(
        "taxonomy" => $taxonomy,
        "term_id" => $termid
      )
    );
  }
  $wp_query = new WP_Query($args);

  // printcode( $_POST);

  seven_products_loop($wp_query);

  wp_die();
}

add_action("wp_ajax_seven_paginator_works", "seven_paginator_works");
add_action("wp_ajax_nopriv_seven_paginator_works", "seven_paginator_works");

add_action('admin_init', 'my_remove_menu_pages');
function my_remove_menu_pages()
{

  remove_menu_page('edit.php'); // Posts
  remove_menu_page('edit-comments.php'); // Comments
  remove_menu_page('plugins.php'); // Plugins
  remove_menu_page('edit.php'); // Posts
}
