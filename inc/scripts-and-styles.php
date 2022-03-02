<?php

/**
 * NORK FRAMEWORK scripts and styles.
 */


/**
 *Carrega o CSS.
 */
function nork_fw_add_theme_styles()
{
  //registra o css no wordpress
  wp_register_style('style', get_template_directory_uri() . '/assets/css/style.css', false, null);
}
add_action('wp_enqueue_styles', 'nork_fw_add_theme_styles');



/**
 *Carrega o JAVASCRIPT
 */
function nork_fw_add_theme_scripts()
{
  //registra o js no wordpress
  wp_register_script('scripts', get_template_directory_uri() . '/js/script.js', false, null);
}
add_action('wp_enqueue_scripts', 'nork_fw_add_theme_scripts');
