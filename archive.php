<!-- This is the page that shows the archive of the posts. It will show the posts based on the category, tag, author, date, etc. -->

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
      echo 'This is a monthly archive ' . get_the_date('F Y');
    } else if (is_year()) {
      echo 'This is a yearly archive ' . get_the_date('Y');
    } else {
      echo 'This is an archive';
    }
    ?>

  </h2>

<?php
  while (have_posts()): the_post();
    get_template_part('content');
  endwhile;
else:
  echo '<p>No content found</p>';
endif;

wp_footer();
