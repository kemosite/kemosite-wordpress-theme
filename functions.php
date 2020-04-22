<?php
/**
 * kemosite-wordpress-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kemosite-wordpress-theme
 */

define( 'GITHUB_UPDATER_OVERRIDE_DOT_ORG', true ); // Override Dot Org will skip any updates from wordpress.org for plugins with identical slugs.
if (!defined( 'SAVEQUERIES' )): define( 'SAVEQUERIES', true ); endif;

/* [Declare Depedencies] */
if ( ! function_exists( 'kemosite_wordpress_theme_dependencies' ) ) :
	function kemosite_wordpress_theme_dependencies() {
	 
		// Check for github-updater
		if (!is_plugin_active('github-updater/github-updater.php')):
			echo '<div class="error"><p>Warning: This theme needs the github-updater plugin to function.</p></div>';
		endif;

		// Check for kemosite-typography-plugin
		if (!is_plugin_active('kemosite-typography-plugin/index.php')):
			echo '<div class="error"><p>Warning: This theme needs the kemosite-typography-plugin to function.</p></div>';
		endif;
		//plugin is activated

		// Check for Woocommerce
		if (!is_plugin_active('woocommerce/woocommerce.php')):
			echo '<div class="error"><p>Warning: WooCommerce not detected. WooCommerce features might not work as expected.</p></div>';
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

/**
 * Looks in Custom Fields for Excerpt data.
 */
function kemosite_custom_excerpt( $post_id ) {

    if (!empty(get_post_meta($post_id, 'page_excerpt'))):
    	$page_excerpt = get_post_meta($post_id, 'page_excerpt');
    	$excerpt = esc_textarea($page_excerpt[0]);
    else: //if (has_excerpt()):
		$excerpt = get_the_excerpt($post_id);
		// $excerpt = "Excerpt received";
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

/* [Includes] */
// require_once ("functions-headless.php");
require_once ("functions-woocommerce.php");
require_once ("functions-enqueue-scripts.php");
require_once ("functions-dashboard-setup.php");
require_once ("functions-customize-register.php");
require_once ("functions-customize-sections.php");
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
	    $item_output .= '<a'. $attributes .'>';
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
	    $item_output .= '<a'. $attributes .'>';
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
	    $item_output .= '<a'. $attributes .'>';
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

// Per w3.org: For the sRGB colorspace, the relative luminance of a color is defined as L = 0.2126 * R + 0.7152 * G + 0.0722 * B
function calc_lum ($r_input, $g_input, $b_input) {

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$r = ($r_srgb <= 0.03928) ? $r_srgb / 12.92 : pow((($r_srgb + 0.055) / 1.055), 2.4);
	$g = ($g_srgb <= 0.03928) ? $g_srgb / 12.92 : pow((($g_srgb + 0.055) / 1.055), 2.4);
	$b = ($b_srgb <= 0.03928) ? $b_srgb / 12.92 : pow((($b_srgb + 0.055) / 1.055), 2.4);
	
	return (($r * 0.2126) + ($g * 0.7152) + ($b * 0.0722)) * 100;

}

/* [ADD CUSTOMIZER CSS] */
add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css() {
	
	
	/* [SET BLACK TONE] */
	$black_tint = get_theme_mod('kemosite_wordpress_colours_black', '#383838');
	$dark_black_tint = get_theme_mod('kemosite_wordpress_colours_dark_black', '#242424');
	$light_black_tint = get_theme_mod('kemosite_wordpress_colours_light_black', '#767676');

	/* [SET PRIMARY COLOURS] */
	$primary_color = get_theme_mod('kemosite_wordpress_colours_primary', $black_tint);

	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$hex = (substr($primary_color, 0, 1) === "#") ? substr($primary_color, 1) : $primary_color;
	
	$parse_r = intval(substr($hex, 0, 2), 16);
	$parse_g = intval(substr($hex, 2, 2), 16);
	$parse_b = intval(substr($hex, 4, 2), 16);

	$lum = calc_lum($parse_r, $parse_g, $parse_b);

	$primary_font_auto_color = ($lum >= 50) ? 'black' : 'white';

	$primary_bright_color = get_theme_mod('kemosite_wordpress_colours_bright_primary', $light_black_tint);
	$primary_dark_color = get_theme_mod('kemosite_wordpress_colours_dark_primary', $dark_black_tint);
	$invert_color = get_theme_mod('kemosite_wordpress_colours_invert_primary', $black_tint);
	$invert_bright_color = get_theme_mod('kemosite_wordpress_colours_bright_invert', $light_black_tint);
	$invert_dark_color = get_theme_mod('kemosite_wordpress_colours_dark_invert', $dark_black_tint);

	/* [HEADER BACKGROUND] */
	$header_background_color = get_theme_mod('kemosite_wordpress_header_bg_color', $dark_black_tint);
	
	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$hex = (substr($header_background_color, 0, 1) === "#") ? substr($header_background_color, 1) : $header_background_color;
	
	$parse_r = intval(substr($hex, 0, 2), 16);
	$parse_g = intval(substr($hex, 2, 2), 16);
	$parse_b = intval(substr($hex, 4, 2), 16);

	$lum = calc_lum($parse_r, $parse_g, $parse_b);

	$header_font_color = ($lum >= 50) ? 'black' : 'white';

	/* [HEADER FONT] */
	$header_font = get_theme_mod('kemosite_wordpress_header_font');
	echo '<link href="https://fonts.googleapis.com/css?family='.$header_font.'" rel="stylesheet">';
	$header_font_family_name = explode(":", $header_font);
	// urldecode ( string $str )



	/* [H1-H6 FONT] */
	$h1_h6_font = get_theme_mod('kemosite_wordpress_fonts_h1_h6');
	echo '<link href="https://fonts.googleapis.com/css?family='.$h1_h6_font.'" rel="stylesheet">';
	$h1_h6_font_family_name = explode(":", $h1_h6_font);

	/* [BODY COPY FONT] */
	$body_copy_font = get_theme_mod('kemosite_wordpress_fonts_body');
	echo '<link href="https://fonts.googleapis.com/css?family='.$body_copy_font.'" rel="stylesheet">';
	$body_copy_font_family_name = explode(":", $body_copy_font);

	/* [BUTTON FONT] */
	$button_font = get_theme_mod('kemosite_wordpress_fonts_buttons');
	echo '<link href="https://fonts.googleapis.com/css?family='.$button_font.'" rel="stylesheet">';
	$button_font_family_name = explode(":", $button_font);



	/* [HEADER IMAGE] */
	$default_header_image = get_theme_mod('kemosite_wordpress_header_bg_image');

?>

	<style type="text/css">

	:root {

		--black_tint: <?php echo $black_tint; ?>;
		--light_black_tint: <?php echo $light_black_tint; ?>;
		--dark_black_tint: <?php echo $dark_black_tint; ?>;

		--primary_color: <?php echo $primary_color; ?>;
		--primary_font_auto_color: <?php echo $primary_font_auto_color; ?>;
		--primary_bright_color: <?php echo $primary_bright_color; ?>;
		--primary_dark_color: <?php echo $primary_dark_color; ?>;
		--invert_color: <?php echo $invert_color; ?>;
		--invert_bright_color: <?php echo $invert_bright_color; ?>;
		--invert_dark_color: <?php echo $invert_dark_color; ?>;

		--header_background_color: <?php echo $header_background_color; ?>;
		--header_font_color: <?php echo $header_font_color; ?>;
		--header_font_family_name: <?php echo "'" . urldecode($header_font_family_name[0]) . "', sans-serif"; ?>;

		--h1_h6_font_family_name: <?php echo "'" . urldecode($h1_h6_font_family_name[0]) . "', sans-serif"; ?>;
		--body_copy_font_family_name: <?php echo "'" . urldecode($body_copy_font_family_name[0]) . "', serif"; ?>;
		--button_font_family_name: <?php echo "'" . urldecode($button_font_family_name[0]) . "', sans-serif"; ?>;

		--default_header_image: <?php echo $default_header_image; ?>;

	}

	div.section { 
		background-image: url(<?php echo $default_header_image; ?>);
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover; /* Resize the background image to cover the entire container */
		/* filter: saturate(50%); */
	}
	

	</style>

	<script>
		var kemosite_wordpress_theme_chart_colours = {
			
			black_tint: "<?php echo $black_tint; ?>",
			light_black_tint: "<?php echo $light_black_tint; ?>",
			dark_black_tint: "<?php echo $dark_black_tint; ?>",
			primary: "<?php echo $primary_color; ?>",
			primary_bright_color: "<?php echo $primary_bright_color; ?>",
			primary_dark_color: "<?php echo $primary_dark_color; ?>",
			invert: "<?php echo $invert_color; ?>",
			invert_bright_color: "<?php echo $invert_bright_color; ?>",
			invert_dark_color: "<?php echo $invert_dark_color; ?>",

		}

		var kemosite_chart_default_font = "<?php echo "'" . urldecode($body_copy_font_family_name[0]) . "', serif"; ?>;";

		var pantone_coty_chart_colour_alpha = 0.1;

		// sRGB under D65 "C" Simulation
		var pantone_coty_chart_colours = [
		  { year:'2020', value:'rgba(0,70,128,'+pantone_coty_chart_colour_alpha+')' }, // Classic Blue
		  { year:'2019', value:'rgba(255,109,112,'+pantone_coty_chart_colour_alpha+')' }, // Living Coral
		  { year:'2018', value:'rgba(101,78,163,'+pantone_coty_chart_colour_alpha+')' }, // Ultra Violet
		  { year:'2017', value:'rgba(132,189,0,'+pantone_coty_chart_colour_alpha+')' }, // Greenery
		  { year:'2016', value:'rgba(242,221,222,'+pantone_coty_chart_colour_alpha+')' }, // Rose Quartz
		  { year:'2016', value:'rgba(137,171,227,'+pantone_coty_chart_colour_alpha+')' }, // Serenity
		  { year:'2015', value:'rgba(173,101,95,'+pantone_coty_chart_colour_alpha+')' }, // Marsala
		  { year:'2014', value:'rgba(181,101,167,'+pantone_coty_chart_colour_alpha+')' }, // Radiant Orchid
		  { year:'2013', value:'rgba(0,153,123,'+pantone_coty_chart_colour_alpha+')' }, // Emerald
		  { year:'2012', value:'rgba(225,82,61,'+pantone_coty_chart_colour_alpha+')' }, // Tangerine Tango
		  { year:'2011', value:'rgba(203,101,134,'+pantone_coty_chart_colour_alpha+')' }, // Honeysuckle
		  { year:'2010', value:'rgba(77,182,173,'+pantone_coty_chart_colour_alpha+')' }, // Turquoise
		  { year:'2009', value:'rgba(235,191,87,'+pantone_coty_chart_colour_alpha+')' }, // Mimosa
		  { year:'2008', value:'rgba(99,100,165,'+pantone_coty_chart_colour_alpha+')' }, // Blue Iris
		  { year:'2007', value:'rgba(157,54,63,'+pantone_coty_chart_colour_alpha+')' }, // Chili Pepper
		  { year:'2006', value:'rgba(222,206,187,'+pantone_coty_chart_colour_alpha+')' }, // Sand Dollar
		  { year:'2005', value:'rgba(91,179,176,'+pantone_coty_chart_colour_alpha+')' }, // Blue Turquoise
		  { year:'2004', value:'rgba(226,101,77,'+pantone_coty_chart_colour_alpha+')' }, // Tigerlily
		  { year:'2003', value:'rgba(127,201,203,'+pantone_coty_chart_colour_alpha+')' }, // Aqua Sky
		  { year:'2002', value:'rgba(189,54,69,'+pantone_coty_chart_colour_alpha+')' }, // True Red
		  { year:'2001', value:'rgba(195,78,124,'+pantone_coty_chart_colour_alpha+')' }, // Fuchsia Rose
		  { year:'2000', value:'rgba(152,179,209,'+pantone_coty_chart_colour_alpha+')' }, // Cerulean
		];

		/*
		console.log(pantone_coty_chart_colours);
		console.log(pantone_coty_chart_colours.shift().value);
		*/

	</script>

<?php
}

add_action( 'customize_preview_init', 'cd_customizer' );
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