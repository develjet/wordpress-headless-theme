<?php
/**
 * Develjet Headless functions and definitions.
 * 
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 * 
 * @package Develejet_Headless_Theme
 * @since Develejet Headless 1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Set up the content width value based on the theme's design.
 *
 * @see develjet_content_width()
 *
 * @since Develejet Headless 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 480;
}

load_theme_textdomain( "develjet-headless", dirname( __FILE__ ) . '/languages/' );

if ( ! function_exists( "develjet_setup" ) ) {
  /**
   * Develjet Headless setup.
   * 
   * Set up theme defaults and registers support for various WordPress features
   * 
   * @since Develejet Headless 1.0
   */
  function develjet_setup() {
		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

    // Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 640, 427, true );
		add_image_size( 'develjet-full-width', 1280, 853, true );

    // This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary'   => __( 'Primary menu', 'develjet-headless' ),
				'secondary' => __( 'Secondary menu', 'develjet-headless' ),
				'mobile'    => __( 'Mobile menu', 'develjet-headless' ),
        'social'    => __( 'Social links', 'develjet-headless' ),
			)
		);

    /*
		 * Switch default core markup to output valid HTML5.
		 */
		add_theme_support( 'html5' );

    /*
		 * Enable support for Post Formats.
		 * See: https://developer.wordpress.org/advanced-administration/wordpress/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'audio',
				'quote',
				'link',
				'gallery',
			)
		);

    add_theme_support(
			'featured-content',
			array(
				'featured_content_filter' => 'develjet_get_featured_posts',
				'max_posts'               => 6,
			)
		);

  } add_action( 'after_setup_theme', 'develjet_setup' );

	/**
	 * Register settings for the Develjet Headless theme.
	 *
	 * Registers the 'develjet_headless_redirection_link' setting in the 'general' group.
	 *
	 * @since Develejet Headless 1.0
	 */
	function develjet_register_settings() {
		register_setting(
				'general',
				'develjet_headless_redirection_link',
				array(
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
						'default' => ''
				)
		);
	} add_action( 'admin_init', 'develjet_register_settings' );

	/**
	 * Add settings field for the Develjet Headless theme.
	 *
	 * Adds the 'develjet_headless_redirection_link' field to the 'general' settings page.
	 *
	 * @since Develejet Headless 1.0
	 */
	function develjet_add_settings() {
			add_settings_field(
					'develjet_headless_redirection_link',
					__('Redirect all trafic to:', 'develjet-headless'),
					'develjet_cb_input_redirection_link',
					'general'
			);
	}	add_action('admin_menu', 'develjet_add_settings');

  /**
   * Adjust content_width value for image attachment template.
   * 
   * @since Develejet Headless 1.0
   */
  function develjet_content_width() {
    if ( is_attachment() && wp_attachment_is_image() ) {
      $GLOBALS['content_width'] = 960;
    }
  } add_action( 'template_redirect', 'develjet_content_width' );

  /**
   * Getter function for Featured Posts.
   * 
   * @return array An array of WP_Post objects.
   * @since Develejet Headless 1.0
   */
  function develjet_get_featured_posts() {
    /**
     * Filters the featured posts to return in Develjet Headless.
     * 
     * @param array|bool $posts Array of featured posts, otherwise false.
     * @since Develejet Headless 1.0
     */
    return apply_filters( 'develjet_get_featured_posts', array() );
  }

	/**
	 * Callback function to display the input field for the redirection link.
	 *
	 * Displays the input field for 'develjet_headless_redirection_link' setting.
	 *
	 * @since Develejet Headless 1.0
	 */
	function develjet_cb_input_redirection_link() {
			$option_value = get_option( 'develjet_headless_redirection_link', '' );
			echo '<input type="text" id="develjet_headless_redirection_link" name="develjet_headless_redirection_link" value="' . esc_attr( $option_value ) . '" class="regular-text" placeholder="' . __( 'https://example.com', 'develjet-headless' ) . '">';
	}

}
