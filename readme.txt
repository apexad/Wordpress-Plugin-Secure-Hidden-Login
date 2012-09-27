=== Secure Hidden Login ===
Contributors: apexad
Donate link: http://apexad.net
Tags: login, hidden, single click
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin hides the normal login and places a single click lock in the right hand corner or a "The Net" (With Sandra Bullock) style pi symbol in the bottom right.
Alternatively, there can also be nothing to click, and a key combination of Crtl/Alt+L (by default) can be used to bring up the login bar.

The login bar brought up by the plugin takes up the same space as the normal wordpress Admin Bar.

== Description == 

Secure Hidden Login allows you to have hidden login on your site.
* Active with a Lock in the upper right
* Activate with a 'pi' symbol like The Net with Sandra Bullock
* Activate with Ctrl/Alt+(a key like 'L')

* Good for Security
* Makes Wordpress easier to use
* Option to disable direct wp-login.php and wp-admin login (uses .htaccess)


== Installation ==

1. Upload the `securehiddenlogin` folder to the `/wp-content/plugins` directory 
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check Settings -> Secure Hidden Login for a few options
1. That is all!


== Frequently Asked Questions ==

= I'm getting cannot write/read to .htaccess errors =

If enabling the option to lokck out wp-login.php and wp-admin you will need to make sure the plugin can write to your .htaccess file.  You can change permissions on the file temporarily to do this if needed.

= Can I change the color of the 'Login' and 'Forgot Password' buttons? =

Not yet, this will come in a new version soon.


== Screenshots ==

No Screenshots


== Changelog ==

= 0.1 =
* Initial release
