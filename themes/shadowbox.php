<?php 
/*-----------------------------------------------------------------------------------*/
/*	REGISTER SHORTCODES
/*-----------------------------------------------------------------------------------*/

//BLOCKQUOTE
function ebor_blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author' => ''
	), $atts));	
   return '<blockquote><i class="icon-quote-left icon-4x pull-left icon-muted"></i>' . do_shortcode($content) . '<span>' . $author . '</span></blockquote><div class="clear break"></div>';
}
add_shortcode('blockquote', 'ebor_blockquote');

//BUTTON
function ebor_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => '',
		'icon' => '',
		'icon_location' => 'right'
	), $atts));	
	
   $output = '';
   $output .= '<a href="'.esc_url($link).'" class="'.$size.' '.$icon_location.' shadowbox-button">';
   if($icon_location == 'left'){
   		if($icon) $output .= '<i class="'.$icon.'"></i> ';
   		$output .= $content;
   } elseif($icon_location == 'right') {
   		$output .= $content;
   		if($icon) $output .= ' <i class="'.$icon.'"></i>';
   } else {
   		$output .= $content;
   }
   $output .= '</a>';
   
   return $output;
}
add_shortcode('button', 'ebor_button');


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
            	if($key=='blockquote'){ $output = "[blockquote author='Mr. John Doe']This could be a blockquote.[/blockquote]"; }
            	if($key=='button'){ $output = "[button link='google.com' size='huge' icon='icon-heart' icon_location='right']Button[/button]"; }
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