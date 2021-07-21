<?php
/**
 * Template Name: Full Width Page
 * 
 * The template for displaying all program pages. Based on "page" template from kemosite-wordpress-theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

?>

<div class="grid-layout-content no-sidebars">

	<div class="grid_area_content the content">

	    <main role="main">

	    	<!-- Display all categories, then display posts by popularity or date published -->

	    	<?php while ( have_posts() ) : the_post();
	    		
				get_template_part( 'template-parts/content', 'page-template-full-width' );

			endwhile; ?>

	    </main>
    
	</div>

</div>

<?php get_footer(); ?>
