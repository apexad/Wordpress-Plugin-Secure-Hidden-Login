=== Secure Hidden Login ===
Contributors: apexad
Donate link: http://apexad.net/category/wordpress-plugins/
Tags: secure, hidden, login, single click, lock, the net, sandra bullock
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide the normal login and use a lock icon in the upper right or a "The Net" style pi symbol in the bottom right.

== Description == 

Secure Hidden Login allows you to have hidden a login bar (same size as the default Wordpress admin bar) on your site.

* Active with a Lock in the upper right
* Activate with a 'pi' symbol like "The Net" (with Sandra Bullock) in the bottom right
* (In addition to either of the other options) Activate with Ctrl/Alt+L (the 'L' can be changed in Settings)

* Good for Security
* Makes Wordpress easier and quicker to use
* Option to block direct wp-login.php and wp-admin login (uses .htaccess file)


== Installation ==

1. Upload the `secure-hidden-login` folder to the `/wp-content/plugins` directory 
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check Settings -> Secure Hidden Login for a few options
1. That is all!


== Frequently Asked Questions ==

= I'm getting cannot write/read to .htaccess errors =

If enabling/disabling the option to "Block wp-admin and wp-login.php you will need to make sure the plugin can write to your .htaccess file (in both the wordpress root directory and the wp-admin directory).  You can change permissions on the file temporarily to do this if needed.

= When I click the lock it just goes to the wordpress admin login page, why don't I get the login bar? =

Your active theme may have an issue loading jquery.  I'm looking into a better fix for this issue.

= Can I change the color of the 'Login' and 'Forgot Password' buttons? =

You can directly edit the style.css file, but there will be options for this in a new version soon.

== Screenshots ==

No Screenshots

== Changelog ==

= 0.1.1 =
* upon deactivation, the plugin now automatically cleans up .htaccess files
* updated FAQ's including emergency login page code
* some other minor code cleanup and bufixes
* plugin will detect if jQuery loaded correctly, and if not write a link to wp-admin on the page

= 0.1 =
* Initial release
