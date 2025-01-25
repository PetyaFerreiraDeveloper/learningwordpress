<!-- Special wordpress page that only controls the frontpage -->

<?php
get_header(); ?>
<div>
  <?php if (have_posts()):
    while (have_posts()): the_post() ?>
      <article class="post front-page">
        <h2>
          <?php the_title(); ?>
        </h2>
        <?php the_content(); ?>
      </article>
  <?php endwhile;
  endif; ?>

  <section class="front-page-columns">
    <div class="front-page-column">
      <h3>Latest Image Posts</h3>
      <?php
      // Output the two most recent blog posts with category Images. By adding parameters in the WP_Query function, we can control what posts are displayed. In this case, we are displaying the two most recent posts from the category with the ID of 11 (Images). We are also ordering the posts by title in ascending order. WP would normally order posts by date in descending order.

      $imagePosts = new WP_Query('cat=11&posts_per_page=2&orderby=title&order=ASC');
      if ($imagePosts->have_posts()):
        while ($imagePosts->have_posts()): $imagePosts->the_post(); ?>
          <div class="posts-column-content">
            <div class="front-page-featured-image">
              <a href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('small-thumbnail');
                } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">
                <?php } ?>
              </a>
            </div>
            <div>
              <h4>
                <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
              </h4>
              <?php the_excerpt(); ?>
            </div>
          </div>
      <?php endwhile;

      else :
        echo '<p>No content found</p>';
      endif;
      wp_reset_postdata(); ?>
    </div>
    <div class="front-page-column">
      <h3>Latest Tech Posts</h3>

      <?php
      // Output the two most recent blog posts with category Technology

      $techPosts = new WP_Query('cat=4&posts_per_page=2');
      if ($techPosts->have_posts()) {
        while ($techPosts->have_posts()): $techPosts->the_post(); ?>
          <div class="posts-column-content">
            <div class="front-page-featured-image">
              <a href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('small-thumbnail');
                } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">
                <?php } ?>
              </a>
            </div>
            <div>
              <h4>
                <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
              </h4>
              <?php the_excerpt(); ?>
            </div>
          </div>
      <?php endwhile;
      } else {
        echo '<p>No content found</p>';
      }
      wp_reset_postdata();
      ?>
    </div>
  </section>
</div>
<?php get_footer();
