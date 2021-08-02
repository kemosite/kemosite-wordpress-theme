<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

<!-- front-page.php -->
<div class="grid-layout-content">

	<div class="grid_area_exerpt the exerpt">

	    <?php if ( is_home() ) : ?>
	    
		    <?php wp_list_categories( array(
		      'title_li' => '<h3>' . __( 'Categories', 'textdomain' ) . '</h3>'
		    ) ); ?>

	    <?php endif; ?>

	    <div class="small_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?></div>

    
	</div>

	<div class="grid_area_content the content">

	    <main role="main">

	    	<!-- Display all categories, then display posts by popularity or date published -->

	    	<?php while ( have_posts() ) : the_post();

	    		get_template_part( 'template-parts/content', 'front-page' );

	        // echo "<pre>" . get_post_type() . "</pre>";

	    		// If comments are open or we have at least one comment, load up the comment template.
	    		/*
	    		if ( comments_open() || get_comments_number() ) :
	    			comments_template();
	    		endif;
	    		*/

	    	endwhile; ?>

	    </main>
    
	</div>

	<div class="grid_area_sidebar">
	    <div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
	</div>

</div>

<?php get_footer(); ?>
