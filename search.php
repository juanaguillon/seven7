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

          <div class="col-12 col-md-6 col-lg-4 show_when_load">
            <a class="img-thumbnail-variant-3" href="<?php echo get_permalink() ?>">
              <img src="<?php echo get_the_post_thumbnail_url($post, "thubmnail") ?>" alt="<?php echo seven_get_alt_image_by_post($post) ?>" width="418" height="315">
              <!-- <span class="label-custom label-white">Link</span> -->
              <div class="caption">
                <span class="icon hover-top-element linear-icon-folder-picture"></span>
                <ul class="list-inline-tag hover-top-element">
                  <?php
                      foreach (get_the_terms($post, "category") as $term) : ?>
                    <li><?php echo $term->name ?></li>
                  <?php endforeach; ?>
                </ul>

                <p class="heading-5 hover-top-element"><?php echo $post->post_title ?></p>
                <div class="divider"></div>
                <span class="icon arrow-right linear-icon-arrow-right"></span>
              </div>
            </a>
          </div>


        <?php endwhile; ?>
        <div class="col-12 hide_when_load">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  </div>
</section>

<?php get_footer() ?>