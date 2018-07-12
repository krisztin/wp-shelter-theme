<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charity_shelter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container">
		<div class="site-info container-full">
			<h3>Made by Kriszti | <a href="https://github.com/krisztin/wp-shelter-theme" target="_blank">Take a look behind the scenes on Github</a></h3>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'charity_shelter' ) ); ?>"  target="_blank">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'charity_shelter' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Built on %1$s.' ), '<a href="http://underscores.me/" target="_blank">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
