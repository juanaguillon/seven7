<?php

acf_add_options_page(array(
  // 'page_title'  => 'Opciones de Tema',
  "position"    => "9",
  'menu_title'  => 'Opciones',
  'menu_slug'   => 'theme-general-settings',
  // 'redirect'    => false
));

acf_add_options_sub_page(array(
  'page_title'   => 'Contacto',
  'menu_title'  => 'Contacto',
  'parent_slug'  => 'theme-general-settings',
));
acf_add_options_sub_page(array(
  'page_title'   => 'Header',
  'menu_title'  => 'Header',
  'parent_slug'  => 'theme-general-settings',
));

acf_add_options_sub_page(array(
  'page_title'   => 'Footer',
  'menu_title'  => 'Footer',
  'parent_slug'  => 'theme-general-settings',
));


// acf_add_options_sub_page(array(
//   'page_title'   => 'Theme Footer Settings',
//   'menu_title'  => 'Footer',
//   'parent_slug'  => 'theme-general-settings',
// ));
