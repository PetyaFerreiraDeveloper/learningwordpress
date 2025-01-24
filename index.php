<!-- This is the home page. in wordpress settings reading - we can choose if it should display the blocks page or a static page we select -->

<?php

get_header(); ?>
<section class="posts-section">
    <div class="main-column">
        <?php if (have_posts()) {
            while (have_posts()): the_post();
                get_template_part('content', get_post_format());
            endwhile;
        } else { ?>
            <p>Sorry, no posts found.</p>
        <?php } ?>
    </div>
    <?php get_sidebar(); ?>
</section>

<?php get_footer();
