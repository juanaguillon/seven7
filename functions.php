<?php 

include_once "includes/seven_post_types.php";

function printcode($code){
  echo "<pre>" . print_r($code, true) . "</pre>";
}

function seven_init_theme(){

  add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "seven_init_theme");