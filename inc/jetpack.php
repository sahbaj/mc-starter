<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package MCStarter
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function mcstarter_jetpack_setup() {
	
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content-wrapper',
		'wrapper'   => false,
		'render'    => 'mcstarter_infinite_scroll_render',
		'footer'    => false,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => 'content',
		'post-details' => array(
			'stylesheet' => 'mcstarter-style',
			'date'       => '.posted-on',
			'categories' => '.categories',
			'tags'       => '.tags',
			'author'     => '.byline',
			'comment'    => '.comment-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'mcstarter_jetpack_setup' );


/**
 * Custom render function for Infinite Scroll.
 */
function mcstarter_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content/content', 'search' );
		else :
			get_template_part( 'template-parts/content/content', get_post_type() );
		endif;
	}
}

add_filter( 'infinite_scroll_has_footer_widgets', 'mcstarter_has_footer_widgets' );
/**
 * Returns true if widgets are placed in the footer of the site.
 */
function mcstarter_has_footer_widgets( $has_footer_widgets = false ){
	return is_active_sidebar( 'sidebar-1' ) && ( 'sidebar-bottom' === get_theme_mod( 'mcstarter_sidebar_position', 'sidebar-right' ) );
}


