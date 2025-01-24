<!-- Page responsible for displaying the gallery of images. -->
<?php
get_header();

if (have_posts()):
  while (have_posts()): the_post(); ?>
    <section class="gallery-page">
      <h2><?php the_title(); ?></h2>
      <article class="content-column">
        <?php the_content(); ?>
      </article>
    </section>
<?php endwhile;
endif;

get_footer();
?>