<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'social',
        'title'       => 'Social Network'
      ),
      array(
        'id'          => 'navigation',
        'title'       => 'Navigation'
      ),
      array(
        'id'          => 'seo',
        'title'       => 'SEO'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload your favicon',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'disqus_username',
        'label'       => 'Disqus Username',
        'desc'        => 'Your Disqus Username',
        'std'         => 'arrizalamin',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'navicon',
        'label'       => 'Navigation Icon',
        'desc'        => 'Icon for top left navigation button',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Facebook URL',
        'desc'        => 'Your Facebook URL example: https://www.facebook.com/arrizalamin',
        'std'         => 'https://www.facebook.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter Username',
        'desc'        => 'Your Twitter username example: arrizalamin',
        'std'         => 'arrizalamin',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'gplus',
        'label'       => 'Google Plus URL',
        'desc'        => 'Your Google Plus URL example: https://plus.google.com/100163952118626645893',
        'std'         => 'https://plus.google.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'aboutme',
        'label'       => 'About Me Page',
        'desc'        => 'Link to Your About Me Page',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'meta_description',
        'label'       => 'Meta Description',
        'desc'        => 'Description of your Blog',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'seo',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'meta_keywords',
        'label'       => 'Meta Keywords',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'seo',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}