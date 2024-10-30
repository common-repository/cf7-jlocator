=== ContactForm7jLocator ===
Contributors: Daschmi
Donate link: http://daschmi.de/
Tags: contactform7,contactform,form,location,position,gps
Requires at least: 4.6.0
Tested up to: 4.9
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin integrates the jLocator script into a ContactForm7 form.

== Description ==

This plugin integrates the jLocator script into a ContactForm7 form.

== Installation ==

1. Upload to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set your google API Key under Settins -> jLocator
4. Upload the jLocator.js library
5. Check that your page is running on https
6. Set the classes to your Form Elements in your ContactForm7 form Ex.: [text* text-886 class:jLocator class:jLocator_street]
7. Enjoy geolocation

== Frequently Asked Questions ==

= Is there a demo page? =

Yes, [jLocator demo page](https://daschmi.de/jlocator-demoseite-formulare-mittels-jquery-und-geo-positionierung-anhand-aktueller-adresse-fuellen/)

= Is there a sample form with all classes? =

Yes, here:

<blockquote><label>street
 [text* text-886 class:jLocator class:jLocator_street] </label>

 <label>house number
 [text* text-887 class:jLocator class:jLocator_street_number] </label>

 <label>zip
 [text* text-888 class:jLocator class:jLocator_zip] </label>

 <label>ctiy
 [text* text-889 class:jLocator class:jLocator_city] </label>

 <label>district
 [text* text-890 class:jLocator class:jLocator_district] </label>

 <label>state
 [text* text-891 class:jLocator class:jLocator_state] </label>

 <label>country
 [text* text-892 class:jLocator class:jLocator_country] </label></blockquote>

= What do i need =

* You need a google API Key for geoloaction
* The [jLocator](https://daschmi.de/jlocator-positions-und-adressbestimmung-mittels-gps-google-maps-und-jquery/) library
* Secure Origin (https)

== Changelog ==

= 1.0 =
* Initial release