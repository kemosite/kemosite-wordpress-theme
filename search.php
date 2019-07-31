<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kemosite-wordpress-theme
 */

get_header();

?>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php  if ( have_posts() ): ?>

	<h2>
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Here are your search results for: "%s"', 'kemosite-wordpress-theme' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h2>

	<?php

	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content', 'search' );

		// If comments are open or we have at least one comment, load up the comment template.
		/*
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		*/

	endwhile;

else:

	get_template_part( 'template-parts/content', 'none' );

endif;

?>

<?php get_footer(); ?>
