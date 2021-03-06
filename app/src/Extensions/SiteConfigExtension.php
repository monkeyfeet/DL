<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextareaField;

class SiteConfigExtension extends DataExtension {

	static $db = [
		'SendEmailsTo_Email' => 'Text',
		'SendEmailsFrom_Name' => 'Text',
		'SendEmailsFrom_Email' => 'Text'
	];
	
	public function updateCMSFields(FieldList $fields){	
	
        $fields->addFieldToTab(
        	'Root.Emails', 
        	TextareaField::create('SendEmailsTo_Email','Admin "To" email address(es)')
				->setDescription('Email addresses for deliver of global admin emails eg, contact form submissions etc.<br/>Can be comma-separated list.')
		);

		$fields->addFieldToTab(
        	'Root.Emails', 
        	TextField::create('SendEmailsFrom_Email','Admin "From" email address')
				->setDescription('Email addresses for global admin emails to come "From"')
		);
		$fields->addFieldToTab(
        	'Root.Emails', 
        	TextField::create('SendEmailsFrom_Name','Admin "From" email name')
				->setDescription('Name for global admin emails to come "From"')
		);

	}

}