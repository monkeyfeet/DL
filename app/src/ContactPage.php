<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class ContactPage extends Page {

    private static $db = [
        'ToEmail'=> 'Varchar(255)',
		'FromEmail'=> 'Varchar(255)',
		'FromName'=> 'Varchar(255)',
		'ContactDetails'=> 'HTMLText',
		'OnCompletionMessage'=> 'HTMLText'/*,
		'LatLong'=> 'Varchar(255)'*/
	];

    private static $has_many = [
        'Submissions' => 'FormSubmission'
	];
	
	private static $description = 'Basic contact page';
	private static $icon = 'contact/images/contact-page';

    function getCMSFields(){
	
        $fields = parent::getCMSFields();
		
		// ContactDetails tab
		//$fields->addFieldToTab('Root.ContactDetails', new TextField('LatLong', 'Lat/Long coordinates<br/><em>For Google map</em>'));
		$fields->addFieldToTab('Root.ContactDetails', new HTMLEditorField('ContactDetails', 'Contact details'));
		
		// Emails tab
		$fields->addFieldToTab('Root.Emails', new TextareaField('ToEmail', '"To" Email<br/><em>Email addresses to deliver form submissions to. Can be comma-separated list.</em>'));
		$fields->addFieldToTab('Root.Emails', new TextField('FromEmail', '"From" & "Reply-to" Email<br/><em>Displayed in form submission email.</em>'));
		$fields->addFieldToTab('Root.Emails', new TextField('FromName', 'From name<br/><em>Displayed in form submission email. Defaults to "'.SiteConfig::current_site_config()->Title.' contact form".</em>'));
		
		// Submissions tab
        $GridFieldConfig = GridFieldConfig_RecordEditor::create();
        $SubmissionsField = new GridField(
            'Submissions',
            'Submissions',
            $this->Submissions(),
            $GridFieldConfig
        );
        $fields->addFieldToTab('Root.Submissions', $SubmissionsField);
		
		// OnCompletion tab
		$fields->addFieldToTab('Root.OnCompletion', HTMLEditorField::create('OnCompletionMessage', 'Message to show after form submission'));
		
        return $fields;
		
    }

}