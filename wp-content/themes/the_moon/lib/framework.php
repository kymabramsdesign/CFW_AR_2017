<?php

require_once('string.php');

class PxFramework {
    /**
     * Includes (require_once) php file(s) inside selected folder
     */
    public static function Require_Files($path, $fileName)
    {

        if(is_string($fileName))
        {
            require_once(px_path_combine($path, $fileName) . '.php');
        }
        elseif(is_array($fileName))
        {
            foreach($fileName as $name)
            {
                require_once(px_path_combine($path, $name) . '.php');
            }
        }
        else
        {
            //Throw error
            throw new Exception('Unknown parameter type');
        }
    }
}

//Include framework files

PxFramework::Require_Files( THEME_LIB,
    array('constants',
          'utilities',
          'color',
          'breadcrumb',
          'scripts',
          'support',
          'retina-upload',
          'sidebars',
          'plugins-handler',
          'nav-walker',
          'menus',
          'portfolio-nav-walker',
          'shortcodes/shortcodes',
          'shortcodes/mcewrapper',
          'admin/admin',
    ));

//Add post types

PxFramework::Require_Files( THEME_LIB . '/post-types',
    array('portfolio', 'blog', 'page' , 'testimonial' , 'carousel'
));

//Add widgets

PxFramework::Require_Files( THEME_LIB . '/widgets',
    array(
    'widget-flickr',
    'widget-video',
    'widget-progress',
    'widget-facebook',
	'widget-woocommerce-dropdown-cart',
));

//Demo

if(file_exists(THEME_DIR . '/demo.php'))
    include_once(THEME_DIR . '/demo.php');