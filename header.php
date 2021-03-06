<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MCStarter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mcstarter' ); ?></a>
	<?php if ( empty( get_page_template_slug() ) || ! empty( get_page_template_slug() ) && 'templates/template-no-header.php' ==! get_page_template_slug() ) : ?>
		<?php if( has_nav_menu( 'topbar-menu' ) ): ?>
			<nav id="topbar-nav" class="topbar-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top bar menu', 'mcstarter' ); ?>">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'topbar-menu',
						'menu_id'        => 'topbar-menu',
						'menu_class'     => 'menu topbar-menu',
						'container'      => 'ul',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'depth' 		 => 1,
					) );
				?>
			</nav>
		<?php endif; ?>
		<header id="masthead" class="site-header" role="banner">
			<?php 
				get_template_part( 'template-parts/header/navbar/navbar', get_theme_mod( 'mcstarter-navbar', 'default' ) );
				get_template_part( 'template-parts/header/page-header/page-header', get_theme_mod( 'mcstarter-hero', 'default' ) );
			?>
		</header><!-- #masthead -->
	<?php endif; ?>
	<div id="content" class="content-area">
	