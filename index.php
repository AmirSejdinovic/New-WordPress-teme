
<?php
  //The wordpress default template tag to get header from header.php

  //This function accepts arguments. In the argument we can provide the custom header etc if we in as argument set the "vertilcal" this will looking for header-vertical.php in the themes directory
 get_header(); ?>

<div class="container">

 <div class="row">
   <div class="col-sm-8">
     <?php get_template_part( 'loop', 'index' ); ?>
   </div>
 
 <?php if(is_active_sidebar('primary-sidebar')) { ?>
 <div class="col-sm-4">

  <?php get_sidebar() ?>
 </div>
 <?php } ?>

 

<?php
  //The wordpress template tag for footer. This will include footer.php
    get_footer(); ?>
  
