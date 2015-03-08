<?php
/**
 * photolove functions and definitions
 *
 * @package photolove
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( !function_exists( 'photolove_setup' ) ) : /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ {
	function photolove_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on photolove, use a find and replace
		 * to change 'photolove' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'photolove', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails', array( 'post', 'page', 'photo' ) );
		add_image_size( 'profile-image', 400, 500, true ); //Page thumbnail.
		add_image_size( 'post-image', 380, 380, true ); //Page thumbnail.
		add_image_size( 'featured-photo-image', 400, 300, true ); //Featured photo thumbnail.


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'photolove' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside', 'image', 'video', 'quote', 'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'photolove_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	}
}
endif; // photolove_setup
add_action( 'after_setup_theme', 'photolove_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function photolove_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'photolove' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
}

add_action( 'widgets_init', 'photolove_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function photolove_scripts() {
	if ( !is_admin() ) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, '1.11.1' );
		wp_enqueue_script( 'jquery' );
	}
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '', 'all' );

	wp_enqueue_style( 'fontello', get_template_directory_uri() . '/assets/font/css/fontello.css', array(), '', 'all' );

	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/bower_components/owlcarousel/owl-carousel/owl.carousel.css', array(), '', 'all' );

	wp_register_style( 'theme-default-stylesheet', get_template_directory_uri() . '/assets/css/main.css', array(), '', 'all' );
	wp_enqueue_style( 'theme-default-stylesheet' );

	wp_enqueue_style( 'photolove-style', get_stylesheet_uri() );

	wp_enqueue_script( 'owl-script', get_template_directory_uri() . '/bower_components/owlcarousel/owl-carousel/owl.carousel.min.js', array(), '', true );

	wp_enqueue_script( 'photolove-script', get_template_directory_uri() . '/assets/js/build/production.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'photolove_scripts' );

/**
 * Auto Excerpt
 */
function auto_excerpt_more( $more ) {
	return '</p><p></p><a class="button" href="' . get_permalink() . '">' . __( 'Continue Reading', 'photolove' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'auto_excerpt_more' );


/**
 * Register Custom Post Type
 */
function photo_post_type() {

	$labels = array(
		'name'               => _x( 'Photos', 'Post Type General Name', 'photolove' ),
		'singular_name'      => _x( 'Photo', 'Post Type Singular Name', 'photolove' ),
		'menu_name'          => __( 'Photo', 'photolove' ),
		'parent_item_colon'  => __( 'Parent Photo:', 'photolove' ),
		'all_items'          => __( 'All Photo', 'photolove' ),
		'view_item'          => __( 'View Photo', 'photolove' ),
		'add_new_item'       => __( 'Add New Photo', 'photolove' ),
		'add_new'            => __( 'New Photo', 'photolove' ),
		'edit_item'          => __( 'Edit Photo', 'photolove' ),
		'update_item'        => __( 'Update Photo', 'photolove' ),
		'search_items'       => __( 'Search photos', 'photolove' ),
		'not_found'          => __( 'No photos found', 'photolove' ),
		'not_found_in_trash' => __( 'No photos found in Trash', 'photolove' ),
	);
	$args   = array(
		'label'               => __( 'photo', 'photolove' ),
		'description'         => __( 'Photo pages', 'photolove' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'photo', $args );

}
add_action( 'init', 'photo_post_type', 0 );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';



