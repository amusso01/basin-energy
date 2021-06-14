<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */



 /*==================================================================================
   Documents download
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/
 if( function_exists('acf_register_block') ) {

 	$result = acf_register_block(array(
 		'name'				     => 'fd_documents',
 		'title'				     => __('Documents File'),
 		'description'		   => __('Documents file downloads'),
 		'render_callback'	 => 'foundry_gutenblock_documents',
 		'category'		     => 'fd-category', // common, formatting, layout, widgets, embed
 		'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#fff ',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#1BA0FC',
            // Specifying a dashicon for the block
            'src' => 'text-page',
            'mode'              => 'edit',
            'align'             => 'full',
            ),
 		'keywords'		     => ['fd', 'documents']
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function foundry_gutenblock_documents() {
    
    
    // Get Vars
    $blockTitle = get_field('block_title');
    $downloadItem = get_field('download_item');

    


    // Return HTML

    ?>

    <section class="block-documents" id="blockDocuments" >
        <h3><?php echo $blockTitle; ?></h3>
        <ul class="download-list">
            <?php foreach($downloadItem as $item ) : ?>
                <li><a href="<?php echo $item['item_link'] ?>"><?php echo $item['item_name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>


<?php
}
