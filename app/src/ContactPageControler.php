<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\FieldType\DBHTMLText;

class ContactPageController extends PageController { 

    private static $allowed_actions = [
		'ContactForm',
		'submitted'
    ];

    public function init(){
        parent::init();
    }
	
	function ContactForm(){

		$params = $this->request->params();
		
		if($params['Action'] == 'submitted'){
		
			return DBHTMLText::create()->setValue($this->OnCompletionMessage);
			
		}else{
	
			$fields = new FieldList(
				new TextField('Name', 'Name'),
				new EmailField('Email', 'Email'),
				new TextareaField('Message', 'Message'),
				new HiddenField('ContactPageID', null, $this->ID)
			);
			
			$actions = new FieldList(
				new FormAction('doContactForm', 'Send')
			);
			
			// Validate required fields
			$validator = new RequiredFields('Name', 'Email', 'Message');
			
			$form = Form::create($this, 'ContactForm', $fields, $actions, $validator)->addExtraClass('contact-form');
			$form->enableSpamProtection();
			
			return $form;

		}
	
	}
	
    function doContactForm($data, $form) {

    	// create form submission record
		$Submission = FormSubmission::create();
		$Submission->URL = $this->Link();
		$Submission->Payload = json_encode($data);
		$Submission->OriginID = $this->ID;
		$Submission->OriginClass = $this->ClassName;
		$Submission->write();
		$Submission->SendEmails();
		
        $this->redirect($this->Link('submitted'));
    }
	
	/***
	* Send email
	**
	function EmailAdmin($submission){
	
		if( !empty($this->FromName) ){
			$FromName = $this->FromName;
		}
		else{
			$FromName = $this->SiteConfig()->Title.' contact form';
		}

		$from = $this->FromEmail;
		$to = $this->ToEmail;
		//$to = Email::setAdminEmail();
		$subject = 'A new submission has been received from '.$FromName;
		$body = '';
		
		$email = Email::create($from, $to, $subject, $body);
    	$email->setHTMLTemplate('Email\\Email');
    	$email->setData($submission);
    	$email->send();
		
	}*/
	
}