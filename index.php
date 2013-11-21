<?php

/*
Plugin Name: Ebor Shortcodes
Plugin URI: http://www.madeinebor.com
Description: Adds simple shortcodes for use in any WordPress theme.
Version: 1.3
Author: TommusRhodus
Author URI: http://www.madeinebor.com
*/

$theme_name = wp_get_theme();

if( $theme_name == 'ShadowBox' || $theme_name->parent() == 'ShadowBox' ) {
		require_once( plugin_dir_path( __FILE__ ) .'themes/shadowbox.php' );
} elseif( $theme_name == 'Marble' || $theme_name->parent() == 'Marble' ) {
		require_once( plugin_dir_path( __FILE__ ) .'themes/marble.php' );
} elseif( $theme_name == 'Wiretree' || $theme_name->parent() == 'Wiretree' ){
		require_once( plugin_dir_path( __FILE__ ) .'themes/wiretree.php' );
} elseif( $theme_name == 'Other' || $theme_name->parent() == 'Other' || $theme_name == 'New' || $theme_name->parent() == 'New' ){
		require_once( plugin_dir_path( __FILE__ ) .'themes/other.php' );
} else {
		require_once( plugin_dir_path( __FILE__ ) .'themes/seabird.php' );
}