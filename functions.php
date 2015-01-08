<?php
/**
 * kube4 functions and definitions
 *
 * @package kube4
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kube4_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kube4_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kube4, use a find and replace
	 * to change 'kube4' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kube4', get_template_directory() . '/assets/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Add theme support for custom CSS in the TinyMCE visual editor
	add_theme_support('editor_style');

	// Load Editor Styles
	function kube4_add_editor_styles() {
	    add_editor_style( '/assets/sass/wordpress/editor-styles.css' );
	}
	add_action( 'init', 'kube4_add_editor_styles' );

	// Load custom Login page styles
	function kube4_login_styles() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/sass/wordpress/login.css' );
	}
	add_action( 'login_enqueue_scripts', 'kube4_login_styles' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kube4' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kube4_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kube4_setup
add_action( 'after_setup_theme', 'kube4_setup' );

	/**
	 * Include WooCommerce theme support
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	
	function my_theme_wrapper_start() {
	  echo '<div id="primary" class="content-area">';
	}
	
	function my_theme_wrapper_end() {
	  echo '</div>';
	}
	
	add_theme_support( 'woocommerce' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kube4_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kube4' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kube4_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kube4_scripts() {
	
	wp_register_style( 'kube4-style', get_template_directory_uri() . '/assets/sass/style.css', false, '0.0.1', 'all' );
	wp_enqueue_style( 'kube4-style' );
	
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'kube4-site-scripts', get_template_directory_uri() . '/assets/js/min/site-scripts-min-kb4.js', array(), '20130115', false );

	wp_enqueue_script( 'kube4-site-scripts-footer', get_template_directory_uri() . '/assets/js/min/site-scripts-footer-min-kb4.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kube4_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/assets/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/assets/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/assets/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/assets/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/assets/inc/jetpack.php';
