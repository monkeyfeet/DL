<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Director;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\SiteConfig\SiteConfig;

class FormSubmission extends DataObject {
	
	private static $singular_name = 'Form submission';
	private static $plural_name = 'Form submissions';
	private static $description = 'The payload for all contact form submissions';	
	private static $default_sort = 'Created DESC';
	
	private static $db = [
		'URL' => 'Varchar',
		'Payload' => 'Text',
		'IPAddress' => 'Varchar(18)',
		'UniqueID' => 'Text'
	];
	
	private static $has_one = [
		'Origin' => DataObject::class
	];
	
	private static $summary_fields = [
		'Created' => 'Created',
		'URL' => 'URL',
		//'OriginType' => 'Origin',
		'IPAddress' => 'IP Address',
		'UniqueID' => 'UniqueID'
	];

	/**
	 * CMS Fields
	 **/
	public function getCMSFields(){
		$fields = FieldList::create();

		$fields->push(TextField::create('URL','URL'));
		$fields->push(TextField::create('IPAddress','IPAddress'));
		$fields->push(TextField::create('UniqueID','UniqueID'));

		$fields->push(LiteralField::create('html','<br /><h3>Submission data</h3>'));
		$data = json_decode($this->Payload, true);
		foreach ($data as $key => $value){
			if ($key == 'AttendeesData'){
				$fields->push(ReadonlyField::create('Playload_'.$key,$key,json_encode($value)));
			} else {
				$fields->push(ReadonlyField::create('Playload_'.$key,$key,(string)$value));
			}
		}

		return $fields;
	}

	function onBeforeWrite(){
		$this->UniqueID = $this->CreateUniqueID($this->Created);
		parent::onBeforeWrite();
	}

	public function OriginType(){
		if( $this->OriginClass ) return $this->OriginClass;
		if( $this->OriginID <= 0 ) return '-';
		if(isset($this->Origin()->ClassName)) return $this->Origin()->ClassName;
		return 'ContactPage';
	}


	/**
	 * Send emails responding to this submission
	 **/
	public function SendEmails(){
		$config = SiteConfig::current_site_config();

		$data = json_decode($this->Payload);
		$from = 'noreply@divinelaziness.nz';
		$body = '';
		$data->TimeSent = date('Y-m-d H:i:s');
		$data->UniqueID = $this->UniqueID;

		// different sources require different handling
		switch ($this->OriginType()){

			case 'ContactPage':
				// --- ADMIN EMAIL ---
				if( isset($this->Origin()->ToEmail) ){
					$to = explode(',',trim($this->Origin()->ToEmail));
				}else{
					$to = 'jerecole@gmail.com';
				}
				$subject = $config->Title . ' Website contact form submission';
				$data->Title = $data->Name . ' has made an enquiry through the contact form on divinelaziness.com';
				$data->URL = Director::absoluteBaseURL();
				$data->Data = ArrayList::create(array(
					ArrayData::create(array(
						'IsHeading' => true,
						'Value' => 'Details'
					)),
					ArrayData::create(array(
						'Title' => 'Name',
						'Value' => $data->Name
					)),
					ArrayData::create(array(
						'Title' => 'Email',
						'Value' => $data->Email
					)),
					ArrayData::create(array(
						'Title' => 'Message',
						'Value' => $data->Message
					))
				));
				$email = Email::create($from, $to, $subject, $body);
				$email->setReplyTo($data->Email);
				$email->setHTMLTemplate('email/FormSubmission');
				$email->setData( ArrayData::create($data) );
				$email->send();

				break;

			default:
				
				// --- ADMIN EMAIL ---
				$to = 'jerecole@gmail.com';
				$subject = 'Divine Laziness Website form submission';
				$data->Title = $data->Name . ' sent you a message through the website.';
				$email = Email::create($from, $to, $subject, $body);
				$email->setReplyTo($data->Email);
				$email->setHTMLTemplate('Email/FormSubmission');
				$email->setData( ArrayData::create($data) );
				$email->send();

				// --- CUSTOMER EMAIL ---
				// $to = $data->Email;
				// $data->Title = 'Thanks for your message, we\'ll be in touch soon. The details you submitted are included below for your own records.';
				// $email = Email::create($from, $to, $subject, $body);
				// $email->setHTMLTemplate('Email/FormSubmission');
				// $email->setData( ArrayData::create($data) );
				// $email->send();
		}

		return;
	}

	/**
	 * Create unique ID for submission
	 * 
	 * @param $str string | string to hash
	 * 
	 * @return string | hashed string
	 **/
	function CreateUniqueID($str){
		return md5($str . microtime());
	}

	function EditLink(){
		return Director::absoluteBaseURL() . 'admin/form-submissions/FormSubmission/EditForm/field/FormSubmission/item/'.$this->ID.'/edit';
	}

	function DataToHTMLList($data){
		$str = '<ul>';
		foreach($data as $key => $val){
			switch($key){
				case 'SecurityID':
					// don't include
					break;
				default:
					$str .= '<li><strong>'.$key.':</strong> '.$val.'</li>';
			}
		}
		$str .= '</ul>';
		return $str;
	}

}