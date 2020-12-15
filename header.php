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
<body>