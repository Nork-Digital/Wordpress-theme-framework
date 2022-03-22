<?php get_header(); ?>

	<main role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <a href="<?php?>">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
      </a>
    <?php endwhile; endif ?>
	</main>

<?php get_footer(); ?>