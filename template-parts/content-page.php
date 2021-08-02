<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<!-- content-page.php -->
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
<!--
The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
-->

	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--
	The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
	-->

    	<?php
		the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
			'after'  => '</div>',
		) );

		?>

	</section>

<!-- </article>--><!-- #post-<?php the_ID(); ?> -->