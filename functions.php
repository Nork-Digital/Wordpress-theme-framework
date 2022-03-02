<?php

/**
 *Carrega o modulo de otimizações.
 */
require_once get_template_directory() . '/inc/optimize.php';


/**
 *Carrega o modulo de enqueu de scripts e styles.
 */
require_once get_template_directory() . '/inc/scripts-and-styles.php';






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
