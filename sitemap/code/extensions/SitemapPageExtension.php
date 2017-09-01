<?php
  
class SitemapPageExtension extends DataExtension {
     
	static $db = array(	
		'ExcludeFromSitemap' => 'Boolean'
    );
     
	public function updateSettingsFields(FieldList $fields) {
		$fields->addFieldToTab("Root.Settings", new CheckBoxField('ExcludeFromSitemap', 'Exclude from sitemap?'), 'ShowInSearch');
    }
	
}