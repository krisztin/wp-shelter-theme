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
			<article>
				<h2>About <?php the_title(); ?></h2>
				<?php the_field('about'); ?>
			</article>
		<!-- medical conditional displayed when cat has medical notes/conditions-->
			<?php
				$medical = get_field('medical');
				if( !empty($medical)) : ?>
					<article>
						<h2>Medical Notes</h2>
					<?php the_field('medical'); ?>
					</article>
				<?php endif; ?>
		<!-- fostering conditional displayed if cat needs a foster home-->
			<?php
				$foster = get_field('foster');
				if( !empty($foster)) : ?>
					<article class="bg-colour-pop">
						<p>Could you give <?php the_title();?> a temporary home? He is not doing well in our cattery and could use a break from all the other cats (and us).</p>
						<a href="#" class="btn btn-primary aligncenter">Foster <?php the_title(); ?></a>
					</article>
				<?php endif; ?>
	<!-- end of cat metadata -->
	<!-- custom field images loop -->
<?php
for ($x = 1; $x <= 8; $x++ ) {

$image = get_field("image_{$x}");

if( !empty($image) ) { ?>
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php }
 }  ?>
	<!-- end of custom field images -->

		<?php endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); ?>