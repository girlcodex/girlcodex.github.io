// 3D WP Tag Cloud-S: Center Functions
// For creating your Center Function you have to be familiar with HTML tag <canvas>
// Detailed tutorial: http://diveintohtml5.info/canvas.html
//
// Each function below is passed in following parameters in order: 
// c = canvas 2D context; 
// w = canvas width; 
// h = canvas height; 
// cx = center X; 
// cy = center Y.
//

function image_cf<?= $inst_id; ?>(c, w, h, cx, cy){
	c.setTransform(1, 0, 0, 1, 0, 0);
	c.globalAlpha = <?= $cf_opacity; ?>;
	var step = <?= $img_reduction; ?>; // Image reduction
	var f = 0.5 + step;
	var cfimg = new Image();
	var cf_image_loc = '<?= $cf_image_loc; ?>';
	if(cf_image_loc !== ''){ cfimg.src = cf_image_loc;  // Image location;
		c.drawImage(cfimg, cx-(w/h<=1?w*f/2:h*f/2), cy-(w/h<=1?w*f/2:h*f/2), f*(w/h<=1?w:h), f*(w/h<=1?w:h));
	}
}

function text_cf<?= $inst_id; ?>(c, w, h, cx, cy){
	var d = <?= $cf_rotation; ?>*((new Date).getTime()%10000)*Math.PI/2500; // Direction of rotation
	c.setTransform(1, 0, 0, 1, 0, 0);
	c.translate(cx, cy);
	c.globalAlpha = <?= $cf_opacity; ?>;
	var f = <?= $text_zoom; ?>; // Text block zooming
	var land = 1; // Landscape coefficient
	var port = 1; // Portrait coefficient
	var text_cont = '<?= $text_cont; ?>';
	if(text_cont=='landscape'){land = 1.5;}
	else{ if(text_cont=='portrait'){port=1.5;}
	}
	var border_cf = '<?= $border_cf; ?>'; // Border color
	var cont_border = <?= $cont_border; ?>;
	var bg_colour_cf = '<?= $bg_colour_cf; ?>'; // Background color
	var rx = -(w/h<=1?w:h)*land*f/8;
	var rw = (w/h<=1?w:h)*land*f/4;
	var ry = -(w/h<=1?w:h)*port*f/8;
	var rh = (w/h<=1?w:h)*port*f/4;
	c.rotate(d);
	if(bg_colour_cf==''){c.fillStyle='transparent';}
	else{c.fillStyle = '#<?= $bg_colour_cf; ?>';};
	c.fillRect(rx, ry, rw, rh);
	c.strokeStyle = '#<?= $border_cf; ?>';
	c.lineWidth = <?= $cont_border; ?>; // Border width in pixels
	if(border_cf!='' && cont_border!=0){c.strokeRect(rx, ry, rw, rh);}
	c.fillStyle = '#<?= $text_color_cf; ?>'; // Text color
	var tsize = <?= $font_h; ?>; // Font size in pixels
	c.textAlign = 'center';
	c.textBaseline = 'bottom';
	c.font = '<?= $font_w; ?>' + ' ' + tsize + 'px ' + '<?= $font_cf; ?>'; // Font weight & font family
	c.fillText("<?= $text_line_1; ?>", 0, -1.5*tsize*port, rw-10); // Text
	c.fillText("<?= $text_line_2; ?>", 0, -0.5*tsize*port, rw-10); // Text
	c.textBaseline = 'middle';
	c.fillText("<?= $text_line_3; ?>", 0, 0, rw-10); // Text; 
	c.textBaseline = 'top';
	c.fillText("<?= $text_line_4; ?>", 0, 0.5*tsize*port, rw-10); // Text 
	c.fillText("<?= $text_line_5; ?>", 0, 1.5*tsize*port, rw-10); // Text
}
