<?php get_header() ?>

<section class="section-lg" id="search_results">
  <div class="container">
    <div class="row">
      <?php if (have_posts()) :
        $cPost = "";
        while (have_posts()) : the_post(); ?>
          <?php if ($post->post_type != $cPost) : ?>
            <?php $cPost = $post->post_type; ?>
            <div class="col-12 search_result_section">
              <h4>
                <?php echo get_post_type_object($cPost)->labels->name; ?>
              </h4>
            </div>
          <?php endif; ?>

          <a href="<?php echo get_permalink(); ?>" class="search_result_link">
            <div class="search_result col-12 col-md-6 col-lg-4">
              <div class="search_result_inner">
                <div class="search_result_title">
                  <span><?php echo the_title() ?></span>
                </div>
              </div>
          </a>
    </div>


  <?php endwhile; ?>

<?php endif; ?>
  </div>

  </div>
</section>

<?php get_footer() ?>