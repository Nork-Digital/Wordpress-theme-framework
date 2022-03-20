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

  <!--Slick css-->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
  <header class="secao-header">
    <div class="cont-header">
      <div class="logo-header"> <a href="/">
          <img src="<?php echo get_template_directory_uri(); ?>/img/Group 705.png" alt="Logo Marco Glória" /></a>
      </div>
      <div class="logo-header-resp">
        <img src="<?php echo get_template_directory_uri(); ?>/img/Group 764.png" alt="Logo Marco Glória" />
      </div>
      <nav class="nav-menu-header">
        <ul>
          <li onclick="addClassAtivo('home');" id="home" class="nav-header-ativo"><a href="<?php echo get_page_link(15) . '#Hero' ?>">Home</a></li>
          <li onclick="addClassAtivo('sobre');" id="sobre"><a href="<?php echo get_page_link(15) . '#Sobre' ?>">Sobre</a></li>
          <li onclick="addClassAtivo('servicos');" id="servicos"><a href="<?php echo get_page_link(15) . '#Serviços' ?>">Serviços</a></li>
          <li onclick="addClassAtivo('projetos');" id="projetos"><a href="<?php echo get_page_link(15) . '#Projetos' ?>">Projetos</a></li>
          <li onclick="addClassAtivo('contato');" id="contato"><a href="<?php echo get_page_link(15) . '#Contato' ?>">Contato</a></li>
        </ul>
      </nav>
      <div class="btns-header">
        <a href="#Contato" class="btn-mg btn-header">Orçamento</a>
      </div>
      <div class="redes-header">
        <a href="<? echo $fb_redes_mg ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="<? echo $insta_redes_mg ?>" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
      <div class="menu-hamburger">
        <span></span>
      </div>
    </div>
  </header>
