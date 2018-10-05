<?php
/**
 * the_architect functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package the_architect
 */

if ( ! function_exists( 'the_architect_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function the_architect_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on the_architect, use a find and replace
		 * to change 'the_architect' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the_architect', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'ナビゲーション', 'the_architect' ),
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

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 144,
			'width'       => 144,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'the_architect_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_architect_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'the_architect_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_architect_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function the_architect_scripts() {
	wp_enqueue_style( 'the_architect-style', get_stylesheet_uri() );

	wp_enqueue_script( 'the_architect-navigation', get_template_directory_uri() . '/js/common.js', array( 'jquery' ), '20151215', true );
  
  wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'the_architect-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'the_architect-object-fit', get_template_directory_uri() . '/js/fitie.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'the_architect-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_architect_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * TGM plugin activation settings
 */
require get_template_directory() . '/tgm-settings.php';

/*
 * Add custom post type
 */
function create_post_type() {
	register_post_type( 
		'the_architect_works',array(
			'labels' => array(
				'name' => __( 'WORKS' ),
				'singular_name' => __( 'works' )
			),
			'public' => true,
			'show_in_rest' => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'works' ),
			'supports' => array( 'title', 'editor', 'thumbnail',  'custom-fields'  ),
			'template' => array(
				array( 'core/gallery' ),
				array( 'core/heading', array(
					'placeholder' => '作品名を入力してください'
				) ),
				array( 'core/columns', array(), array(
					array( 'core/column', array(), array(
						array( 'core/paragraph', array(
							'placeholder' => '作品の説明を入れてください。'
						) ),
					) ),
					array( 'core/column', array(), array(
						array( 'core/table', array(
							
						) ),
					) ),
				) )
			),
		)
	);
	register_post_type( 		
		'the_architect_news',array(
			'labels' => array(
				'name' => __( 'NEWS' ),
				'singular_name' => __( 'news' )
			),
			'public' => true,
			'show_in_rest' => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'news' ),
			'supports' => array( 'title', 'editor', 'thumbnail'),
		)
	);
}
add_action( 'init', 'create_post_type' );

/*
 * Smart Custom Field settings
 */
if ( class_exists( 'Smart_Custom_Fields' ) ){
	require get_template_directory() . '/inc/custom-field-settings.php';
}

/*
 * Archive for post
 */
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'blog'; // ページ名
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/*
 * Registers an editor stylesheet for the theme.
 */
add_action( 'enqueue_block_editor_assets', 'gutenberg_stylesheets_custom_demo' );
function gutenberg_stylesheets_custom_demo() {
	$editor_style_url = get_theme_file_uri('/editor.css');
	wp_enqueue_style( 'theme-editor-style', $editor_style_url );
}

/*
 * Auto theme update
 */
require get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';
$update_checker =  Puc_v4_Factory::buildUpdateChecker(
	'https://zarigani-design-office.github.io/the-architect-introduce/theme.json',
	__FILE__,
	'the-architect' 
);