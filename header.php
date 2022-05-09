<?php

/**
 * O Header do tema
 *
 * Exibe toda a <head> e abre a tag body
 *
 * @theme Nork Digital Framework
 *
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--puxa título do site do personalizar do WordPress -->
  <title><?php wp_title('|', true, 'right'); ?></title>

  <?php if (!get_option('site_icon')) : ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
  <?php endif; ?>
  <?php wp_head(); ?>

   <!--Alertify css-->
   <link
      rel="stylesheet"
      href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"
    />
    <!--Glider css-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.css"
      integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>assets/css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div class="loader"></div> <!--adiciona o loader, alterar img loader.gif ou remover essa linha -->
  
