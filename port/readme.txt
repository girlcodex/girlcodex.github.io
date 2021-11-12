=== 3D WP Tag Cloud-S ===

Contributors: hityr5yr, biskobe
Tags: tag cloud, 3D, widget, shortcode, HTML5, canvas, cloud, tags, images, multiple shapes
Requires at least: 4.8
Tested up to: 4.8.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl.html


3D WP Tag Cloud-S draws and animates an HTML5 canvas based tag cloud. 


== Description ==

This is a Single Cloud variant of 3D WP Tag Cloud. It Creates multiple instances widget that draws and animates an HTML5 canvas based tag cloud. Plugin may rotate 16 types of content:

Pages, Recent Posts, External Links (blogroll), Menus, Blog Archives, List of Authors, Current Page/Post Links, Links from a custom HTML container, Post Tags, Post Categories, 
Portfolio Categories, Portfolio Items, Portfolio Filters, Slider Categories, Slider Items and Accordions. 

It Supports 91 shapes: 

A CUSTOMER DEFINED, letter A, parabolic ANTENNA, APPLE-1, APPLE-2, AXES, lighthouse BEAM, BALLOON, BALLS, BLACKHOLE, BLOSSOM, BOWTIE, BULB, BUTTERFLY, CANDY, CAPSULE, concentric CIRCLES, 
CROWN, CUBE, CYLINDER that starts off horizontal, CYLINDER that starts off vertical, DANCERS, DIAMINITY, DIAMOND, DNA that starts off horizontal, DNA that starts off vertical, DOMES, 
EARING, EGG, EGG BOX, EXCAVATOR, Christmas FIR, FISH-1, FISH-2, GLASS, GLOBE of rings, HEART, HEXAGON (bee cell), INFINITY-1, INFINITY-2, INSECT, KNOT, LEMON, LISSAJOUS, LOVE, letter M, 
MÖBIUS FAN, MONSTER, letter N, letter O, OWLISH, PEARISH, PEG TOP that starts off horizontal, PEG TOP that starts off vertical, PILLOW, PYRAMID (tetrahedron), RING that starts off 
horizontal, RING that starts off vertical, RINGS knotwork, ROLLER of rings, RIM, ROUNDABOUT, SANDGLASS, SATURN, SPHERE, SPIRAL, SPRING, SQUARE, STAIRCASE, STAR-1, STAR-2, STARWARS-1, 
STARWARS-2, STARWARS-3, STARWARS-4, STOOL, TEARDROP, TIRE, TORUS, TOWER of rings, TRIANGLE, UFO, letter V, letter W, WALL-E'S EYES, WALNUT, WINGS, letter X, letter Y, YIN YANGISH and 
letter Z(S). 


See examples here: http://peter.bg/archives/7373


3D WP Tag Cloud-S requires at least WP 4.8 and possesses following Main Features:

- Allows adding tag clouds via Shortcode.
- Supports multiple shape selection for automatic shape transitions during rotation.
- Alows different ways of tags distribution on a shape (option 'Magic') and supports multipe magic selection for automatic transitions during rotation.
- Able to rotate clouds around all three axes.
- Option values are preset and don't have to be typed but selected.
- Multiple fonts, multiple colors and multiple backgrounds can be applied to the cloud content.
- Full variety of fonts from Google Font Library is available.
- Allows creating clouds of images.
- In case of Recent posts, Pages, Menu, List of Authors, External Links (blogroll), Current Page/Post Links and Custom HTML container tags may consist of both image and text.
- Gives an option to put images and/or text in the center of the cloud. - Accepts background images as well.
- The Number of tags in the cloud is adjustable.
- Allows showing number of posts in a category tag and number of posts where a post tag is used.
- Automatically includes WP Links panel for users who started using WP since v 3.5, when Links Manager and blogroll were made hidden by default.
- Uses Graham Breach's Javascript class TagCanvas v. 2.9 and includes all of its 80+ options in the Control Panel Settings.


For adding tag clouds outside sidebars via Shortcode:

1. Go to 'Widgets' page of your WP Admin Panel and open the widget. 
2. Set the options for your cloud and save that widget instance in 'Inactive Widgets'.
3. A message with a Shortcode for adding the cloud in a page/post will pop up.
4. Copy & Paste it where you want it to appear.
5. For a later use the Shortcode will be available at the top of that widget instance in 'WIDGET OPTIONS' section.   


== Installation ==

= Manual = 
1. Download the zip file and extract the content. 
2. Upload the '3D WP Tag Cloud' folder to your plugins directory (wp-content/plugins/).
3. Login to your WordPress Admin menu, go to 'Appearance > Widgets' and if required enable accessibility mode in 'Screen Options' (right top corner).
4. Add a widget instance.

= Automatic =
1. Use WordPress' built-in installer and activate the plugin.
2. Go to 'Appearance > Widgets' and if required enable accessibility mode in 'Screen Options' (right top corner).
3. Add a widget instance.


== Changelog ==

= 5.3.4 =
1. Improved algorithm of tag canvas sizing on mobile devices.

= 5.3.3 =
1. Fixed a minor bug in Shape dropdown menu.

= 5.3.2 =
1. Fixed a bug related to WP 4.8 Compatibility.

= 5.3.1 =
1. Made WP 4.8 Compatible.

= 5.3 =
1. Added 'Max' value in widget's 'Width' & 'Height' options, which set widget's width & height to the user's inner window width & height.

= 5.2.1 =
1. Extended Range of font sizes.

= 5.2 =
1. Clouds are made responsive to mobile devices.

= 5.1 =
1. Added link to plugin's YouTube Tutorial Channel in GUIDE & TIPS section.
2. Made compatible with latest Graham Brich's JS TagCanvas v. 2.9: 
- Added "marching ants" outline effect. 
- Added "tag" and "tagbg" outline color options. 
- Added "outline" Weight Method. 
- Added smooth pulsation for "size" Outline Method.
3. All font lists show the way text will look like.
4. Added 0 value for Maximal number of post tags to display, which loads all tags.
5. Fixed bugs in color & background Weight Methods.
6. Fixed bugs in Authors weighting algorithm.
7. Some code improvements have been made and some discrepancies in tips section have been clarified.

= 5.0.1 =
1. WP 4.4.2 Compatible.

= 5.0 =
1. Added Shortcode support: Tag clouds can be included in pages and posts via generated Shortcode.
2. Added 47 new shapes: A, Apple-1, Apple-2, Balloon, Blackhole, Bowtie, Butterfly, Dancers, Diaminity, Diamond, Earing, Egg Box, Excavator, Fish-1, Fish-2; Infinity-1, Infinity-2, 
Insect, Lissajous, M, Möbius, Monster, N, O, Owlish, Pearish, Pillow, Rim, Roundabout, Star-1, Star-2, Starwars-1, Starwars-2, Starwars-3, Starwars-4, Teardrop, Torus, UFO, V, W, 
Wall-E's Eyes, Walnut, Wings, X, Y, Yin Yangish and ZS.
3. Added a new "Magic" option for repositioning of tags over a shape.
4. Fixed a bug in "Cube" shape function.
5. Fixed bug in loading the default shape when no shape is selected.
6. Code improvements.

= 4.8 =
1. Added a new shape: DNA that starts off horizontal.
2. Added an option for showing number of posts in a category.
3. Added an option for showing number of posts where a post tag is used.
4. Expanded scope of Canvas size up to 1920x1920 px.
5. Plugin description was simplified.

= 4.7.3 =
1. A small PHP bug in multiple fonts loading has been fixed.

= 4.7.2 =
1. Added automatic reminder to the site administrator after installation of new version to open and save the old Widget Instances for making them compatible if necessary.
2. Added instructions in 'GUIDE & TIPS > Cloud Content Tips' section on how to put Portfolio Categories, Portfolio Items, Portfolio Filters, Slider Categories and/or Slider Items into 
the cloud via Menus content type.

= 4.7.1 =
1. Extended Range of Border Radius and Outline Radius to 61 (the range of Image Radius).

= 4.7 =
1. Added Image Radius option for rounding off image corners.
2. Added Scroll Pause option for pausing animation during page scroll.
3. Updated to Graham Breach's Javascript class TagCanvas v. 2.8.

= 4.6.3 =
1. Added a Target option for opening tag links in a new tab/window, parent or top frame to the rest content types, namely: Archives, Categories, Menu, Page/Post Links and Post Tags.

= 4.6.2 =
1. Added a Target option for opening tag links in a new tab/window, parent or top frame. Available to Authors, Blogroll, Pages and Recent Posts.

= 4.6.1 =
1. Prevented Firefox from showing an error when image_cf() is selected without supplying an image URL for it.

= 4.6 =
1. Added new shape: Crown.
2. Extended range of some Number of tags options.

= 4.5 =
1. Added new shape: Saturn.

= 4.4 =
1. Added multiple shape selection and fadein-fadeout shape transitions during rotation.
2. Added an option for usage of a customer defined shape.
3. Added new shape: Domes.
4. Improved shapes Glass and Sandglass.

= 4.3 =
1. Added a new shape: DNA.
2. Added an option for usage of custom shapes.
3. Added an option for Minimal Number of Tags in the Cloud.
4. Added an option for Repeating of Tag List.
5. Added Pinch Zoom of the cloud for touch screens.
6. Improved Balls Shape function.
7. Updated to Graham Breach's Javascript class TagCanvas v. 2.7.

= 4.2 =
1. Added new types of content: Current Page/Post Links and Custom HTML container (div, table, ul etc.).
2. Added new shapes: Rings Knotwork and Love.
3. Extended range of Radius X, Radius Y and Radius Z.
4. Fixed small bugs in Control Panel.

= 4.1 =
1. Added new shape: 3D spiral.
2. Fixed bug in Blossom Shape.

= 4.0.1 =
1. Fixed bug in Center Function for text.

= 4.0 =
1. Added new shapes: 3D axes, Balls, Blossom, Bulb, Christmas fir, Candy, Capsule, Concentric circles, Cube, Egg, Glass, Globe of rings, Heart, Knot, Lemon, Lighthouse beam, Parabolic 
antenna, Peg top that starts off horizontal, Peg top that starts off vertical, Roller of rings, Sandglass, Square, Stool, Starecase, Tire, Tower of rings, Triangle and Triangle pyramid.
2. Added new tips.
3. Extended range of some size options.
4. Fixed bug in Center Function for images.
5. Fixed small bugs.

= 3.4 =
1. Added rotation around z-axis and an option for setting its speed.
2. Improved algorithm of hexagon 2D shape.

= 3.3 =
1. Added two new 2D shapes: spiral and hexagon.

= 3.2.2 =
1. Fixed bug in switching off Wheel Zoom.

= 3.2.1 =
1. The minimal values of Radius X, Radius Y & Radius Z are shifted to zero so clouds could be one or two dimensional.
2. Expanded scope of Canvas Height (90px - 960px): now Tag Cloud could be used as Header/Footer menu or Leaderboard Banner (728x90).
3. Reduced step between Depth values for precise setting of perspective.
4. Reduced step between Initial values for precise control of speed.
5. Fixed bug in HEX check of entered colors.

= 3.2 =
1. Entirely redesigned Fonts section. Selection of Web Safe Fonts and Google fonts is simplified by two combo-boxes. Single or multiple fonts now can be selected rather than entered 
via keyboard.
2. Automatic update of Google Fonts List from Google Font Library.
3. Small code improvements.

= 3.1 =
1. Added a new feature for Recent posts, Pages, Menu Items, List of Authors and External Links (blogroll): Support for mixed image/text tags and choice of image, text or both. 
2. Added text and image alignment options.
3. Added an option to enable/disable a "No tags" message when there are no tags to display.
4. Added an option for limiting number of Pages that can be rotated in the cloud.
5. Updated to Graham Breach's Javascript class TagCanvas v. 2.6.1.
6. Added new tips in Help section.
7. Fixed bug in freezing animation till next page loads.
8. Made some code improvements.

= 3.0 =
1. New option for adding background image behind cloud's content.
2. New function: At a click over a tag animation freezes and starts loading of requested URL.
3. New option for excluding tags from a cloud when its content consists of Authors.
4. Automatic including of WP Links panel for users who started using WP after v 3.5 when Links Manager and blogroll were made hidden by default.
5. Added User Guide in Help Section.
6. Added new tips in Help Section.
7. Added two ready made Central Functions for putting image or text in the center of the cloud.
8. Redesigned Control Panel: All settings are preset and thus option values don't have to be typed, but selected. Entered colors are shown next to their value for user's convenience.
9. Fixed bug in Multiple Fonts.
10. Code Improvements.

= 2.3 =
1. Resolved problem with conflict between different js libraries used by customers: Due to such conflict some customers were not able to create 3D Tag Clouds.
2. Changed the way Central Function section was functioning: Till now the new versions used to delete already created functions, because they were kept in a plugin's file. 
Now customers put their functions away from the plugin.

= 2.2.3 =
1. Installation clarifications.
2. Code improvements.
3. New tips added.

= 2.2.2 =
1. Fixed bug with Control Panel interface.
2. Fixed a bug in Google Font check.

= 2.2.1 =
1. Fixed bug with Control Panel interface.

= 2.2 =
1. Changed the way Web Safe Fonts are inserted: Now user can choose Web Safe Font without typing its name. For Google Font there is a separate field.
2. Fixed a bug in Google Font check.
3. Improved Gradient Interface.

= 2.1.1 =
1. Fixed bug in multiple coloring.
2. Improved help for Gradient Colors.
3. Added tips in Help Section.

= 2.1 =
1. New types of Cloud Content added: Archives (monthly, limit option), Authors (incl/excl Admins, limit option) and Pages.
2. New Option added: Multiple Colors. Now tags in the cloud may be motley.
3. New Option added: Multiple Backgrounds. Now tag's backgrounds may be pied.
4. New Option added: Multiple Fonts. Now Cloud Tags may be with different fonts.
5. Redesigned Gradient Colors option: Previous automatic one was not able to give clearly distinguishable colors. Now gradient depends on user's wish.
6. Redesigned Help Section for better convenience in use.
7. Fixed a bug in tags coloring.

= 2.0.1 =
1. During upload of v. 2.0 some files were missed.Small amendments in Description are made.

= 2.0 =
1. Multiple widget instances.
2. Extended cloud content with Recent Posts, External Links and Menu Items.
3. Full variety of fonts from Google Font Library.
4. All 70+ setting options of Graham Breach's Javascript class TagCanvas v. 2.5.
5. Adjustable number of external links in the cloud.
6. Usage of images instead of text in the cloud.
7. Possibility to put images and/or text in the center of the cloud.
8. New convenient Control Panel for plugin settings.
9. Tooltips for all settings and help section.
10. New plugin's name.

= 1.1 =
1. Two more options added: 1. Taxonomy. Now My WP-TagCanvas works with:
- Post Tags [default],
- Categories, or 
- Both mixed.
2. Number of Tags. By default it is 45, but it can be any number.

= 1.0 =
The First Version.