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

<?php while (have_posts()): the_post();
    get_template_part('content');
  endwhile;
else:
  echo '<p>No content found</p>';
endif;

get_footer();
?>