<?php
/**
 * Template Name: Cart
 */
?>

<?php
/**
 * Template Name: Cart
 * 
 * The template for displaying the cart. Removes ads and distractions. Based on "page" template from kemosite-wordpress-theme
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

<div class="grid-layout-content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php 

while ( have_posts() ) : the_post();

	/*
	 * Include the Post-Type-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	 */
	get_template_part( 'template-parts/content', 'cart' );

	// If comments are open or we have at least one comment, load up the comment template.
	/*
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	*/

endwhile; ?>

</div>

<?php get_footer(); ?>
