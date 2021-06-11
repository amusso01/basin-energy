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
