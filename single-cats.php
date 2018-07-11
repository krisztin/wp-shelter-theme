<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<header class="entry-header container-full">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
	<!-- .entry-header -->
			<section class="container-wide">
			<?php the_post_thumbnail(); ?>
			</section>
			<article class="cat-info container-full">
				<h3>Age: <?php the_field('cat_age'); ?></h3>
				<h3>Can live with dogs? <?php the_field('likes_dogs'); ?></h3>
			</article>
		<?php endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer(); ?>