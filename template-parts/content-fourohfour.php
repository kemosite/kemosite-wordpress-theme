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
			    	
			    	<h2><?php esc_html_e( 'Oops!', 'kemosite-wordpress-theme' ); ?></h2>
					
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
						'after'  => '</div>',
					) );
					?>

					<p><?php esc_html_e( "It seems that some signals might be crossed. The page you're looking forward isn't here. Maybe try one of the links below, or do a search?", 'kemosite-wordpress-theme' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'kemosite-wordpress-theme' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$kemosite_wordpress_theme_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'kemosite-wordpress-theme' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$kemosite_wordpress_theme_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
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