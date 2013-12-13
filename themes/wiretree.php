<?php 
/*-----------------------------------------------------------------------------------*/
/*	REGISTER SHORTCODES
/*-----------------------------------------------------------------------------------*/

//Button [button link='google.com' size='large' color='blue' target='blank']Link Text[/button]
function wiretree_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => '',
		'color' => 'blue',
		'target' => ''
	), $atts));
	if($size == 'large') $size = 'big';
	if($target == 'blank') $target = 'target="_blank"';
    return '<a href="' . esc_url($link) . '" '.$target.' class="button '.$size.' '.$color.'">' . $content . '</a>';
}
add_shortcode('button', 'wiretree_button');

//BLOCKQUOTE [blockquote author='John Doe']Content[/blockquote]
function wiretree_blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author' => ''
	), $atts));
   return '<blockquote>' . do_shortcode($content) . '<small>'.$author.'</small></blockquote>';
}
add_shortcode('blockquote', 'wiretree_blockquote');

//CLEAR [clear]
function wiretree_clear( $atts, $content = null ) {
   return '<div class="divide20"></div>';
}
add_shortcode('clear', 'wiretree_clear');

//HIGHLIGHT [highlight]Content[/highlight]
function wiretree_highlight( $atts, $content = null ) {
   return '<span class="lite1">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'wiretree_highlight');

//HIGHLIGHT [highlight_alt]Content[/highlight_alt]
function wiretree_highlight_1( $atts, $content = null ) {
   return '<span class="lite2">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_alt', 'wiretree_highlight_alt');

//DROPCAP [dropcap]Content[/dropcap]
function wiretree_dropcap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'wiretree_dropcap');

//Social Group [social_group]Content[/social_group]
function wiretree_social_group( $atts, $content = null ) {
   return '<ul class="social">' . do_shortcode($content) . '</ul>';
}
add_shortcode('social_group', 'wiretree_social_group');

//Social Icon [social_icon link='google.com' target='blank' icon='facebook']
function wiretree_social_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'target' => '',
		'icon' => ''
	), $atts));
	if($target == 'blank') $target = 'target="_blank"';
    return '<li><a href="'.esc_url($link).'" '.$target.'><i class="icon-s-'.$icon.'"></i></a></li>';
}
add_shortcode('social_icon', 'wiretree_social_icon');



/*-----------------------------------------------------------------------------------*/
/*	SHORTCODE GENERATOR
/*-----------------------------------------------------------------------------------*/

//SHORTCODE DROP DOWN
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags; 
    $shortcodes_list='';
    /** Any Shortcodes that should be excluded from this list should be added below */
    $exclude = array('blockquote', 'button','clear', 'highlight', 'highlight_alt', 'dropcap', 'social_group', 'social_icon');
    echo '<select style="float:right;margin-right:15px;position:relative;top:5px;height:20px;" id="sc_select">
    <option>Insert Shortcode...</option>';
    foreach ($shortcode_tags as $key => $val){
            if(in_array($key,$exclude)){
            	if($key=='blockquote'){ $output = "[blockquote author='John Doe']Content[/blockquote]"; }
            	if($key=='button'){ $output = "[button link='google.com' size='large' color='blue' target='blank']Link Text[/button]"; }
            	if($key=='clear'){ $output = "[clear]"; }
            	if($key=='highlight'){ $output = "[highlight]Content[/highlight]"; }
            	if($key=='highlight_alt'){ $output = "[highlight_alt]Content[/highlight_alt]"; }
            	if($key=='dropcap'){ $output = "[dropcap]Content[/dropcap]"; }
            	if($key=='social_group'){ $output = "[social_group][social_icon link='google.com' target='blank' icon='facebook'][/social_group]"; }
            	if($key=='social_icon'){ $output = "[social_icon link='google.com' target='blank' icon='facebook']"; }
            $shortcodes_list .= '<option value="'.$output.'">'.$key.'</option>';
            }
        }
     echo $shortcodes_list;
     echo '</select>';
}

add_action('admin_head', 'button_js');
function button_js() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#sc_select").change(function() {
            send_to_editor(jQuery("#sc_select :selected").val());
                return false;
            });
        });
    </script>';
}