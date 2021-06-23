<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

$cards = get_field('cards', $page_for_posts);

$args = array(
	'post_type' 		=> 'post',
	'post_status'		=> 'publish',
	'posts_per_page' 	=> 3,
	'category_name'     => 'all-news',
	'orderby' 			=> 'date',
	'order' 			=> 'DESC',
);


get_header();
?>
<section class="hero side-menu__hero" style="background-image:url('<?php echo get_the_post_thumbnail_url( $page_for_posts ) ?>')">

</section>

<main role="main" class=" main index-main index-single index-single__main content-block-smaller">


	

<div class="index-grid__container index-single-grid__container" >
	<section class="news-container">
		<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="back"> <span><?php get_template_part( 'svg-template/svg', 'back' ) ?></span>  Back to all news</a>		
		<h1><?php echo get_the_title( ) ?></h1>
		<p class="share-date"><span id="share"><?php get_template_part( 'svg-template/svg', 'share' )  ?> Share</span>  <span id="date"><?php echo get_the_date( 'd M Y' ) ?></span></p>
		<div class="share-icon" id="shareIcon">
			<ul class="icon">
				<li><a target="_blank"  rel="noopener noreferrer"  href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink() ?>"><?php get_template_part( 'svg-template/svg', 'facebook' ) ?></a></li>
				<li><a target="_blank"  rel="noopener noreferrer"  href="https://www.linkedin.com/shareArticle
								?mini=true
								&url=<?php echo get_the_permalink() ?>
								&title=<?php echo get_the_title() ?>
								&source=Basin-Energy"><?php get_template_part( 'svg-template/svg', 'linkedin' ) ?></a></li>
			</ul>
		</div>
		<?php the_content() ?>

		<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="back back-end"> <span><?php get_template_part( 'svg-template/svg', 'back' ) ?></span>  Back to all news</a>		
	</section>
	<aside class="side-cards">
		<div class="side-news">
			<p class="title">MORE NEWS</p>
			<?php 
			$the_query = new WP_Query( $args ); 
			
			// The Loop
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post(); $postId = $the_query->post->ID;  ?>
				<article  <?php post_class('fd-single-news'); ?>>
					<a href="<?php echo get_the_permalink($postId) ?>">
						<div class="news-content">
							<p><?php echo get_the_title( $postId ) ?>  <span><?php get_template_part( 'svg-template/svg', 'circle-news' ) ?></span></p>
						</div>
						<div class="date">
							<p><?php echo get_the_date( 'd M, Y' ) ?></p>
						</div>
				
					</a>
				</article>

				<?php
				endwhile;
			endif;

			// Reset Post Data
			wp_reset_postdata();
			
			?>
		</div>
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

