<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;
use SilverStripe\Control\Email\Email;
use SilverStripe\CMS\Controllers\ContentController;

class PageController extends ContentController {

	private static $allowed_actions = [];

	/**
	 * When we initialize this controller
	 * This happens during the birth of the universe
	 **/
	public function init() {	
		parent::init();

		//Requirements::javascript(THIRDPARTY_DIR.'/jquery/jquery.js');
		
		// global compiled javascript
		if( Director::isLive() ){
			Requirements::javascript('app/production/index.min.js');
		}else{
			Requirements::javascript('app/production/index.js');
		}
		
		// global css (compiled scss)
		if( Director::isLive() ){
			Requirements::css('app/production/index.min.css');
		}else{
			Requirements::css('app/production/index.css');
		}

		Requirements::css("https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i|Open+Sans:400,400i,700,700i");
	}

	function RandomExcerpt(){
		if($Excerpt = Excerpt::get()->Sort('RAND()')->First()){
			return $Excerpt;
		}
	}

}