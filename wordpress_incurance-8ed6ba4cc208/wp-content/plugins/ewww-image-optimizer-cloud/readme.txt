=== EWWW Image Optimizer Cloud ===
Contributors: nosilver4u
Tags: images, image, attachments, attachment, optimize, optimization, lossless, photos, photo, picture, pictures, seo, compression, image editor, gmagick, cloud, wp-cli
Requires at least: 4.4
Tested up to: 4.5.2
Stable tag: 2.8.3
License: GPLv3

Reduce image sizes for images within WordPress including NextGEN, GRAND FlAGallery, FooGallery and more via paid cloud service.

== Description ==

EWWW Image Optimizer Cloud is a WordPress plugin that will automatically optimize your images as you upload them to your blog. It can optimize the images that you have already uploaded, convert your images automatically to the file format that will produce the smallest image size (make sure you read the WARNINGS), and optionally apply lossy reductions for PNG and JPG images.

By default, EWWW Image Optimizer Cloud uses lossless optimization techniques, so your image quality will be exactly the same before and after the optimization. The only thing that will change is your file size. The one small exception to this is GIF animations. While the optimization is technically lossless, you will not be able to properly edit the animation again without performing an --unoptimize operation with gifsicle. The gif2png and jpg2png conversions are also lossless but the png2jpg process is not lossless. The lossy optimization for JPG and PNG files uses sophisticated algorithms to minimize perceptual quality loss, which is vastly different than setting a static quality/compression level.

Images are optimized via cloud servers that utilize the latest tools available in lossless or lossy mode. Your images can optionally be converted to the most suitable file format.

EWWW Image Optimizer Cloud offloads all optimization to designated servers which will allow the plugin to work on any hosting platform. The lossy compression options use special algorithms to gain maximum compression with minimal loss of quality. Using the EWWW I.O. Cloud can also be desirable if you cannot, or do not want to use the exec() function on your server, or prefer to offload the cpu demands of optimization for any reason. This is an ideal setup for web developers who can install this plugin for their clients with no risk due to the potentially insecure exec() function.

**Why use EWWW Image Optimizer Cloud?**

1. **Your pages WILL load faster.** Smaller image sizes means faster page loads. Faster page loads means more revenue, and who doesn't want that?
1. **Faster backups.** Smaller image sizes also means faster backups.
1. **Less bandwidth usage.** Optimizing your images can save you hundreds of KB per image, which means significantly less bandwidth usage.
1. **Better Privacy.** The cloud servers do not store any images after optimization is complete, and you retain all rights to any images processed via the cloud service.
1. **Root access not needed** No binaries needed on your local server, so it works on any hosting platform.
1. **Optimize everything** With the wp_image_editor class extension, and the ability to specify your own folders for scanning, any image in Wordpress can be optimized.

If you want to optimize images on your own server without using the cloud, see the [EWWW Image Optimizer](http://wordpress.org/plugins/ewww-image-optimizer/).

= Bulk Optimize = 

There are two functions on the Bulk Optimize page. One is to optimize all images in the Media Library. The Scan and Optimize is for everything else. Officially supported galleries (GRAND FlaGallery, NextCellent, and NextGEN) have their own Bulk Optimize pages.  

= Skips Previously Optimized Images = 

All optimized images are stored in the database so that the plugin does not attempt to re-optimize them unless they are modified. On the Bulk Optimize page you can view a list of already optimized images. You may also remove individual images from the list, or use the Force optimize option to override the default behavior. The re-optimize links on the Media Library page also force the plugin to ignore the previous optimization status of images. 

= WP Image Editor = 

All images created by the built-in WP_Image_Editor class will be automatically optimized. Current implementations are GD, Imagick, and Gmagick. Images optimized via this class include Animated GIF Resize, BuddyPress Activity Plus (thumbs), Easy Watermark, Hammy, Imsanity, MediaPress, Meta Slider, MyArcadePlugin, OTF Regenerate Thumbnails, Regenerate Thumbnails, Simple Image Sizes, WP Retina 2x, WP RSS Aggregator and probably countless others. If you are not sure if a plugin uses WP_Image_Editor, post your question in the support forums.

= Optimize Everything Else =

Site admins can specify any folder within their wordpress folder to be optimized. The 'Scan and Optimize' option under Media->Bulk Optimize will optimize theme images, BuddyPress avatars, BuddyPress Activity Plus images, Meta Slider slides, WP Symposium images, GD bbPress attachments, Grand Media Galleries, and any user-specified folders. Additionally, this tool can run on an hourly basis via wp_cron to keep newly uploaded images optimized. Scheduled optimization should not be used for any plugin that uses the built-in Wordpress image functions.

= WebP Images =

Can generate WebP versions of your images, and enables you to serve even smaller images to supported browsers. Several methods are available for serving WebP images, including Apache-compatible rewrite rules and our Alternative WebP Rewriting option compatible with caches and CDNs. Also works with the WebP option in the Cache Enabler plugin from KeyCDN.

= WP-CLI =

Allows you to run all Bulk Optimization processes from your command line, instead of the web interface. It is much faster, and allows you to do things like run it in 'screen' or via regular cron (instead of wp-cron, which can be unpredictable on low-traffic sites). Install WP-CLI from wp-cli.org, and run 'wp-cli.phar help ewwwio optimize' for more information. 

= FooGallery =

All images uploaded and cached by FooGallery are automatically optimized. Previous uploads can be optimized by running the Media Library Bulk Optimize. Previously cached images can be optimized by entering the wp-content/uploads/cache/ folder under Folders to Optimize and running a Scan & Optimize from the Bulk Optimize page.

= NextGEN Gallery =

Features optimization on upload capability, re-optimization, and bulk optimizing. The NextGEN Bulk Optimize function is located near the bottom of the NextGEN menu, and will optimize all images in all galleries. It is also possible to optimize groups of images in a gallery, or multiple galleries at once.

= NextCellent Gallery =

Features all the same capability as NextGEN, and is the continuation of legacy (1.9.x) NextGEN support.

= GRAND Flash Album Gallery =

Features optimization on upload capability, re-optimization, and bulk optimizing. The Bulk Optimize function is located near the bottom of the FlAGallery menu, and will optimize all images in all galleries. It is also possible to optimize groups of images in a gallery, or multiple galleries at once.

= Image Store =

Uploads are automatically optimized. Look for Optimize under the Image Store (Galleries) menu to see status of optimization and for re-optimization and bulk-optimization options. Using the Bulk Optimization tool under Media Library automatically includes all Image Store uploads.

= CDN Support =

Uploads to Amazon S3, Azure Storage, Cloudinary, and Dreamspeed CDN are optimized. All pull mode CDNs like Cloudflare, KeyCDN, MaxCDN, and Sucuri CloudProxy are also supported.

= Translations =

Huge thanks to all our translators! If you would like to help translate this plugin (new or existing translations), you can do so here: https://translate.wordpress.org/projects/wp-plugins/ewww-image-optimizer-cloud To receive updates when new strings are available for translation, you can signup here: https://ewww.io/register/

== Installation ==

1. Upload the 'ewww-image-optimizer-cloud' plugin to your '/wp-content/plugins/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Purchase an API key via https://ewww.io/plans/.
1. Enter your API key on the plugin settings page and enable the image formats you want to optimize.
1. *Optional* Visit the settings page to enable/disable specific tools and turn on advanced optimization features.
1. Done!

EWWW IO - Cloud API Walkthrough
[youtube https://www.youtube.com/watch?v=U78FFkM582E]
EWWW IO - Converting Images
[youtube https://www.youtube.com/watch?v=xAGtdv3vrYg]
EWWW IO - WebP
[youtube https://www.youtube.com/watch?v=OeYJgTy3D94]
Using EWWW IO:
[youtube https://www.youtube.com/watch?v=uELM25v-qgU]

== Frequently Asked Questions ==

= Google Pagespeed says my images need compressing or resizing, but I already optimized all my images. What do I do? =

http://ewww.io/2014/12/05/pagespeed-says-my-images-need-more-work/

= Does the plugin replace existing images? =

Yes, but only if the optimized version is smaller. The plugin should NEVER create a larger image.

= Can I resize my images with this plugin? =

No, we leave that to other plugins like Imsanity.

= Can I lower the compression setting for JPGs to save more space? =

The lossy JPG optimization using TinyJPG and JPEGmini will determine the ideal quality setting and save even more space. You cannot manually set the quality with this plugin.

= The bulk optimizer doesn't seem to be working, what can I do? =

If it doesn't seem to work at all, check for javascript problems using the developer console in Firefox or Chrome. If it is not working just on some images, you may need to increase the setting max_execution_time in your php.ini file. There are also other timeouts with Apache, and possibly other limitations of your webhost. If you've tried everything else, the last thing to look for is large PNG files. In my tests on a shared hosting setup, "large" is anything over 300 KB. You can first try decreasing the PNG optimization level in the settings. If that doesn't work, perhaps you ought to convert that PNG to JPG or set a max PNG optimization size. Screenshots are often done as PNG files, but that is a poor choice for anything with photographic elements.

= I want to know more about image optimization. =

That's not really a question, but since I made it up, I'll answer it. See these resources:
http://developer.yahoo.com/performance/rules.html#opt_images  
https://developers.google.com/speed/docs/best-practices/payload#CompressImages  
https://developers.google.com/speed/docs/insights/OptimizeImages  

== Changelog ==

* If you would like to help translate this plugin in your language, get started here: https://translate.wordpress.org/projects/wp-plugins/ewww-image-optimizer-cloud/

= 2.8.3 =
* fixed: notice when checking nonce lifetime during scheduled optimization
* fixed: multi-site not saving cloud optimization levels
* fixed: settings page requiring a refresh to display properly after inserting/removing an API key

= 2.8.1 =
* added: kudos to Cache Enabler plugin from KeyCDN for adding WebP rewrite support to work with images generated by EWWW I.O.
* fixed: untranslatable string for resize setting description
* fixed: Resize Media Images was not applying to the Media->Add New menu item
* fixed: Bulk Optimize counted webp images as valid resizes

= 2.8.0 =
* added: resizing for uploaded images, set max width and height and optionally resize all existing images
* added: retina derivative for resized original is generated if original was at least twice the size of the max dimensions (WP Retina 2x Pro only)
* fixed: warnings for file_exists in Alt WebP function when open_basedir restriction is in effect
* removed: disable automatic optimization, use deferred optimization instead
* changed: consolidated various settings into optimization levels for each file format, and removed Cloud tab

= 2.7.2 =
* fixed: retina images not obeying deferred and disabled auto-optimize options
* fixed: fatal error for wp-cli when trying to optimize Media Library
* fixed: pdf optimization was checking for gif option
* fixed: pdf could not use bulk optimization or deferred optimization due to empty metadata

= 2.7.1 =
* fixed: Bulk Optimization not including PDF files
* fixed: PDF files not being checked for prior optimization
* fixed: notice for undefined index when running scheduled optimization
* changed: Scan and Optimize changed from extension blacklist to smaller extension whitelist

= 2.7.0 =
* added: PDF Optimization, both lossless AND lossy

= 2.6.2 =
* fixed: url matching for Amazon S3 urls not working for region-specific protocol handlers
* fixed: discrepancy between number of images actually queued for bulk and number of images listed as selected
* removed: optimize again for media library after bulk optimize is complete
* changed: fewer timeouts for long-running Bulk operations by re-issuing nonce values
* changed: previously optimized CDN images show Re-optimize instead of Optimize Now
* added: pre-emptive mime-type detection for Amazon S3 images since the AWS Stream Wrapper is not reliable

= 2.6.1 =
* fixed: slow loading of Media Library list view with Amazon S3 attachments
* fixed: Amazon S3 images could be re-optimized after upload without Force enabled
* fixed: Amazon S3 images not shown when pressing Show Optimized Images
* fixed: error when legacy image_md5 column did not exist
* changed: last optimized time set in db for all images, not just re-optimized ones
* changed: NextGEN bulk optimize requires admin permissions by default

= 2.6.0 =
* security: missing validate, sanitize, and escape for some user and database inputs
* security: bulk optimize uses a js sleep instead of php to help avoid timeouts and protect against DOS attacks
* security: protect from CSRF by adding nonce values to one-click optimize/re-optimize/convert links
* removed: support for legacy NextGEN 1.x, please use Nextcellent for continued integration with EWWW I.O.
* fixed: nextgen (nextcellent and 2.x) styling for ui when bulk optimizing galleries and images on the Manage Galleries page
* fixed: advanced settings not showing the medium_large size introduced in WP 4.4
* fixed: path to Image Store resizes not built properly
* fixed: notices when querying for MetaSlider images
* fixed: fatal error when NextGEN2 and EWWW are active with the Photocrati theme and you try to activate another plugin
* fixed: white screen when using NextGen2's Reset Options to Default
* fixed: not properly detecting if login session expires while running bulk optimization
* fixed: webp js attempting to load even if jQuery not present
* fixed: conflict with Alternative WebP Rewriting and Cornerstone editor from X-theme
* fixed: arrow on Plugin Status was missing due to WP admin style updates
* fixed: bulk optimize will output a proper error message then the full-size image cannot be found
* added: compatibility with Alternative WebP Rewriting and infinite scroll from Avada theme, Animated Infinite Scroll plugin, and other functions that retrieve full-page content via AJAX
* added: full compatibility with Alternative WebP Rewriting and Revolution Slider from ThemePunch
* added: Alternative WebP Rewriting supports protocol-less urls
* added: Alternative WebP Rewriting works with Easy Social Share Buttons plugin (footer widget had extra spacing)
* added: debugging page for dynamic image (re)generation to help find problematic plugins
* added: bulk optimize displays image credits needed and used/remaining credits for API users
* changed: bulk optimize combines ajax queries for greater efficiency and to avoid tripping request limits
* changed: bulk optimize shows last optimized image details and optimization log in movable and collapsible metaboxes
* changed: speed up Cloud optimization by removing redundant API verifications when optimizing image resizes
* changed: replaced get_posts with direct wpdb calls for less overhead and to avoid broken filters from other plugins
* changed: standard lossy JPG compression (via TinyJPG) now preserves copyright when Remove Metadata is unchecked

= 2.5.8 =
* fixed: CPU overload causing 503 errors related to WebP function and output buffering parameters
* fixed: call to old debug function in Image Store Optimize page
* fixed: notices if action2 is not specified from Media Library bulk action drop-down

= 2.5.7 =
* fixed: MySQL column index too large when collation is utf8mb4 prevents table creation and throws warnings on upgrades
* fixed: cleanup of table upgrade function to avoid unnecessary queries
* fixed: Optimized string was undefined for flagallery and nextgen bulk optimization
* fixed: When activated network-wide, settings link on per-site Plugins page was incorrect

= 2.5.6 =
* fixed: avoid memory leaks from calls to ewwwio_debug_message() within ewww_image_optimizer_require() for multi-site users

= 2.5.5 =
* fixed: prevent duplicate scheduled optimizations from running concurrently
* fixed: removed redundant checks from scheduled optimization
* changed: files without extensions are skipped by the folder scanning function
* changed: hidden files are skipped by the folder scanning function (can be modified with a filter)
* changed: new installs will have the collation set properly for the ewwwio_images table
* changed: make require() and include() less fatal and use admin notices instead
* fixed: warnings when deferred optimization queue is empty

= 2.5.4 =
* changed: Remove metadata turned on by default, should not affect existing installations/upgrades
* changed: Portugu??s and Espa??ol translations updated
* fixed: notices from redefining constants
* updated: pngquant, cwebp, and gifsicle updated for API users

= 2.5.3 =
* changed: French, Bulgarian, Romanian, German and Polish translations have been moved to language packs for auto-updating
* fixed: wpdb call causes error during scheduled optimization
* fixed: mismatched CN for SSL certs on cloud servers
* added: Alt WebP Rewriting supports new srcset and sizes attributes in WordPress 4.4

= 2.5.2 =
* new: all our installation videos have been re-done so that they are up-to-date and answer some common questions
* changed: much faster scanning for Scan & Optimize when ewwwio table is large
* fixed: check WP_CONTENT_DIR setting if wp_upload_dir() is reporting the wrong upload directory
* fixed: translations for fr_BE and uk (Ukrainian)
* fixed: .htaccess installer for webp rules
* fixed: alt webp rewriting gets stuck when <head> tag has a space: <head >
* fixed: notice thrown when trying to call unregister_setting before any settings were actually registered for EWWW

= 2.5.1 =
* added: Portuguese (Portugal) translation for pt_PT thanks to Celso Azevedo
* added: optimization for custom sizes for "Fraction" theme
* added: filter to override restrictions for Folders to Optimize
* fixed: bulk delay was ignored when processing deferred images
* fixed: notices when scanning media library to load Bulk Optimize page
* fixed: tooltip text was not escaped properly for one-click conversion links
* fixed: warning when deferred optimization runs and there is nothing available to optimize
* fixed: error when bulk optimizing and w3_upload_info() function is missing
* fixed: error when passing empty value to json_encode()
* fixed: error on Unoptimized Images when bulk optimization resume flag is set, but no attachments are left
* fixed: Unoptimized Images will scan entire library when bulk optimization resume flag is set, instead of just remaining attachments

= 2.5.0 =
* deprecated: Disable Automatic Optimization and Include Media Folders options: will be removed from the UI in 2.6 but remain functional if enabled
* added: deferred optimization lets you upload images with no delays, and optimize later automatically
* added: wp_cron filter has additional parameter to allow setting scheduled & deferred optimization on different freqencies
* added: remote images on S3 can be fetched when using WP Offload S3 (Amazon S3 and Cloudfront)
* added: remote images on Azure Storage can be fetched when using Windows Azure Storage for WordPress
* added: (re)upload to Dreamspeed after optimization
* added: action hooks before and after optimization
* added: filter to modify the number of records queried when counting unoptimized images (default 3000)
* added: check for retina images generated without WP Retina 2x, with filter to modify @2x extension
* changed: nextcellent thumbs are optimized on creation, no need to manually optimize after upload
* changed: API keys are masked as password fields
* changed: debugging functions streamlined to reduce memory usage
* updated: translator credits - huge THANK YOU to all of them!
* fixed: errant tool warnings for cloud users in nextgen and flagallery
* fixed: regression with alt webp rewriting introduced in 2.4.4 that caused duplicate <html> and <head> tags in some cases
* fixed: url replacement when restoring original for a converted image

= 2.4.7 =
* fixed: defer nextgen loading until 'init' to prevent activation/upgrade problems
* fixed: nextgen dynamic image generation fails if API subscription is out of image credits

= 2.4.6 =
* fixed: check that image exists in WP_Image_Editor extension
* added: filter to modify/suppress output of thumbnail optimization message after image upload for Nextcellent (useful for things like Lightroom integration)
* updated: Italian (it_IT) translation

= 2.4.5 =
* fixed: warning on settings page for implode() function
* fixed: notice on admin pages with get_home_url() function
* added: filter to allow changing time period for scheduled optimization

= 2.4.4 =
* fixed: Alt WebP Rewriting unable to find images when WP url and Site url are different (subdirectory install)
* fixed: Alt WebP Rewriting mangles certain characters due to older versions of libxml
* fixed: Alt WebP Rewriting parses xml files when it should leave them alone - feeds and sitemaps
* fixed: issues with API license exceeded during bulk optimization

= 2.4.3 =
* fixed: Alt WebP Rewriting breaks themes with <header> elements

= 2.4.2 =
* updated: set_time_limit() moved to core function for even better timeout avoidance, and threshold increased to 90
* fixed: Alt WebP Rewriting detects XHTML themes, and attempts to parse them as XML, but will still break if your theme does not pass validation.
* fixed: cleanup output of html entities when using wp-cli
* fixed: Scan & Optimize throws warnings when a directory is not detected properly
* fixed: --noprompt for wp-cli has no effect
* fixed: check to see if set_time_limit() is disabled before running it
* added: W3TC S3 CDN - update original image on S3 after optimization
* added: German (de_DE) translation
* added: French (fr_FR) translation
* added: call set_time_limit() to avoid timeouts loading the Bulk Optimize page

= 2.4.1 =
* fixed: Alt WebP Rewriting was slow due to an inefficient regexp
* fixed: Scan & Optimize fails when it encounters a permissions error

= 2.4.0 =
* added: advanced option to disable specific resizes or just exclude them from optimization
* added: Turkish and Swedish translations (with updates of most other translations)
* fixed: check to prevent issues with reloading nextgen2 support was only half-effective
* fixed: previous fix for wrong slash on Windows breaks savings settings for Network sites
* fixed: WP_Image_Editor init() check was not checking the right constant
* fixed: Alternative WebP Rewriting had a mismatched preg_replace causing broken <html> or <head> tags
* fixed: some NextGen bulk optimize functions were broken when using various translations

= 2.3.2 =
* fixed: sql error for duplicate key name during plugin upgrade
* fixed: is_plugin_active undefined during scheduled optimization
* fixed: webp rewriting strips </body> and </html>
* fixed: leftover javascript showing 0 for Total Savings
* changed: minify and load webp script inline
* changed: client-side webp detection for caching plugins
* changed: settings page ui refinements
* changed: prevent parsing the request with alternative webp rewriting unless it contains html
* changed: more extensions added to blacklist during Scan and Optimize to prevent memory errors
* changed: added checks to prevent redeclaring ewwwngg and ewwwflag classes

= 2.3.1 =
* fixed: load_webp.js missing for cloud version
* fixed: load_webp.js was being inserted regardless of the associated Alternative WebP Rewrites option
* fixed: wrong slash in plugin path for Windows users with NextGEN and FlaGallery
* fixed: extra comma in table upgrade sql
* fixed: special characters malformed by alternate webp rewriting
* updated: translation for Spanish
* changed: progressbar color updated to match new colors in 4.2 for default theme

= 2.3.0 =
* added: WebP url rewriting for sites using CDNs, requires output buffering and libxml in PHP, and may require modifications for some themes
* added: option to include last two months of Media Library images in Scheduled Optimization (for those that have disabled Automatic Optimization)
* added: automatic optimization for dynamic resizes generated by NextGEN 2+, particularly useful for Plus/Pro users
* added: option to speed up lossy compression by using less compression
* added: compatibility with NextGEN Public Uploader and other NextGEN 2 plugins that use legacy uploads
* added: auto-optimization for MyArcade plugin
* added: delay uploading with W3TC CDN function until after optimization
* changed: resizes are not processed twice during upload. they were only optimized once previously, but this should give a small speed boost to uploads.
* changed: manual optimize/convert/restore links require editor role, bulk optimization requires admin role, can be changed via filters
* changed: disabling automatic optimization affects Nextgen, Nextcellent, and FlaGallery as well
* changed: lossy compression for EWWW I.O. Cloud users now uses TinyJPG and TinyPNG for superior compression
* changed: added index to ewwwio_images table and modified queries for substantial speed-up (and less load on database servers)
* changed: Total Savings calculation now uses a single SQL statement, please report any related errors right away
* changed: cleaned up flagallery and nextgen integration loading and made it folder-agnostic
* changed: suppress plugin warnings when running 'init' outside of admin pages
* fixed: Folders to Optimize was not being validated properly
* fixed: notice on Unoptimized Images page
* fixed: mysql error when attempting to query negative number of records on settings page
* fixed: bug with image savings string in Spanish translation
* fixed: referencing object as an array when scanning for Meta Slider images causes Scan & Optimize to fail
* fixed: BIGINT errors when calculating savings
* fixed: warning with Nextgen2 when plugin init had not yet occurred
* fixed: Scan and Optimize consuming too much memory when checking mimetype of .po files
* fixed: wp retina detection queries referencing object as an array
* fixed: originals from converted resizes were not deleted during attachment removal
* fixed: WebP versions of retina 2x images were not renamed properly
* fixed: Unoptimized images displays an empty table for zero images to optimize

= 2.2.2 =
* fixed: previous fix for deleting webp images was not working properly

= 2.2.1 =
* fixed: infinite loop on hosts where set_time_limit does not work

= 2.2.0 =
* added: wp-cli command to optimize via command-line, 'wp-cli help ewwwio optimize' for more details
* added: Unoptimized Images page to show ONLY images that have not been processed by EWWW (under Media Library)
* added: advanced option to preserve metadata for full-size originals
* added: disable automatic optimization on upload under advanced options if you prefer to manually optimize in batches, or by scheduled optimization
* changed: webp images are checked during deletion of images, though WP already removes any newer webp versions that are in the attachment metadata
* fixed: load text domain earlier so that admin menu items are properly translated
* fixed: Total Savings calculates properly on multi-site installs when network-activated
* fixed: Total Savings was double-counting the first 1000 image query
* FlaGallery 4.27 resolves the optimize on upload issue, and fixes problems with the new wp-cli functions

= 2.1.2 =
*fixed: post-processing call to Amazon S3 and Cloudfront was broken when upgrading it to .7 or higher, fixed to allow both .6 and .7 to work with EWWW IO

= 2.1.1 =
* broken: optimize on upload currently broken for flagallery
* deprecated: NextGEN legacy support will be removed in 2.2 unless I hear from anyone still using it, Nextcellent will continue to be supported
* changed: all image types are enabled when cloud API key is validated (but only if you do not choose individual options)
* changed: prefixed javascript/request variables to avoid potential conflicts
* fixed: undefined variable $log when uploading images
* fixed: undefined variable $force when running scheduled optimize
* fixed: undefined index JPG Support when GD is missing
* added: memory logging in memory.log when WP_DEBUG is turned on in wp-config.php
* fixed: bulk actions for Nextcellent were missing
* fixed: notices generated because webp versions do not have height and width when WP is scanning resizes
* fixed: notices generated due to no optimization status during bulk optimization for webp versions
* fixed: error when trying to unserialize an array for Image Store Optimize page
* added: Portuguese translation (pt_BR), props to Pedro Marcelo de S?? Alves

= 2.1.0 =
* security: ssl strengthened for cloud users, no more SSLv3 (thanks POODLE), and other additional encryption tweaks, please report related errors ASAP
* fixed: warning when scheduled scanner doesn't have any images to optimize
* added: option to skip PNG images over a certain size since PNG images are prone to timeouts (should not be too much of a problem for cloud users, but just in case...)
* added: compatibility with Animated Gif Resize plugin to preserve animation even in resizes
* added: compatibility with Hammy plugin to generate dynamic resize versions on demand (and any other plugin/theme that uses WPThumb)
* added: optimizing previously uploaded images (via bulk or otherwise) also uploads to Amazon S3 with the Amazon Cloudfront and S3 plugin
* added: webp images are tracked in attachment metadata to enable upload via AWS plugins, but webp images are not deleted when attachments are deleted from Media Library (yet)
* added: previously generated retina images (WP Retina 2x) are processed by standard Media Library routine, instead of via Folders to Optimize
* changed: streamlined wp_image_editor extensions to be more future-proof
* updated: all translations have been updated

= 2.0.2 =
* security: pngout error message properly sanitized to prevent XSS attack
* changed: changed priority for processing Media Library images to run before Amazon Cloudfront plugin, this could affect other plugins that hook on wp_generate_attachment_metadata
* fixed: cloud users seeing 'needs attention' incorrectly
* fixed: error counter for bulk not being reset when successfully resuming
* fixed: clarification about jpegmini and cmyk images
* fixed: debugging errors for optipng/pngout levels should not be displayed for cloud users
* fixed: Image Store resizes were being double-optimized due to filename changes

= 2.0.1 =
* fixed: naming conflict with webp when jpg/png files have identical names, read NOTE above
* fixed: folders to optimize are not retrieved properly on settings page
* fixed: prevent excess calls for webp conversion
* fixed: wpdb->prepare should have two arguments
* updated: Spanish translation
* added: Russian translation
* removed: deprecated import process from bulk optimize page
* removed: empty table option from bulk optimize page, use the Force checkbox instead
* changed: force re-optimize checkbox applies to Media Library AND the Scan and Optimize function
* changed: plugin status auto-collapses to save screen space, unless something needs your attention
* changed: settings tabs have been moved below the status section (directly above the settings area) to enhance usability

= 2.0.0 =
* NOTE: while this is a release with new features, it is not a rewrite, only the next number in the decimal system, just like the WP numbering scheme
* fixed: multi-site was not savings settings for cloud-only plugin
* added: webp generation (wahooooooooo)
* added: jpegmini support (more wahooooo, but requires a cloud subscription)
* fixed: jpeg quality not being set properly for 4.0 on resizes
* changed: settings page, feel free to give me feedback on the new menubar
* fixed: some settings not being validated properly for multi-site
* added: up to 30 second retry when bulk optimize is interrupted
* changed: various code cleanup
* changed: better verification when saving settings for multi-site
* changed: all cloud transactions are now secured (https)
* fixed: use nextgen2's unserialize function to query metadata during bulk optimize
* added: Polish translation
* updated: Dutch and Romanian translations
* updated: Tutorial videos on the Installation page have updated finally
* fixed: import failed if nextgen classes aren't available during import

= 1.9.3 =
* added: fallback mode when totals for resizes and unoptimized images cannot be determined by the bulk optimize tool
* added: up to 30 second retry when import is interrupted on bulk optimize page
* fixed: suppress 'empty server response' messages for cloud users, instead correctly report No Savings

= 1.9.2 =
* fixed: memory limit exceeded when counting total savings on settings page
* added: PngOptimizerCL for even better optimization of PNG images on cloud service
* changed: cloud processing nodes upgraded for faster image processing
* changed: made queries for resuming bulk operations more efficient to avoid running into max query length problems
* fixed: images that were not processed (cloud or otherwise) can be optimized later (they are no longer stored in ewwwio_images table)
* changed: more efficient verification of cloud api keys

= 1.9.1 =
* fixed: escapeshellarg command breaks Windows filenames
* fixed: properly check paletted/indexed PNG files for transparency (requires GD)
* fixed: images smaller than imsanity resize limit trigger notice
* changed: exclude full-size from lossy optimization applies to lossy conversions too
* changed: no more caching of cloud key verification results, since verification is 300x faster, and only called when we absolutely need it
* added: Optimized/webview sizes in FlaGallery are tracked properly, and optimized during bulk operations, and manual one-time optimizations.
* added: use nextgen2 hook for adding action link in gallery management pages

= 1.9.0 =
* changed: verification results for cloud optimization are still cached, but actual optimization requires pre-verification to maintain load-balancing
* added: NextCellent Gallery support - no future development will be done for NextGEN 1.9.13, all future development will be on NextCellent.
* updated translations for Romanian and Dutch
* fixed some warnings and notices
* added GMedia folder to Scan and Optimize function
* show cumulative savings in status section
* added: filter to bypass optimization for developer use
* added: option to bypass optimization for small images

= 1.8.5 =
* fixed: images with empty metadata count as unoptimized images on Bulk Optimize
* changed: Import process split into batches via AJAX to make it less likely to timeout and use less memory
* changed: Bulk Optimize page uses less memory and is quicker to load
* fixed: custom column in NextGEN galleries works again with NextGEN 2.0.50+
* fixed: license exceeded messages do not stall Bulk Optimize incorrectly
* fixed: warning on Bulk Optimize for sites using UTC
* fixed: user-specified paths to optimize did not work if using multi-site WP with plugin activated per-site

= 1.8.4 =
* fixed: Import process is much faster by about 50x

= 1.8.3 =
* changed: API key validation is now cached to greatly reduce page load time, mostly on the admin side, but also for any sites that generate or allow uploading images on the front-end
* fixed: a few WP Retina @2x images were not being optimized, and none of them were stored in the ewwwio_images table properly
* new: better compression for PNGs via advpng
* new: lossy compression for PNG images via pngquant
* changed: Bulk Optimize loads much quicker (mostly noticable on sites with thousands of images)

= 1.8.2 =
* updated Romanian translation
* removed: potentially long-running query from upgrade
* fixed: cloud queries were using the wrong hostname, all cloud users must apply this update to avoid service degradation

= 1.8.1 =
* fixed: undefined function broke lots of stuff

= 1.8.0 =
* fixed: debug output not working properly on bulk optimize
* changed: when cloud license has been exceeded, the optimizer will not attempt to upload images, and bulk operations will stop immediately
* fixed: unnecessary decimals will not be displayed for file-sizes in bytes
* added: button to stop bulk optimization process
* changed: Optimize More and Bulk Optimize are now on the same page
* changed: After running Optimize More, you can Show Optimized Images and Empty Table without refreshing the page.
* fixed: blank page when resetting bulk status in flagallery
* change: already optimized images in Media Library will not be re-optimized by default via bulk tool
* fixed: FlaGallery version 4.0, optimize on upload now works with plupload
* fixed: proper validation that an image has been removed from the auxilliary images table
* move more code into admin_init to improve page load on front-end
* added: ability to specify number of seconds between images (throttling)
* added: nextgen and grand flagallery thumb optimization is now stored in database
* fixed: urls for converted resizes were not being updated in posts
* fixed: attempt to convert PNGs with empty alpha channels after optimization on first pass, instead of on re-optimization

= 1.7.6 =
* port from EWWW Image Optimizer: pre-fork changelog below
* fixed: color of progressbar for 4 more admin themes in WP 3.8
* changed: metadata stripping now applies to PNG images, but only if using optipng 0.7.x
* added: ability to remove individual images from the Optimize More table
* fixed: Optimize More was using case-insensitive queries for matching paths
* fixed: Optimize More was unable to record image sizes over 8388607 bytes
* removed: obsolete jquery 1.9.1 file used for maintaining backwards compatiblity with really old versions of WP

= 1.7.5 =
* new version of gifsicle (1.78), for more detail, see http://www.lcdf.org/gifsicle/changes.html
* proper detection of Cloudinary images instead of error message
* plays nicer with Imsanity, detect when a newly uploaded image has been modified and optimized already (instead of re-optimizing)
* Dutch translation - nl_NL
* Romanian translation - ro_RO
* Spanish translation - es_ES
* Cloudinary integration: auto-upload after optimization when uploading to Media Library, must be enabled in settings
* debugging output for Media Library (let's you see resizes)
* visual tweaking for upcoming WP 3.8
* better checking for safe_mode

= 1.7.4 =
* fixed: some settings were set to incorrect defaults after enabling and disabling cloud features
* fixed: invalid status on some systems for 'tar' command
* new: SunOS support - OpenIndiana and Solaris
* fixed: resizes not properly checking for re-optimization prevention

= 1.7.3 =
* fixed: some security plugins disable Optimize More - use install_themes permission instead of edit_themes
* fixed: table schema changes not firing on upgrade
* changed: bulk_attachment variables are not autoloaded to improve performance

= 1.7.2 =
* added: internationalization - need volunteers to provide translations. If interested, post a support thread with the language you would like to help with.
* fixed: Import button not shown on Optimize More in some cases
* fixed: Bulk Optimize for Nextgen was broken
* changed: file comparison from md5sum to filesize for Optimize More to improve load time
* added: quota information for cloud users on settings page
* fixed: sub-folders of uploads directory were not allowed if /uploads is outside of wp folder
* changed: increased cloud_verify timeout to avoid false results
* added: link to status page for cloud service on settings page
* fixed: debug log created if it does not exist already

= 1.7.1 =
* fixed: syntax error causing white screen of death for Nextgen v2

= 1.7.0 =
* added: ability to optimize specified folders within your wordpress install
* added: option to optimize on a schedule for images that cannot be automatically optimized on upload (buddypress, symposium, metaslider, user-specified folders)
* added: WP Symposium support via 'Optimize More' in Tools menu
* added: BuddyPress Activity Plus support via 'Optimize More'
* fixed: unnecessary check for 'file' field in attachment metadata
* fixed: network-level settings are not reset on deactivation and reactivation
* fixed: blog-level settings not displayed when activated at the blog-level on multi-site
* added: Any plugin that uses wp_image_editor (GD, Imagick, and Gmagick implementations) will be auto-optimized on upload
* fixed: Optimize More will crash if one of the standard folders does not exist (e.g.: buddypress avatar folders)
* fixed: filenames are escaped to prevent potential crashes and security risks
* fixed: temporary jpgs are checked to be sure they exist to avoid warnings
* fixed: prevent warnings on bulk optimize due to empty arrays
* fixed: don't check permissions until after we know file exists
* fixed: WP get_attached_file() doesn't always work, try other methods to get attachment path
* removed: deprecated setting to skip utility verification
* fixed: init not firing for plugins with front-end functionality
* fixed: suppress warnings if corrupt jpg crashes jpegtran
* added: screencasts on plugin Installation page

= 1.6.3 =
* plugin will failover gracefully if one of the cloud optimization servers is offline
* prevent excess database calls when optimizing theme images
* fixed plugin mangles metadata for Image Store plugin
* added optimization support for Image Store plugin
* verify md5 on buddypress optimization, so changed images will get re-optimized by the bulk tool
* cleaned up settings page (mostly) for cloud users

= 1.6.2 =
* added license exceeded status into status message so users know if they've gone over
* prevent tool checks and cloud verification from firing on every page load, yikes...

= 1.6.1 =
*fixed: temporary jpgs were not being deleted (leftovers from testing for last release)
*fixed: jpgs would not be converted to pngs if jpgs had already been optimized
*fixed: cloud service not converting gif to png

= 1.6.0 =
* Cloud Optimization option (BETA: get your free API key at http://www.exactlywww.com/cloud/)
* fixed if exec() is disabled or safe mode is on, don't bother testing local tools
* more tweaks for exec() detection, including suhosin extension

= 1.5.0 =
* BuddyPress integration to optimize avatars
* added function to optimize all images in currently active theme
* full compatibility with NextGEN 2.0.x
* thumbnails are now optimized automatically on upload with NextGEN 2.0.x
* fixed detection of disabled exec() function when exec is the first function in the list
* use internal wordpress functions for retrieving image path, displaying filesize, building redirect urls, and downloading pngout

= 1.4.4 =
* fixed bulk optimization functions for non-English users in NextGEN
* fixed bulk action conflict in NextGEN

= 1.4.3 =
* global configuration for multi-site/network installs
* prevent loading of bundled jquery on WP versions that don't need it to avoid conflicts with other plugins not doing the 'right thing'
* removed enqueueing of common.js to make things run quicker
* fixed hardcoded link for optimizing nextgen thumbs after upload
* added links in media library for one time conversion of images
* better error reporting for pngout auto-install
* no longer alert users of jpegtran update if they are using version 8

= 1.4.2 =
* fixed fatal errors when posix_getpwuid() is missing from server
* removed path restrictions, and fixed path detection for old blogs where upload path was modified

= 1.4.1 =
* FlaGallery and NextGEN Bulk functions are now using ajax functions with nicer progress bars and such
* NextGEN now has ability to optimize selected galleries, or selected images in bulk (FlaGallery already had it)
* NextGEN users can now click a button to optimize thumbnails after uploading new images
* use built-in php mimetype functions to check binaries, saving 'file' command for fallback
* added donation links, since several folks have expressed interest in contributing financially
* bundled jquery and jquery-ui for using bulk functions on older WP versions
* use 32-bit jpegtran binary on 'odd' 64-bit linux servers
* rewrote debugging functionality, available on bulk operations and settings page
* increased compatibility back to 2.8 - hope no one is actually using that, but just in case...

= 1.4.0 =
* fixed bug with missing 'nice' not detected properly
* added: Windows support, includes gifsicle, optipng, and jpegtran executables
* added: FreeBSD support, includes gifsicle, optipng, and jpegtran executables
* rewrote calls to jpegtran to avoid shell-redirection and work in Windows
* jpegtran is now bundled for all platforms
* updated gifsicle to 1.70
* pngout installer and version updated to February 20-21 2013
* removed use of shell_exec()
* fixed warning on ImageMagick version check
* revamped binary checking, should work on more hosts
* check permissions on jpegtran
* rewrote bulk optimizer to use ajax for better progress indication and error handling
* added: 64-bit jpegtran binary for linux servers missing compatibility libraries

= 1.3.8 =
* fixed: finfo library doesn't work on PHP versions below 5.3.0 due to missing constant 
* fixed: resume button doesn't resume when the running the bulk action on groups of images 
* shell_exec() and exec() detection is more robust 
* added architecture information and warning if 'file' command is missing on settings page 
* added finfo functionality to nextgen and flagallery

= 1.3.7 =
* re-compiled bundled optipng and gifsicle on CentOS 5 for wider compatibility

= 1.3.6 =
* fixed: servers with gzip still failed on bulk operations, forgot to delete a line I was testing for alternatives
* fixed: some servers with shell_exec() disabled were not detected due to whitespace issues
* fixed: shell_exec() was not used in PNGtoJPG conversion
* fixed: JPGs not optimized during PNGtoJPG conversion
* allow debug info to be shown via javascript link on settings page
* code cleanup

= 1.3.5 =
* fixed: resuming a bulk optimize on FlAGallery was broken
* added resume button when running the bulk optimize operation to make it easier to resume a bulk optimize

= 1.3.4 =
* fixed optipng check for older versions (0.6.x)
* look in system paths for pngout and pngout-static
* added option for ignoring bundled binaries and using binaries located in system paths instead
* added notices on options page for out-of-date binaries

= 1.3.3 =
* use finfo functions in PHP 5.3+ instead of deprecated mime_content_type
* use shell_exec() to make calls to jpegtran more secure and avoid output redirection
* added bulk action to optimize multiple galleries on the manage galleries page - FlAGallery
* added bulk action to optimize multiple images on the manage images page - FlAGallery

= 1.3.2 =
* fixed: forgot to apply gzip fix to NextGEN and FlAGallery

= 1.3.1 =
* fixed: turning off gzip for Apache broke bulk operations

= 1.3.0 =
* support for GRAND FlAGallery (flash album gallery)
* added ability to restore originals after a conversion (we were already storing the original paths in the database)
* fixed: resized converted images had the wrong original path stored
* fixed: tools get deleted after every upgrade (moved to wp-content/ewww)
* fixed: using activation hook incorrectly to fix permissions on upgrades (now we check when you visit the wordpress admin)
* removed deprecated path settings, custom-built binaries will be copied automatically to the wp-content/ewww folder
* better validation of tools, no longer using 'which'
* removed redundant path checks to avoid extra processing time
* moved NextGEN bulk optimize into NextGEN menu
* NextGEN and FlAGallery functions only run when the associated gallery plugin is active
* turn off page compression for bulk operations to avoid output buffering
* added status messages when attempting automatic installation of jpegtran or pngout
* NEW version of bundled gifsicle can produce better-optimized GIFs
* revamped settings page to combine version info, optimizer status, and installation options
* binaries for Mac OS X available: gifsicle, optipng, and pngout
* images are re-optimized when you use the WP Image Editor (but never converted)
* fixed: unsupported files have empty path stored in meta
* fixed: files with empty paths throw PHP notices in Media Library (DEBUG mode only)
* when a converted attachment is deleted from wordpress, original images are also cleaned up

= 1.2.2 =
* fixed: uninitialized variables
* update links in posts for converted images
* fixed: png2jpg sometimes fills with black instead of chosen color
* fixed: thumbnails for animated gifs were not allowed to convert to png
* added pngout version to debug

= 1.2.1 =
* fixed: wordpress plugin installer removes executable bit from bundled tools

= 1.2.0 =
* SECURITY: bundled optipng updated to 0.7.4
* deprecated manual path settings, please put binaries in the plugin folder instead
* new one-click install option for jpegtran
* one-click for pngout is more efficient (doesn't redownload tarball) if it exists
* optipng and gifsicle now bundled with the plugin
* new *optional* conversion routines check for smallest file format
* added gif2png
* added jpg2png
* added png2jpg
* reorganized settings page (it was getting ugly) and cleaned up debug area
* added poll for feedback
* thumbnails are now optimized in NextGEN during a manual optimize (but not on initial upload)
* utilities have a 'niceness' value of 10 added to give them lower priority

= 1.1.1 =
* fixed not returning results of resized version of image

= 1.1.0 =
* added pngout functionality for even better PNG optimization (disabled by default)
* added options to disable/bypass each tool
* pre-compiled binaries are now available via links on the settings page - try them out and let me know if there are problems

= 1.0.11 =
* path validation was broken for nextgen in previous version, now fixed

= 1.0.10 =
* added the ability to resume a bulk optimization that doesn't complete
* changed path validation for images from wordpress folder to wordpress uploads folder to accomodate users who have located this elsewhere
* minor code cleanup

= 1.0.9 =
* fixed parse error due to php short tags (old habits die hard)

= 1.0.8 =
* added extra progress and time indicators on Bulk Optimize
* allow each image in Bulk Optimize 50 seconds to help prevent timeouts (doesn't work if PHP's Safe Mode is turned on)
* added check for safe mode (because we can't function that way)
* changed default PNG optimization to level 2 (8 trials) to improve performance
* restored calls to flush output buffers for php 5.3

= 1.0.7 =
* added bulk optimize to Tools menu and re-optimize for individual images with NextGEN
* fixed optimizer function to skip images where the utilities are missing
* added check to ensure user doesn't pass arguments in utility paths
* added check to prevent utilities from being located in web root
* changed optipng level setting from text entry to drop-down to prevent arbitrary script execution
* more code cleanup

= 1.0.6 = 
* ported basic NextGEN integration from WP Smush.it (no bulk or re-optimize... yet)
* added extra output for bulk operations
* if the jpeg optimization produces an empty file, it will be discarded (instead of overwriting your originals)
* output filesize in custom column for Media Library
* fixed various PHP notices/warnings

= 1.0.5 =
* missed documentation updates in 1.0.4 - sorry

= 1.0.4 =
* Added trial with -progressive switch for JPGs (jpegtran), thanks to Alex Vojacek for noticing something was missing. We still check to make sure the progressive option is better, just in case.
* tested against 3.4-RC3

= 1.0.3 =
* Allow user to specify PNG optimization level
* Code and screenshot cleanup
* Settings page beautification (if you can think of further improvements, feel free to use the support link)
* Bulk Optimize action drop-down on Media Library - ported from Regenerate Thumbnails plugin

= 1.0.2 =
* Forgot to add Settings link to warning message when tools are missing

= 1.0.1 =
* Fixed optimization level for optipng (-o3)
* Added Installation and Support links to Settings page, and a link to Settings from the Plugin page.

= 1.0.0 =
* First release (forked from CW Image Optimizer)

== Upgrade Notice ==

= 2.8.1 =
* KeyCDN added support for WebP images generated by EWWW I.O. into the Cache Enabler plugin. If you are using Cache Enabler, you may wish to use their WebP option instead of Alt WebP Rewriting. Works very nicely with CDNs and is a nice simple caching plugin.

= 2.8.0 =
* added: resizing for uploaded images, set max width and height and optionally resize all existing images
* changed: settings have been revamped, please check to make sure your settings were migrated properly
* added: PDF optimization introduced (from 2.7 actually)

= 2.5.4 =
* changed: Remove metadata turned on by default, should not affect existing installations/upgrades

= 2.0.0 =
* You must upgrade to this version before uploading JPG images in Wordpress 4.0 to avoid serious quality loss in your resizes

= 1.8.2 = 
* All cloud users must apply this update to avoid service degradation

= 1.8.0 =
* Bulk Optimize page: Import to the custom ewwwio table is mandatory (one time) before running Bulk Optimize, and highly recommended for all users to prevent duplicate optimizations. Optimize More and Bulk Optimize are now on one page.

= 1.7.6 =
* metadata stripping now applies to PNG images, but only if using optipng 0.7.x, you may want to run a bulk optimize on all your PNG images to make sure you have the best possible optimization

== Contact and Credits ==

Written by [Shane Bishop](https://ewww.io). Based upon CW Image Optimizer, which was written by [Jacob Allred](http://www.jacoballred.com/) at [Corban Works, LLC](http://www.corbanworks.com/). CW Image Optimizer was based on WP Smush.it.  
[Hammer](http://thenounproject.com/noun/hammer/#icon-No1306) designed by [John Caserta](http://thenounproject.com/johncaserta) from The Noun Project.  
[Images](http://thenounproject.com/noun/images/#icon-No22772) designed by [Simon Henrotte](http://thenounproject.com/Gizmodesbois) from The Noun Project.
