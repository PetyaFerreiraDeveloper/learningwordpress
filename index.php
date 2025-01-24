<!-- This is the home page. in wordpress settings reading - we can choose if it should display the blocks page or a static page we select -->

<?php

get_header();
if (have_posts()):
    while (have_posts()): the_post();
        get_template_part('content');
    endwhile;
else:
?>
    <p>Sorry, no posts found.</p>
<?php
endif;


get_footer();
