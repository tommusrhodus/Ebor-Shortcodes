<?php

/*
Plugin Name: Ebor Shortcodes
Plugin URI: http://www.madeinebor.com
Description: Adds simple shortcodes for use in any WordPress theme.
Version: 1.3
Author: TommusRhodus
Author URI: http://www.madeinebor.com
*/

switch( wp_get_theme() ) {

	case('ShadowBox') :
		require_once( plugin_dir_path( __FILE__ ) .'/themes/shadowbox.php' );
	break;
	
	case('Seabird') :
		require_once( plugin_dir_path( __FILE__ ) .'/themes/seabird.php' );
	break;
	
	case('Kyte') :
		require_once( plugin_dir_path( __FILE__ ) .'/themes/seabird.php' );
	break;
	
	case('Marble') :
		require_once( plugin_dir_path( __FILE__ ) .'/themes/seabird.php' );
	break;
	
	case('Wiretree') :
		require_once( plugin_dir_path( __FILE__ ) .'/themes/wiretree.php' );
	break;

}