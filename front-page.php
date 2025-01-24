<!-- Special wordpress page that only controls the frontpage -->

<?php
get_header();

if (have_posts()):
  while (have_posts()): the_post() ?>
    <article class="post front-page">
      <h2>
        <?php the_title(); ?>
        <?php the_content(); ?>
      </h2>
    </article>
<?php endwhile;
endif;

get_footer();
