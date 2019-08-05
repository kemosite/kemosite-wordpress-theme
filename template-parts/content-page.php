<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<main role="main">

	<section>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="grid-x grid-margin-x">

				<div class="cell large-3 the exerpt">

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

					<?php
					// the_excerpt();
					get_the_excerpt($post->ID);

					$args = array(
						'smallest'                  => 1, 
						'largest'                   => 1,
						'unit'                      => 'em'
					);
					?>


					<div class="tag-cloud">
					<?php wp_tag_cloud($args); ?>
					</div>

					<?php
					the_post_navigation(
						array(
				            'prev_text'          => 'Previous page: %title',
				            'next_text'          => 'Next page: %title',
				            'in_same_term'       => false,
				            'excluded_terms'     => '',
				            'taxonomy'           => 'category',
				            'screen_reader_text' => __( 'Page navigation' ),
				        )
					);
					?>

					<div class="small_ad">
						<?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?>
					</div>

				</div>

				<div class="cell large-6 the content">
			    	
			    	<?php
					the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
						'after'  => '</div>',
					) );
					?>

				</div>

				<div class="cell large-3">
					<div class="sidebar_ad">
						<?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?>
					</div>
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

		</article><!-- #post-<?php the_ID(); ?> -->

	</section>

</main>