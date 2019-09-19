<div class="category-left-bar">

  <section class="filtros-categorias">
    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/categoria.svg" height="28" alt="">
        <h6>Categorias</h6>
      </div>

      <?php
      $current_object = get_queried_object();
      $currentTermId = $current_object->term_id;
      ?>

      <select data-prop="category" name="filter_category_select" id="filter_category_select">
        <option value="null">Seleccione una categoría</option>
        <?php
        $categories = get_terms("category", array(
          "hide_empy" => false
        ));
        foreach ($categories  as $cat) :

          // Verificar si se está haciendo el filtro
          if (isset($_GET["category"])) {
            $currentTermId = $_GET["category"];
          }
          ?>
          <option data-termid="<?php echo $cat->term_id ?>" <?php if ($cat->term_id == $currentTermId) echo "selected" ?> value="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/talla.svg" alt="">
        <h6>Talla</h6>
      </div>

      <select data-prop="talla" name="filter_talla_select" id="filter_talla_select">
        <option value="null">Seleccione una talla</option>
        <?php

        $tallas = get_terms(array("hide_empty" => true, "taxonomy" => "talla"));
        foreach ($tallas as $talla) :

          if (isset($_GET["talla"])) {
            $currentTermId = $_GET["talla"];
          }
          ?>

          <option data-termid="<?php echo $talla->term_id ?>" <?php if ($talla->term_id == $currentTermId) echo "selected" ?> value="<?php echo get_term_link($talla) ?>"><?php echo $talla->name ?></option>
        <?php endforeach; ?>
      </select>


    </div>
    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/color.svg" alt="">
        <h6>Color</h6>
      </div>
      <select data-prop="color" name="filter_color_select" id="filter_color_select">
        <option value="null">Seleccione una color</option>
        <?php
        $colors = get_terms(array("hide_empty" => true, "taxonomy" => "color"));
        foreach ($colors as $color) :
          if (isset($_GET["color"])) {
            $currentTermId = $_GET["color"];
          }
          ?>
          <option data-termid="<?php echo $color->term_id ?>" <?php if ($color->term_id == $currentTermId) echo "selected" ?> value="<?php echo get_term_link($color) ?>"><?php echo $color->name ?></option>
        <?php endforeach; ?>
      </select>

    </div>
    <div class="filtro">
      <div class="t-filtro">
        <img src="<?php echo get_template_directory_uri() ?>/images/material.svg" alt="">
        <h6>Material</h6>
      </div>
      <select data-prop="material" name="filter_material_select" id="filter_material_select">
        <option value="null">Seleccione un material</option>
        <?php
        $materials = get_terms(array("hide_empty" => true, "taxonomy" => "material"));
        foreach ($materials as $material) :
          if (isset($_GET["material"])) {
            $currentTermId = $_GET["material"];
          }
          ?>
          <option data-termid="<?php echo $material->term_id ?>" <?php if ($material->term_id == $currentTermId) echo "selected" ?> value="<?php echo get_term_link($material) ?>"><?php echo $material->name ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </section>

</div>