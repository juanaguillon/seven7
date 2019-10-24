<?php


/**
 * Agregar argumentos a un nuevo post Type 
 * @param string $name Nombre general de el nuevo post-type,
 * @param string $icon Icono que se agregará a el post type
 * @param boolean $isMale Se ajusta en revisar si es un elemento masculino/femenino. Se ajusta en campos como <Ver todos los elementos> o <Ver todas las páginas>
 * @param array $supports Todos los soportes que tiene el post type, por defecto será <<title, editor, thumbnail>>
 * @param string $taxonomie Taxonomias que se agregarán separadas por ","
 * @return array Lista de args que se pasarán a un nuevo post type.
 * */
function __seven_register_post_type($name, $icon, $isMale = true, $supports = array(), $taxonomie = "", $prural = "s")
{

  $theName = ucfirst($name);
  $genre = ($isMale) ? "o" : "a";
  if (empty($supports)) {
    $supports = array(
      'title', 'editor', 'thumbnail'
    );
  }
  $labels = array(
    'name'                  => $theName . $prural,
    'singular_name'         => $theName,
    'menu_name'             => $theName . $prural,
    'name_admin_bar'        => $theName,
    'add_new'               => 'Añadir nuev' . $genre,
    'add_new_item'          => "Añadir nuev" . $genre . ' ' . $name,
    'new_item'              => 'Nuev' . $genre . ' ' . $name,
    'edit_item'             => 'Editar ' . $name,
    'view_item'             => 'Ver ' . $name,
    'all_items'             => 'Tod' . $genre . 's l' . $genre . 's ' . $name . 's', //Tod@s l@s *Nombre de Post*
    'search_items'          => "Buscar {$name}",
    'not_found'             => "No se han encontrado {$name}s.",
    'not_found_in_trash'    => "No se ha encontrado {$name}s en la papelera."
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'          => $icon,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => strtolower($name)),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'supports'           => $supports,
  );

  if ($taxonomie !== "") {
    $args["taxonomies"] = explode(",", $taxonomie);
  }

  return $args;
}

/**
 * Agregar una nueva taxonomía completa.
 * @param String $name Nombre singular de la Taxonomía.
 * @param Boolean $is_male Si es true, este se tomará como taxonomia masculina. Por ejemplo, la taxonomía es "Escritor", si se asigna true a esta variable, será "El Escritor"; en caso contrario será "La Escritor"
 * @param Boolean $asTag ¿Será una taxonomía donde se permitan taxonomias/categorías hijas?
 * @param Array $otherArgs Este será definido para ajustes de esta taxonomía. La clave "Labels" Se ajustarán y no podrán sobreescribrse.
 * @see https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function __seven_register_taxonomy($name, $is_male = true, $asTag = false, $otherArgs = array())
{
  $theName = ucfirst($name);
  $pluralName = $theName . "s";
  $genre = ($is_male) ? "o" : "a";
  $labels = array(
    'name'                       => $pluralName,
    'singular_name'              => $theName,
    'search_items'               => "Buscar {$pluralName}",
    'popular_items'              => "{$pluralName} Populares",
    'all_items'                  => "Tod{$genre}s l{$genre}s {$pluralName}",
    'edit_item'                  => "Editar {$theName}",
    'update_item'                => "Actualizar {$theName}",
    'add_new_item'               => "Añadir {$theName}",
    'new_item_name'              => "Nuevo nombre de {$theName}",
    'add_or_remove_items'        => "Añadir o Eliminar {$theName}",
    'not_found'                  => "No se ha encontrado ${$pluralName}",
    'menu_name'                  => $pluralName,
  );

  if (empty($otherArgs)) {
    $args = array(
      'show_ui'               => true,
      'show_admin_column'     => true,
      'query_var'             => true,
      'rewrite'               => array('slug' => strtolower($theName)),
    );
  } else {
    $args = $otherArgs;
  }
  if ($asTag) {
    $args["hierarchical"] = false;
  } else {
    $args["hierarchical"] = true;
  }
  $args["labels"] = $labels;
  return $args;
}

function seven_register_the_posts_types()
{

  $postTypes = array(
    "productos"   => __seven_register_post_type("producto", "dashicons-tag", true, array(
      "excerpt", "thumbnail", "title"
    ), "category"),
    "colleciones" => __seven_register_post_type("coleccion", "dashicons-store", null, null, null, "es"),
    "noticia" => __seven_register_post_type("noticia", "dashicons-admin-site", false, array(
      "editor", "excerpt", "thumbnail", "title"
    ))
  );

  $taxonomiesProduct = array(
    "talla" => __seven_register_taxonomy("talla", false),
    "color" => __seven_register_taxonomy("color"),
    "material" => __seven_register_taxonomy("material"),
  );
  $taxNotices = array(
    "noti_category" => __seven_register_taxonomy("categoria", false),
    "noti_tag" => __seven_register_taxonomy("etiqueta", false, true),
  );

  foreach ($postTypes as $ptkey => $ptvalue) {
    register_post_type($ptkey, $ptvalue);
  }

  foreach ($taxonomiesProduct as $tax => $taxArgs) {
    register_taxonomy($tax, "productos", $taxArgs);
  }
  foreach ($taxNotices as $not => $notArgs) {
    register_taxonomy($not, "noticia", $notArgs);
  }
}

add_action("init", "seven_register_the_posts_types");
