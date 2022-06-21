<?php get_header(); ?>

<?php
//Conteúdo
$img_hero_blog = get_field('img_hero_blog');



?>
<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <?php foreach ((get_the_category()) as $category) {
            ;
        } ?>
    <section class="secao-hero-blog hero">
      <div class="bg-hero-blog" style="background: url(<?php echo $img_hero_blog ?>) no-repeat top center fixed;">
      </div>
        <div class="cont-hero-blog">
          <div class="txt-hero-blog">
            <p><?php echo $category->cat_name; ?></p>
            <h1><?php the_title();?></h1>
          </div>
        </div>
    </section>


    <section class="secao-conteudo-blog">
    <div class="cont-conteudo-blog">
     <hr />
      <div class="post-conteudo-blog">
        <?php echo get_the_content();?>
        <hr />
      </div>
    </div>
  </section>

    <?php }
} ?>
<?php get_footer(); ?>
