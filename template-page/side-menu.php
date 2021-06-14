<?php
/**
 * Template Name: Side Menu
 *
 * The template for displaying page with side menu.
 * 
 * Template Post Type: page
 *
 * @package Strapped
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$side_menu = get_field('side_menu');
$side_title = get_field('aside_title');
$investor = get_field('investor_contact');




get_header();
?>
<section class="hero side-menu__hero" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">

</section>

<main class="main side-menu-main content-block" role="main">

	<aside class="side-menu__side-bar">
		<div class="side-menu__sticky">

			<h5><?php echo $side_title ?></h5>
			<div class="aside-menu">
				<?php echo $side_menu ?>
			</div>
			<div class="side-investor">
				<img src="<?php echo $investor['picture'] ?>" alt="Investor <?php echo $investor['name'] ?> picture">
				<p class="title">Investor Contact</p>
				<p class="name"><?php echo $investor['name'] ?></p>
				<p class="phone"><?php echo $investor['phone'] ?></p>
				<a href="mailto:<?php echo $investor['emial'] ?>" class="email"><?php echo $investor['email'] ?></a>
			</div>

		</div>
	</aside>

	<section class="side-menu__content">
		<h1><?php echo get_the_title() ?></h1>
		<div class="gutenContent">
			<?php the_content(); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>