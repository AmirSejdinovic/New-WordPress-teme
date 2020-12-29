   
   <?php
     $footer_layout = '3,3,3,3';
     $columns = explode(',', $footer_layout); 
     $footer_bg = 'dark';
     $widgets_active = false;
     foreach($columns as $i => $column){
        if(is_active_sidebar( 'footer-sidebar-' . ($i +1) )){
           $widgets_active = true;
        }
     }
   ?>
   <?php if($widgets_active){ ?>
   <div class="c-footer c-footer--<?php echo $footer_bg; ?>">
     
      <div class="o-container">
         <div class="row">
             <?php foreach($columns as $i => $column) { ?>
               <div class="col-sm-<?php echo $column ?>">
                   <?php if(is_active_sidebar('footer-sidebar-' . ($i +1))){ 
                      dynamic_sidebar( 'footer-sidebar-' . ($i +1) );
                   } ?>
               </div>
               
            <?php
             }?>
         </div>
      </div>
   </div>
   <?php } ?>
   <div class="c-site-info">
     <div class="row">
        <div class="container">
          All Right Recived
        </div>
     </div>
    </div>
   <?php 
 

   //Wia this I will add scripts to the WP
   wp_footer(); ?>

   </div><!--row-->
   </div><!--container-->
   </body>
</html>