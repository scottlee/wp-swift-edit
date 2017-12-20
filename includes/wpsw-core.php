<?php

namespace WP_Swift_Edit\Core;

// Set the query param that will be used throughout.
const QUERY_PARAM = 'se';

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
 * Primary handler for redirecting the user to the post edit.
 *
 * @return void
 */
function wp_swift_edit() {

	// Has the specific query param been set?
	if ( ! isset( $_GET[ QUERY_PARAM ] ) ) {
		return;
	}

	// We're only interested in editing singles
	if ( ! is_singular() ) {
		return;
	}

	/**
	 * We've made it this far, it's go time.
	 *
	 * If we've got a postID redirect the user.
	 */
	if ( $post_id = get_the_ID() ) {

		/**
		 * If the user is logged in already forward to the edit post link.
		 * Otherwise send them to the login screen specifying the redirect_url param.
		 */
		$edit_url = ( is_user_logged_in() ) ? get_edit_post_link( $post_id, null ) : admin_url( "post.php?post=$post_id&action=edit" );

		wp_safe_redirect( $edit_url );
		exit;
	}

}

