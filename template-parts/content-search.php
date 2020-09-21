<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<div class="grid-layout-content">

	<div class="grid_area_exerpt the exerpt">

		<!-- Get a thumbnail later -->

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<p>POSTED: <?php the_time('jS F Y') ?></p>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php

    	// kemosite_wordpress_theme_post_thumbnail();

		if (isset($latest_post)):

			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
			$image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
			$image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
			?>
			<?php if ($image && $image_srcset && $image_sizes): ?>
				<div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
			<?php endif; ?>

		<?php endif; ?>

		<div class="small_ad">
			<?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?>
		</div>

	</div>

	<div class="grid_area_content the content">

		<main role="main">

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

		</main>

	</div>

	<div class="grid_area_sidebar">
		<div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
	</div>

</div>

<?php /*
if ( get_edit_post_link() ) : ?>
	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers *
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kemosite-wordpress-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
<?php endif; */ ?>

