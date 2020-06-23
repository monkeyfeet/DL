<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Control\Controller;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class BlogExtension extends DataExtension {

	/**
	 * @param  FieldList $fields	 
	 */
	public function updateCMSFields (FieldList $fields) {
		if($grid = $fields->dataFieldByName('Categories')) {
			$grid->getConfig()->addComponent(new GridFieldOrderableRows());
		}
	}

	function CategoriesLinkingMode(){
		
		// get params
		$params = Controller::curr()->request->params();
		
		// if we're viewing a category, the base is not "current"
		if(isset($params['Action']) && $params['Action'] == 'category'){
			if(isset($params['ID'])){
				return 'link';
			}
		}
		
		// default to current
		return 'current';
		
	}

}

class BlogCategoryExtension extends DataExtension {
	/**
	 * @var array
	 */
	private static $db = [
		'Sort' => 'Int'
	];
	/**	 
	 * @var string
	 */
	private static $default_sort = 'Sort ASC';

	function LinkingMode(){
		
		// get params
		$params = Controller::curr()->request->params();
		
		// if we're viewing this category, it's current
		if(isset($params['Action']) && $params['Action'] == 'category'){
			if(isset($params['ID']) && $params['ID'] == $this->owner->URLSegment){
				return 'current';
			}
		}
		
		// default to link
		return 'link';
		
	}
}