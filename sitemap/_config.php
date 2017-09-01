<?php
define('SITEMAP_BASE', basename(dirname(__FILE__)));

// set cache lifetime to 3 hours
SS_Cache::set_cache_lifetime('sitemap', 60*60*3);

// Extensions
DataObject::add_extension('Page', 'SitemapPageExtension');