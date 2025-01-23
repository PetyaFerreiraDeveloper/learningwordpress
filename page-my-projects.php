<!-- This is a special file that is responsible only for the my projects page -->

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
