<article class="post <?php if (!is_single()) { ?> frontpage <? }; ?> <?php if (has_post_thumbnail()) { ?> has-thumbnail <? }; ?>">
  <?php if (!is_single()) { ?>
    <div class="post-thumbnail">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
    </div>
  <?php } ?>

  <div class="post-content">
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

    <?php if (is_search() or is_archive()) { ?>
      <p>
        <?php echo get_the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
      </p>
    <?php } elseif (is_single()) {
      the_post_thumbnail('banner-image'); ?>
      <p><?php the_content(); ?></p>
      <?php } else {

      if ($post->post_excerpt) { ?>
        <p>
          <?php echo get_the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
        </p>
    <?php } else {
        the_content();
      }
    }; ?>

  </div>
</article>