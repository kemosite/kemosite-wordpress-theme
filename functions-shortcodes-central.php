<?php


/* Three columns wrap shortcode */
function central_three_columns($attributes, $content) {

    $output = "";
    $output .= '<div class="grid-x medium-up-3">' . do_shortcode($content) . '</div>' . "\n";
    return $output;

}
add_shortcode('three_columns', 'central_three_columns');

/* Four columns wrap shortcode */
function central_four_columns($attributes, $content) {

    $output = "";
    $output .= '<div class="grid-x large-up-4">' . do_shortcode($content) . '</div>' . "\n";
    return $output;

}
add_shortcode('four_columns', 'central_four_columns');

/* Two columns wrap shortcode */
function central_two_columns($attributes, $content) {

    $output = "";
	$output .= '<div class="grid-x medium-up-2">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('two_columns', 'central_two_columns');
add_shortcode('two_columns_66_33', 'central_two_columns');
add_shortcode('two_columns_33_66', 'central_two_columns');
add_shortcode('two_columns_75_25', 'central_two_columns');
add_shortcode('two_columns_25_75', 'central_two_columns');

/* Column shortcode */
function central_column($attributes, $content) {

	$output = "";
	$output .= '<div class="cell">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('column1', 'central_column');
add_shortcode('column2', 'central_column');
add_shortcode('column3', 'central_column');
add_shortcode('column4', 'central_column');


/* Message shortcode */
function central_message($attributes, $content) {

	$output = ""; 
	$output .= '<div class="callout">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('message', 'central_message');

/* Testimonial shortcode */
function central_testimonial($attributes, $content) {

	$output = "";

	$output .= '<div class="media-object stack-for-small">' . "\n";

	if ($attributes !== NULL):

		if ($attributes['img'] !== NULL):

			$output .= '<div class="media-object-section">' . "\n";
			$output .= '<div class="thumbnail">' . "\n";
			$output .= '<img src="'.$attributes['img'].'">' . "\n";
			$output .= '</div>' . "\n";
			$output .= '</div>' . "\n";

		endif;

	endif;

	$output .= '<div class="media-object-section">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>' . "\n";

	$output .= '</div>' . "\n";

	return $output;

}
add_shortcode('testimonial', 'central_testimonial');

function central_separator($attributes, $content) {

	$output = "";

	$output .= '<hr>' . "\n";

	return $output;

}
add_shortcode('separator', 'central_separator');

function central_latest_post($attributes, $content) {

	// $attributes: type, post_number, category, text_length

	// global $post;

	$args = array(
		'numberposts' => $attributes['post_number'],
		'offset' => 0,
		'category' => $attributes['category'],
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' =>'',
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => true
	);

	$recent_posts = wp_get_recent_posts($args);

	$output = "";

	foreach ( $recent_posts as $post ) :

		/*
		echo "<pre>";
		print_r($post);
		echo "</pre>";
		*/

		$permalink = get_permalink($post['ID']);
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post['ID'] ), 'single-post-thumbnail' );
		$image_src = esc_url($image[0]);

		/*
		echo "<pre>";
		print_r($image);
		echo "</pre>";
		*/

		/*
		echo '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';
		*/
		
		$output .= '<div class="media-object stack-for-small">
		  <div class="media-object-section">
		    <div class="thumbnail" style="background-image: url(\'' . esc_url( $image_src ) . '\')">
		      <a href="'.$permalink.'"><img src="' . esc_url( $image_src ) . '" alt="' . $post['post_title'] . '"></a>
		    </div>
		  </div>
		  <div class="media-object-section main-section">
		    <h4><a href="'.$permalink.'">'.$post['post_title'].'</a></h4>
		    <p class="span-all-columns">'.get_the_excerpt($post['ID']).'</p>
		  </div>
		</div>
		<br>';

	endforeach;

	return $output;

}
add_shortcode('latest_post', 'central_latest_post');

function central_action($attributes, $content) {

	if ($attributes !== NULL && $attributes['background_colour'] !== NULL):

		$bg_colour = ($attributes['background_colour'] !== NULL) ? $attributes['background_colour'] : '#FFFFFF';

	endif;

	$output = "";

	$output .= '<div class="callout" style="background-color: '.$bg_colour.'">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode('action', 'central_action');

function central_pie_chart($attributes, $content) {

	/*
	wp_deregister_script('graph-js');
	wp_register_script('graph-js', get_stylesheet_directory_uri().'/js/vendor/Chart.min.js', '', '2.7.2');
	wp_enqueue_script('graph-js');
	*/

	if ($attributes !== NULL):

		$title = $attributes['title'];
		$remove_spaces = str_replace(' ', '_', $title);
		$chart_id = strtolower($remove_spaces);
		$percentage = floatval($attributes['percent']);
		$rotation = ($percentage < 0) ? -0.5 * pi() - ($percentage) : -0.5 * pi();
		$remainder = floatval(100 - $percentage);

		echo "<script>console.log(".json_encode($percentage).");</script>";

	endif;

	$output = "";

	$output .= '<canvas id="chart_'.$chart_id.'" class="chart"></canvas>';
	$output .= '<script>';
	$output .= '
	var ctx_'.$chart_id.' = document.getElementById("chart_'.$chart_id.'").getContext("2d");

	var chart_'.$chart_id.' = new Chart(ctx_'.$chart_id.', {
	    type: "pie",
	    data: {
		    datasets: [{
		        data: ['.$percentage.', '.$remainder.'],
		        backgroundColor: [chart_colours.primary]
		    }],

		    // These labels appear in the legend and in the tooltips when hovering different arcs
		    labels: ["'.$title.'", ""]
		},
		options: {
	        rotation: '.$rotation.'
	    }
	});
	';
	$output .= '</script>';

	return $output;

	/*
	<canvas id="myChart" width="400" height="400"></canvas>
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');

	var myPieChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
	        datasets: [{
	            label: '# of Votes',
	            data: [12, 19, 3, 5, 2, 3],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});

	</script>
	*/

}
add_shortcode('pie_chart', 'central_pie_chart');