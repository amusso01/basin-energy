<?php
/**
 * Template Name: Contact
 *
 * The template for displaying contact Page.
 * 
 * Template Post Type: page
 *
 * @package Strapped
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = get_field('cards', $page_for_posts);


get_header();
?>
<section class="hero side-menu__hero" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">

</section>

<main role="main" class=" main contact-main content-block-smaller">


<h1>Get in touch</h1>

<div class="contact-grid__container contact-container" >
	<section class="news-container">
	


		<?php the_content() ?>

	</section>
	<aside class="side-cards">
		<?php if($cards) : ?>
			<?php foreach($cards as $card) : ?>
				<?php echo $card['card_link'] ? '<a href="'.$card['card_link'].'">' : ''  ?>
					<div class="aside-card" style="<?php echo $card['has_background_image'] ? 'background-image:url('.$card['image'].')' : 'background:'.$card['background_color'].'' ?>" >
				
						<div class="hover"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
						<div class="overlayText <?php echo $card['has_background_image'] ? 'has-image' : '' ?>">
							<p><?php echo $card['card_title'] ?></p>
							<p class="read-more <?php echo $card['has_background_image'] ? '' : 'hide' ?>">Read More</p>
						</div>
				
					</div>
				<?php echo $card['card_link'] ? '</a>' : ''  ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</aside>
</div>
 

</main><!-- #main -->


<?php
get_footer();

