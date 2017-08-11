=== Plugin Name ===
Contributors: polyplanet
Donate link: http://example.com/
Tags: eduPort, LOGINEO
Requires at least: 4.0
Tested up to: 4.5
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin provides an easy way to embedd the eduPort-Button to your WordPress website.

== Description ==

eduPort is the name for the school access portal of general schools in Hamburg / Germany. 
For more information about the projekt visit [https://eduport.hamburg.de/](https://eduport.hamburg.de/).

This Plugin provides an easy way to embed the eduPort-Flyout on your WordPress site.
The Flyout can be included on every page of your website or just on dedicated pages or posts.

There is a documentation of all configuration-options in the [support portal](http://support.bsbhh.de/hc/de/sections/201909785)

The plugin comes with a German and Formal German localization. 

The eduport plugin is maintained by [POLYPLANET](http://polyplnaet.de). The source code can 
be found in the [eduPort Repository on Bitbucket](https://bitbucket.org/polyplanet/eduport-flyout).


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Read about the configuration-options on the [support portal](http://support.bsbhh.de/hc/de/sections/201909785)
3. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= How to configure the plugin? =

Read about the configuration-option on the [support portal](http://support.bsbhh.de/hc/de/sections/201909785)

= How to get an eduPort-account? =

Visit [https://eduport.hamburg.de](https://eduport.hamburg.de).

= I found a bug and fixed it. How can I let You know? =

Please fork the [Bitbucket Repository](https://bitbucket.org/polyplanet/eduport-flyout)
and send us a pull request.

= I want to translate the eduPort flyout to a different language. How can I do so? =

[Poedit](https://poedit.net/) (available for Windows, Mac and Linux) provides a convenient
way to edit the translation files. Just open `languages/eduport-flyout.pot`, hit "Create new 
Translation". Finally save the resulting PO-File as `eduport-flyout-xx_XX.po` in the 
`languages/` subdirectory. (With `xx_XX` being the ISO language and country code of your localization.)

Once finished with the translation, send a Pull request containing the PO file to the 
[eduPort plugin Repository at Bitbucket](https://bitbucket.org/polyplanet/eduport-flyout). 

If you are not familiar with git, you can either post a download link to the PO-File
in the [WordPress plugin support forum](https://wordpress.org/support/plugin/eduport-flyout) 
or send it via email to support[at]bsbhh[dot]de. (Writing an email might result in a faster response.)

= I have a question. Will you answer? =

First: Please note that POLYPLANET is solely responsible for the WordPress integration of the eduPort flyout.
Technically spoken, we only load a little Javascript to your Blog and make it configurable.
The flyout itself, how it looks and what it does, is the domain of [someone else](http://www.logineo.de/).

As a result, all Questions regarding the look and feel of the flyout and its underlying functionality 
are not—and will never be—our responsibility. 

All questions on how to use the flyout integration should already be answered in the 
[here](http://support.bsbhh.de/hc/de/sections/201909785).

If you have any further question regarding the WordPress integration that are not covered by 
our [support portal](http://support.bsbhh.de/hc/de), please write an email to support[at]bsbhh[dot]de.

Please don't post your questions in the Support Forum. We will only look sporadically in the support forum.

== Screenshots ==

1. The Eduport Flyout
2. Configuration options

== Changelog ==

= 1.0.2 =
* Set Eduport URL from navi.hamburg-schule.de to navigation.eduport.hamburg.de

= 1.0.1 =
* Introduce filter `eduport_url`
* Introduce filter `eduport_is_active`

= 1.0.0 =
* Initial release

== Upgrade Notice ==

No upgrade notice at this time.
