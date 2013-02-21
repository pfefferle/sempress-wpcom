<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * @package SemPress
 * @since SemPress 1.0.0
 */

/**
 * Set a default theme color array for WP.com.
 */
if ( ! isset ( $themecolors ) ) {
	$themecolors = array(
	'bg' => 'ffffff',
	'border' => 'eeeeee',
	'text' => '444444',
);
}
