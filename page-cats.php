<?php
/*
  Template Name: Cats Listing Page
*/
?>
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <section class="bg-colour-main pad">
        <img class="cat-icon" src="/wpersonal/wp-content/themes/charity_shelter/assets/img/cats.svg">
        <?php
          while ( have_posts() ) :
            the_post();
            
            get_template_part( 'template-parts/content', 'page' );
            
          endwhile;
          ?>
      </section>

<!-- Kittiez! -->
<section>
  <?php get_template_part( 'template-parts/content' , 'catfilter' ); ?>
</section>
<div id="response">


  <?php
  $args = array (
    'post_type' => 'cats'
  );
  $query = new WP_Query( $args ); ?>
 
 <div class="container-wide">
   <section class="cat-listing flex container">
   <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
   <!-- Cat card -->
   <article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-item card' ); ?>>
     <div class="cat-img">
       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
     </div>
     <div class="cat-meta">
       <a href="<?php the_permalink(); ?>" class="btn-text cat-name"><?php the_title(); ?></a>
       <p>icons</p>
     </div>
   </article>
   <!-- nested CTAs elements -->
   <?php
   if( $query->current_post == 2 ) { ?>
     <article class="flex-item bg-colour-pop ad">
       <img class="cat-icon" src="/wpersonal/wp-content/themes/charity_shelter/assets/img/foster.svg">
       <h1>Foster a cat</h1>
         <p>Can you give a temporary home to one of our cats?</p>
       <a href="#" class="btn btn-primary aligncenter">Foster</a>
     </article>
 <?php } 
   if( $query->current_post == 4 ) { ?>
     <article class="flex-item bg-colour-med ad">
       <img class="cat-icon" src="/wpersonal/wp-content/themes/charity_shelter/assets/img/sponsor.svg">
       <h1>Sponsor</h1>
         <p>Spoil a kitty (or more) by setting up a regular donation.</p>
       <a href="#" class="btn btn-primary aligncenter">Sponsor</a>
     </article>
     <?php }
   endwhile; endif; wp_reset_postdata(); ?>
   </section>
 </div>
</div>
<!-- Cat alert signup -->
    <section class="bg-colour-bright">
      <article class="container-full">
          <header>
            <p>Can't find the cat your are looking for?</p>
            <h1 id="signUpA11y">Sign up to our cat alerts!</h1>
            <img class="cat-icon" src="/wpersonal/wp-content/themes/charity_shelter/assets/img/alert_sherlock.svg">
          </header>
        <form>
          <input id="email" type="email" placeholder="Email">
          <button id="signUp" class="btn btn-primary" aria-describedby="signUpA11y">Sign up</button>
          <p><em>No spam, just cats. Guaranteed.</em></p>
        </form>
      </article>
    </section>

  </main>
</div><!-- #primary -->

<?php get_footer(); ?>