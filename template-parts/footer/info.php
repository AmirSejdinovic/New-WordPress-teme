<?php
    $site_info = get_theme_mod('_themename_site_info', '');
?>
<div class="c-site-info">
     <div class="row">
        <div class="container">
          <?php 
          $allowed = array('a'=> array(
            'href'=>array(),
            'title'=>array()
          ))
          
          echo wp_keses($site_info,$allowed); ?>
        </div>
     </div>
    </div>