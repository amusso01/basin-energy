<?php 

/*==================================================================================
Register color paette for guttenberg
==================================================================================*/
function ea_setup() {
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Blue', 'ea-starter' ),
			'slug'  => 'blue',
			'color'	=> '#1BA0FC',
		),
		array(
			'name'  => __( 'Text dark', 'ea-starter' ),
			'slug'  => 'text',
			'color' => '#3E4C5A',
		),
		array(
			'name'  => __( 'Header dark', 'ea-starter' ),
			'slug'  => 'footerBg',
			'color' => '#00192D',
		),
		array(
			'name'  => __( 'Grey', 'ea-starter' ),
			'slug'  => 'grey',
			'color' => '#F5F7FC',
		),
	) );
}
add_action( 'after_setup_theme', 'ea_setup' );

/*==================================================================================
Register new category in guttenberg block
==================================================================================*/

function my_foundry_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'fd-category',
				'title' => __( 'FD Category', 'fd-category' ),
			),
		)
	);
}
add_filter( 'block_categories', 'my_foundry_category', 10, 2);


/*==================================================================================
LOAD CUSTOM ACF-GUTENBERG-BLOCKS
==================================================================================*/
require get_template_directory().'/template-parts/blocks/block-documents.php';
require get_template_directory().'/template-parts/blocks/block-boards.php';
require get_template_directory().'/template-parts/blocks/block-advisers.php';

