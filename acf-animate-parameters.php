<?php

/*
 * Plugin Name: ACF: Animate.css Effects
 * Plugin URI: https://github.com/Thomas-A-Reinert/acf-animatecss
 * Description: ACF field to catch settings for Animate.css like effect to use, animation speed and start delay.
 * Version: 0.1
 * Author: Thomas A. Reinert, TAR MediaDesign
 * Author URI: https://www.tarcgn.de/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-animatecss', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_animate_parameters( $version ) {
	
	include_once('acf-animatecss-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_animate_parameters');	
?>