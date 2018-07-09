<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charity_shelter
 */

get_header();
?>

	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
        <?php endif;
		endif;
		?>
    <section>
      <div class="flex">
        <article class="flex-item cta-card">
          <a href="/wpersonal/cats">
            <img src="/wpersonal/wp-content/themes/charity_shelter/assets/img/adopt.svg" class="cat-icon">
            <h1 class="pop">Adopt</h1>
            <p>Cough hairball on conveniently placed pants.</p>
          </a>
        </article>
        <article class="flex-item cta-card">
          <div class="flex">
            <a href="/wpersonal/support-us/donate">
              <img src="/wpersonal/wp-content/themes/charity_shelter/assets/img/donate.svg" class="cat-icon">
              <h1 class="pop">Donate</h1>
              <p>Cough hairball on conveniently placed pants.</p>
            </a>
        </article>
        <article class="flex-item cta-card">
          <a href="/wpersonal/support-us/volunteer">
            <img src="/wpersonal/wp-content/themes/charity_shelter/assets/img/volunteer.svg" class="cat-icon">
            <h1 class="pop">Volunteer</h1>
            <p>Cough hairball on conveniently placed pants.</p>
          </a>
        </article>
      </div>
    </section>
    
  <?php get_template_part( 'template-parts/content' , 'featured' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
