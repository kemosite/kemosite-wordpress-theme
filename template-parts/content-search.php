<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>



			<section><h2>
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Here are your search results for: "%s"', 'kemosite-wordpress-theme' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h2></section>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!--
			The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
			-->
	    	
	    		<section>
				<!--
				The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
				-->

					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			    	<?php
					the_excerpt();
					// get_the_excerpt($post->ID);
					
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
						'after'  => '</div>',
					) );
					?>

				</section>

			</article><!-- #post-<?php the_ID(); ?> -->