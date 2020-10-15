<?php
/**
 * Nomad Sun functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nomad_Sun
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nomad_sun_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nomad_sun_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nomad Sun, use a find and replace
		 * to change 'nomad-sun' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nomad-sun', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'nomad-sun' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'nomad_sun_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'nomad_sun_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nomad_sun_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nomad_sun_content_width', 640 );
}
add_action( 'after_setup_theme', 'nomad_sun_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nomad_sun_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nomad-sun' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nomad-sun' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nomad_sun_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nomad_sun_scripts() {
	wp_enqueue_style( 'nomad-sun-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_enqueue_style( 'nomad-sun-custom',  get_template_directory_uri() . '/css/custom.css');

	// firstly we load barba.js
	wp_enqueue_script('nomad-sun-barba', get_template_directory_uri() . '/js/barba.js');

	// we also load our own script file making sure we load jquery with it too
	wp_enqueue_script('nomad-sun-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'nomad_sun_scripts' );

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


function nice_date($date) {
	echo date("F Y", strtotime($date));
}

// here we have a function that returns us a nicely formatted background
function nice_background($image_field) {
  echo "background-image: url(" . get_field($image_field) . ");";
}
