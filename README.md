# Enlighter - Customizable Syntax Highlighter #
Contributors: Andi Dittrich
Tags: syntax highlighting, javascript, code, coding, sourcecode, mootools, jquery, customizable, visual editor, tinymce, themes, css, html, php, js, xml, c, cpp, c#, ruby, shell, java, python, sql
Donate link: http://andidittrich.de/go/enlighterjs
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 2.3
License: MIT X11-License
License URI: http://opensource.org/licenses/MIT

Simple post syntax-highlighted code using the EnlighterJS MooTools Plugin.

## Description ##

Enlighter is a free, easy-to-use, syntax highlighting tool for WordPress. It's build in PHP and uses the MooTools(Javascript) based [EnlighterJS](http://andidittrich.de/go/enlighterjs) to provide a beautiful code-appearance.
Using it can be as simple as selecting an editor style or adding shortcode around your scripts which you want to highlight and Enlighter takes care of the rest. An easy to use Theme-Customizer is included to modify the build-in themes **without any css knowlegde!**
It also supports the automatic creation of tab-panes to display code-groups together (useful for multi-language examples - e.g. html+css+js)
A theme demo can be found [here](http://enlighterjs.andidittrich.de/Themes.html "EnligherJS Theme Demo")

### Plugin Features ###
* Support for all common used languages
* Theme Customizer
* Inline Syntax Highlighting
* **Full** Visual-Editor (TinyMCE) Integration
* Easy to use Text-Editor mode through the use of Shortcodes
* Advanced configuration options (e.g. CDN usage) are available within the options page.
* Supports code-groups (displays multiple code-blocks within a tab-pane)
* Outputs in various formats like ordered lists or inline. Choose the method that works best for you.
* Extensible language and theme engines - add your own one.
* Simple CSS based themes
* Integrated CSS file caching (suitable for high traffic sites)
* EnlighterJS is written in MooTools. Requires MooTools v1.4+ (included) and enabled javascript

### Shortcode Quickstart Example ###
Highlight javascript code (theme defined on your settings page)

	[js]
	window.addEvent('domready', function(){
		console.info('Hello Enlighter');
	});	
	[/js]

### Inline Syntax Highlighting with Shortcode ###

	Lorem ipsum dolor sit amet, [js]window.alert('Hello World');[/js] consetetur sadipscing elitr,
	sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.

### Point out special lines of code ###
**Shortcode Style**
Just add the `highlight` attribute with the lines you wish to point out

	[js highlight="2"]
	window.addEvent('domready', function(){
		console.info('Hello Enlighter');
	});	
	[/js]
	
**Visual Editor**
You have to edit the generated html tag by switching to Text-Mode

	<pre class###"EnlighterJSRAW" data-enlighter-language="js" data-enlighter-highlight###"2">
		window.addEvent('domready', function(){
			console.info('Hello Enlighter');
		});
	</pre>	

### Codegroup Example ###
Display multiple codes within a tab-pane. You can define a custom tab-pane title for each snippet if you want.

	[codegroup]
	 	[js tab="Javascript Message"]
		window.addEvent('domready', function(){
			// display string on console
			console.info('Hello Enlighter');
			
			// show element
			$('#myelement').show();
		});	
		[/js]
		
		[html]
		<div id="myelement">
		INITIALIZATION START
		</div>		
		[/html]
		
		[css tab="Styling"]
		#myelement{
			color: #cc2222;
			padding: 15px;
			font-size: 20px;
			text-align: center;		
		}		
		[/css]	
	[/codegroup]

### Legacy Example ###
It's also possible to use the plugin with legacy shortcode (disabled language shortcodes)

	[enlighter lang="js"]
	window.addEvent('domready', function(){
		// display string on console
		console.info('Hello Enlighter');
		
		// show element
		$('#myelement').show();
	});		
	[/enlighter]


### Supported Languages (build-in) + Shortcodes ###
* **HTML** [html]
* **CSS** (Level 1, 2, 3) [css]
* **XML** [xml]
* **Javascript** [js, javascript]
* **Java** [java]
* **Markdown** [md]
* **PHP** [php]
* **Python** [python]
* **Ruby** [ruby]
* **Shellscript** [shell]
* **C** [c]
* **C++** [cpp]
* **C#** [csharp]
* **SQL** [sql]
* **NSIS** [nsis]
* **RAW Code** [raw]
* **Unhighlighted Code** [no-highlight]

### Available Translations (I18n) ###
* **English** (default)
* **German** (de_DE by Andi Dittrich)
* **Serbo-Croatian** (sr_RS by Borisa Djuraskovic from webhostinghub.com)
 
### Related Links ###
* [Enlighter Plugin on GitHub](https://github.com/AndiDittrich/WordPress.Enlighter)
* [EnlighterJS Documentation](http://andidittrich.de/go/enlighters)

## Compatibility ##

All browsers supported by MooTools (enabled Javascript required) and with HTML5 capabilities for "data-" attributes are compatible with Enlighter. It's possible that it may work with earlier/other browsers.
Generally Enlighter (which javascript part [EnlighterJS](http://www.a3non.org/go/enlighterjs) is based on [MooTools Javascript Framework](http://mootools.net/)) should work together with jQuery in [noConflict Mode](http://docs.jquery.com/Using_jQuery_with_Other_Libraries) - when you are using jQuery within your Wordpress Theme/Page you have to take care of it!

* Chrome 10+
* Safari 5+
* Internet Explorer 6+
* Firefox 2+
* Opera 9+
    
## Installation ##

### System requirements ###
* PHP 5.3, including `json` functions
* Webbrowser with enabled Javscript (required for highlighting)
* Accessable cache directory (`/wp-content/plugins/enlighter/cache/`) when using the **ThemeCustomizer** or external Init scripts

### Installation ###
1. Download the .zip file of the plugin and extract the content
2. Upload the complete `enlighter` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Goto to the Enlighter settings page and select the default theme which should be used.
5. That's it! You're done. You can select an editor style for your codefragment or enter the following code into a post or page to highlight it (e.g. javascript): `[js]var enlighter = new EnlighterJS({});[/js]` 

## Frequently Asked Questions ##

### I am using shortcodes and random p/br tags are added to my code ###
This problem is caused by WordPress' `wpAutoP` filter - to fix this issue, go to "Enlighter Settings -> Advanced -> WpAutoP Filter Priority" and change this value to "Priority 12 (after shortcode). For cross-plugin-compatibility this feature is disabled by default.

### I can't see any style options within the Visual-Editor-Toolbar ###
You have to enable the full toolbar by clicking on the **Show/Hide Kitchen Sink** button (last icon on the toolbar)

### When using the ThemeCustomizer the Code appears in plain-text ###
The cache-directory `wp-content/plugins/enlighter/cache` have to be writeable, the generated stylesheet will be stored there. Set the directory permission (chmod) to `0644` or `0777`

### Inline Styles are missing within the Visual Editor ###
This feature requires WordPress 3.9 (new TinyMCE Version) - but you can still use shortcodes for inline highlighting! 

### Should i use Shortcode`s or the Visual-Editor Integration ? ###
The use of Shortcode is only recommended when working in Text-Mode. By switching to the Visual-Editor-Mode whitespaces (linebreaks, indents, ..) within the shortcode will get removed by the editor - using Visual-Editor mode will avoid such problems.

### How can i enable the Theme-Customizer ? ###
To enable the Theme-Customizer you have to select the theme named *Custom* as default theme. The Theme-Customizer will appear immediately.

### Is it possible to point out special lines of code ? ###
Yes! since version 1.5 all shortcodes support the attribute ``highlight``.
Shortcode Example: highlight the lines 2,3,4,8 of the codeblock `[js highlight="2-4,8"]....some code..[/js]`
	
### Are the uncompressed EnlighterJS Javasscript and CSS sources available ? ###
The complete EnlighterJS project can be found on [GitHub](https://github.com/AndiDittrich/EnlighterJS "EnligherJS Project")

### Can i add custom Themes ? ###
Yes you can! - The simplest way is to download the [EnlighterJS CSS sources](https://github.com/AndiDittrich/EnlighterJS/tree/master/Source/Themes "EnligherJS Project") and modify one of the standard themes.

### I'am already using MooTools and my page throws Javascript-Errors ###
If you are already using MooTools on your page, you have to disable the automatic inclusion of MooTools by Enlighter. Goto the Enlighter options page -> Advanced and select "Not include" as MooTools source. 
**Note:** EnlighterJS requires MooTools > 1.4

### Security Vulnerabilities ###
In case you found a security issue in this plugin - please write a message **directly** to [Andi Dittrich](http://andidittrich.de/contact) (andi DOT dittrich AT a3non DOT O R G) - __**DO NOT POST THIS ISSUE ON GITHUB OR WORDPRESS.ORG**__ - the issue will be public released if it is fixed!

### I miss some features / I found a bug ###
Write a message to [Andi Dittrich](http://andidittrich.de/contact) (andi DOT dittrich AT a3non DOT O R G) or open a [New Issue on GitHub](https://github.com/AndiDittrich/WordPress.Enlighter/issues)

## Screenshots ##

1. CSS highlighting Example (GIT Theme)
2. Visual Editor Integration
3. Visual Editor Code Settings
4. Visual Editor Inline/Block Formats
5. Options Page - Appearance Settings
6. Options Page - Advanced Settings
7. Theme Customizer - General styles
8. Theme Customizer - Language Token styling
9. Special options for use with a CDN (Content Delivery Network)
10. Tab-Pane Example (multiple languages)

## Changelog ##

### 2.3 ###
* Added insert-option for "Align-Left-Indentation" - all leading tabs got replaced by spaces and the minimum indent is removed from each line - this is a usefull feature when pasting code-snippets (the "Code-Indent" option has to be set to n-Spaces!)
* Added insert-option "block/inline" to easily insert inline code - feature requested on [WordPress Forums](http://wordpress.org/support/topic/code-indent-removed-by-wordpress-editor?replies=9#post-5652635)
* Added cache-directory check to ensure that it's writeable as well as a `Autofix` function which automatically set's the permissions of the cache-directory on user request (+w for user + group).
* Added Language-Type "generic" to selection menu
** Added EnlighterJS 2.3
* Added Theme "Classic"
* Added Theme "Eclipse"
* Added Theme "Beyond"
* Added Language "Diff" for changelogs
* Added: License Informations to settings-page footer
* Added: Info of available CDN locations (full url)
* Added: Additional user-role check (administrator + `manage_options` required)
* Added: [Contextual Help](http://codex.wordpress.org/Adding_Contextual_Help_to_Administration_Menus) based help/usage/informations
* Added: Checks the availability of the EnlighterJS library before initializing - this will avoid errors caused by missing scripts
* Added: Option to include the required javscript config as external file, within wp_footer or wp_head
* Added: Support for external/custom EnlighterJS Themes - feature requested on [WordPress Forums](https://wordpress.org/support/topic/install-new-theme-2)
* Updated MooTools (local+CDN) to v1.5.1
* Removed Setting "Config-Type" - Javascript based initialization is now used
* Changed the `wpAutoP` filter priority back to 10 as default (no changes) - this will [avoid conflicts with other plugins](https://wordpress.org/support/view/plugin-reviews/enlighter?filter=2) - in case you are using shortcodes, you should set it to 12
* Changed: some setting keys got renamed, especially the toolbar buttons - please check your settings
* Bugfix: Theme-Customizers CSS cache got removed on plugin upgrade - added automatical CSS recreation/cache check
* Bugfix: Entities didn't got escaped by using the "Code Insert Dialog" - thank's to [nextchi on GitHub](https://github.com/AndiDittrich/WordPress.Enlighter/issues/6) and [Mathias on WordPress Forums](https://wordpress.org/support/topic/html-indention-not-working-as-it-should)
* New settings page - now matches WordPress corporate UI style
* Removed WordPress <= 3.7 compatibility mode/legacy UI style
* Bugfix: Added some missing I18n namespaces
* Many internal changes/improvements

### 2.2 ###
* Added "Code Insert Dialog" to avoid copy-auto-formatting issues - feature requested on [WordPress Forums](http://wordpress.org/support/topic/code-indent-removed-by-wordpress-editor?replies=9#post-5652635)
* Added "Enlighter Settings Button" to control the Enlighter Settings (highlight, show-linenumbers, ..) directly from the Visual-Editor - just click into a codeblock and the button will appear (requires WordPress >=3.9)
* Added Enlighter Toolbar Menu-Buttons
* New Visual-Editor integration style
* Bugfix: Added missing codeblock-name for "C#"

### 2.1 ###
* Added EnlighterJS 2.2
* Added language support for C# (csharp) [provided by Joshua Maag](https://github.com/joshmaag)
* Bugfix: Indentation of first line got lost - thanks to [cdonts](http://wordpress.org/support/topic/no-indentation-in-the-first-line?replies=2)

### 2.0 ###
* Added EnlighterJS 2.1
* Added Inline-Syntax-Highlighting
* Added new Theme "Enlighter"
* Added Inline-Highlighting support to the Visual-Editor
* Added setting "Show Linenumbers"
* Added shortcode attribute "linenumbers" the force the visibility for each codeblock - feature requested on [GitHub](https://github.com/AndiDittrich/WordPress.Enlighter/issues/1)
* Added shortcode attribute "offset" to set the start-index of line-number-counting - feature requested on [WordPress Forums](http://wordpress.org/support/topic/feature-request-initial-start-line-number?replies=2)
* Added Inline-CSS-Selector setting
* Added an optional "raw-code-button" as well as customization options for the appearing Raw-Code-Panel
* Added build-script to generate Theme-Templates required by the ThemeCustomizer directly from the CSS files
* Added seperate token settings for "font-style" and "font-weight"
* Improved Theme-Generator: only one CSS file is included instead of two
* Moved option "Language Shortcodes" to "Advanced Options"
* Removed setting "Output-Style" (replaced by Show-Linenumbers)
* Removed waste Theme-Customizer setting "Line Number Styles -> Line height"
* Bugfix: "Loading Theme Style" doesn't set "text-decoration" corretly

### 1.8 ###
* Added: Visual-Editor (TinyMCE) Integration (**optionally** - you can turn it off on the settings page)
* Added: Serbo-Croatian Translation sr_RS (Thank`s to Borisa Djuraskovic from webhostinghub.com)
* Bugfix: Visual-Editor integration will avoid auto-whitespace-removing issues
* Improved: Added new Screenshots

### 1.7 ###
* Added: Environment Pre-Check (PHP 5.3 requirement!)

### 1.6 ###
* Added: Support for new WordPress 3.8 UI design
* Added: CDNJS Service (Cloudfare) as CDN provider for MooTools @see http://cdnjs.com/
* Added: **I18n** (Internationalization) support (settings page)
* Added: I18n generation tools
* Added: POT file for additional translations
* Added: German translation (de_DE)
* PHP Namespaces used to isolate plugin (PHP >= 5.3 required!)
* Improved Plugin backend structure
* Changed: Admin CSS+JS files are moved to ``resources/admin/``
* Changed: Replaced table layout of settings page
* Bugfix: "Load Theme styles" selects wrong items as default style
* Bugfix: ColorPicker elements doesn't get initialized

### 1.5 ###
* Bugfix: The plugin now modifies the priotiry of ``wpautop`` filter to avoid unrequested linebreaks (**optionally** - you can turn it off on the settings page) @see https://github.com/AndiDittrich/WordPress.Enlighter/issues/2 - thanks to **ankitpokhrel**
* Added EnlighterJS 1.8
* Added line based marking to point special lines - just add the attribute ``highlight="1,2-5,9"`` to the shortcode to mark line 1,2,3,4,5,9. The line-color is configurable within the ThemeCustomizer - feature requested on WordPress.org Forum
* Added the ability to set custom hover colors within the ThemeCustomizer as well as custom line highlighting colors
* Improved settings page, new design

### 1.4 ###
* Added EnlighterJS 1.7
* Added Language-Aliases for use with generic shortcode
* Fix: CSS Hotfix for bad linenumbers in Chrome @see http://wordpress.org/support/topic/bad-line-numbers-in-chrome?replies=3 - thanks to **cdonts**

### 1.3 ###
* Bugfix: CSS Selector got ignored when using metadata-based initialization (all "pre"-tags are highlighted)
* Added EnlighterJS 1.6
* Added "RAW" language - code is not highlighted/parsed

### 1.2 ###
* Added EnlighterJS 1.5.1
* Added language support for NSIS (Nullsoft Scriptable Install System)

### 1.1 ###
* First public release
* Includes EnligherJS 1.4


## Upgrade Notice ##

### 2.2 ###
Full Visual-Editor (TinyMCE4) Integration including codeblock-settings (WordPress >= 3.9 required)

### 2.0 ###
Added Inline-Syntax-Highlighting as well as some other cool feature - please go to the settings page and click "Apply Settings"

### 1.8 ###
Added Visual-Editor (TinyMCE) Integration (will avoid auto-whitespace-removing issues)
