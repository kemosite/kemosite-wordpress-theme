<?php
/**
 * kemosite-wordpress-theme functions and definitions
 * 
 * When refactoring, try to reserve this script "controller" level functions only. Define the function "models" in appended scripts.
 * Action functions can be saved here, for now.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kemosite-wordpress-theme
 */

define( 'GITHUB_UPDATER_OVERRIDE_DOT_ORG', true ); // Override Dot Org will skip any updates from wordpress.org for plugins with identical slugs.
if (!defined( 'SAVEQUERIES' )): define( 'SAVEQUERIES', true ); endif;
define('DISABLE_NAG_NOTICES', true);

if ( !function_exists('kemosite_debug_to_console') ) :
    
    function kemosite_debug_to_console($data) {
        $output = json_encode($data);
        echo "<script>console.log(".$output.");</script>";
    }

endif;

// Define is_plugin_active
if ( !function_exists('is_plugin_active') ):
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
endif;

// Check for Woocommerce, Define Woocommerce constant, append appropriate styles
if (is_plugin_active('woocommerce/woocommerce.php')): define('KEMOSITE_WOOCOMMERCE_ACTIVE', true); else: define('KEMOSITE_WOOCOMMERCE_ACTIVE', false); endif;

// Check for Learnpress, Define Learnpress constant, append appropriate styles
if (is_plugin_active('learnpress/learnpress.php')): define('KEMOSITE_LEARNPRESS_ACTIVE', true); else: define('KEMOSITE_LEARNPRESS_ACTIVE', false); endif;

// Determine whether this is an AMP response.
/*
if (!function_exists('is_amp_detected')):
	function is_amp_detected() {
	    return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
	}
endif;
*/

/* [Declare Depedencies] */
if ( ! function_exists( 'kemosite_wordpress_theme_dependencies' ) ) :
	function kemosite_wordpress_theme_dependencies() {
	 
		// Check for github-updater
		if (!is_plugin_active('git-updater/git-updater.php')):
			echo '<div class="notice notice-warning"><p>Warning: This theme needs the git-updater plugin to keep up-to-date.</p></div>';
		endif;

		// Check for kemosite-typography-plugin
		if (!is_plugin_active('kemosite-typography-plugin/index.php')):
			echo '<div class="notice notice-warning"><p>Warning: This theme needs the kemosite-typography-plugin to optimize website typography.</p></div>';
		endif;
		//plugin is activated

		// Check for Woocommerce
		if ( KEMOSITE_WOOCOMMERCE_ACTIVE == false ):
			echo '<div class="notice notice-info is-dismissible"><p>This theme supports WooCommerce.</p></div>';
		endif;

		// Check for Learnpress
		if ( KEMOSITE_LEARNPRESS_ACTIVE == false ):
			echo '<div class="notice notice-info is-dismissible"><p>This theme supports Learnpress.</p></div>';
		endif;

	}
endif;
add_action( 'admin_notices', 'kemosite_wordpress_theme_dependencies' );

if ( ! function_exists( 'kemosite_wordpress_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kemosite_wordpress_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kemosite-wordpress-theme, use a find and replace
		 * to change 'kemosite-wordpress-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kemosite-wordpress-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'kemosite-wordpress-theme' ),
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
		add_theme_support( 'custom-background', apply_filters( 'kemosite_wordpress_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'kemosite_wordpress_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kemosite_wordpress_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kemosite_wordpress_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'kemosite_wordpress_theme_content_width', 0 );

// Add kemosite-wordpress-theme class to body tag for specificity if needed
add_filter( 'body_class','kemosite_wordpress_theme_classes' );

if ( !function_exists('kemosite_typography_classes') ) :
	
	function kemosite_typography_classes( $classes ) {

		$classes[] = 'kemosite_wordpress_theme';
	 
	    return $classes;
	     
	}

endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/*function kemosite_wordpress_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kemosite-wordpress-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kemosite-wordpress-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kemosite_wordpress_theme_widgets_init' );
*/

function my_post_function($query) {
 
	$query->set('nopaging', true);
	return $query;
 
}
// add_action( 'pre_get_posts', 'my_post_function'); /* NO! THIS BREAKS PRODUCT AND POST RETRIEVALS! */

/*
** [HELPER FUNCTIONS] **
*/
require_once get_template_directory() . '/inc/function-helpers/function-helpers-colours.php';

/**
 * Looks in Custom Fields for Excerpt data.
 */
function kemosite_custom_excerpt( $post_id = null) {

    if (!empty(get_post_meta($post_id, 'page_excerpt'))):
    	$page_excerpt = get_post_meta($post_id, 'page_excerpt');
    	$excerpt = esc_textarea($page_excerpt[0]);
    elseif ( has_excerpt($post_id) ):
		$excerpt = get_the_excerpt($post_id);
	else:
		$excerpt = the_excerpt();
	endif;

	/*
	echo "<pre>";
	print_r($post_id);
	print_r($excerpt);
	print_r($page_excerpt);
	echo "</pre>";
	*/

  // endif;

	// $excerpt = "Excerpt received";

  return $excerpt;

}

function kemosite_check_post_for_thumbnail( $post_id ) {

	// If post has no thumbnail defined

	// create one, save to media, and append to post.
	// kemosite_create_thumbnail_for_post();

}
add_action( 'save_post', 'kemosite_check_post_for_thumbnail' );

/**
 * Check to see if the current page is the login/register page.
 *
 * Use this in conjunction with is_admin() to separate the front-end
 * from the back-end of your theme.
 *
 * @return bool
 */
if ( ! function_exists( 'is_login_page' ) ):
	function is_login_page() {
		return in_array(
			$GLOBALS['pagenow'],
			array( 'wp-login.php', 'wp-register.php' ),
			true
	    );
	  }
endif;

/**
 * Enqueue scripts and styles.
 */

/* 
** [UNIVERAL THEME COLOURS] **
*/
require_once get_template_directory() . '/inc/customize-register/customize-register-universal-colours.php'; // returns $kemosite_wordpress_universal_colours

/* [Includes] */
// require_once ("functions-headless.php"); // Depricate
require_once ("functions-woocommerce.php");
require_once ("functions-enqueue-scripts.php");
require_once ("functions-dashboard-setup.php");
require_once get_template_directory() . '/inc/functions-customize-register.php';
require_once get_template_directory() . '/inc/functions-customize-sections.php';

require_once ("functions-shortcodes.php");

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	// require get_template_directory() . '/inc/jetpack.php';
}

/* [Define Menus] */
class off_canvas_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array( 'sub-menu' );
	    $classes[]		=	'nested vertical menu';
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul $class_names>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here    	

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    // if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a tabindex="0"'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    // f ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    /*
	    if (has_post_thumbnail($item->object_id) && $item->menu_item_parent > 0):
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;
		*/

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	    /*
	    echo "<pre>";
    	print_r($item);
    	echo "<br><br>";
    	echo "<pre>";
    	*/

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }

}

class mega_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array( 'sub-menu' );
	    /*
	    $classes[]		=	'sub-mega-menu';
	    $classes[]		=	'grid-x';
	    $classes[]		=	'grid-margin-x';
	    $classes[]		=	'small-up-2';
	    $classes[]		=	'medium-up-3';
	    $classes[]		=	'large-up-4';
	    */
	    $classes[]		=	'submenu menu vertical';
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul {$class_names} data-submenu>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    // echo "<script>console.log(".json_encode($item).");</script>";
    	  
	    if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;
	    if ($args->walker->has_children > 0): $classes[] = 'has-submenu'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a tabindex="0"'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    if ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    // Need to get the properties of the post that the menu item links to. See if it has an image.
	    // => post_name: "73"

	    if (has_post_thumbnail($item->ID) && $item->menu_item_parent === "0"):
	    // if ($item->menu_item_parent === "0"):
	    	echo "<script>console.log('There should be an image here.');</script>";
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );    	

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }
}

class footer_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array();
	    
	    /*
	    $classes[]		=	'sub-mega-menu';
	    $classes[]		=	'grid-x';
	    $classes[]		=	'grid-margin-x';
	    $classes[]		=	'small-up-2';
	    $classes[]		=	'medium-up-3';
	    $classes[]		=	'large-up-4';
	    */
	    
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul {$class_names} data-submenu>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;
	    if ($args->walker->has_children > 0): $classes[] = 'has-submenu'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a tabindex="0"'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    if ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    if (has_post_thumbnail($item->object_id) && $item->menu_item_parent > 0):
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	    /*
	    echo "<pre>";
    	print_r($item);
    	echo "<br><br>";
    	echo "<pre>";
    	*/

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }
}

function kemosite_widgets_init() {

	register_sidebar( array(
		'name'          => 'Copyright Widget',
		'id'            => 'copyright_widget',
		'before_widget' => '<div class="copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

	register_sidebar( array(
		'name'          => 'Social Widget',
		'id'            => 'social_widget',
		'before_widget' => '<div class="social media">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

}
add_action( 'widgets_init', 'kemosite_widgets_init' );

function register_my_menus() {

	// Unset menus from parent theme.
	unregister_nav_menu( 'top' );
	unregister_nav_menu( 'social' );
	
	register_nav_menu( 'top-bar-menu', __( 'Top Bar Menu', 'kemosite-wordpress-theme' ) );
	register_nav_menu( 'off-canvas-menu', __( 'Off Canvas Menu', 'kemosite-wordpress-theme' ) );
	register_nav_menu( 'footer-column-one', __( 'Footer Column One', 'kemosite-wordpress-theme' ) );
	register_nav_menu( 'footer-column-two', __( 'Footer Column Two', 'kemosite-wordpress-theme' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'kemosite-wordpress-theme' ) );
	register_nav_menu( 'off-canvas-footer-menu', __( 'Off Canvas Footer Menu', 'kemosite-wordpress-theme' ) );
	

}
add_action( 'after_setup_theme', 'register_my_menus' );

/* [ADD CUSTOMIZER CSS] */
add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css() {

	global $kemosite_wordpress_universal_colours;
	global $kemosite_wordpress_default_google_font;

	$kemosite_wordpress_cool_white = $kemosite_cool_white = $kemosite_wordpress_universal_colours['cool_white'];
	$kemosite_base_black = $kemosite_wordpress_universal_colours['base_black'];
	$kemosite_base_black_minus_blue = $kemosite_wordpress_universal_colours['base_black_minus_blue'];

	/* [GLOBAL COLOUR OPTIONS] */
	$kemosite_wordpress_base_primary_colour = get_theme_mod( 'kemosite_wordpress_base_primary_colour', $kemosite_base_black );
	$kemosite_wordpress_base_black = get_theme_mod( 'kemosite_wordpress_base_black', $kemosite_base_black );

	/* [HEADER OPTIONS] */
	$kemosite_wordpress_header_bg_image = get_theme_mod('kemosite_wordpress_header_bg_image');
	$kemosite_wordpress_header_bg_image_presentation = get_theme_mod('kemosite_wordpress_header_bg_image_presentation');
	$kemosite_wordpress_header_bg_color = get_theme_mod( 'kemosite_wordpress_header_bg_color', $kemosite_base_black );
	$kemosite_wordpress_header_font_color = ( kemosite_hex_to_lum( $kemosite_wordpress_header_bg_color ) >= 0.5 ) ? $kemosite_base_black : $kemosite_cool_white;

	$kemosite_wordpress_header_font = get_theme_mod('kemosite_wordpress_header_font', $kemosite_wordpress_default_google_font);
	echo '<link href="https://fonts.googleapis.com/css2?family='.$kemosite_wordpress_header_font.'&display=swap" rel="stylesheet">';
	$kemosite_wordpress_header_font_family_name = explode(":", $kemosite_wordpress_header_font);

	/* [MAIN CONTENT OPTIONS] */
		
	/* Light Mode (Default) */
	$kemosite_wordpress_main_content_bg_color_light_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_light_mode', $kemosite_cool_white );
	$kemosite_wordpress_main_content_bg_color_light_mode_lum = kemosite_hex_to_lum($kemosite_wordpress_main_content_bg_color_light_mode) * 100;
	$kemosite_wordpress_main_content_font_color_light_mode = ( $kemosite_wordpress_main_content_bg_color_light_mode_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	/* Dark Mode */
	$kemosite_wordpress_main_content_bg_color_dark_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_dark_mode', $kemosite_base_black_minus_blue );
	$kemosite_wordpress_main_content_bg_color_dark_mode_lum = kemosite_hex_to_lum($kemosite_wordpress_main_content_bg_color_dark_mode) * 100;
	$kemosite_wordpress_main_content_font_color_dark_mode = ( $kemosite_wordpress_main_content_bg_color_dark_mode_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	/**
	 * Google Font Sample *
	 * <link rel="preconnect" href="https://fonts.googleapis.com">
	 * <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	 * <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;700&display=swap" rel="stylesheet">
	 */	

	/* [H1-H6 FONT] */
	$h1_h6_font = get_theme_mod('kemosite_wordpress_fonts_h1_h6', $kemosite_wordpress_default_google_font);
	echo '<link href="https://fonts.googleapis.com/css2?family='.$h1_h6_font.'&display=swap" rel="stylesheet">';
	$h1_h6_font_family_name = explode(":", $h1_h6_font);

	/* [BODY COPY FONT] */
	$body_copy_font = get_theme_mod('kemosite_wordpress_fonts_body', $kemosite_wordpress_default_google_font);
	echo '<link href="https://fonts.googleapis.com/css2?family='.$body_copy_font.'&display=swap" rel="stylesheet">';
	$body_copy_font_family_name = explode(":", $body_copy_font);

	/* [BUTTON FONT] */
	$button_font = get_theme_mod('kemosite_wordpress_fonts_buttons', $kemosite_wordpress_default_google_font);
	echo '<link href="https://fonts.googleapis.com/css2?family='.$button_font.'&display=swap" rel="stylesheet">';
	$button_font_family_name = explode(":", $button_font);

	/* [PRODUCT COLUMNS] */
	if (is_plugin_active('woocommerce/woocommerce.php')):
		$thumbnail_column_count = esc_attr( wc_get_loop_prop( 'columns' ) );
		$thumbnail_column_width = 100 / $thumbnail_column_count;
		$set_column_margin = 1; // %
		$set_column_width = $thumbnail_column_width - ($set_column_margin * 2);
		$set_double_column_width = ($thumbnail_column_width * 2) - ($set_column_margin * 2);
		$set_full_column_width = 100 - ($set_column_margin * 2);

		?>

		<style type="text/css">

			:root {

				--set_column_margin: <?php echo $set_column_margin; ?>%;
				--set_column_width: <?php echo $set_column_width; ?>%;
				--set_double_column_width: <?php echo $set_double_column_width; ?>%;
				--set_full_column_width: <?php echo $set_full_column_width; ?>%;

			}

		</style>

		<?php

	endif;

	/* [FOOTER OPTIONS] */
	$kemosite_wordpress_footer_bg_color = get_theme_mod( 'kemosite_wordpress_footer_bg_color', $kemosite_base_black );
	$kemosite_wordpress_footer_font_color = ( kemosite_hex_to_lum( $kemosite_wordpress_footer_bg_color ) >= 0.5 ) ? $kemosite_base_black : $kemosite_cool_white;

	$kemosite_wordpress_footer_font = get_theme_mod('kemosite_wordpress_footer_font', $kemosite_wordpress_default_google_font);
	echo '<link href="https://fonts.googleapis.com/css2?family='.$kemosite_wordpress_footer_font.'&display=swap" rel="stylesheet">';
	$kemosite_wordpress_footer_font_family_name = explode(":", $kemosite_wordpress_footer_font);

	/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */
	
	// Selection Colour

	$kemosite_wordpress_selection_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $kemosite_base_black );
	$kemosite_wordpress_selection_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_selection_colour_source );
	$kemosite_wordpress_selection_colour_source_hsl_array = explode( ",", $kemosite_wordpress_selection_colour_source_hsl );
	$kemosite_wordpress_selection_colour_source_lum = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_source) * 100;
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_selection_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_selection_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_selection_colour_dark_mode = $kemosite_wordpress_selection_colour_light_mode = $kemosite_wordpress_selection_colour_source;
	$kemosite_wordpress_selection_font_colour_dark_mode = $kemosite_wordpress_selection_font_colour_light_mode = ( $kemosite_wordpress_selection_colour_source_lum >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_selection_colour_source_bg_contrast_light_mode < 3 || $kemosite_wordpress_selection_colour_source_bg_contrast_light_mode > 4.5):

		$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_selection_colour_source_lum, 3 );

		$kemosite_wordpress_selection_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_selection_colour_source_hsl_array,
			$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_selection_colour_source_lum
		);

		$kemosite_wordpress_selection_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_selection_colour_hsl_light_mode );
		$kemosite_wordpress_selection_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_light_mode) * 100;
		$kemosite_wordpress_selection_font_colour_light_mode = ( $kemosite_wordpress_selection_colour_lum_light_mode >= 50) ? $kemosite_base_black : $kemosite_cool_white;
		
	endif; if ( $kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode < 3 || $kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode > 4.5 ):

		$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_selection_colour_source_lum, 3 );
		
		$kemosite_wordpress_selection_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_selection_colour_source_hsl_array,
			$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_selection_colour_source_lum
		);

		$kemosite_wordpress_selection_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_selection_colour_hsl_dark_mode );
		$kemosite_wordpress_selection_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_dark_mode) * 100;
		$kemosite_wordpress_selection_font_colour_dark_mode = ( $kemosite_wordpress_selection_colour_lum_dark_mode >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Component Colour

	$kemosite_wordpress_component_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $kemosite_base_black );
	$kemosite_wordpress_component_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_component_colour_source );
	$kemosite_wordpress_component_colour_source_hsl_array = explode( ",", $kemosite_wordpress_component_colour_source_hsl );
	$kemosite_wordpress_component_colour_source_lum = kemosite_hex_to_lum($kemosite_wordpress_component_colour_source) * 100;
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_colour_dark_mode = $kemosite_wordpress_component_colour_light_mode = $kemosite_wordpress_component_colour_source;
	$kemosite_wordpress_component_font_colour_dark_mode = $kemosite_wordpress_component_font_colour_light_mode = ( $kemosite_wordpress_component_colour_source_lum >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_colour_source_bg_contrast_light_mode < 4.5 ):

		$kemosite_wordpress_component_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_colour_source_lum, 4.5 );

		$kemosite_wordpress_component_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_colour_source_hsl_array,
			$kemosite_wordpress_component_colour_source_bg_contrast_light_mode,
			4.5,
			$kemosite_wordpress_component_colour_source_lum
		);

		$kemosite_wordpress_component_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_colour_hsl_light_mode );
		$kemosite_wordpress_component_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_colour_light_mode) * 100;
		$kemosite_wordpress_component_font_colour_light_mode = ( $kemosite_wordpress_component_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_colour_source_bg_contrast_dark_mode < 4.5 ):

		$kemosite_wordpress_component_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_colour_source_lum, 4.5 );
		
		$kemosite_wordpress_component_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_colour_source_hsl_array,
			$kemosite_wordpress_component_colour_source_bg_contrast_dark_mode,
			4.5,
			$kemosite_wordpress_component_colour_source_lum
		);

		$kemosite_wordpress_component_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_colour_hsl_dark_mode );
		$kemosite_wordpress_component_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_colour_dark_mode) * 100;
		$kemosite_wordpress_component_font_colour_dark_mode = ( $kemosite_wordpress_component_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Secondary Colour

	$kemosite_wordpress_secondary_colour_source = get_theme_mod( 'kemosite_wordpress_secondary_colour', $kemosite_base_black );
	$kemosite_wordpress_secondary_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_secondary_colour_source );
	$kemosite_wordpress_secondary_colour_source_hsl_array = explode( ",", $kemosite_wordpress_secondary_colour_source_hsl );
	$kemosite_wordpress_secondary_colour_source_lum = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_source) * 100;

	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_secondary_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_secondary_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_secondary_colour_light_mode = $kemosite_wordpress_secondary_colour_dark_mode = $kemosite_wordpress_secondary_colour_source;
	$kemosite_wordpress_secondary_font_colour_light_mode = $kemosite_wordpress_secondary_font_colour_dark_mode = ( $kemosite_wordpress_secondary_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode < 3):

		$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_secondary_colour_source_lum, 3 );

		$kemosite_wordpress_secondary_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_secondary_colour_source_hsl_array,
			$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_secondary_colour_source_lum
		);

		$kemosite_wordpress_secondary_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_secondary_colour_hsl_light_mode );
		$kemosite_wordpress_secondary_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_light_mode) * 100;
		$kemosite_wordpress_secondary_font_colour_light_mode = ( $kemosite_wordpress_secondary_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode < 3 ):

		$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_secondary_colour_source_lum, 3 );
		
		$kemosite_wordpress_secondary_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_secondary_colour_source_hsl_array,
			$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_secondary_colour_source_lum
		);

		$kemosite_wordpress_secondary_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_secondary_colour_hsl_dark_mode );
		$kemosite_wordpress_secondary_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_dark_mode) * 100;
		$kemosite_wordpress_secondary_font_colour_dark_mode = ( $kemosite_wordpress_secondary_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Success, Warning, and Alert Colours

	$kemosite_wordpress_component_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_component_colour_source );
	$kemosite_wordpress_component_colour_source_hsl_array = explode( ",", $kemosite_wordpress_component_colour_source_hsl );
	
	// Success
	$kemosite_wordpress_component_success_colour_source_hsl_array 	= 	array( 
																			120,
																			$kemosite_wordpress_component_colour_source_hsl_array[1],
																			$kemosite_wordpress_component_colour_source_hsl_array[2]
																		);
	$kemosite_wordpress_component_success_colour_source_hsl = implode( ",", $kemosite_wordpress_component_success_colour_source_hsl_array );
	$kemosite_wordpress_component_success_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_success_colour_source_hsl );
	$kemosite_wordpress_component_success_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_success_colour_source_rgb );
	$kemosite_wordpress_component_success_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_success_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_success_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_success_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_success_colour_light_mode = $kemosite_wordpress_component_success_colour_dark_mode = $kemosite_wordpress_component_success_colour_source;
	$kemosite_wordpress_component_success_colour_lum_light_mode = $kemosite_wordpress_component_success_colour_lum_dark_mode = ( $kemosite_wordpress_component_success_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	// Root CSS Colour
	$kemosite_wordpress_component_success_font_colour_root = ( $kemosite_wordpress_component_success_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_success_colour_source_lum, 3 );

		$kemosite_wordpress_component_success_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_success_colour_source_hsl_array,
			$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_success_colour_source_lum
		);

		$kemosite_wordpress_component_success_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_success_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_success_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_success_colour_light_mode) * 100;
		$kemosite_wordpress_component_success_font_colour_light_mode = ( $kemosite_wordpress_component_success_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_success_colour_source_lum, 3 );

		$kemosite_wordpress_component_success_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_success_colour_source_hsl_array,
			$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_success_colour_source_lum
		);

		$kemosite_wordpress_component_success_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_success_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_success_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_success_colour_dark_mode) * 100;
		$kemosite_wordpress_component_success_font_colour_dark_mode = ( $kemosite_wordpress_component_success_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Warning
	$kemosite_wordpress_component_warning_colour_source_hsl_array =	array( 
																	60,
																	$kemosite_wordpress_component_colour_source_hsl_array[1],
																	$kemosite_wordpress_component_colour_source_hsl_array[2]
																);
	$kemosite_wordpress_component_warning_colour_source_hsl = implode( ",", $kemosite_wordpress_component_warning_colour_source_hsl_array );
	$kemosite_wordpress_component_warning_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_warning_colour_source_hsl );
	$kemosite_wordpress_component_warning_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_warning_colour_source_rgb );
	$kemosite_wordpress_component_warning_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_warning_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_warning_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_warning_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_warning_colour_light_mode = $kemosite_wordpress_component_warning_colour_dark_mode = $kemosite_wordpress_component_warning_colour_source;
	$kemosite_wordpress_component_warning_colour_lum_light_mode = $kemosite_wordpress_component_warning_colour_lum_dark_mode = ( $kemosite_wordpress_component_warning_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	// Root CSS Colour
	$kemosite_wordpress_component_warning_font_colour_root = ( $kemosite_wordpress_component_warning_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_warning_colour_source_lum, 3 );

		$kemosite_wordpress_component_warning_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_warning_colour_source_hsl_array,
			$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_warning_colour_source_lum
		);

		$kemosite_wordpress_component_warning_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_warning_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_warning_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_warning_colour_light_mode) * 100;
		$kemosite_wordpress_component_warning_font_colour_light_mode = ( $kemosite_wordpress_component_warning_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_warning_colour_source_lum, 3 );

		$kemosite_wordpress_component_warning_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_warning_colour_source_hsl_array,
			$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_warning_colour_source_lum
		);

		$kemosite_wordpress_component_warning_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_warning_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_warning_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_warning_colour_dark_mode) * 100;
		$kemosite_wordpress_component_warning_font_colour_dark_mode = ( $kemosite_wordpress_component_warning_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Alert
	$kemosite_wordpress_component_alert_colour_source_hsl_array =	array( 
																	0,
																	$kemosite_wordpress_component_colour_source_hsl_array[1],
																	$kemosite_wordpress_component_colour_source_hsl_array[2]
																);
	$kemosite_wordpress_component_alert_colour_source_hsl = implode( ",", $kemosite_wordpress_component_alert_colour_source_hsl_array );
	$kemosite_wordpress_component_alert_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_alert_colour_source_hsl );
	$kemosite_wordpress_component_alert_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_alert_colour_source_rgb );
	$kemosite_wordpress_component_alert_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_alert_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_alert_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_alert_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_alert_colour_light_mode = $kemosite_wordpress_component_alert_colour_dark_mode = $kemosite_wordpress_component_alert_colour_source;
	$kemosite_wordpress_component_alert_colour_lum_light_mode = $kemosite_wordpress_component_alert_colour_lum_dark_mode = ( $kemosite_wordpress_component_alert_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	$kemosite_wordpress_component_alert_font_colour_root = ( $kemosite_wordpress_component_alert_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_alert_colour_source_lum, 3 );

		$kemosite_wordpress_component_alert_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_alert_colour_source_hsl_array,
			$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_alert_colour_source_lum
		);

		$kemosite_wordpress_component_alert_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_alert_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_alert_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_alert_colour_light_mode) * 100;
		$kemosite_wordpress_component_alert_font_colour_light_mode = ( $kemosite_wordpress_component_alert_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_alert_colour_source_lum, 3 );

		$kemosite_wordpress_component_alert_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_alert_colour_source_hsl_array,
			$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_alert_colour_source_lum
		);

		$kemosite_wordpress_component_alert_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_alert_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_alert_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_alert_colour_dark_mode) * 100;
		$kemosite_wordpress_component_alert_font_colour_dark_mode = ( $kemosite_wordpress_component_alert_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	?>

	<style type="text/css">	

	<?php // KEEP get_theme_mod OUT OF HERE. ECHO DEFINED VARIABLES ONLY. ?>

	:root {

		/** DEPRICATE **/

		--h1_h6_font_family_name: <?php echo "'" . urldecode($h1_h6_font_family_name[0]) . "', sans-serif"; ?>;
		--body_copy_font_family_name: <?php echo "'" . urldecode($body_copy_font_family_name[0]) . "', serif"; ?>;
		--button_font_family_name: <?php echo "'" . urldecode($button_font_family_name[0]) . "', sans-serif"; ?>;

		/** END DEPRICATE **/



		/* [GLOBAL COLOUR OPTIONS] */
		--kemosite_wordpress_cool_white: <?php echo $kemosite_cool_white; ?>;
		--kemosite_wordpress_base_primary_colour: <?php echo $kemosite_wordpress_base_primary_colour; ?>;
		--kemosite_wordpress_base_black: <?php echo $kemosite_wordpress_base_black; ?>;

		/* [HEADER OPTIONS] */
		--kemosite_wordpress_header_bg_image: <?php echo $kemosite_wordpress_header_bg_image; ?>;
		--kemosite_wordpress_header_bg_color:  <?php echo $kemosite_wordpress_header_bg_color; ?>;
		--kemosite_wordpress_header_font_color:  <?php echo $kemosite_wordpress_header_font_color; ?>;
		--kemosite_wordpress_header_font_family_name:  <?php echo "'" . urldecode($kemosite_wordpress_header_font_family_name[0]) . "', sans-serif"; ?>;

		/* [MAIN CONTENT OPTIONS] */
		
		/* Light Mode (Default) */
		--kemosite_wordpress_main_content_bg_color_light_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_light_mode; ?>;
		--kemosite_wordpress_main_content_font_color_light_mode:  <?php echo $kemosite_wordpress_main_content_font_color_light_mode; ?>;

		/* Dark Mode */
		--kemosite_wordpress_main_content_bg_color_dark_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_dark_mode; ?>;
		--kemosite_wordpress_main_content_font_color_dark_mode:  <?php echo $kemosite_wordpress_main_content_font_color_dark_mode; ?>;

		/* [FOOTER OPTIONS] */
		--kemosite_wordpress_footer_bg_color:  <?php echo $kemosite_wordpress_footer_bg_color; ?>;
		--kemosite_wordpress_footer_font_color:  <?php echo $kemosite_wordpress_footer_font_color; ?>;
		--kemosite_wordpress_footer_font_family_name:  <?php echo "'" . urldecode($kemosite_wordpress_footer_font_family_name[0]) . "', sans-serif"; ?>;
	}

	.background.kemosite_wordpress_base_primary_colour {
		background-color: var(--kemosite_wordpress_base_primary_colour);
		color:  white;
	}
	.background.kemosite_wordpress_base_black {
		background-color: var(--kemosite_wordpress_base_black);
		color:  white;
	}

	/*
	 * Custom Properties are ideal for working with prefers-color-scheme
	 * https://stuffandnonsense.co.uk/blog/redesigning-your-product-and-website-for-dark-mode
	 */

	/* No preferences */
	:root {
		--kemosite_wordpress_colour_scheme: "no preference (light)";
		--kemosite_wordpress_body_background_color: <?php echo $kemosite_wordpress_main_content_bg_color_light_mode; ?>;
		--kemosite_wordpress_body_color: <?php echo $kemosite_wordpress_main_content_font_color_light_mode; ?>;
		--kemosite_wordpress_placeholder_color: <?php echo $kemosite_wordpress_component_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;

		/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */		
		--kemosite_wordpress_selection_colour: <?php echo $kemosite_wordpress_selection_colour_light_mode; ?>;
		--kemosite_wordpress_selection_font_colour: <?php echo $kemosite_wordpress_selection_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_colour: <?php echo $kemosite_wordpress_component_colour_light_mode; ?>;
		--kemosite_wordpress_component_font_colour: <?php echo $kemosite_wordpress_component_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_secondary_colour: <?php echo $kemosite_wordpress_secondary_colour_light_mode; ?>;
		--kemosite_wordpress_secondary_font_colour: <?php echo $kemosite_wordpress_secondary_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_success_colour: <?php echo $kemosite_wordpress_component_success_colour_light_mode; ?>;
		--kemosite_wordpress_component_success_font_colour: <?php echo $kemosite_wordpress_component_success_font_colour_root; ?>;
		--kemosite_wordpress_component_warning_colour: <?php echo $kemosite_wordpress_component_warning_colour_light_mode; ?>;
		--kemosite_wordpress_component_warning_font_colour: <?php echo $kemosite_wordpress_component_warning_font_colour_root; ?>;
		--kemosite_wordpress_component_alert_colour: <?php echo $kemosite_wordpress_component_alert_colour_light_mode; ?>;
		--kemosite_wordpress_component_alert_font_colour: <?php echo $kemosite_wordpress_component_alert_font_colour_root; ?>;
		--kemosite_wordpress_table_border_colour: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_table_font_colour: <?php echo $kemosite_cool_white; ?>;
	}

	@media (prefers-color-scheme: light) {

		:root {
			--kemosite_wordpress_colour_scheme: "light";
		}

	}

	@media (prefers-color-scheme: dark) {

		:root {
			--kemosite_wordpress_colour_scheme: "dark";
			--kemosite_wordpress_body_background_color: <?php echo $kemosite_wordpress_main_content_bg_color_dark_mode; ?>;
			--kemosite_wordpress_body_color: <?php echo $kemosite_wordpress_main_content_font_color_dark_mode; ?>;
			--kemosite_wordpress_placeholder_color: <?php echo $kemosite_wordpress_component_font_colour_light_mode; ?>;
			--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
			--footer-background-color: hsl(0, 0%, 15%);

			/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */		
			--kemosite_wordpress_selection_colour: <?php echo $kemosite_wordpress_selection_colour_dark_mode; ?>;
			--kemosite_wordpress_selection_font_colour: <?php echo $kemosite_wordpress_selection_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_colour: <?php echo $kemosite_wordpress_component_colour_dark_mode; ?>;
			--kemosite_wordpress_component_font_colour: <?php echo $kemosite_wordpress_component_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
			--kemosite_wordpress_secondary_colour: <?php echo $kemosite_wordpress_secondary_colour_dark_mode; ?>;
			--kemosite_wordpress_secondary_font_colour: <?php echo $kemosite_wordpress_secondary_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_success_colour: <?php echo $kemosite_wordpress_component_success_colour_dark_mode; ?>;
			--kemosite_wordpress_component_success_font_colour: <?php echo $kemosite_wordpress_component_success_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_warning_colour: <?php echo $kemosite_wordpress_component_warning_colour_dark_mode; ?>;
			--kemosite_wordpress_component_warning_font_colour: <?php echo $kemosite_wordpress_component_warning_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_alert_colour: <?php echo $kemosite_wordpress_component_alert_colour_dark_mode; ?>;
			--kemosite_wordpress_component_alert_font_colour: <?php echo $kemosite_wordpress_component_alert_font_colour_dark_mode; ?>;
		}

	}

	<?php if ( !is_null( $kemosite_wordpress_header_bg_image ) ): ?>
	div.section.header { 
		background-image: url(<?php echo $kemosite_wordpress_header_bg_image; ?>);
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover; /* Resize the background image to cover the entire container */
		<?php if ( $kemosite_wordpress_header_bg_image_presentation == "duotone"): ?>background-blend-mode: luminosity;<?php endif; ?>
	}
	<?php endif; ?>

	</style>

	<?php // if (!is_amp_detected() ): ?>

	<!-- <script>
		
		var kemosite_wordpress_theme_chart_colours = {

			kemosite_cool_white: "<?php echo $kemosite_cool_white; ?>",
			kemosite_base_black: "<?php echo $kemosite_base_black; ?>",
			kemosite_base_black_minus_blue: "<?php echo $kemosite_base_black_minus_blue; ?>",
			kemosite_wordpress_base_primary_colour: "<?php echo $kemosite_wordpress_base_primary_colour; ?>",

		}

		var kemosite_chart_default_font = "<?php echo "'" . urldecode($body_copy_font_family_name[0]) . "', serif"; ?>;";

	</script> -->

	<?php // endif; ?>

<?php
}

// add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_stylesheet_directory_uri() . '/js/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}

/*
function get_page_views($post_id) {

	if (function_exists('stats_get_csv')) {
	
		$args = array('days'=>-1, 'limit'=>-1, 'post_id'=>$post_id);
		$result = stats_get_csv('postviews', $args);
		$views = $result[0]['views'];

	} else {

		$views = 0;

	}
	return number_format_i18n($views);
}
*/

?>