<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <section>
    <div>
      <?php while (have_posts()) : the_post(); ?>
        <?php if (isset($_GET['post_type'])) {
          $type = $_GET['post_type'];
          if ($type == 'arquivos') { ?>
            <?php $img_de_destaque = get_the_post_thumbnail_url($post->ID, 'full'); ?>

            <div>
              <div>
                <a href="<?php print site_url() . '/item/?id=' . $post->ID ?>"> <img src="" alt="">
                  <h1><?php the_title() ?></h1>
                </a>

              </div>

            <?php } else { ?>

              <div class="container center">
                <p>Ocorreu um erro inesperado! <br /><a class="btn" href="/">Voltar para a home</a></p>
              </div>

            <?php } ?>
          <?php } else { ?>
            </div>

            <div class="container center">
              <p>Ocorreu um erro inesperado! <br /><a class="btn" href="/">Voltar para a home</a></p>
            </div>
            
          <?php } ?>
        <?php endwhile;
    else : ?>
        <div class="container center">
          <p>Não há resultado para o termo: <strong><?php echo get_query_var('s') ?></strong>, tente utilizar palavras mais amplas! <br /><br /><a class="btn" href="/">Ver todos os arquivos</a></p>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <?php get_footer(); ?>