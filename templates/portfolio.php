<?php /* Template Name: Portafilio */ ?>
<?php get_header() ?>
<!-- Parallax header-->
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
            $products = new WP_Query(array(
              "post_type" => "productos",
              "posts_per_page" => 10
            ));
            seven_products_loop($products)

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
<!-- Modal-->
<div class="modal fade text-left" id="appointment" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Appointment</h5>
        <button class="close" type="button" data-dismiss="modal"><span class="icon icon-md linear-icon-cross"></span></button>
      </div>
      <div class="modal-body">
        <div class="group-xl"><span><span class="icon icon-md icon-primary linear-icon-calendar-full"></span>August 11, 2018</span><span><span class="icon icon-md icon-primary linear-icon-clock3"></span>10:00 am – 12:00 am</span></div>
        <div>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="login" checked="checked">I am a new customer
          </label>
        </div>
        <div>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="register">I am a current customer
          </label>
        </div>
        <hr>
        <div class="register-form">
          <h5>Registration: <span class="text-primary">*</span></h5>
          <p>Your first name and an email address are required.</p>
          <!-- Login form-->
          <form>
            <div class="rd-mailform-inline-flex">
              <div class="form-wrap">
                <label class="form-label" for="name-2">First Name</label>
                <input class="form-input" id="name-2" type="text" name="name" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
              </div>
            </div>
            <div class="form-wrap">
              <label class="form-label" for="password-2">Password</label>
              <input class="form-input" id="password-2" type="password" name="password" data-constraints="@Required">
            </div>
            <div class="group">
              <button class="button button-primary" type="submit">Book Appointment</button>
              <button class="button button-black" type="button" data-dismiss="modal">close</button>
            </div>
          </form>
        </div>
        <div class="login-form">
          <h5>Login</h5>
          <!-- Login form-->
          <form>
            <div class="form-wrap">
              <label class="form-label" for="name">Username or e-mail</label>
              <input class="form-input" id="name" type="text" name="name" data-constraints="@Required">
            </div>
            <div class="form-wrap">
              <label class="form-label" for="password">Password</label>
              <input class="form-input" id="password" type="password" name="password" data-constraints="@Required">
            </div>
            <div class="group">
              <button class="button button-primary" type="submit">Book Appointment</button>
              <button class="button button-black" type="button" data-dismiss="modal">close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Footer-->

<?php get_footer() ?>