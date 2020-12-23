<?php 

//Including helpers fuctions from helpers.php
require_once('lib/helpers.php');

require_once('lib/enqueue-assets.php');

function after_pagination(){
  echo "knjs3";
}

function after_pagination2(){
  echo "knjs3dsfa";
}
add_action('_themename_after_pagination', 'after_pagination',2);
add_action('_themename_after_pagination', 'after_pagination2',1 );


//add_action('pre_get_posts', 'function_to_add' );

function no_post_text($text){
    return esc_html__('No posts');
}

add_filter('_themename_no_posts_text', 'no_post_text');

function filter_title($title){
   return 'Filterd' . $title;
}

add_filter('the_title', 'filter_title')



?>