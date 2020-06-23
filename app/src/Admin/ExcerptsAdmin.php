<?php

use SilverStripe\Admin\ModelAdmin;

class ExcerptsAdmin extends ModelAdmin {

    private static $managed_models = [
		  'Excerpt'
    ];

    private static $url_segment = 'excerpts';
    private static $menu_title = 'Excerpts';
	  //private static $menu_icon = 'app/cms/icons/excerpts.png';
	
}


