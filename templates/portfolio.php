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
    <div class="row row-70 flex-lg-row-reverse">
      <div class="col-lg-8 col-xl-9 section-divided__main section-divided__main-left">

        <div class="col-sm-12">

          <div class="isotope row no-gutters" style="position: relative; height: 971.349px;">

            <?php
            $products = new WP_Query(array(
              "post_type" => "productos"
            ));
            foreach ($products->posts as $product) : ?>
              <div class="col-12 col-md-6 col-lg-4 isotope-item" style="position: absolute; left: 0px; top: 0px;">
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

            <?php endforeach; ?>
          </div>

        </div>
        <div class="col-sm-12 portafolio-nav-pages">
          <!-- Classic Pagination-->
          <nav>
            <ul class="pagination-classic">
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a class="icon linear-icon-arrow-right" href="#"></a></li>
            </ul>
          </nav>
        </div>

      </div>
      <div class="col-lg-4 col-xl-3 section-divided__aside section__aside-left">


        <!-- Categories-->
        <section class="section-sm">
          <h6>Categories</h6>
          <ul class="list-xxs small">
            <?php
            $categories = get_terms("category", array(
              "hide_empy" => false
            ));
            foreach ($categories  as $cat) : ?>
              <li><a href="#"><?php echo $cat->name ?></a></li>
            <?php endforeach; ?>
          </ul>
        </section>

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