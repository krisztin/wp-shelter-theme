<?php
  $args = array(
    'post_type' => 'cats',
    'meta_key' => 'featured',
    'meta_value' => '1'
  );

  $query = new WP_Query($args);

  while ( $query->have_posts() ) : $query->the_post(); ?>
    <section class="container-wide">
      <article class="flex">
        <div class="container-text bg-colour-main flex-item feature">
          <h3><i class="fas fa-star fa-sm"></i> Featured cat</h3>
          <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
          </a>
          <p><?php the_field( 'cat_excerpt'); ?></p>
          <p></p>
          <a href="<?php the_permalink(); ?>" class="btn btn-primary inverted">
          Check out <?php the_title(); ?>
          </a>
        </div>
          <?php the_post_thumbnail( 'large', ['class' => 'flex-item'] ); ?>
      </article>
    </section>
  <?php endwhile;
  wp_reset_query();
?>					