<?php
/*
Plugin Name: Secure Hidden Login
Plugin URI: http://apexad.net/secure-hidden-login/
Description: Hides the normal login and allows you to login wih a key combination or special button (in the same area taken up by the admin bar)
Version: 0.9.1
Author: apexad
Author URI: http://apexad.net
License: GPL2
*/

/*  Copyright 2012  apexad  (email : alex@apexad.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_footer','securehiddenlogin_footer');
function securehiddenlogin_css() {
	wp_register_style('securehiddenlogin_cssfile', plugins_url('style.css',__FILE__ ));
	wp_enqueue_style('securehiddenlogin_cssfile');
}
function securehiddenlogin_jscript() {
	wp_register_script('securehiddenlogin_jsfile', plugins_url('script.js',__FILE__ ));
	wp_enqueue_script('jquery');
	wp_enqueue_script('securehiddenlogin_jsfile');
	$options = get_option('securehiddenlogin');
	if (!@array_key_exists('button_color',$options)) { 
		$options['button_color'] = 'green';
	}
	if (!@array_key_exists('button_colorfp',$options)) { 
		$options['button_colorfp'] = 'green';
	}
	if (ord(strtolower($options['triggerchar'])) == 0) { $options['triggerchar']='l'; /* set default value*/ }
		$register_link = '';
		if ($options['register_link'] == 'on') {
			ob_start();
			wp_register('','');
			$register_link = ob_get_contents();
			ob_end_clean();
		}
	$js_data = array(
		'site_url' => site_url(),
		'home_url' => home_url(),
		'wp_register' => ($register_link != '' ? $register_link : ''),
		'login_keys' => '['.ord(strtolower($options['triggerchar'])).']['.ord(strtoupper($options['triggerchar'])).']',
		'colorli' => $options['button_color'],
		'colorfp' => $options['button_colorfp']
);
	wp_localize_script('securehiddenlogin_jsfile','wordpress_info',$js_data);
}
add_action('wp_enqueue_scripts','securehiddenlogin_css');

//as of 0.6, moved javascript to footer
add_action('wp_footer','securehiddenlogin_jscript');

function securehiddenlogin_footer() {
	if (!is_user_logged_in()) {
		$securehiddenlogin_options = get_option('securehiddenlogin');
		echo '<div id="securehiddenlogin" class="';
		switch ($securehiddenlogin_options['display_style']) {
			default:
			case 'editsee':
				echo 'editsee">';
			break;
			case 'wordpress_icon':
				echo 'shl_wordpress_icon"><div class="icon"></div>';
			break;
			case 'the_net':
				echo 'the_net">&pi;';
			break;
			case 'login_text':
				echo 'shl_login_text">&nbsp;&nbsp;LOGIN&nbsp;&nbsp;';
			break;
			case 'hidden':
				echo 'hidden">';
		}
		/* //removed v0.6, script loading moved to footer, should no longer need this
		echo '<script type="text/javascript">'."if(typeof jQuery == 'undefined') { document.write('".'<a href="/wp-admin/" title="jQuery not enabled">x</a>'."'); }".'</script>';
		*/
		echo '</div>';
		if (array_key_exists('forgotpassword',$_GET)) {
			if ($_GET['forgotpassword'] == 'success') {
?>
<script type="text/javascript">
setTimeout(function(){
	jQuery("div.forgotpasswordsuccess").fadeOut("slow", function () {
		jQuery("div.forgotpasswordsuccess").remove();
	});
}, 4000);
</script>
<div class="forgotpasswordsuccess">
<strong>Check your e-mail for a link to reset your password.</strong>
</div>
<?php
			} //end if ($_GET['forgotpassword'] == 'success') {
		} //end if (array_key_exists('forgotpassword',$_GET))
	} //end if (!is_user_logged_in())
} //end function securehiddenlogin_footer()

/* Add Options Page */
add_action('admin_init', 'securehiddenlogin_options_init' );
add_action('admin_menu', 'securehiddenlogin_options_add_page');

// Init plugin options to white list our options
function securehiddenlogin_options_init(){
	register_setting( 'securehiddenlogin_options_options', 'securehiddenlogin', 'securehiddenlogin_options_validate' );
}

// Add menu page
function securehiddenlogin_options_add_page() {
	add_options_page('Secure Hidden Login Settings', 'Secure Hidden Login', 'manage_options', 'securehiddenlogin_options', 'securehiddenlogin_options_do_page');
}
// Draw the menu page itself
function securehiddenlogin_options_do_page() {

$display_style_values = array(
	array(
		'value' => 'editsee',
		'label' => 'Right Side Lock'
	),
	array(
		'value' => 'wordpress_icon',
		'label' => 'Left Side Wordpress Icon'
	),
	array(
		'value' => 'the_net',
		'label' => '<em>The Net pi symbol</em> (Sandra Bullock)'
	),
	array(
		'value' => 'login_text',
		'label' => 'Simple LOGIN button'
	),
	array(
		'value' => 'hidden',
		'label' => 'Hidden'
	)
);

$button_color_values = array(
	'black',
	'gray',
	'white',
	'orange',
	'red',
	'green',
	'yellow',
	'blue',
	'rosy',
	'pink'
);
	?>
	<div class="wrap">
		<style type="text/css"> #setting-error-settings_updated { width: 50% !important; }</style>
		<h2>Secure Hidden Login Settings (an <a href="http://www.editsee.com" target="_blank"><img src="<?php echo site_url().'/wp-content/plugins/secure-hidden-login/editsee.png'; ?>" alt="EditSee" /></a> plugin)</h2>
	<div style="position:absolute; top:27px; right:0;">
	<p>If you like this plugin..<br/> Please consider donating. <br/> Thank You!</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="HA6QM8DEYCN3U">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	</div>
		<form method="post" action="options.php">
			<?php settings_fields('securehiddenlogin_options_options'); ?>
			<?php $options = get_option('securehiddenlogin'); ?>
			<table class="form-table">
				<tr valign="top"><td scope="row">Display Style</td>
					<td><select name="securehiddenlogin[display_style]">
<?php foreach($display_style_values as $display_style) {
echo '<option value="'.$display_style['value'].'"';
if ($options['display_style'] == $display_style['value']) {
	echo ' selected="selected"';
}
echo '>'.$display_style['label'].'</option>';
}
?>
					</td>
				</tr>
				<tr valign="top"><td scope="row">Trigger Login Bar Letter</td>
					<?php if ($options['triggerchar'] == '') { $options['triggerchar']  = 'L'; /* default  */ } ?>
					<td>Ctrl/Alt+<input type="text" name="securehiddenlogin[triggerchar]" value="<?php echo $options['triggerchar']; ?>" size="1" maxlength="1" /> If &acute;Hidden&acute; is selected, make sure to remember this letter!</td>
				</tr>
				<tr><td scope="row">Block wp-login.php</td>
					<td><?php if (@fopen(ABSPATH.'.htaccess','r')) { ?>
					<input type="checkbox" name="securehiddenlogin[htaccessblock]" <?php if ($options['htaccessblock'] == 'on') { echo 'checked="checked"'; } ?> />
					<span style="color:red;">Warning:</span> Disable this option when uninstalling the plugin.
					<input type="hidden" name="securehiddenlogin[make-htaccess]" value="off" />
					<?php } else { 
							echo '.htaccess file not found in directory: '.ABSPATH; ?>
							<br/><input type="checkbox" name="securehiddenlogin[make-htaccess]" /> Attempt to make it.
					<?php }?></td>
				</tr>
				<tr><td scope="row">Redirect to Home page on Logout</td>
					<td><input type="checkbox" name="securehiddenlogin[homepage_on_logout]" <?php if ($options['homepage_on_logout'] == 'on') { echo 'checked="checked"'; } ?> /> </td>
				</tr>
<?php
if (get_option('users_can_register') == 1) {
?>
				<tr><td scope="row">Show 'Register' Link on login bar</td>
					<td><input type="checkbox" name="securehiddenlogin[register_link]" <?php if ($options['register_link'] == 'on') { echo 'checked="checked"'; } ?> /> </td>
				</tr>
<?php
}
else { echo '<input type="hidden" name="securehiddenlogin[register_link]" />'; }
?>
				<tr valign="top"><td scope="row">Button Color</td>
					<td>
<style type="text/css">
@import url('<?php echo site_url().'/wp-content/plugins/secure-hidden-login/style.css'; ?>');
</style>
<div id="securehiddenloginform">
<table><tr><td>Color 1(Login/Get New Password)</td><td>Color 2 (Forgot Password/Back To Login)</td></tr><tr><td>
<?php foreach($button_color_values as $button_color) {
echo '<input type="radio" name="securehiddenlogin[button_color]" id="'.$button_color.'" value="'.$button_color.'"';
if ($options['button_color'] == $button_color) {
	echo ' checked="checked"';
}
echo ' /><input type="button" class="'.$button_color.'" value="'.ucwords($button_color).'" onclick="document.getElementById(\''.$button_color.'\').checked=true" /><br/>';
}
?>
					</td><td>
<?php foreach($button_color_values as $button_color) {
echo '<input type="radio" name="securehiddenlogin[button_colorfp]" id="'.$button_color.'fp" value="'.$button_color.'"';
if ($options['button_colorfp'] == $button_color) {
	echo ' checked="checked"';
}
echo ' /><input type="button" class="'.$button_color.'" value="'.ucwords($button_color).'" onclick="document.getElementById(\''.$button_color.'fp\').checked=true" /><br/>';
}
?>
</tr></table></div></td>
				</tr>
				<tr><td colspan="2"><?php submit_button('Update Secure Hidden Login Settings','primary','submit',false); ?></td></tr>
	</table>
	</form>
	</div>

	<?php
}

function remove_htaccess() {
	//delete from main .htaccess file
	$main_htaccess = @fopen(ABSPATH.'.htaccess','r') or die("Error: Can't read your .htaccess file (make sure the file exists @ ".ABSPATH.".htaccess");

	$new_main_htaccess_contents = '';
	$remove_line = false;
	$previous_buffer = '';

    	while (($buffer = fgets($main_htaccess, 4096)) !== false) {
		if (substr($buffer,0,20) == "# BEGIN Secure Login") {
			$remove_line = true;
			$new_main_htaccess_contents .= $previous_buffer;
		}
		if ($remove_line === true) { /* do nothing */ }
		else { $new_main_htaccess_contents .= $previous_buffer; }
		if (substr($previous_buffer,0,18) == "# END Secure Login") {
			$new_main_htaccess_contents .= $buffer;
			$remove_line = false;
		}
		$previous_buffer = $buffer;
	}
	if (substr($previous_buffer,0,18) != "# END Secure Login") {
		$new_main_htaccess_contents .= $previous_buffer;
	}

	if (!feof($main_htaccess)) {
       		echo "Error: Could not read full .htaccess file (make sure the file is writable)";
	}
	fclose($main_htaccess);

	$main_htaccess = @fopen(ABSPATH.'.htaccess','w+') or die("Error: Can't read your .htaccess file (make sure the file exists)");
	fwrite($main_htaccess,trim($new_main_htaccess_contents));
	fclose($main_htaccess);

	/* legacy admin .htaccess removal */
	if (file_exists(ABSPATH.'wp-admin/.htaccess')) {
		$admin_htaccess = fopen(ABSPATH.'wp-admin/.htaccess','r') or die("Error: Can't read your wp-admin .htaccess file");
		$new_admin_htacces_contents = "";
		while (($buffer = fgets($admin_htaccess, 4096)) !== false) {
			if (substr($buffer,0,20) == "# BEGIN Secure Login") {
				$remove_line = true;
				$new_admin_htaccess_contents .= $previous_buffer;
			}

			if ($remove_line === true) { /* do nothing */ }
			else { $new_admin_htaccess_contents .= $previous_buffer; }
			if (substr($previous_buffer,0,18) == "# END Secure Login") {
				$new_admin_htaccess_contents .= $buffer;
				$remove_line = false;
			}

			$previous_buffer = $buffer;
		}
		if (substr($previous_buffer,0,18) != "# END Secure Login") {
			$new_admin_htaccess_contents .= $previous_buffer;
		}
		if (!feof($admin_htaccess)) {
			echo "Error: Could not read full wp-admin .htaccess file";
		}
		fclose($admin_htaccess);

		//now delete from wp-admin .htaccess
		$previous_buffer = '';
		$buffer = '';
		$admin_htaccess = fopen(ABSPATH.'wp-admin/.htaccess','w+') or die("Error: Can't write your wp-admin .htaccess file (make sure the file exists)");
		fwrite($admin_htaccess,trim($new_admin_htaccess_contents));
		fclose($admin_htaccess);
	}
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function securehiddenlogin_options_validate($input) {
	//added in v0.5.1, wp-login.php block disabled if no .htaccess file exists
	if (@fopen(ABSPATH.'.htaccess','r')) {
		remove_htaccess(); //first clean up the .htaaccess files
	}
	if ($input['htaccessblock'] == 'on' || $input['make-htaccess'] == 'on') {
		//write to .htaccess files if they turned that option on
		$main_domain = $domain = str_ireplace('www.', '', parse_url(home_url(), PHP_URL_HOST));
		$main_htaccess_content = <<<MAINHTACCESS

# BEGIN Secure Login
<FilesMatch "wp-login.php">
RewriteEngine On
RewriteCond %{HTTP_USER_AGENT} !^.*wp-iphone.*$
RewriteCond %{HTTP_USER_AGENT} !^.*wp-android.*$
RewriteCond %{HTTP_REFERER} !^http(s)?://(www.)?$main_domain [NC]
RewriteRule .* - [F]
</FilesMatch>
# END Secure Login
MAINHTACCESS;
		if ($input['make-htaccess'] == 'on') {
			$main_htaccess = @fopen(ABSPATH.'.htaccess','w+') or die("Error: Can't write to your .htaccess file (make sure the file is writable)");
		}
		else {
			$main_htaccess = @fopen(ABSPATH.'.htaccess','a+') or die("Error: Can't write to your .htaccess file (make sure the file is writable)");
		}
		fwrite($main_htaccess,$main_htaccess_content);
		fclose($main_htaccess);
		$input['htaccessblock'] = 'on';
	}
	return $input;
}

function securehiddenlogin_deactivation() {
	remove_htaccess();
}

register_deactivation_hook(__FILE__, 'securehiddenlogin_deactivation');

function securehiddenlogin_logoutredirect() { 
	$options = get_option('securehiddenlogin');
	if (array_key_exists('loggedout',$_REQUEST) && ($options['homepage_on_logout'] == 'on')) {
		echo '<script type="text/javascript"> location.href="'.home_url().'"; </script>';
	}
}
add_action( 'login_enqueue_scripts', 'securehiddenlogin_logoutredirect' );

//include the Secure Hidden Login Widget
include("securehiddenlogin.widget.php");
?>
