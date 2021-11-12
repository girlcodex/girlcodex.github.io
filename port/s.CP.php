<?php 
/*
3D WP Tag Cloud-S: HTML Control Panel Template
*/
// Important variables for redirecting to WP Admin panel > Appearance > Widgets page
	$admin_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$look_4_string_1 = "editwidget";
	$look_4_string_2 = "customize";
	$check_widget_1 = strpos($admin_url, $look_4_string_1);
	$check_widget_2 = strpos($admin_url, $look_4_string_2);
// Registering scripts and CSS file	
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tooltip');
    wp_register_style('tag-cloud-css', plugin_dir_url( __FILE__ ) . 'css/3D.WP.Tag.Cloud.S.css');
    wp_enqueue_style('tag-cloud-css');
// ===
?>
<style>.widget-inside {padding:0!important; border-radius: 5px; border:1px solid #bbb; background: #f1f1f1;};</style>
<!-- Loading Google Fonts and Initialisation of jQuery widgets in CP page -->
<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
<script type="text/javascript">
	jQuery(window).load(function() {
		var check = '<?= $check_widget_1; ?>';
		if(check != ''){
			jQuery('#accordion-1, #wihead').tooltip({content: function() {var element = jQuery( this ); var html_text=element.attr('title'); return html_text;}, position: {  my: 'left top+20',  at: 'left bottom'}}); 
			jQuery(function() {
				jQuery( "#accordion-1, #accordion-3, #accordion-6" ).accordion({heightStyle: "content", collapsible: true, active: false});
				jQuery( "#accordion-1, #accordion-3, #accordion-6" ).accordion({beforeActivate: function( click ) {if(jQuery("div.ui-tooltip-content")[0]){return false};}});
			});
		};
		jQuery( "#wihead, #accordion-1" ).keydown(function( event ) {
		  if ( event.which == 13 ) {
		   event.preventDefault();
		  }
		});
		jQuery("#savewidget").on("submit", function() { if(jQuery("div.ui-tooltip-content")[0]){return false};});
		for(var i=0; i<jQuery("#<?=$this->get_field_id('font_cf'); ?> option").length; i++){
			WebFont.load({google: {families: [jQuery("#<?=$this->get_field_id('font_cf'); ?> option").eq(i).attr("value")]}});
			jQuery("#<?=$this->get_field_id('font_cf'); ?> option").eq(i).css('font-family',jQuery("#<?=$this->get_field_id('font_cf'); ?> option").eq(i).attr("value"));
		};
	 });
// Change of tag limits for spiral, hexagon, cube, pyramid, beam, circles & antenna, axes, vcones & hcones, square, fir and triangle
	function change_limits(shape,length){
		var i=1, j, delta, limits = [5,25,1,"<?= $this->get_field_id('recent_posts'); ?>","rp_","","",
							  5,120,5,"<?= $this->get_field_id('links'); ?>","l_","","",
							  5,120,5,"<?= $this->get_field_id('tags'); ?>","t_","","",
							  6,60,6,"<?= $this->get_field_id('archives_limit'); ?>","arli_","","",
							  5,50,5,"<?= $this->get_field_id('pages_limit'); ?>","pali_","","",
							  5,50,5,"<?= $this->get_field_id('authors_limit'); ?>","auli_","","",
							  5,60,5,"<?= $this->get_field_id('categories'); ?>","c_","",""];
		for(i=3;i<= 45;i+=7){
			jQuery('#'+limits[i]).empty();
		}
		if(length!=1||shape!="spiral"&&shape!="hexagon"&&shape!="cube"&&shape!="pyramid"&&shape!="beam"&&shape!="circles"&&shape!="antena"&&shape!="axes"&&shape!="vcones"&&shape!="hcones"&&shape!="square"&&shape!="fir"&&shape!="triangle"&&shape!="heart"&&shape!="love"){
			for(j=0; j<=42; j+=7){
				for(i=limits[j]; i<=limits[j+1]; i+=limits[j+2]){
					jQuery('#'+limits[j+3]).append('<option id="'+limits[j+4]+i+'" value="'+i+'" '+"selected"+'>'+i+'</option>');
				}
			}
		}
		else{
//COL: rec, lin, pos, arc, pag, aut, cat
//ROW: spiral, hexagon, cube, pyramid, beam, circles & antenna, axes, vcones & hcones, square, fir, triangle, heart and love
			var limits2 = [8,29,7,"","","","",8,120,7,"","","","",8,120,7,"","","","",8,64,7,"","","","",8,50,7,"","","","",8,50,7,"","","","",8,57,7,"","","","",
						   1,2,1,3,3,1,"",1,5,1,3,3,1,"",1,6,1,3,3,1,"",1,4,1,3,3,1,"",1,3,1,3,3,1,"",1,3,1,3,3,1,"",1,4,1,3,3,1,"",
						   0,1,1,6,12,8,"",0,3,1,6,12,8,"",0,4,1,6,12,8,"",0,2,1,6,12,8,"",0,1,1,6,12,8,"",0,1,1,6,12,8,"",0,2,1,6,12,8,"",
						   1,3,1,2,0,2,"",1,7,1,2,0,2,"",1,8,1,2,0,2,"",1,6,1,2,0,2,"",1,5,1,2,0,2,"",1,5,1,2,0,2,"",1,6,1,2,0,2,"",
						   5,10,5,"","","","",5,10,5,"","","","",5,10,5,"","","","",5,10,5,"","","","",5,10,5,"","","","",5,10,5,"","","","",5,10,5,"","","","",
						   2,4,1,"","","","",2,6,1,"","","","",2,7,1,"","","","",2,5,1,"","","","",2,4,1,"","","","",2,4,1,"","","","",2,5,1,"","","","",
						   6,24,6,"","","","",6,120,6,"","","","",6,120,6,"","","","",6,60,6,"","","","",6,48,6,"","","","",6,48,6,"","","","",6,60,6,"","","","",
						   2,3,1,2,0,1,"",2,5,1,2,0,1,"",2,6,1,2,0,1,"",2,4,1,2,0,1,"",2,4,1,2,0,1,"",2,4,1,2,0,1,"",2,4,1,2,0,1,"",
						   2,5,1,"","","","",2,10,1,"","","","",2,11,1,"","","","",2,8,1,"","","","",2,7,1,"","","","",2,7,1,"","","","",2,8,1,"","","","",
						   1,3,1,2,2,1,"",1,7,1,2,2,1,"",1,8,1,2,2,1,"",1,5,1,2,2,1,"",1,4,1,2,2,1,"",1,4,1,2,2,1,"",1,5,1,2,2,1,"",
						   3,6,1,0.5,0.5,0,"",3,14,1,0.5,0.5,0,"",3,15,1,0.5,0.5,0,"",3,11,1,0.5,0.5,0,"",3,10,1,0.5,0.5,0,"",3,10,1,0.5,0.5,0,"",3,11,1,0.5,0.5,0,"",
						   12,24,12,"","","","",12,48,12,"","","","",12,48,12,"","","","",12,48,12,"","","","",12,36,12,"","","","",12,36,12,"","","","",12,48,12,"","","","",
						   24,36,12,"","","","",24,60,12,"","","","",24,60,12,"","","","",24,60,12,"","","","",24,48,12,"","","","",24,48,12,"","","","",24,60,12,"","","",""]
			switch(shape){
				case "spiral": delta = 0; break;
				case "hexagon": delta = 49; break;
				case "cube": delta = 98; break;
				case "pyramid": delta = 147; break;
				case "beam": delta = 196; break;
				case "circles": 
				case "antenna": delta = 245; break;
				case "axes": delta = 294; break;
				case "vcones": 
				case "hcones": delta = 343; break;
				case "square": delta = 392; break;
				case "fir": delta = 441; break;
				case "triangle": delta = 490; break;
				case "heart": delta = 539; break;
				case "love": delta = 588;
//				Next delta=637;
			}
			for(j=0; j<=42; j+=7){
				for(i=limits2[delta+j]; i<=limits2[delta+j+1]; i+=limits2[delta+j+2]){
					jQuery('#'+limits[j+3]).append(
						'<option id="'+limits[j+4]+(shape=='spiral'||shape=='beam'?i:shape=='circles'?(2*i*i*i+3*i*i+i)/6:shape=='antenna'?(2*i*i*i+3*i*i+i)/6+4:shape=='axes'||shape=='heart'||shape=='love'?i:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):limits2[delta+j+3]*i*i+limits2[delta+j+4]*i+limits2[delta+j+5])+
						'" value="'+
						(shape=='spiral'||shape=='beam'?i:shape=='circles'?(2*i*i*i+3*i*i+i)/6:shape=='antenna'?(2*i*i*i+3*i*i+i)/6+4:shape=='axes'||shape=='heart'||shape=='love'?i:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):limits2[delta+j+3]*i*i+limits2[delta+j+4]*i+limits2[delta+j+5])+
						'" '+(i==limits2[delta+j+1]?"selected":"")+'>'+
						(shape=='spiral'||shape=='beam'?i:shape=='circles'?(2*i*i*i+3*i*i+i)/6:shape=='antenna'?(2*i*i*i+3*i*i+i)/6+4:shape=='axes'||shape=='heart'||shape=='love'?i:shape=='square'?i*i:shape=='fir'?(2*i*i+2*i+1):shape=='vcones'||shape=='hcones'?(2*i*i*i+i)/3:shape=='sandglass'?(4*i*i*i+2*i)/3-1:shape=='triangle'?(i*i/2+i/2):limits2[delta+j+3]*i*i+limits2[delta+j+4]*i+limits2[delta+j+5])+
						'</option>');
				}
			}			
		}
	}
// Center Function Text check
	function qutes_check(e,s){
		if(/"/g.test(s) == true){
			jQuery(e).tooltip(
				{ content: 'Use <span style="font-weight: bold; color: red;">single quotes</span> (<span style="font-weight: bold; color: red;">&#39;</span>) please!', tooltipClass: 'custom-tooltip-styling', position: { my: 'center top', at: 'center bottom+15' } }
			); 
			jQuery(e).focus(); 
			jQuery(e).tooltip({content: function(){
				var element = jQuery( this ); 
				var html_text=element.attr('title'); return html_text;}
			});
		}
	};
// HEX check for entered colors	
	function hex_val_check(e,s){
		if(s == 'tag' && (e.id.search('bg_color') > -1 || e.id.search('bg_outline') > -1 || e.id.search('outline_color') > -1 )){
			jQuery(e).parent().find('.color').remove(); 
			jQuery(e).parent().append('<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>');
			if(jQuery("div.ui-tooltip-content")[0]){jQuery(e).tooltip("close");};
			}
		else{
			if(s == 'tagbg' && ( e.id.search('outline_color') > -1 )){
			jQuery(e).parent().find('.color').remove(); 
			jQuery(e).parent().append('<span class="color" style="background: #fff; padding: 0 0 0 1px; letter-spacing: 0;">original bg</span>');
			if(jQuery("div.ui-tooltip-content")[0]){jQuery(e).tooltip("close");};			
			}
			else{
				hex_check = /(^[0-9A-F]{6}$)|(^[0-9A-F]{3}$)/i.test(s);
				if (hex_check == true){
					jQuery(e).parent().find('.color').remove();
					jQuery(e).parent().append('<span class="color" style="color: #'+s+';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>');
					if(jQuery("div.ui-tooltip-content")[0]){jQuery(e).tooltip("close");};
				}
				else {
					if(s!=''){
						jQuery(e).tooltip({ content: 'Wrong Color Value: <span style="font-weight: bold; color: red;">'+s+'</span><br>Please enter a valid one!', tooltipClass: 'custom-tooltip-styling', position: { my: 'center top', at: 'center bottom+15' } }); 
						jQuery(e).parent().find('.color').remove();
						jQuery(e).parent().append('<span class="color" style="background: #fff; position: relative; top: 0; margin: 0 0 0 8px; letter-spacing: 0; font-size: 11px;">Oops!</span>');
						jQuery(e).focus(); 
						jQuery(e).tooltip({content: function(){
							var element = jQuery( this ); 
							var html_text=element.attr('title'); return html_text;}
						})
					}
					else{
						jQuery(e).parent().find('.color').remove(); 
						if(jQuery("div.ui-tooltip-content")[0]){jQuery(e).tooltip("close");}
					}
				}
			}
		}
	}
// HEX check for entered multiple colors
	var poscal = 0;
	function multi_colors_check(e,s,d){
		var multiple_colors = s.replace(/ /gi, '');
		var mcl = multiple_colors.length;
		var multiple_colors = multiple_colors.replace(/,,/gi, ',');
		while(mcl > multiple_colors.length){
			multiple_colors = multiple_colors.replace(/,,/gi, ',');
			mcl = mcl - 1;
		};
		jQuery(e).val(multiple_colors);
		while(multiple_colors.charAt(multiple_colors.length-1) == ',') {
			multiple_colors = multiple_colors.substr(0, multiple_colors.length-1)
		};
		jQuery(e).val(multiple_colors);
		var mc_array = multiple_colors.split(',');
		jQuery(d).empty();
		if(multiple_colors != ''){
			for (var i = 0; i < mc_array.length; i++) {
				var hex_check = /(^[0-9A-F]{6}$)|(^[0-9A-F]{3}$)/i.test(mc_array[i]);
				poscal = poscal + mc_array[i].length +1;
				if (hex_check == false){
					jQuery(e).tooltip(
						{content: 'Wrong Color Value: <span style="font-weight: bold; color: red;">'+mc_array[i]+'</span><br>Please enter a valid one!', tooltipClass: 'custom-tooltip-styling', position: { my: 'center bottom', at: 'center top-15' }}
					); 
					jQuery(e).focus(); 
					jQuery(e).setCursorPosition(poscal-1);
					jQuery(e).tooltip({content: function(){
						var element = jQuery( this ); 
						var html_text=element.attr('title'); return html_text;}
					});
					jQuery(d).append('<span class="multi-colors" style="border-radius: 3px; border: 1px solid #000; font-size: 10px; padding: 0 15px; margin: 0 5px 0 0; line-height: 11px;"><span style="background: #fff; padding: 0 3px;">?</span></span>');
					poscal = 0;
					break;
				}
				else {
					if(jQuery("div.ui-tooltip-content")[0]){jQuery(e).tooltip("close");};		
					jQuery(d).append('<span class="multi-colors" style="color: #'+mc_array[i]+';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>');
				};
			}
		}
	}
	jQuery.fn.setCursorPosition = function(pos) {
	  this.each(function(index, elem) {
		if (elem.setSelectionRange) {
		  elem.setSelectionRange(pos, pos);
		} else if (elem.createTextRange) {
		  var range = elem.createTextRange();
		  range.collapse(true);
		  range.moveEnd('character', pos);
		  range.moveStart('character', pos);
		  range.select();
		}
	  });
	  return this;
	};
	</script>
<!-- Check for proper entrance to widget's Control Panel -->
<?php if( $check_widget_1 == "" && $check_widget_2!= "" ){
			echo '<style>div.widget-control-actions, #theother, #wihead {display: none!important;}</style><p id="warning" style="margin: 10px 5px 5px; font-size: 14px; text-align: justify;">This widget can be customized through <b>Widgets</b> page only, where accessibility mode in <b>Screen Options</b> (top-right corner of the page) has to be enabled.<br><a href="../wp-admin/widgets.php" style="text-align: right; width: 100%; display: inline-block; margin: 5px 0 0;"><b>Customize</b></a></p>'; 
		} 
		else {if( $check_widget_1 == ""){
				echo '<style>div.widget-control-actions div.alignright input.widget-control-save, div.widget-control-actions div.alignleft a.widget-control-close, div.widget-control-actions div.alignright a.display-options, #theother, #wihead {display: none!important;} div.widget-control-actions div.alignleft a.widget-control-remove {margin-left: 5px; font-weight: bold;}</style><p id="warning" style="margin: 10px 5px 5px; font-size: 14px; text-align: justify;">In order to edit this widget instance and get a Shortcode you have to enable accessibility mode in <b>Screen Options</b> (top-right corner of this page). Otherwise you&#39;d better <b>Delete</b> it.</p>'; 
			}
			else    {
				$shortcode_id = preg_replace('!^[^\d]+!uis','',$this->id);
			};
		}
?>
<!-- CP Template -->
<div id="wihead" style="visibility: hidden;">
	<div style="float: left;">
		<span>WIDGET OPTIONS</span>
		<div class="thin-spacer" style="height: 3px;"></div>
		<div style="font-weight: normal;">
			<?php 
				$url_check = $_SERVER["REQUEST_URI"];
				if(	strpos($url_check, 'wp_inactive_widgets') == true||strpos($url_check, 'sidebar') == false){
					if (isset($this->id) && !empty($shortcode_id)) {
					echo 'Shortcode: <input value="[tc-s id=&#34;'.$shortcode_id.'&#34;]" style="float: right; line-height: 12px; height: 14px; border-radius: 4px; font-size: 12px; padding: 2px 4px; border: 0; width: 68px;" onclick="select()"  title="Put your cloud in a page/post via this Shortcode.">';
					}
					else echo '<span style="color: #dc143c; font-weight: bold;" title="Save the Widget in <b>Inactive Widgets</b> (a message with a Shortcode for adding the cloud in a page/post will pop up). After that the Shortcode will be available here for later use.">Hover</span> for Shortcode instruction.';
				}
				else echo '<span style="color: #dc143c; font-weight: bold;" title="Save the Widget in <b>Inactive Widgets</b> (a message with a Shortcode for adding the cloud in a page/post will pop up). After that the Shortcode will be available here for later use.">Hover</span> for Shortcode instruction.';
				?>
		</div>
	</div>
	<div id="toti" onmouseout="jQuery(this).css({'color':'#dc143c'});" onmouseover="jQuery(this).css({'color':'#b01030'});">
		Tooltips
		<br>
		<input style="margin: 0;" title="Turns on Option Tooltips." class="radio" id="<?=$this->get_field_id('tooltip_status'); ?>"
		name="<?=$this->get_field_name('tooltip_status'); ?>" type="radio" value="on" 
		<?php if( $tooltip_status == "on" ){ echo ' checked="checked"'; } ?> onclick="jQuery('#accordion-1, #wihead').tooltip({content: function() {var element = jQuery( this ); var html_text=element.attr('title'); return html_text;}, position: {  my: 'left top+20',  at: 'left bottom'}}); ">on
		
		<input style="margin: 0;" title="Turns off Option Tooltips." class="radio" id="<?=$this->get_field_id('tooltip_status'); ?>"
		name="<?=$this->get_field_name('tooltip_status'); ?>" type="radio" value="off"
		<?php if( $tooltip_status == "off" ){ echo ' checked="checked"'; } ?> onclick="jQuery('#accordion-1, #wihead').tooltip({position: { my: 'left-300 top', at: 'left bottom',  of: 'body'}});">off
	</div>
	<div class="thin-spacer" style="height: 3px;"></div>
	<label title="Title of the widget instance" for="<?=$this->get_field_id('title'); ?>" style="display: inline-block; float: left;">
		<span style="font-weight: normal;">Title
		<br> 
		<input style="width: 180px; margin: 1px 4px 0 0;"
		id="<?=$this->get_field_id('title'); ?>"
		name="<?=$this->get_field_name('title'); ?>" type="text"
		value="<?php echo $title; ?>" />
	</label>
	<label title="Widget's width. The option 'Max' sets cloud's canvas width to the user's inner window width." for="<?=$this->get_field_id('width'); ?>" style="display: inline-block; margin: 0 0 0 4px">
		<span style="font-weight: normal;">
		Width
		<br>
		<select id="<?=$this->get_field_id('width'); ?>" name="<?=$this->get_field_name('width'); ?>">
			<?php for($i=90; $i<1921; $i++){echo '<option id="wo_' . $i . '" value="' . $i . '"'; if($width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } 
				echo '<option id="ho_1922"'; if($width=="1922"){echo ' selected';}; echo ' value="1922">Max</option>';
			?>
		</select>px
	</label>
	<label title="Widget's height. The option 'Max' sets cloud's canvas height to the user's inner window height." for="<?=$this->get_field_id('height'); ?>" style="display: inline-block; float: right;">
		<span style="font-weight: normal;">
		Height
		<br>
		<select id="<?=$this->get_field_id('height'); ?>" name="<?=$this->get_field_name('height'); ?>">
			<?php for($i=90; $i<1921; $i++){echo '<option id="ho_' . $i . '" value="' . $i . '"'; if($height==$i){echo ' selected';}; echo '>' . $i . '</option>'; } 
				echo '<option id="ho_1922"'; if($height=="1922"){echo ' selected';}; echo ' value="1922">Max</option>';
			?>
		</select>px
	</label>
</div>
<div id="accordion-1" style="background: #fff; padding: 2px 0 1px; visibility: hidden; " <?php if( $check_widget_1 == "" ){ echo ' hidden'; } ?>>
	<h3><span class="front-title">cloud:</span> SHAPE & CONTENT</h3>
	<div class="section_content" style="padding-bottom: 0;">
		<span>SHAPE</span>
		<div class="section_content" style="margin: 5px 0 0; padding: 0;">
			<select style="float: left; height: 126px!important; margin: 0 2px 5px 0!important;" title="Multiple selection is alowed. In that case plugin will change shapes every 
			5-15 sec. depending on <span class='green'>Shape/Magic Time</span> value in <span class='green'>TIME & FUNCTIONS</span> section.<br><b>N.B. 1</b> Different shapes define 
			different sets of values in <span class='green'>Number</span> fields below. For multiple selection a general set applies.<br><b>N.B. 2</b> For multiple selection the 
			plugin uses predefined cloud speed so <span class='green'>Initial Speed [x, y, z]</span> values in <span class='green'>SPEED</span> section are ignored." 
			id="<?=$this->get_field_id('shape'); ?>" name="<?=$this->get_field_name('shape'); ?>[]" multiple onchange="change_limits(jQuery(this).val()[0],jQuery(this).val().length)">
				<option value="my_shape" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "my_shape" ){ echo ' selected'; }} ?>>My Shape (Custom)</option>
				<option value="a" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "a" ){ echo ' selected'; }} ?>>A (3D)</option>
				<option value="antenna" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "antenna" ){ echo ' selected'; }} ?>>Antenna* (3D)</option>
				<option value="apple" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "apple" ){ echo ' selected'; }} ?>>Apple - 1 (2D)</option>	
				<option value="apple2" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "apple2" ){ echo ' selected'; }} ?>>Apple - 2 (3D)</option>
				<option value="axes" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "axes" ){ echo ' selected'; }} ?>>Axes (3D)</option>
				<option value="balloon" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "balloon" ){ echo ' selected'; }} ?>>Balloon (3D)</option>
				<option value="balls" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "balls" ){ echo ' selected'; }} ?>>Balls*** (3D)</option>
				<option value="beam" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "beam" ){ echo ' selected'; }} ?>>Beam (1D)</option>
				<option value="blackhole" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "blackhole" ){ echo ' selected'; }} ?>>Black Hole*** (3D)</option>
				<option value="blossom" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "blossom" ){ echo ' selected'; }} ?>>Blossom*** (3D)</option>
				<option value="bowtie" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "bowtie" ){ echo ' selected'; }} ?>>Bowtie*** (3D)</option>
				<option value="bulb" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "bulb" ){ echo ' selected'; }} ?>>Bulb*** (3D)</option>
				<option value="butterfly" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "butterfly" ){ echo ' selected'; }} ?>>Butterfly*** (3D)</option>
				<option value="candy" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "candy" ){ echo ' selected'; }} ?>>Candy*** (3D)</option>
				<option value="capsule" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "capsule" ){ echo ' selected'; }} ?>>Capsule*** (3D)</option>
				<option value="circles" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "circles" ){ echo ' selected'; }} ?>>Circles* (2D)</option>
				<option value="crown" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "crown" ){ echo ' selected'; }} ?>>Crown*** (3D)</option>
				<option value="cube" <?php for($i=0; $i<=sizeof($shape)-1; $i++){ if( $shape[$i] == "cube" || $shape[$i] == "c"){ echo ' selected'; }} ?>>Cube* (3D)</option>
				<option value="hcylinder" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "hcylinder" ){ echo ' selected'; }} ?>>Cylinder, horizontal*** (3D)</option>
				<option value="vcylinder" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "vcylinder" ){ echo ' selected'; }} ?>>Cylinder, vertical*** (3D)</option>
				<option value="dancers" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "dancers" ){ echo ' selected'; }} ?>>Dancers*** (3D)</option>
				<option value="diaminity" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "diaminity" ){ echo ' selected'; }} ?>>Diaminity*** (3D)</option>
				<option value="diamond" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "diamond" ){ echo ' selected'; }} ?>>Diamond (2D)</option>
				<option value="hdna" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "hdna" ){ echo ' selected'; }} ?>>DNA, horizontal (3D)</option>
				<option value="vdna" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "vdna" ){ echo ' selected'; }} ?>>DNA, vertical (3D)</option>
				<option value="domes" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "domes" ){ echo ' selected'; }} ?>>Domes*** (3D)</option>
				<option value="earing" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "earing" ){ echo ' selected'; }} ?>>Earing*** (3D)</option>
				<option value="egg" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "egg" ){ echo ' selected'; }} ?>>Egg*** (3D)</option>
				<option value="eggbox" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "eggbox" ){ echo ' selected'; }} ?>>Egg Box*** (3D)</option>
				<option value="excavator" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "excavator" ){ echo ' selected'; }} ?>>Excavator (2D)</option>
				<option value="fir" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "fir" ){ echo ' selected'; }} ?>>Fir* (3D)</option>
				<option value="fish" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "fish" ){ echo ' selected'; }} ?>>Fish - 1 (2D)</option>
				<option value="fish2" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "fish2" ){ echo ' selected'; }} ?>>Fish - 2*** (2D)</option>
				<option value="glass" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "glass" ){ echo ' selected'; }} ?>>Glass*** (3D)</option>
				<option value="globe" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "globe" ){ echo ' selected'; }} ?>>Globe of Rings (3D)</option>
				<option value="heart" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "heart" ){ echo ' selected'; }} ?>>Heart (2D)</option>
				<option value="hexagon" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "hexagon" ){ echo ' selected'; }} ?>>Hexagon (Bee Cell)* (2D)</option>
				<option value="infinity1" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "infinity1" ){ echo ' selected'; }} ?>>Infinity - 1*** (3D)</option>
				<option value="infinity2" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "infinity2" ){ echo ' selected'; }} ?>>Infinity - 2*** (3D)</option>
				<option value="insect" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "insect" ){ echo ' selected'; }} ?>>Insect*** (3D)</option>
				<option value="knot" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "knot" ){ echo ' selected'; }} ?>>Knot (3D)</option>
				<option value="lemon" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "lemon" ){ echo ' selected'; }} ?>>Lemon*** (3D)</option>
				<option value="lissajous" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "lissajous" ){ echo ' selected'; }} ?>>Lissajous*** (3D)</option>
				<option value="love" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "love" ){ echo ' selected'; }} ?>>Love (3D)</option>
				<option value="m" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "m" ){ echo ' selected'; }} ?>>M (3D)</option>
				<option value="mobius" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "mobius" ){ echo ' selected'; }} ?>>Mobius Fan*** (3D)</option>
				<option value="monster" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "monster" ){ echo ' selected'; }} ?>>Monster*** (3D)</option>
				<option value="n" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "n" ){ echo ' selected'; }} ?>>N (3D)</option>
				<option value="o" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "o" ){ echo ' selected'; }} ?>>O (3D)</option>
				<option value="owl" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "owl" ){ echo ' selected'; }} ?>>Owlish*** (3D)</option>
				<option value="pear" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "pear" ){ echo ' selected'; }} ?>>Pearish (3D)</option>
				<option value="hcones" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "hcones" ){ echo ' selected'; }} ?>>Peg top around X-axis* (3D)</option>
				<option value="vcones" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "vcones" ){ echo ' selected'; }} ?>>Peg top around Y-axis* (3D)</option>
				<option value="pillow" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "pillow" ){ echo ' selected'; }} ?>>Pillow*** (3D)</option>
				<option value="rim" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "rim" ){ echo ' selected'; }} ?>>Rim*** (3D)</option>
				<option value="hring" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "hring" ){ echo ' selected'; }} ?>>Ring around X-axis (3D)</option>
				<option value="vring" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "vring" ){ echo ' selected'; }} ?>>Ring around Y-axis (3D)</option>
				<option value="rings" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "rings" ){ echo ' selected'; }} ?>>Rings Knotwork (3D)</option>
				<option value="roller" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "roller" ){ echo ' selected'; }} ?>>Roller of rings (3D)</option>
				<option value="roundabout" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "roundabout" ){ echo ' selected'; }} ?>>Roundabout*** (3D)</option>
				<option value="sandglass" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "sandglass" ){ echo ' selected'; }} ?>>Sandglass*** (3D)</option>
				<option value="saturn" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "saturn" ){ echo ' selected'; }} ?>>Saturn*** (3D)</option>
				<option value="sphere" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "sphere" ){ echo ' selected'; }} ?>>Sphere*** (3D)</option>
				<option value="spiral" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "spiral" ){ echo ' selected'; }} ?>>Spiral* (2D)</option>
				<option value="spiral3" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "spiral3" ){ echo ' selected'; }} ?>>Spring (3D)</option>
				<option value="square" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "square" ){ echo ' selected'; }} ?>>Square* (2D)</option>
				<option value="stairs" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "stairs" ){ echo ' selected'; }} ?>>Staircase (3D)</option>
				<option value="star" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "star" ){ echo ' selected'; }} ?>>Star - 1 (2D)</option>
				<option value="star2" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "star2" ){ echo ' selected'; }} ?>>Star - 2*** (3D)</option>
				<option value="starwars1" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "starwars1" ){ echo ' selected'; }} ?>>Star Wars - 1*** (3D)</option>
				<option value="starwars2" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "starwars2" ){ echo ' selected'; }} ?>>Star Wars - 2*** (3D)</option>
				<option value="starwars3" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "starwars3" ){ echo ' selected'; }} ?>>Star Wars - 3*** (3D)</option>
				<option value="starwars4" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "starwars4" ){ echo ' selected'; }} ?>>Star Wars - 4*** (3D)</option>
				<option value="stool" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "stool" ){ echo ' selected'; }} ?>>Stool*** (3D)</option>
				<option value="teardrop" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "teardrop" ){ echo ' selected'; }} ?>>Teardrop (2D)</option>
				<option value="tire" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "tire" ){ echo ' selected'; }} ?>>Tire*** (3D)</option>
				<option value="torus" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "torus" ){ echo ' selected'; }} ?>>Torus*** (3D)</option>
				<option value="tower" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "tower" ){ echo ' selected'; }} ?>>Tower of rings (3D)</option>
				<option value="triangle" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "triangle" ){ echo ' selected'; }} ?>>Triangle* (2D)</option>
				<option value="pyramid" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "pyramid" ){ echo ' selected'; }} ?>>Triangle Pyramid* (3D)</option>
				<option value="ufo" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "ufo" ){ echo ' selected'; }} ?>>UFO*** (3D)</option>
				<option value="v" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "v" ){ echo ' selected'; }} ?>>V (3D)</option>
				<option value="w" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "w" ){ echo ' selected'; }} ?>>W (3D)</option>
				<option value="wall_e" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "wall_e" ){ echo ' selected'; }} ?>>Wall-E's Eyes*** (3D)</option>
				<option value="walnut" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "walnut" ){ echo ' selected'; }} ?>>Walnut*** (3D)</option>
				<option value="wings" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "wings" ){ echo ' selected'; }} ?>>Wings*** (3D)</option>
				<option value="x" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "x" ){ echo ' selected'; }} ?>>X (3D)</option>
				<option value="y" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "y" ){ echo ' selected'; }} ?>>Y (3D)</option>
				<option value="yinyang" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "yinyang" ){ echo ' selected'; }} ?>>Yin Yangish*** (3D)</option>
				<option value="zs" <?php for($i=0; $i<=sizeof($shape)-1; $i++){if( $shape[$i] == "zs" ){ echo ' selected'; }} ?>>Z/S (3D)</option>
			</select>
			<div style="text-align: justify; padding: 0 2px 0 0;">
				<div style="margin: 5px 0 0;">
					Get shape selection tips at <span style='font-weight: bold; color: #dc143c;'>GUIDE<span style="font-size: 6px;"> </span>&<span style="font-size: 6px;"> 
					</span>TIPS</span><span style="font-size: 6px;"> </span>><span style="font-size: 6px;"> </span><span style='font-weight: bold; color: #444;'>Shape
					<span style="font-size: 5px;"> </span>Tips</span>.
				</div>
				<br>
				<b style="font-size: 12px!important;">Legend:</b><br>
				<b style="font-size: 26px; line-height: 5px; position: relative; top: 10px;">*</b> Shapes that use specific number of tags.<br>
				<b style="font-size: 26px; line-height: 5px; position: relative; top: 10px;">***</b> Shapes suitable for the 'Magic' option.<br>
			</div>
		</div>
		<div style="width: 337px; display: inline-block; border-bottom: 1px solid #aaa; margin: 0 0 5px;">
			<label style="width: 100%; margin: 0 0 5px; display: inline-block;" title="<span class='green'>My Shape</span> option from the above combo box needs a js file with your 
			<span class='green'>my_shape()</span> named function. Enter here the URL of that js file. For example:<br><span>http://your-domain.com/your-js-folder/your-file.js</span>.,<br>If <span class='green'>My Shape</span> is selected and no URL is entered, plugin loads the default shape (<span class='green'>Cube</span>)." for="<?=$this->get_field_id('my_shape_url'); ?>">
				My Shape URL 
				<input style="margin: 0; width: 100%;"
				id="<?=$this->get_field_id('my_shape_url'); ?>"
				name="<?=$this->get_field_name('my_shape_url'); ?>" type="text"
				value="<?php echo $my_shape_url; ?>" /> 
			</label>
			<div style="clear: both; padding: 0 0 5px 0;" title="My Shape Function takes 4 standard arguments:<br><span class='green'>n</span> - number of tags to position,<br><span 
			class='green'>xr</span> - X radius,<br><span class='green'>yr</span> - Y radius and<br><span class='green'>zr</span> - Z radius.<br>The function must return an array 
			containing <span class='green'>n</span> entries, each entry being an array of X,Y,Z coordinates, e.g. for n == 2, the array returned could be [[1,2,3], [3,1,5]].<br>
			<strong>N.B.</strong> X is left-right, Y is top-bottom & Z is front-back.<br>Example (Sphere):<br><br>function my_shape(n, xr, yr, zr){<br>
			&nbsp;var i, y, r, p=[], inc=Math.PI*(3-Math.sqrt(5)), off=2/n;<br>&nbsp;for(i = 0; i &lt; n; ++i) {<br>&nbsp; y = i*off-1+(off/2);<br>&nbsp; r = Math.sqrt(1-y*y);<br>
			&nbsp; p.push([Math.cos(i*inc)*r*xr, y*yr, Math.sin(i*inc)*r*zr]);<br>&nbsp;}<br>&nbsp;return p;<br>}">
				<span style="color: #dc143c; font-weight: bold;">Hover</span> to see a my_shape() function example.
			</div>
		</div>
		<table style="margin-bottom: 0;">
			<tr>
				<td style="width: 110px; padding: 0; vertical-align: top;" title="">
					<div style="width: 100%;">
						<span>CONTENT</span>
						<div style="padding: 15px 0 0 0;">
							<div class="nishka" style="margin-top: 0;">
								<input  class="radio" style="margin: 4px 1px 4px 0;" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays most recent posts. Font Size 
								weighting is provided for all <span class='green'>Weight Mode</span> options except for <span class='green'>none</span>. As older a post is, as 
								smaller its title font is. Combine with the <span class='green'>Posts Category</span> and <span class='green'>Number</span> options on 
								the right."
								name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="recent_posts"
								<?php if( $taxonomy == "recent_posts" ){ echo ' checked="checked"'; } ?>>Recent Posts
								<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka">
								<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays bookmarks found in the WP Admin Panel: 
								<span class='green'>Links</span>. Font Size weighting is provided for all  <span class='green'>Weight Mode</span> options except for 
								<span class='green'>none</span>. Font size of the Links is calculated in accordance with their position in the list: The last in it has the smallest font 
								size. Combine with the <span class='green'>Links Category</span> and <span class='green'>Number</span> options on the right."
								name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="links"
								<?php if( $taxonomy == "links" ){ echo ' checked="checked"'; } ?>>Blogroll
								<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka">
								<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a navigation menu created via WP Admin 
								Panel:  <span style='font-weigt: bold'>Appearance > Menus</span>.<br><span class='green'>Accordions</span>, <span class='green'>Portfolio Categories</span>, 
								<span class='green'>Portfolio Items</span>, <span class='green'>Portfolio Filters</span>, <span class='green'>Slider Categories</span> and/or 
								<span class='green'>Slider Items</span> can be selected via this option - see <span style='font-weight: bold; color: #dc143c;'>GUIDE & TIPS</span>
								<span style='font-weight: bold;'> > Cloud Content Tips</span> section, <span style='font-weight: bold;'>item 5</span>.<br><span class='green'>Weight Mode</span> 
								is not applicable to this option. Combine with the <span class='green'>Name</span> option on the right."
								name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="menu"
								<?php if( $taxonomy == "menu" ){ echo ' checked="checked"'; } ?>>Menu
								<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka">
								<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a list of categories created in the WP Admin Panel: 
								<span class='green'>Posts</span> <span style='font-size: 18px;'>&#8594;</span>  <span class='green'>Categories</span>. 
								Combine with the <span class='green'>Number</span> and <span class='green'>Counter</span> options on the right."
								name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="category"
								<?php if( $taxonomy == "category" ){ echo ' checked="checked"'; } ?>>Categories
								<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka">
								<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a list of post tags. Combine with the 
								<span class='green'>Number</span> and <span class='green'>Counter</span> options on the right."
								name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="post_tag"
								<?php if( $taxonomy == "post_tag" ){ echo ' checked="checked"'; } ?>>Post Tags
								<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>						
							<div class="nishka">
							<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a list of archives. 
							Combine with the <span class='green'>Number</span> option on the right."
							name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="archives"
							<?php if( $taxonomy == "archives" ){ echo ' checked="checked"'; } ?>>Archives
							<span style="font-size: 18px; line-height: 12px; float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka">
							<input style="margin: 4px 1px 4px 0 ;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a list of pages. 
							<span class='green'>Weight Mode</span> is not applicable to this option. Combine with the <span class='green'>Number</span> option on the right."
							name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="pages"
							<?php if( $taxonomy == "pages" ){ echo ' checked="checked"'; } ?>>Pages
							<span style="font-size: 18px; line-height: 12px;  float: right; padding: 3px 0 0 0;">&#8594;</span>
							</div>
							<div class="nishka" style="margin-bottom: 5px;">
							<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays a list of authors. Combine with the 
							<span class='green'>Number</span> and <span class='green'>Exclude</span> options on the right."
							name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="authors"
							<?php if( $taxonomy == "authors" ){ echo ' checked="checked"'; } ?>>Authors
							<span style="font-size: 18px; line-height: 12px;  float: right; padding: 3px 0 0 0;">&#8594;</span>	
							</div>
							<div class="nishka" style="margin-bottom: 5px;">
							<input style="margin: 4px 1px 4px 0;" class="radio" id="<?=$this->get_field_id('taxonomy'); ?>" title="Displays all Links in the current Page/Post. Combine with the 
							<span class='green'>Custom Container ID</span> on the right for displaying links from specified HTML container."
							name="<?=$this->get_field_name('taxonomy'); ?>" type="radio" value="pp_links"
							<?php if( $taxonomy == "pp_links" ){ echo ' checked="checked"'; } ?>>Page/Post Links
							</div>
						</div>
					</div>
				</td >
				<td style="vertical-align: top;">
						<label style="margin: 18px 3px 0 0; line-height: 13px;" title="Post Category to be displayed." for="<?=$this->get_field_id('rp_category_id'); ?>">
							Post Category
							<br>
							<select style="width: auto; max-width: 175px;" id="<?=$this->get_field_id('rp_category_id'); ?>" name="<?=$this->get_field_name('rp_category_id'); ?>">
								<option value="" <?php if( $rp_category_id == ""){ echo ' selected'; } ?>>all</option>
								<?php
									$terms_category = get_terms("category");
									 if ( !empty( $terms_category ) && !is_wp_error( $terms_category ) ){
										 foreach ( $terms_category as $term ) {
											echo "<option value='" . $term->term_id . "'";
											if( $rp_category_id == $term->term_id ) { echo " selected" ; };
											echo ">" . $term->name . "</option>";
										 }
									 }
								?>
							</select>
						</label>
						<label style="width: 54px; float: right; display: block; line-height: 13px; margin: 18px 0 0 0;" title="Maximum number of recent posts to display"for="<?=$this->get_field_id('recent_posts'); ?>">
							Number
							<br>
							<select id="<?=$this->get_field_id('recent_posts'); ?>" name="<?=$this->get_field_name('recent_posts'); ?>">
								<?php 
									switch($shape){
										case "spiral":
											$spiral_rec = 0;
											for($i=8; $i<36; $i+=7){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $spiral_rec = 1;} else{if($i==29&&$spiral_rec==0){echo ' selected'; $spiral_rec = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "hexagon":
											$hexagon_rec = 0;
											for($i=1; $i<3; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="rp_' . $calc . '" value="' . $calc  . '"'; if($recent_posts=$calc ){echo ' selected'; $hexagon_rec = 1;} else{if($i==2&&$hexagon_rec==0){echo ' selected'; $hexagon_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "cube":
											$cube_rec = 0;
											for($i=0; $i<2; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="rp_' . $calc . '" value="' . $calc  . '"'; if($recent_posts==$calc ){echo ' selected'; $cube_rec = 1;} else{if($i==1&&$cube_rec==0){echo ' selected'; $cube_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "pyramid":
											$pyramid_rec = 0;
											for($i=1; $i<4; $i++){$calc = 2*$i*$i+2; echo '<option id="rp_' . $calc . '" value="' . $calc  . '"'; if($recent_posts==$calc ){echo ' selected'; $pyramid_rec = 1;} else{if($i==3&&$pyramid_rec==0){echo ' selected'; $pyramid_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "circles":
											$circles_rec = 0;
											for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $circles_rec = 1;} else{if($i==4&&$circles_rec==0){echo ' selected'; $circles_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "antenna":
											$antenna_rec = 0;
											for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $antenna_rec = 1;} else{if($i==4&&$antenna_rec==0){echo ' selected'; $antenna_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "beam":
											$beam_rec = 0;
											for($i=5; $i<15; $i+=5){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $beam_rec = 1;} else{if($i==10&&$beam_rec==0){echo ' selected'; $beam_rec = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "axes":
											$axes_rec = 0;
											for($i=6; $i<30; $i+=6){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $axes_rec = 1;} else{if($i==24&&$axes_rec==0){echo ' selected'; $axes_rec = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "vcones":
											$vcones_rec = 0;
											for($i=2; $i<4; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $vcones_rec = 1;} else{if($i==3&&$vcones_rec==0){echo ' selected'; $vcones_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "hcones":
											$hcones_rec = 0;
											for($i=2; $i<4; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $hcones_rec = 1;} else{if($i==3&&$hcones_rec==0){echo ' selected'; $hcones_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "square":
											$square_rec = 0;
											for($i=2; $i<6; $i++){echo '<option id="rp_' . $i*$i . '" value="' . $i*$i . '"'; if($recent_posts==$i*$i){echo ' selected'; $square_rec = 1;} else{if($i==5&&$square_rec==0){echo ' selected'; $square_rec = 1;}}; echo '>' . $i*$i . '</option>'; };
											break;
										case "fir":
											$fir_rec = 0;
											for($i=1; $i<4; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $fir_rec = 1;} else{if($i==3&&$fir_rec==0){echo ' selected'; $fir_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "triangle":
											$triangle_rec = 0;
											for($i=3; $i<7; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="rp_' . $calc . '" value="' . $calc . '"'; if($recent_posts==$calc){echo ' selected'; $triangle_rec = 1;} else{if($i==6&&$triangle_rec==0){echo ' selected'; $triangle_rec = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "heart":
											$heart_rec = 0;
											for($i=12; $i<36; $i+=12){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $heart_rec = 1;} else{if($i==24&&$heart_rec==0){echo ' selected'; $heart_rec = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "love":
											$love_rec = 0;
											for($i=24; $i<48; $i+=12){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $love_rec = 1;} else{if($i==36&&$love_rec==0){echo ' selected'; $love_rec = 1;}}; echo '>' . $i . '</option>'; };
											break;
										default:
											$default_rec = 0;
											for($i=5; $i<26; $i++){echo '<option id="rp_' . $i . '" value="' . $i . '"'; if($recent_posts==$i){echo ' selected'; $default_rec = 1;} else{if($i==25&&$default_rec==0){echo ' selected'; $default_rec = 1;}}; echo '>' . $i . '</option>'; };
									}	
								?>
							</select>
						</label>
						<label style="margin: 2px 0 0 0; line-height: 13px;" title="Links Category to be displayed." for="<?=$this->get_field_id('links_category_id'); ?>">
						Links Category
						<br>
						<select style="width: auto; max-width: 170px;" id="<?=$this->get_field_id('links_category_id'); ?>" name="<?=$this->get_field_name('links_category_id'); ?>">
							<option value="" <?php if( $links_category_id == ""){ echo ' selected'; } ?>>all</option>
							<?php
								$terms_link = get_terms("link_category");
								 if ( !empty( $terms_link ) && !is_wp_error( $terms_link ) ){
									 foreach ( $terms_link as $term ) {
										echo "<option value='" . $term->term_id . "'";
										if( $links_category_id == $term->term_id ) { echo " selected" ; };
										echo ">" . $term->name . "</option>";
									 }
								 }
							?>
						</select>
						</label>
						<label style="margin: 2px 0 0 0; float: right; width: 54px; display: block; line-height: 13px;" title="Maximum number of links to display" for="<?=$this->get_field_id('links'); ?>">
							Number
							<br>
							<select id="<?=$this->get_field_id('links'); ?>" name="<?=$this->get_field_name('links'); ?>">
								<?php 
									switch($shape){
										case "spiral":
											$spiral_lin = 0;
											for($i=8; $i<127; $i+=7){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $spiral_lin = 1;} else{if($i==99&&$spiral_lin==0){echo ' selected'; $spiral_lin = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "hexagon":
											$hexagon_lin = 0;
											for($i=1; $i<6; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="l_' . $calc . '" value="' . $calc  . '"'; if($links==$calc ){echo ' selected'; $hexagon_lin = 1;} else{if($i==5&&$hexagon_lin==0){echo ' selected'; $hexagon_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "cube":
											$cube_lin = 0;
											for($i=0; $i<4; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="l_' . $calc . '" value="' . $calc  . '"'; if($links==$calc ){echo ' selected'; $cube_lin = 1;} else{if($i==3&&$cube_lin==0){echo ' selected'; $cube_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "pyramid":
											$pyramid_lin = 0;
											for($i=1; $i<8; $i++){$calc = 2*$i*$i+2; echo '<option id="l_' . $calc . '" value="' . $calc  . '"'; if($links==$calc ){echo ' selected'; $pyramid_lin = 1; } else{if($i==7&&$pyramid_lin==0){echo ' selected'; $pyramid_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "circles":
											$circles_lin = 0;
											for($i=2; $i<7; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $circles_lin = 1;} else{if($i==6&&$circles_lin==0){echo ' selected'; $circles_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "antenna":
											$antena_lin = 0;
											for($i=2; $i<7; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $antena_lin = 1;} else{if($i==6&&$antena_lin==0){echo ' selected'; $antena_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "beam";
											$beam_lin = 0;
											for($i=5; $i<15; $i+=5){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $beam_lin = 1;} else{if($i==10&&$beam_lin==0){echo ' selected'; $beam_lin = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "axes";
											$axes_lin = 0;
											for($i=6; $i<126; $i+=6){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $axes_lin = 1;} else{if($i==102&&$axes_lin==0){echo ' selected'; $axes_lin = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "vcones";
											$vcones_lin = 0;
											for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $vcones_lin = 1; } else{if($i==5&&$vcones_lin==0){echo ' selected'; $vcones_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "hcones";
											$hcones_lin = 0;
											for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $hcones_lin = 1; } else{if($i==5&&$hcones_lin==0){echo ' selected'; $hcones_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "square";
											$square_lin = 0;
											for($i=2; $i<11; $i++){echo '<option id="l_' . $i*$i . '" value="' . $i*$i . '"'; if($links==$i*$i){echo ' selected'; $square_lin = 1;} else{if($i==10&&$square_lin==0){echo ' selected'; $square_lin = 1;}}; echo '>' . $i*$i . '</option>'; };
											break;
										case "fir";
											$fir_lin = 0;
											for($i=1; $i<8; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $fir_lin = 1;} else{if($i==7&&$fir_lin==0){echo ' selected'; $fir_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "triangle";
											$triangle_lin = 0;
											for($i=3; $i<15; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="l_' . $calc . '" value="' . $calc . '"'; if($links==$calc){echo ' selected'; $triangle_lin = 1;} else{if($i==14&&$triangle_lin==0){echo ' selected'; $triangle_lin = 1;}}; echo '>' . $calc . '</option>'; };
											break;
										case "heart";
											$heart_lin = 0;
											for($i=12; $i<60; $i+=12){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $heart_lin = 1;} else{if($i==48&&$heart_lin==0){echo ' selected'; $heart_lin = 1;}}; echo '>' . $i . '</option>'; };
											break;
										case "love";
											$love_lin = 0;
											for($i=24; $i<72; $i+=12){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $love_lin = 1;} else{if($i==60&&$love_lin==0){echo ' selected'; $love_lin = 1;}}; echo '>' . $i . '</option>'; };
											break;
										default:
											$default_lin = 0;
											for($i=5; $i<125; $i+=5){echo '<option id="l_' . $i . '" value="' . $i . '"'; if($links==$i){echo ' selected'; $default_lin = 1;} else{if($i==100&&$default_lin==0){echo ' selected'; $default_lin = 1;}}; echo '>' . $i . '</option>'; };
//											echo '<option id="l_125"'; if($links=='-1'){echo ' selected';}; echo ' value="-1">all</option>';
									}
								?>
							</select>
						</label> 
						<label style="margin: 2px 0 0 0; width: 180px; line-height: 13px;" title="The menu to be displayed" for="<?=$this->get_field_id('menu'); ?>">
							Name
							<br>
							<select style="width: auto; max-width: 175px;" id="<?=$this->get_field_id('menu'); ?>" name="<?=$this->get_field_name('menu'); ?>">
							<?php
								$terms_menu = get_terms("nav_menu");
								 if ( !empty( $terms_menu ) && !is_wp_error( $terms_menu ) ){
									 foreach ( $terms_menu as $term ) {
										echo "<option value='" . $term->term_id . "'";
										if( $menu == $term->term_id ) { echo " selected" ; };
										echo ">" . $term->name . "</option>";
									 }
								 }
							?>
							</select>
						</label>
						<br>
					<label style="margin: 2px 5px 0 0; line-height: 13px;" title="Maximum number of categories to display" for="<?=$this->get_field_id('categories'); ?>">
						Number
						<br>
						<select id="<?=$this->get_field_id('categories'); ?>" name="<?=$this->get_field_name('categories'); ?>">
							<?php 
								switch($shape){
									case "spiral":
										$spiral_cat = 0;
										for($i=8; $i<71; $i+=7){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $spiral_cat = 1;} else{if($i==64&&$spiral_cat==0){echo ' selected'; $spiral_spiralcat = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "hexagon":
										$hexagon_cat = 0;
										for($i=1; $i<5; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="c_' . $calc . '" value="' . $calc  . '"'; if($categories==$calc ){echo ' selected'; $hexagon_cat = 1;} else{if($i==4&&$hexagon_cat==0){echo ' selected'; $hexagon_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "cube":
										$cube_cat = 0;
										for($i=0; $i<3; $i++){$calc = 6*$i*$i+12*$i+8 ; echo '<option id="c_' . $calc . '" value="' . $calc  . '"'; if($categories==$calc ){echo ' selected'; $cube_cat = 1;} else{if($i==2&&$cube_cat==0){echo ' selected'; $cube_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "pyramid":
										$pyramid_cat = 0;
										for($i=1; $i<7; $i++){$calc = 2*$i*$i+2; echo '<option id="c_' . $calc . '" value="' . $calc  . '"'; if($categories==$calc ){echo ' selected'; $pyramid_cat = 1;} else{if($i==6&&$pyramid_cat==0){echo ' selected'; $pyramid_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "circles":
										$circles_cat = 0;
										for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $circles_cat = 1;} else{if($i==5&&$circles_cat==0){echo ' selected'; $circles_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "antenna":
										$antenna_cat = 0;
										for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $antenna_cat = 1;} else{if($i==5&&$antenna_cat==0){echo ' selected'; $antenna_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "beam":
										$beam_cat = 0;
										for($i=5; $i<15; $i+=5){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $beam_cat = 1;} else{if($i==10&&$beam_cat==0){echo ' selected'; $beam_cat = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "axes":
										$axes_cat = 0;
										for($i=6; $i<66; $i+=6){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $axes_cat = 1;} else{if($i==60&&$axes_cat==0){echo ' selected'; $axes_cat = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "vcones":
										$vcones_cat = 0;
										for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $vcones_cat = 1;} else{if($i==4&&$vcones_cat==0){echo ' selected'; $vcones_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "hcones":
										$hcones_cat = 0;
										for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $hcones_cat = 1;} else{if($i==4&&$hcones_cat==0){echo ' selected'; $hcones_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "square":
										$square_cat = 0;
										for($i=2; $i<9; $i++){echo '<option id="c_' . $i*$i . '" value="' . $i*$i . '"'; if($categories==$i*$i){echo ' selected'; $square_cat = 1;} else{if($i==8&&$square_cat==0){echo ' selected'; $square_cat = 1;}}; echo '>' . $i*$i . '</option>'; };
										break;
									case "fir":
										$fir_cat = 0;
										for($i=1; $i<6; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $fir_cat = 1;} else{if($i==5&&$fir_cat==0){echo ' selected'; $fir_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "triangle":
										$triangle_cat = 0;
										for($i=3; $i<12; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="c_' . $calc . '" value="' . $calc . '"'; if($categories==$calc){echo ' selected'; $triangle_cat = 1;} else{if($i==11&&$triangle_cat==0){echo ' selected'; $triangle_cat = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "heart":
										$heart_cat = 0;
										for($i=12; $i<60; $i+=12){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $heart_cat = 1;} else{if($i==48&&$heart_cat==0){echo ' selected'; $heart_cat = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "love":
										$love_cat = 0;
										for($i=24; $i<72; $i+=12){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $love_cat = 1;} else{if($i==60&&$love_cat==0){echo ' selected'; $love_cat = 1;}}; echo '>' . $i . '</option>'; };
										break;
									default:
										$default_cat = 0;
										for($i=5; $i<65; $i+=5){echo '<option id="c_' . $i . '" value="' . $i . '"'; if($categories==$i){echo ' selected'; $default_cat = 1;} else{if($i==60&&$default_cat==0){echo ' selected'; $default_cat = 1;}}; echo '>' . $i . '</option>'; };
//										echo '<option id="c_65"'; if($categories=='0'){echo ' selected';}; echo ' value="0">all</option>';
								}
							?>
						</select>
					</label> 
					<div style="float: left; margin: 2px 106px 1px 7px;" title="Displays number of posts in categories.">
						Counter
						<br>
						<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('numberop'); ?>"
						name="<?=$this->get_field_name('numberop'); ?>" type="radio" value="true"
						<?php if( $numberop == "true" ){ echo ' checked="checked"'; } ?>>on
						
						<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('numberop'); ?>"
						name="<?=$this->get_field_name('numberop'); ?>" type="radio" value="false"
						<?php if( $numberop == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
					<label style="margin: 2px 5px 0 0; line-height: 13px;" title="Maximum number of tags to display: Zero (0) loads all tags." for="<?=$this->get_field_id('tags'); ?>">
						Number
						<br>
						<select id="<?=$this->get_field_id('tags'); ?>" name="<?=$this->get_field_name('tags'); ?>">
							<?php 
								switch($shape){
									case "spiral":
										$spiral_pos = 0;
										for($i=8; $i<127; $i+=7){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $spiral_pos = 1;} else{if($i==120&&$spiral_pos==0){echo ' selected'; $spiral_pos = 1;}}; echo '>' . $i . '</option>'; };
										break;
										$hexagon_pos = 0;
									case "hexagon":
										for($i=1; $i<7; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="t_' . $calc . '" value="' . $calc  . '"'; if($tags==$calc ){echo ' selected'; $hexagon_pos = 1;} else{if($i==6&&$hexagon_pos==0){echo ' selected'; $hexagon_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "cube":
										$cube_pos = 0;
										for($i=0; $i<5; $i++){$calc = 6*$i*$i+12*$i+8 ; echo '<option id="t_' . $calc . '" value="' . $calc  . '"'; if($tags==$calc ){echo ' selected'; $cube_pos = 1;} else{if($i==4&&$cube_pos==0){echo ' selected'; $cube_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "pyramid":
										$pyramid_pos = 0;
											for($i=1; $i<9; $i++){$calc = 2*$i*$i+2; echo '<option id="t_' . $calc . '" value="' . $calc  . '"'; if($tags==$calc ){echo ' selected'; $pyramid_pos = 1;} else{if($i==8&&$pyramid_pos==0){echo ' selected'; $pyramid_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "circles":
										$circles_pos = 0;
										for($i=2; $i<8; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $circles_pos = 1;} else{if($i==7&&$circles_pos==0){echo ' selected'; $circles_pos = 1;}}; echo '>' . $calc . '</option>'; };	
										break;
									case "antenna":
										$antenna_pos = 0;
										for($i=2; $i<8; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $antenna_pos = 1;} else{if($i==7&&$antenna_pos==0){echo ' selected'; $antenna_pos = 1;}}; echo '>' . $calc . '</option>'; };	
										break;
									case "beam":
										$beam_pos = 0;
										for($i=5; $i<15; $i+=5){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $beam_pos = 1;} else{if($i==10&&$beam_pos==0){echo ' selected'; $beam_pos = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "axes":
										$axes_pos = 0;
										for($i=6; $i<126; $i+=6){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $axes_pos = 1;} else{if($i==120&&$axes_pos==0){echo ' selected'; $axes_pos = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "vcones":
										$vcones_pos = 0;
										for($i=2; $i<7; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $vcones_pos = 1;} else{if($i==6&&$vcones_pos==0){echo ' selected'; $vcones_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "hcones":
										$hcones_pos = 0;
										for($i=2; $i<7; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $hcones_pos = 1;} else{if($i==6&&$hcones_pos==0){echo ' selected'; $hcones_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "square":
										$square_pos = 0;
										for($i=2; $i<12; $i++){echo '<option id="t_' . $i*$i . '" value="' . $i*$i . '"'; if($tags==$i*$i){echo ' selected'; $square_pos = 1;} else{if($i==11&&$square_pos==0){echo ' selected'; $square_pos = 1;}}; echo '>' . $i*$i . '</option>'; };
										break;
									case "fir":
										$fir_pos = 0;
										for($i=1; $i<9; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $fir_pos = 1;} else{if($i==8&&$fir_pos==0){echo ' selected'; $fir_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "triangle":
										$triangle_pos = 0;
										for($i=3; $i<16; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="t_' . $calc . '" value="' . $calc . '"'; if($tags==$calc){echo ' selected'; $triangle_pos = 1;} else{if($i==15&&$triangle_pos==0){echo ' selected'; $triangle_pos = 1;}}; echo '>' . $calc . '</option>'; };
										break;
									case "heart":
										$heart_pos = 0;
										for($i=12; $i<60; $i+=12){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $heart_pos = 1;} else{if($i==48&&$heart_pos==0){echo ' selected'; $heart_pos = 1;}}; echo '>' . $i . '</option>'; };
										break;
									case "love":
										$love_pos = 0;
										for($i=24; $i<72; $i+=12){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $love_pos = 1;} else{if($i==60&&$love_pos==0){echo ' selected'; $love_pos = 1;}}; echo '>' . $i . '</option>'; };
										break;
									default:
										$default_pos = 0;
										for($i=0; $i<125; $i+=5){echo '<option id="t_' . $i . '" value="' . $i . '"'; if($tags==$i){echo ' selected'; $default_pos = 1;} else{if($i==120&&$default_pos==0){echo ' selected'; $default_pos = 1;}}; echo '>' . $i . '</option>'; };
//										echo '<option id="t_125"'; if($tags=='0'){echo ' selected';}; echo ' value="0">all</option>';
								}
							?>
						</select>
					</label>
					<div style="float: left; margin: 2px 99px 1px 7px;" title="Displays number of posts where a tag is used.">
						Counter
						<br>
						<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('numberot'); ?>"
						name="<?=$this->get_field_name('numberot'); ?>" type="radio" value="true"
						<?php if( $numberot == "true" ){ echo ' checked="checked"'; } ?>>on
						
						<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('numberot'); ?>"
						name="<?=$this->get_field_name('numberot'); ?>" type="radio" value="false"
						<?php if( $numberot == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
					<label style="width: 220px; line-height: 13px; margin: 2px 0 0 0;" title="Maximum number of archives to display" for="<?=$this->get_field_id('archives_limit'); ?>">
						<span style="margin-right: 5px; font-weight: normal;">Number</span>
						<br>	
						<select id="<?=$this->get_field_id('archives_limit'); ?>" name="<?=$this->get_field_name('archives_limit'); ?>">
						<?php 
							switch($shape){
								case "spiral":
									$spiral_arc = 0;
									for($i=8; $i<71; $i+=7){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $spiral_arc = 1;} else{if($i==64&&$spiral_arc==0){echo ' selected'; $spiral_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "hexagon":
									$hexagon_arc = 0;
									for($i=1; $i<5; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="arli_' . $calc . '" value="' . $calc  . '"'; if($archives_limit==$calc ){echo ' selected'; $hexagon_arc = 1;} else{if($i==4&&$hexagon_arc==0){echo ' selected'; $hexagon_arc = 1;}}; echo '>' . $calc. '</option>'; };
									break;
								case "cube":
									$cube_arc = 0;
									for($i=0; $i<3; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="arli_' . $calc . '" value="' . $calc  . '"'; if($archives_limit==$calc ){echo ' selected'; $cube_arc = 1;} else{if($i==2&&$cube_arc==0){echo ' selected'; $cube_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "pyramid":
									$pyramid_arc = 0;
									for($i=1; $i<7; $i++){$calc = 2*$i*$i+2; echo '<option id="arli_' . $calc . '" value="' . $calc  . '"'; if($archives_limit==$calc ){echo ' selected'; $pyramid_arc = 1;} else{if($i==6&&$pyramid_arc==0){echo ' selected'; $pyramid_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "circles":
									$circles_arc = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $circles_arc = 1;} else{if($i==5&&$circles_arc==0){echo ' selected'; $circles_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "antenna":
									$antenna_arc = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $antenna_arc = 1;} else{if($i==5&&$antenna_arc==0){echo ' selected'; $antenna_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "beam":
									$beam_arc = 0;
									for($i=5; $i<15; $i+=5){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $beam_arc = 1;} else{if($i==10&&$beam_arc==0){echo ' selected'; $beam_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "axes":
									$axes_arc = 0;
									for($i=6; $i<66; $i+=6){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $axes_arc = 1;} else{if($i==60&&$axes_arc==0){echo ' selected'; $axes_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "vcones":
									$vcones_arc = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $vcones_arc = 1;} else{if($i==4&&$vcones_arc==0){echo ' selected'; $vcones_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "hcones":
									$hcones_arc = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $hcones_arc = 1;} else{if($i==4&&$hcones_arc==0){echo ' selected'; $hcones_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "square":
									$square_arc = 0;
									for($i=2; $i<9; $i++){echo '<option id="arli_' . $i*$i . '" value="' . $i*$i . '"'; if($archives_limit==$i*$i){echo ' selected'; $square_arc = 1;} else{if($i==8&&$square_arc==0){echo ' selected'; $square_arc = 1;}}; echo '>' . $i*$i . '</option>'; };
									break;
								case "fir":
									$fir_arc = 0;
									for($i=1; $i<6; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $fir_arc = 1;} else{if($i==5&&$fir_arc==0){echo ' selected'; $fir_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "triangle":
									$triangle_arc = 0;
									for($i=3; $i<12; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="arli_' . $calc . '" value="' . $calc . '"'; if($archives_limit==$calc){echo ' selected'; $triangle_arc = 1;} else{if($i==11&&$triangle_arc==0){echo ' selected'; $triangle_arc = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "heart":
									$heart_arc = 0;
									for($i=12; $i<60; $i+=12){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $heart_arc = 1;} else{if($i==48&&$heart_arc==0){echo ' selected'; $heart_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "love":
									$love_arc = 0;
									for($i=24; $i<72; $i+=12){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $kove_arc = 1;} else{if($i==60&&$love_arc==0){echo ' selected'; $love_arc = 1;}}; echo '>' . $i . '</option>'; };
									break;
								default:
									$default_arc = 0;
									for($i=6; $i<66; $i+=6){echo '<option id="arli_' . $i . '" value="' . $i . '"'; if($archives_limit==$i){echo ' selected'; $default_arc = 1;} else{if($i==60&&$default_arc==0){echo ' selected'; $default_arc = 1;}}; echo '>' . $i . '</option>'; };
//									echo '<option id="arli_66"'; if($archives_limit==''){echo ' selected';}; echo ' value="">all</option>';
							}
						?>
						</select>
					</label>
					<label style="width: 220px; line-height: 13px; margin: 2px 0 0 0;" title="Maximum number of pages to display" for="<?=$this->get_field_id('pages_limit'); ?>">
						<span style="margin-right: 5px; font-weight: normal;">Number</span>
						<br> 
						<select id="<?=$this->get_field_id('pages_limit'); ?>" name="<?=$this->get_field_name('pages_limit'); ?>">
						<?php 
							switch($shape){
								case "spiral":
									$spiral_pag = 0;
									for($i=8; $i<57; $i+=7){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $spiral_pag = 1;} else{if($i==50&&$spiral_pag==0){echo ' selected'; $spiral_pag = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "hexagon":
									$hexagon_pag = 0;
									for($i=1; $i<4; $i++){$calc = 3*$i*$i+3*$i+1; echo '<option id="pali_' . $calc . '" value="' . $calc  . '"'; if($pages_limit==$calc ){echo ' selected'; $hexagon_pag = 1;} else{if($i==3&&$hexagon_pag==0){echo ' selected'; $hexagon_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "cube":
									$cube_pag = 0;
									for($i=0; $i<2; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="pali_' . $calc . '" value="' . $calc  . '"'; if($pages_limit==$calc ){echo ' selected'; $cube_pag = 1;} else{if($i==1&&$cube_pag==0){echo ' selected'; $cube_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "pyramid":
									$pyramid_pag = 0;
									for($i=1; $i<6; $i++){$calc = 2*$i*$i+2; echo '<option id="pali_' . $calc . '" value="' . $calc  . '"'; if($pages_limit==$calc ){echo ' selected'; $pyramid_pag = 1;} else{if($i==5&&$pyramid_pag==0){echo ' selected'; $pyramid_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "circles":
									$circles_pag = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $circles_pag = 1;} else{if($i==5&&$circles_pag==0){echo ' selected'; $circles_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "antenna":
									$antenna_pag = 0;
									for($i=2; $i<6; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $antenna_pag = 1;} else{if($i==5&&$antenna_pag==0){echo ' selected'; $antenna_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "beam":
									$beam_pag = 0;
									for($i=5; $i<15; $i+=5){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $beam_pag = 1;} else{if($i==10&&$beam_pag==0){echo ' selected'; $beam_pag = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "axes":
									$axes_pag = 0;
									for($i=6; $i<54; $i+=6){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $axes_pag = 1;} else{if($i==48&&$axes_pag==0){echo ' selected'; $axes_pag = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "vcones":
									$vcones_pag = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $vcones_pag = 1;} else{if($i==4&&$vcones_pag==0){echo ' selected'; $vcones_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "hcones":
									$hcones_pag = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $hcones_pag = 1;} else{if($i==4&&$hcones_pag==0){echo ' selected'; $hcones_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "square":
									$square_pag = 0;
									for($i=2; $i<8; $i++){echo '<option id="pali_' . $i*$i . '" value="' . $i*$i . '"'; if($pages_limit==$i*$i){echo ' selected'; $square_pag = 1;} else{if($i==7&&$square_pag==0){echo ' selected'; $square_pag = 1;}}; echo '>' . $i*$i . '</option>'; };
									break;
								case "fir":
									$fir_pag = 0;
									for($i=1; $i<5; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $fir_pag = 1;} else{if($i==4&&$fir_pag==0){echo ' selected'; $fir_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "triangle":
									$triangle_pag = 0;
									for($i=3; $i<11; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="pali_' . $calc . '" value="' . $calc . '"'; if($pages_limit==$calc){echo ' selected'; $triangle_pag = 1;} else{if($i==10&&$triangle_pag==0){echo ' selected'; $triangle_pag = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "heart":
									$heart_pag = 0;
									for($i=12; $i<48; $i+=12){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $heart_pag = 1;} else{if($i==36&&$heart_pag==0){echo ' selected'; $heart_pag = 1;}}; echo '>' . $i . '</option>'; };
									break;
								case "love":
									$love_pag = 0;
									for($i=24; $i<60; $i+=12){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $love_pag = 1;} else{if($i==48&&$love_pag==0){echo ' selected'; $love_pag = 1;}}; echo '>' . $i . '</option>'; };
									break;
								default:
									$default_pag = 0;
									for($i=5; $i<55; $i+=5){echo '<option id="pali_' . $i . '" value="' . $i . '"'; if($pages_limit==$i){echo ' selected'; $default_pag = 1;} else{if($i==50&&$default_pag==0){echo ' selected'; $default_pag = 1;}}; echo '>' . $i . '</option>'; };
//									echo '<option id="pali_55"'; if($pages_limit==''){echo ' selected';}; echo ' value="">all</option>';
							}
						?>
						</select>
					</label> 
					<label style="margin: 2px 5px 0 0; width: 45px; line-height: 13px;" title="Maximum number of authors to display" for="<?=$this->get_field_id('authors_limit'); ?>">
						<span style="margin-right: 5px; font-weight: normal;">Number</span> 
						<br> 							
						<select id="<?=$this->get_field_id('authors_limit'); ?>" name="<?=$this->get_field_name('authors_limit'); ?>">
							<?php
								switch($shape){
								case "spiral":
									$spiral_aut = 0;
									for($i=8; $i<57; $i+=7){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $spiral_aut = 1;} else{if($i==50&&$spiral_aut==0){echo ' selected'; $spiral_aut = 1;}}; echo '>' . $i . '</option>'; }
									break;
								case "hexagon":
									$hexagon_aut = 0;
									for($i=1; $i<4; $i++){$calc = 3*$i*$i+3*$i+1;  echo '<option id="auli_' . $calc . '" value="' . $calc  . '"'; if($authors_limit==$calc ){echo ' selected'; $hexagon_aut = 1;} else{if($i==3&&$hexagon_aut==0){echo ' selected'; $hexagon_aut = 1;}}; echo '>' . $calc . '</option>'; }   
									break;
								case "cube":
									$cube_aut = 0;
									for($i=0; $i<2; $i++){$calc = 6*$i*$i+12*$i+8; echo '<option id="auli_' . $calc . '" value="' . $calc  . '"'; if($authors_limit==$calc ){echo ' selected'; $cube_aut = 1;} else{if($i==1&&$cube_aut==0){echo ' selected'; $cube_aut = 1;}}; echo '>' . $calc . '</option>'; } 
									break;
								case "pyramid":
									$pyramid_aut = 0;
									for($i=1; $i<6; $i++){$calc = 2*$i*$i+2; echo '<option id="auli_' . $calc . '" value="' . $calc  . '"'; if($authors_limit==$calc ){echo ' selected'; $pyramid_aut = 1;} else{if($i==5&&$pyramid_aut==0){echo ' selected'; $pyramid_aut = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "circles":
									$circles_aut = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6; echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $circles_aut = 1;} else{if($i==4&&$circles_aut==0){echo ' selected'; $circles_aut = 1;}}; echo '>' . $calc . '</option>'; }	
									break;
								case "antenna":
									$antenna_aut = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+3*$i*$i+$i)/6+4; echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $antenna_aut = 1;} else{if($i==4&&$antenna_aut==0){echo ' selected'; $antenna_aut = 1;}}; echo '>' . $calc . '</option>'; }	
									break;
								case "beam":
									$beam_aut = 0;
									for($i=5; $i<15; $i+=5){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $beam_aut = 1;} else{if($i==10&&$beam_aut==0){echo ' selected'; $beam_aut = 1;}}; echo '>' . $i . '</option>'; }
									break;
								case "axes":
									$axes_aut = 0;
									for($i=6; $i<54; $i+=6){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $axes_aut = 1;} else{if($i==48&&$axes_aut==0){echo ' selected'; $axes_aut = 1;}}; echo '>' . $i . '</option>'; }
									break;
								case "vcones":
									$vcones_aut = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $vcones_aut = 1;} else{if($i==4&&$vcones_aut==0){echo ' selected'; $vcones_aut = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "hcones":
									$hcones_aut = 0;
									for($i=2; $i<5; $i++){$calc = (2*$i*$i*$i+$i)/3; echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $hcones_aut = 1;} else{if($i==4&&$hcones_aut==0){echo ' selected'; $hcones_aut = 1;}}; echo '>' . $calc . '</option>'; };
									break;
								case "square":
									$square_aut = 0;
									for($i=2; $i<8; $i++){echo '<option id="auli_' . $i*$i . '" value="' . $i*$i . '"'; if($authors_limit==$i*$i){echo ' selected'; $square_aut = 1;} else{if($i==7&&$square_aut==0){echo ' selected'; $square_aut = 1;}}; echo '>' . $i*$i . '</option>'; }
									break;
								case "fir":
									$fir_aut = 0;
									for($i=1; $i<5; $i++){$calc = (2*$i*$i+2*$i+1); echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $fir_aut = 1;} else{if($i==4&&$fir_aut==0){echo ' selected'; $fir_aut = 1;}}; echo '>' . $calc . '</option>'; }
									break;
								case "triangle":
									$triangle_aut = 0;
									for($i=3; $i<11; $i++){$calc = (0.5*$i*$i+0.5*$i); echo '<option id="auli_' . $calc . '" value="' . $calc . '"'; if($authors_limit==$calc){echo ' selected'; $triangle_aut = 1;} else{if($i==10&&$triangle_aut==0){echo ' selected'; $triangle_aut = 1;}}; echo '>' . $calc . '</option>'; }
									break;
								case "heart":
									$heart_aut = 0;
									for($i=12; $i<48; $i+=12){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $heart_aut = 1;} else{if($i==36&&$heart_aut==0){echo ' selected'; $heart_aut = 1;}}; echo '>' . $i . '</option>'; }
									break;
								case "love":
									$love_aut = 0;
									for($i=24; $i<60; $i+=12){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $love_aut = 1;} else{if($i==48&&$love_aut==0){echo ' selected'; $love_aut = 1;}}; echo '>' . $i . '</option>'; }
									break;
								default:
									$default_aut = 0;
									for($i=5; $i<55; $i+=5){echo '<option id="auli_' . $i . '" value="' . $i . '"'; if($authors_limit==$i){echo ' selected'; $default_aut = 1;} else{if($i==50&&$default_aut==0){echo ' selected'; $default_aut = 1;}}; echo '>' . $i . '</option>'; };
//									echo '<option id="auli_55"'; if($authors_limit==''){echo ' selected';}; echo ' value="">all</option>';
							}
							?>
						</select>
					</label>
					<label style="width: 175px; margin: 2px 0 0 0; line-height: 13px;" title="Exclude one or more authors from the results. Enter a comma-separated list of authors 
					IDs." for="<?=$this->get_field_id('exclude'); ?>">
						Exclude 
						<input style="margin-top: 0; width: 175px;"
						style="padding: 2px" id="<?=$this->get_field_id('exclude'); ?>"
						name="<?=$this->get_field_name('exclude'); ?>" type="text"
						value="<?php echo $exclude; ?>" />
					</label>
					<div style="width: 50px; font-size: 18px; line-height: 12px; padding: 16px 0 0; text-align: center; float: left;">&#8594;</div>
					<label style="width: 175px; margin: 2px 0 0 0; line-height: 13px;" title="Leaving this field empty will load ALL current post/page links, which may include 
					navigation links, meta tags, comments etc. If you want to use the links from a specific HTML tag (div, table, ul etc.) enter its ID." for="<?=$this->get_field_id('conid'); ?>">
						Custom Container ID 
						<input style="margin-top: 0; width: 175px;"
						style="padding: 2px" id="<?=$this->get_field_id('conid'); ?>"
						name="<?=$this->get_field_name('conid'); ?>" type="text"
						value="<?php echo $conid; ?>" />
					</label>
				</td>
			</tr>
		</table>
		<div class="thin-spacer"></div>
		<div style="width: 187px; display: inline-block; float: left;">
			<div style="float: left; margin: 0 28px 0 0;" title="The minimum number of tags to show in the cloud. If the number of links available is lower than this value, the list 
			will be repeated. The <span class='green'>Repeat Tags</span> option takes precedence over <span class='green'>Min Tags</span>. Shapes marked with an asterisk (*) may use the 
			nearest downward value.">
				Minimum<br>Tags
				<br>
				<select id="<?=$this->get_field_id('min_tags'); ?>" name="<?=$this->get_field_name('min_tags'); ?>">
					<?php for($i=0; $i<201; $i++){echo '<option id="mint_' . $i . '" value="' . $i . '"'; if($min_tags==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>
			</div>
			<div style="float: left; margin: 0;" title="The number of times to repeat the list of tags in the cloud. This option overrides the <span class='green'>Min Tags</span> option. 
			Shapes denoted with a single asterisk (<b style='font-size: 26px; line-height: 5px; position: relative; top: 10px;'>***</b>) may use the nearest downward to the result value.">
				Repeat<br>Tags
				<br>
				<select id="<?=$this->get_field_id('repeat_tags'); ?>" name="<?=$this->get_field_name('repeat_tags'); ?>">
					<?php for($i=0; $i<65; $i++){echo '<option id="rept_' . $i . '" value="' . $i . '"'; if($repeat_tags==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>
			</div>
			<div class="thick-spacer"></div>
			<div style="float: left; margin: 7px 24px 0 0;" title="Displays “No tags” instead of an empty canvas when there are no tags available.">
				No Tags<br>Message
				<br>
				<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('no_tags_msg'); ?>"
				name="<?=$this->get_field_name('no_tags_msg'); ?>" type="radio" value="true"
				<?php if( $no_tags_msg == "true" ){ echo ' checked="checked"'; } ?>>on
				
				<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('no_tags_msg'); ?>"
				name="<?=$this->get_field_name('no_tags_msg'); ?>" type="radio" value="false"
				<?php if( $no_tags_msg == "false" ){ echo ' checked="checked"'; } ?>>off
			</div>
			<div style="float: left; margin: 4px 0 0;" title="This option specifies where to open tag links:<br><br><span class='green'>_blank</span> - in a new window or tab;<br>
			<span class='green'>_parent</span> - in the parent frame;<br><span class='green'>_self</span> - in the same frame as it was clicked (default);<br><span class='green'>_top</span> 
			- in the full body of the window.">
				<br>
				Target
				<br>
				<select id="<?=$this->get_field_id('target'); ?>" name="<?=$this->get_field_name('target'); ?>">
					<option value="_blank" <?php if( $target == "_blank" ){ echo ' selected'; } ?>>_blank</option>
					<option value="_parent" <?php if( $target == "_parent" ){ echo ' selected'; } ?>>_parent</option>
					<option value="_self" <?php if( $target == "_self" ){ echo ' selected'; } ?>>_self</option>
					<option value="_top" <?php if( $target == "_top" ){ echo ' selected'; } ?>>_top</option>
				</select>
			</div>
		</div>
		<div style="float: left; margin: 0;" title="Use <span class='green'>Magic</span> after setting <span class='green'>SHAPE</span> & <span class='green'>CONTENT</span>. It applies 
		different ways of tags emplacement over the selected shape. In case of multiple selection plugin changes <span class='green'>Magic</span> value every 5-15 sec. depending on 
		<span class='green'>Shape/Magic Time</span> in <span class='green'>TIME & FUNCTIONS</span> section.<br><span class='green'>Magic</span> is suitable for clouds with small number of 
		tags, multiplied by <span class='green'>Repeat Tags</span> up to several hundred.<br> Only shapes denoted with triple asterisks 
		(<b style='font-size: 26px; line-height: 5px; position: relative; top: 10px;'>***</b>) are suitable for <span class='green'>Magic</span>.">
			Magic
			<br>
			<select style="height: 95px!important;" id="<?=$this->get_field_id('magic'); ?>" name="<?=$this->get_field_name('magic'); ?>[]" multiple>
				<option value="0" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 0 ){ echo ' selected'; }} ?>>Master of None</option>
				<option value="1" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 1 ){ echo ' selected'; }} ?>>Air Force 1</option>
				<option value="2" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 2 ){ echo ' selected'; }} ?>>The Ring 2</option>
				<option value="3" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 3 ){ echo ' selected'; }} ?>>3 Women</option>
				<option value="4" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 4 ){ echo ' selected'; }} ?>>4 Lions</option>
				<option value="5" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 5 ){ echo ' selected'; }} ?>>5 Easy Pieces</option>
				<option value="6" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 6 ){ echo ' selected'; }} ?>>The Rediculous 6</option>
				<option value="7" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 7 ){ echo ' selected'; }} ?>>The Magnificent 7</option>
				<option value="8" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 8 ){ echo ' selected'; }} ?>>The Hateful 8</option>
				<option value="9" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 9 ){ echo ' selected'; }} ?>>Love Potion No. 9</option>
				<option value="10" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 10 ){ echo ' selected'; }} ?>>10 Little Indians</option>
				<option value="11" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 11 ){ echo ' selected'; }} ?>>Ocean's 11</option>
				<option value="12" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 12 ){ echo ' selected'; }} ?>>12 Monkeys</option>
				<option value="13" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 13 ){ echo ' selected'; }} ?>>13 Days</option>
				<option value="14" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 14 ){ echo ' selected'; }} ?>>14 Seeds</option>
				<option value="15" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 15 ){ echo ' selected'; }} ?>>15 and Pregnant</option>
				<option value="16" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 16 ){ echo ' selected'; }} ?>>16 Candles</option>
				<option value="17" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 17 ){ echo ' selected'; }} ?>>Try 17</option>
				<option value="18" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 18 ){ echo ' selected'; }} ?>>18 and Anxious</option>
				<option value="19" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 19 ){ echo ' selected'; }} ?>>19 Nineteen</option>
				<option value="20" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 20 ){ echo ' selected'; }} ?>>20 Bucks</option>
				<option value="21" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 21 ){ echo ' selected'; }} ?>>21 Grams</option>
				<option value="22" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 22 ){ echo ' selected'; }} ?>>Catch-22</option>
				<option value="23" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 23 ){ echo ' selected'; }} ?>>23 Blast</option>
				<option value="24" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 24 ){ echo ' selected'; }} ?>>24 Exposures</option>
				<option value="25" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 25 ){ echo ' selected'; }} ?>>25 Watts</option>
				<option value="26" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 26 ){ echo ' selected'; }} ?>>Special 26</option>
				<option value="27" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 27 ){ echo ' selected'; }} ?>>27 Dresses</option>
				<option value="28" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 28 ){ echo ' selected'; }} ?>>28 Hotel Rooms</option>
				<option value="29" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 29 ){ echo ' selected'; }} ?>>Track 29</option>
				<option value="30" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 30 ){ echo ' selected'; }} ?>>30 Minutes or Less</option>
				<option value="31" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 31 ){ echo ' selected'; }} ?>>Facility 31</option>
				<option value="32" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 32 ){ echo ' selected'; }} ?>>Nail 32</option>
				<option value="33" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 33 ){ echo ' selected'; }} ?>>33 Postcards</option>
				<option value="34" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 34 ){ echo ' selected'; }} ?>>Miracle on 34th Street</option>
				<option value="35" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 35 ){ echo ' selected'; }} ?>>35 Shots of Rum</option>
				<option value="36" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 36 ){ echo ' selected'; }} ?>>36 Saints</option>
				<option value="37" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 37 ){ echo ' selected'; }} ?>>Code 37</option>
				<option value="38" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 38 ){ echo ' selected'; }} ?>>Gate 38</option>
				<option value="39" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 39 ){ echo ' selected'; }} ?>>Zone 39</option>
				<option value="40" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 40 ){ echo ' selected'; }} ?>>40 Nights</option>
				<option value="41" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 41 ){ echo ' selected'; }} ?>>Miss 41</option>
				<option value="42" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 42 ){ echo ' selected'; }} ?>>42 plus</option>
				<option value="43" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 43 ){ echo ' selected'; }} ?>>Movie 43</option>
				<option value="44" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 44 ){ echo ' selected'; }} ?>>Child 44</option>
				<option value="45" <?php for($i=0; $i<=sizeof($magic)-1; $i++){if( $magic[$i] == 45 ){ echo ' selected'; }} ?>>Random Encounters</option>
			</select>
		</div>
		<div class="thin-spacer"></div>
	</div>
	<h3><span class="front-title">cloud:</span> SIZES & ZOOM</h3>
	<div class="section_content">
		<span>SIZES</span>
		<br>
		<div class="thin-spacer"></div>
		<label style="width: 90px;" title="Initial size of cloud from center to sides. This option has no effect if selected shape is <span class='green'>Beam</span>." for="<?=$this->get_field_id('radius_x'); ?>">
			Radius X 
			<br>
			<select id="<?=$this->get_field_id('radius_x'); ?>" name="<?=$this->get_field_name('radius_x'); ?>">
				<?php for($i=0; $i<1505; $i+=5){echo '<option id="rx_' . $i . '" value="' . $i/100 . '"'; if($radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
		<label style="width: 90px;" title="Initial size of cloud from center to top and bottom. This option has no effect if selected shape is <span class='green'>Beam</span>." for="<?=$this->get_field_id('radius_y'); ?>">
			Radius Y 
			<br>
			<select id="<?=$this->get_field_id('radius_y'); ?>" name="<?=$this->get_field_name('radius_y'); ?>">
				<?php for($i=0; $i<1505; $i+=5){echo '<option id="ry_' . $i . '" value="' . $i/100 . '"'; if($radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
		<div style="width: 90px; float: left;" title="Initial size of cloud from center to front and back. This option has no effect if selected shape is two dimensional (2D)." id="cont_<?=$this->get_field_id('radius_z'); ?>">
			Radius Z
			<br>
			<select id="<?=$this->get_field_id('radius_z'); ?>" name="<?=$this->get_field_name('radius_z'); ?>">
				<?php for($i=0; $i<1505; $i+=5){echo '<option id="rz_' . $i . '" value="' . $i/100 . '"'; if($radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</div> 
		<label title="Controls the perspective." style="width: 58px;" for="<?=$this->get_field_id('depth'); ?>">
			Depth 
			<br>
			<select id="<?=$this->get_field_id('depth'); ?>" name="<?=$this->get_field_name('depth'); ?>">
				<option id="dep_0" value="0.001" <?php if($depth==0.001){echo ' selected';} ?>>0</option>
				<?php for($i=5; $i<105; $i+=5){echo '<option id="dep_' . $i . '" value="' . $i/100 . '"'; if($depth==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
		<div class="thin-spacer"></div>
		<label style="width: 90px;" title="Offsets the centre of the cloud horizontally." for="<?=$this->get_field_id('offset_x'); ?>">
			Offset X 
			<br>
			<select id="<?=$this->get_field_id('offset_x'); ?>" name="<?=$this->get_field_name('offset_x'); ?>">
				<?php for($i=-50; $i<51; $i++){echo '<option id="ofx_' . $i . '" value="' . $i . '"'; if($offset_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<label style="width: 90px;" title="Offsets the centre of the cloud vertically." for="<?=$this->get_field_id('offset_y'); ?>">
			Offset Y
			<br>
			<select id="<?=$this->get_field_id('offset_y'); ?>" name="<?=$this->get_field_name('offset_y'); ?>">
				<?php for($i=-50; $i<51; $i++){echo '<option id="ofy_' . $i . '" value="' . $i . '"'; if($offset_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<label style="width: 90px;" title="Stretch or compress the cloud horizontally." for="<?=$this->get_field_id('stretch_x'); ?>">
			Stretch X
			<br>
			<select id="<?=$this->get_field_id('stretch_x'); ?>" name="<?=$this->get_field_name('stretch_x'); ?>">
				<?php for($i=5; $i<21; $i++){echo '<option id="sx_' . $i . '" value="' . $i/10 . '"'; if($stretch_x==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
			</select>
		</label>
		<label style="width: 58px;" title="Stretch or compress the cloud vertically." for="<?=$this->get_field_id('stretch_y'); ?>">
			Stretch Y 
			<br>
			<select id="<?=$this->get_field_id('stretch_y'); ?>" name="<?=$this->get_field_name('stretch_y'); ?>">
				<?php for($i=5; $i<21; $i++){echo '<option id="sy_' . $i . '" value="' . $i/10 . '"'; if($stretch_y==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
			</select>
		</label> 
		<div style="font-weight: bold; padding: 5px 0 0 0; margin: 5px 0 0 0; border-top: 1px solid #aaa; width: 100%; display: inline-block;">ZOOM</div>
		<div style="float: left; margin: 6px 5px 0 0;" title="Set to <span class='green'>on</span> to enable zooming in and out of the cloud by pinching on touchscreen devices.">
			<div>
				Pinch Zoom
			</div>
			<div  style="float: left;">
				<input class="radio" id="<?=$this->get_field_id('pinch_zoom'); ?>"
				name="<?=$this->get_field_name('pinch_zoom'); ?>" type="radio" value="true"
				<?php if( $pinch_zoom == "true" ){ echo ' checked="checked"'; } ?>>on
				<input class="radio" id="<?=$this->get_field_id('pinch_zoom'); ?>"
				name="<?=$this->get_field_name('pinch_zoom'); ?>" type="radio" value="false"
				<?php if( $pinch_zoom == "false" ){ echo ' checked="checked"'; } ?>>off
			</div>
		</div>
		<div style="border: 1px dotted #aaa; border-radius: 10px; display: block; float: left; padding: 0 0 2px 2px;">
			<div style="float: left; margin: 5px 5px 0 0;" title="Enables zooming the cloud in and out using the mouse wheel or scroll gesture">
				<div>
					Wheel Zoom
				</div>
				<div  style="float: left;">
					<input class="radio" id="<?=$this->get_field_id('wheel_zoom'); ?>"
					name="<?=$this->get_field_name('wheel_zoom'); ?>" type="radio" value="true"
					<?php if( $wheel_zoom == "true" ){ echo ' checked="checked"'; } ?>>on
					<input class="radio" id="<?=$this->get_field_id('wheel_zoom'); ?>"
					name="<?=$this->get_field_name('wheel_zoom'); ?>" type="radio" value="false"
					<?php if( $wheel_zoom == "false" ){ echo ' checked="checked"'; } ?>>off
				</div>
			</div>
			<label title="Minimal zoom value" style="margin: 5px 5px 0 0;" for="<?=$this->get_field_id('zoom_min'); ?>">
				Zoom Min
				<br>
				<select id="<?=$this->get_field_id('zoom_min'); ?>" name="<?=$this->get_field_name('zoom_min'); ?>">
					<?php for($i=3; $i<11; $i++){echo '<option id="zomi_' . $i . '" value="' . $i/10 . '"'; if($zoom_min==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
				</select>
			</label>  
			<label title="Maximal zoom value" style="margin: 5px 5px 0 0;" for="<?=$this->get_field_id('zoom_max'); ?>">
				Zoom Max
				<br>
				<select id="<?=$this->get_field_id('zoom_max'); ?>" name="<?=$this->get_field_name('zoom_max'); ?>">
					<?php for($i=20; $i<41; $i++){echo '<option id="zoma_' . $i . '" value="' . $i/10 . '"'; if($zoom_max==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
				</select>
			</label>
			<label style="margin: 5px 0 0 0;" title="The amount that the zoom is changed by with each movement of the mouse wheel." for="<?=$this->get_field_id('zoom_step'); ?>">
				Zoom Step
				<br>
				<select id="<?=$this->get_field_id('zoom_step'); ?>" name="<?=$this->get_field_name('zoom_step'); ?>">
					<?php for($i=1; $i<11; $i++){echo '<option id="zos_' . $i . '" value="' . $i/100 . '"'; if($zoom_step==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select>
			</label>
		</div>
		<label style="margin: 5px 0 0;" title="Adjusts the relative size of the tag cloud in the canvas. Larger values will zoom into the cloud, smaller values will zoom out." for="<?=$this->get_field_id('zoom'); ?>">
			Zoom
			<br>
			<select id="<?=$this->get_field_id('zoom'); ?>" name="<?=$this->get_field_name('zoom'); ?>">
				<?php for($i=10; $i<755; $i+=5){echo '<option id="zo_' . $i . '" value="' . $i/100 . '"'; if($zoom==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
	</div>
	<h3><span class="front-title">cloud:</span> SPEED</h3>
	<div class="section_content" style="padding: 0 2px 5px;">
		<div style="width: 192px; float: left;" title="Starting rotation speed around axes with values for each one, e.g. <span class='green'>[0.5,-0.3, 0.1]</span>. Values are 
		multiplied by <span class='green'>maxSpeed</span>.">
			<div style="font-weight: bold; padding: 5px 0 0;">SPEED</div>
			<div class="thin-spacer"></div>
			<div style="float: left; padding: 0 1px 1px 1px; border: 1px dotted #aaa; border-radius: 5px;">
				Initial Speed [x, y, z]
				<br>
				<select id="<?=$this->get_field_id('initial_x'); ?>" name="<?=$this->get_field_name('initial_x'); ?>">
					<?php for($i=-100; $i<101; $i++){echo '<option id="inx_' . $i . '" value="' . $i/100 . '"'; if($initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select><select id="<?=$this->get_field_id('initial_y'); ?>" name="<?=$this->get_field_name('initial_y'); ?>">
					<?php for($i=-100; $i<101; $i++){echo '<option id="iny_' . $i . '" value="' . $i/100 . '"'; if($initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select><select id="<?=$this->get_field_id('initial_z'); ?>" name="<?=$this->get_field_name('initial_z'); ?>">
					<?php for($i=-100; $i<101; $i++){echo '<option id="inz_' . $i . '" value="' . $i/100 . '"'; if($initial_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select>
			</div>
		</div>
		<label style="width: 68px; padding: 28px 5px 0 2px;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('min_speed'); ?>">
			Min Speed
			<br>
			<select id="<?=$this->get_field_id('min_speed'); ?>" name="<?=$this->get_field_name('min_speed'); ?>">
				<?php for($i=0; $i<55; $i+=5){echo '<option id="mis_' . $i . '" value="' . $i/1000 . '"'; if($min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
			</select>
		</label>	
		<label style="width: 68px; padding: 28px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed. Keep small when  <span class='green'>Drag 
		Control</span> is  <span class='green'>on</span> and set highest when  <span class='green'>Freeze Deceleration</span> is  <span class='green'>on</span>." for="<?=$this->get_field_id('max_speed'); ?>">
			Max Speed
			<br>
			<select id="<?=$this->get_field_id('max_speed'); ?>" name="<?=$this->get_field_name('max_speed'); ?>">
				<?php for($i=5; $i<105; $i+=5){echo '<option id="mas_' . $i . '" value="' . $i/1000 . '"'; if($max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
			</select>
		</label>
		<label style="margin: 5px 0 0" title="Deceleration rate when mouse leaves canvas" for="<?=$this->get_field_id('deceleration'); ?>">
			Deceleration
			<br>
			<select id="<?=$this->get_field_id('deceleration'); ?>" name="<?=$this->get_field_name('deceleration'); ?>">
				<?php for($i=50; $i<100; $i++){echo '<option id="de_' . $i . '" value="' . $i/100 . '"'; if($deceleration==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
	</div>
	<h3><span class="front-title">cloud:</span> TIME & FUNCTIONS</h3>
	<div class="section_content">
		<div style="display: inline-block; padding-bottom: 2px;">
			<span>TIME</span>
			<br>
			<div class="thin-spacer"></div>
			<label style="margin: 0 15px 0 0;" title="Exposing/acting time of a shape/magic in case of multile selection in <span class='green'>SHAPE</span>/<span class='green'>
			Magic</span>." for="<?=$this->get_field_id('time'); ?>">
				Shape/Magic Time
				<br>
				<select id="<?=$this->get_field_id('time'); ?>" name="<?=$this->get_field_name('time'); ?>">
						<?php for($i=5; $i<16; $i++){echo '<option id="stime_' . $i . '" value="' . $i*1000 . '"'; if($time==$i*1000){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>sec
			</label>	
			<label title="Time to fade in tags at start" style="margin: 0 25px 0 0;" for="<?=$this->get_field_id('fadein'); ?>">
				FadeIn Time
				<br>
				<select id="<?=$this->get_field_id('fadein'); ?>" name="<?=$this->get_field_name('fadein'); ?>">
						<?php for($i=0; $i<7500; $i+=500){echo '<option id="fi_' . $i . '" value="' . $i . '"'; if($fadein==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>msec
			</label>	
			<label title="Interval between animation frames" for="<?=$this->get_field_id('interval'); ?>">
				Frame Interval
				<br>
				<select id="<?=$this->get_field_id('interval'); ?>" name="<?=$this->get_field_name('interval'); ?>">
					<?php for($i=10; $i<35; $i+=5){echo '<option id="int_' . $i . '" value="' . $i . '"'; if($interval==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>msec
			</label>
			<div class="thin-spacer"></div>
			<label style="margin: 1px 16px 0 0;" title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('click_to_front'); ?>">
				Click to Front Time
				<br>
				<select id="<?=$this->get_field_id('click_to_front'); ?>" name="<?=$this->get_field_name('click_to_front'); ?>">
					<option id="ctf_0" value="null" <?php if( $click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
					<?php for($i=500; $i<2500; $i+=500){echo '<option id="ctf_' . $i . '" value="' . $i . '"'; if($click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>msec
			</label>
			<label style="margin: 1px 20px 0 0;" title="Animation delay in milliseconds for when the page is being scrolled. Applies to all TagCanvas instances on the page." for="<?=$this->get_field_id('scroll_pause'); ?>">
				Scroll Pause
				<br>
				<select id="<?=$this->get_field_id('scroll_pause'); ?>" name="<?=$this->get_field_name('scroll_pause'); ?>">
					<?php for($i=0; $i<1050; $i+=50){echo '<option id="scrlp_' . $i . '" value="' . $i . '"'; if($scroll_pause==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>msec
			</label>
			<div style="margin: -3px 0 0 0; padding: 2px 0 0 4px; border: 1px dotted #bbb; border-radius: 10px; display: inline-block; height: 85px; ">
				<label title="Pulse rate (in seconds per beat): Combine with <span class='green'>Pulsate to Opacity</span> option below." for="<?=$this->get_field_id('pulsate_time'); ?>">
					Pulsate Time
					<br>
					<select id="<?=$this->get_field_id('pulsate_time'); ?>" name="<?=$this->get_field_name('pulsate_time'); ?>">
						<?php for($i=0; $i<5.5; $i+=0.5){echo '<option id="put_' . $i . '" value="' . $i . '"'; if($pulsate_time==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>sec/beat
					<br>
					<span style="font-size: 18px; line-height: 10px; padding: 0 0 0 18px;">&#8595;</span>
				</label>
				<br>
				<label style="width: 101px; margin: 0 0 -36px 0;" title="Pulsate outline to this opacity. Combine with <span class='green'>Pulsate Time</span> option above. Set to 1 
				for no pulsation." for="<?=$this->get_field_id('pulsate_to'); ?>">
					Pulsate to Opacity
					<br>
					<select id="<?=$this->get_field_id('pulsate_to'); ?>" name="<?=$this->get_field_name('pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="pus_' . $i . '" value="' . $i/10 . '"'; if($pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
			</div>
		</div>
		<div style="margin: -51px 1px 0; background: #ddd; border-top: 1px solid #bbb;";>	
			<div style="font-weight: bold; padding-top: 5px;">FUNCTIONS</div>
			<br>
			<div class="thick-spacer"></div>
			<div class="thick-spacer"></div>
			<div style="margin: 3px 19px 0 0; float: left;">
				<br>
				Reverse
				<div title="Set to <span class='green'>on</span> to reverse direction of movement relative to mouse position.">
					<input class="radio" id="<?=$this->get_field_id('reverse'); ?>"
					name="<?=$this->get_field_name('reverse'); ?>" type="radio" value="true"
					<?php if( $reverse == "true" ){ echo ' checked="checked"'; } ?>>on
					<br>
					<input class="radio" id="<?=$this->get_field_id('reverse'); ?>"
					name="<?=$this->get_field_name('reverse'); ?>" type="radio" value="false"
					<?php if( $reverse == "false" ){ echo ' checked="checked"'; } ?>>off
				</div> 
			</div>
			<div style="margin: 3px 15px 0 0; float: left;">
				Front<br>Select
				<div title="Set to <span class='green'>on</span> to prevent selection of tags at back of cloud.">
					<input class="radio" id="<?=$this->get_field_id('front_select'); ?>"
					name="<?=$this->get_field_name('front_select'); ?>" type="radio" value="true"
					<?php if( $front_select == "true" ){ echo ' checked="checked"'; } ?>>on 
					<br>
					<input class="radio" id="<?=$this->get_field_id('front_select'); ?>"
					name="<?=$this->get_field_name('front_select'); ?>" type="radio" value="false"
					<?php if( $front_select == "false" ){ echo ' checked="checked"'; } ?>>off
				</div>
			</div>
			<div style="border: 1px dotted #aaa; border-radius: 10px; display: block; float: left; padding: 2px 0 2px 2px; margin: 0 15px 0 0;">			
				<div style="float: left; margin: 0 19px 0 3px;">
					Freeze<br>Active
					<div title="Set to <span class='green'>on</span> to pause movement when a tag is highlighted. For using this function <span class='green'>Drag Control</span> 
					must be <span class='green'>off</span>.">
						<input class="radio" id="<?=$this->get_field_id('freeze_active'); ?>"
						name="<?=$this->get_field_name('freeze_active'); ?>" type="radio" value="true"
						<?php if( $freeze_active == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('freeze_active'); ?>"
						name="<?=$this->get_field_name('freeze_active'); ?>" type="radio" value="false"
						<?php if( $freeze_active == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="margin: 0 3px 0 0; float: left;">
					Freeze<br>Deceleration
					<div title="Set to <span class='green'>on</span> when <span class='green'>Freeze Active</span> is <span class='green'>on</span>. It decelerates rotating when 
					highlighted tags freeze instead of stopping suddenly. For best results:<br>1. Apply to small number of big tags (5-10 <span class='green'>Recent Posts</span>);
					<br>2. Set minimal value for <span class='green'>Deceleration</span> (0.5) & <span class='green'>Min Speed</span> (0.005);<br>3. Set the highest 
					<span class='green'>Max Speed</span> (0.1);<br>4. Don&#39;t set <span class='green'>Lock Rotation</span> to <span class='green'>both</span>.">
						<input class="radio" id="<?=$this->get_field_id('freeze_decel'); ?>"
						name="<?=$this->get_field_name('freeze_decel'); ?>" type="radio" value="true"
						<?php if( $freeze_decel == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('freeze_decel'); ?>"
						name="<?=$this->get_field_name('freeze_decel'); ?>" type="radio" value="false"
						<?php if( $freeze_decel == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
			</div>
			<label style="margin-top: 16px;" for="<?=$this->get_field_id('lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - 
			limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - locks the cloud in response to 
			the mouse. It will only move if the <span class='green'>Initial Speed</span> option gives it a starting speed.<br><b>N.B.</b> Since Z rotation can not be controlled by mouse 
			it will be locked anyway.<br><span class='green'>none</span> - leaves the cloud unlocked.">
				Lock
				<br>
				Rotation
				<br>
				<select id="<?=$this->get_field_id('lock'); ?>" name="<?=$this->get_field_name('lock'); ?>">
					<option value="x" <?php if( $lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
					<option value="y" <?php if( $lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
					<option value="xy" <?php if( $lock == "xy" ){ echo ' selected'; } ?>>both</option>
					<option value="none" <?php if( $lock == "none" ){ echo ' selected'; } ?>>none</option>
				</select>
			</label>
			<div class="thick-spacer"></div>
			<div style="border: 1px dotted #aaa; border-radius: 10px; display: block; float: left; padding: 2px 0 2px 2px; margin: 0 15px 0 0;">
				<div style="float: left;">
					Drag<br>Control
					<div title="When enabled, cloud moves when dragged instead of based on mouse position. Combine with the  <span class='green'>Drag Threshold</span> option on the 
					right.">
						<input class="radio" id="<?=$this->get_field_id('drag_ctrl'); ?>"
						name="<?=$this->get_field_name('drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('drag_ctrl'); ?>"
						name="<?=$this->get_field_name('drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<span style="margin: 28px 0 0 0; float: left; font-size: 18px;">&#8594;</span>
				<label style="width: 58px;" title="The number of pixels that the cursor must move to count as a drag instead of a click. Combine with the  <span class='green'>Drag 
				Control</span> option on the left." for="<?=$this->get_field_id('drag_threshold'); ?>">
					Drag<br>Threshold
					<br>
					<select id="<?=$this->get_field_id('drag_threshold'); ?>" name="<?=$this->get_field_name('drag_threshold'); ?>">	
						<option value="3" <?php if( $drag_threshold == "3" ){ echo ' selected'; } ?>>3</option>
						<option value="4" <?php if( $drag_threshold == "4" ){ echo ' selected'; } ?>>4</option>
						<option value="5" <?php if( $drag_threshold == "5" ){ echo ' selected'; } ?>>5</option>
					</select>px
				</label>
			</div>					
			<div style="border: 1px dotted #aaa; border-radius: 10px; display: block; float: left; padding: 2px;">
				<div style="float: left;">
					Text<br>Optimisation
					<div title="Text optimisation, converts text tags to images for better performance. Combine with the  <span class='green'>Text Scale</span> option on the right.">
						<input class="radio" id="<?=$this->get_field_id('text_optimisation'); ?>"
						name="<?=$this->get_field_name('text_optimisation'); ?>" type="radio" value="true"
						<?php if( $text_optimisation == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('text_optimisation'); ?>"
						name="<?=$this->get_field_name('text_optimisation'); ?>" type="radio" value="false"
						<?php if( $text_optimisation == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<span style="margin: 28px 0 0 0; float: left; font-size: 18px;">&#8594;</span>
				<div style="float: left;">
					<label title="Scaling factor of text when converting to image in <span class='green'>txtOpt</span> mode. Combine with the  <span class='green'>Text Optimisation</span> option on the left." for="<?=$this->get_field_id('text_scale'); ?>">
						Text<br>Scale
						<br>
						<select id="<?=$this->get_field_id('text_scale'); ?>" name="<?=$this->get_field_name('text_scale'); ?>">
							<?php for($i=1; $i<3.5; $i+=0.5){echo '<option id="txts_' . $i . '" value="' . $i . '"'; if($text_scale==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
						</select>
					</label>
				</div>
			</div>	
			<div class="thick-spacer"></div>
			<div style="float: left; height: 48px;">
				<div style="float: left; width: 55px;" title="Set to <span class='green'>on</span> to prevent selection of tags.">
					No Select
					<div style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('no_select'); ?>"
						name="<?=$this->get_field_name('no_select'); ?>" type="radio" value="true"
						<?php if( $no_select == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('no_select'); ?>"
						name="<?=$this->get_field_name('no_select'); ?>" type="radio" value="false"
						<?php if( $no_select == "false" ){ echo ' checked="checked"'; } ?>>off 
					</div>
				</div>  	
				<div style="float: left; margin: 0 20px;" title="Set to <span class='green'>on</span> to prevent any mouse interaction. The <span class='green'>Initial Speed</span> 
				option must be used to animate the cloud, otherwise it will be motionless.">
					No Mouse
					<br>
					<input class="radio" id="<?=$this->get_field_id('no_mouse'); ?>"
					name="<?=$this->get_field_name('no_mouse'); ?>" type="radio" value="true"
					<?php if( $no_mouse == "true" ){ echo ' checked="checked"'; } ?>>on 
					<br>
					<input class="radio" id="<?=$this->get_field_id('no_mouse'); ?>"
					name="<?=$this->get_field_name('no_mouse'); ?>" type="radio" value="false"
					<?php if( $no_mouse == "false" ){ echo ' checked="checked"'; } ?>>off
				</div>	
				<div style="float: left;" title="Set to <span class='green'>on</span> to randomize the order of the tags. Not suitable when a <span class='green'>Magic</span> is 
				applied.">
					<div>
						Shuffle Tags
					</div>
					<div  style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('shuffle_tags'); ?>"
						name="<?=$this->get_field_name('shuffle_tags'); ?>" type="radio" value="true"
						<?php if( $shuffle_tags == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('shuffle_tags'); ?>"
						name="<?=$this->get_field_name('shuffle_tags'); ?>" type="radio" value="false"
						<?php if( $shuffle_tags == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>			
				<div style="float: left; margin: 0 0 0 20px;" title="Set to <span class='green'>on</span> to automatically hide the list of cloud elements if TagCanvas is started 
				successfully.">
					Hide List
					<div>
						<input class="radio" id="<?=$this->get_field_id('hide_tags'); ?>"
						name="<?=$this->get_field_name('hide_tags'); ?>" type="radio" value="true"
						<?php if( $hide_tags == "true" ){ echo ' checked="checked"'; } ?>>on 
						<br>
						<input class="radio" id="<?=$this->get_field_id('hide_tags'); ?>"
						name="<?=$this->get_field_name('hide_tags'); ?>" type="radio" value="false"
						<?php if( $hide_tags == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
	<!-- Not Applicable option in WP Plugin -->
				<span style="display: none;">
					<div style="width: 110px; float: left; margin-top: 10px;">
						Animation Timing
						<div title="The animation timing function for use with the <span class='green'>RotateTag</span> and <span class='green'>TagToFront</span> functions.">
							<input style="width: 45px" class="radio" id="<?=$this->get_field_id('animation_timing'); ?>"
							name="<?=$this->get_field_name('animation_timing'); ?>" type="radio" value="Smooth" 
							<?php if( $animation_timing == "Smooth" ){ echo ' checked="checked"'; } ?>>Smooth
							
							<input class="radio" id="<?=$this->get_field_id('animation_timing'); ?>"
							name="<?=$this->get_field_name('animation_timing'); ?>" type="radio" value="Linear"
							<?php if( $animation_timing == "Linear" ){ echo ' checked="checked"'; } ?>>Linear
						</div>
					</div>
				</span>
			</div>
<!-- ********************************** --> 
		</div>	
	</div>
	<h3 style="padding-right: 0;"><span class="front-title">attributes:</span> BG IMG, TOOLTIPS, CURSOR, CENTER FN</h3>
	<div class="section_content">
		<label style="float: left; width: 100%; padding: 0 0 5px 0 ; border-bottom: 1px solid #aaa; margin: 0 0 5px 0;" title="URL of an image to be used for Cloud Background. 
		The image will be centered and stretched or shrunk to canvas size." for="<?=$this->get_field_id('bg_img_url'); ?>">
			<span>BACKGROUND IMAGE</span> 
			<input style="width: 100%;"
			id="<?=$this->get_field_id('bg_img_url'); ?>"
			name="<?=$this->get_field_name('bg_img_url'); ?>" type="text"
			value="<?php echo $bg_img_url; ?>" /> 
		</label>
		<span>TOOLTIPS</span>
		<br>
		The plugin uses title attribute of your tags & canvas for tooltips.
		<div class="thin-spacer"></div>
		<label style="margin: 0 30px 5px 0;" for="<?=$this->get_field_id('tooltip'); ?>" title="<br><span class='green'>none</span> - for no tooltips;<br>
		<span class='green'>native</span> - for operating system tooltips;<br><span class='green'>div</span> - for div-based.">
			Display Method
			<br>
			<select id="<?=$this->get_field_id('tooltip'); ?>" name="<?=$this->get_field_name('tooltip'); ?>">
				<option value="" <?php if( $tooltip == "" ){ echo ' selected'; } ?>>none</option>
				<option value="native" <?php if( $tooltip == "native" ){ echo ' selected'; } ?>>native</option>
				<option value="div" <?php if( $tooltip == "div" ){ echo ' selected'; } ?>>div</option>
			</select>
		</label>
		<div style="float: left; margin: 0 30px 5px 0;">
			<label title="Class of tooltip div" for="<?=$this->get_field_id('tooltip_class'); ?>">
				Tooltip Class 
				<div>
					<input style="width: 86px;" id="<?=$this->get_field_id('tooltip_class'); ?>"
					name="<?=$this->get_field_name('tooltip_class'); ?>" type="text"
					value="<?php echo $tooltip_class; ?>" />
				</div> 
			</label>
		</div>
		<div style="float: left; margin: 0 0 5px 0;">
			<label title="Time to pause while mouse is not moving before displaying tooltip. Refers to <span class='green'>div</span> type tooltip." for="<?=$this->get_field_id('tooltip_delay'); ?>">
				Tooltip Delay 
			<br>
			<select id="<?=$this->get_field_id('tooltip_delay'); ?>" name="<?=$this->get_field_name('tooltip_delay'); ?>">
				<?php for($i=0; $i<350; $i+=50){echo '<option id="ttd_' . $i . '" value="' . $i . '"'; if($tooltip_delay==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>msec
			</label>
		</div>
		<label style="width: 100%; margin: 0 0 5px;" for="<?=$this->get_field_id('canvas_tooltip'); ?>" title="Sets your canvas tooltip. For instance if the cloud allows 
		<span class='green'>Drag Control</span> you can suggest your site visitors to 'Drag or Click'. It is advisable to set it only if your tags have no title attribute. This is 
		to avoid a mess of pop-up tooltips over your cloud. In other words do not use it when content is <span class='green'>Categories</span> or 
		<span class='green'>Post Tags</span>.">
			Text for canvas tooltip
			<div>
				<input style="width: 100%;" id="<?=$this->get_field_id('canvas_tooltip'); ?>"
				name="<?=$this->get_field_name('canvas_tooltip'); ?>" type="text"
				value="<?php echo $canvas_tooltip; ?>" />
			</div> 
		</label>
		<div style="border-top: 1px solid #aaa; font-weight: bold; display: inline-block; width: 100%; padding: 5px 0 0 0;" title="The CSS cursor type to use when the mouse is over 
		a tag.">CURSOR</div>
		<div class="thin-spacer"></div>
		<div style="display: inline-block; width: 100%;">
			<div style="float: left; padding: 0 16px 0 0;">
				<input title="The UA determines the cursor to display based on the current context." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="auto"
				<?php if( $active_cursor == "auto" ){ echo ' checked="checked"'; } ?>>auto
				<br> 
				
				<input title="A simple crosshair (e.g., short line segments resembling a &#34;+&#34; sign)." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="crosshair"
				<?php if( $active_cursor == "crosshair" ){ echo ' checked="checked"'; } ?>>crosshair
				<br> 
				
				<input title="The platform-dependent default cursor. Often rendered as an arrow." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="default"
				<?php if( $active_cursor == "default" ){ echo ' checked="checked"'; } ?>>default
			</div>
			<div style="float: left; padding: 0 16px 0 0;">
				<input title="Help is available for the object under the cursor. Often rendered as a question mark or a balloon." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="help"
				<?php if( $active_cursor == "help" ){ echo ' checked="checked"'; } ?>>help
				<br>
				
				<input title="Indicates something is to be moved." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="move"	
				<?php if( $active_cursor == "move" ){ echo ' checked="checked"'; } ?>>move
				<br> 
				
				<input title="No cursor is rendered for the element." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="none"
				<?php if( $active_cursor == "none" ){ echo ' checked="checked"'; } ?>>none
			</div>
			<div style="float: left; padding: 0 16px 0 0;">
				<input title="The cursor indicates that the requested action will not be executed." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="not-allowed"
				<?php if( $active_cursor == "not-allowed" ){ echo ' checked="checked"'; } ?>>not-allowed
				<br> 
				
				<input title="The cursor is a pointer that indicates a link (default)." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="pointer"
				<?php if( $active_cursor == "pointer" ){ echo ' checked="checked"'; } ?>>pointer
				<br>	
				
				<input title="A progress indicator. The program is performing some processing, but is different from 'wait' in that the user may still interact with the program. 
				Often rendered as a spinning beach ball, or an arrow with a watch or hourglass." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="progress"
				<?php if( $active_cursor == "progress" ){ echo ' checked="checked"'; } ?>>progress
			</div>
			<div style="float: left;">
				<input title="Indicates text that may be selected. Often rendered as an I-beam." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="text"
				<?php if( $active_cursor == "text" ){ echo ' checked="checked"'; } ?>>text
				<br> 
				
				<input title="Indicates that the program is busy and the user should wait. Often rendered as a watch or hourglass." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="wait"
				<?php if( $active_cursor == "wait" ){ echo ' checked="checked"'; } ?>>wait
				<br>
				
				<input title="The cursor indicates that something can be zoomed in." class="radio" id="<?=$this->get_field_id('active_cursor'); ?>"
				name="<?=$this->get_field_name('active_cursor'); ?>" type="radio" value="zoom-in"
				<?php if( $active_cursor == "zoom-in" ){ echo ' checked="checked"'; } ?>>zoom-in
			</div>
		</div>
		<div style="width: 100%; float: left; padding: 5px 0; border-top: 1px solid #aaa;" title="Function for drawing in the center of the cloud. You can use two ready made 
		functions or create yours.">
			<span style="font-weight: bold;">CENTER FUNCTION</span>
		</div>
		<span title="">General Settings</span>
		<br>
		<label style="margin: 0 15px 0 0;" for="<?=$this->get_field_id('cf_name'); ?>" title="<span class='green'>none</span> - no Center Function;<br>
		<span class='green'>image_cf()</span> - for an image in cloud's center;<br><span class='green'>text_cf()</span> - for text in cloud's center and<br>
		<span class='green'>my_cf()</span> - for your own code.">
			Function
			<br>
			<select id="<?=$this->get_field_id('cf_name'); ?>" name="<?=$this->get_field_name('cf_name'); ?>">
				<option value="" <?php if( $cf_name == "" ){ echo ' selected'; } ?>>none</option>
				<option value="image_cf" <?php if( $cf_name == "image_cf" ){ echo ' selected'; } ?>>image_cf()</option>
				<option value="text_cf" <?php if( $cf_name == "text_cf" ){ echo ' selected'; } ?>>text_cf()</option>
				<option value="my_cf" <?php if( $cf_name == "my_cf" ){ echo ' selected'; } ?>>my_cf()</option>
			</select>
		</label>
		<div style="float: left;" title="Rotation of Center <span class='green'>Function</span> image/text. Suitable for <span class='green'>square</span> sized image/text.<br>
		<span class='green'>off</span> - no rotation;<br><span class='green'>&#8635;</span> - clockwise rotation (<span class='green'>image_cf()</span> & 
		<span class='green'>text_cf()</span>);<br><span class='green'>&#8634;</span> - counterclockwise rotation (<span class='green'>image_cf()</span> & <span class='green'>
		text_cf()</span>).">
			Rotation
			<br>
			<input class="radio" id="<?=$this->get_field_id('cf_rotation'); ?>"
			name="<?=$this->get_field_name('cf_rotation'); ?>" type="radio" value="0"
			<?php if( $cf_rotation == "0" ){ echo ' checked="checked"'; } ?>>off
			
			<input style="margin: 0 0 0 3px;" class="radio" id="<?=$this->get_field_id('cf_rotation'); ?>"
			name="<?=$this->get_field_name('cf_rotation'); ?>" type="radio" value="1"
			<?php if( $cf_rotation == "1" ){ echo ' checked="checked"'; } ?>><span style="font-size: 14px; line-height: 4px; font-weight: normal;">&#8635;</span>
			
			<input style="margin: 0 0 0 3px;" class="radio" id="<?=$this->get_field_id('cf_rotation'); ?>"
			name="<?=$this->get_field_name('cf_rotation'); ?>" type="radio" value="-1"
			<?php if( $cf_rotation == "-1" ){ echo ' checked="checked"'; } ?>><span style="font-size: 14px; line-height: 4px; font-weight: normal;">&#8634;</span>
		</div>
		<label style="margin-left: 15px;" title="Opacity of Center <span class='green'>Function</span> image/text" for="<?=$this->get_field_id('cf_opacity'); ?>">
			Opacity
			<br>
			<select id="<?=$this->get_field_id('cf_opacity'); ?>" name="<?=$this->get_field_name('cf_opacity'); ?>">
				<?php for($i=5; $i<105; $i+=5){echo '<option id="cfo_' . $i . '" value="' . $i/100 . '"'; if($cf_opacity==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
		<label style="padding: 15px 0 0 8px; text-align: center;">
			<a style="color:#dc143c; font-weight: bold;" title="...of Center Function" href="http://peter.bg/archives/9695" target="_blank">Examples</a>
		</label>		
		<div class="thick-spacer" style="float: none; border-bottom: 1px dotted #bbb;"></div>
		<span title="Put an image in the center of your cloud.">Image Center Function</span>
		<br>
		<label style="clear: both; width: 200px; margin: 0 25px 0 0;" title="Enter location of your image:<br><span class='green'>http://your-site/your-folder/your-image.png</span>
		<br>Image size (width & height) is good to be bigger or equal to widget's one. Plugin will resize it to a proper value. Preferably use png format due to advantage of 
		transparency." for="<?=$this->get_field_id('cf_image_loc'); ?>">
			URL
			<input style="width: 100%;"
			id="<?=$this->get_field_id('cf_image_loc'); ?>"
			name="<?=$this->get_field_name('cf_image_loc'); ?>" type="text"
			value="<?php echo $cf_image_loc; ?>" /> 
		</label>
		<div style="float: left;" title="Turn <span class='green'>on</span> if Center Function creates too big image.">
		Image Reduction
		<br>
		<input class="radio" id="<?=$this->get_field_id('img_reduction'); ?>"
			name="<?=$this->get_field_name('img_reduction'); ?>" type="radio" value="0"
			<?php if( $img_reduction == "0" ){ echo ' checked="checked"'; } ?>>on
			
			<input style="margin: 0 0 0 8px;" class="radio" id="<?=$this->get_field_id('img_reduction'); ?>"
			name="<?=$this->get_field_name('img_reduction'); ?>" type="radio" value="0.25"
			<?php if( $img_reduction == "0.25" ){ echo ' checked="checked"'; } ?>>off
		</div>
		<div class="thin-spacer" style="border-bottom: 1px dotted #bbb;"></div>
		<div style="clear: both; padding-top: 5px;">
			<span title="Put a text object in the center of your cloud.">Text Center Function</span>
			<br>
			<label style="margin: 0 4px 0 0;" for="<?=$this->get_field_id('text_cont'); ?>" title="Choose shape of container for your text: <span class='green'>square</span> 
			(suitable for all types of cloud <span class='green'>shape</span>), <span class='green'>landscape</span> rectangle (suitable for shape <span class='green'>hring</span> 
			and <span class='green'>hcylinder</span> when <span class='green'>x-axis</span> rotation is locked) or <span class='green'>portrait</span> rectangle (suitable for 
			<span class='green'>vring</span> and <span class='green'>vcylinder</span> when <span class='green'>y-axis</span> rotation is locked).">
				Text Container
				<br>
				<select id="<?=$this->get_field_id('text_cont'); ?>" name="<?=$this->get_field_name('text_cont'); ?>">
					<option value="square" <?php if( $text_cont == "square" ){ echo ' selected'; } ?>>square</option>
					<option value="landscape" <?php if( $text_cont == "landscape" ){ echo ' selected'; } ?>>landscape</option>
					<option value="portrait" <?php if( $text_cont == "portrait" ){ echo ' selected'; } ?>>portrait</option>
				</select>
			</label>
			<label style="margin: 0 4px 0 0;" for="<?=$this->get_field_id('text_zoom'); ?>" title="Zooms your text object">
				Zoom
				<br>
				<select id="<?=$this->get_field_id('text_zoom'); ?>" name="<?=$this->get_field_name('text_zoom'); ?>">
					<?php for($i=2; $i<21; $i++){echo '<option id="txtzoom_' . $i . '" value="' . $i/10 . '"'; if($text_zoom==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
				</select>
			</label>
			<label style="margin: 0 4px 0 0;" title="Border width of text object: 0 for no border." for="<?=$this->get_field_id('cont_border'); ?>">
				Border
				<br>
				<select id="<?=$this->get_field_id('cont_border'); ?>" name="<?=$this->get_field_name('cont_border'); ?>">
					<?php for($i=0; $i<4; $i++){echo '<option id="cntb_' . $i . '" value="' . $i . '"'; if($cont_border==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="margin: 0 4px 0 0;" title="Height of the font" for="<?=$this->get_field_id('font_h'); ?>">
				Font Size
				<br>
				<select id="<?=$this->get_field_id('font_h'); ?>" name="<?=$this->get_field_name('font_h'); ?>">
					<?php for($i=10; $i<61; $i++){echo '<option id="fnth_' . $i . '" value="' . $i . '"'; if($font_h==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<div style="float: left;" title="Choose weight of text.">
			Font Weight
			<br>
				<input class="radio" id="<?=$this->get_field_id('font_w'); ?>"
				name="<?=$this->get_field_name('font_w'); ?>" type="radio" value="normal"
				<?php if( $font_w == "normal" ){ echo ' checked="checked"'; } ?>>normal
				<br>
				<input class="radio" id="<?=$this->get_field_id('font_w'); ?>"
				name="<?=$this->get_field_name('font_w'); ?>" type="radio" value="bold"
				<?php if( $font_w == "bold" ){ echo ' checked="checked"'; } ?>>bold
			</div>
			<div class="thin-spacer"></div>		
			<div style="display: inline-block; width: 127px; float: left;">
				<span style="font-weight: normal; padding: 0 0 0 40px;">Text</span>
				<br>
				<label style="clear: both; padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('text_line_1'); ?>">
					<div style="display: inline-block;">Line 1</div>
					<input style="width: 84px;" id="<?=$this->get_field_id('text_line_1'); ?>"
					name="<?=$this->get_field_name('text_line_1'); ?>" type="text"
					value="<?php echo $text_line_1; ?>" onblur="qutes_check(this, this.value)"  />
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('text_line_2'); ?>">
					<div style="display: inline-block;">Line 2</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('text_line_2'); ?>"
					name="<?=$this->get_field_name('text_line_2'); ?>" type="text"
					value="<?php echo $text_line_2; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('text_line_3'); ?>">
					<div style="display: inline-block;">Line 3</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('text_line_3'); ?>"
					name="<?=$this->get_field_name('text_line_3'); ?>" type="text"
					value="<?php echo $text_line_3; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('text_line_4'); ?>">
					<div style="display: inline-block;">Line 4</div>
					<input	style="width: 84px;" id="<?=$this->get_field_id('text_line_4'); ?>"
					name="<?=$this->get_field_name('text_line_4'); ?>" type="text"
					value="<?php echo $text_line_4; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
				<label style="padding: 0 4px 0 0;" title="Enter short text (2-3 words)." for="<?=$this->get_field_id('text_line_5'); ?>">
					<div style="display: inline-block;">Line 5</div>
					<input style="width: 84px;" id="<?=$this->get_field_id('text_line_5'); ?>"
					name="<?=$this->get_field_name('text_line_5'); ?>" type="text"
					value="<?php echo $text_line_5; ?>" onblur="qutes_check(this, this.value)" /> 
				</label>
			</div>
			<div style="display: inline-block;">
				<label style="height: 55px;" for="<?=$this->get_field_id('text_color_cf'); ?>">
					Text Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the text. Empty to use the color of the original link."
						class="colors" id="<?=$this->get_field_id('text_color_cf'); ?>"
						name="<?=$this->get_field_name('text_color_cf'); ?>" type="text"
						value="<?php echo $text_color_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($text_color_cf != '') {echo '<span class="color" style="color: #' . $text_color_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="height: 55px;" for="<?=$this->get_field_id('bg_color_cf'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Background color of the text. Empty for no background."
						class="colors" id="<?=$this->get_field_id('bg_color_cf'); ?>"
						name="<?=$this->get_field_name('bg_color_cf'); ?>" type="text"
						value="<?php echo $bg_color_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($bg_color_cf != '') {echo '<span class="color" style="color: #' . $bg_color_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
						?>
					</div>
				</label>
				<label style="height: 55px;" for="<?=$this->get_field_id('border_cf'); ?>">
					Border Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Border color of text container. Empty for no border."
						class="colors" id="<?=$this->get_field_id('border_cf'); ?>"
						name="<?=$this->get_field_name('border_cf'); ?>" type="text"
						value="<?php echo $border_cf; ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($border_cf != '') {echo '<span class="color" style="color: #' . $border_cf . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<br>
				<label title="36 Google Fonts for your text" style="float: left; margin-right: 5px;" for="<?=$this->get_field_id('font_cf'); ?>">
					Font
					<br>
					<select id="<?=$this->get_field_id('font_cf'); ?>" name="<?=$this->get_field_name('font_cf'); ?>">
						<option value="Allan" <?php if( $font_cf == "Allan" ){ echo ' selected'; } ?>>Allan</option>
						<option value="Alex Brush" <?php if( $font_cf == "Alex Brush" ){ echo ' selected'; } ?>>Alex Brush</option> 
						<option value="Audiowide" <?php if( $font_cf == "Audiowide" ){ echo ' selected'; } ?>>Audiowide</option>
						<option value="Autour One" <?php if( $font_cf == "Autour One" ){ echo ' selected'; } ?>>Autour One</option>
						<option value="Bad Script" <?php if( $font_cf == "Bad Script" ){ echo ' selected'; } ?>>Bad Script</option>
						<option value="Black Ops One" <?php if( $font_cf == "Black Ops One" ){ echo ' selected'; } ?>>Black Ops One</option>
						<option value="Bonbon" <?php if( $font_cf == "Bonbon" ){ echo ' selected'; } ?>>Bonbon</option>
						<option value="Caesar Dressing" <?php if( $font_cf == "Caesar Dressing" ){ echo ' selected'; } ?>>Caesar Dressing</option>
						<option value="Courgette" <?php if( $font_cf == "Courgette" ){ echo ' selected'; } ?>>Courgette</option>
						<option value="Dancing Script" <?php if( $font_cf == "Dancing Script" ){ echo ' selected'; } ?>>Dancing Script</option>
						<option value="Fira Mono" <?php if( $font_cf == "Fira Mono" ){ echo ' selected'; } ?>>Fira Mono</option>
						<option value="Inconsolata" <?php if( $font_cf == "Inconsolata" ){ echo ' selected'; } ?>>Inconsolata</option>
						<option value="Indie Flower" <?php if( $font_cf == "Indie Flower" ){ echo ' selected'; } ?>>Indie Flower</option>
						<option value="Lobster" <?php if( $font_cf == "Lobster" ){ echo ' selected'; } ?>>Lobster</option>
						<option value="Monoton" <?php if( $font_cf == "Monoton" ){ echo ' selected'; } ?>>Monoton</option>
						<option value="Nova Cut" <?php if( $font_cf == "Nova Cut" ){ echo ' selected'; } ?>>Nova Cut</option>
						<option value="Offside" <?php if( $font_cf == "Offside" ){ echo ' selected'; } ?>>Offside</option>
						<option value="Orbitron" <?php if( $font_cf == "Orbitron" ){ echo ' selected'; } ?>>Orbitron</option>
						<option value="Oxygen Mono" <?php if( $font_cf == "Oxygen Mono" ){ echo ' selected'; } ?>>Oxygen Mono</option>
						<option value="Permanent Marker" <?php if( $font_cf == "Permanent Marker" ){ echo ' selected'; } ?>>Permanent Marker</option>
						<option value="Pinyon Script" <?php if( $font_cf == "Pinyon Script" ){ echo ' selected'; } ?>>Pinyon Script</option>
						<option value="Pirata One" <?php if( $font_cf == "Pirata One" ){ echo ' selected'; } ?>>Pirata One</option>
						<option value="Poiret One" <?php if( $font_cf == "Poiret One" ){ echo ' selected'; } ?>>Poiret One</option>
						<option value="Rock Salt" <?php if( $font_cf == "Rock Salt" ){ echo ' selected'; } ?>>Rock Salt</option>
						<option value="Sancreek" <?php if( $font_cf == "Sancreek" ){ echo ' selected'; } ?>>Sancreek</option>
						<option value="Shadows Into Light" <?php if( $font_cf == "Shadows Into Light" ){ echo ' selected'; } ?>>Shadows Into Light</option>
						<option value="Share Tech Mono" <?php if( $font_cf == "Share Tech Mono" ){ echo ' selected'; } ?>>Share Tech Mono</option>
						<option value="Smokum" <?php if( $font_cf == "Smokum" ){ echo ' selected'; } ?>>Smokum</option>
						<option value="Snowburst One" <?php if( $font_cf == "Snowburst One" ){ echo ' selected'; } ?>>Snowburst One</option>
						<option value="Special Elite" <?php if( $font_cf == "Special Elite" ){ echo ' selected'; } ?>>Special Elite</option>
						<option value="Syncopate" <?php if( $font_cf == "Syncopate" ){ echo ' selected'; } ?>>Syncopate</option>
						<option value="Tangerine" <?php if( $font_cf == "Tangerine" ){ echo ' selected'; } ?>>Tangerine</option>
						<option value="Unkempt" <?php if( $font_cf == "Unkempt" ){ echo ' selected'; } ?>>Unkempt</option>
						<option value="Warnes" <?php if( $font_cf == "Warnes" ){ echo ' selected'; } ?>>Warnes</option>
						<option value="Wire One" <?php if( $font_cf == "Wire One" ){ echo ' selected'; } ?>>Wire One</option>
						<option value="Yellowtail" <?php if( $font_cf == "Yellowtail" ){ echo ' selected'; } ?>>Yellowtail</option>
					</select>
				</label>
			</div>
		</div>
		<div class="thin-spacer"></div>
		<div style="clear: both; border-top: 1px dotted #bbb; padding-top: 5px;">
			<span>My Center Function</span>
			<br>
			Create a js file and put in it your function named <span>my_cf</span>:
			<label style="float: left; border-radius: 10px; border: 1px dotted #bbb;" for="<?=$this->get_field_id('cf_name'); ?>">
				<div style="width: 92px; display: inline-block; margin: 5px 0 0 5px;">
					<i>function my_cf(){<br>
					&nbsp; &nbsp;...<br>
					}</i><br>
				</div>
			</label>
			<label style="margin: 5px 0 0 35px; width: 200px;" title="URL of a js file containing your <span class='green'>my_cf()</span> function. For example:
			<br><span>http://your-domain.com/your-js-folder/your-file.js</span>. <span>IMPORTANT</span>: You can include it in as many widget instances as you want, but you can 
			have ONLY ONE <span class='green'>my_cf()</span> function." for="<?=$this->get_field_id('cf_url'); ?>" style="float: left; width: 255px;">
				URL 
				<input style="width: 100%;"
				id="<?=$this->get_field_id('cf_url'); ?>"
				name="<?=$this->get_field_name('cf_url'); ?>" type="text"
				value="<?php echo $cf_url; ?>" /> 
			</label>
		</div>
	</div>
	<h3><span class="front-title">tags:</span> WEIGHT & OUTLINE</h3>
	<div class="section_content">
		<span>WEIGHT</span>
		<br>
		<div style="float: left; margin: 0 6px 0 0;">
			Status
			<br>
			<input style="margin: 3px 1px 0 0;" title="Switches on tag weighting. Subject to weighting could be all types of Cloud's content except <span class='green'>Menu</span>, <span class='green'>Pages</span> and <span class='green'>Page/Post Links</span>. Weighting of <span class='green'>Links</span> and <span class='green'>Recent Posts</span> is good to be combined with <span class='green'>Shuffle Tags</span>." class="radio" id="<?=$this->get_field_id('weight'); ?>"
			name="<?=$this->get_field_name('weight'); ?>" type="radio" value="true"
			<?php if( $weight == "true" ){ echo ' checked="checked"'; } ?>>on
			<br>
			<input style="margin: 0 1px 0 0;" title="Switches off tag weighting." class="radio" id="<?=$this->get_field_id('weight'); ?>"
			name="<?=$this->get_field_name('weight'); ?>" type="radio" value="false"
			<?php if( $weight == "false" ){ echo ' checked="checked"'; } ?>>off
		</div>
		<label style="margin: 0 6px 0 0; float: left;" title="Method to use for displaying tag weights:<br>
		<span class='green'>size</span> - displays more significant tags in a larger font size;<br>
		<span class='green'>color</span> - displays tags using color values from the <span class='green'>Gradient Color</span> options;<br>
		<span class='green'>size&color</span> - uses both size and color to visualise weights;<br>
		<span class='green'>background</span> - uses a <span class='green'>Gradient Color</span> to set the tag background color;<br>
		<span class='green'>outline</span> - uses a <span class='green'>Gradient Color</span> to set the tag highlight color;<br>
		<span class='green'>border</span> - uses a <span class='green'>Gradient Color</span> to set the tag border color. 
		<span class='green'>Border</span> option in <span class='green'>TAGS: SIZES</span> section must be enabled." for="<?=$this->get_field_id('weight_mode'); ?>">
			Weight<br>Mode
			<br>
			<select id="<?=$this->get_field_id('weight_mode'); ?>" name="<?=$this->get_field_name('weight_mode'); ?>">
				<option value="size" <?php if( $weight_mode == "size" ){ echo ' selected'; } ?>>size</option>
				<option value="color" <?php if( $weight_mode == "color" ){ echo ' selected'; } ?>>color</option>
				<option value="both" <?php if( $weight_mode == "both" ){ echo ' selected'; } ?>>size&color</option>
				<option value="bgcolor" <?php if( $weight_mode == "bgcolor" ){ echo ' selected'; } ?>>background</option>
				<option value="outline" <?php if( $weight_mode == "outline" ){ echo ' selected'; } ?>>outline</option>
				<option value="bgoutline" <?php if( $weight_mode == "bgoutline" ){ echo ' selected'; } ?>>border</option>
			</select>
		</label>		
		<label style="margin: 0 6px 0 0; float: left;" title="Multiplier for adjusting the size of tags when using a weight mode of <span class='green'>size</span> or 
		<span class='green'>size & color</span>." for="<?=$this->get_field_id('weight_size'); ?>">
			Weight<br>Factor
			<br>
			<select id="<?=$this->get_field_id('weight_size'); ?>" name="<?=$this->get_field_name('weight_size'); ?>">
				<?php for($i=50; $i<505; $i+=5){echo '<option id="ws_' . $i . '" value="' . $i/100 . '"'; if($weight_size==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
			</select>
		</label>
		<label style="margin: 0 6px 0 0; float: left;" title="Minimal font size when weighted sizing is enabled." for="<?=$this->get_field_id('weight_size_min'); ?>">
			Weight<br>Size Min
			<br>
			<select id="<?=$this->get_field_id('weight_size_min'); ?>" name="<?=$this->get_field_name('weight_size_min'); ?>">
				<?php for($i=6; $i<17; $i++){echo '<option id="wsmi_' . $i . '" value="' . $i . '"'; if($weight_size_min==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<label title="Maximal font size when weighted sizing is enabled." for="<?=$this->get_field_id('weight_size_max'); ?>">
			Weight<br>Size Max
			<br>
			<select id="<?=$this->get_field_id('weight_size_max'); ?>" name="<?=$this->get_field_name('weight_size_max'); ?>">
				<?php for($i=18; $i<33; $i++){echo '<option id="wsm_' . $i . '" value="' . $i . '"'; if($weight_size_max==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<div class="thin-spacer"></div>
		<div style="float: left;" title="This is the link attribute to take the tag weight from. Create your links with <span class='green'>data-weight</span> to embed custom data. 
		If this option is <span class='green'>off</span> the weight will be taken from the calculated link font size.">
			Weight from 'data-weight' attribute
			<br>
			<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('weight_from'); ?>"
			name="<?=$this->get_field_name('weight_from'); ?>" type="radio" value="data-weight"
			<?php if( $weight_from == "data-weight" ){ echo ' checked="checked"'; } ?>>on
			
			<input style="margin: 0 1px 0 0;" class="radio" id="<?=$this->get_field_id('weight_from'); ?>"
			name="<?=$this->get_field_name('weight_from'); ?>" type="radio" value=""
			<?php if( $weight_from == "" ){ echo ' checked="checked"'; } ?>>off
		</div>	
		<div class="divider"></div>
		<div style="float: left; width: 100%; font-weight: bold; padding: 2px 0 0;">OUTLINE METHOD</div>
		<br>
		<div style="float: left; margin: 0;" title="Type of highlight to use">
			<div style="margin: 0 0 2px 0; padding: 5px 2px 1px 2px; border: 1px dotted #bbb; border-right: 0; border-radius: 10px 0 0 10px; display: inline-block;">
				<input title="An outline at the same depth as the active tag" class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="outline"
				<?php if( $outline_method == "outline" ){ echo ' checked="checked"'; } ?>>outline
				<div style="height: 3px; width: 100%;"></div>
				<input title="Old-style outline on top of all tags" class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="classic"
				<?php if( $outline_method == "classic" ){ echo ' checked="checked"'; } ?>>classic
			</div>
			<div style="margin: 0 0 0 3px;">
				<input title="Solid block of color around the active tag" class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="block"
				<?php if( $outline_method == "block" ){ echo ' checked="checked"'; } ?>>block
				<div style="height: 3px; width: 100%;"></div>
				<input title="Changes the color of the text or image of the current tag to the <span class='green'>Outline</span> color value." class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="color"
				<?php if( $outline_method == "color" ){ echo ' checked="checked"'; } ?>>color
				<div style="height: 3px; width: 100%;"></div>
				<input title="Increases the size of the tag, using the <span class='green'>Outline Increase</span> option for the amount." class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="size"
				<?php if( $outline_method == "size" ){ echo ' checked="checked"'; } ?>>size
				<div style="height: 3px; width: 100%;"></div>
				<input title="No outline method is applied." class="radio" id="<?=$this->get_field_id('outline_method'); ?>"
				name="<?=$this->get_field_name('outline_method'); ?>" type="radio" value="none"
				<?php if( $outline_method == "none" ){ echo ' checked="checked"'; } ?>>none
			</div>
		</div>
		<span style="font-size: 18px; float: left; padding: 8px 0 8px 10px; border-top: 1px dotted #bbb; border-bottom: 1px dotted #bbb;">&#8594;</span>
		<div style="margin: 0 0 2px 0; padding: 2px 0 4px 10px; border: 1px dotted #bbb; border-left: 0; border-radius: 0 10px 10px 0; display: inline-block;">
			<label style="margin: 0 10px 0 0; float: left;" title="The size of the pattern (0 for no dash pattern)" for="<?=$this->get_field_id('outline_dash'); ?>">
				Dash
				<br>
				<select id="<?=$this->get_field_id('outline_dash'); ?>" name="<?=$this->get_field_name('outline_dash'); ?>">
					<?php for($i=0; $i<61; $i++){echo '<option id="dash_' . $i . '" value="' . $i . '"'; if($outline_dash==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="margin: 0 10px 0 0; float: left;" title="The size of the gap between the dashes" for="<?=$this->get_field_id('outline_dash_space'); ?>">
				Dash Space
				<br>
				<select id="<?=$this->get_field_id('outline_dash_space'); ?>" name="<?=$this->get_field_name('outline_dash_space'); ?>">
					<?php for($i=1; $i<61; $i++){echo '<option id="dashspa_' . $i . '" value="' . $i . '"'; if($outline_dash_space==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="float: left;" title="The speed of pattern move (0 for still pattern, minus changes the direction)" for="<?=$this->get_field_id('outline_dash_speed'); ?>">
				Dash Speed
				<br>
				<select id="<?=$this->get_field_id('outline_dash_speed'); ?>" name="<?=$this->get_field_name('outline_dash_speed'); ?>">
					<?php for($i=-20; $i<21; $i++){echo '<option id="dashspe_' . $i . '" value="' . $i . '"'; if($outline_dash_speed==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>
			</label>
		</div>
	</div>
	<h3><span class="front-title">tags:</span> COLORS & OPACITY</h3>
	<div class="section_content" style="padding: 5px 1px;">
		<span style="float: left;">COLORS</span>
		<br>
		<div class="thin-spacer"></div>
		<div style="padding-top: 5px;">
			<label style="height: 55px;" for="<?=$this->get_field_id('text_color'); ?>">
				Tag Color
				<br>
				<span class="hash">#</span>
				<div class="siwraper" style="text-align: center;">
					<input title="Color of the tag text: Empty to use the color of the original link."
					class="colors" id="<?=$this->get_field_id('text_color'); ?>"
					name="<?=$this->get_field_name('text_color'); ?>" type="text"
					value="<?php echo $text_color; ?>" onblur="hex_val_check(this, this.value)" />
					<?php 
						if($text_color != '') {echo '<span class="color" style="color: #' . $text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
					?>
				</div>
			</label>
			<label style="height: 55px;" for="<?=$this->get_field_id('bg_color'); ?>">
				Background
				<br>
				<span class="hash">#</span>
				<div class="siwraper" style="margin: 0; text-align: center;">
					<input title="Background color of tags: Empty for no background. The string <span class='green'>'tag'</span> means use the original link background 
					color."
					class="colors" id="<?=$this->get_field_id('bg_color'); ?>"
					name="<?=$this->get_field_name('bg_color'); ?>" type="text"
					value="<?php echo $bg_color; ?>" onblur="hex_val_check(this, this.value)" />
					<br>
					<?php 
						if($bg_color != '' && $bg_color != 'tag') {echo '<span class="color" style="color: #' . $bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
						else {if($bg_color == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}};
					?>
				</div>
			</label>
			<label style="height: 55px;" for="<?=$this->get_field_id('bg_outline'); ?>">
				Border
				<br>
				<span class="hash">#</span>
				<div class="siwraper" style="text-align: center;">
					<input title="Color of tag border: Empty for the same as the text color. Use <span class='green'>'tag'</span> for the original link text color."
					class="colors" id="<?=$this->get_field_id('bg_outline'); ?>"
					name="<?=$this->get_field_name('bg_outline'); ?>" type="text"
					value="<?php echo $bg_outline; ?>" onblur="hex_val_check(this, this.value)" />
					<br>
					<?php 
						if($bg_outline != '' && $bg_outline != 'tag') {echo '<span class="color" style="color: #' . $bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
						else {if($bg_outline == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
				</div>
			</label>
			<label style="height: 55px;" for="<?=$this->get_field_id('shadow'); ?>">
				Shadow
				<br>
				<span class="hash">#</span>
				<div class="siwraper">
					<input title="Color of the shadow behind each tag: Empty for no shadow."
					class="colors" id="<?=$this->get_field_id('shadow'); ?>"
					name="<?=$this->get_field_name('shadow'); ?>" type="text"
					value="<?php echo $shadow; ?>" onblur="hex_val_check(this, this.value)" />
					<br>
					<?php 
						if($shadow != '') {echo '<span class="color" style="color: #' . $shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
					?>
				</div>
			</label>								
			<label style="height: 55px;" for="<?=$this->get_field_id('outline_color'); ?>">
				Outline
				<br>
				<span class="hash">#</span>
				<div class="siwraper" style="margin: 0; text-align: center;">
					<input title="Color of the active tag highlight: This can be a color to use for all tags, or one of these options to set the color differently for each tag:<br>
					<span class='green'>'tag'</span> - uses the text color from the original tag link;<br>
					<span class='green'>'tagbg'</span> - uses the background color from the original tag link. See also the <span class='green'>'outline' Weight Mode</span> 
					for another way to set the highlight color. Empty for no outline."
					class="colors" id="<?=$this->get_field_id('outline_color'); ?>"
					name="<?=$this->get_field_name('outline_color'); ?>" type="text"
					value="<?php echo $outline_color; ?>" onblur="hex_val_check(this, this.value)" />
					<br>
					<?php 
						if($outline_color != '' && $outline_color != 'tag' && $outline_color != 'tagbg') {echo '<span class="color" style="color: #' . $outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
						else {if($outline_color == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}
							else {if($outline_color == 'tagbg'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original bg</span>';};}
						};
						?>
				</div>
			</label>
			<div style="display: inline-block; height: 60px;">	
				<label for="<?=$this->get_field_id('weight_gradient_1'); ?>">
					Gradient<br>Color: 0
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="The color gradient used for coloring tags, backgrounds, etc. when using a color-based weight mode. 
						Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. 
						All 4 Gradient values must be entered to take effect." 
						class="colors" id="<?=$this->get_field_id('weight_gradient_1'); ?>"
						name="<?=$this->get_field_name('weight_gradient_1'); ?>" type="text"
						value="<?php echo $weight_gradient_1 ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($weight_gradient_1 != '') {echo '<span class="color" style="color: #' . $weight_gradient_1 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('weight_gradient_2'); ?>">
					Gradient<br>Color: 0.33
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="The color gradient used for coloring tags, backgrounds, etc. when using a color-based weight mode. 
						Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. 
						All 4 Gradient values must be entered to take effect." 
						class="colors" id="<?=$this->get_field_id('weight_gradient_2'); ?>"
						name="<?=$this->get_field_name('weight_gradient_2'); ?>" type="text"
						value="<?php echo $weight_gradient_2 ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($weight_gradient_2 != '') {echo '<span class="color" style="color: #' . $weight_gradient_2 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('weight_gradient_3'); ?>">
					Gradient<br>Color: 0.67
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="The color gradient used for coloring tags, backgrounds, etc. when using a color-based weight mode. 
						Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. 
						All 4 Gradient values must be entered to take effect." 
						class="colors" id="<?=$this->get_field_id('weight_gradient_3'); ?>"
						name="<?=$this->get_field_name('weight_gradient_3'); ?>" type="text"
						value="<?php echo $weight_gradient_3 ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($weight_gradient_3 != '') {echo '<span class="color" style="color: #' . $weight_gradient_3 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label for="<?=$this->get_field_id('weight_gradient_4'); ?>">
					Gradient<br>Color: 1
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0;">
						<input title="The color gradient used for coloring tags, backgrounds, etc. when using a color-based weight mode. 
						Start with the color for the &#34;heaviest&#34; tag at 0, and ending at 1 with the least weighty tag color. 
						All 4 Gradient values must be entered to take effect." 
						class="colors" id="<?=$this->get_field_id('weight_gradient_4'); ?>"
						name="<?=$this->get_field_name('weight_gradient_4'); ?>" type="text"
						value="<?php echo $weight_gradient_4 ?>" onblur="hex_val_check(this, this.value)" />
						<br>
						<?php 
							if($weight_gradient_4 != '') {echo '<span class="color" style="color: #' . $weight_gradient_4 . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="padding: 15px 0 0 8px; text-align: center;">
					<a style="color:#dc143c; font-weight: bold;" href="http://www.goat1000.com/tagcanvas-weighted.php" target="_blank">Gradient<br>Examples</a>
				</label>
			</div>
			<label style="margin-top: 5px; width: 100%;" for="<?=$this->get_field_id('multiple_colors'); ?>">
				Multiple Colors (hex, no #)
				<br>
				<div class="muwraper" style="margin: 0;">
					<input id="muco" class="colors" title="Colors that will be distributed randomly to your cloud content. Enter hex values without #, separated by coma. To use 
					this function you have to empty the above <span class='green'>Tag Color</span> field and switch off <span class='green'>Weight</span> or set 
					<span class='green'>Weight Mode</span> to <span class='green'>size</span>."
					id="<?=$this->get_field_id('multiple_colors'); ?>"
					name="<?=$this->get_field_name('multiple_colors'); ?>" type="text"
					value="<?php echo $multiple_colors; ?>" onblur="multi_colors_check(this, this.value, '#mucodiv')" /> 
					<div id="mucodiv" class="colors multi-wraper">
						<?php
							if($multiple_colors != '') {
								$str = str_replace(' ','',$multiple_colors);
								$mu_co_array = explode(',',$str);
								for($i=0;$i<=count($mu_co_array)-1;$i++){
								echo '<span class="multi-colors" style="color: #' . $mu_co_array[$i] . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';
								}
							}
						?>
					</div>
				</div> 
			</label> 
			<label style="margin: 5px 0 0; width: 100%;" for="<?=$this->get_field_id('multiple_bg'); ?>">
				Multiple Backgrounds (hex, no #)
				<br>
				<div class="muwraper" style="margin: 0;">
					<input id="muba" class="colors" title="Tag background colors that will be distributed randomly to your cloud content. Enter hex values without #, separated by 
					coma. To use this function type <span class='green'>tag</span> in the <span class='green'>Background</span> field above and switch off 
					<span class='green'>Weight</span> or set <span class='green'>Weight Mode</span> to <span class='green'>size</span>."
					id="<?=$this->get_field_id('multiple_bg'); ?>"
					name="<?=$this->get_field_name('multiple_bg'); ?>" type="text"
					value="<?php echo $multiple_bg; ?>" onblur="multi_colors_check(this, this.value, '#mubadiv')" /> 
					<div id="mubadiv" class="colors multi-wraper">
						<?php
							if($multiple_bg != '') {
								$str = str_replace(' ','',$multiple_bg);
								$mu_bg_array = explode(',',$str);
								for($i=0;$i<=count($mu_bg_array)-1;$i++){
								echo '<span class="multi-colors" style="color: #' . $mu_bg_array[$i] . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';
								}
							}
						?>
					</div>
				</div>
			</label>
			<div class="divider"></div>
			<span style="float: left;">OPACITY</span>
			<br>
			<div class="thin-spacer"></div>
			<label style="width: 80px;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('min_brightness'); ?>">
				Min Opacity
				<br>
				<select id="<?=$this->get_field_id('min_brightness'); ?>" name="<?=$this->get_field_name('min_brightness'); ?>">
					<?php for($i=0; $i<105; $i+=5){echo '<option id="mib_' . $i . '" value="' . $i/100 . '"'; if($min_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select>
			</label> 
			<label title="Maximal opacity of tags at front of cloud." for="<?=$this->get_field_id('max_brightness'); ?>">
				Max Opacity
				<br>
				<select id="<?=$this->get_field_id('max_brightness'); ?>" name="<?=$this->get_field_name('max_brightness'); ?>">
					<?php for($i=0; $i<105; $i+=5){echo '<option id="mab_' . $i . '" value="' . $i/100 . '"'; if($max_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
				</select>
			</label>
		</div>
	</div>
	<h3><span class="front-title">tags:</span> SIZES</h3>
	<div class="section_content" style="padding: 0 2px 5px;">
		<div style="padding: 5px 0 0; float: left;">
			<label style="width: 85px;" title="Height of the tag text font" for="<?=$this->get_field_id('text_height'); ?>">
				Font Height
				<br>
				<select id="<?=$this->get_field_id('text_height'); ?>" name="<?=$this->get_field_name('text_height'); ?>">	
					<?php for($i=6; $i<37; $i++){echo '<option id="txh_' . $i . '" value="' . $i . '"'; if($text_height==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="width: 85px;" title="Amount of space around text and inside background" for="<?=$this->get_field_id('padding'); ?>">
				Padding
				<br>
				<select id="<?=$this->get_field_id('padding'); ?>" name="<?=$this->get_field_name('padding'); ?>">	
					<?php for($i=1; $i<16; $i++){echo '<option id="pa_' . $i . '" value="' . $i . '"'; if($padding==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
			<label style="width: 85px;" title="Thickness of tag border, <span class='green'>0</span> for no border." for="<?=$this->get_field_id('bg_outline_thickness'); ?>">
				Border
				<br>
				<select id="<?=$this->get_field_id('bg_outline_thickness'); ?>" name="<?=$this->get_field_name('bg_outline_thickness'); ?>">
					<?php for($i=0; $i<11; $i++){echo '<option id="bgt_' . $i . '" value="' . $i . '"'; if($bg_outline_thickness==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px 
			</label>
			<label title="Radius for rounded corners of tag border" for="<?=$this->get_field_id('bg_radius'); ?>">
				Border Radius
				<br>
				<select id="<?=$this->get_field_id('bg_radius'); ?>" name="<?=$this->get_field_name('bg_radius'); ?>">
					<?php for($i=0; $i<62; $i++){echo '<option id="bgr_' . $i . '" value="' . $i . '"'; if($bg_radius==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			<select>px
		</label>
		</div>
		<div class="thick-spacer"></div>
		<label style="width: 85px;" title="Thickness of outline when <span class='green'>Outline Method</span> is <span class='green'>outline</span> or 
		<span class='green'>clasic</span>." for="<?=$this->get_field_id('outline_thickness'); ?>">
			<br>
			Outline
			<br>
			<select id="<?=$this->get_field_id('outline_thickness'); ?>" name="<?=$this->get_field_name('outline_thickness'); ?>">
				<?php for($i=1; $i<11; $i++){echo '<option id="out_' . $i . '" value="' . $i . '"'; if($outline_thickness==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px 
		</label>	
		<label style="width: 85px;" title="Radius for rounded corners on outline box" for="<?=$this->get_field_id('outline_radius'); ?>">
			Outline<br>Radius
			<br>
			<select id="<?=$this->get_field_id('outline_radius'); ?>" name="<?=$this->get_field_name('outline_radius'); ?>">	
				<?php for($i=0; $i<62; $i++){echo '<option id="our_' . $i . '" value="' . $i . '"'; if($outline_radius==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			<select>px
		</label>
		<label style="width: 85px;" title="Distance of outline from text when <span class='green'>Outline Method</span> is <span class='green'>outline</span> or 
		<span class='green'>clasic</span>. This also increases the size of the active area around the tag." for="<?=$this->get_field_id('outline_offset'); ?>">
			Outline<br>Offset
			<br>
			<select id="<?=$this->get_field_id('outline_offset'); ?>" name="<?=$this->get_field_name('outline_offset'); ?>">
				<?php for($i=0; $i<21; $i++){echo '<option id="ouo_' . $i . '" value="' . $i . '"'; if($outline_offset==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px 
		</label>	
		<label title="Number of pixels to increase size of tag by for the <span class='green'>size</span> <span class='green'>Outline Method</span>." for="<?=$this->get_field_id('outline_increase'); ?>">
			Outline<br>Increase<br>
			<select id="<?=$this->get_field_id('outline_increase'); ?>" name="<?=$this->get_field_name('outline_increase'); ?>">
				<?php for($i=1; $i<11; $i++){echo '<option id="oui_' . $i . '" value="' . $i . '"'; if($outline_increase==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<div class="thick-spacer"></div>
		<div style="float: left; margin: 0 34px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
			Shadow Offset [x, y]
			<br>
			<select id="<?=$this->get_field_id('shadow_offset_x'); ?>" name="<?=$this->get_field_name('shadow_offset_x'); ?>">
				<?php for($i=-5; $i<6; $i++){echo '<option id="sox_' . $i . '" value="' . $i . '"'; if($shadow_offset_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px<select style="margin: 0 0 0 32px!important;" id="<?=$this->get_field_id('shadow_offset_y'); ?>" name="<?=$this->get_field_name('shadow_offset_y'); ?>">	
				<?php for($i=-5; $i<6; $i++){echo '<option id="soy_' . $i . '" value="' . $i . '"'; if($shadow_offset_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</div>
		<label style="float: left; width: 85px;" title="Amount of tag shadow blurring" for="<?=$this->get_field_id('shadow_blur'); ?>">
			Shadow Blur
			<select id="<?=$this->get_field_id('shadow_blur'); ?>" name="<?=$this->get_field_name('shadow_blur'); ?>">	
				<?php for($i=0; $i<6; $i++){echo '<option id="shb_' . $i . '" value="' . $i . '"'; if($shadow_blur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>	
		<label title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are 
		automatically broken at line break tags." for="<?=$this->get_field_id('split_width'); ?>">
			Split Width
			<br>
			<select id="<?=$this->get_field_id('split_width'); ?>" name="<?=$this->get_field_name('split_width'); ?>">
				<option id="spw_0" value="0" <?php if( $split_width == "0" ){ echo ' selected'; } ?>>0</option>
				<?php for($i=50; $i<155; $i+=5){echo '<option id="spw_' . $i . '" value="' . $i . '"'; if($split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
			</select>px
		</label>
		<div class="thick-spacer" style="height: 7px;"></div>
		<div style="padding: 0; float: left;">
			<label style="width: 80px; margin-right: 4px;" title="Amount to scale images by. Depending on <span class='green'>Content</span> the default of 
			<span class='green'>1.0</span> uses:<br> - avatar size 96x96px (<span class='green'>Authors</span>, <span class='green'>Links</span> & <span class='green'>Menu</span>);
			<br> - thumbnail size 120x120px (<span class='green'>Page/Post Links</span>, <span class='green'>Pages</span> & <span class='green'>Recent Posts</span>)." for="<?=$this->get_field_id('image_scale'); ?>">
				Image Scale
				<br>
				<select id="<?=$this->get_field_id('image_scale'); ?>" name="<?=$this->get_field_name('image_scale'); ?>">
					<?php for($i=25; $i<1525; $i+=25){echo '<option id="ims_' . $i . '" value="' . $i/1000 . '"'; if($image_scale==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
				</select>
			</label>
		</div>
		<div style="padding: 0; float: left;">
			<label style="width: 80px;" title="Radius for image corners" for="<?=$this->get_field_id('image_radius'); ?>">
				Image Radius
				<br>
				<select id="<?=$this->get_field_id('image_radius'); ?>" name="<?=$this->get_field_name('image_radius'); ?>">
					<?php for($i=0; $i<62; $i++){echo '<option id="imr_' . $i . '" value="' . $i . '"'; if($image_radius==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
				</select>px
			</label>
		</div>
	</div>
	<h3><span class="front-title">tags:</span> MIXED IMAGE & TEXT</h3>
	<div class="section_content" style="padding: 5px 1px 0;">
		Applicable to: <b>Authors</b>, <b>Blogroll</b>, <b>Current Page/Post Links</b>, <b>Custom HTML container</b>, <b>Menu</b>, <b>Pages</b> and <b>Recent Posts</b>.
		<div style="padding-top: 10px; display: inline-block;">
			<label style="margin: 0 20px 0 0;" title="What to display when tag contains images and text:<br><span class='green'>null</span> - Image if present, otherwise text;
			<br><span class='green'>image</span> - Image tags only;<br><span class='green'>text</span> - Text tags only;<br><span class='green'>both</span> - Image and text on tag using <span class='green'>Image Position</span>." for="<?=$this->get_field_id('image_mode'); ?>">
				<br>
				Tag Mode
				<br>
				<select id="<?=$this->get_field_id('image_mode'); ?>" name="<?=$this->get_field_name('image_mode'); ?>">
					<option value="" <?php if( $image_mode == "" ){ echo ' selected'; } ?>>null</option>
					<option value="image" <?php if( $image_mode == "image" ){ echo ' selected'; } ?>>image</option>
					<option value="text" <?php if( $image_mode == "text" ){ echo ' selected'; } ?>>text</option>
					<option value="both" <?php if( $image_mode == "both" ){ echo ' selected'; } ?>>both</option>
				</select>
			</label>
			<label style="margin: 0 20px 0 0;" title="Position of image relative to text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('image_position'); ?>">
				Image<br>Position
				<br>
				<select id="<?=$this->get_field_id('image_position'); ?>" name="<?=$this->get_field_name('image_position'); ?>">
					<option value="left" <?php if( $image_position == "left" ){ echo ' selected'; } ?>>left</option>
					<option value="right" <?php if( $image_position == "right" ){ echo ' selected'; } ?>>right</option>
					<option value="top" <?php if( $image_position == "top" ){ echo ' selected'; } ?>>top</option>
					<option value="bottom" <?php if( $image_position == "bottom" ){ echo ' selected'; } ?>>bottom</option>
				</select>
			</label>
			<label style="margin: 0 20px 0 0;" title="Distance between image and text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('image_padding'); ?>">
				Image<br>Padding
				<br>
				<select id="<?=$this->get_field_id('image_padding'); ?>" name="<?=$this->get_field_name('image_padding'); ?>">
					<?php for($i=1; $i<11; $i++){echo '<option id="impa_' . $i . '" value="' . $i . '"'; if($image_padding==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
				</select>px
			</label>
		</div>
		<div style="padding-top: 5px; display: inline-block;">
			<label style="margin: 0 20px 5px 0;" title="Horizontal image alignment" for="<?=$this->get_field_id('image_align'); ?>">
				Horizontal<br>Image Align
				<br>
				<select id="<?=$this->get_field_id('image_align'); ?>" name="<?=$this->get_field_name('image_align'); ?>">
					<option value="left" <?php if( $image_align == "left" ){ echo ' selected'; } ?>>left</option>
					<option value="centre" <?php if( $image_align == "centre" ){ echo ' selected'; } ?>>center</option>
					<option value="right" <?php if( $image_align == "right" ){ echo ' selected'; } ?>>right</option>
				</select>
			</label>
			<label style="margin: 0 20px 5px 0;" title="Vertical image alignment" for="<?=$this->get_field_id('image_valign'); ?>">
				Vertical<br>Image Align
				<br>
				<select id="<?=$this->get_field_id('image_valign'); ?>" name="<?=$this->get_field_name('image_valign'); ?>">
					<option value="top" <?php if( $image_valign == "top" ){ echo ' selected'; } ?>>top</option>
					<option value="middle" <?php if( $image_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
					<option value="bottom" <?php if( $image_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
				</select>
			</label>
			<label style="margin: 0 20px 5px 0;" title="Horizontal text alignment" for="<?=$this->get_field_id('text_align'); ?>">
				Horizontal<br>Text Align
				<br>
				<select id="<?=$this->get_field_id('text_align'); ?>" name="<?=$this->get_field_name('text_align'); ?>">
					<option value="left" <?php if( $text_align == "left" ){ echo ' selected'; } ?>>left</option>
					<option value="centre" <?php if( $text_align == "centre" ){ echo ' selected'; } ?>>center</option>
					<option value="right" <?php if( $text_align == "right" ){ echo ' selected'; } ?>>right</option>
				</select>
			</label>
			<label style="margin: 0 0 5px;" title="Vertical text alignment" for="<?=$this->get_field_id('text_valign'); ?>">
				Vertical<br>Text Align
				<br>
				<select id="<?=$this->get_field_id('text_valign'); ?>" name="<?=$this->get_field_name('text_valign'); ?>">
					<option value="top" <?php if( $text_valign == "top" ){ echo ' selected'; } ?>>top</option>
					<option value="middle" <?php if( $text_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
					<option value="bottom" <?php if( $text_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
				</select>
			</label>
		</div>
	</div>
	<h3 class="fontheader"><span class="front-title">tags:</span> FONTS</h3>
	<div class="section_content" style="padding-bottom: 0;">
		<p style="margin: 0; padding: 0 5px; font-size: 12px; text-align: justify;">
			<b>N.B.</b> If no font is selected 'Arial' applies. In case of multiple selection fonts will be distributed randomly on the Cloud Content. Mixing fonts from both types is allowed.
		</p>
		<div class="divider"></div>
		<label style="margin: 0;" title="Web Safe Fonts are grouped in 5 families:<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Sans Serif (21);<br>
		<span style='border: 1px solid #bbb; color: #fff;'>&#9608;</span> - Serif (18);<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Monospaced (6);<br>
		<span style='border: 1px solid #bbb; color: #fff;'>&#9608;</span> - Fantasy (2);<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Script (1)." for="<?=$this->get_field_id('multiple_fonts'); ?>">
			Web Safe Fonts (48)
			<br>
			<select style="height: 389px!important; width: 169px;" id="<?=$this->get_field_id('multiple_fonts'); ?>" name="<?=$this->get_field_name('multiple_fonts'); ?>[]" multiple>
				<option style="background: #f1f1f1; font-family: Arial;" value="Arial" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Arial" ){ echo ' selected'; }} ?>>Arial</option>
				<option style="background: #f1f1f1; font-family: Arial Black;" value="Arial Black" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Arial Black" ){ echo ' selected'; }} ?>>Arial Black</option>
				<option style="background: #f1f1f1; font-family: Arial Narrow;" value="Arial Narrow" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Arial Narrow" ){ echo ' selected'; }} ?>>Arial Narrow</option>
				<option style="background: #f1f1f1; font-family: Avant Grande;" value="Avant Garde" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Avant Garde" ){ echo ' selected'; }} ?>>Avant Garde</option>
				<option style="background: #f1f1f1; font-family: Calibri;" value="Calibri" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Calibri" ){ echo ' selected'; }} ?>>Calibri</option>
				<option style="background: #f1f1f1; font-family: Candara;" value="Candara" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Candara" ){ echo ' selected'; }} ?>>Candara</option>
				<option style="background: #f1f1f1; font-family: Century Gothic;"	value="Century Gothic" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Century Gothic" ){ echo ' selected'; }} ?>>Century Gothic</option>
				<option style="background: #f1f1f1; font-family: Comic Sans MS;""	value="Comic Sans MS" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Comic Sans MS" ){ echo ' selected'; }} ?>>Comic Sans MS</option>
				<option style="background: #f1f1f1; font-family: Franklin Gothic Medium;"" value="Franklin Gothic Medium" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Franklin Gothic Medium" ){ echo ' selected'; }} ?>>Franklin Gothic Medium</option>
				<option style="background: #f1f1f1; font-family: Futura;"	value="Futura" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Futura" ){ echo ' selected'; }} ?>>Futura</option>
				<option style="background: #f1f1f1; font-family: Geneva;"	value="Geneva" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Geneva" ){ echo ' selected'; }} ?>>Geneva</option>
				<option style="background: #f1f1f1; font-family: Gill Sans;"	value="Gill Sans" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Gill Sans" ){ echo ' selected'; }} ?>>Gill Sans</option>
				<option style="background: #f1f1f1; font-family: Helvetica;" value="Helvetica" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Helvetica" ){ echo ' selected'; }} ?>>Helvetica</option>
				<option style="background: #f1f1f1; font-family: Impact;" value="Impact" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Impact" ){ echo ' selected'; }} ?>>Impact</option>
				<option style="background: #f1f1f1; font-family: Lucida Grande;" value="Lucida Grande" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Lucida Grande" ){ echo ' selected'; }} ?>>Lucida Grande</option>
				<option style="background: #f1f1f1; font-family: Lucida Sans Unicode;" value="Lucida Sans Unicode" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Lucida Sans Unicode" ){ echo ' selected'; }} ?>>Lucida Sans Unicode</option>
				<option style="background: #f1f1f1; font-family: Optima;" value="Optima" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Optima" ){ echo ' selected'; }} ?>>Optima</option>
				<option style="background: #f1f1f1; font-family: Segoe UI;" value="Segoe UI" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Segoe UI" ){ echo ' selected'; }} ?>>Segoe UI</option>
				<option style="background: #f1f1f1; font-family: Tahoma;" value="Tahoma" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Tahoma" ){ echo ' selected'; }} ?>>Tahoma</option>
				<option style="background: #f1f1f1; font-family: Trebuchet MS;" value="Trebuchet MS" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Trebuchet MS" ){ echo ' selected'; }} ?>>Trebuchet MS</option>
				<option style="background: #f1f1f1; font-family: Verdana;" value="Verdana" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Verdana" ){ echo ' selected'; }} ?>>Verdana</option>
				<option style="font-family: Baskerville;" value="Baskerville" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Baskerville" ){ echo ' selected'; }} ?>>Baskerville</option>
				<option style="font-family: Big Caslon;" value="Big Caslon" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Big Caslon" ){ echo ' selected'; }} ?>>Big Caslon</option>
				<option style="font-family: Bodoni MT;" value="Bodoni MT" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Bodoni MT" ){ echo ' selected'; }} ?>>Bodoni MT</option>
				<option style="font-family: Book Antiqua;" value="Book Antiqua" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Book Antiqua" ){ echo ' selected'; }} ?>>Book Antiqua</option>
				<option style="font-family: Calisto MT;" value="Calisto MT" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Calisto MT" ){ echo ' selected'; }} ?>>Calisto MT</option>
				<option style="font-family: Cambria;" value="Cambria" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Cambria" ){ echo ' selected'; }} ?>>Cambria</option>
				<option style="font-family: Didot;" value="Didot" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Didot" ){ echo ' selected'; }} ?>>Didot</option>
				<option style="font-family: Garamond;" value="Garamond" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Garamond" ){ echo ' selected'; }} ?>>Garamond</option>
				<option style="font-family: Georgia;" value="Georgia" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Georgia" ){ echo ' selected'; }} ?>>Georgia</option>
				<option style="font-family: Goudy Old Style;" value="Goudy Old Style" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Goudy Old Style" ){ echo ' selected'; }} ?>>Goudy Old Style</option>
				<option style="font-family: Hoefler Text;" value="Hoefler Text" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Hoefler Text" ){ echo ' selected'; }} ?>>Hoefler Text</option>
				<option style="font-family: Lucida Bright;" value="Lucida Bright" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Lucida Bright" ){ echo ' selected'; }} ?>>Lucida Bright</option>
				<option style="font-family: Palatino;" value="Palatino" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Palatino" ){ echo ' selected'; }} ?>>Palatino</option>
				<option style="font-family: Palatino Linotype;" value="Palatino Linotype" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Palatino Linotype" ){ echo ' selected'; }} ?>>Palatino Linotype</option>
				<option style="font-family: Perpetua;" value="Perpetua" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Perpetua" ){ echo ' selected'; }} ?>>Perpetua</option>
				<option style="font-family: Rockwell;" value="Rockwell" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Rockwell" ){ echo ' selected'; }} ?>>Rockwell</option>
				<option style="font-family: Rockwell Extra Bold;" value="Rockwell Extra Bold" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Rockwell Extra Bold" ){ echo ' selected'; }} ?>>Rockwell Extra Bold</option>
				<option style="font-family: Times New Roman;" value="Times New Roman" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Times New Roman" ){ echo ' selected'; }} ?>>Times New Roman</option>
				<option style="background: #f1f1f1; font-family: Andale Mono;" value="Andale Mono" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Andale Mono" ){ echo ' selected'; }} ?>>Andale Mono</option>
				<option style="background: #f1f1f1; font-family: Consolas;" value="Consolas" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Consolas" ){ echo ' selected'; }} ?>>Consolas</option>
				<option style="background: #f1f1f1; font-family: Courier New;" value="Courier New" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Courier New" ){ echo ' selected'; }} ?>>Courier New</option>
				<option style="background: #f1f1f1; font-family: Lucida Console;" value="Lucida Console" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Lucida Console" ){ echo ' selected'; }} ?>>Lucida Console</option>
				<option style="background: #f1f1f1; font-family: Lucida Sans Typewriter;" value="Lucida Sans Typewriter" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Lucida Sans Typewriter" ){ echo ' selected'; }} ?>>Lucida Sans Typewriter</option>
				<option style="background: #f1f1f1; font-family: Monaco;" value="Monaco" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Monaco" ){ echo ' selected'; }} ?>>Monaco</option>
				<option style="font-family: Copperplate;" value="Copperplate" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Copperplate" ){ echo ' selected'; }} ?>>Copperplate</option>
				<option style="font-family: Papyrus;" value="Papyrus" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Papyrus" ){ echo ' selected'; }} ?>>Papyrus</option>
				<option style="background: #f1f1f1; font-family: Brush Script MT;" value="Brush Script MT" <?php for($i=0; $i <= count($multiple_fonts)-1; $i++){if( $multiple_fonts[$i] == "Brush Script MT" ){ echo ' selected'; }} ?>>Brush Script MT</option>
			</select>
		</label>
<?php
				$fontsSeraliazed = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBlBRwG98Uy3ci9ygxRDxW1CxCDD-2MOPc');
				$obj = json_decode($fontsSeraliazed);
				$items = $obj->{'items'};
?>
		<label title="" for="<?=$this->get_field_id('multiple_fonts_g'); ?>">
			Google Fonts (<?= count($items) ?>)</a>
			<br>
			<select style="height: 389px!important; width: 169px;" id="<?=$this->get_field_id('multiple_fonts_g'); ?>" name="<?=$this->get_field_name('multiple_fonts_g'); ?>[]" multiple>
<?php
				$fonom = 0;
				foreach ($items as $font){
					echo '<option value="'.$font->{'family'}.'"';
					for($i=0; $i <= count($multiple_fonts_g)-1; $i++){
						if ($multiple_fonts_g[$i] == $font->{'family'}) {echo 'selected'; };
					}
					echo ' onmouseover="WebFont.load({google: {families: [jQuery(&#39;#'.$this->get_field_id("multiple_fonts_g").' option&#39;).eq('.$fonom.').attr(&#39;value&#39;)]}});" title="'.$font->{'family'}.':<br><span style=&#39;font-size: 18px; font-family: '.$font->{'family'}.'&#39;>Grumpy wizards make toxic brew for the evil Queen and Jack.</span>">'.$font->{'family'}.'</option>';
					$fonom++;
				}
 ?>
			</select>
		</label>
	</div>
	<h3 class="help"><span class="help-2">help:</span> GUIDE & TIPS</h3>
	<div class="section_content" style="padding: 6px 0 3px;">
		<h3 id="guide" class="ui-guide-icons" style="margin-left: 5px; margin-right: 5px;" onclick="window.open('<?php echo plugins_url( 'help/s.user.guide.htm' , __FILE__ ) ?>')">
			<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Guide (opens in a new tab)
		</h3>
		<h3 id="youtube" class="ui-guide-icons" style="margin-left: 5px; margin-right: 5px;" onclick="window.open('https://www.youtube.com/c/3DWPTagCloudMSplugins')">
			<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>YouTube Tutorials (opens in a new tab)
		</h3>
		<div id="accordion-3">
			<?php include 'help/s.tips.php'; ?>
		</div>
	</div>
</div>
<div id="theother" style="line-height: 12px; font-size: 10px; text-align: center; padding: 0 0 3px 0; background: #fff; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
	Check Multiple Clouds plugin variation: <a style="text-decoration: none; color: #1e8cbe; font-weight: bold;" href="https://wordpress.org/plugins/3d-wp-tag-cloud-m/" target="_blank">3D WP Tag Cloud-M</a>
</div>
<style> body {overflow-y: scroll};</style>