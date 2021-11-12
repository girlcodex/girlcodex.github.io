// 3D WP Tag Cloud-S: JS Functions
					
jQuery(function(){    
//----- Changing Canvas sizes for mobile devices & computers -----
			var mocasi;
			function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; 
			css_browser_selector(navigator.userAgent);
			if(c.search('mobile')!=-1){
				mocasi = document.body.clientWidth*(parseInt(jQuery('#tag_canvas_<?= $inst_id; ?>').parent().parent().css('width'),10)/document.body.clientWidth);
				jQuery('#tag_canvas_<?= $inst_id; ?>').attr({'width':mocasi,'height':mocasi});
				jQuery('#canvas_wrap_<?= $inst_id; ?>').css({'width':mocasi,'height':mocasi});
			}
			else{
				var wwidth = <?= $width; ?>;	
				var wheight = <?= $height; ?>;	
				if(wwidth == 1922){
					wwidth = window.innerWidth; 
					var leftcor = jQuery('#tag_canvas_<?= $inst_id; ?>').offset().left; 
					jQuery('#tag_canvas_<?= $inst_id; ?>').css('left',-leftcor);
				};
				if(wheight == 1922){wheight = window.innerHeight};				
				jQuery('#tag_canvas_<?= $inst_id; ?>').attr({'width':wwidth,'height':wheight});
				jQuery('#canvas_wrap_<?= $inst_id; ?>').css({'width':wwidth,'height':wheight});
			};
//----- Filling up tag container in case of Page/Post Links content -----
		var pplinks = '<?= $taxonomy; ?>';
		var conid = '<?= $conid; ?>';
		if(pplinks == 'pp_links'){
			if(conid == ''){conid='#post-<?php the_ID(); ?>';}
			else{conid='#'+conid;}
			jQuery(conid).find('a').each(function() {
				var link = jQuery(this).clone();
				jQuery('#uni_tags_container_<?= $inst_id; ?>').append(link);
			});
		}
//----- Preparing variables for various purposes -----
		var shapes = <?= json_encode($shape); ?>;
		var magics = <?= json_encode($magic); ?>;
		var container = ['uni_tags_container_<?= $inst_id; ?>'];
		var content = ['<?= $taxonomy; ?>'];
		var cf_name = '<?= $cf_name; ?>';
		if(cf_name !== ''){
			var zoom = false; 
			if(cf_name!='my_cf'){
				cf_name+= <?= $inst_id; ?>;
			}
		}
		else {var zoom = <?= $wheel_zoom; ?>};
		var mf_array_1 = <?= json_encode($multiple_fonts); ?>;
		var mf_array_2 = <?= json_encode($multiple_fonts_g); ?>;
		if (mf_array_1 && mf_array_2) {var mf_array = mf_array_1.concat(mf_array_2)}
		else {if(mf_array_1){var mf_array = mf_array_1;}
			else {if(mf_array_2){var mf_array = mf_array_2;}
				else {var mf_array = new Array("Arial");}
				}
			}
		var target = '<?= $target; ?>'; 
		var multiple_colors = '<?= $multiple_colors; ?>';
		multiple_colors = multiple_colors.replace(/ /gi, '');
		var mc_array = multiple_colors.split(',');
		var multiple_bg = '<?= $multiple_bg; ?>';
		multiple_bg = multiple_bg.replace(/ /gi, '');
		var mb_array = multiple_bg.split(',');
		var numberop = <?= $numberop; ?>;
		var numberot = <?= $numberot; ?>;
		for (var i = 0; i < container.length; i++) {
		var taxonomy = content[i];
//----- Adding number of posts after category links or number of posts after post tag links -----
			if((taxonomy=="category"&&numberop==true)||(taxonomy=="post_tag"&&numberot==true)){
				var taglinks = jQuery('#'+container[i]+' a');
				for (var j = 0; j < taglinks.length; j++) { 
				var spacepos1 = jQuery('#'+container[i]+' a').eq(j).attr('aria-label').indexOf('(');
				var spacepos2 = jQuery('#'+container[i]+' a').eq(j).attr('aria-label').indexOf(' item');
				var appstr = jQuery('#'+container[i]+' a').eq(j).attr('aria-label').substr(spacepos1+1,spacepos2-spacepos1-1);
				jQuery('#'+container[i]+' a').eq(j).append('('+appstr+')');
				}							
			}	
//----- Cutting excess of selected fonts if their number is bigger than number of tags
			var any_type_tags = jQuery('#'+container[i]+' a');
			if(any_type_tags.length < mf_array.length){mf_array = mf_array.slice(0,any_type_tags.length);}
//----- Weighting Links and Recent Posts according to their order of appearance and Authors according to the number of their publications -----
			if(taxonomy=="links"||taxonomy=="authors"||taxonomy=="recent_posts"){
				var fsize;
				for (var j = 0; j < any_type_tags.length; j++) { 
					if(taxonomy=="links"||taxonomy=="recent_posts"){
						var bigest = <?= $weight_size; ?>*any_type_tags.length;
						var increment = (bigest-5)/any_type_tags.length;
						fsize = Math.round(bigest-increment*(j));
						}
					else{ 
						var text_a = jQuery('#'+container[i]+' a').eq(j).text();
						fsize = parseInt(jQuery('#'+container[i]+' a').eq(j).text().substring(text_a.indexOf('(')+1,text_a.length-1))+0.000001;
						};
					jQuery('#'+container[i]+' a').eq(j).css({'font-size':fsize+'px'});
				}
			}
//----- Weighting Archives according to the number of publications in them -----
			if(taxonomy=="archives"){
			var link_span = jQuery('#'+container[i]+' span');
			for (var j = 0; j < link_span.length; j++) { 
				var text_s = jQuery('#'+container[i]+' span').eq(j).text();
				var text_a = jQuery('#'+container[i]+' span a').eq(j).text();
				var weight_value = text_s.substring(text_a.length+2,text_s.length-1);
				jQuery('#'+container[i]+' span a').eq(j).text(text_s);
				jQuery('#'+container[i]+' span a').eq(j).css({'font-size':weight_value+'px'});
			}
			var clear_links = jQuery('#'+container[i]+' span a').detach();
			jQuery('#'+container[i]+' span').remove();
			jQuery(clear_links).appendTo('#'+container[i]);
			}
//-----  Unwraping Menu links, assigning them the parent's class (the one given in Menu page) and adding image size attributes for Menu content -----
			if(taxonomy=="menu"){
				var menu_links = jQuery('#'+container[i]+' a');
				for (var j = 0; j < menu_links.length; j++){
					var string_class = jQuery('#'+container[i]+' a').eq(j).parent().attr('class');
					var istring_class = string_class.substr(0, string_class.indexOf(' '));
					jQuery('#'+container[i]+' a').eq(j).addClass(istring_class);
					jQuery('#'+container[i]+' a').eq(j).unwrap();
				}
				var menu_links = jQuery('#'+container[i]+' ul');
				for (var j = 0; j < menu_links.length; j++){
					jQuery('#'+container[i]+' ul a').siblings().unwrap();
				}
				var link_img = jQuery('#'+container[i]+' a img');
				for (var j = 0; j < link_img.length; j++) { 
					jQuery('#'+container[i]+' div ul li a img').eq(j).attr({"width":"96","height":"96"});
				}							
			}
			
//----- Distributing multiple fonts randomly -----
			if(mf_array[0]!=''){
				for (var j = 0; j < any_type_tags.length; j++) { 
					jQuery('#'+container[i]+' a').eq(j).css({'font-family':mf_array[Math.floor(Math.random()*mf_array.length)]});
				}
			}

//----- Distributing multiple colors randomly -----
			if(multiple_colors!=''){
				for (var j = 0; j < mc_array.length; j++) {
					mc_array[j] = '#'+ mc_array[j];
				}
				for (var j = 0; j < any_type_tags.length; j++) { 
					jQuery('#'+container[i]+' a').eq(j).css({'color':mc_array[Math.floor(Math.random()*mc_array.length)]});
				}
			}

//----- Distributing multiple backgrounds randomly -----
			if(multiple_bg!=''){
				for (var j = 0; j < mb_array.length; j++) {
					mb_array[j] = '#'+ mb_array[j];
				}
				for (var j = 0; j < any_type_tags.length; j++) { 
					jQuery('#'+container[i]+' a').eq(j).css({'background-color':mb_array[Math.floor(Math.random()*mb_array.length)]});
				}
			}
		
//-----  Setting  target attribute of tag links -----
			if(taxonomy=="category"||taxonomy=="post_tag"||taxonomy=="archives"||taxonomy=="menu"||taxonomy=="pp_links"){
				var taglinks = jQuery('#'+container[i]+' a');
				for (var j = 0; j < taglinks.length; j++) { 
					jQuery('#'+container[i]+' a').eq(j).attr("target", target);
				}							
			}
		}

//----- Variables for Single tag cloud and starting it -----
			var bg_img_url = '<?= $bg_img_url; ?>';
			  
			var rev_s = 0;
			var rev_m = 0;				
			var bg_color = '<?= $bg_color; ?>';
			if((bg_color!='')&&(bg_color!='null')&&(bg_color!='tag')){bg_color = '#'+bg_color;};
			if((bg_color=='')||(bg_color=='null')) {bg_color = null;}
			else {TagCanvas.bgColour = bg_color;};
			var bg_outline = '<?= $bg_outline; ?>';
			if((bg_outline!='')&&(bg_outline!='null')&&(bg_outline!='tag')){bg_outline = '#'+bg_outline;};
			if((bg_outline=='')||(bg_outline=='null')) {bg_outline = null;} 
			else {TagCanvas.bgOutline = bg_outline;};
			var click_to_front = <?= $click_to_front ?>;
			var shape = '<?= $shape[0]; ?>';
			var magic = '<?= $magic[0]; ?>';
			if(magic==""){magic = 0;};
			if(shapes == null){var shapes = ['cube']; shape = 'cube';};
			if(magics == null){var magics = ['0']; magic = 0;};
			var my_shape_url = '<?= $my_shape_url; ?>';
			if(shapes[0] == 'my_shape'&&my_shape_url == ''){shape = 'cube';};
			var time = <?= $time; ?>; 
			if(shapes[1]){ revolve_s(time);};
			if(magics[1]){ revolve_m(time);}
			var text_color = '#<?= $text_color; ?>';
			if(text_color=='#') {text_color = null;};
			var weight_gradient_1 = '<?= $weight_gradient_1; ?>';
			var weight_gradient_2 = '<?= $weight_gradient_2; ?>';
			var weight_gradient_3 = '<?= $weight_gradient_3; ?>';
			var weight_gradient_4 = '<?= $weight_gradient_4; ?>';
			if((weight_gradient_1 == '')||(weight_gradient_2 == '')||(weight_gradient_3 == '')||(weight_gradient_4 == '')){}
			else {var weight_gradient = {0:'#<?= $weight_gradient_1; ?>', 0.33:'#<?= $weight_gradient_2; ?>', 0.67:'#<?= $weight_gradient_3; ?>', 1:'#<?= $weight_gradient_4; ?>'};
			}
		
			var single_cloud_options ={
				activeCursor: '<?= $active_cursor; ?>',
				animTiming: '<?= $animation_timing; ?>',
				bgColour: bg_color,
				bgOutline: bg_outline,
				bgOutlineThickness: <?= $bg_outline_thickness; ?>,
				bgRadius: <?= $bg_radius; ?>,
				centreFunc: window[cf_name],
				clickToFront: <?= $click_to_front; ?>,
				decel: <?= $deceleration; ?>,
				depth: <?= $depth; ?>,
				dragControl: <?= $drag_ctrl; ?>,
				dragThreshold: <?= $drag_threshold; ?>,
				fadeIn: <?= $fadein; ?>,
				freezeActive: <?= $freeze_active; ?>,
				freezeDecel: <?= $freeze_decel; ?>,
				frontSelect: <?= $front_select; ?>,
				hideTags: <?= $hide_tags; ?>,
				imageAlign: '<?= $image_align; ?>',
				imageMode: '<?= $image_mode; ?>',
				imagePadding: <?= $image_padding; ?>,
				imagePosition: '<?= $image_position; ?>',
				imageRadius: <?= $image_radius; ?>,
				imageScale: <?= $image_scale; ?>,
				imageVAlign: '<?= $image_valign; ?>',
				interval: <?= $interval; ?>,
				maxBrightness: <?= $max_brightness; ?>,
				maxSpeed: <?= $max_speed; ?>,
				minBrightness: <?= $min_brightness; ?>,
				minSpeed: <?= $min_speed; ?>,
				minTags: <?= $min_tags; ?>,
				noMouse: <?= $no_mouse; ?>,
				noSelect: <?= $no_select; ?>,
				noTagsMessage: <?= $no_tags_msg; ?>,
				offsetX: <?= $offset_x; ?>,
				offsetY: <?= $offset_y; ?>,
				outlineColour: '#<?= $outline_color; ?>',
				outlineDash: <?= $outline_dash; ?>,
				outlineDashSpace: <?= $outline_dash_space; ?>,
				outlineDashSpeed: <?= $outline_dash_speed; ?>,
				outlineIncrease: <?= $outline_increase; ?>,
				outlineMethod: '<?= $outline_method; ?>',
				outlineOffset: <?= $outline_offset; ?>,
				outlineRadius: <?= $outline_radius; ?>,
				outlineThickness: <?= $outline_thickness; ?>,
				padding: <?= $padding; ?>,
				pinchZoom: <?= $pinch_zoom; ?>,
				pulsateTime: <?= $pulsate_time; ?>,
				pulsateTo: <?= $pulsate_to; ?>,
				radiusX: <?= $radius_x; ?>,
				radiusY: <?= $radius_y; ?>,
				radiusZ: <?= $radius_z; ?>,
				repeatTags: <?= $repeat_tags; ?>,
				reverse: <?= $reverse; ?>,
				shadow: '#<?= $shadow; ?>',
				scrollPause: <?= $scroll_pause; ?>,
				shadowBlur: <?= $shadow_blur; ?>,
				shadowOffset: [<?= $shadow_offset_x ?>,<?= $shadow_offset_y ?>],
				shuffleTags: <?= $shuffle_tags; ?>,
				splitWidth: <?= $split_width; ?>,
				stretchX: <?= $stretch_x; ?>,
				stretchY: <?= $stretch_y; ?>,
				textAlign: '<?= $text_align; ?>',
				textColour: text_color,
				textFont: '',
				textHeight: <?= $text_height; ?>,
				textVAlign: '<?= $text_valign; ?>',
				tooltip: '<?= $tooltip; ?>',
				tooltipClass: '<?= $tooltip_class; ?>',
				tooltipDelay: <?= $tooltip_delay; ?>,
				txtOpt: <?= $text_optimisation; ?>,
				txtScale: <?= $text_scale; ?>,
				weight: <?= $weight; ?>,
				weightFrom: '<?= $weight_from; ?>',
				weightGradient: weight_gradient,
				weightMode: '<?= $weight_mode; ?>',
				weightSize: <?= $weight_size; ?>,
				weightSizeMax: <?= $weight_size_max; ?>,
				weightSizeMin: <?= $weight_size_min; ?>,
				wheelZoom: zoom,
				zoom: <?= $zoom; ?>,
				zoomMax: <?= $zoom_max; ?>,
				zoomMin: <?= $zoom_min; ?>,
				zoomStep: <?= $zoom_step; ?>
			}
			if(bg_img_url != '') {jQuery('#tag_canvas_<?= $inst_id; ?>').css({'background': 'url("'+bg_img_url+'") no-repeat center', 'background-size': 'cover'}).hide().fadeIn(1000);}; 
			if(!shapes[1]){
				TagCanvas.initial = [<?= $initial_x ?>,<?= $initial_y ?>, <?= $initial_z ?>];
				var lockit = '<?= $lock; ?>';
				if(lockit!='none') {TagCanvas.lock = lockit}
				else {TagCanvas.lock = null;};
				TagCanvas.shape = shape;
				TagCanvas.magic = parseInt(magic);
				TagCanvas.Start('tag_canvas_<?=$inst_id; ?>','uni_tags_container_<?= $inst_id; ?>', single_cloud_options);
			}
			else{var rpts=setInterval(function () {revolve_s(time)}, time);}
			if(magics[1]){var rptm=setInterval(function () {revolve_m(time)}, time);}
//----- Freezing animation till loading next page -----
		jQuery('#uni_tags_container_<?= $inst_id; ?> a').click(function(){
			TagCanvas.Pause('tag_canvas_<?=$inst_id; ?>');
		});	
//----- Revolving tags distribution on the cloud -----
		function revolve_m(time){
			TagCanvas.initial = [<?= $initial_x ?>,<?= $initial_y ?>, <?= $initial_z ?>];
			TagCanvas.lock = '<?= $lock; ?>';
			TagCanvas.magic = parseInt(magics[rev_m]);
			TagCanvas.fadeIn = 0;
			jQuery('#canvas_wrap_<?= $inst_id; ?>').fadeOut(250,function() {
				setTimeout(TagCanvas.Start('tag_canvas_<?= $inst_id; ?>','uni_tags_container_<?= $inst_id; ?>', single_cloud_options),0);
				jQuery('#canvas_wrap_<?= $inst_id; ?>').fadeIn(500);
			});
			rev_m++;
			if(rev_m==magics.length){rev_m=0;}
		}
//----- Revolving shapes in the cloud -----
		function revolve_s(time){
			var locks = { 
				a: 'y', apple: 'y', balloon: 'y', dancers: 'y', earing: 'y', egg: 'y', excavator: 'z', fir: 'y', fish: 'y', fish2: 'y', glass: 'y', pear: 'y', hcones: 'x', hcylinder: 'x', 
				hdna: 'x', hring: 'x', m: 'y', n: 'y', o: 'y', owl: 'y', roller: 'x', spiral: 'z', spiral3: 'y', stairs: 'y', teardrop: 'y',	tower: 'y', v: 'y', vcones: 'y', 
				vcylinder: 'y', vdna: 'y',	vring: 'y', wings: 'y', w: 'y', x: 'y', y: 'y', yinyang: 'y', zs: 'y', antenna: 1, apple2: 2, axes: 3, beam: 4, balls: 5, blackhole: 6, 
				bulb: 7, blossom: 8, bowtie: 1, butterfly: 2, candy: 3, capsule: 4, circles: 5, crown: 6, cube: 7, diaminity: 8, diamond: 1, domes: 2, eggbox: 3, globe: 4, heart: 5, 
				love: 6, hexagon: 7, infinity1: 8, infinity2: 1, insect: 2, knot: 3, lemon: 4, lissajous: 5, mobius: 6, monster: 7, pillow: 8, pyramid: 1, rim: 2, 
				roundabout: 3, sandglass: 4, square: 5, sphere: 6, star: 7, star2: 8, stool: 1, tire: 2, triangle: 3, rings: 4, domes: 5, saturn: 6, starwars1: 7, starwars2: 8, 
				starwars3: 1, starwars4: 2, torus: 3, ufo: 4, wall_e: 5, walnut: 6, my_shape: 7
			};
			var lock = locks[shapes[rev_s]] || '';
			TagCanvas.initial = (lock=='x'&&[0,-0.15,0])||(lock=='y'&& [0.15,0,0])||(lock=='z'&&[0,0,-0.15])||(lock==1&&[0.15,0.15,0.15])||(lock==2&&[0.15,0.15,-0.15])||(lock==3&&[0.15,-0.15,0.15])||(lock==4&&[-0.15,0.15,0.15])||(lock==5&&[-0.15,-0.15,0.15])||(lock==6&&[-0.15,0.15,-0.15])||(lock==7&&[0.15,-0.15,-0.15])||(lock==8&&[-0.15,-0.15,-0.15]);
			TagCanvas.shape = shapes[rev_s];
			TagCanvas.lock = lock;
			TagCanvas.fadeIn = 0;
			jQuery('#canvas_wrap_<?= $inst_id; ?>').fadeOut(250,function() {
				setTimeout(TagCanvas.Start('tag_canvas_<?= $inst_id; ?>','uni_tags_container_<?= $inst_id; ?>', single_cloud_options),0);
				jQuery('#canvas_wrap_<?= $inst_id; ?>').fadeIn(500);
			});
			rev_s++;
			if(rev_s==shapes.length){rev_s=0;}
		}
//----- Attempt to fix Google Chrome issue with Google Fonts -----
		jQuery.fn.redraw = function() {
			return this.hide(0, function(){jQuery(this).show()});
		};
		jQuery('body').redraw();
});