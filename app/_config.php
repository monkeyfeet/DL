<?php

use SilverStripe\i18n\i18n;
use SilverStripe\ORM\DataObject;

require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');

// Extensions
DataObject::add_extension('SiteConfig', 'SiteConfigExtension');
DataObject::add_extension('Blog', 'BlogExtension');
DataObject::add_extension('BlogCategory', 'BlogCategoryExtension');

// specify log files
// $path = BASE_PATH.'/../logs';
// SS_Log::add_writer(new SS_LogFileWriter($path.'/info.log'), SS_Log::WARN, '<=');
// SS_Log::add_writer(new SS_LogFileWriter($path.'/errors.log'), SS_Log::ERR);

// some commented stiuff