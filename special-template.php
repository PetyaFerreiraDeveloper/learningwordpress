<?php
/*
Template Name: Special Layout
*/

get_header();

if (have_posts()):
    while (have_posts()): the_post(); ?>
        <section class="special-page">
            <article class="content-column">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
            <div class="info-box">
                <h4>Disclaimer Title</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente laboriosam, totam in voluptate obcaecati ab. Maiores, tempore veniam dolorem ducimus magnam laboriosam ratione aliquam illum voluptatibus quae, voluptas, modi laudantium!</p>
            </div>
        </section>
<?php endwhile;
endif;
get_footer();
?>