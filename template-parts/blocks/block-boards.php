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
 		'name'				     => 'fd_board',
 		'title'				     => __('Board Member'),
 		'description'		   => __('Rappresent a board member'),
 		'render_callback'	 => 'foundry_gutenblock_board',
 		'category'		     => 'fd-category', // common, formatting, layout, widgets, embed
 		'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#fff ',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#1BA0FC',
            // Specifying a dashicon for the block
            'src' => 'admin-users',
            'mode'              => 'edit',
            'align'             => 'full',
            ),
 		'keywords'		     => ['fd', 'board']
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function foundry_gutenblock_board() {
    
    
    // Get Vars
    $memberPicture = get_field('member_picture');
    $memberName = get_field('member_name');
    $memberRole = get_field('member_role');
    $memberPageObj = get_field('member_link_to_page');

    $memberPageId = $memberPageObj[0]->ID;
    $excerpt = get_the_excerpt( $memberPageId );
    $link = get_the_permalink( $memberPageId );


    


    // Return HTML

    ?>

    <section class="block-board" id="blockBoard" >
       <div class="member-picture">
        <img src="<?php echo $memberPicture ?>" alt="<?php echo $memberName ?> Picture">
       </div>
       <div class="member-bio">
        <h2><?php echo $memberName ?></h2>
        <p class="role"><?php echo $memberRole ?></p>
        <p class="excerpt"><?php echo $excerpt ?></p>
        <a href="<?php echo $link ?>">Read Bio</a>
       </div>
    </section>


<?php
}
