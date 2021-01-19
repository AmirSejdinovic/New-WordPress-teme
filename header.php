<!DOCTYPE html>
<html <?php 
//Dis will add lang attribute dinamicly from wordpress instalation
language_attributes() ?>>
<head>
  <meta charset="<?php
  //Grab dinamicly the carset
  bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  //This wp function ads title and stlyesheats
  wp_head();
  ?>
</head>
<body <?php body_class(); ?>>

<header role="banner" class="margina-donja-40">
  <div class="c-header">
      <div class="o-container u-flags">
         <div class="c-header--logo">
           <?php if(has_custom_logo()) {
             the_custom_logo();

           }else{

            ?>
            <a href="<?php echo esc_url(home_url('/')); ?> " class="c-header--blogname"><?php esc_html(bloginfo('name')); ?></a>
            <?php } ?>
         </div>

         <?php get_search_form(true); ?>
      </div>
  </div>
  <div class="c-navigacija">
      <div class="container">
         <nav class="header-nav" role="nav" aria-label="<?php esc_html_e('Main Navigation', '_themename') ?>">
         <?php wp_nav_menu(array(
           'theme_location' => 'main-menu'
         )); ?>
         
         </nav>
      </div>
  </div>
</header>

<div id="content">


