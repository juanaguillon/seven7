<?php get_header() ?>
<?php
$current_object = get_queried_object();
?>
<section>
  <section class="section parallax-container context-dark" data-parallax-img="images/parallax-4.jpg">
    <div class="parallax-content parallax-header">
      <div class="parallax-header__inner context-dark">
        <div class="parallax-header__content">
          <div class="container">
            <div class="row justify-content-sm-center">
              <div class="col-md-10 col-xl-8">
                <h2 class="heading-decorated"><?php echo $current_object->name ?></h2>
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
    <div class="row row-70">
      <div class="col-lg-7 col-xl-8 section-divided__main">
        <!-- Post classic-->

        <?php

        $notices = new WP_Query(array(
          "post_type" => "noticia",
          "posts_per_page" => 10,
          "tax_query" => array(
            array(
              "taxonomy" => "noti_tag",
              "terms" => $current_object->term_id
            )
          )
        ));
        seven_notices_loop($notices);
        ?>
      </div>
      <?php get_template_part("contents/content", "blog_sidebar") ?>
    </div>
  </div>
</section>
<?php get_footer() ?>