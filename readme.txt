=== Secure Hidden Login ===
Contributors: apexad
Donate link: http://apexad.net/category/wordpress-plugins/
Tags: secure, hidden, login, single click, lock, the net, sandra bullock
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide the normal login and activate with a key combination, (upper right) lock icon or (bottom right) "The Net" (Sandra Bullock) style pi symbol.

== Description == 

Secure Hidden Login allows you to have hidden a login bar (same size as the default Wordpress admin bar) on your site.

* Active it with a Lock in the upper right
* Activate it with a 'pi' symbol like "The Net" (with Sandra Bullock) in the bottom right
* Completely Hidden and only activated with Ctrl/Alt+L (the 'L' can be changed in Settings)

Why you should use this plugin:

* Great for Security
* Makes Wordpress easier and quicker (no need to go to a different page to login)
* Option to block direct wp-login.php and wp-admin login (uses .htaccess file)


== Installation ==

1. Upload the `secure-hidden-login` folder to the `/wp-content/plugins` directory 
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check Settings -> Secure Hidden Login for a few options
1. That is all!


== Frequently Asked Questions ==

= When I click the lock it just goes to the wordpress admin login page, why don't I get the login bar? =

Your active theme may have an issue loading jquery.  I'm looking into a better fix for this issue.

= Can I change the color of the 'Login' and 'Forgot Password' buttons? =

You can! There is 9 different colors to choose from (both buttons will be the same color.)
Button Colors are done via CSS, so if you know what you're doing you can get 2 different color buttons.  If there is demand for it, I'll work on this in a new version.

= Somehow I've locked myself out of my Wordpress Admin, what do I do? =

You can upload an 'Emergency' Login page: 
&lt;html&gt;
&lt;head&gt;&lt;title&gt;Emergency Login&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;&lt;a href="./wp-admin"&gt;Admin Page&lt;/a&gt;&lt;/body&gt;
&lt;/html&gt;

== Screenshots ==

No Screenshots

== Changelog ==

= 0.3 =

* Fixed an issue with a PHP Warning coming up if Settings were not yet saved.
* Updated plugin description and information
* No longer using a .htaccess file in wp-admin (removed FAQ question relating to this)
* Cleaned up error messages relating to reading/writing to main .htaccess file
* Added a 'Redirect to Home page on Logout' option to further hide normal wordpress login
* Other minor code cleaning up and bugfixes

= 0.2 =
* Fixed some issues with the addition/removal of the .htaccess wp-admin/wp-login.php block code
* You can now change the color of the buttons

= 0.1.1 =
* upon deactivation, the plugin now automatically cleans up .htaccess files
* updated FAQ's including emergency login page code
* some other minor code cleanup and bufixes
* plugin will detect if jQuery loaded correctly, and if not write a link to wp-admin on the page

= 0.1 =
* Initial release
