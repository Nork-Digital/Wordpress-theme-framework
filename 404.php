<?php

/**
 * Página 404 do tema
 *
 * Exibida quando a página selecionada não existe
 *
 * @theme Nork Digital Framework
 * 
 */

get_header();
?>

<p><?php esc_html_e('Parece que nada foi encontrado neste local. Talvez tente uma pesquisa?'); ?></p>
<?php get_search_form(); ?>

<?php get_footer();
