<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class Excerpt extends DataObject {	
		
	private static $db = [
		'Title' => 'Varchar(255)',
		'Content' => 'HTMLText'
	];
	
	private static $summary_fields = [
		'Title' => 'Title',
		'Content' => 'Content'
	];

	public function getCMSFields(){
		return FieldList::create(
			TextField::create('Title', 'Title'),
			TextareaField::create('Content', 'Content')
		);
	}
}