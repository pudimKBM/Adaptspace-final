<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package West
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'west' ); ?></a>

	<header id="masthead" class="site-header <?php echo west_has_header(); ?>" role="banner">
		<div class="container">
			<div class="site-branding col-md-4 col-sm-6 col-xs-12">
				<?php west_branding(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation col-md-8" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<nav class="mobile-nav"></nav>
		</div>
	</header><!-- #masthead -->

	<?php if ( west_has_header() == 'has-header' ) : ?>
	<div class="header-image">
		<?php west_header_text(); ?>
		<img class="large-header" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
		
		<?php $mobile = get_theme_mod('mobile_header'); ?>
		<?php if ( $mobile ) : ?>
		<img class="small-header" src="<?php echo esc_url($mobile); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
		<?php else : ?>
		<img class="small-header" src="<?php header_image(); ?>" width="1024" alt="<?php bloginfo('name'); ?>">
		<?php endif; ?>

	</div>
	<?php else : ?>
	<div class="header-clone"></div>
	<?php endif; ?>

	<div id="content" class="site-content">
	<?php if ( !is_page_template('page-templates/page_composer.php') ) : ?>
		<div class="container">
	<?php else : ?>
		<div class="fullwidth">
	<?php endif; ?>