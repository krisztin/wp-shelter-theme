<?php 
/*
  Template Name: News listing page
*/
?>

<article <?php post_class( 'news' );?>>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <ul class="news-listing__meta">
    <li><?php the_category( ' ' ); ?></li>
    <li><?php the_time( 'F j, Y' ); ?></li>
  </ul>

<!--
  strip_tags because the_excerpt puts content in p tags
  which creates another layer (h2 -> p) instead of just h2
-->
  <h2><?php echo strip_tags( get_the_excerpt() ); ?></h2> 
<?php if ( get_post_thumbnail() ) : ?>
  <div class="img-container">
    <?php the_post_thumbnail('large'); ?>
  </div>
<?php endif; ?>

</article>