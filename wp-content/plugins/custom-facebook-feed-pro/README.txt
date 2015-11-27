=== Custom Facebook Feed PRO ===
Author: Smash Balloon
Support Website: http://smashballoon/custom-facebook-feed/
Requires at least: 3.0
Tested up to: 3.5.1
Version: 1.1.1
License: Non-distributable, Not for resale

The Custom Facebook Feed allows you to display a customizable Facebook feed of any public Facebook page on your website.

== Description ==

Display a **customizable**, **responsive** and **search engine crawlable** version of your Facebook feed on your WordPress site.

Other Facebook plugins use iframes to show your feed which don't allow you to customize how they look, aren't responsive and are not crawlable by search engines. The Custom Facebook Feed inherits your theme's style to display a feed which is responsive, crawlable and seamlessly matches the look and feel of your site.

* **Completely Customizable** - by default inherits your theme's styles
* **Feed content is crawlable by search engines adding SEO value to your site** - other Facebook plugins embed the feed using iframes which are not crawlable
* **Completely responsive and mobile optimized** - works on any screen size
* Use the shortcode to display the feed in a page, post or widget anywhere on your site
* Embed YouTube and Vimeo videos right into your feed
* Show the number of likes, comments and shares beneath each post
* Each post links to it's Facebook equivalent to allow people to join in the conversation
* Limit the number of posts to be displayed
* Set a maximum length for both the post title and body text
* Use the shortcode to display feeds from multiple Facebook pages anywhere on your site

== Installation ==

1. Install the Custom Facebook Feed either via the WordPress plugin directory, or by uploading the `custom-facebook-feed` folder to your web server (in the `/wp-content/plugins/` directory).
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to the 'Custom Facebook Feed' plugin settings page to configure your feed.
4. Use the shortcode `[custom-facebook-feed]` in your page, post or widget to display your feed.
5. You can display multiple feeds of different Facebook pages by specifying a Page ID directly in the shortcode: `[custom-facebook-feed id=SarahsBakery show=5]`.
6. You can limit the length of the title and body text by using 'titlelength=100' and 'bodylength=150' (for example) in the shortcode.

== Changelog ==

= 1.1.1 =
* New: Shared events now display event details (name, location, date/time, description) directly in the feed

= 1.1.0 =
* New: Added embedded video support for youtu.be URLs
* New: Email addresses within the post text are now hyperlinked
* Fix: Links beginning with 'www' are now also hyperlinked

= 1.0.9 =
* Bug fixes

= 1.0.8 =
* New: Most recent comments are displayed directly below each post using the 'View Comments' button
* New: Added support for events - display the event details (name, location, date/time, description) directly in the feed
* Fix: Links within the post text are now hyperlinked

= 1.0.7 =
* Fix: Fixed issue with certain statuses not displaying correctly
* Fix: Now using the built-in WordPress HTTP API to get retrieve the Facebook data

= 1.0.6 =
* Fix: Now using cURL instead of file_get_contents to prevent issues with php.ini configuration on some web servers

= 1.0.5 =
* Fix: Fixed bug caused in previous update when specifying the number of posts to display

= 1.0.4 =
* Tweak: Prevented likes and comments by the page author showing up in the feed

= 1.0.3 =
* Tweak: Open links to Facebook in a new tab/window by default
* Fix: Added clear fix
* Fix: CSS image sizing fix

= 1.0.2 =
* New: Added ability to set a maximum length on both title and body text either on the plugin settings screen or directly in the shortcode

= 1.0.1 =
* Fix: Minor bug fixes.

= 1.0 =
* Launch!