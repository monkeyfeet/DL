<?php
class Excerpt extends DataObject {	
		
	static private $db = array(
		'Title' => 'Varchar(255)',
		'Content' => 'HTMLText'
	);
	
	static $summary_fields = array(
		'Title' => 'Title',
		'Content' => 'Content'
	);

	function getCMSFields(){
		return FieldList::create(
			TextField::create('Title', 'Title'),
			TextareaField::create('Content', 'Content')
		);
	}
}