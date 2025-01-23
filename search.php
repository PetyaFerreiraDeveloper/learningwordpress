<!-- This is page that outputs the search results in wordpress. if we dont have this file wordpress will output the search results in index.php -->

<?php
get_header();

if (have_posts()):
?>
  <h2 class="search-page-title">Search results for:
    <span class="search-term">
      <?php the_search_query(); ?>
    </span>
  </h2>

  <?php while (have_posts()): the_post(); ?>
    <article class="post frontpage search-page <?php if (has_post_thumbnail()) { ?> has-thumbnail <? } ?>">
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
      </div>
      <div class="post-content">
        <h3>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>
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
        <?php
        the_excerpt();
        ?>
      </div>
    </article>
<?php endwhile;
else:
  echo '<p>No content found</p>';
endif;

get_footer();
?>