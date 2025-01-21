<?php

get_header();

if (have_posts()):
?>

  <h2>
    <?php
    if (is_category()) {
      echo "Read more post in " . single_cat_title('', false);
    } else if (is_tag()) {
      echo single_tag_title();
    } else if (is_author()) {
      the_post();
      echo 'Author archive: ' . get_the_author();
      rewind_posts();
    } else if (is_day()) {
      echo 'This is a daily archive ' . get_the_date();
    } else if (is_month()) {
      echo 'This is a monthly archive ' .get_the_date('F Y');
    } else if (is_year()) {
      echo 'This is a yearly archive ' .get_the_date('Y');
    } else {
      echo 'This is an archive';
    }
    ?>

  </h2>

  <?php
  while (have_posts()): the_post(); ?>
    <article class="post">
      <h3>
        <a href="<?php the_permalink(); ?>">
          <?php the_title() ?>
        </a>
      </h3>
      <p class="post-info">
        <?php the_time('j F, Y') ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"> <?php the_author(); ?> </a> | Posted in
        <?php
        $categories = get_the_category();
        $separator = ', ';
        $output = '';

        if ($categories) {
          foreach ($categories as $category) {
            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
            echo trim($output, $separator);
          }
        }
        ?>
      </p>
      <p><?php the_excerpt() ?></p>
    </article>

<?php endwhile;
else:
  echo '<p>No content found</p>';
endif;

wp_footer();
