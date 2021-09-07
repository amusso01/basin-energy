<?php
/**
 * The template for displaying frontpage by default
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

 $heroHeading = get_field('heading'); 
 $heroSubheading = get_field('sub_heading'); 
 $heroButton = get_field('button'); 
 $heroBtngroup = get_field('button_group'); 
 $bigCard = get_field('big_card'); 
 $solidCard = get_field('solid_card'); 
 $smallCard = get_field('small_card'); 
 $reportImage = get_field('image'); 
 $reportLink = get_field('link'); 

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

<section class="home__hero" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">
	<div class="hero-container">
		<div class="overlay-text">
			<h1><?php echo $heroHeading ?></h1>
			<p class="subheading"><?php echo $heroSubheading ?></p>
			<a href="<?php echo $heroButton['url'] ?>"><?php echo $heroButton['title'] ?></a>
		</div>
	
		<div class="btn-group">
		
			<a class="button-single" href="<?php echo $heroBtngroup['blue_button']['url'] ?>">
				<div class="overlay"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
				<p><?php echo $heroBtngroup['blue_button']['title'] ?></p>	
				<span>Read more</span>
			</a>
			<a class="button-single" href="<?php echo $heroBtngroup['white_button']['url'] ?>">
				<div class="overlay"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
				<p><?php echo $heroBtngroup['white_button']['title'] ?></p>	
				<span>View all</span>
			</a>
		
		</div>
	</div>

</section>

<main class="main homepage-main" role="main">

	<section class="editor-content content-block-smaller">
		<div class="editor-content__container">
			<p class="site-name">Basin Energy <span>One</span></p>
		</div>
		<div class="editor-content__container">
			<?php the_content() ?>
		</div>
	</section>

	<section class="key-announcements">
		<div class="content-block-smaller key-announcements__grid"  >

			<div class="key-announcements__single">
				<h2>Key Announcements</h2>

				<?php 
				$the_query = new WP_Query( $args ); 
				
				// The Loop
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); $postId = $the_query->post->ID;  ?>
				<article  <?php post_class('fd-single-news active'); ?>>
					<a href="<?php echo get_the_permalink($postId) ?>">
						<div class="news-content">
							<p><?php echo get_the_title( $postId ) ?>  <span><?php get_template_part( 'svg-template/svg', 'circle-news' ) ?></span></p>
						</div>

						<div class="date">
							<p><?php echo get_the_date( 'd M Y' ) ?></p>
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
			<div class="key-announcements__single">
        <?php  if($reportImage) : ?>
				<aside class="report">
					<img src="<?php echo $reportImage ?>" alt="latest report">
					<a href="<?php echo $reportLink['url']?>">
					<div class="overlay"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
					<?php echo $reportLink['title']?>
					<span>View</span>
					</a>
				</aside>
        <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cards-section">
		<a href="<?php echo $bigCard['link']['url']  ?>" class="single-card single-card__big" style="background-image:url('<?php echo $bigCard['image'] ?>')">
			<div class="hover"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
			<div class="single-card__text">
				<p><?php echo $bigCard['link']['title']  ?> <span>Read more</span></p>
				<p><?php echo $bigCard['text'] ?></p>
				<p class="read-more-mobile">Read more</p>
			</div>	
		</a>
		<a class="single-card single-card__solid" style="background-color:<?php echo  $solidCard['background_color'] ?>">
			<!-- <div class="hover"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div> -->
			<!-- <p class="white"><?php echo $solidCard['link']['title']  ?></p> -->
      <p class="tick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.6 25.05"><defs><style>.tick{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:3px;}</style></defs><title>tick</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><polyline class="tick" points="1.5 13.99 11.05 23.55 33.1 1.5"/></g></g></svg> Proven industry experience</p>
      <p class="tick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.6 25.05"><defs><style>.tick{fill:none;stroke:#ffffff;sstroke-linecap:round;stroke-linejoin:round;stroke-width:3px;}</style></defs><title>tick</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><polyline class="tick" points="1.5 13.99 11.05 23.55 33.1 1.5"/></g></g></svg> Modern exploration techniques</p>
      <p class="tick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.6 25.05"><defs><style>.tick{fill:none;stroke:#ffffff;s;stroke-linecap:round;stroke-linejoin:round;stroke-width:3px;}</style></defs><title>tick</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><polyline class="tick" points="1.5 13.99 11.05 23.55 33.1 1.5"/></g></g></svg> Intelligent and coherent ESG approach</p>
    </a>
		<a href="<?php echo $smallCard['link']['url']  ?>" class="single-card single-card__small" style="background-image:url('<?php echo $smallCard['image'] ?>')">
			<div class="hover"><?php get_template_part( 'svg-template/svg', 'hover' ) ?></div>
			<div class="single-card__text">
				<p class="span-full"><?php echo $smallCard['link']['title']  ?> <span class="display">Read more</span></p>
			</div>	
		</a>
	</section>

</main>

<?php get_footer(); ?>
