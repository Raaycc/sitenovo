=== AMO Team Showcase ===
Contributors: amothemo
Donate link: https://www.paypal.me/amothemo
Tags: team, team widget, team member widget, teams, meet the team, meet the staff, team showcase, team grid, staff grid, team shortcode, about us, responsive team, team builder, team profile, members profile, members profiles, team members profile, our team, our staff, team member, team members, team member showcasing, team plugin, responsive team plugin, team member display, wordpress team, members, staff, employees, workers, people, cv, staff bio, member staff, info grid, команда, о компании, о нас, персонал, работники, профиль работника, участник команды, член команды, виджет команды
Requires at least: 4.6
Tested up to: 4.9.1
Stable tag: 1.1.4
Requires PHP: 5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily showcase members of your team/company and their info in sleek, responsive and professional way.

== Description ==
[**Live DEMO**]( http://amothemo.com/amo-team-showcase-demo/ "Live plugin demo")

A powerful but an easy way to present your team/staff members and their profiles with beautifully styled descriptions, skills and links to social media.

The plugin is fully responsive.
Moreover, it is a highly customizable plugin. You can change colors, font sizes, spacings etc. from powerful, yet concise and super easy to use plugin options panel. Choose from 2 different styles for member thumbnails.

The plugin adds “AMO Team” menu section to the admin panel. There you can easily create team members, assign them to categories, add their images, position, bios, skills, social links, set info panel format (image, link, standard or quote) and display them on any post or page, with a simple but powerful “team” or “member” shortcodes. Also there is a widget to show members in a sidebar/widget area.

**Quick Start Video:** (RECORDED WITHOUT SOUND)

https://www.youtube.com/watch?v=MtLALyZwluc

= A few unique features of the plugin: =
* Post formats for team member: image, quote, standard or link.
* Member info panel with styled “text block” and “skills” shortcodes/blocks. Can be turned off.
* 2 different styles for member thumbnails (more are coming).
* Fully and very easily customizable look by options panel.
* The plugin made with an accent on simplicity, and it is easy to use.
* Has a widget to show members in any sidebar/widget area.
* Sleek, clean and modern design.

= Fully Translatable =
* POT file included (/languages/), English.
* RTL languages supported.
* Russian translation included (PO/MO files).

= Usage: =
[**Plugin Documentation**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/ "Plugin documentation, mostly for shortcodes, at the moment.")<br>
The documentation implemented in languages: English and Russian.

= Support the plugin if you like it =
*If you like the plugin or it helped you someway, please leave a [**review**]( https://wordpress.org/support/plugin/amo-team-showcase/reviews/), or make a donation ( [**PayPal**](https://www.paypal.me/amothemo) or [**Yandex.Money**](https://money.yandex.ru/to/410012730758039) ). That will help to keep my interest in its further development and support. Thank you!*

= Support for Users: =
*If you have information about bugs, or maybe some suggestions. Please feel free to ask or tell about them on the [**support forum**]( https://wordpress.org/support/plugin/amo-team-showcase).*

= Files, Sources and Credits =
[**See the list**]( http://amothemo.com/amo-team-showcase-demo/files-and-credits/) of images, fonts, JavaScript / PHP libraries, etc., which are used in the plugin and in its demo.<br>
The person icon in the banner is [designed by Freepik]( http://www.freepik.com ).

== Installation ==
1. Upload the entire `amo-team-showcase` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

You will find 'AMO Team' menu in your WordPress admin panel.


== Frequently Asked Questions ==

= Is there quick start video for the plugin and documentation? =
Yes, there is.
[**Quick Start Video**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/#ds-quic-start "All the essentials one need to know to use the plugin") (recorded without sound).
[**Plugin Documentation**]( http://amothemo.com/docs/amo-team-showcase-documentation/en/ "Plugin documentation, mostly for shortcodes, at the moment.").

= Scrolling in member info panel doesn't work. What to do? =
You can try to enable alternative scrolling. Go to plugin Options -> Panel (tab) and turn on the Alternative Scrolling. Best looks with centered panel.

= How to display team members in a certain order? =
At the moment, there are two ways to do this:<br><br>
**1.** Use "Order" column on All Members/Team Members screen, or use "Order" field on team member editing screen.<br><br> Default order value of a team member is 0, this means there is no special order and it will be sorted/ordered by publication date.<br><br> If we change order value to 1 (for example), the member will be shown before all other members with default order of 0. If we change its order to 3, the member will be shown before all members with order value of 2, 1, 0, -1, etc. Negative numbers are valid (-1). If both members have the same order value (e.g. 4 and 4), then their publication date will also determine their order.<br>

**2.** Use [Team Member](http://amothemo.com/docs/amo-team-showcase-documentation/en/#sc-member) shortcode. The order in which you specified members’ IDs in “id” attribute of the shortcode, for example <code class="code-grey">id="31,10,241"</code>, will be used to display the members.

= When I click on member thumbnail nothing happens, the info panel doesn't appear. =
Probably it's a conflict with some of your other plugins or even with the theme. Try to disable the plugins one by one to find the one that causes the problem.<br>If your theme or some other plugin on your site uses MagnificPopup JS (which AMO Team uses for info panel), there may be a probability (a small one) of MagnificPopup JS conflict.

= The plugin doesn't work or doesn't work properly with my theme, set of plugins, or site, what to do? =
First of all please make sure that you use current / the last version of the plugin.<br><br>
Next, although the plugin has been tested on about 30 themes, I can't say that it will work with any possible theme, plugin, or site configuration, every little thing can not be envisaged.<br>So if it doesn't work for you, first please ask your question on [**support forum**]( https://wordpress.org/support/plugin/amo-team-showcase) (but please check first if such topic already exists there).

== Screenshots ==
1. Team members. Frontend view.
2. Opened info panel of a team member (on mouse click). Frontend view.
3. Plugin options / settings. Admin view.
4. Editing of a team member and his settings. Admin view.
5. List of all team members. Admin view.

== Changelog ==
= 1.1.4 =
* FIXED – Increased CSS z-index value for info panel modal and MagnificPopup overlay. For websites with sticky menu, with big z-index values.
* FIXED – Additional JS fix to prevent conflicts with MagnificPopup.
* FEATURE/FIXED – Now plugin clears/removes all jQuery events for member &lt;a&gt; tags and &lt;ul&gt; container on thumbnail init, to prevent bugs. Can be disabled in plugin options.
* FEATURE – Added new shortcode and widget parameter "orderby" to order members by: date (default), title, modification date, and random order. Works jointly with "Order" field of member.
<br>*(13 Dec, 2017)*

= 1.1.3 =
* FIXED – Now the info panel will work if the site uses some "scroll-to" JS script / plugin or uses MagnificPopup.js (the latter should be fixed in most cases)
<br>*(24 Nov, 2017)*

= 1.1.2 =
* FEATURE – Ability to use/set custom social icon (PNG image).
* FEATURE – Ability to change info / link hover icon to a custom image icon.
* FEATURE – "Order" column for Team Members list, to change order of the members. Order field on editing screen works too.
* FEATURE – Basic support for Polylang and WPML plugins (wpml-config.xml).
* FEATURE – Option to disable hover effect on member thumbnail.
* FIXED – Bootstrap.js conflict (backend).
* DEV – Some code refactoring.
* DEV – Changed HTML structure and CSS classes of member thumbnails (frontend), to fix and prevent bugs.
<br>*(19 Nov, 2017)*

= 1.1.0 =
* FEATURE – Ability to open link in the same browser tab or in new one, for the Link post type.
* FIXED – Hover animation for member thumbnails (Style 1) in current version of Chrome.
<br>*(10 May, 2017)*

= 1.0.9 =
* FIXED – Div structure bug, which caused duplicated hidden content, and also severe layout bugs with some themes.
<br>*(27 Mar, 2017)*

= 1.0.8 =
* FEATURE – Alternative scrolling for member info panel.
* FEATURE – Added new "Style 1.1" variation of "Style 1".
* FIXED – A bunch of small CSS fixes, and a few little PHP and JavaScript fixes too.
<br>*(01 Mar, 2017)*

= 1.0.7 =
* FIXED – All the images in member info panel were replaced by the member image (image post type).
* FIXED – Plugin used WordPress reading settings (for posts) to determine max number of members to output with “Member” shortcode.
* FEATURE – Added widget – “AMO Team Members”.
<br>*(15 Feb, 2017)*

= 1.0.6 =
* FEATURE – Ability to choose alignment for title & subtitle block of member thumbnail, left or right. Plugin Options.
* FEATURE – Ability to load member image in the info panel (image post type) along with the page or on mouse hover over the member thumbnail (on click on mobile). Plugin Options.
* TWEAK – Ability to place shortcodes inside “Text Block” shortcode.
* TWEAK – Display "WP version" and "Regenerate Thumbnails" plugin's notices only on plugin activation, and not on update.
* DEV – Added a filter to hook to output of dynamic (compiled from plugin’s options) CSS.
* DEV – Added a few more social media icons and a generic site icon.
<br>*(08 Feb, 2017)*

= 1.0.5 =
* DEV – Now compiled / dynamic CSS is generated and new plugin options are merged with existing ones on plugin activation / update.
* DEV – Added a notice on required WP version for the plugin.
* DEV – Added loading animation for AJAX actions/events in admin part of the plugin.
* DEV – code refactoring related to admin part of the plugin
* FIXED – Prevented deletion of attachments / images info from database on plugin uninstall ( when “Delete Custom Post Type” option is enabled)
* FIXED – Small CSS fixes for member info panel
* FEATURE – Social icons in Team Member settings have become sortable now.
* DEV/LOCALIZATION  – RTL languages are now supported
<br>*(01 Feb, 2017)*

= 1.0.3 =
* FIXED – Wrong links to the documentation from plugin screens, the function responsible for that now has information about languages available in documentation (English, Russian).
* FIXED – Wrong compiled / dynamic CSS file was shipped with the plugin. (Uploaded it earlier without changing plugin's version.)
<br>*(29 Jan, 2017)*

= 1.0.2 =
* FIXED (CSS) – Now info panel shortcodes (Text block and Skills) look properly, not only in info panel but in post/page content too.
* FIXED (CSS) – A few little CSS fixes for shortcodes.
* FEATURE - Added 2 new settings in the plugin options: Title and subtitle font size settings for info panel shortcodes (currently Skills and Text block).
* TWEAK - “Team Member” shortcode, members ordering fix. Now members are ordered in the same order as they specified in the shortcode’s id=”” attribute / parameter.
<br>*(26 Jan, 2017)*

= 1.0.0 =
* Initial release *(23 Jan, 2017)*.