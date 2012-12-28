=== Secure Hidden Login ===
Contributors: apexad
Donate link: http://apexad.net/category/wordpress-plugins/
Tags: secure, hidden, login, single click, lock, the net, sandra bullock
Requires at least: 3.3.2
Tested up to: 3.5
Stable tag: 0.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Secure Hidden Login hides the normal login and allows you to login wih a key combination or special button (in the same area taken up by the admin bar)

== Description == 

Secure Hidden Login allows you to have hidden a login bar (same size as the default Wordpress admin bar) on your site.

* Active it with a Lock in the upper right
* Activate it with a 'pi' symbol like "The Net" (with Sandra Bullock) in the bottom right
* Activate by clicking on a simple 'LOGIN' button at the top of the page
* Activate by clicking the 'Wordpress' Logo in the upper left (just like on the admin bar)
* Completely Hidden and only activated with Ctrl/Alt+L (the 'L' can be changed in Settings)
* NEW: Activate with a simple link n a widget that can be placed anywhere

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

= Somehow I've locked myself out of my Wordpress Admin, what do I do? =

You can upload an 'Emergency' Login page: 
&lt;html&gt;
&lt;head&gt;&lt;title&gt;Emergency Login&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;&lt;a href="./wp-admin"&gt;Admin Page&lt;/a&gt;&lt;/body&gt;
&lt;/html&gt;

== Screenshots ==

1. A Screenshot of the different ways to activate the Login bar
2. A Screenshot of the Settings screen

== Changelog ==

= 0.8 =

* Re-branded as part of the 'EditSee' plugin suite
* Forgot Password integrated (no longer goes to the Forgot Password page with a valid entry)
* Forgot Password success message is displayed with new CSS
* Fixed 'Dashboard' button in iPhone/Android Wordpress Apps not working (when block wp-login.php is on)
* Fixed missing '&lt;/div&gt;' introduced in 0.6 when I removed jQuery check
* Added specific css for labels inside of the text box
* Settings Page: Moved donation button to the top of Settings, please consider donating!
* Settings Page: Changed 'Display Style' to a Select Box/Dropdown
* Settings Page: Moved 'Button Color' options to the bottom (all other options moved up)
* Settings Page: Renamed 'Save Changes' button to 'Update Secure Hidden Login Settings'
* Settings Page: Corrected some wording

= 0.7 =

* Added a Widget so a 'Login' Link can be placed anywhere (Title and Link Text can be customized)

= 0.6 =

* Changed minimum required version to Wordpress 3.3.2 (Tested and Working)
* Fixed some minor display issues caused by some themes (CSS resets)
* Option to 'Attempt to create' missing .htaccess file
* Moved Script Loading to Footer, (fixes jQuery load issues, removed FAQ question)
* Tested in Wordpress 3.5, No issues

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
