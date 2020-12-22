<?php
 
 function tema_assets(){
   wp_enqueue_style('tema-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(),'1.0.0', 'all');
  
   wp_enqueue_script( 'tema-script', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'),'1.0.0',true);
 }

 add_action('wp_enqueue_scripts', 'tema_assets');

 function tema_admin_assets(){
  wp_enqueue_style('tema-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(),'1.0.0', 'all');

  wp_enqueue_script( 'tema-admin-script', get_template_directory_uri() . '/dist/assets/js/admin.js', array(),'1.0.0.',true);
}

add_action('admin_enqueue_scripts', 'tema_admin_assets');