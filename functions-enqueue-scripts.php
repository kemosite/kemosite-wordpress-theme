<?php

/* [Load Parent Theme Styles] */

function my_theme_enqueue_styles() {

	/*
    wp_enqueue_style( KEMOSITE_BLANK_PARENT_STYLE, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'kemosite-blank-theme',
        get_template_directory_uri() . '/style.css',
        array( KEMOSITE_BLANK_PARENT_STYLE ),
        wp_get_theme()->get('Version')
    );
    */
    
    wp_enqueue_style( 'kemosite-blank-theme', get_template_directory_uri() . '/style.css' );

    /* [Foundation Assets] */
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css' );

    /* [Foundation Icons] */
    wp_enqueue_style( 'foundation-icons', get_template_directory_uri() . '/css/foundation-icons/foundation-icons.css' );
    
    /* [Blank Theme Fonts] */
    wp_enqueue_style( 'modern-pictograms', get_template_directory_uri() . '/css/modern-pictograms/stylesheet.css' );
	wp_enqueue_style( 'kemosite-theme-master-styles', get_template_directory_uri() . '/css/master.css' );

	/* [Mediaelement CSS] */
    wp_enqueue_style( 'mediaelement-css', get_template_directory_uri() . '/css/mediaelementplayer.min.css' );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/* [ Favicon] */
function ilc_favicon() { echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/images/favicon.ico" />' . "\n"; }

/* [LESS Master Stylesheet] */
// function less_master_stylesheet() { echo '<link rel="stylesheet/less" type="text/css" href="' . get_template_directory_uri() . '/css/master.less" />' . "\n"; }

/* [RSS Thumbnail] */
function rss_post_thumbnail($content) {
    global $post;
    if( has_post_thumbnail($post->ID) )
        $content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
    return $content;
}

/* [Load Scripts] */
function load_scripts_method() {
	
	// Retrieve Custom Fields from post.
	$custom_fields = get_post_custom();

	// Favicon
	add_action('wp_head', 'ilc_favicon');

	// Foundation JS Files
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery.min.js', '', '3.3.1', 'true');
	wp_enqueue_script('jquery');

	wp_deregister_script('foundation-what-input');
	wp_register_script('foundation-what-input', get_template_directory_uri().'/js/vendor/what-input.min.js', '', '5.2.6', 'true');
	wp_enqueue_script('foundation-what-input');

	wp_deregister_script('foundation');
	wp_register_script('foundation', get_template_directory_uri().'/js/vendor/foundation.min.js', array('jquery'), '6.6.1', 'true');
	wp_enqueue_script('foundation');

	wp_deregister_script('foundation-app');
	wp_register_script('foundation-app', get_template_directory_uri().'/js/app.js', array('foundation'), '6.6.1', 'true');
	wp_enqueue_script('foundation-app');

	// Load Graph.js if declared in page Custom Fields
	// print_r($custom_fields['load-graph-js'][0]);

	if(isset($custom_fields['load-graph-js'][0]) && $custom_fields['load-graph-js'][0] == "true"):
		wp_deregister_script('chart-js');
		wp_register_script('chart-js', get_template_directory_uri().'/js/vendor/Chart.min.js', '', '2.9.3');
		wp_enqueue_script('chart-js');
	endif;

	// LESS
	// add_action('wp_head', 'less_master_stylesheet');

	/*
	wp_deregister_script('less');
	wp_register_script('less', get_template_directory_uri().'/less-2.7.2/less.min.js', '', '2.7.2', 'true');
	wp_enqueue_script('less');
	*/

	// JQuery
	wp_deregister_script('my-jquery');
	wp_register_script('my-jquery', get_template_directory_uri().'/js/my-jquery.js', array('jquery'), '3.3.1', 'true');
	wp_enqueue_script('my-jquery');

	// Mediaelement
	wp_deregister_script('mediaelement');
	wp_register_script('mediaelement', get_template_directory_uri().'/js/vendor/mediaelement-and-player.min.js', '', '4.2.9', 'true');
	wp_enqueue_script('mediaelement');

	// Underscores Navigation
	wp_deregister_script('kemosite-wordpress-theme-navigation');
	wp_register_script('kemosite-wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('kemosite-wordpress-theme-navigation');

	wp_deregister_script('kemosite-wordpress-theme-skip-link-focus-fix');
	wp_register_script('kemosite-wordpress-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('kemosite-wordpress-theme-skip-link-focus-fix');

	// Gtag
	wp_deregister_script('kemosite-wordpress-theme-gtag');
	wp_register_script('kemosite-wordpress-theme-gtag', get_template_directory_uri() . '/js/gtag.js', array(), '20191216', true );
	wp_enqueue_script('kemosite-wordpress-theme-gtag');
		
	// Add menus
	// add_action( 'init', 'register_my_menus' );	

	/* [REMOVE THE GENERATOR FROM THE HEAD OUTPUT] */
	remove_action('wp_head', 'wp_generator');
	
	/*
	function remove_version_info() {
	     return '';
	}
	add_filter('the_generator', 'remove_version_info');
	*/
	
	// Add image thumbnail to RSS feed.
	add_filter('the_content_feed', 'rss_post_thumbnail');

}

add_action('wp_enqueue_scripts', 'load_scripts_method');

// Defer and Async external scripts.
// Defer = A script that will not run until after the page has loaded:
// Async = A script that will be run asynchronously as soon as it is available:

function defer_async_scripts( $tag, $handle, $src ) {
  
  $defer = array( 
    'foundation-what-input',
    'foundation-app',
    'mediaelement',
    'kemosite-wordpress-theme-navigation',
    'kemosite-wordpress-theme-skip-link-focus-fix',
    'kemosite-wordpress-theme-gtag'
  );

  $async = array(
  	'chart-js',
  	'my-jquery'
  );

  if ( in_array( $handle, $defer ) ) {
     return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
  }

  if ( in_array( $handle, $async ) ) {
     return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
  }
    
    return $tag;
} 
add_filter( 'script_loader_tag', 'defer_async_scripts', 10, 3 );

// add_filter( 'style_loader_tag', 'resource_hints_method', 10, 4;

function resource_hints_method($hints, $relation_type) {
	
	global $wp_styles;
	global $wp_scripts;

	/* IN ORDER OF COMMMITMENT */
	// dns-prefetch - used to indicate an origin that will be used to fetch required resources, and that the user agent SHOULD resolve as early as possible. Helpful when you know you’ll connect to a domain soon, and you want to speed up the initial connection.
	// preconnect - used to indicate an origin that will be used to fetch required resources. Initiating an early connection. Helpful when you know you’ll download something from a third-party domain soon, but you don’t know what exactly.
	// prefetch - used to identify a resource that might be required by the next navigation. Asks the browser to download and cache a resource (like, a script or a stylesheet) in the background.
	// prerender - used to identify a resource that might be required by the next navigation. Helpful when you’re really sure a user will visit a specific page next, and you want to render it faster.

	/* PRELOAD DIRECTIVES */
	// audio
	// video
	// track
	// script
	// style
	// font
	// image
	// fetch crossorigin
	// embed
	// object
	// document

	/*
	<link rel="dns-prefetch" href="//widget.com">
	<link rel="preconnect" href="//cdn.example.com">
	<link rel="prefetch" href="//example.com/logo-hires.jpg" as="image">
	<link rel="prerender" href="//example.com/next-page.html">
	*/

    $dns_prefetch_domains = array( 
    	'https://fonts.googleapis.com/'
	);

    $prefetch_style = array( 
    	'foundation',
		'kemosite-theme-master-styles'
	);

    // Make sure JS declarations are not already declared assets for deferred or async loading.
	$prefetch_script = array( 
    	'jquery',
    	'foundation',
    	'my-jquery'
	);

   if ($relation_type === 'dns-prefetch'):

    	foreach($dns_prefetch_domains as $tag):

    		$hints[] = array(
	    		'href' => $tag
	    	);

    	endforeach;

	elseif ($relation_type === 'prefetch'):
    	
    	// Prefetch theme logo
    	$hints[] = array(
    		'as' => 'image',
    		'href' => wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]
    	);

    	foreach($prefetch_style as $tag):

    		$hints[] = array(
	    		'as' => 'style',
	    		'href' => $wp_styles->registered[$tag]->src
	    	);

    	endforeach;

    	foreach($prefetch_script as $tag):

    		$hints[] = array(
	    		'as' => 'script',
	    		'href' => $wp_scripts->registered[$tag]->src
	    	);

    	endforeach;

    endif;

    return $hints;

}
if ( ! is_admin() ):
	add_filter( 'wp_resource_hints', 'resource_hints_method', 10, 2 );
endif;

?>