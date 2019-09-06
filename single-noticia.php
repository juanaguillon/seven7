<?php get_header() ?>

<?php $current_object = get_queried_object() ?>

<section class="bg-default section-lg">
  <div class="container">
    <div class="row row-60 justify-content-sm-center">
      <div class="col-lg-8 section-divided__main">
        <section class="section-md post-single-body">
          <h2 class="heading-decorated"><?php echo $current_object->post_title ?></h2>
          <div class="single_post_image">
            <img src="<?php echo get_the_post_thumbnail_url($current_object, "full") ?>" alt="">
          </div>
          <div class="post-meta">
            <div class="group">
              <a href="#">
                <time datetime="2018"><?php echo get_the_date("M d, Y", $current_object) ?></time>
              </a>
              <ul class="list-inline-tag">
                <?php
                $tags = get_the_terms($current_object, "noti_tag");
                foreach ($tags as $tag) : ?>
                  <li><a href="<?php echo get_term_link($tag, "noti_tag") ?>"><?php echo $tag->name ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <p class="first-letter">
            <?php echo $current_object->post_content; ?>
          </p>
          <!-- Quote default-->


          <ul class="list-inline-sm">
            <li><a class="icon-sm fa-facebook icon" href="#"></a></li>
            <li><a class="icon-sm fa-twitter icon" href="#"></a></li>
            <li><a class="icon-sm fa-google-plus icon" href="#"></a></li>
            <li><a class="icon-sm fa-vimeo icon" href="#"></a></li>
            <li><a class="icon-sm fa-youtube icon" href="#"></a></li>
            <li><a class="icon-sm fa-pinterest-p icon" href="#"></a></li>
          </ul>
        </section>
        <section class="section-sm">
          <?php
          $prevpos = get_previous_post();
          $nextpos = get_next_post();
          ?>
          <div class="row row-60 justify-content-md-between">
            <?php if ($prevpos) : ?>
              <div class="col-md-5 text-md-left">
                <a class="unit flex-row unit-spacing-md align-items-center" href="<?php echo get_permalink($prevpos) ?>">
                  <div class="unit-left"><span class="icon icon-md linear-icon-arrow-left"></span></div>
                  <div class="unit-body">
                    <p class="small"><?php echo $prevpos->post_title; ?></p>
                  </div>
                </a>
              </div>
            <?php endif; ?>
            <?php if ($nextpos) : ?>
              <div class="col-md-5 text-md-right">
                <a class="unit flex-row unit-spacing-md align-items-center" href="<?php echo get_permalink($nextpos) ?>">
                  <div class="unit-body">
                    <p class="small"><?php echo $nextpos->post_title; ?> </p>
                  </div>
                  <div class="unit-right"><span class="icon icon-md linear-icon-arrow-right"></span></div>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </section>
        <section class="section-sm">
          <h6>Últimos Posts</h6>
          <div class="row row-60">
            <?php
            $allNotices = new WP_Query(array(
              "post_type" => "noticia",
              "posts_per_page" => 2,
              'post__not_in' => array($current_object->ID)
            ));
            foreach ($allNotices->posts as $notice) : ?>
              <div class="col-md-6">

                <!-- Post classic-->
                <article class="post-classic post-minimal"><img src="<?php echo get_the_post_thumbnail_url($notice, "medium") ?>" alt="" width="418" height="315" />
                  <div class="post-classic-title">
                    <h6><a href="image-post.html"><?php echo $notice->post_title; ?></a></h6>
                  </div>
                  <div class="post-meta">
                    <div class="group">
                      <a href="image-post.html">
                        <time datetime="2018"><?php echo get_the_date("M d, Y", $notice) ?></time>
                      </a>
                    </div>
                  </div>
                </article>
              </div>

            <?php endforeach; ?>

          </div>
        </section>

      </div>

      <?php get_template_part("contents/content", "blog_sidebar") ?>

    </div>
  </div>
</section>
<?php get_footer() ?>