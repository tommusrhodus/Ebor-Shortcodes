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

//BREAK [break]
function seabird_break( $atts, $content = null ) {
   return '<div style="width: 100%; clear: both; height: 40px;"></div><hr /><div style="width: 100%; clear: both; height: 60px;"></div>';
}
add_shortcode('break', 'seabird_break');

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

/*-----------------------------------------------------------------------------------*/
/*	SHORTCODE GENERATOR
/*-----------------------------------------------------------------------------------*/

//SHORTCODE DROP DOWN
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags; $shortcodes_list='';
    /** Any Shortcodes that should be excluded from this list should be added below */
    $exclude = array("wp_caption", "embed", "gallery", "caption", "audio", "video", "template", "rev_slider");
    echo '<select style="float:right;margin-right:15px;position:relative;top:5px;height:20px;" id="sc_select">
    <option>Insert Shortcode...</option>';
    foreach ($shortcode_tags as $key => $val){
            if(!in_array($key,$exclude)){
            	if($key=='blockquote'){
            		$output = "[blockquote author='John Doe']Content[/blockquote]";
            	} elseif($key=='button'){
            		$output = "[button link='google.com' size='large' color='blue' target='blank']Link Text[/button]";
            	} elseif($key=='clear'){
            		$output = "[clear]";
            	} elseif($key=='break'){
            		$output = "[break]";
            	} elseif($key=='highlight'){
            		$output = "[highlight]Content[/highlight]";
            	} elseif($key=='dropcap'){
            		$output = "[dropcap]Content[/dropcap]";
            	} elseif($key=='social_group'){
            		$output = "[social_group][social_icon link='google.com' target='blank' icon='facebook'][/social_group]";
            	} elseif($key=='social_icon'){
            		$output = "[social_icon link='google.com' target='blank' icon='facebook']";
            	} else {
            	 $option = "[$key][/$key]";
            	}
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