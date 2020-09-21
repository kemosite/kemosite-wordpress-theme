<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<div class="grid-layout-content">

	<div class="grid_area_exerpt the exerpt">

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

	<div class="grid_area_content the content">

		<main>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!--
			The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
			-->
	    	
	    		<section>
				<!--
				The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
				-->
	    	
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

				</section>

			</article><!-- #post-<?php the_ID(); ?> -->

		</main>

	</div>

	<div class="grid_area_sidebar">
		<div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
	</div>

</div>