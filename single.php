<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

$cards = get_field('cards', $page_for_posts);


get_header();
?>
<section class="hero side-menu__hero" style="background-image:url('<?php echo get_the_post_thumbnail_url( $page_for_posts ) ?>')">

</section>

<main role="main" class=" main index-main content-block-smaller">

	<h1><?php echo get_the_title( $page_for_posts  ) ?></h1>
	<div class="index-content">
		<?php echo get_the_content( null, false, $page_for_posts ) ?>
	</div>

<?php

$years = fdPostYear('post');

$cats = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => true,
) );
?>

<ul class="cat-menu" id="categoryMenu">
	<li class="cat-link"><a class='active' href="#" data-slug="all">ALL NEWS</a> </li>
	<?php foreach($cats as $cat) : ?>
	<li class="cat-link"><a href="#"  data-slug="category-<?php echo $cat->slug ?>" data-id="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></a> </li>
	<?php endforeach; ?>
</ul>

<h2 id="pageTitle" class="cat-title">All news</h2>

<div class="index-grid__container">
	<section class="news-container">
		<?php foreach($years as $year) : ?>
			<h3><?php echo $year ?></h3>
			<?php $args = array(
				'post_type' => 'post',
				'year' => $year
			) ;
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				$postId = $the_query->post->ID; 

				
			
				?>
				<article  <?php post_class('fd-single-news active'); ?>>
					<a href="<?php echo get_the_permalink($postId) ?>">
						<div class="news-content">
							<p><?php echo get_the_excerpt( $postId ) ?>  <span><?php get_template_part( 'svg-template/svg', 'circle-news' ) ?></span></p>
						</div>
				
					</a>
				</article>
					
				<?php 

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );
			
			endif;


			wp_reset_postdata();
			
			?>
		<?php endforeach; ?>
		
	</section>
	<aside class="side-cards">
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
	</aside>
</div>
 

</main><!-- #main -->


<?php
get_footer();

