<?php
  $args = array(
    'post_type' => 'cats',
    'meta_key' => 'featured',
    'meta_value' => '1'
  );

  $query = new WP_Query($args);

  while ( $query->have_posts() ) : $query->the_post(); ?>
    <section>
      <a href="<?php the_permalink(); ?>">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field( 'featured_excerpt'); ?></p>
        <?php the_post_thumbnail(); ?>
      </a>
    </section>
  <?php endwhile;
  wp_reset_query();
?>					