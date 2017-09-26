<?php

define('TEXTDOMAIN', 'the_moon');
define('THEME_SLUG', 'Sc');

/**************************************************
	FOLDERS
**************************************************/

define('THEME_DIR',         get_template_directory());
define('THEME_LIB',         THEME_DIR . '/lib');
define('THEME_INCLUDES',    THEME_LIB . '/includes');
define('THEME_ADMIN',       THEME_LIB . '/admin');
define('THEME_LANGUAGES',   THEME_LIB . '/languages');
define('THEME_CACHE',       THEME_DIR . '/cache');
define('THEME_ASSETS',      THEME_DIR . '/assets');
define('THEME_PLUGINS',     THEME_DIR . '/plugins');
define('THEME_JS',          THEME_ASSETS . '/js');
define('THEME_CSS',         THEME_ASSETS . '/css');
define('THEME_IMAGES',      THEME_ASSETS . '/img');


/**************************************************
    FOLDER URI
**************************************************/

define('THEME_URI',             get_template_directory_uri());
define('THEME_LIB_URI',         THEME_URI . '/lib');
define('THEME_ADMIN_URI',       THEME_LIB_URI . '/admin');
define('THEME_LANGUAGES_URI',   THEME_LIB_URI . '/languages');
define('THEME_PLUGINS_URI',     THEME_URI . '/plugins');
define('THEME_CACHE_URI',       THEME_URI     . '/cache');
define('THEME_ASSETS_URI',      THEME_URI     . '/assets');
define('THEME_JS_URI',          THEME_ASSETS_URI . '/js');
define('THEME_CSS_URI',         THEME_ASSETS_URI . '/css');
define('THEME_IMAGES_URI',      THEME_ASSETS_URI . '/img');

/**************************************************
    Text Domain
**************************************************/

load_theme_textdomain( TEXTDOMAIN, THEME_DIR . '/languages' );

/**************************************************
    Content Width
**************************************************/

if ( !isset( $content_width ) ) $content_width = 1170;

/**************************************************
    LIBRARIES
**************************************************/

function show_var($var){
  echo "<pre>";
  print_r($var);
  echo "</pre>";
}

function sliderTitleFormat($title){
	$replacees = array(
			'Grantees',
			'Donors',
			'Giving Councils / Circles',
			'100% Project'
		);

	foreach($replacees as $string){
		if(strpos($title, $string) !== false){
			$newTitle = str_replace($string, '<span>' .$string.'</span>', $title);
		}

		if(strpos($title, "Everyone") !== false){
			$newTitle = "<span>100% Project</span> In Everyone's " . "<br />" . "Best Interest";
		}
	}

	return $newTitle;
	
} 

add_filter('px-slider-title','sliderTitleFormat');

require_once(THEME_LIB . '/framework.php');