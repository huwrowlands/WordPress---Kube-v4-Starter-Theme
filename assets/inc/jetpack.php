<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package kube4
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function kube4_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'kube4_jetpack_setup' );
