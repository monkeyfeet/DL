Description
===========

Adds ability to create both HTML and XML versions of a sitemap on silverstripe sites. 
BOth are based off the site tree, with the ability to elect (via a checkbox in the CMS) to exclude any page from the sitemaps.
Default HTML and XML sitemaps are created by running dev/build after installing this module.
Also generates an xml file (sitemap.xml) in root of site, updated on load of the xml sitemap in the sitetree.



Dependencies
============

* SilverStripe 3.1+


Features
============

* Adds HTML and XML versions of a sitemap based on sitetree
* Exclude any page from sitemaps with CMS checkbox (on Settings tab)
* Uses partial caching, refreshed when any page in the sitetree is updated
* Creates/updates an actual sitemap.xml file in the root of the site on load of xml sitemap page


Installation
============

1. Install module
2. Run /dev/build?flush=1
3. Pages can be excluded from sitemap using the checkbox in the Settings CMS tab (under Visibility)
