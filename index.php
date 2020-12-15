<?php
  //The wordpress default template tag to get header from header.php

  //This function accepts arguments. In the argument we can provide the custom header etc if we in as argument set the "vertilcal" this will looking for header-vertical.php in the themes directory
 get_header(); ?>
 
 <?php
  //Creating the wp loop
   //Here I check if there are the posts
   //Here i open the if stetment and break with closing php tag and after I added the html markup I will close the if statement
 if(have_posts()) { ?>

    <?php 
    //If there are posts in database
    //Then do the while loop
    while(have_posts()) { ?>
      <?php 
      //Isnide the while loop we must call the_post fuction
      //If we do not call this function we get the infinite loop and our template tags in html markup will not work

      the_post();?>
       <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

       <div>
          Posted on
           <a href="<?php echo get_permalink(); ?>">
           
           <time datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date(); ?></time>
           
           </a>

           By <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php
           echo get_the_author();
            ?></a>
       </div>

       <div>
         <?php  the_excerpt(); ?>
       </div>

       <a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More <span class="u-screen-reader-text">About <?php the_title(); ?> </span></a>

    <?php } ?>

 <?php }/*If there are no posts found in database*/ else{ ?>
  <p>Sorry, no posts metched your criteria.</p>

 <?php } ?>

<?php
  //The wordpress template tag for footer. This will include footer.php
    get_footer(); ?>
  
