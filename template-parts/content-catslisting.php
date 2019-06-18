<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-item card' ); ?>>
    <div class="cat-img">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
    </div>
    <div class="cat-meta">
      <a href="<?php the_permalink(); ?>" class="btn-text cat-name"><?php the_title(); ?></a>
      <p>icons</p>
    </div>
</article>