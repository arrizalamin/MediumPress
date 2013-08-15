<?php
	add_theme_support( 'post-thumbnails' );
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}

	function new_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    	
	function wcount(){
		ob_start();
		the_content();
		$content = ob_get_clean();
		return sizeof(explode(" ", $content));
	}

	/**
	 * Optional: set 'ot_show_pages' filter to false.
	 * This will hide the settings & documentation pages.
	 */
	add_filter( 'ot_show_pages', '__return_false' );

	/**
	 * Optional: set 'ot_show_new_layout' filter to false.
	 * This will hide the "New Layout" section on the Theme Options page.
	 */
	add_filter( 'ot_show_new_layout', '__return_false' );

	/**
	 * Required: set 'ot_theme_mode' filter to true.
	 */
	add_filter( 'ot_theme_mode', '__return_true' );

	/**
	 * Required: include OptionTree.
	 */
	load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

?>
