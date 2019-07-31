<?php

/* 
** [GOALS]
** Replace as many database calls with file lookups as possible.
** Redefine functions that look up database entries with file lookups.
** Write files whenever database is updated.
** Create file if missing.
** Leverage REST API if data is available. Save output to file.
*/

/*
add_action('updated_option', function( $option_name, $old_value, $value ) {
     //....
}, 10, 3);
*/

// add_action('updated_option', "html_type", $old_html_type, $new_html_type);

$kemosite_headless_options_object = (object)[];
$kemosite_headless_posts_object = (object)[];

if (!function_exists( 'kemosite_load_options' )):
	
	function kemosite_load_options() {

		$kemosite_options_data_dir = dirname(__FILE__) . "/headless_json/";
		
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_options_data_dir)):
			mkdir($kemosite_options_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$options_data = fopen($kemosite_options_data_dir . "options.json", "a+");
		$options_data_contents = stream_get_contents($options_data);
		fclose($options_data);

		return json_decode($options_data_contents);

	}

endif;

if (!function_exists( 'kemosite_write_options' )):
	
	function kemosite_write_options($kemosite_headless_options_object) {

		$kemosite_options_data_dir = dirname(__FILE__) . "/headless_json/";
				
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_options_data_dir)):
			mkdir($kemosite_options_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$options_data = fopen($kemosite_options_data_dir . "options.json", "w");
		$options_data_contents = json_encode($kemosite_headless_options_object);

		fwrite($options_data, $options_data_contents);
		fclose($options_data);

	}

endif;

if (!function_exists( 'kemosite_load_posts' )):
	
	function kemosite_load_posts($post_id = '') {

		$kemosite_posts_data_dir = dirname(__FILE__) . "/headless_json/";
		
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_posts_data_dir)):
			mkdir($kemosite_posts_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$posts_data = fopen($kemosite_posts_data_dir . "posts.json", "a+");
		$posts_data_contents = stream_get_contents($posts_data);
		fclose($posts_data);

		
		echo "<script>console.log(".$posts_data_contents.");</script>";		

		return $posts_data_contents;

	}

endif;

if (!function_exists( 'kemosite_load_pages' )):
	
	function kemosite_load_pages($page_id = '') {

		$kemosite_pages_data_dir = dirname(__FILE__) . "/headless_json/";
		
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_pages_data_dir)):
			mkdir($kemosite_pages_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$pages_data = fopen($kemosite_pages_data_dir . "pages.json", "a+");
		$pages_data_contents = stream_get_contents($pages_data);
		fclose($pages_data);

		
		echo "<script>console.log(".$pages_data_contents.");</script>";		

		return $pages_data_contents;

	}

endif;

if (!function_exists( 'kemosite_write_posts' )):
	
	function kemosite_write_posts($kemosite_headless_posts_object) {

		$kemosite_posts_data_dir = dirname(__FILE__) . "/headless_json/";
				
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_posts_data_dir)):
			mkdir($kemosite_posts_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$posts_data = fopen($kemosite_posts_data_dir . "posts.json", "w");
		$posts_data_contents = json_encode($kemosite_headless_posts_object);

		fwrite($posts_data, $posts_data_contents);
		fclose($posts_data);

	}

endif;

if (!function_exists( 'kemosite_write_pages' )):
	
	function kemosite_write_pages($kemosite_headless_pages_object) {

		$kemosite_pages_data_dir = dirname(__FILE__) . "/headless_json/";
				
		// file_exists — Checks whether a file or directory exists
		// if not, create directory
		if (!file_exists($kemosite_pages_data_dir)):
			mkdir($kemosite_pages_data_dir, 0700);
		endif;

		// Check to see if data file exists. If not, create it.
		$pages_data = fopen($kemosite_pages_data_dir . "pages.json", "w");
		$pages_data_contents = json_encode($kemosite_headless_pages_object);

		fwrite($pages_data, $pages_data_contents);
		fclose($pages_data);

	}

endif;

if (!function_exists( 'kemosite_language_attributes' ) ):
	
	function kemosite_language_attributes() {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->language_attributes):
			$kemosite_headless_options_object->language_attributes = get_language_attributes();
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		echo $kemosite_headless_options_object->language_attributes;

		// echo $options;

	}

endif;

if (!function_exists( 'kemosite_stylesheet_url' ) ):
	
	function kemosite_stylesheet_url() {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->stylesheet_url):
			$kemosite_headless_options_object->stylesheet_url = get_bloginfo('stylesheet_url');
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		echo $kemosite_headless_options_object->stylesheet_url;
	}

endif;

if (!function_exists( 'kemosite_pingback_url' ) ):
	
	function kemosite_pingback_url() {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->pingback_url):
			$kemosite_headless_options_object->pingback_url = get_bloginfo('pingback_url');
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		echo $kemosite_headless_options_object->pingback_url;
	}

endif;

if (!function_exists( 'kemosite_has_nav_menu' ) ):
	
	function kemosite_has_nav_menu($location) {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->registered_nav_menus):
			$kemosite_headless_options_object->registered_nav_menus = get_registered_nav_menus();
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		if (!$kemosite_headless_options_object->nav_menu_locations):
			$kemosite_headless_options_object->nav_menu_locations = get_nav_menu_locations();
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		$has_nav_menu = false;

        // $registered_nav_menus = get_registered_nav_menus();

        if (isset($kemosite_headless_options_object->registered_nav_menus->$location)):
                $locations    = $kemosite_headless_options_object->nav_menu_locations;
                $has_nav_menu = ! empty( $locations->$location );
        endif;

        /**
         * Filters whether a nav menu is assigned to the specified location.
         *
         * @since 4.3.0
         *
         * @param bool   $has_nav_menu Whether there is a menu assigned to a location.
         * @param string $location     Menu location.
         */
        return apply_filters( 'has_nav_menu', $has_nav_menu, $location );

	}

endif;

if (!function_exists( 'kemosite_home_url' ) ):
	
	function kemosite_home_url( $path = '', $scheme = null ) {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->home_url):
			$kemosite_headless_options_object->home_url = get_home_url( null, $path, $scheme );
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		return $kemosite_headless_options_object->home_url;
	}

endif;

if (!function_exists( 'kemosite_template_directory_uri' ) ):

	function kemosite_template_directory_uri() {

		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->home_url):
			$kemosite_headless_options_object->template_directory_uri = get_template_directory_uri();
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		return $kemosite_headless_options_object->template_directory_uri;
	}

endif;

if (!function_exists( 'kemosite_stylesheet_directory_uri' ) ):

	function kemosite_stylesheet_directory_uri() {

		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->home_url):
			$kemosite_headless_options_object->stylesheet_directory_uri = get_stylesheet_directory_uri();
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		return $kemosite_headless_options_object->stylesheet_directory_uri;
	}

endif;

if (!function_exists( 'kemosite_get_theme_mod' ) ):
	
	function kemosite_get_theme_mod( $name, $default = false ) {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->mods):
			$kemosite_headless_options_object->mods = get_theme_mods();
			kemosite_write_options($kemosite_headless_options_object);
		endif;
	
        if ( isset( $kemosite_headless_options_object->mods->$name ) ) {
                /**
                 * Filters the theme modification, or 'theme_mod', value.
                 *
                 * The dynamic portion of the hook name, `$name`, refers to
                 * the key name of the modification array. For example,
                 * 'header_textcolor', 'header_image', and so on depending
                 * on the theme options.
                 *
                 * @since 2.2.0
                 *
                 * @param string $current_mod The value of the current theme modification.
                 */
                return apply_filters( "theme_mod_{$name}", $kemosite_headless_options_object->mods->$name );
        }

        if ( is_string( $default ) ) {
                $default = sprintf( $default, kemosite_template_directory_uri(), kemosite_stylesheet_directory_uri() );
        }

        /** This filter is documented in wp-includes/theme.php */
        return apply_filters( "theme_mod_{$name}", $default );

	}

endif;

if (!function_exists( 'kemosite_blog_name' ) ):
	
	function kemosite_blog_name() {
		
		$kemosite_headless_options_object = kemosite_load_options();

		if (!$kemosite_headless_options_object->blog_name):
			$kemosite_headless_options_object->blog_name = get_bloginfo('name');
			kemosite_write_options($kemosite_headless_options_object);
		endif;

		echo $kemosite_headless_options_object->blog_name;
	}

endif;

if (!function_exists( 'kemosite_have_posts' ) ):
	
	function kemosite_have_posts() {

		// global $wp_query;

		/*
		echo "<pre>";
		// print_r($wp_query);
		print_r(get_the_ID());
		echo "</pre>";
		*/

		$post_id = get_the_ID();
		echo "<script>console.log('Post ID: ".$post_id."');</script>";
		
		$kemosite_headless_posts_object = kemosite_load_posts($post_id);

		if (!$kemosite_headless_posts_object || is_null($kemosite_headless_posts_object)):

			/*
			$args = array(
			  'orderby' => 'title',
			  'per_page' => 3
			);
			*/
			
			// Put into the `add_query_arg();` to build a URL for use
			// Just an alternative to manually typing the query string
			$url = add_query_arg( $args, rest_url('wp/v2/posts') );
			
			// A standard GET request the WordPress way
			$stuff = wp_remote_get($url);
			
			// Get just the body of that request (if successful)
			$body = wp_remote_retrieve_body($stuff);
			
			// Turn the returned JSON object into a PHP object
			$kemosite_headless_posts_object = json_decode($body);

			// $kemosite_headless_posts_object = json_decode(file_get_contents(kemosite_home_url() . "wp-json/wp/v2/posts"));			
			
			kemosite_write_posts($kemosite_headless_posts_object);

		endif;

		if (count($kemosite_headless_posts_object) > 0):
			return true;
		else:
			return false;
		endif;

	}

endif;

if (!function_exists( 'kemosite_have_pages' ) ):
	
	function kemosite_have_pages() {

		// global $wp_query;

		/*
		echo "<pre>";
		// print_r($wp_query);
		print_r(get_the_ID());
		echo "</pre>";
		*/

		$page_id = get_the_ID();
		echo "<script>console.log('Page ID: ".$page_id."');</script>";
		
		$kemosite_headless_pages_object = kemosite_load_pages($page_id);

		if (!$kemosite_headless_pages_object || is_null($kemosite_headless_pages_object)):

			/*
			$args = array(
			  'orderby' => 'title',
			  'per_page' => 3
			);
			*/
			
			// Put into the `add_query_arg();` to build a URL for use
			// Just an alternative to manually typing the query string
			$url = add_query_arg( $args, rest_url('wp/v2/pages') );
			
			// A standard GET request the WordPress way
			$stuff = wp_remote_get($url);
			
			// Get just the body of that request (if successful)
			$body = wp_remote_retrieve_body($stuff);
			
			// Turn the returned JSON object into a PHP object
			$kemosite_headless_pages_object = json_decode($body);

			// $kemosite_headless_posts_object = json_decode(file_get_contents(kemosite_home_url() . "wp-json/wp/v2/posts"));			
			
			kemosite_write_pages($kemosite_headless_pages_object);

		endif;

		if (count($kemosite_headless_pages_object) > 0):
			return true;
		else:
			return false;
		endif;

	}

endif;

if (!function_exists( 'kemosite_the_post' ) ):
	
	function kemosite_the_post() {
		
		$request = new WP_REST_Request( 'GET', '/wp/v2/posts' );
		$response = rest_do_request( $request);

		echo "<script>console.log(".json_encode($response->data).");</script>";

		$kemosite_headless_posts_object = kemosite_load_posts();

		/*
		echo "<pre>";
		print_r($kemosite_headless_posts_object);
		echo "</pre>";
		*/

		echo '<script>console.log('.$kemosite_headless_posts_object.');</script>';

	}

endif;

if (!function_exists( 'kemosite_the_page' ) ):
	
	function kemosite_the_page() {

		$page_id = get_the_ID();

		if (isset($page_id)):
		
			$request = new WP_REST_Request( 'GET', '/wp/v2/pages/' . $page_id );
			$request->set_query_params(array(
			  'status' => 'publish'
			));
			$response = rest_do_request( $request);

			echo "<script>console.log(".json_encode($response->data).");</script>";

			// $kemosite_headless_pages_object = kemosite_load_pages();

			echo "<pre>";
			print_r($response);
			echo "</pre>";

			// echo '<script>console.log('.$kemosite_headless_pages_object.');</script>';

		endif;

	}

endif;

?>
