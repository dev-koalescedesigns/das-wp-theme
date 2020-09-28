<?php
/**
 * das functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package das
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'das2021_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function das2021_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on das, use a find and replace
		 * to change 'das2021' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'das2021', get_template_directory() . '/languages' );

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
				'main-menu' 	=> esc_html__( 'Primary', 'das2021' ),
				'mega-menu' 	=> esc_html__( 'Mega-Menu', 'das2021' ),
				'bottom-menu' 	=> esc_html__( 'Bottom-Menu', 'das2021' ),
				'footer-menu' 	=> esc_html__( 'Footer-Menu', 'das2021' ),
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
				'das2021_custom_background_args',
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
add_action( 'after_setup_theme', 'das2021_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function das2021_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'das2021_content_width', 640 );
}
add_action( 'after_setup_theme', 'das2021_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function das2021_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'das2021' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'das2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'das2021_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function das2021_scripts() {
	wp_enqueue_style( 'das2021-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'das2021-style', 'rtl', 'replace' );

	wp_enqueue_script( 'das2021-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'das2021_scripts' );


/**
* Add Author Profile Fields
* 
*/
function wpb_new_contactmethods( $contactmethods ) {
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';
	//add Facebook
	$contactmethods['facebook'] = 'Facebook';
	 
	return $contactmethods;
}
add_filter('user_contactmethods','wpb_new_contactmethods',10,1);


/**
* Stop more link from jumping to middle of page
* 
*/
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');



/**
* Add SVG Support 
*/
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
* Modify read more text
*/
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '... <a class="more-link" href="' . get_permalink() . '" target="_blank">Continue reading &raquo;</a>';
}

/**
 * Limit WordPress the_content Words
 * 
 * @link https://www.technig.com/limit-wordpress-the_content-words-length/
 */
function das_content($limit){
	$content = explode(' ', get_the_content(), $limit);
  
	if (count($content)>=$limit){
		 array_pop($content);
		 $content = implode(" ",$content).'... <a class="read-more-link" href="' . get_permalink() . '" target="_blank">Continue reading &raquo;</a>';
	} else {
	  $content = implode(" ",$content);
	}
	  
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/**
 * WooCommerce login redirect 
 */
add_filter( 'login_url', 'my_login_page', 10, 3 );
function my_login_page( $login_url, $redirect, $force_reauth ) {
    $login_page = home_url( '/my-account/' );
    $login_url = add_query_arg( 'redirect_to', $redirect, $login_page );
    return $login_url;
}

/**
 * Change Select Options
 */
function change_select_option($text) {
	global $product;
	$product_type = $product->product_type;
	switch ( $product_type ) {
	  case 'external':
		return __( 'Buy product', 'woocommerce' );
	  break;
	  case 'grouped':
		return __( 'View products', 'woocommerce' );
	  break;
	  case 'simple':
		return __( 'Add to cart', 'woocommerce' );
	  break;
	  case 'variable':
		return __( 'Click to Order', 'woocommerce' );
	  break;
	  default:
		return __( 'Read more', 'woocommerce' );
	} 
  }
  add_filter( 'woocommerce_product_add_to_cart_text' , 'change_select_option' );


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

/**
 * Load mega menu compatibility file.
 */
//require_once get_template_directory() . '/inc/megamenu.php';

