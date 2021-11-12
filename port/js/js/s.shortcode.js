// 3D WP Tag Cloud-S: Shortcode Info Function
jQuery(function(){
	var inactive_html = jQuery('#wp_inactive_widgets').html();
	var cookie = document.cookie.search('wptagcanvaswidget'+shortcode.shortcode_id);
	if(inactive_html.search('wptagcanvaswidget-'+shortcode.shortcode_id)!=-1){
		if(cookie == -1){
			jQuery('#wpbody-content div.wrap h1').after('<div class="updated"><p style="font-size: 14px;"><b>'+shortcode.plugin_name+'</b>: Click on following Shortcode, then copy and paste it in a page or in a post where you want your cloud to appear: <input value="[tc-s id=&#34;'+shortcode.shortcode_id+'&#34;]" style="line-height: 12px; border-radius: 4px; padding: 0; width: 90px; text-align: center;" onclick="select()"  title="Click, copy & paste where you want me to appear."></p></div>')
			document.cookie = "wptagcanvaswidget"+shortcode.shortcode_id+"=1";
		}
	}
	else {document.cookie = 'wptagcanvaswidget'+shortcode.shortcode_id+'=; expires=Thu, 01 Jan 1970 00:00:00 UTC';}
});