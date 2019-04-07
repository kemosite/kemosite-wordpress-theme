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

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<!-- <h1><?php bloginfo( 'name' ); ?></h1> -->
			<?php
			if ( is_single() ) {
				echo '<h1 class="entry-title">Search Results</h1>';
			} elseif ( is_front_page() && is_home() ) {
				echo '<h3 class="entry-title">Search Results</h3>';
			} else {
				echo '<h2 class="entry-title">Search Results</h2>';
			}
			?>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php while ( have_posts() ) : the_post(); ?>

	<main role="main">

		<section>

			<!--
			<header>
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} elseif ( is_front_page() && is_home() ) {
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header>
			-->

			<article>

				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						kemosite_wordpress_theme_posted_on();
						kemosite_wordpress_theme_posted_by();
						?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php
				/*

				<?php kemosite_wordpress_theme_post_thumbnail(); ?>

				*/
				?>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				<?php
				/*
				<footer class="entry-footer">
					<?php kemosite_wordpress_theme_entry_footer(); ?>
				</footer>
				*/
				?>

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

<?php endwhile; ?>

<?php get_footer(); ?>