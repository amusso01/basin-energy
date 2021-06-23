<?php
/**
 * Main Site Header Template
 * 
 * @author   Andrea Musso
 * 
 * @package  Foundry
 * 
 */

?>

<?php 
// Social logic

$displaySocial = get_theme_mod('display-social');

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--=== GMT head ===-->
	<?php  WPSeed_gtm('head') ?>
    <!--=== gmt end ===-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--=== GMT body ===-->
<?php WPSeed_gtm('body') ?>
<!--=== gmt end ===-->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'foundry' ); ?></a>
	<header class="site-header">
		<div class="site-header__search-container" id="fdSearchContainer">
			<?php get_search_form(); ?>
		</div>
		<div class="site-header__inner content-block">
			<?php get_template_part( 'components/header/logo' ); ?>
			<?php get_template_part( 'components/navigation/primary' ); ?>
			<div class="site-header__search-icon" id="fdSearchButton">
				<?php get_template_part( 'svg-template/svg', 'search' ) ?>
			</div>
			<div class="fd-hamburger__container">
				<?php get_template_part( 'components/header/hamburger' ); ?>
			</div>
		</div>
		
	</header><!-- .site-header -->


	<div id="content" class="site-content">
