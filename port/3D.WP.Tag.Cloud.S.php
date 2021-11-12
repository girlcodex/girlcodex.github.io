<?php 
/*
Plugin Name: 3D WP Tag Cloud-S
Plugin URI: http://peter.bg/archives/7373
Version: 5.3.4
Description: A Single Cloud variant of 3D WP Tag Cloud: Creates multiple instances widget that draws and animates an HTML5 canvas based tag cloud. Supports Shortcodes. Rotates 16 types of content and supports 90 shapes + a customer defined. Based on Graham Breach's JS class TagCanvas v. 2.8 and includes all of its 80+ options in the Control Panel.
Author: Peter Petrov
Author URI: http://peter.bg
License: LGPL v3
License URI: http://www.gnu.org/licenses/lgpl-3.0.html
*/
// Creating Widget
	class wpTagCanvasWidget extends WP_Widget {
		function wpTagCanvasWidget () {
			parent::__construct(
			'wpTagCanvasWidget', // Base ID
				__('3D WP Tag Cloud-S', 'text_domain'), // Name
				array( 'description' => __( 'Draws and animates single 3D tag cloud. Generates a Shortcode for each instance.', 'text_domain' ), ) // Args
			);
			// register Shortcode
			if (!shortcode_exists('tc-s')) {
				add_shortcode('tc-s', array($this, 'shortcode_handler'));
			}
		}
// Shortcode handler 		
		function shortcode_handler( $attributes ) {		
			if (!isset($attributes['id']) || empty($attributes['id']) || !is_numeric($attributes['id'])) {
				return '';
			}
			$widget_options = get_option('widget_wptagcanvaswidget');

			$widget_id = $attributes['id'];
			if (isset($widget_options[$widget_id]) && !empty($widget_options[$widget_id])) {
				ob_start();
				$this->widget(array(),$widget_options[$widget_id] );	
				$content = ob_get_clean();				
				return $content;
			}
			return '';
		}
// ===
		function widget($args, $instance) {  
			extract($args);
			$inst_id = mt_rand(0,999999);
//  Registration of TagCanvas.js & including an external file	
			wp_register_script('jq-tagcloud', plugin_dir_url( __FILE__ ) . 'js/3D.WP.tagcanvas.js', array('jquery'), '2.8',true);
			wp_enqueue_script('jq-tagcloud');
			include 's.variables.php';
			echo $before_widget;
// ===
?>
<!-- Loading Google Fonts -->
			<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
			<script type="text/javascript">
				WebFont.load({google: {families: ['<?php for ($i=0;$i<count($multiple_fonts_g);$i++){echo $multiple_fonts_g[$i]; if($i<count($multiple_fonts_g)-1){echo "',";};} ?>']}});
				WebFont.load({google: {families: ['<?= $font_cf; ?>']}});
			</script>
<!-- Loading User's Center Function & Shape Function files -->
			<script type="text/javascript" src="<?= $cf_url; ?>"></script>
			<script type="text/javascript" src="<?= $my_shape_url; ?>"></script>
<?php		

	if( $title ) {
		echo $before_title . $title . $after_title;
	}	
?>
<!-- HTML Cloud Template -->
        <div id="uni_tags_container_<?= $inst_id; ?>" hidden>
			<?php 
				switch($taxonomy){
					case "links":
						$lin_args = array ('category' => $links_category_id, 'hide_invisible' => 0, 'limit' => $links); 
						$bookmarks = get_bookmarks($lin_args);
						foreach( $bookmarks as $bookmark ){
							echo '<a href="' . $bookmark->link_url . '" target="' . $target . '">';
							if ($bookmark->link_image) { echo '<img src="' .$bookmark->link_image . '" width="96" height="96">';}
							echo  $bookmark->link_name . '</a>';
						}
						break;
					case "menu":
						$args = array ('menu' => $menu, 'container'=> false, 'items_wrap' => '%3$s'); wp_nav_menu($args);
						break;
					case "recent_posts":
						$recent_posts = abs($recent_posts);
						$count=0; 
						$bigest=$weight_size*$recent_posts; 
						if($recent_posts>0){$increment=($bigest-3)/$recent_posts;};
						$args= array ('numberposts' => $recent_posts, 'category' => $rp_category_id); $recent_posts = wp_get_recent_posts($args); 
						foreach( $recent_posts as $recent ){
							$count=$count+1; $font_size=round($bigest-$increment*$count); 
							if($weight_mode != "none") {echo '<a href="' . get_permalink($recent["ID"]) . '" style="font-size: ' . $font_size . 'px;" target="' . $target . '">' . get_the_post_thumbnail( $recent["ID"], 'thumbnail' ), $recent["post_title"].'</a> ';}
							else {echo '<a href="' . get_permalink($recent["ID"]) . '" target="' . $target . '">' . get_the_post_thumbnail( $recent["ID"], 'thumbnail' ), $recent["post_title"].'</a> ';};
						};
						break;
					case "archives":
						$args = array ('type' => 'monthly', 'limit' => $archives_limit, 'format' => 'custom', 'before' => '<span>', 'after' => '</span>', 'show_post_count' => true); wp_get_archives( $args ); 
						break;
					case "authors":
						$args = array('number' => $authors_limit, 'exclude' => $exclude);
						$users = get_users($args);
						foreach( $users as $user ){ 
							$userAvatar = get_avatar($user->ID);
							$userFName = $user->first_name;
							$userLName = $user->last_name;
							$userPosts = count_user_posts($user->ID);
							$userPostsURL = get_author_posts_url($user->ID);
							echo '<a href="'.$userPostsURL.'" target="' . $target . '">'.$userAvatar, $userFName.'<br>'.$userLName.'<br>('.$userPosts.')</a>';
						};	
						break;
					case "pages":
						$args = array('number' => $pages_limit); $pages = get_pages($args);
						foreach( $pages as $page ){
							echo '<a href="' . get_page_link( $page->ID ) . '" target="' . $target . '">' . get_the_post_thumbnail( $page->ID, 'thumbnail' ), $page->post_title . '</a>';
						};
						break;
					case "pp_links":
					
						break;
					case "post_tag":
						$args = array ('number' => $tags, 'taxonomy' => $taxonomy, 'topic_count_text_callback'=> 'default_topic_count_text'); wp_tag_cloud($args);						
						break;
					case "category":
						$args = array ('number' => $categories, 'taxonomy' => $taxonomy, 'topic_count_text_callback'=> 'default_topic_count_text'); wp_tag_cloud($args);
						break;
				}
			?>	
        </div>
		<div id='canvas_wrap_<?= $inst_id; ?>' style="margin-left: auto; margin-right: auto;">
        	<canvas style="position: relative;" title="<?php if($tooltip != ''){ echo $canvas_tooltip;} ?>" id="tag_canvas_<?= $inst_id; ?>"></canvas>
		</div>
		<script type="text/javascript">
			<?php include 'js/s.functions.js'; ?>
			<?php include 'js/s.cf.js'; ?>
		</script>
<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
	
		$tag_option = array();
		
// Basic new instance variables
		$tag_option['archives_limit'] = $new_instance['archives_limit'];
		$tag_option['authors_limit'] = $new_instance['authors_limit'];
		$tag_option['bg_colour_cf'] = $new_instance['bg_colour_cf'];
		$tag_option['bg_img_url'] = $new_instance['bg_img_url'];
		$tag_option['border_cf'] = $new_instance['border_cf'];
		$tag_option['canvas_tooltip'] = $new_instance['canvas_tooltip'];
		$tag_option['categories'] = $new_instance['categories'];
		$tag_option['cf_image_loc'] = $new_instance['cf_image_loc'];
		$tag_option['cf_name'] = $new_instance['cf_name'];
		$tag_option['cf_opacity'] = $new_instance['cf_opacity'];
		$tag_option['cf_rotation'] = $new_instance['cf_rotation'];
		$tag_option['cf_url'] = $new_instance['cf_url'];
		$tag_option['conid'] = $new_instance['conid'];
		$tag_option['cont_border'] = $new_instance['cont_border'];
		$tag_option['exclude'] = $new_instance['exclude'];
		$tag_option['font_cf'] = $new_instance['font_cf'];
		$tag_option['font_h'] = $new_instance['font_h'];
		$tag_option['font_w'] = $new_instance['font_w'];
		$tag_option['google_font'] = $new_instance['google_font'];
		$tag_option['height'] = $new_instance['height'];
		$tag_option['img_reduction'] = $new_instance['img_reduction'];
		$tag_option['links'] = $new_instance['links'];
		$tag_option['links_category_id'] = $new_instance['links_category_id'];
		$tag_option['magic'] = $new_instance['magic'];
		$tag_option['menu'] = $new_instance['menu'];
		$tag_option['multiple_bg'] = $new_instance['multiple_bg'];
		$tag_option['multiple_colors'] = $new_instance['multiple_colors'];
		$tag_option['multiple_fonts'] = $new_instance['multiple_fonts'];
		$tag_option['multiple_fonts_g'] = $new_instance['multiple_fonts_g'];
		$tag_option['my_shape_url'] = $new_instance['my_shape_url'];
		$tag_option['numberop'] = $new_instance['numberop'];
		$tag_option['numberot'] = $new_instance['numberot'];
		$tag_option['pages_limit'] = $new_instance['pages_limit'];
		$tag_option['rp_category_id'] = $new_instance['rp_category_id'];
		$tag_option['recent_posts'] = $new_instance['recent_posts'];
		$tag_option['tags'] = $new_instance['tags'];
		$tag_option['target'] = $new_instance['target'];
		$tag_option['taxonomy'] = $new_instance['taxonomy'];
		$tag_option['text_color_cf'] = $new_instance['text_color_cf'];
		$tag_option['text_line_1'] = $new_instance['text_line_1'];
		$tag_option['text_line_2'] = $new_instance['text_line_2'];
		$tag_option['text_line_3'] = $new_instance['text_line_3'];
		$tag_option['text_line_4'] = $new_instance['text_line_4'];
		$tag_option['text_line_5'] = $new_instance['text_line_5'];
		$tag_option['text_cont'] = $new_instance['text_cont'];
		$tag_option['text_zoom'] = $new_instance['text_zoom'];
		$tag_option['time'] = $new_instance['time'];
		$tag_option['title'] = $new_instance['title'];
		$tag_option['tooltip_status'] = $new_instance['tooltip_status'];
		$tag_option['width'] = $new_instance['width'];
		
		$tag_option['active_cursor'] = $new_instance['active_cursor'];
		$tag_option['animation_timing'] = $new_instance['animation_timing'];
		$tag_option['bg_color'] = $new_instance['bg_color'];
		$tag_option['bg_outline'] = $new_instance['bg_outline'];
		$tag_option['bg_outline_thickness'] = $new_instance['bg_outline_thickness'];
		$tag_option['bg_radius'] = $new_instance['bg_radius'];
		$tag_option['click_to_front'] = $new_instance['click_to_front'];
		$tag_option['deceleration'] = $new_instance['deceleration'];
		$tag_option['depth'] = $new_instance['depth'];
		$tag_option['drag_ctrl'] = $new_instance['drag_ctrl'];
		$tag_option['drag_threshold'] = $new_instance['drag_threshold'];
		$tag_option['fadein'] = $new_instance['fadein'];
		$tag_option['freeze_active'] = $new_instance['freeze_active']; 
		$tag_option['freeze_decel'] = $new_instance['freeze_decel']; 
		$tag_option['front_select'] = $new_instance['front_select'];
		$tag_option['hide_tags'] = $new_instance['hide_tags'];
		$tag_option['image_align'] = $new_instance['image_align'];
		$tag_option['image_mode'] = $new_instance['image_mode'];
		$tag_option['image_padding'] = $new_instance['image_padding'];
		$tag_option['image_position'] = $new_instance['image_position'];
		$tag_option['image_radius'] = $new_instance['image_radius'];
		$tag_option['image_scale'] = $new_instance['image_scale'];
		$tag_option['image_valign'] = $new_instance['image_valign'];
		$tag_option['initial_x'] = $new_instance['initial_x'];
		$tag_option['initial_y'] = $new_instance['initial_y'];
		$tag_option['initial_z'] = $new_instance['initial_z'];
		$tag_option['interval'] = $new_instance['interval'];
		$tag_option['lock'] = $new_instance['lock'];
		$tag_option['max_brightness'] = $new_instance['max_brightness'];
		$tag_option['max_speed'] = $new_instance['max_speed'];
		$tag_option['min_brightness'] = $new_instance['min_brightness'];
		$tag_option['min_speed'] = $new_instance['min_speed'];
		$tag_option['min_tags'] = $new_instance['min_tags']; 
		$tag_option['no_mouse'] = $new_instance['no_mouse'];
		$tag_option['no_select'] = $new_instance['no_select']; 
		$tag_option['no_tags_msg'] = $new_instance['no_tags_msg']; 
		$tag_option['offset_x'] = $new_instance['offset_x'];
		$tag_option['offset_y'] = $new_instance['offset_y'];
		$tag_option['outline_color'] = $new_instance['outline_color'];
		$tag_option['outline_dash'] = $new_instance['outline_dash'];
		$tag_option['outline_dash_space'] = $new_instance['outline_dash_space'];
		$tag_option['outline_dash_speed'] = $new_instance['outline_dash_speed'];	
		$tag_option['outline_increase'] = $new_instance['outline_increase'];
		$tag_option['outline_method'] = $new_instance['outline_method'];
		$tag_option['outline_offset'] = $new_instance['outline_offset']; 
		$tag_option['outline_radius'] = $new_instance['outline_radius'];
		$tag_option['outline_thickness'] = $new_instance['outline_thickness'];
		$tag_option['padding'] = $new_instance['padding'];
		$tag_option['pinch_zoom'] = $new_instance['pinch_zoom'];
		$tag_option['pulsate_time'] = $new_instance['pulsate_time'];
		$tag_option['pulsate_to'] = $new_instance['pulsate_to'];
		$tag_option['radius_x'] = $new_instance['radius_x']; 
		$tag_option['radius_y'] = $new_instance['radius_y']; 
		$tag_option['radius_z'] = $new_instance['radius_z'];
		$tag_option['repeat_tags'] = $new_instance['repeat_tags'];
		$tag_option['reverse'] = $new_instance['reverse'];
		$tag_option['scroll_pause'] = $new_instance['scroll_pause'];
		$tag_option['shadow'] = $new_instance['shadow'];
		$tag_option['shadow_blur'] = $new_instance['shadow_blur'];
		$tag_option['shadow_offset_x'] = $new_instance['shadow_offset_x'];
		$tag_option['shadow_offset_y'] = $new_instance['shadow_offset_y'];
		$tag_option['shape'] = $new_instance['shape'];
		$tag_option['split_width'] = $new_instance['split_width'];
		$tag_option['stretch_x'] = $new_instance['stretch_x'];
		$tag_option['stretch_y'] = $new_instance['stretch_y'];
		$tag_option['shuffle_tags'] = $new_instance['shuffle_tags'];
		$tag_option['text_align'] = $new_instance['text_align'];
		$tag_option['text_color'] = $new_instance['text_color'];
		$tag_option['text_height'] = $new_instance['text_height'];
		$tag_option['text_scale'] = $new_instance['text_scale'];
		$tag_option['text_optimisation'] = $new_instance['text_optimisation'];
		$tag_option['text_valign'] = $new_instance['text_valign'];
		$tag_option['tooltip'] = $new_instance['tooltip'];
		$tag_option['tooltip_class'] = $new_instance['tooltip_class'];
		$tag_option['tooltip_delay'] = $new_instance['tooltip_delay'];
		$tag_option['weight'] = $new_instance['weight'];
		$tag_option['weight_from'] = $new_instance['weight_from'];
		$tag_option['weight_gradient_1'] = $new_instance['weight_gradient_1'];
		$tag_option['weight_gradient_2'] = $new_instance['weight_gradient_2'];
		$tag_option['weight_gradient_3'] = $new_instance['weight_gradient_3'];
		$tag_option['weight_gradient_4'] = $new_instance['weight_gradient_4'];
		$tag_option['weight_mode'] = $new_instance['weight_mode'];
		$tag_option['weight_size'] = $new_instance['weight_size'];
		$tag_option['weight_size_max'] = $new_instance['weight_size_max'];
		$tag_option['weight_size_min'] = $new_instance['weight_size_min'];
		$tag_option['wheel_zoom'] = $new_instance['wheel_zoom'];
		$tag_option['zoom'] = $new_instance['zoom'];
		$tag_option['zoom_max'] = $new_instance['zoom_max'];
		$tag_option['zoom_min'] = $new_instance['zoom_min'];
		$tag_option['zoom_step'] = $new_instance['zoom_step'];

		delete_option("3dwptagcloud-s-widget-instance");
		add_option("3dwptagcloud-s-widget-instance", $this->id);
		
		return $tag_option;
	}
	
	function form($instance) {
				
		$instance = wp_parse_args( (array) $instance, array(
		
// Basic Options
			'archives_limit' => '',
			'authors_limit' => '',
			'bg_colour_cf' => 'fff',
			'bg_img_url' => '',
			'border_cf' => '000',
			'canvas_tooltip' => '',
			'categories' => '',
			'cf_image_loc' => '',
			'cf_name' => '',
			'cf_opacity' => '1',
			'cf_rotation' => '0',
			'cf_url' => '',
			'conid' => '',
			'cont_border' => '0',
			'exclude' => '',
			'font_cf' => 'Special Elite',
			'font_h' => '16',
			'font_w' => 'normal',
			'google_font' => '',
			'height' => '260',
			'img_reduction' => '0.25',
			'links' => '-1',
			'links_category_id' => '',
			'magic' => '0',
			'menu' => '',
			'multiple_bg' => 'ff4500, daa520, 9acd32, 6b8e23, 2f4f4f',
			'multiple_colors' => '280000, 003333, 00008b, 000066, 000000',
			'multiple_fonts' => 'Arial',
			'multiple_fonts_g' => '',
			'my_shape_url' => '',
			'numberop' => 'true',
			'numberot' => 'true',
			'pages_limit' => '',
			'recent_posts' => '10',
			'rp_category_id' => '',
			'tags' => '45',
			'target' => '_self',
			'taxonomy' => 'post_tag',
			'text_color_cf' => '000',
			'text_line_1' => 'Fill up',
			'text_line_2' => 'these lines',
			'text_line_3' => 'with your',
			'text_line_4' => 'text or',
			'text_line_5' => 'leave empty.',
			'text_cont' => 'square',
			'text_zoom' => '1.2',
			'time' => '10000',
			'title' => 'My 3D WP Tag Cloud',
			'tooltip_status' => 'on',
			'width' => '260',

			'active_cursor' => 'pointer',
			'animation_timing' => 'Smooth',
			'bg_color' => '',
			'bg_outline' => '',
			'bg_outline_thickness' => '0',
			'bg_radius' => '10',
			'click_to_front' => '1000',
			'deceleration' => '0.98',
			'depth' => '0.5',
			'drag_ctrl' => 'false',
			'drag_threshold' => '4',
			'fadein' => '1500',
			'freeze_active' => 'false',
			'freeze_decel' => 'false',
			'front_select' => 'false',
			'hide_tags' => 'true',
			'image_align' => 'centre',
			'image_mode' => '',
			'image_padding' => '2',
			'image_position' => 'left',
			'image_radius' => '0',
			'image_scale' => '1.0',
			'image_valign' => 'middle',
			'initial_x' => '0',
			'initial_y' => '0',
			'initial_z' => '0',
			'interval' => '20',
			'lock' => 'none',
			'max_brightness' => '1',
			'max_speed' => '0.05',
			'min_brightness' => '0.1',
			'min_speed' => '0',
			'min_tags' => '0',
			'no_mouse' => 'false',
			'no_select' => 'false',
			'no_tags_msg' => 'true',
			'offset_x' => '0',
			'offset_y' => '0',
			'outline_color' => '369d88',
			'outline_dash' => '0',
			'outline_dash_space' => '10',
			'outline_dash_speed' => '3',
			'outline_increase' => '4',
			'outline_method' => 'block',
			'outline_offset' => '5',
			'outline_radius' => '10',
			'outline_thickness' => '2',
			'padding' => '5',
			'pinch_zoom' => 'false',
			'pulsate_time' => '1',
			'pulsate_to' => '0',
			'radius_x' => '1',
			'radius_y' => '1',
			'radius_z' => '1',
			'repeat_tags' => '0',
			'reverse' => 'true',
			'scroll_pause' => '0',
			'shadow' => '000000',
			'shadow_blur' => '0',
			'shadow_offset_x' => '1',
			'shadow_offset_y' => '1',
			'shape' => 'cube',
			'shuffle_tags' => 'false',
			'split_width' => '120',
			'stretch_x' => '1',
			'stretch_y' => '1',
			'text_align' => 'centre',
			'text_color' => '666666',
			'text_height' => '15',
			'text_optimisation' => 'true',
			'text_scale' => '2',
			'text_valign' => 'middle',
			'tooltip' => '',
			'tooltip_class' => 'tctooltip',
			'tooltip_delay' => '300',
			'weight_from' => '',
			'weight' => 'false',
			'weight_gradient_1' => 'f00',
			'weight_gradient_2' => 'ff0',
			'weight_gradient_3' => '0f0',
			'weight_gradient_4' => '00f',
			'weight_mode' => 'both',
			'weight_size' => '1',
			'weight_size_max' => '20',
			'weight_size_min' => '6',
			'wheel_zoom' => 'true',
			'zoom' => '1',
			'zoom_max' => '3',
			'zoom_min' => '0.3',
			'zoom_step' => '0.05'
		));

		include 's.variables.php';
		include 's.CP.php'; 
 ?>
		<script type="text/javascript">
		
//------- Initialisation of jQuery widgets for WP Widget's page
        jQuery(window).load(function() {
			var inout = '<?= $check_widget_1; ?>';
			if (inout == '') {
				jQuery( document ).tooltip( 'option', 'disabled', true );
			} 
			else {
				jQuery(function(){
					setTimeout(function() {
						jQuery(".widget-inside").css("border", "1px solid #bbb");
						jQuery("#accordion-1, #wihead").css("visibility", "visible");
						var tooltip_status = '<?= $tooltip_status; ?>';
						if (tooltip_status == 'on'){
							jQuery('#accordion-1, #wihead').tooltip( {show: {effect: 'fade', duration: 300}, hide: {effect: 'fade', duration: 50}, tooltipClass: 'custom-tooltip-styling'});
						}
						else {jQuery('#accordion-1, #wihead').tooltip( {show: {effect: 'fade', duration: 300}, hide: {effect: 'fade', duration: 50}, tooltipClass: 'custom-tooltip-styling', position: { my: 'left-300 top',  at: 'left bottom',  of: 'body'}});};
					}, 250)
				});
			}
        });	
		</script>
<?php
	}
}
// Check for plugin version & Shortcode Info
function my_admin_notice() {	 
    $plugin_data = get_plugin_data( __FILE__ , $translate = false);
	define('PLUGIN_VERSION', $plugin_data['Version']);
//	$message = "<b>" . $plugin_data['Name'] . "</b>:<br>";
	$message = "<b>" . $plugin_data['Name'] . "</b>:<br>Plugin requires at least WP 4.8.<br>If necessary to make your old widget instances compatible with the new plugin version go to <b><a href='widgets.php'>Widgets</a></b>, open each one of them and save it without any change.";
	$display_info = false;
	$local_version = get_option('plugin_version');
	if ($local_version && $local_version !== PLUGIN_VERSION) {
		$display_info = true;
		update_option('plugin_version', PLUGIN_VERSION);
	}
	elseif (!$local_version) {update_option('plugin_version', PLUGIN_VERSION);}
	if ($display_info === true) {
		echo"<div class='updated'><p>$message</p></div>"; 
	}

	if($_SERVER["REQUEST_URI"]==="/wp-admin/widgets.php?message=0"){
		wp_register_script( 'shortcode_script',  plugin_dir_url( __FILE__ ) . 'js/s.shortcode.js' );
		$opt = get_option("3dwptagcloud-s-widget-instance");
		$shortcode_id = preg_replace('!^[^\d]+!uis','',$opt);
		$shortcode_array = array(
			'shortcode_id' => $shortcode_id,
			'plugin_name' => $plugin_data['Name'],
		);	
		wp_localize_script( 'shortcode_script', 'shortcode', $shortcode_array );
		wp_enqueue_script( 'shortcode_script' ); 
	}
	else{
		if ($opt) {delete_option("3dwptagcloud-s-widget-instance");};
	}
}
add_action( 'admin_notices', 'my_admin_notice' ); 
// ===
// Registering Widget
function wpTagCanvasLoad() {
    register_widget( 'wpTagCanvasWidget' );   
}
add_action('widgets_init', 'wpTagCanvasLoad');
// ===
// Enabling link manager for users of WP 3.5+
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
// ===