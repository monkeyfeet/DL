<?php
class ExcerptsAdmin extends ModelAdmin {

    private static $managed_models = array(
		'Excerpt'
    );

    private static $url_segment = 'excerpts';
    private static $menu_title = 'Excerpts';
	private static $menu_icon = 'site/cms/icons/excerpts.png';
	
}


