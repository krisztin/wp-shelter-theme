<?php
/*
  Template Name: Cats Listing Page
*/
?>
<?php get_header(); ?>

	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main no-sidebar">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

<?php
$args = array (
  'post_type' => 'cats'
);
$query = new WP_Query ( $args );

?>

<section class="cat-listing flex">
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-item' ); ?>>
    <div class="cat-img">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?>
    </div>
    <div class="cat-meta">
      <h2 class="cat-name"><?php the_title(); ?></h2>
    </div></a>
  </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>