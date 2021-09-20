<?php

#carregando os styles
function nork_fw_add_theme_styles()
{
  //registra o css no wordpress
  wp_register_style('style', get_template_directory_uri() . '/css/style.css', false, null);
  wp_register_style('fontawesome', get_template_directory_uri() . '/css/all.min.css', false, null);
  wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', false, null);
  wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', false, null);
}
add_action('wp_enqueue_styles', 'nork_fw_add_theme_styles');

#carregando os scripts
function nork_fw_add_theme_scripts()
{
  //registra o js no wordpress
  wp_register_script('fontawesome', get_template_directory_uri() . '/js/all.min.js', false, null);
  wp_register_script('slick', get_template_directory_uri() . '/slick/slick.min.js', false, null);
  wp_register_script('scripts', get_template_directory_uri() . '/js/script.js', false, null);
}
add_action('wp_enqueue_scripts', 'nork_fw_add_theme_scripts');

#remover versao do wordpress
function wpb_remove_version()
{
  return '';
}

add_filter('the_generator', 'wpb_remove_version');


#custom painel no feed
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Nork Digital', 'custom_dashboard_help');
}

function custom_dashboard_help()
{
  echo '<p>Bem-vindo ao seu site! Precisa de ajuda? <a href="mailto:suporte@nork.digital">abrir chamado</a>. Veja alguns tutoriais que podem te ajudar: <a href="https://www.nork.digital/suporte" target="_blank">Help Nork</a></p>';
  echo '<img src="https://www.nork.digital/wp-content/uploads/2017/10/nork-wordpress.png" />';
}
#remover footer
function remove_footer_admin()
{
  echo 'Desenvolvido por <a href="https://www.nork.digital" target="_blank">Nork Digital</a> | Precisa de ajuda? <a href="mailto:suporte@nork.digital" target="_blank">Suporte</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

#remover feedback de erro wordpress
function no_wordpress_errors()
{
  return 'Algo deu errado, tente novamente.';
}
add_filter('login_errors', 'no_wordpress_errors');

#remover painel de boas vindas
remove_action('welcome_panel', 'wp_welcome_panel');

//Styling wp-login page
function login_styles()
{ ?>
  <style type="text/css">
    body {
      background: #e8b800 !important;
      /* Old browsers */
      background: -moz-linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important;
      /* FF3.6-15 */
      background: -webkit-linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important;
      /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(45deg, #e8b800 0%, #fce48a 100%) !important;
      /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#e8b800', endColorstr='#000', GradientType=1);
      /* IE6-9 fallback on horizontal gradient */
      background-attachment: fixed !important;
    }

    #wp-submit {
      border: none !important;
      box-shadow: none !important;
      background: #000 !important;
      text-shadow: none !important;
      border-radius: 4px !important;
      -webkit-border-radius: 4px !important;
      color: #fff !important;
      display: block;
      width: 100% !important;
      margin: 30px 0 0 0 !important;
      font-size: 16px;
      padding: 5px 0 !important;
      height: auto !important;
      transition: all 0.5s;
    }

    #wp-submit:hover {
      background: #e8b800 !important;
    }

    .login h1 a {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/nork-wordpress.png') !important;
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/nork-wordpress.png') !important;
      background-size: 100% !important;
      background-position: center center !important;
      background-repeat: no-repeat;
      height: 74px !important;
      width: 250px !important;
    }

    .login #backtoblog a,
    .login #nav a {
      color: #fff !important;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'login_styles');
// Link logo login
function my_login_logo_url()
{
  return get_bloginfo('url');
}
add_filter('login_headerurl', 'my_login_logo_url');
// Mudar nome ao passar o mouse
function my_login_logo_url_title()
{
  return 'Nork Digital';
}
add_filter('login_headertitle', 'my_login_logo_url_title');


// remove query strings
function remove_cssjs_ver($src)
{
  if (strpos($src, '?ver='))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);

// remove RSD-LINK
remove_action('wp_head', 'rsd_link');

// desabilita emoticons wordpress
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// desabilita XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// desabilitar self pingbacks
function disable_pingback(&$links)
{
  foreach ($links as $l => $link)
    if (0 === strpos($link, get_option('home')))
      unset($links[$l]);
}
add_action('pre_ping', 'disable_pingback');


// desabilitar heartbeat api
add_action('init', 'stop_heartbeat', 1);
function stop_heartbeat()
{
  wp_deregister_script('heartbeat');
}

// desabilitar dashicons

function wpdocs_dequeue_dashicon()
{
  if (current_user_can('update_core')) {
    return;
  }
  wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'wpdocs_dequeue_dashicon');


// desabilita admin bar
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);


/* desabilitar notificações menos para admins */
add_action('admin_head', function () {
  if (!current_user_can('manage_options')) {
    remove_action('admin_notices', 'update_nag',      3);
    remove_action('admin_notices', 'maintenance_nag', 10);
  }
});

function pr_disable_admin_notices()
{
  global $wp_filter;
  if (is_user_admin()) {
    if (isset($wp_filter['user_admin_notices'])) {
      unset($wp_filter['user_admin_notices']);
    }
  } elseif (isset($wp_filter['admin_notices'])) {
    unset($wp_filter['admin_notices']);
  }
  if (isset($wp_filter['all_admin_notices'])) {
    unset($wp_filter['all_admin_notices']);
  }
}
add_action('admin_print_scripts', 'pr_disable_admin_notices');


/**
 * Remove injected CSS from gallery.
 */
add_filter('use_default_gallery_style', '__return_false');

/**
 * Add rel="nofollow" and remove rel="category".
 */
function odin_modify_category_rel($text)
{
  $search = array('rel="category"', 'rel="category tag"');
  $text = str_replace($search, 'rel="nofollow"', $text);

  return $text;
}

add_filter('wp_list_categories', 'odin_modify_category_rel');
add_filter('the_category', 'odin_modify_category_rel');

/**
 * Add rel="nofollow" and remove rel="tag".
 */
function odin_modify_tag_rel($taglink)
{
  return str_replace('rel="tag">', 'rel="nofollow">', $taglink);
}

add_filter('wp_tag_cloud', 'odin_modify_tag_rel');
add_filter('the_tags', 'odin_modify_tag_rel');


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param  array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
  return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
}

add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');

/**
 * Remove logo from admin bar.
 */
function odin_admin_adminbar_remove_logo()
{
  global $wp_admin_bar;

  $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'odin_admin_adminbar_remove_logo');


/**
 * Remove widgets dashboard.
 */
function odin_admin_remove_dashboard_widgets()
{
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');

  // Yoast's SEO Plugin Widget
  remove_meta_box('yoast_db_widget', 'dashboard', 'normal');
}

add_action('wp_dashboard_setup', 'odin_admin_remove_dashboard_widgets');


// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

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
