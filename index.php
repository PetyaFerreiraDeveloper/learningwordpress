<!-- This is the home page. in wordpress settings reading - we can choose if it should display the blocks page or a static page we select -->

<?php

get_header();
if (have_posts()):
    while (have_posts()): the_post(); ?>
        <article class="post frontpage">
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <p class="post-info"><?php the_time('jS F, Y'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
                <?php
                $categories = get_the_category();
                $separator = ", ";
                $output = '';

                if ($categories) {
                    foreach ($categories as $category) {
                        $output .= '<a href="' . get_category_link($category->term_id) . '"> ' . $category->cat_name . ' </a>' . $separator;
                    }
                    echo trim($output, $separator);
                }
                ?>
            </p>

            <?php the_post_thumbnail(); ?>

            <?php
            if ($post->post_excerpt) { ?>
                <p>
                    <?php echo get_the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
                </p>
            <?php } else {
                the_content();
            }
            ?>

        </article>
    <?php endwhile;
else:
    ?>
    <p>Sorry, no posts found.</p>
<?php
endif;


get_footer();
