<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 * @since 5.0.0
 * @version 5.0.0
 */

get_header();

?>
<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<h1><?php bloginfo( 'name' ); ?></h1>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php 

if ( have_posts() ) :

	while ( have_posts() ) : the_post(); ?>

		<main role="main">

			<section>

				<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>
				<?php else : ?>
				<header>
					<h2>Posts</h2>
				</header>
				<?php endif; ?>

				<article>
						
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

					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
						<div>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php
					// Show the selected front page content.
					the_content();
					?>

				</article>

				<hr>

				<?php				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				
				echo "<pre>";
				if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
				echo "</pre>";

				?>

			</section>

		</main>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
