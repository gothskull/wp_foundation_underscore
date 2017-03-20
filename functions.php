<?php
/**
 * Practica-underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Practica-underscore
 */
/*
**************************************************************************
   BORRAR BARRA ADMIN
**************************************************************************
*/
   add_filter('show_admin_bar','__return_false' );

if ( ! function_exists( 'practica_underscore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function practica_underscore_setup() {
	add_image_size( 'img_index', 619, 462, true );
	add_image_size( 'slider', 1200, 380, true );
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Practica-underscore, use a find and replace
	 * to change 'practica-underscore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'practica-underscore', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'practica-underscore' ),
		'menu_pie' => esc_html__( 'Menu Pie', 'practica-underscore' ),
		'social' => esc_html__( 'Redes Sociales', 'practica-underscore' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'practica_underscore_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'practica_underscore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function practica_underscore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'practica_underscore_content_width', 640 );
}
add_action( 'after_setup_theme', 'practica_underscore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function practica_underscore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'practica-underscore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'practica-underscore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title text-center">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'practica_underscore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function practica_underscore_scripts() {
	wp_enqueue_style( 'practica-underscore-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'foundationCss', get_template_directory_uri().'/css/app.css');
	wp_enqueue_style( 'foundationIcons', get_template_directory_uri().'/css/foundation-icons.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'practica-underscore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'foundationJS', get_template_directory_uri().'/bower_components/foundation-sites/dist/js/foundation.js', array('jquery'), '6.1.1', true );
	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/bower_components/what-input/dist/what-input.js', array(), '20151215', true );
	wp_enqueue_script( 'appJs', get_template_directory_uri() . '/js/app.js', array(), '1.0', true );

	wp_enqueue_script( 'practica-underscore-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'practica_underscore_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * My Widgwt
 */
require get_template_directory() . '/inc/widget.php';
