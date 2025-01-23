<!-- This is every normal page in wordpress -->

<?php
get_header();

if (have_posts()):
    while (have_posts()): the_post() ?>
        <article class="post page">
            <!-- only output the nav below if the visited page has children or is a child itself -->

            <?php
            if (has_children() or $post->post_parent > 0): ?>
                <nav class="site-nav children-pages-links">
                    <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
                    <ul class="children-links">
                        <?php
                        $args = array(
                            'child_of' => get_top_ancestor_id(),
                            'title_li' => ''
                        );

                        wp_list_pages($args);

                        ?>
                    </ul>

                </nav>
            <?php endif;
            ?>

            <h2>
                <?php the_title(); ?>
                <?php the_content(); ?>
            </h2>
        </article>
<?php endwhile;
endif;

get_footer();
