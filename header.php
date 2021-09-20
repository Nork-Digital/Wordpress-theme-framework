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
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--puxa título do site do personalizar do WordPress -->
  <title><?php bloginfo('name') ?> <?php wp_title('|'); ?></title>

  <?php if (!get_option('site_icon')) : ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
  <?php endif; ?>
  <?php wp_head(); ?>



  <!--css fontawesome-->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/all.min.css">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>