<?php
/**
 * Plugin Name: Custom AJAX Load Posts
 * Plugin URI: http://www.witanddelight.com/
 * Description: Load the next page of posts with AJAX.
 * Version: 0.1
 * Author: Anthony Ticknor
 * Author URI: http://www.anthonyticknor.com/
 * Thanks: http://www.problogdesign.com/wordpress/load-next-wordpress-posts-with-ajax/
 */

 /**
  * Initialization. Add our script if needed on this page.
  */
 function custom_alp_init() {
 	global $wp_query;

 	// Add code to index pages.
 	if( !is_singular() ) {
 		// Queue JS and CSS
 		wp_enqueue_script(
 			'custom-alp-load-posts',
 			plugin_dir_url( __FILE__ ) . 'js/load-posts.js',
 			array('jquery'),
 			'1.0',
 			true
 		);



 		// What page are we on? And what is the pages limit?
 		$max = $wp_query->max_num_pages;
 		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

 		// Add some parameters for the JS.
 		wp_localize_script(
 			'custom-alp-load-posts',
 			'custom_alp',
 			array(
 				'startPage' => $paged,
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)
 		);
 	}
 }
 add_action('template_redirect', 'custom_alp_init');

 ?>