<?php

/**
 *Carrega o modulo de otimizações.
 */
require_once get_template_directory() . '/inc/optimize.php';


/**
 *Carrega o CSS.
 */
function nork_fw_add_theme_styles()
{
  //registra o css no wordpress
  wp_register_style('style', get_template_directory_uri() . '/css/style.css', false, null);

  wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', false, null);
  wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', false, null);
}
add_action('wp_enqueue_styles', 'nork_fw_add_theme_styles');

/**
 *Carrega o JAVASCRIPT
 */
function nork_fw_add_theme_scripts()
{
  //registra o js no wordpress
  wp_register_script('slick', get_template_directory_uri() . '/slick/slick.min.js', false, null);
  wp_register_script('scripts', get_template_directory_uri() . '/js/script.js', false, null);
}
add_action('wp_enqueue_scripts', 'nork_fw_add_theme_scripts');



/**
 *Configurações gerais.
 */

// Habilitar Menus
add_theme_support('menus');

//habilita post thumbnail
add_theme_support('post-thumbnails');

//substitui todas a <title> pelo título da página
add_theme_support('title-tag');

//add custom class <LI>
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


//add active item on menu
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
  if (in_array('current-menu-item', $classes)) {
    $classes[] = 'active nav-active';
  }
  return $classes;
}
