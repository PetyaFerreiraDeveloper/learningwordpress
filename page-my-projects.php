<?php
get_header();

if (have_posts()):
    while (have_posts()): the_post();  ?>

        <article class="post projects">
            <div class="title-column">
                <?php the_title(); ?>
            </div>
            <div class="text-column">
                <?php the_content(); ?>
            </div>
        </article>

<?php endwhile;

endif;
get_footer();
