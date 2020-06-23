<?php

use SilverStripe\CMS\Model\SiteTree;

class Page extends SiteTree {

	private static $db = [];

	private static $has_one = [];
	
	public function getCMSFields(){	
		$fields = parent::getCMSFields();		
		return $fields;
	}
	
	/**
	 * Get this model's controller
	 * @return obj
	 */
	public function MyController(){
		$class = $this->ClassName . "Controller";
		$controller = new $class($this);
		return $controller;
	}
}

