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

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kemosite-wordpress-theme' ); ?></h1>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

	<main role="main">

		<section>

			<article>

				<header>

					<h2 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kemosite-wordpress-theme' ); ?></h2>

				</header>

				<div>
					
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kemosite-wordpress-theme' ); ?></p>

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

			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
			/*
			echo "<pre>";
			if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
			echo "</pre>";
			*/

			?>

		</section>

	</main>

	<!-- <hr> -->

<?php get_footer(); ?>
