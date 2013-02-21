<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package: sempress
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function sempress_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'sempress_infinite_scroll_setup' );
