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

get_header();
?>

<?php if (have_posts()) : ?>

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

	<?php the_posts_navigation(); ?>

	<?php else: get_template_part( 'template-parts/content', 'none' ); endif; ?>

</div>

<?php get_footer(); ?>
