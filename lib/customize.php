<?php

function _themename_customize_register($wp_customize){

   $wp_customize->selective_refresh->add_partial('blogname', array(
     //'settings' => array('blogname')
     'selector'=> 'c-header--blogname',
     'container_inclusive' => false,
     'render_callback'=> function(){
        bloginfo('name');
     }
   ));

   $wp_customize->selective_refresh->add_partial('_themename_footer_partial', array(
       'settings'=>array('_themename_site_info'),
       'selector'=>'c-site-info',
       'container_inclusive'=>true,
       'render_callback'=> function(){
          get_template_part('template-parts/footer/info');
       }
   ));

  $wp_customize->add_section('_themename_footer_options', array(
     'title' => esc_html__('Footer Options','_themename'),
     'description' => esc_html__('You can change footer options from here', '_themename'),
     'priority' => 30
  ));

  $wp_customize->add_setting('_themename_site_info',array(
     'default' => '',
     'sanitize_callback' => '_themename_sanitize_site_info',
     'transport' => 'postMessage'
  ));

  $wp_customize->add_control('_themename_site_info', array(
     'type'=> 'text',
     'label'=> esc_html__('Site info','_themename'),
     'section'=> '_themename_footer_options'
  ));

  $wp_customize->add_setting('_themename_footer_layout', array(
     'default'=>'3,3,3,3',
     'transport'=>'postMessage',
     'sanitize_callback'=>'sanitize_text_field'
  ));
  $wp_customize->add_control('_themename_footer_layout',array(
     'type'=>'text',
     'label'=>esc_html__('Footer Layout','_themename'),
     'section'=>'_themename_footer_options'
  ));

}

add_action('customize_register', '_themename_customize_register');

function _themename_sanitize_site_info($input){
   $allowed = array('a'=> array(
     'href'=>array(),
     'title'=>array()
   ));
   return wp_kses($input, $allowed);
}

?>