<?php

class XMLSitemap extends Page{

	private static $allowed_children = 'none';
	private static $description = 'Adds an XML sitemap generated from the site tree';
	private static $icon = 'sitemap/images/sitemap.png';
	
	private static $db = array(
	);

	private static $has_one = array(
	);
	
	private static $defaults = array(
		'ShowInMenus' => 0,
		'Sort' => 10001
	);

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');
		return $fields;
	}
	
	/**
	 * Add default record to database
	 *
	 */
	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		
		// if xml sitemap page does not exist
		if($this->class == 'XMLSitemap' && $this->config()->create_default_pages) {
			if( !SiteTree::get_by_link('sitemap') ){
				$XMLSitemap = new XMLSitemap();
				$XMLSitemap->Title = 'XML Sitemap';
				$XMLSitemap->Content = '';
				$XMLSitemap->URLSegment = 'sitemap';
				$XMLSitemap->write();
				$XMLSitemap->publish('Stage', 'Live');
				$XMLSitemap->flushCache();
				DB::alteration_message('Sitemap XML page created', 'created');
			}

		}

	}


}

class XMLSitemap_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
		
		// update xml file when url is visited
		$this->UpdateXMLFile();
	}
	
	/**
	 * Update xml file when this page is viewed
	 **/
	function UpdateXMLFile(){
		
		// get the value of the XMLSitemap page
		$xml = $this->GetXMLValue();

		// get link to xml file to be created/updated in site root
		$file = BASE_PATH . '/sitemap.xml';
		$fp = fopen($file, "w");
		// prepend xml tag to result (gets excluded from curl)
		/*$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= $xml;*/
		
		// write xml file
		fwrite($fp, $xml);


	}
	
	/**
	 * Get the value of this page
	 * Render with template
	 **/
	function GetXMLValue(){
		return $this->renderWith('XMLSitemap')->Value;
	}

}