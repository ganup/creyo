<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Flask
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
<?php do_action('flask_before_the_page'); ?>
<div id="page" class="hfeed site">
	<?php do_action('flask_before_the_header'); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'flask' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php do_action('flask_in_the_header_before_the_inner'); ?>
		<div class="inner">
			<?php do_action('flask_in_the_header'); ?>
		</div>
	</header><!-- #masthead -->
	
	<?php do_action('flask_after_the_header'); ?>
	
	<div id="content" class="site-content">
		<div class="inner">
	
		<?php do_action('flask_top_of_the_content'); ?>
