<?php
/**
 * Template Name: Product Page Template
 *
 * @package kemosite-wordpress-theme
 */
?>

<?php get_header(); ?>

<!-- You can now combine a row and column if you just need a 12 column row -->
<div class="row columns">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
      <li><a href="#">Home</a></li>
      <li><a href="#">Features</a></li>
      <li class="disabled">Gene Splicing</li>
      <li>
        <span class="show-for-sr">Current: </span> Cloning
      </li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="medium-6 columns">
    <img class="thumbnail" src="http://placehold.it/650x350">
    <div class="row small-up-4">
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/250x200">
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/250x200">
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/250x200">
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/250x200">
      </div>
    </div>
  </div>
  <div class="medium-6 large-5 columns">
    <h3>My Awesome Product</h3>
    <p>Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in.</p>

    <label>Size
    <select>
      <option value="husker">Small</option>
      <option value="starbuck">Medium</option>
      <option value="hotdog">Large</option>
      <option value="apollo">Yeti</option>
    </select>
    </label>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="middle">Quantity</label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" placeholder="One fish two fish">
      </div>
    </div>

    <a href="#" class="button large expanded">Buy Now</a>

    <div class="small secondary expanded button-group">
        <a class="button">Facebook</a>
        <a class="button">Twitter</a>
        <a class="button">Yo</a>
      </div>
    </div>
</div>

<div class="column row">
  <hr>
  <ul class="tabs" data-tabs id="example-tabs">
    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Reviews</a></li>
    <li class="tabs-title"><a href="#panel2">Similar Products</a></li>
  </ul>
  <div class="tabs-content" data-tabs-content="example-tabs">
    <div class="tabs-panel is-active" id="panel1">
      <h4>Reviews</h4>
      <div class="media-object stack-for-small">
        <div class="media-object-section">
          <img class="thumbnail" src="http://placehold.it/200x200">
        </div>
        <div class="media-object-section">
          <h5>Mike Stevenson</h5>
          <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
        </div>
      </div>
      <div class="media-object stack-for-small">
        <div class="media-object-section">
          <img class="thumbnail" src="http://placehold.it/200x200">
        </div>
        <div class="media-object-section">
          <h5>Mike Stevenson</h5>
          <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you</p>
        </div>
      </div>
      <div class="media-object stack-for-small">
        <div class="media-object-section">
          <img class="thumbnail" src="http://placehold.it/200x200">
        </div>
        <div class="media-object-section">
          <h5>Mike Stevenson</h5>
          <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you</p>
        </div>
      </div>
      <label>
        My Review
        <textarea placeholder="None"></textarea>
      </label>
      <button class="button">Submit Review</button>
    </div>
    <div class="tabs-panel" id="panel2">
      <div class="row medium-up-3 large-up-5">
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/350x200">
          <h5>Other Product <small>$22</small></h5>
          <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
          <a href="#" class="button hollow tiny expanded">Buy Now</a>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/350x200">
          <h5>Other Product <small>$22</small></h5>
          <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
          <a href="#" class="button hollow tiny expanded">Buy Now</a>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/350x200">
          <h5>Other Product <small>$22</small></h5>
          <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
          <a href="#" class="button hollow tiny expanded">Buy Now</a>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/350x200">
          <h5>Other Product <small>$22</small></h5>
          <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
          <a href="#" class="button hollow tiny expanded">Buy Now</a>
        </div>
        <div class="column">
          <img class="thumbnail" src="http://placehold.it/350x200">
          <h5>Other Product <small>$22</small></h5>
          <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
          <a href="#" class="button hollow tiny expanded">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row column">
  <hr>
  <ul class="menu">
    <li>Yeti Store</li>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
    <li class="float-right">Copyright 2016</li>
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