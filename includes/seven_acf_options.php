<?php

acf_add_options_page(array(
  'page_title'  => 'Opciones de Tema',
  'menu_title'  => 'Opciones Generales',
  'menu_slug'   => 'theme-general-settings',
  'capability'  => 'edit_posts',
  'redirect'    => false
));

// acf_add_options_sub_page(array(
//   'page_title'   => 'Theme Header Settings',
//   'menu_title'  => 'Header',
//   'parent_slug'  => 'theme-general-settings',
// ));

// acf_add_options_sub_page(array(
//   'page_title'   => 'Theme Footer Settings',
//   'menu_title'  => 'Footer',
//   'parent_slug'  => 'theme-general-settings',
// ));
