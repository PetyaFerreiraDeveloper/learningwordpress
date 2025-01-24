<!-- This is page that outputs the single post made in wordpress -->

<?php

get_header();
if (have_posts()): ?>
    <?php while (have_posts()): the_post();
        get_template_part('content', get_post_format());
    endwhile;
else:
    ?>
    <p>Sorry, no posts found.</p>
<?php
endif;


get_footer();
