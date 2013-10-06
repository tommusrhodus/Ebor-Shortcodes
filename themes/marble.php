<?php 
/*-----------------------------------------------------------------------------------*/
/*	REGISTER SHORTCODES
/*-----------------------------------------------------------------------------------*/

//Button [button link='google.com' size='large' color='blue' target='blank']Link Text[/button]
function seabird_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => '',
		'color' => 'blue',
		'target' => ''
	), $atts));
	if($size == 'large') $size = 'btn-large';
	if($target == 'blank') $target = 'target="_blank"';
    return '<a href="' . esc_url($link) . '" '.$target.' class="btn '.$size.' btn-'.$color.'">' . $content . '</a>';
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

//CLEAR [clear]
function seabird_clear( $atts, $content = null ) {
   return '<div class="divide20"></div>';
}
add_shortcode('clear', 'seabird_clear');

//HIGHLIGHT [highlight]Content[/highlight]
function seabird_highlight( $atts, $content = null ) {
   return '<span class="lite">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'seabird_highlight');

//DROPCAP [dropcap]Content[/dropcap]
function seabird_dropcap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'seabird_dropcap');

//Social Group [social_group]Content[/social_group]
function seabird_social_group( $atts, $content = null ) {
   return '<ul class="social">' . do_shortcode($content) . '</ul>';
}
add_shortcode('social_group', 'seabird_social_group');

//Social Icon [social_icon link='google.com' target='blank' icon='facebook']
function seabird_social_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'target' => '',
		'icon' => ''
	), $atts));
	if($target == 'blank') $target = 'target="_blank"';
    return '<li><a href="'.esc_url($link).'" '.$target.'><i class="icon-s-'.$icon.'"></i></a></li>';
}
add_shortcode('social_icon', 'seabird_social_icon');