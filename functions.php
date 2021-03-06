<?php
/**
 * charity_shelter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package charity_shelter
 */

if ( ! function_exists( 'charity_shelter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function charity_shelter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on charity_shelter, use a find and replace
		 * to change 'charity_shelter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'charity_shelter', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'charity_shelter' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-logo', array (
			'height'      => 100,
			'width'       => 100,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'charity_shelter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function charity_shelter_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'charity_shelter_content_width', 640 );
}
add_action( 'after_setup_theme', 'charity_shelter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function charity_shelter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'sidebar-1' , 'charity_shelter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'charity_shelter' ),
		'before_widget' => `<section class="widget">`,
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'charity_shelter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function charity_shelter_scripts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,500,500i,700,900' );

	wp_enqueue_style( 'charity_shelter-style', get_stylesheet_uri() );

	wp_enqueue_style( 'fontawesome' , 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');

	wp_enqueue_script( 'charity_shelter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'charity_shelter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'charity_shelter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* 
* Search box in nav
*/

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
	function add_search_box( $items, $args ) {
	$items .= '<li class="nav-search">' . get_search_form( false ) . '</li>';
	return $items;
}

/*
* Cats - custom post type
*/

add_action( 'init', 'charity_shelter_cat_init' );

function charity_shelter_cat_init() {
	$labels = array(
		'name'               => _x( 'Cats', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Cat', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Cats', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Cat', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'cat', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New cat', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New cat', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit cat', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View cat', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All cats', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search cats', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent cats:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No cats found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No cats found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'cat' ),
		'capability_type'    => 'post',
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )	);

	register_post_type( 'cats', $args );
}

// changing Post post type to news in the backend

function revcon_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
}
function revcon_change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
	$labels->all_items = 'All News';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';
	$args->rewrite = array('slug' => 'news');
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


// Catfilter

function charity_shelter_catfilter_function(){

	$args = array (
		'post_type' => 'cats',
    'meta_key' => 'gender',
	);

	if ( !empty ($_POST['gender'])) {
		$args['meta_value'] = $_POST['gender'];
	}
 
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
 <?php
	die();
}

add_action('wp_ajax_myfilter', 'charity_shelter_catfilter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'charity_shelter_catfilter_function');