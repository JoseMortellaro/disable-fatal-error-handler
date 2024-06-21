=== Disable Fatal Error Handler ===
Contributors: giuse
Donate link: buymeacoffee.com/josem
Tags: disable fatal error handler
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 0.0.4
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Your website will not send any email in case of fatal errors.



== Description ==

Activating Disable Fatal Error Handler your website will not send any email in case of fatal errors.

When you work on a website and you don't want the administrators receive an email every time the website triggers a fatal error, just activate this plugin.

Disable Fatal Error Handler adds a constant in wp-config.php. You would not need this plugin if you remembered that constant and you have access via FTP.

In my case I prefer remembering "Disable Fatal Error Handler", search it in the plugins page, install and activate it, and that's it.





== Installation ==

1. Upload the entire `disable-fatal-error-handler` folder to the `/wp-content/plugins/` directory or install it using the usual installation button in the Plugins administration page.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. After successful activation you will be automatically redirected to the plugin global settings page.
4. All done. Good job!




== Changelog ==

= 0.0.4 =
* Checked: WordPress 6.4

= 0.0.3 =
* Fix: fatal error with PHP 8.1 when not able to write in wp-config.php

= 0.0.2 =
* Fix: replaced filter with constant in wp-config.php

= 0.0.1 =
* First release
