<?php
/**
 * The index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */
$page_for_posts = get_option( 'page_for_posts' );

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
	<!-- <li class="cat-link"><a class='active' href="#" data-slug="all">ALL NEWS</a> </li> -->
	<?php foreach($cats as $key=>$cat) : ?>

	<li class="cat-link"><a href="#" class="<?php echo $key === 0 ? 'active' : '' ?>" data-name="<?php echo $cat->name ?>"  data-slug="category-<?php echo $cat->slug ?>" data-id="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></a> </li>
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

				$isPDF = get_field('is_pdfdoc_news' , $postId);

				if($isPDF):
					$pdfLink = get_field('link', $postId);
				endif;

				?>
				<article  <?php post_class('fd-single-news active'); ?>>
					<a href="<?php echo $isPDF ? $pdfLink : get_the_permalink($postId) ?>" <?php echo $isPDF ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
						<div class="news-content">
							<p><?php echo get_the_title( $postId ) ?>  <span><?php get_template_part( 'svg-template/svg', 'circle-news' ) ?></span></p>
              <p class="news-excerpt" style="margin-top:5px;font-size:15px;"> <?php echo get_the_excerpt( $postId ) ?>  </p>
						</div>

						<div class="date">
							<p><?php echo get_the_date( 'd M Y' ) ?></p>
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
