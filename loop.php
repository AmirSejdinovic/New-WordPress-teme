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
   <?php _themename_post_meta(); ?>
</div>

<div>
  <?php  the_excerpt(); ?>
</div>

<?php _themename_readmore_link(); ?>

    <?php } ?>
<?php do_action('_themename_after_pagination');?>
 <?php }/*If there are no posts found in database*/ else{ ?>
  <p><?php echo apply_filters('_themename_no_posts_text',esc_html__('Sorry, no posts metched your criteria.','_themename'))?></p>

 <?php } ?>