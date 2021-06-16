<?php
/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* Copyright
/––––––––––––––––––––––––*/
function copyright() {
  return '&copy;  <span class="copyright-site-name">' . get_bloginfo('name') . ' ' . date('Y') . '</span>';
}
add_shortcode('copyright', 'copyright');


/* Get all year of the post
/––––––––––––––––––––––––*/
  
function fdPostYear($cpt){
  $terms_year = array(
    'post_type'         => array($cpt),
);

$years = array();
$query_year = new WP_Query( $terms_year );

if ( $query_year->have_posts() ) :
    while ( $query_year->have_posts() ) : $query_year->the_post();
        $year = get_the_date('Y');
        if(!in_array($year, $years)){
            $years[] = $year;
        }
    endwhile;
    wp_reset_postdata();
endif;

return $years;
}