<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

<?php
$s = get_search_query();
$args = array(
  's' => $s
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
  ("<h2 style='font-weight:bold;color:#000'>Mostrando resultados para: " . get_query_var('s') . "</h2>");
  while ($the_query->have_posts()) {
    $the_query->the_post();
?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
  <?php
  }
} else {
  ?>
  <h2 style='font-weight:bold;color:#000'>erro</h2>
  <div class="alert alert-info">
    <p>msg de erro.</p>
  </div>
<?php } ?>

<?php get_footer();
