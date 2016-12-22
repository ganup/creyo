<?php
// =============================== Klasik Call To Action widget ======================================
class Klasik_CallToActionWidget extends WP_Widget {
    /** constructor */

	function Klasik_CallToActionWidget() {
		$widget_ops = array('classname' => 'widget_klasik_action', 'description' => __('KlasikThemes CallToAction','klasik') );
		$this->WP_Widget('klasik-action-widget', __('KlasikThemes CallToAction','klasik'), $widget_ops);
	}


  /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title 			= apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$subtitle 			= apply_filters('widget_subtitle', empty($instance['subtitle']) ? '' : $instance['subtitle']);
		$buttext1 			= apply_filters('widget_buttext1', empty($instance['buttext1']) ? '' : $instance['buttext1']);
		$buturl1 			= apply_filters('widget_buturl1', empty($instance['buturl1']) ? '' : $instance['buturl1']);
		$text 				= apply_filters('widget_text', empty($instance['text']) ? '' : $instance['text']);
		$buttext2 			= apply_filters('widget_buttext2', empty($instance['buttext2']) ? '' : $instance['buttext2']);
		$buturl2 			= apply_filters('widget_buturl2', empty($instance['buturl2']) ? '' : $instance['buturl2']);
		$customclass 		= apply_filters('widget_customclass', empty($instance['customclass']) ? '' : $instance['customclass']);
		$linkbut 		= isset($instance['linkbut']) ? $instance['linkbut'] : false;
		$wpautop		= isset($instance['wpautop']) ? $instance['wpautop'] : false;
		
		$show_advanced_option	= isset($instance['show_advanced_option']) ? $instance['show_advanced_option'] : false;
		$layout 				= apply_filters('widget_layout', empty($instance['layout']) ? '' : $instance['layout']);
		$spacingtop 			= apply_filters('widget_spacingtop', empty($instance['spacingtop']) ? '' : $instance['spacingtop']);
		$spacingbottom 			= apply_filters('widget_spacingbottom', empty($instance['spacingbottom']) ? '' : $instance['spacingbottom']);
		$spacingside 			= apply_filters('widget_spacingside', empty($instance['spacingside']) ? '' : $instance['spacingside']);
		$border_top 			= apply_filters('widget_border_top', empty($instance['border_top']) ? '' : $instance['border_top']);
		$border_bottom 			= apply_filters('widget_border_bottom', empty($instance['border_bottom']) ? '' : $instance['border_bottom']);
		
		$customize_background	= isset($instance['customize_background']) ? $instance['customize_background'] : false;
		$background_image		= apply_filters('widget_background_image', empty($instance['background_image']) ? '' : $instance['background_image']);
		$background_color		= apply_filters('widget_background_color', empty($instance['background_color']) ? '' : $instance['background_color']);
		$background_repeat		= apply_filters('widget_background_repeat', empty($instance['background_repeat']) ? '' : $instance['background_repeat']);
		$background_position	= apply_filters('widget_background_position', empty($instance['background_position']) ? '' : $instance['background_position']);
		$background_attachment	= apply_filters('widget_background_attachment', empty($instance['background_attachment']) ? '' : $instance['background_attachment']);
		$background_size		= apply_filters('widget_background_size', empty($instance['background_size']) ? '' : $instance['background_size']);
		$background_opacity		= apply_filters('widget_background_opacity', empty($instance['background_opacity']) ? '' : $instance['background_opacity']);
		
		$disabletext = false;
		
        if ( $customclass ) {
            $before_widget = str_replace('class="', 'class="'. $customclass . ' ', $before_widget);
        }  

        			 echo $before_widget; 
					 
					 $spacing_left_right = '';
					 $spacing_top_bottom = '';
					 $border = '';

					 if($show_advanced_option){
						 if($border_top){
							$border .= 'border-top:'.$border_top.'; ';
						 }
						 
						 if($border_bottom){
							$border .= 'border-bottom:'.$border_bottom.'; ';
						 }
	
						 if($spacingtop){
							$spacing_top_bottom .= 'padding-top:'.$spacingtop.'; ';
						 }
						 
						 if($spacingbottom){
							$spacing_top_bottom .= 'padding-bottom:'.$spacingbottom.'; ';
						 }
						 
						 if($spacingside){
							$spacing_left_right .= 'padding-left:'.$spacingside.'; ';
							$spacing_left_right .= 'padding-right:'.$spacingside.'; ';
						 }
					 }

				
					$bgcolor_rgba='';
					$bgopacity ='';
					
					if($background_opacity != "default"	){
						$bgopacity = $background_opacity;
					}
					
					$klasik_color = $background_color;
					$rgb = klasik_hex2rgba($klasik_color);
					$rgba = klasik_hex2rgba($klasik_color, $bgopacity);
					
					$background='';
					 if($customize_background){
						if($background_color){
						$bgcolor_rgba 		= 'background-color:'.$rgba.'; ';
						}
						
						if($background_image){
					 	$background .= 'background-image:url('.$background_image.'); ';
						}

						if($background_repeat != "default"){
						$background	.= 'background-repeat:'.$background_repeat.'; ';
						}
						if($background_position != "default"){
						$background .= 'background-position:'.$background_position.'; ';
						}
						if($background_attachment != "default"){
						$background	.= 'background-attachment:'.$background_attachment.'; ';
						}
						if($background_size != "default"){
						$background	.= 'background-size:'.$background_size.'; ';
						}
					 }	
					 
					 $layoutcss='';
					 if( $layout == 'fullwidth'){$layoutcss = 'fullwidth';} else {$layoutcss = 'boxed';}
					 
					 echo '<div class="all-widget-container  '.$layoutcss.'" style="'.$background.' '.$border.' ">';
					 
					 
					 echo '<div class="opacity" style="'.$bgcolor_rgba.'">';
					 
					 
					 echo '<div class="all-widget-wrapper" style="'.$spacing_top_bottom.'">';
					 
					 if( $layout == 'fullwidth'){} else{
					 echo '
                		<div class="container">
                    	<div class="row">
                        <div class="twelve columns">
					 ';
					 }
					 
					 echo '<div class="klasik-action-widget-wrapper"  style="'.$spacing_left_right.'">';
						
					$output = "";

					$output .='<div class="klasik-action-widget">';

						
							$tpl = '<div class="item-container">';
								$tpl .= '%%TITLE%% %%SUBTITLE%% %%TEXT%%';
								$tpl .= '<div class="action-button">%%BUTTON1%% %%BUTTON2%%</div>';
								$tpl .= '<div class="clear"></div>';
							$tpl .= '</div>';
							
							
							$tpl = apply_filters( 'klasik_actions_item_template', $tpl );
							

								
								$template = $tpl;
								
								
								//TITLE
								$maintitle  = '';
								if($title){
								$maintitle .= '<h1>'.$title.'</h1>';
								}
								$template = str_replace( '%%TITLE%%', $maintitle, $template );

								//SUBTITLE
								$maintitle  = '';
								if($subtitle){
								$maintitle .= '<h2>'.$subtitle.'</h2>';
								}
								$template = str_replace( '%%SUBTITLE%%', $maintitle, $template );
								
								// MAINTEXT
								$maintext = '';
								if($text){
								if($wpautop == "on") { $text = wpautop($text); }
								$maintext .= '<div class="text">'.$text.'</div>';
								}
								$template = str_replace( '%%TEXT%%', $maintext, $template );
								
								//POST-DAY
								$postday  = '';
								$postday .= get_the_time( 'd' );
								$template   = str_replace( '%%DAY%%', $postday, $template );
								
								//POST-MONTH
								$postmonth  = '';
								$postmonth .= get_the_time('M');
								$template   = str_replace( '%%MONTH%', $postmonth, $template );
								
								//POST-YEAR
								$postyear  = '';
								$postyear .= get_the_time('Y');
								$template   = str_replace( '%%YEAR%', $postyear, $template );
									
								
								// BUTTON1
								$mainbuttext1 = '';
								if($linkbut){
									$external = 'target="_blank"';
								}else{
									$external = '';
								}
								if($buttext1){
									$mainbuttext1 .= '<a href="' . $buturl1 . '" title="' . $buttext1 . '" ' . $external . ' class="button left">' . $buttext1 . '</a>';
								}
								$template = str_replace( '%%BUTTON1%%', $mainbuttext1, $template );
								

								// BUTTON2 
								$mainbuttext2 = '';
								if($linkbut){
									$external = 'target="_blank"';
								}else{
									$external = '';
								}
								if($buttext2){
									$mainbuttext2 .= '<a href="' . $buturl2 . '" title="' . $buttext2 . '" ' . $external . ' class="button right">' . $buttext2 . '</a>';	
								}
								$template = str_replace( '%%BUTTON2%%', $mainbuttext2, $template );
								

								$output .= $template;
								

						$output.='<div class="clear"></div>';
					$output .='</div>';
						 
					echo do_shortcode($output);
					
					echo '<div class="clear"></div></div>';
					
					if( $layout == 'fullwidth'){} else{
						echo '                        
						</div>
                    	</div>
                		</div>';
					}
					
				
					echo '<div class="clear"></div></div>';
					
					echo '<div class="clear"></div></div>';
					echo '<div class="clear"></div></div>';
					
					
					echo $after_widget; 

    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				

        $instance = $old_instance;
   
    	$instance['title'] 					= strip_tags($new_instance['title']);
		$instance['subtitle'] 				= strip_tags($new_instance['subtitle']);
        if ( current_user_can('unfiltered_html') )
            $instance['text'] =  $new_instance['text'];
        else
            $instance['text'] = wp_filter_post_kses($new_instance['text']);
		$instance['wpautop'] 				= strip_tags($new_instance['wpautop']);
		$instance['buttext1'] 				= strip_tags($new_instance['buttext1']);
		$instance['buturl1'] 				= esc_url($new_instance['buturl1']);
		$instance['buttext2'] 				= strip_tags($new_instance['buttext2']);
		$instance['buturl2'] 				= esc_url($new_instance['buturl2']);
		$instance['customclass'] 			= strip_tags($new_instance['customclass']);
		$instance['linkbut'] 				= strip_tags($new_instance['linkbut']);
		
		$instance['show_advanced_option'] 	= isset($new_instance['show_advanced_option']) ? $new_instance['show_advanced_option'] : false;
		$instance['layout'] 				= strip_tags($new_instance['layout']);
		$instance['spacingtop'] 			= strip_tags($new_instance['spacingtop']);
		$instance['spacingbottom'] 			= strip_tags($new_instance['spacingbottom']);
		$instance['spacingside'] 			= strip_tags($new_instance['spacingside']);
		$instance['border_top'] 			= strip_tags($new_instance['border_top']);
		$instance['border_bottom'] 			= strip_tags($new_instance['border_bottom']);
		
		$instance['customize_background'] 	= isset($new_instance['customize_background']) ? $new_instance['customize_background'] : false;
		$instance['background_image'] 		= esc_url($new_instance['background_image']);
		$instance['background_color'] 		= strip_tags($new_instance['background_color']);
		$instance['background_repeat'] 		= strip_tags($new_instance['background_repeat']);
		$instance['background_position'] 	= strip_tags($new_instance['background_position']);
		$instance['background_attachment'] 	= strip_tags($new_instance['background_attachment']);
		$instance['background_size'] 		= strip_tags($new_instance['background_size']);
		$instance['background_opacity'] 	= strip_tags($new_instance['background_opacity']);

		
    	return $instance;
		
    }

    /** @see WP_Widget::form */
    function form($instance) {			
        $title = isset($instance['title']) ? esc_attr($instance['title']) : "";
		$subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : "";
		$buttext1 = isset($instance['buttext1']) ? esc_attr($instance['buttext1']) : "";
		$buturl1 = isset($instance['buturl1']) ? esc_attr($instance['buturl1']) : "";
		$buttext2 = isset($instance['buttext2']) ? esc_attr($instance['buttext2']) : "";
		$buturl2 = isset($instance['buturl2']) ? esc_attr($instance['buturl2']) : "";
		$customclass = isset($instance['customclass']) ? esc_attr($instance['customclass']) : "";
		
		$instance['linkbut'] = (isset($instance['linkbut']))? $instance['linkbut'] : "";
		
		$text 		= isset($instance['text']) ? esc_attr($instance['text']) : "";
		$wpautop 	= isset($instance['wpautop']) ? esc_attr($instance['wpautop']) : "";
		$linkbut 	= isset($instance['linkbut']) ? esc_attr($instance['linkbut']) : "";
		
		$show_advanced_option = isset($instance['show_advanced_option']) ? esc_attr($instance['show_advanced_option']) : "";
		$instance['layout'] 				= (isset($instance['layout']))? $instance['layout'] : "";
		$instance['spacingtop'] 			= (isset($instance['spacingtop']))? $instance['spacingtop'] : "";
		$instance['spacingbottom'] 			= (isset($instance['spacingbottom']))? $instance['spacingbottom'] : "";
		$instance['spacingside'] 			= (isset($instance['spacingside']))? $instance['spacingside'] : "";
		$instance['border_top'] 			= (isset($instance['border_top']))? $instance['border_top'] : "";
		$instance['border_bottom'] 			= (isset($instance['border_bottom']))? $instance['border_bottom'] : "";
		
		$customize_background = isset($instance['customize_background']) ? esc_attr($instance['customize_background']) : "";
		$instance['background_image'] 		= (isset($instance['background_image']))? $instance['background_image'] : "";
		$instance['background_color'] 		= (isset($instance['background_color']))? $instance['background_color'] : "";
		$instance['background_repeat'] 		= (isset($instance['background_repeat']))? $instance['background_repeat'] : "";
		$instance['background_position'] 	= (isset($instance['background_position']))? $instance['background_position'] : "";
		$instance['background_attachment'] 	= (isset($instance['background_attachment']))? $instance['background_attachment'] : "";
		$instance['background_size'] 		= (isset($instance['background_size']))? $instance['background_size'] : "";
		$instance['background_opacity'] 	= (isset($instance['background_opacity']))? $instance['background_opacity'] : "";

		
		
		$layout 				= esc_attr($instance['layout']);
		$spacingtop 			= esc_attr($instance['spacingtop']);
		$spacingbottom 			= esc_attr($instance['spacingbottom']);
		$spacingside 			= esc_attr($instance['spacingside']);
		$border_top 			= esc_attr($instance['border_top']);
		$border_bottom			= esc_attr($instance['border_bottom']);

		$background_image 		= esc_attr($instance['background_image']);
		$background_color 		= esc_attr($instance['background_color']);
		$background_repeat 		= esc_attr($instance['background_repeat']);
		$background_position 	= esc_attr($instance['background_position']);
		$background_attachment 	= esc_attr($instance['background_attachment']);
		$background_size 		= esc_attr($instance['background_size']);
		$background_opacity 	= esc_attr($instance['background_opacity']);
		
		
        ?>
        
			<style type="text/css">
                i { font-size:11px;}
            </style>
            
			<script type="text/javascript">				
				jQuery(document).ready(function($){
					$('.my-color-field').wpColorPicker();
				});
            </script>
        
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
            <p><label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Sub Title:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" /></label></p>
                        
            <p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'klasik'); ?> <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="10"><?php echo $text; ?></textarea>	</label></p>
            <p>
                <input id="<?php echo $this->get_field_id('wpautop'); ?>" name="<?php echo $this->get_field_name('wpautop'); ?>" type="checkbox"<?php if($wpautop == "on") echo " checked='checked'"; ?>>&nbsp;
                <label for="<?php echo $this->get_field_id('wpautop'); ?>">Automatically add paragraphs</label>
            </p>
            <p><label for="<?php echo $this->get_field_id('buttext1'); ?>"><?php _e('Button1 Text:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('buttext1'); ?>" name="<?php echo $this->get_field_name('buttext1'); ?>" type="text" value="<?php echo $buttext1; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('buturl1'); ?>"><?php _e('Button1 URL:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('buturl1'); ?>" name="<?php echo $this->get_field_name('buturl1'); ?>" type="text" value="<?php echo $buturl1; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('buttext2'); ?>"><?php _e('Button2 Text:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('buttext2'); ?>" name="<?php echo $this->get_field_name('buttext2'); ?>" type="text" value="<?php echo $buttext2; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('buturl2'); ?>"><?php _e('Button2 URL:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('buturl2'); ?>" name="<?php echo $this->get_field_name('buturl2'); ?>" type="text" value="<?php echo $buturl2; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('customclass'); ?>"><?php _e('Custom Class:', 'klasik'); ?> <input class="widefat" id="<?php echo $this->get_field_id('customclass'); ?>" name="<?php echo $this->get_field_name('customclass'); ?>" type="text" value="<?php echo $customclass; ?>" /></label></p>
            
            <p>
				
                <input type="checkbox" name="<?php echo $this->get_field_name('linkbut'); ?>" id="<?php echo $this->get_field_id('linkbut'); ?>" <?php if($linkbut == "on") echo " checked='checked'"; ?> />						
                <label for="<?php echo $this->get_field_id('linkbut'); ?>"><?php _e('Open URL to new window', 'klasik'); ?> </label></p>



			<p>
                <input name="<?php echo $this->get_field_name('show_advanced_option'); ?>" id="<?php echo $this->get_field_id('show_advanced_option'); ?>" type="checkbox" <?php if($show_advanced_option == "on") echo " checked='checked'"; ?> onchange="showAdvancedOps(this)"/>					
                <label for="<?php echo $this->get_field_id('show_advanced_option'); ?>"><?php _e(' Show Advanced Option', 'klasik'); ?> </label>
            </p>   
            
            <div <?php if ( $show_advanced_option == false ) { echo 'style="display:none;"'; } ?> class="hidden_options">         
            
                <p>
                <label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('Layout Type:', 'klasik'); ?></label><br />
                <select id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" class="widefat" style="width:50%;">
                    <?php foreach($this->get_layout_options() as $k => $v ) { ?>
                        <option <?php selected( $instance['layout'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                    <?php } ?>      
                </select></p>
    
                <p>
                <label for="<?php echo $this->get_field_id('spacingtop'); ?>"><?php _e('Spacing Top:', 'klasik'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('spacingtop'); ?>" name="<?php echo $this->get_field_name('spacingtop'); ?>" type="text" value="<?php echo $spacingtop; ?>" /></label>
                <i><?php _e('example: 10px', 'klasik'); ?> </i></p>
                
                <p>
                <label for="<?php echo $this->get_field_id('spacingbottom'); ?>"><?php _e('Spacing Bottom:', 'klasik'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('spacingbottom'); ?>" name="<?php echo $this->get_field_name('spacingbottom'); ?>" type="text" value="<?php echo $spacingbottom; ?>" /></label>
                <i><?php _e('example: 10px', 'klasik'); ?> </i></p>
                
                <p>
                <label for="<?php echo $this->get_field_id('spacingside'); ?>"><?php _e('Spacing Side:', 'klasik'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('spacingside'); ?>" name="<?php echo $this->get_field_name('spacingside'); ?>" type="text" value="<?php echo $spacingside; ?>" /></label>
                <i><?php _e('example: 10px', 'klasik'); ?> </i></p>
    
                <p>
                <label for="<?php echo $this->get_field_id('border_top'); ?>"><?php _e('Separator Top:', 'klasik'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('border_top'); ?>" name="<?php echo $this->get_field_name('border_top'); ?>" type="text" value="<?php echo $border_top; ?>" /></label>
                <i><?php _e('example: 1px solid #000000', 'klasik'); ?> </i></p>
    
    
                <p>
                <label for="<?php echo $this->get_field_id('border_bottom'); ?>"><?php _e('Separator Bottom:', 'klasik'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('border_bottom'); ?>" name="<?php echo $this->get_field_name('border_bottom'); ?>" type="text" value="<?php echo $border_bottom; ?>" /></label>
                <i><?php _e('example: 1px solid #000000', 'klasik'); ?> </i></p>
            </div><!-- end Show Advanced Option -->  
            
            <div <?php if ( $show_advanced_option == false ) { echo 'style="display:none;"'; } ?> class="hidden_options">

                <p>
                    <input name="<?php echo $this->get_field_name('customize_background'); ?>" id="<?php echo $this->get_field_id('customize_background'); ?>" type="checkbox" <?php if($customize_background == "on") echo " checked='checked'"; ?> onchange="showFeaturedImageOps(this)"/>					
                    <label for="<?php echo $this->get_field_id('customize_background'); ?>"><?php _e(' Customize Background', 'klasik'); ?> </label>
                </p>
                
                <div <?php if ( $customize_background == false ) { echo 'style="display:none;"'; } ?> class="hidden_options">
                
                    <p>
                    <label for="<?php echo $this->get_field_id('background_image'); ?>"><?php _e('Background Image URL:', 'klasik'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('background_image'); ?>" name="<?php echo $this->get_field_name('background_image'); ?>" type="text" value="<?php echo $background_image; ?>" />
                    </label></p>
                    
                    <div>
                  		
                        <label for="<?php echo $this->get_field_id('background_color'); ?>"><?php _e('Background Color:', 'klasik'); ?></label> <br />
                        <input class="widefat my-color-field" id="<?php echo $this->get_field_id('background_color'); ?>" name="<?php echo $this->get_field_name('background_color'); ?>" type="text" style="width:20%;" value="<?php echo $background_color; ?>" />
                        
                    </div>
                    
                    <p>
                    <label for="<?php echo $this->get_field_id('background_opacity'); ?>"><?php _e('Background Color Opacity:', 'klasik'); ?></label><br />
                    <select id="<?php echo $this->get_field_id('background_opacity'); ?>" name="<?php echo $this->get_field_name('background_opacity'); ?>" class="widefat" style="width:50%;">
                        <?php foreach($this->get_bg_opacity_options() as $k => $v ) { ?>
                            <option <?php selected( $instance['background_opacity'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>      
                    </select></p> 
                    
                    <p>
                    <label for="<?php echo $this->get_field_id('background_repeat'); ?>"><?php _e('Background Repeat:', 'klasik'); ?></label><br />
                    <select id="<?php echo $this->get_field_id('background_repeat'); ?>" name="<?php echo $this->get_field_name('background_repeat'); ?>" class="widefat" style="width:50%;">
                        <?php foreach($this->get_bg_repeat_options() as $k => $v ) { ?>
                            <option <?php selected( $instance['background_repeat'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>      
                    </select></p> 
                    
                    <p>
                    <label for="<?php echo $this->get_field_id('background_position'); ?>"><?php _e('Background Position:', 'klasik'); ?></label><br />
                    <select id="<?php echo $this->get_field_id('background_position'); ?>" name="<?php echo $this->get_field_name('background_position'); ?>" class="widefat" style="width:50%;">
                        <?php foreach($this->get_bg_position_options() as $k => $v ) { ?>
                            <option <?php selected( $instance['background_position'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>      
                    </select></p> 
                    
                    <p>
                    <label for="<?php echo $this->get_field_id('background_attachment'); ?>"><?php _e('Background Attachment:', 'klasik'); ?></label><br />
                    <select id="<?php echo $this->get_field_id('background_attachment'); ?>" name="<?php echo $this->get_field_name('background_attachment'); ?>" class="widefat" style="width:50%;">
                        <?php foreach($this->get_bg_attachment_options() as $k => $v ) { ?>
                            <option <?php selected( $instance['background_attachment'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>      
                    </select></p> 
                    
                    <p>
                    <label for="<?php echo $this->get_field_id('background_size'); ?>"><?php _e('Background Size:', 'klasik'); ?></label><br />
                    <select id="<?php echo $this->get_field_id('background_size'); ?>" name="<?php echo $this->get_field_name('background_size'); ?>" class="widefat" style="width:50%;">
                        <?php foreach($this->get_bg_size_options() as $k => $v ) { ?>
                            <option <?php selected( $instance['background_size'], $k); ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>      
                    </select></p> 
                </div><!-- end Enable Background -->  
                  
			</div><!-- end Show Advanced Option -->  


        <?php
    }
	

	protected function get_bg_repeat_options (){
		return array(
			'default' 			=> __( 'Default', 'klasik' ),	
			'repeat' 			=> __( 'Repeat', 'klasik' ),	
			'repeat-x'			=> __( 'Repeat Horizontal', 'klasik' ),	
			'repeat-y'			=> __( 'Repeat Vertical', 'klasik' ),	
			'no-repeat'			=> __( 'No Repeat', 'klasik' )
		);
	} // End get_bg_repeat_options()
	
	
	protected function get_bg_position_options (){
		return array(
			'default' 			=> __( 'Default', 'klasik' ),
			'left' 				=> __( 'Left', 'klasik' ),
			'center' 			=> __( 'Center', 'klasik' ),
			'right' 			=> __( 'Right', 'klasik' ),
			'top left' 			=> __( 'Top', 'klasik' ),
			'top center' 		=> __( 'Top Center', 'klasik' ),
			'top right' 		=> __( 'Top Right', 'klasik' ),
			'bottom left' 		=> __( 'Bottom', 'klasik' ),
			'bottom center' 	=> __( 'Bottom Center', 'klasik' ),
			'bottom right' 		=> __( 'Bottom Right', 'klasik' )
		);
	}  // End get_bg_position_options()
	
	
	protected function get_bg_attachment_options () {
		return array(
			'default' 		=> __( 'Default', 'klasik' ),		
			'scroll' 		=> __( 'scroll', 'klasik' ),
			'fixed' 		=> __( 'fixed', 'klasik' )
		);
	} // End get_bg_attachment_options()
	
	protected function get_bg_size_options () {
		return array(
			'default' 		=> __( 'Default', 'klasik' ),		
			'auto' 			=> __( 'auto', 'klasik' ),
			'cover' 		=> __( 'cover', 'klasik' ),
			'contain' 		=> __( 'contain', 'klasik' )
		);
	} // End get_bg_attachment_options()
	
	protected function get_bg_opacity_options () {
		return array(
			'default' 		=> __( 'Default', 'klasik' ),
			'0.1' 			=> __( '10%', 'klasik' ),		
			'0.2' 			=> __( '20%', 'klasik' ),
			'0.3' 			=> __( '30%', 'klasik' ),
			'0.4' 			=> __( '40%', 'klasik' ),
			'0.5' 			=> __( '50%', 'klasik' ),
			'0.6' 			=> __( '60%', 'klasik' ),
			'0.7' 			=> __( '70%', 'klasik' ),
			'0.8' 			=> __( '80%', 'klasik' ),
			'0.9' 			=> __( '90%', 'klasik' ),
			'1' 			=> __( '100%', 'klasik' )
		);
	} // End get_bg_opacity_options()
	
	
	protected function get_layout_options () {
		return array(
					'boxed' 			=> __( 'Boxed', 'klasik' ),
					'fullwidth' 		=> __( 'Full Width', 'klasik' )		
					
					);
	} // End get_layout_options()
		
} // class  Widget