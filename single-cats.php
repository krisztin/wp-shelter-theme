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
	<!-- cat metadata -->
			<article class="cat-info">
				<h3>Age: <?php the_field('age'); ?></h3>
				<h3>Sex: <?php the_field('sex'); ?></h3>
				<h3>Likes dogs? <?php the_field('likes_dogs'); ?></h3>
				<h3>Likes cats? <?php the_field('likes_cats'); ?></h3>
				<h3>How about children? <?php the_field('children'); ?></h3>
			</article>
			</article>
		<?php endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer(); ?>