<?php
/**
 * The header.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package photolove
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'photolove' ); ?></a>

	<div class="container-a outer-wrapper">

		<div class="content-wrap canvas-content-wrap">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'photolove' ); ?></a>

			<header class="page-header">
				<div class="container">
					<div class="site-branding">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo-love-logo-grey.jpg" alt="<?php bloginfo( 'name' ); ?>" /> </a></h1>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</header>
			<!-- end .page-header -->
