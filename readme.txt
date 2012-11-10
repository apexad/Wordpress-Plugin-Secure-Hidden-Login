=== Secure Hidden Login ===
Contributors: apexad
Donate link: http://apexad.net/category/wordpress-plugins/
Tags: secure, hidden, login, single click, lock, the net, sandra bullock
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 0.5.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Secure Hidden Login allows you to login wih a key combination or special button (in the same area taken up by the admin bar) instead of wp-login.php

== Description == 

Secure Hidden Login allows you to have hidden a login bar (same size as the default Wordpress admin bar) on your site.

* Active it with a Lock in the upper right
* Activate it with a 'pi' symbol like "The Net" (with Sandra Bullock) in the bottom right
* Activate by clicking on a simple 'LOGIN' button at the top of the page
* Activate by clicking the 'Wordpress' Logo in the upper left (just like on the admin bar)
* Completely Hidden and only activated with Ctrl/Alt+L (the 'L' can be changed in Settings)

Why you should use this plugin:

* Great for Security
* Makes Wordpress easier and quicker (no need to go to a different page to login)
* Option to block direct wp-login.php and wp-admin login (uses .htaccess file)


== Installation ==

1. Upload the `secure-hidden-login` folder to the `/wp-content/plugins` directory 
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check Settings -> Secure Hidden Login for a few settings
1. That is all!


== Frequently Asked Questions ==

= When I click the lock it just goes to the wordpress admin login page, why don't I get the login bar? =

Your active theme may have an issue loading jquery.  I'm looking into a better fix for this issue.

= Somehow I've locked myself out of my Wordpress Admin, what do I do? =

You can upload an 'Emergency' Login page: 
&lt;html&gt;
&lt;head&gt;&lt;title&gt;Emergency Login&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;&lt;a href="./wp-admin"&gt;Admin Page&lt;/a&gt;&lt;/body&gt;
&lt;/html&gt;

= Why does the 'Forgot Password' button does not work after blocking wp-login.php? =

Actually, it does work in Firefox and Chrome. Internet Explorer seems to be the only browser affefected by this issue. You can use the Emergency Login Page Code above.


== Screenshots ==

No Screenshots

== Changelog ==

= 0.5.1 =

* Now checks for a valid .htaccess file or does not allow wp-login.php block

= 0.5 =

* Added Simple LOGIN button Display Style
* Added Left Side Wordpress Icon Display Style
* Added a new color!  Yellow!
* Login Button Color and Forgot Password Color can now be set independently
* Lock Icon no longer stays on login bar after getting clicked
* Header on Settings page changed from Options to Settings
* Updated Frequently Asked Questions again (removed color question, added IE bug info)
* Skipped 0.4

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
