<div class="col-lg-5 col-xl-4 section-divided__aside section-divided__aside-left">
  <!-- Search-->
  <section class="section-sm section-style-1">
    <h6>Buscar</h6>
    <!-- RD Search-->
    <form class="rd-search rd-mailform-inline-flex text-center" action="search-results.html" method="GET" data-search-live="rd-search-results-live">
      <div class="form-wrap form-wrap_icon">
        <input placeholder="Escriba para buscar" class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
      </div>
      <button class="button button-primary" type="submit">
        <i class="linear-icon-magnifier"></i>
      </button>
    </form>
  </section>


  <!-- Categories-->
  <section class="section-sm">
    <h6>Categorias</h6>
    <ul class="list-xxs small">
      <?php
      $catTerms = array(
        "hide_empty" => true,
        "taxonomy" => "noti_category"
      );
      foreach (get_terms($catTerms) as $cat) : ?>

        <li><a href="<?php echo get_term_link($cat, "noti_category") ?>"><?php echo $cat->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- <section class="section-sm">
    <h6>Latest Posts</h6>
    <ul class="list-sm">

      <li>
        <article class="post-inline">
          <div class="post-inline__header"><span class="post-inline__time">Jan.20, 2018</span><a class="post-inline__author meta-author" href="standard-post.html">by Brian Williamson</a></div>
          <p class="post-inline__link"><a href="standard-post.html">How to Use Bootstrap Framework</a></p>
        </article>
      </li>
      <li>
        <article class="post-inline">
          <div class="post-inline__header"><span class="post-inline__time">Jan.20, 2018</span><a class="post-inline__author meta-author" href="standard-post.html">by Brian Williamson</a></div>
          <p class="post-inline__link"><a href="standard-post.html">Getting to another level of design and functionality.</a></p>
        </article>
      </li>
    </ul>
  </section> -->

  <section class="section-sm">
    <h6>Etiquetas</h6>
    <ul class="list-tags">
      <?php
      $allTags = get_terms(array(
        "taxonomy" => "noti_tag",
        "hide_empty" => true
      ));
      foreach($allTags as $tag ): ?>
      <li><a href="<?php echo get_term_link($tag, "noti_tag") ?>"><?php echo $tag->name ?></a></li>
      
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- <section class="section-sm">
    <h6>Archivos</h6>
    <ul class="list-archive">
      <li><a href="#">April 2018</a></li>
      <li><a href="#">February 2018</a></li>
      <li><a href="#">January 2018</a></li>
      <li><a href="#">December 2018</a></li>
      <li><a href="#">November 2018</a></li>
      <li><a href="#">October 2018</a></li>
    </ul>
  </section> -->


</div>