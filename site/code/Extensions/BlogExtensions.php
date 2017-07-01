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
}