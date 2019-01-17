<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package kemosite-wordpress-theme
 */
?>

<?php get_header(); ?>

<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

    <div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left">
      <div class="row column">
        <br>
        <img class="thumbnail" src="http://placehold.it/550x350">
        <h5>Mike Mikerson</h5>
        <p>Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit amet leo.</p>
      </div>
    </div>

    <div class="off-canvas-content" data-off-canvas-content>
      <div class="title-bar hide-for-large">
        <div class="title-bar-left">
          <button class="menu-icon" type="button" data-open="my-info"></button>
          <span class="title-bar-title">Mike Mikerson</span>
        </div>
      </div>
      <div class="callout primary">
        <div class="row column">
          <h1>Hello! This is the portfolio of a very witty person.</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla.</p>
        </div>
      </div>
      <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/550x550">
          <h5>My Site</h5>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="medium-6 columns">
          <h3>Contact Me</h3>
          <p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor.</p>
          <ul class="menu">
            <li><a href="#">Dribbble</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Yo</a></li>
          </ul>
        </div>
        <div class="medium-6 columns">
          <label>Name
            <input type="text" placeholder="Name">
          </label>
          <label>Email
            <input type="text" placeholder="Email">
          </label>
          <label>
            Message
            <textarea placeholder="holla at a designerd"></textarea>
          </label>
          <input type="submit" class="button expanded" value="Submit">
        </div>
      </div>
    </div>
  </div>
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