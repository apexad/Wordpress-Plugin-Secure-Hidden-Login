function show_loginbar() {
	jQuery('#securehiddenlogin').css({"display":"block"});
	jQuery('#securehiddenlogin').css({"width":"100%"});
	jQuery('#securehiddenlogin').css({"height":"28px"});
	jQuery('#securehiddenlogin').css({"top":"0"});
	jQuery('#securehiddenlogin').css({"right":"0"});
	jQuery('#securehiddenlogin').css({"background-color":"#464646"});
	jQuery('#securehiddenlogin').css({"background-image":"none"});
	jQuery('#securehiddenlogin').css({"text-align":"center"});
	jQuery('#securehiddenlogin').css({"color":"#ccc"});
	jQuery('#securehiddenlogin').html('<form name="loginform" id="securehiddenloginform" action="'+wordpress_info.site_url+'/wp-login.php" method="post"><input type="text" name="log" id="user_login" size="25" /><label for="user_login" class="securehiddenloginform_label">Username</label><input type="password" name="pwd" id="user_pass" size="25" /><label for="user_pass" class="securehiddenloginform_label">Password</label><input type="hidden" name="redirect_to" value="'+wordpress_info.home_url+'" /><input type="submit" class="'+wordpress_info.colorli+'" name="wp-submit" id="wp-submit" value="Log In" /><input type="button" class="'+wordpress_info.colorfp+'" value="Forgot Password" onclick=window.location.href="'+wordpress_info.site_url+'/wp-login.php?action=lostpassword" /></form>');
		jQuery('#securehiddenlogin').off('click');
		jQuery('.securehiddenloginform_label').css("margin-left","-100px");
		jQuery('.securehiddenloginform_label').css("margin-right","20px");
		jQuery('#user_login').focus();
}
jQuery(function() {
	jQuery('#securehiddenlogin').click( function() {
		show_loginbar();
	});
});

jQuery(document).keydown(function(e) {
	var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
	key = "["+key+"]";
	slkey = wordpress_info.login_keys;
	slauxkey = e.altKey || e.ctrlKey;
	slkey.indexOf(key) != -1 ? keye = true : keye = false;
	if (keye && slauxkey) {
		show_loginbar();
		return false;
	};
});
