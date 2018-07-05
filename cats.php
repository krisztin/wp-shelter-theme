<?php
/*
  Template Name: Cats Listing Page
*/
?>
<?php get_header(); ?>

<h1> test </h1>

<?php
$args = array (
  'post_type' => 'cat'
);
$query = new WP_Query ( $args );

?>

<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="animal-img">
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
</div>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>