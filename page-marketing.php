<?php
/**
 * Template Name: Marketing Page Template
 *
 * @package kemosite-wordpress-theme
 */
?>

<?php get_header(); ?>

<div class="row columns">
  <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
    <ul class="orbit-container">
      <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
      <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
      <li class="orbit-slide is-active">
        <img src="http://placehold.it/1200x450">
      </li>
      <li class="orbit-slide">
        <img src="http://placehold.it/1200x450">
      </li>
      <li class="orbit-slide">
        <img src="http://placehold.it/1200x450">
      </li>
      <li class="orbit-slide">
        <img src="http://placehold.it/1200x450">
      </li>
    </ul>
  </div>
</div>

<div class="row column text-center">
  <h1>Changing the World Through Design</h1>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>
  <a href="#" class="button large">Learn More</a>
  <a href="#" class="button large hollow">Learn Less</a>
</div>

<hr>

<div class="row">
  <div class="medium-6 large-3 columns">
    <h3>Lorum</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
  <div class="medium-6 large-3 columns">
    <h3>Ipsum</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
  <div class="medium-6 large-3 columns">
    <h3>Dolor</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
  <div class="medium-6 large-3 columns">
    <h3>Sit Amet</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
</div>

<hr>

<div class="row column">
  <div class="callout primary text-center">
    <h3>Really Great Deals</h3>
    <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam porttitor.</p>
  </div>
</div>

<hr>

<div class="row">
  <div class="large-6 columns">
    <h4>Nulla At Nulla Justo, Eget</h4>
    <img class="thumbnail" src="http://placehold.it/700x250">
    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit amet leo consequat posuere. Vestibulum ante ipsum primis in.</p>
  </div>
  <div class="large-6 columns">
    <h4>Nulla At Nulla Justo, Eget</h4>
    <img class="thumbnail" src="http://placehold.it/700x250">
    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit amet leo consequat posuere. Vestibulum ante ipsum primis in.</p>
  </div>
</div>

<hr>

<div class="row column">
  <ul class="menu">
    <li><a href="#">One</a></li>
    <li><a href="#">Two</a></li>
    <li><a href="#">Three</a></li>
    <li><a href="#">Four</a></li>
  </ul>
</div>

<div class="grid-x grid-margin-x grid-padding-x">
	
	<div class="medium-8 cell">

		<main role="main">

			<?php while ( have_posts() ) : the_post(); ?>

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

					<div>
						<?php
						the_content();

						wp_link_pages();
						?>
					</div>

				</article>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>

	</div>

	<div class="medium-4 cell">

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer(); ?>