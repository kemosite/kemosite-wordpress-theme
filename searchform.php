<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<ul class="menu">
		<li><input type="search" placeholder="Search" id="<?php echo $unique_id; ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s"></li>
		<li><input type="submit" class="button" value="Search"></input></li>
	</ul>

</form>
