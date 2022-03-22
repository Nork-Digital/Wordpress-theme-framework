
<?php get_header(); ?>

<main role="main">

  <?php while ( have_posts() ) : ?>
    <?php the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>

    <?php if ( comments_open() || get_comments_number() ) : comments_template() ?> 
    
    <?php endif; ?>
  <?php endwhile; ?>

</main>

<?php get_footer(); ?>