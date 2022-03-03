<?php /* PÁGINA INDEX.PHP USADA COMO PADRÃO PARA CONTEÚDOS -
arquivo index. php funciona como um curinga dentro da hierarquia de templates do WordPress. Acredita-se muito que ele é o arquivo para exibir o conteúdo da página inicial, mas na verdade, qualquer página dentro do WordPress pode ter seu conteúdo exibido pelo arquivo index. php. */ ?>

<?php get_header(); ?>

<?php if (have_posts()) {
  while (have_posts()) {
    the_post(); ?>
    <div class="titulo-bg">
      <h1 class="texto-index"><?php the_title(); ?></h1>
    </div>
    <main class="container">
      <section class="column">
        <?php the_content(); ?>
      </section>
    </main>

<?php }
} ?>

<?php get_footer(); ?>