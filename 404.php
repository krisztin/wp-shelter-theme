<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package charity_shelter
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container-full">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! Page not found', 'charity_shelter' );?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'charity_shelter' ); ?></p>
					<h2 class="pop">Maybe you were looking for me?</h2>
				
					<?php get_template_part( 'template-parts/content', 'featured' ); ?>					
				<p>Or search the site for what you're looking for.</p><?php
					get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
