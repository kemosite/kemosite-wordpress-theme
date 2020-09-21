<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kemosite-wordpress-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

?>

<div class="grid-layout-content">

	<!-- Display all categories, then display posts by popularity or date published -->

	<?php while ( have_posts() ) : the_post();

		// echo get_post_type();
		get_template_part( 'template-parts/content', get_post_type() );

		// If comments are open or we have at least one comment, load up the comment template.
		/*
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		*/

	endwhile; ?>

</div>

<?php

// get_sidebar();

get_footer();
