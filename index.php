<?php

get_header();
if (have_posts()):
    while (have_posts()): the_post(); ?>
        <article class="post">
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <p><?php the_content(); ?></p>
        </article>
    <?php endwhile;
else:
    ?>
    <p>Sorry, no posts found.</p>
<?php
endif;


get_footer();
