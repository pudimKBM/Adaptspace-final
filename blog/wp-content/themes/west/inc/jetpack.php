<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package West
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function west_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'west_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function west_jetpack_setup
add_action( 'after_setup_theme', 'west_jetpack_setup' );

function west_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function west_infinite_scroll_render