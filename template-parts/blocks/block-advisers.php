<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */



 /*==================================================================================
   Borad download
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/
 if( function_exists('acf_register_block') ) {

 	$result = acf_register_block(array(
 		'name'				     => 'fd_advisers',
 		'title'				     => __('Advisers & Registrars'),
 		'description'		   => __('Adviser logo and text'),
 		'render_callback'	 => 'foundry_gutenblock_adviser',
 		'category'		     => 'fd-category', // common, formatting, layout, widgets, embed
 		'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#fff ',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#1BA0FC',
            // Specifying a dashicon for the block
            'src' => 'id',
            'mode'              => 'edit',
            'align'             => 'full',
            ),
 		'keywords'		     => ['fd', 'adviser']
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function foundry_gutenblock_adviser() {
    
    
    // Get Vars
   $name = get_field('adviser_name');
   $logo = get_field('adviser_logo');
   $subtitle = get_field('adviser_sub_title');
   $address = get_field('adviser_address');
   $link = get_field('adviser_link');


    


    // Return HTML

    ?>

    <section class="block-adviser" id="blockAdviser" >
       <div class="adviser-logo">
         <a href="<?php echo $link ?>">
            <img src="<?php echo $logo ?>" alt="<?php echo $name ?> Logo">
         </a>
       </div>
       <div class="adviser-bio">
        <h2><?php echo $name ?></h2>
        <p class="role"><?php echo $subtitle ?></p>
        <p class="address"><?php echo $address ?></p>
       </div>
    </section>


<?php
}
