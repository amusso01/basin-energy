<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

 $registerNumber = get_field('registered_number' , 'option' );
 $registerAddress = get_field('register_address' , 'option' );

 $email = get_field('email' , 'option');
 $phone = get_field('phone', 'option');

 $social = [];

if(get_theme_mod( 'instagram')){
    $instagram = get_theme_mod( 'instagram');
    $social['instagram'] = $instagram;
}
if(get_theme_mod( 'facebook')){
    $facebook = get_theme_mod('facebook');
    $social['facebook'] = $facebook;
}
if(get_theme_mod( 'linkedin')){
    $linkedin = get_theme_mod( 'linkedin');
    $social['linkedin'] = $linkedin;
}

?>

</div><!-- #content -->

	<footer class="site-footer">
		<div class="site-footer__inner row content-block ">
			<div class="col-md-4 site-footer__item site-footer__left ">

				<div class="site-footer__logo">
					<?php get_template_part( 'svg-template/svg', 'logo-white' ) ?>
				</div>
			
			</div>

			<div class="col-md-4 site-footer__item site-footer__center ">

				<h5>Registerd office</h5>

				<div class="address">
					<p><?php echo $registerAddress ?></p>
				</div>
				<div class="number">
					<p><?php echo $registerNumber ?></p>
				</div>
			

			</div>
			
			<div class="col-md-4 site-footer__item site-footer__right">

				<h5>GET IN TOUCH</h5>

				<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
				<p><?php echo $phone ?></p>

				<div class="site-footer__social">
					<ul>
					<?php foreach($social as $key => $link) : ?>
						<li><a href="" rel="noopener noreferrer" target="_blank" href="<?php echo $link ?>"><?php get_template_part( 'svg-template/svg', $key ) ?></a></li>
					<?php endforeach; ?>
					</ul>
				</div>

			</div>
		</div>
		<div class="site-footer__footer">
			<div class="site-footer__legal">
				<?php get_template_part( 'components/footer/copyright' ) ?>
			</div>
			<div class="site-footer__legal-nav">
				<?php get_template_part( 'components/navigation/footer-nav' ) ?>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
