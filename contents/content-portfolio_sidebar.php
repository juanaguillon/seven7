<div class="category-left-bar">

  <section class="section-sm">
    <div class="t-categoria">
      <img src="<?php echo get_template_directory_uri() ?>/images/categoria.svg" height="28" alt="">
      <h6>Categorias</h6>
    </div>

    <ul class="list-xxs small">
      <?php
      $categories = get_terms("category", array(
        "hide_empy" => false
      ));
      foreach ($categories  as $cat) : ?>
        <li><a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a></li>
      <?php endforeach; ?>
    </ul>
  </section>

  <section class="filtros-categorias">

    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/talla.svg" alt="">
        <h6>Talla</h6>
      </div>

      <ul>
        <?php
        $tallas = get_terms(array("hide_empty" => false, "taxonomy" => "talla"));
        foreach ($tallas as $talla) : ?>
          <li><input type="checkbox"><a href="<?php echo get_term_link($talla) ?>"><?php echo $talla->name ?></a></li>
        <?php endforeach; ?>

      </ul>
    </div>
    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/color.svg" alt="">
        <h6>Color</h6>
      </div>
      <ul>
        <?php
        $colors = get_terms(array("hide_empty" => false, "taxonomy" => "color"));
        foreach ($colors as $color) : ?>
          <li><input type="checkbox"><a href="<?php echo get_term_link($color) ?>"><?php echo $color->name ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/material.svg" alt="">
        <h6>Material</h6>
      </div>
      <ul>
        <?php
        $materials = get_terms(array("hide_empty" => false, "taxonomy" => "material"));
        foreach ($materials as $material) : ?>
          <li><input type="checkbox"><a href="<?php echo get_term_link($material) ?>"><?php echo $material->name ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

</div>