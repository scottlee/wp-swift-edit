<?php

namespace WPSW\Core;

// Set the query param that will be used throughout.
const QUERY_PARAM = 'sw';

/**
 * Set up function
 *
 * @since 0.1.0
 *
 * @uses add_filter()
 * @uses add_action()
 *
 * @return void
 */
function setup() {

	// Filters
	add_filter( 'query_vars', __NAMESPACE__ . '\wp_swift_edit_params', 10, 1 );

	// Actions
	add_action( 'wp', __NAMESPACE__ . '\wp_swift_edit' );
}

/**
 * Register the query param.
 *
 * @param $args
 *
 * @return array
 */
function wp_swift_edit_params( $args ) {

	$args[] = QUERY_PARAM;

	return $args;
}

/**
 * Redirect users to the edit post url if the query param has been set.
 *
 * @return void
 */
function wp_swift_edit() {

	/**
	 * Only logged in users need apply.
	 * OR
	 * If the specific query param has been set.
	 */
	if ( ! is_user_logged_in() || ! isset( $_GET[ QUERY_PARAM ] ) ) {
		return;
	}

	/**
	 * Grab the edit post URL and redirect the user there.
	 *
	 * @internal `get_edit_post_link` handles the `current_user_can` checks.
	 */
	if ( $edit_url = get_edit_post_link( get_the_ID(), null ) ) {
		wp_safe_redirect( $edit_url );
		exit;
	}

}

