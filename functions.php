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
    ?>
  <div class="col-12 hide_when_load">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <?php
    foreach ($wp_query->posts as $product) : ?>
    <div class="col-12 col-md-6 col-lg-4 show_when_load">
      <a class="img-thumbnail-variant-3" href="<?php echo get_permalink($product) ?>">
        <img src="<?php echo get_the_post_thumbnail_url($product, "thubmnail") ?>" alt="<?php echo seven_get_alt_image_by_post($product) ?>" width="418" height="315">
        <!-- <span class="label-custom label-white">Link</span> -->
        <div class="caption">
          <span class="icon hover-top-element linear-icon-folder-picture"></span>
          <ul class="list-inline-tag hover-top-element">
            <?php
                foreach (get_the_terms($product, "category") as $term) : ?>
              <li><?php echo $term->name ?></li>
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

  function seven_breadcrumb($data)
  {
    ?>
  <div class="breadcrumb_list">
    <ul>
      <?php foreach ($data as $li => $lival) : ?>
        <?php if ($li !== "Actual") : ?>
          <li><a href="<?php echo $lival ?>"><?php echo $li ?></a></li>
        <?php else : ?>
          <li><?php echo $lival ?></li>
        <?php endif; ?>
      <?php endforeach; ?>

    </ul>
  </div>

  <?php
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
          "terms" => $termid
        )
      );
    }
    $wp_query = new WP_Query($args);


    seven_products_loop($wp_query);

    wp_die();
  }



  add_action("wp_ajax_seven_paginator_works", "seven_paginator_works");
  add_action("wp_ajax_nopriv_seven_paginator_works", "seven_paginator_works");

  /**
   * Eliminar menu de dashboard innecesarios.
   */
  function my_remove_menu_pages()
  {

    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('edit.php'); // Posts
  }
  add_action('admin_init', 'my_remove_menu_pages');

  /** Obtener el alt de una imagen de Post */
  function seven_get_alt_image_by_post($post)
  {
    $thumb_id = get_post_thumbnail_id($post);
    return get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
  }

  function seven_notices_loop($wp_query_object)
  {
    foreach ($wp_query_object->posts as $notice) : ?>
    <div class="section-md">
      <article class="post-classic">
        <div class="post-classic-title post-classic-title-icon linear-icon-star">
          <h3><a href="<?php echo get_permalink($notice) ?>"><?php echo $notice->post_title; ?></a></h3>
        </div>
        <a href="<?php echo get_permalink($notice) ?>">
          <img src="<?php echo get_the_post_thumbnail_url($notice, "full") ?>" alt="<?php echo seven_get_alt_image_by_post($notice) ?>" width="886" height="668" />
        </a>

        <div class="post-classic-body">
          <p><?php echo $notice->post_excerpt; ?></p>
        </div>
        <div class="post-meta">
          <div class="group">
            <a href="image-post.html">
              <time datetime="2018"><?php echo get_the_date("M d, Y", $notice) ?></time>
            </a>
            <?php
                $tags = get_the_terms($notice, "noti_tag");
                ?>
            <ul class="list-inline-tag">
              <?php
                  foreach ($tags as $tag) : ?>
                <li><a href="<?php echo get_term_link($tag, "noti_tag") ?>"><?php echo $tag->name ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="post-classic-footer">
          <!-- <ul class="list-inline-sm">

            <li><a class="icon-xxs fa-facebook icon" href="https://www.facebook.com/SEVENSIETEJEANS/"></a></li>
            <li><a class="icon-xxs fa-twitter icon" href="https://twitter.com/seven7_jeans"></a></li>
            <li><a class="icon-xxs fa-instagram icon" href="https://www.instagram.com/seven7jeans_oficial/?hl=es-la"></a></li>
            <li><a class="icon-xxs fa-youtube icon" href="https://www.youtube.com/channel/UC22AYpiP_UcoAJHxiW5HOKQ"></a></li>

          </ul> -->
          <a class="button button-link" href="<?php echo get_permalink($notice); ?>">Ver más</a>
        </div>
      </article>
    </div>
<?php endforeach;
}
