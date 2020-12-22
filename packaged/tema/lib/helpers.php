<?php

//Creating custom function which will allow me to use this template wherever I want
function tema_post_meta(){ 

   //Creating string for translate. Here i use printf php fuction with wp placehodler %s and ecc_html__ function
   printf(
     
    esc_html__('Posted on %s', 'tema'),
    '<a href="' . esc_url(get_permalink()) .  '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) .'</time></a>'
  
  );

  printf( 
    esc_html__(' By %s', 'tema'),
    '<a href="' . esc_url(get_author_posts_url( get_the_author_meta('ID'))) .'">' . esc_html(get_the_author()) . 
  '</a>'


  );

 

}

function tema_readmore_link(){
 echo '<a href="' . esc_url(get_permalink()) . '"  title="' . the_title_attribute(['echo'=> false]) . '">';

 printf(
   
   wp_kses(  __('Read More <span class="u-screen-reader-text">About %s</span>', 'tema'),
    [
      'span' => [
        'class'=> []
      ]
    ]
  ),
   get_the_title()
 );
 

 echo '</a>';
}


?>