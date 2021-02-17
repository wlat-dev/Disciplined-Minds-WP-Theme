<?php
/**
 * Custom hooks
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

/*
add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
function understrap_add_site_info() {
	$the_theme = wp_get_theme();

	$site_info = sprintf(
			'Custom Wordpress theme by <a href="' . esc_url( __( 'https://wlat.dev', 'William Latshaw' ) ) . '">William Latshaw</a>'
	);

	echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
*/


if (!function_exists('custom_rewrite_rules')) {
	//tutor subjects
	function custom_rewrite_rules() {
		add_rewrite_rule( '^tutor/tutor-subjects/([^/]+)/?$',
			'index.php?taxonomy=subject&post_type=tutor&term=$matches[1]', 'top');
	}
}

