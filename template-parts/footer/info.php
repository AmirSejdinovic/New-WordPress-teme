<?php
    $site_info = get_theme_mod('_themename_site_info', '');
?>
<div class="c-site-info">
     <div class="row">
        <div class="container">
          <?php echo esc_html($site_info); ?>
        </div>
     </div>
    </div>