<?php

use SilverStripe\Admin\ModelAdmin;

class FormSubmissionAdmin extends ModelAdmin {

    private static $managed_models = [
		'FormSubmission'
    ];

    private static $url_segment = 'form-submissions';
    private static $menu_title = 'Submissions';
	  private static $menu_icon = 'app/cms/icons/email.png';
	
}


