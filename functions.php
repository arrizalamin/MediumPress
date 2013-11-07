<?php
	add_theme_support( 'post-thumbnails' );


	function register_sidebar_menu() {
	  register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
	}
	add_action( 'init', 'register_sidebar_menu' );

	// Filtering out some HTML and Code from the Nav
	function wp_nav_menu_remove_attributes( $menu ){
		$patterns = array('/ id=\"(.*)\" class=\"(.*)\"/iU');
	    return $menu = preg_replace($patterns, '', $menu );
	}
	function add_menuclass($ulclass) {
	return preg_replace('/<a/', '<a', $ulclass, 1);
	}
	add_filter( 'wp_nav_menu', 'wp_nav_menu_remove_attributes', 'add_menuclass');
	
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}

	function mediumpress_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
	?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment, $size = '15', $default = get_bloginfo('stylesheet_directory').'/images/no-pic.png' ); ?>
					<?php printf(__('<span class="fn" style="font-size:15px;">%s:</span>'), get_comment_author_link()) ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<p style="font-size:15px;margin-left:19px;"><?php _e('Your comment is awaiting moderation.') ?></p style="font-size:15px;">
					<br />
				<?php endif; ?>
				<div style="margin-left:19px;">
					<div class="comment-meta commentmetadata" style="font-size:9px;">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
						<?php edit_comment_link(__('(Edit)'),'  ','') ?>
					</div>
					<p style="font-size:15px;"><?php echo $comment->comment_content; ?></p>

					<div class="reply" style="font-size:10px;">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				</div>
			</div>
	<?php
	}

	function custom_excerpt_length( $length ) {
		return 15;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

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

	/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>
 
<?php
}

/* 
 * This is an example of how to override a default filter
 * for 'text' sanitization and use a different one.
 */

/*

add_action('admin_init','optionscheck_change_santiziation', 100);

function optionscheck_change_santiziation() {
	remove_filter( 'of_sanitize_text', 'sanitize_text_field' );
	add_filter( 'of_sanitize_text', 'of_sanitize_text_field' );
}

function of_sanitize_text_field($input) {
	global $allowedtags;
	$output = wp_kses( $input, $allowedtags);
	return $output;
}

*/

/* 
 * This is an example of how to override the default location and name of options.php
 * In this example it has been renamed options-renamed.php and moved into the folder extensions
 */

/*

add_filter('options_framework_location','options_framework_location_override');

function options_framework_location_override() {
	return array('/extensions/options-renamed.php');
}

*/

/* 
 * Here is an example for how to change the menu title name and slug
 */
 
/*
 
function optionscheck_options_menu_params( $menu ) {
	
	$menu['page_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_slug'] = 'hello-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'optionscheck_options_menu_params' );

*/

?>