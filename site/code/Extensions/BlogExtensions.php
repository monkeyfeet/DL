<?php
class BlogExtension extends DataExtension {

	/**
	 * @param  FieldList $fields	 
	 */
	public function updateCMSFields (FieldList $fields) {
		if($grid = $fields->dataFieldByName('Categories')) {
			$grid->getConfig()->addComponent(new GridFieldOrderableRows());
		}
	}

}

class BlogCategoryExtension extends DataExtension {
	/**
	 * @var array
	 */
	private static $db = array (
		'Sort' => 'Int'
	);
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