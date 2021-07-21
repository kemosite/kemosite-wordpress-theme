<?php
/**
 * Template part for displaying post content type.
 * CAUTION: Is repeated in while-post loops!
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--
The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
-->

	<section>
	<!--
	The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
	-->

    	<?php
    	// the_title( '<h2 class="entry-title">', '</h2>' );
		the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
		wp_link_pages();
		?>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->

<hr>
