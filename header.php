<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charity_shelter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php wp_title( '|' , true, 'right' ); bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'charity_shelter' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container-wide nav-flex">
			<!-- site-branding -->
			<div class="site-branding container-text nav-flex-disp">
				<?php	the_custom_logo(); ?>
				<h1><?php bloginfo( 'name' ); ?></h1>
			</div>
			<!-- navigation -->
			<nav id="site-navigation" class="main-navigation nav-flex-menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav>
		</div>
			<?php if (is_front_page()) : while ( have_posts() ) : the_post(); ?>
				<div class="custom-header-media">
					<div class="container-text cta-header">
						<h1><?php the_field( 'cta_header_title'); ?></h1>
						<p><?php the_field( 'cta_header_text'); ?></p>
						<a href="<?php the_field( 'cta_header_button_link'); ?>" class="btn btn-secondary inverted"><?php the_field( 'cta_header_button_text'); ?></a>
						<a href="#" class="btn btn-primary inverted">Donate</a>
					</div>
					<?php the_custom_header_markup(); ?>
				</div>
				<?php endwhile; endif; ?>
</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
