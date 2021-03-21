<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 * @since 5.7
 * @version 5.7.0.1
 *
 * REST API Documentation
 * https://developer.wordpress.org/rest-api/
 * 
 * REST API can be extended if necessary
 */

get_header();

/*
Load header template.
For the parameter, if the file is called "header-special.php" then specify "special".

<?php
if ( is_home() ) :
  get_header( 'home' );
elseif ( is_404() ) :
  get_header( '404' );
else :
  get_header();
endif;
*/

?>

<?php

/**
 * This will be our first test of using the REST API
 */

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
