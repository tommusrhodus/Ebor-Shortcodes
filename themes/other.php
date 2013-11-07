<?php 
/*-----------------------------------------------------------------------------------*/
/*	REGISTER SHORTCODES
/*-----------------------------------------------------------------------------------*/

//Button [button link='google.com' size='large' color='blue' target='blank']Link Text[/button]
function seabird_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => '',
		'color' => 'white',
		'target' => '',
		'glossy' => ''
	), $atts));
	if($target == 'blank') $target = 'target="_blank"';
    return '<a href="' . esc_url($link) . '" '.$target.' class="button '.$size.' '.$glossy.' '.$color.'">' . $content . '</a>';
}
add_shortcode('button', 'seabird_button');

//BLOCKQUOTE [blockquote author='John Doe']Content[/blockquote]
function seabird_blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author' => ''
	), $atts));
   return '<blockquote>' . do_shortcode($content) . '<small>'.$author.'</small></blockquote>';
}
add_shortcode('blockquote', 'seabird_blockquote');