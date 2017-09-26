<?php

include_once THEME_LIB . '/google-fonts.php';

function px_admin_get_defaults()
{
    static $values = array();

    if(count($values))
        return $values;

    //Extract key-value pairs from settings
    $settings = px_admin_get_form_settings();
    $panels   = $settings['panels'];

    foreach($panels as $panel)
    {
        foreach($panel['sections'] as $section)
        {
            foreach($section['fields'] as $fieldKey => $field)
            {
                $values[$fieldKey] = px_array_value('value', $field);
            }
        }
    }

    return $values;
    }

    function px_admin_get_appearance_value($name){

    $savedThemeOption =get_option('theme_scooter_options');

    return $savedThemeOption[$name];
    }

    function px_admin_get_color_option_attr($colors)
    {
    $tmp = json_encode($colors);
    $tmp = esc_attr($tmp);
    return "data-colors=\"$tmp\"";
    }

    function px_admin_get_form_settings()
    {
    static $settings = array();//Cache the settings

    if(count($settings))
        return $settings;

    $generalSettingsPanel = array(
        'title' => __('General Settings', TEXTDOMAIN),
        'sections' => array(
            'favicon' => array(
                'title'   => __('Custom Favicon', TEXTDOMAIN),
                'tooltip' => __('Specify custom favicon url or upload new icon here', TEXTDOMAIN),
                'fields'  => array(
                    'favicon' => array(
                        'type' => 'upload',
                        'title' => __('Upload Favicon', TEXTDOMAIN),
                        'referer' => 'px-settings-favicon'
                    ),
                )
            ),//Favicon sec
            'scrolling-easing' => array(
                'title'   => __('Scrolling Easing', TEXTDOMAIN),
                'tooltip' => __('You can adjust easing and speed of vertical scrolling in main page', TEXTDOMAIN),
                'fields'  => array(
                    'scrolling-easing' => array(
                        'type'   => 'select',
                        'options'=> array(
                                'linear' => 'linear',
                                'easeInQuad'=> 'Ease In Quad',
                                'easeOutQuad'=> 'Ease Out Quad',
                                'easeInOutQuad'=> 'Ease In Out Quad',
                                'easeInCubic' => 'Ease In Cubic',
                                'easeOutCubic' => 'Ease Out Cubic',
                                'easeInOutCubic' => 'Ease In Out Cubic',
                                'easeInQuart' => 'Ease In Quart',
                                'easeOutQuart' => 'Ease Out Quart',
                                'easeInOutQuart' => 'Ease In Out Quart',
                                'easeInQuint' => 'Ease In Quint',
                                'easeOutQuint' => 'Ease Out Quint',
                                'easeInOutQuint' => 'Ease In Out Quint',
                                'easeInSine' => 'Ease In Sine',
                                'easeOutSine' => 'Ease Out Sine',
                                'easeInOutSine' => 'Ease In Out Sine',
                                'easeInExpo' => 'Ease In Expo',
                                'easeOutExpo' => 'Ease Out Expo',
                                'easeInOutExpo' => 'Ease In Out Expo',
                                'easeInCirc' => 'Ease In Circ',
                                'easeOutCirc' => 'Ease Out Circ',
                                'easeInOutCirc' => 'Ease In Out Circ',
                                'easeInElastic' => 'Ease In Elastic',
                                'easeOutElastic' => 'Ease Out Elastic',
                                'easeInOutElastic' => 'Ease In Out Elastic',
                                'easeInBack' => 'Ease In Back',
                                'easeOutBack' => 'Ease Out Back',
                                'easeInOutBack' => 'Ease In Out Back',
                                'easeInBounce' => 'Ease In Bounce',
                                'easeOutBounce' => 'Ease Out Bounce',
                                'easeInOutBounce' => 'Ease In Out Bounce'

                            ),
                        'default'=> 'easeInOutQuart',
                    ),
                    'scrolling-speed' => array(
                        'title'  => __('Scrolling Speed', TEXTDOMAIN),
                        'label'  => __('ms', TEXTDOMAIN),
                        'default'   => '1000',
                        'type'   => 'range',
                        'min'   => '5',
                        'max'   => '5000',
                        'step'   => '50',
                    ),
                )
            ),//page Scrolling Speed And Easing
            'login-logo' => array(
                'title'   => __('Control Panel Login Logo', TEXTDOMAIN),
                'tooltip' => __('upload your admin panel login Logo .( best size : 302px X 62px ) ( PNG , JPG , GIF )', TEXTDOMAIN),
                'fields'  => array(
                    'login-logo' => array(
                        'type' => 'upload',
                        'title' => __('Control Panel Login Logo', TEXTDOMAIN),
                        'referer' => 'px-settings-login-logo'
                    ),
                )
            ),// Control Panel Login logo
        )
    );//$generalSettingsPanel


       $presetColors = array();

    $presetColors['default'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#df3030',
              'style-highlight-color'=>'#df3030',
              'style-link-color'=>'#df3030',
              'style-link-hover-color'=>'#cbcbcb'));

    $presetColors['red'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#eb2130',
            'style-highlight-color'=>'#eb2130',
            'style-link-color'=>'#eb2130',
            'style-link-hover-color'=>'#333333'));

    $presetColors['orange'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#fe4d2c',
            'style-highlight-color'=>'#fe4d2c',
            'style-link-color'=>'#fe4d2c',
            'style-link-hover-color'=>'#333333'));

    $presetColors['pink'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#eb2071',
            'style-highlight-color'=>'#eb2071',
            'style-link-color'=>'#eb2071',
            'style-link-hover-color'=>'#333333'));

    $presetColors['yellow'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#ffdb0d',
            'style-highlight-color'=>'#ffdb0d',
            'style-link-color'=>'#ffdb0d',
            'style-link-hover-color'=>'#333333'));

    $presetColors['green'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#96d639',
            'style-highlight-color'=>'#96d639',
            'style-link-color'=>'#96d639',
            'style-link-hover-color'=>'#333333'));

    $presetColors['emerald'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#4dac46',
            'style-highlight-color'=>'#4dac46',
            'style-link-color'=>'#4dac46',
            'style-link-hover-color'=>'#333333'));

    $presetColors['teal'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#23d692',
            'style-highlight-color'=>'#23d692',
            'style-link-color'=>'#23d692',
            'style-link-hover-color'=>'#333333'));

    $presetColors['skyBlue'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#45c1e5',
            'style-highlight-color'=>'#45c1e5',
            'style-link-color'=>'#45c1e5',
            'style-link-hover-color'=>'#333333'));

    $presetColors['blue'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#073b87',
            'style-highlight-color'=>'#073b87',
            'style-link-color'=>'#073b87',
            'style-link-hover-color'=>'#333333'));

    $presetColors['purple'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#423c6c',
            'style-highlight-color'=>'#423c6c',
            'style-link-color'=>'#423c6c',
            'style-link-hover-color'=>'#333333'));

    $presetColors['golden'] = px_admin_get_color_option_attr(
        array('style-accent-color'=>'#dbbe7c',
            'style-highlight-color'=>'#dbbe7c',
            'style-link-color'=>'#dbbe7c',
            'style-link-hover-color'=>'#333333'));

    $customColor = array('style-accent-color'=>px_admin_get_appearance_value('style-accent-color'),
        'style-highlight-color'=>px_admin_get_appearance_value('style-highlight-color'),
        'style-link-color'=>px_admin_get_appearance_value('style-link-color'),
        'style-link-hover-color'=>px_admin_get_appearance_value('style-link-hover-color'));

    $presetColors['custom'] = px_admin_get_color_option_attr( $customColor);

    $appearancePanel = array(
        'title' => __('Colors', TEXTDOMAIN),
        'sections' => array(

            'theme-style' => array(
                'title'   => __('Preset Color', TEXTDOMAIN),
                'tooltip' => __('Choose a preset theme color or choose custom to set your own color for theme', TEXTDOMAIN),
                'fields'  => array(
                    'style-preset-color' => array(
                        'type'   => 'select',
                        'options'=> array('default' => 'Default Theme Colors', 'red' => 'Red', 'orange' => 'Orange', 'pink' => 'Pink', 'yellow' => 'Yellow', 'green' => 'Green', 'emerald' => 'Emerald', 'teal' => 'Teal', 'skyBlue' => 'Sky Blue', 'blue' => 'Blue', 'golden' => 'Golden','custom'=>'Custom'),
                        'option-attributes' => $presetColors
                    ),
                )
            ),//theme-style sec
            'accent-color' => array(
                'title'   => __('Accent color', TEXTDOMAIN),
                'tooltip' => __('Accent color for page elements', TEXTDOMAIN),
                'fields'  => array(
                    'style-accent-color' => array(
                        'type'   => 'color',
                        'label'  => __('Choose', TEXTDOMAIN),
                        'value'  => '#ff4c2f'
                    ),
                )
            ),//accent-color sec
            'highlight-color' => array(
                'title'   => __('Highlight color', TEXTDOMAIN),
                'tooltip' => __('Color for highlighted elements', TEXTDOMAIN),
                'fields'  => array(
                    'style-highlight-color' => array(
                        'type'   => 'color',
                        'label'  => __('Choose', TEXTDOMAIN),
                        'value'  => '#ff4c2f'
                    ),
                )
            ),//highlight-color sec
            'link-color' => array(
                'title'   => __('Link Color', TEXTDOMAIN),
                'tooltip' => __('Choose link color and hover color', TEXTDOMAIN),
                'fields'  => array(
                    'style-link-color' => array(
                        'type'   => 'color',
                        'label'  => __('Normal Color', TEXTDOMAIN),
                        'value'  => '#ff4c2f'
                    ),
                    'style-link-hover-color' => array(
                        'type'   => 'color',
                        'label'  => __('Hover Color', TEXTDOMAIN),
                        'value'  => '#cbcbcb'
                    ),
                )
            ),//link-color sec

        )
    );//$themeStylePanel

    $preloaderPanel = array(
        'title' => __('PreLoader', TEXTDOMAIN),
        'sections' => array(
            'loader_display' => array(
                'title'   => __('Display Loader', TEXTDOMAIN),
                'tooltip' => __('You can enable or disable the Loader which is shown before showing the pages.', TEXTDOMAIN),
                'fields'  => array(
                    'loader_display' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t show', TEXTDOMAIN),
                        'state1' => __('show', TEXTDOMAIN),
                        'value'  => 1
                    ),
                )
            ),//Enable Loader
            'preloader-bar-color' => array(
                'title'   => __('Loader Color', TEXTDOMAIN),
                'tooltip' => __('Choose the color of loader bar.', TEXTDOMAIN),
                'fields'  => array(
                    'preloader-bar-color' => array(
                        'type'   => 'color',
                        'label'  => __('Choose', TEXTDOMAIN),
                        'value'  => '#ff9000'
                    ),
                )
            ),// bar color
            'preloader-background-color' => array(
                'title'   => __('Loader Background Color', TEXTDOMAIN),
                'tooltip' => __('Choose the background color of loading page.', TEXTDOMAIN),
                'fields'  => array(
                    'preloader-background-color' => array(
                        'type'   => 'color',
                        'label'  => __('Choose', TEXTDOMAIN),
                        'value'  => '#ffffff'
                    ),
                )
            ),//background color
            'preloader-logo' => array(
                'title'   => __('Loader Image', TEXTDOMAIN),
                'tooltip' => __('Upload your logo, or your desire image here. You can use PNG, GIF and JPG formats.', TEXTDOMAIN),
                'fields'  => array(
                    'preloader-logo' => array(
                        'type' => 'upload',
                        'title' => __('Upload Preloader Logo', TEXTDOMAIN),
                        'referer' => 'px-settings-preloader'
                    ),
                )
            ),//preloader logo

        )
    );//$Pre loader Panel

    
    $notificationPanel = array(
        'title' => __('Notification Bar', TEXTDOMAIN),
        'sections' => array(
            'notification_display' => array(
                'title'   => __('Enable Notification Bar', TEXTDOMAIN),
                'tooltip' => __('You can enable or disable the notification bar here. Notification bar is the bar that sticks to top of your main page.', TEXTDOMAIN),
                'fields'  => array(
                    'notification_display' => array(
                        'type'   => 'switch',
                        'state0' => __('Disable', TEXTDOMAIN),
                        'state1' => __('Enable', TEXTDOMAIN),
                        'value'  => 0
                    ),
                )
            ),//Enable Notification bar 
           'notification_icon' => array(
                'title'   => __('Notification Icon', TEXTDOMAIN),
                'tooltip' => __('Select an icon for Notification.', TEXTDOMAIN),
                'fields'  => array(
                    'notification_icon' => array(
                        'type'   => 'icon',
                        'title' => __('Notification Icon', TEXTDOMAIN),
                        //'class' => 'text-rotator-icon-input',
                        'desc'  => __('Select an icon for Notification', TEXTDOMAIN),
                        'flags' => 'attribute',//CSV
                    ),
                )
            ),// Notification Icon 
           'notification_title' => array(
                'title'   => __('Notification Title', TEXTDOMAIN),
                'tooltip' => __('Write Notification Title', TEXTDOMAIN),
                'fields'  => array(
                    'notification_title' => array(
                        'type' => 'text',
                        'placeholder' => __('Add notification Title here', TEXTDOMAIN),
                    ),
                )
            ),// Notification Title 
            'notification_text' => array(
                'title'   => __('Notification text', TEXTDOMAIN),
                'tooltip' => __('Write Notification Text', TEXTDOMAIN),
                'fields'  => array(
                    'notification_text' => array(
                        'type' => 'text',
                        'placeholder' => __('Add notification Text here', TEXTDOMAIN),
                    ),
                )
            ),// Notification Text
            'notification_more_info' => array(
                'title'   => __('Button Text', TEXTDOMAIN),
                'tooltip' => __('Write more info button text here', TEXTDOMAIN),
                'fields'  => array(
                    'notification_more_info' => array(
                        'type' => 'text',
                        'placeholder' => __('Add more info button text here', TEXTDOMAIN),
                    ),
                )
            ),// Notification more info buttons Text
            'notification_more_URL' => array(
                'title'   => __('Button URL', TEXTDOMAIN),
                'tooltip' => __('Enter button URL here.', TEXTDOMAIN),
                'fields'  => array(
                    'notification_more_URL' => array(
                        'type' => 'text',
                        'placeholder' => __('button URL', TEXTDOMAIN),
                    ),
                )
            ),// Notification More Info URL
            'notification_bg_color' => array(
                'title'   => __('Notification bar background color', TEXTDOMAIN),
                'tooltip' => __('Notification bar background color', TEXTDOMAIN),
                'fields'  => array(
                    'notification_bg_color' => array(
                        'type'   => 'color',
                        'label'  => __('Choose', TEXTDOMAIN),
                        'value'  => '#eb473b'
                    ),
                )
            ),//Notification bar background color
			'notification_target' => array(
				'title'   => __('Notification link target', TEXTDOMAIN),
				'tooltip' => __('Choose if notification link open in new window or same window', TEXTDOMAIN),
				'fields'  => array(
						'notification_target' => array(
						'type'   => 'select',
						'options'=> array('_self' => 'Same Window', '_blank' => 'New Window'),
					),
				)
			),
        )
    );//Notification Panel
    
    $gf = new PxGoogleFonts(px_path_combine(THEME_LIB, 'googlefonts.json'));
    $fontNames = $gf->GetFontNames();

    $menuPanel = array(
        'title' => __('Menu Styles', TEXTDOMAIN),
        'sections' => array(
            'header-style' => array(
                'title'   => __('Header Menu Style', TEXTDOMAIN),
                'tooltip' => __('Select menu style', TEXTDOMAIN),
                'fields'  => array(
                    'header-style' => array(
                        'type'   => 'select',
                        'options'=> array('scooter-menu' => 'Hybrid Menu','fixed-menu' => 'Sticky Menu', 'scroll-sticky' => 'Scroll to fade-in' , 'wave-menu' => 'Wave Menu'),
                        'default'=> 'fixed-menu',
                    ),
                )
            ),//Menu Style
            'logo' => array(
                'title'   => __('Initial Logo', TEXTDOMAIN),
                'tooltip' => __('It\'s the logo that will only be shown when you load the page from the top. It will be fade-out and replaced with Logo when you scroll down.', TEXTDOMAIN),
                'fields'  => array(
                    'logo' => array(
                        'type' => 'upload',
                        'title' => __('Upload logo', TEXTDOMAIN),
                        'referer' => 'px-settings-logo'
                    ),
                )
            ),//Logo sec
            'initial-menu-color' => array(
                'title'   => __('Initial Menu Colors', TEXTDOMAIN),
                'tooltip' => __('Choose the color and set the opacity for initial menu.', TEXTDOMAIN),
                'fields'  => array(
                    'initial-menu-background-color' => array(
                        'type'   => 'color',
                        'label'  => __('Background Color', TEXTDOMAIN),
                        'value'  => '#ffffff'
                    ),
                    'initial-menu-text-color' => array(
                        'type'   => 'color',
                        'label'  => __('Text Color', TEXTDOMAIN),
                        'value'  => '#000000'
                    ),
                    'initial-menu-text-hover-color' => array(
                        'type'   => 'color',
                        'label'  => __('Text hover Color', TEXTDOMAIN),
                        'value'  => '#f83333'
                    ),
                    'initial-menu-opacity' => array(
                        'title'  => __('Opacity', TEXTDOMAIN),
                        'label'  => __('%', TEXTDOMAIN),
                        'default'   => '100',
                        'type'   => 'range',
                        'min'   => '0',
                        'max'   => '100',
                        'step'   => '1',
                    ),
                )
            ),//initial menu colors Sec
            'logo-second' => array(
                'title'   => __('Logo', TEXTDOMAIN),
                'tooltip' => __('It\'s your primary menu and will be shown when you scroll down.', TEXTDOMAIN),
                'fields'  => array(
                    'logo-second' => array(
                        'type' => 'upload',
                        'title' => __('Upload Secound Logo', TEXTDOMAIN),
                        'referer' => 'px-settings-logo'
                    ),
                )
            ),//Secound Logo sec
            'menu-color' => array(
                'title'   => __('Menu Colors', TEXTDOMAIN),
                'tooltip' => __('Choose the color and set the opacity for menu.', TEXTDOMAIN),
                'fields'  => array(
                    'menu-background-color' => array(
                        'type'   => 'color',
                        'label'  => __('Background Color', TEXTDOMAIN),
                        'value'  => '#f5f5f5'
                    ),
                    'menu-text-color' => array(
                        'type'   => 'color',
                        'label'  => __('Text Color', TEXTDOMAIN),
                        'value'  => '#000000'
                    ),
                    'menu-text-hover-color' => array(
                        'type'   => 'color',
                        'label'  => __('Text hover Color', TEXTDOMAIN),
                        'value'  => '#f83333'
                    ),
                    'menu-opacity' => array(
                        'title'  => __('Opacity', TEXTDOMAIN),
                        'label'  => __('%', TEXTDOMAIN),
                        'default'   => '100',
                        'type'   => 'range',
                        'min'   => '0',
                        'max'   => '100',
                        'step'   => '1',
                    ),
                )
            ),//Footer link option
            'menu_footer_link' => array(
                'title'   => __('Enable Footer Link', TEXTDOMAIN),
                'tooltip' => __('Enable or disable menu item that link to footer section.', TEXTDOMAIN),
                'fields'  => array(
                    'menu_footer_link' => array(
                        'type'   => 'switch',
                        'state0' => __('Disable', TEXTDOMAIN),
                        'state1' => __('Enable', TEXTDOMAIN),
                        'value'  => 0
                    ),
                )
            ),//Footer Link Text
            'menu_footer_link_text' => array(
                'title'   => __('Footer Link Text', TEXTDOMAIN),
                'tooltip' => __('Footer link text that appear on menu.', TEXTDOMAIN),
                'fields'  => array(
                    'menu_footer_link_text' => array(
                            'type' => 'text',
                            'label' => __('Footer Link Text', TEXTDOMAIN),
                            'placeholder' => __('Footer link text', TEXTDOMAIN),
							),
						),
            ),//menu colors Sec
            'menu-style' => array(
                'title'   => __('Menu Style', TEXTDOMAIN),
                'tooltip' => __('Choose the menu style.', TEXTDOMAIN),
                'fields'  => array(
                    'menu-hover-style' => array(
                        'type'   => 'switch',
                        'state0' => __('Hover Style - Border', TEXTDOMAIN),
                        'state1' => __('Hover Style - Fill', TEXTDOMAIN),
                        'value'  => 1
                    ),
                )
            ),//menu Style
            'font-navigation' => array(
                'title'   => __('Menu Font', TEXTDOMAIN),
                'tooltip' => __('Select your desired font name for menu.', TEXTDOMAIN),
                'fields'  => array(
                    'font-navigation' => array(
                        'type'   => 'select',
                        'options'=> $fontNames,
                        'value'  => 'Open Sans'
                    ),
                )
            ),//Shortcode title's Font
        )
    );//$menuPanel End
    $headerPanel = array(
        'title' => __('Intro', TEXTDOMAIN),
        'sections' => array(
            'home-display-switch' => array(
                'title'   => __('Intro Display', TEXTDOMAIN),
                'tooltip' => __('Enable or Disable Intro Section', TEXTDOMAIN),
                'fields'  => array(
                    'home-display-switch' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t Show', TEXTDOMAIN),
                        'state1' => __('Show', TEXTDOMAIN),
                        'value'  => 0
                    ),
                )
            ),//Display Header
           'home-type' => array(
                'title'   => __('Intro Layout', TEXTDOMAIN),
                'tooltip' => __('Select your Intro layout', TEXTDOMAIN),
                'fields'  => array(
                    'home-type-switch' => array(
                        'type'   => 'select',
                        'options'=> array('home-slider' => 'FullScreen Slider', 'home-video' => 'FullScreen Video', 'home-map' => 'FullScreen Google Map', 'home-layerSlider' => 'Layer Slider' , 'home-MasterSlider' => 'Master Slider' , 'home-particle' => 'Particle')
                    ),
                )
            ),//Intro Fullwidth Slider
            'animation-mode' => array(
                'title'   => __('Full Screen Animation Mode', TEXTDOMAIN),
                'tooltip' => __('You can choose fullscreen animation style here.', TEXTDOMAIN),
                'fields'  => array(
                    'animation-mode' => array(
                        'type'   => 'switch',
                        'state0' => __('Fade', TEXTDOMAIN),
                        'state1' => __('Slide', TEXTDOMAIN),
                        'value'  => 0
                    ),
                )
            ),//Display Header
            
            'home-video' => array(
                'title'   => __('Intro Video Inputs', TEXTDOMAIN),
                'tooltip' => __('Insert your desired video file in related field and upload an image to be shown before video loads, or in responsive view.', TEXTDOMAIN),
                'fields'  => array(
                    'home-video-MP4' => array(
                        'type'   => 'upload',
                        'label'  => __('Video (MP4 format)', TEXTDOMAIN),
                        'placeholder' => __('Upload Video (MP4 format)', TEXTDOMAIN),
                        'referer' => 'px-home-gallery-video',
                    ),
                    'home-video-WebM' => array(
                        'type'   => 'upload',
                        'label'  => __('Video (WebM format)', TEXTDOMAIN),
                        'placeholder' => __('Upload Video (WebM format)', TEXTDOMAIN),
                        'referer' => 'px-home-gallery-video',
                    ),
                    'home-video-imge' => array(
                        'type'   => 'upload',
                        'label'  => __('Video Preview Image', TEXTDOMAIN),
                        'placeholder' => __('Upload Video Preview Image', TEXTDOMAIN),
                        'referer' => 'px-home-gallery-video',
                    ),
                )
            ),//Intro Video Full Width
            'home-map' => array(
                'title'   => __('Google Map Properties', TEXTDOMAIN),
                'tooltip' => __('Enter your map address latitude & longitude and zoom levels. Zoom value can be from 1 to 19 where 19 is the greatest and 1 the smallest.', TEXTDOMAIN),
                'fields'  => array(
                    'homeMapLatitude' => array(
                            'type' => 'text',
                            'label' => __('Map latitude', TEXTDOMAIN),
                            'placeholder' => __('Google Maps latitude', TEXTDOMAIN),
                    ),
                    'homeMapLongitude' => array(
                            'type' => 'text',
                            'label' => __('Map Longitude', TEXTDOMAIN),
                            'placeholder' => __('Google Maps longitude', TEXTDOMAIN),
                    ),
                    'homeMapZoom' => array(
                        'type'   => 'select',
                        'label' => __('Map Zoom', TEXTDOMAIN),
                        'options'=> array('1' => 'Zoom 1', '2' => 'Zoom 2', '3' => 'Zoom 3', '4' => 'Zoom 4', '5' => 'Zoom 5', '6' => 'Zoom 6', '7' => 'Zoom 7', '8' => 'Zoom 8', '9' => 'Zoom 9', '10' => 'Zoom 10', '11' => 'Zoom 11', '12' => 'Zoom 12', '13' => 'Zoom 13', '14' => 'Zoom 14', '15' => 'Zoom 15', '16' => 'Zoom 16', '17' => 'Zoom 17', '18' => 'Zoom 18', '19' => 'Zoom 19'),
                    ),
                    'homeStyleMap' => array(
                        'type'   => 'switch',
                        'state0' => __('Standard Style', TEXTDOMAIN),
                        'state1' => __('Custom Style', TEXTDOMAIN),
                        'value'  => 1
                    )
                )
            ),//Intro Google Map
            'home-layerSlider' => array(
                'title'   => __('Intro Layer Slider', TEXTDOMAIN),
                'tooltip' => __('Choose the desired layer slider slideshow to be shown in intro section', TEXTDOMAIN),
                'fields'  => array(
                    'home-video-type' => array(
                            'type' => 'select',
                            'options' => px_get_layerSlider_slides()
                        )
                )
            ),//Intro Layer Slider
            'home-MasterSlider' => array(
                'title'   => __('Intro Master Slider', TEXTDOMAIN),
                'tooltip' => __('Choose the desired Master slider slideshow to be shown in intro section', TEXTDOMAIN),
                'fields'  => array(
                    'home-master-type' => array(
                            'type' => 'select',
                            'options' => px_get_masterSlider_slides()
                        )
                )
            ),//Intro Master Slider
            'home-slider' => array(
                'title'   => __('Fullscreen Slider', TEXTDOMAIN),
                'tooltip' => __('Upload images to be shown in Intro full screen slider', TEXTDOMAIN),
                'fields'  => array(
                    'home-gallery-1' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-2' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-3' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-4' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-5' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-6' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-7' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-8' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-9' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                    'home-gallery-10' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    )
                )
            ),
            'home-particle' => array(
                'title'   => __('Image Background', TEXTDOMAIN),
                'tooltip' => __('Upload images to be shown in Intro Background', TEXTDOMAIN),
                'fields'  => array(
                    'home-particle' => array(
                        'type'   => 'upload',
                        'referer' => 'px-home-gallery-image',
                    ),
                )
            ),
            'home-slider-overlay' => array(
                'title'   => __('Intro Overlay', TEXTDOMAIN),
                'tooltip' => __('Choose a color for your overlay, set it\'s opacity and choose a texture to be shown on top of it.', TEXTDOMAIN),
                'fields'  => array(
                    'home-overlay-color' => array(
                        'type'   => 'color',
                        'label'  => __('Intro overlay color', TEXTDOMAIN),
                        'value'  => ''
                    ),
                    'home-overlay-opacity' => array(
                        'title'  => __('Intro overlay opacity', TEXTDOMAIN),
                        'label'  => __('%', TEXTDOMAIN),
                        'type'   => 'range',
                        'default'   => '50',
                        'min'   => '0',
                        'max'   => '100',
                        'step'   => '1',
                    ),
                    'home-overlay-texture' => array(
                        'type' => 'visual-select',
                        'title'=> __('Choose overlay texture : ', TEXTDOMAIN),
                        'options' => array(
                                    'texture1'=> __('texture1', TEXTDOMAIN),
                                    'texture2'=> __('texture2', TEXTDOMAIN),
                                    'texture3'=> __('texture3', TEXTDOMAIN),
                                    'texture4'=> __('texture4', TEXTDOMAIN),
                                    'texture5'=> __('texture5', TEXTDOMAIN),
                                    'texture6'=> __('texture6', TEXTDOMAIN),
                                    'texture7'=> __('texture7', TEXTDOMAIN),
                                    'texture8'=> __('texture8', TEXTDOMAIN),
                            ),
                    ),
                )
            ),

        )

    );//Intro panel

      $headerstylePanel = array(
        'title' => __('Text Rotator', TEXTDOMAIN),
        'sections' => array(
        
            'text-head-type' => array(
                'title'   => __('Text Rotator Image / Icon ', TEXTDOMAIN),
                'tooltip' => __('Choose to show an icon or an image for Text Rotator', TEXTDOMAIN),
                'fields'  => array(
                    'text-head-type' => array(
                        'type'   => 'select',
                        'options'=> array('image' => 'Image', 'icon' => 'Icon')
                    ),
                )
            ),//Text Rotator Image / Icon
            
            'header-icon-animation' => array(
                'title'   => __('Intro Icon / Image Animation', TEXTDOMAIN),
                'tooltip' => __('Enable or Disable the animation functionality for intro image or intro icon', TEXTDOMAIN),
                'fields'  => array(
                    'header-icon-animation' => array(
                        'type'   => 'switch',
                        'state0' => __('Disabled', TEXTDOMAIN),
                        'state1' => __('Enabled', TEXTDOMAIN),
                        'value'  => 1
                    ),
                )
            ),// Intro Icon
            
            'home-text-style' => array(
                'title'   => __('Text Rotator Style', TEXTDOMAIN),
                'tooltip' => __('Choose the text rotator style', TEXTDOMAIN),
                'fields'  => array(
                    'home-text-style' => array(
                        'type' => 'visual-select',
                        'options' => array('style-1'=>1, 'style-2'=>2,'style-3'=>3,'style-4'=>4 ,'style-5'=>5, 'style-6'=>6, 'style-7'=>7,'style-8'=>8),
                        'class' => 'home-rotator',
                        'value' => 2,
                    ),
                )
            ),//sidebar-position sec
            
            'text-rotator1' => array(
                'title'   => __('Text Rotator info', TEXTDOMAIN),
                'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                'class' => 'asasasas',
                
                'fields'  => array(
                    'header-image1' => array(
                        'type' => 'upload',
                        'title' => __('Intro Image', TEXTDOMAIN),
                        'class' => 'text-rotator-image-input',
                        'referer' => 'px-settings-header-image'
                    ),
                    'header-icon1' => array(
                        'type'  => 'icon',
                        'title' => __('Text Rotator Icon', TEXTDOMAIN),
                        'class' => 'text-rotator-icon-input',
                        'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                        'flags' => 'attribute',//CSV
                    ),
                    'home-text1' => array(
                        'type' => 'text',
                        'placeholder' => __('Add your text here', TEXTDOMAIN),
                    ),
                    'home-subtitle1' => array(  
                        'type' => 'text',
                        'class' => 'text-rotator-subtitle-input',
                        'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                    ),
                    'header-textarea1' => array(
                        'type' => 'textarea',
                        'label' => __('Intro Fixed Text', TEXTDOMAIN),
                        'class' => 'text-rotator-textarea-input',
                        'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                    ), 
                    'text-rotator-removebtn1' => array(
                        'type' => 'visual-select',
                        'options' => array('style-1'=>1),
                        'class' => 'deleteImageSelect',
                        'value' => 1,
                    ),// 
                )
            ),// text Rotator 1 - info
            
                'text-rotator2' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image2' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon2' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text2' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle2' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea2' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ), 
                        'text-rotator-removebtn2' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 2 - info
                
                  'text-rotator3' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image3' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon3' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text3' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle3' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea3' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),  
                        'text-rotator-removebtn3' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 3 - info
                
                'text-rotator4' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image4' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon4' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text4' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle4' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea4' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),
                        'text-rotator-removebtn4' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 4 - info
                
                'text-rotator5' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image5' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon5' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text5' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle5' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea5' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ), 
                       'text-rotator-removebtn5' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 5 - info
                
                'text-rotator6' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image6' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon6' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text6' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle6' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea6' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),
                        'text-rotator-removebtn6' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 6 - info
            
                'text-rotator7' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image7' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon7' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text7' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle7' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea7' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),  
                        'text-rotator-removebtn7' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),// 
                    )
                ),// text Rotator 7 - info
                
                'text-rotator8' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image8' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon8' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text8' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle8' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea8' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ), 
                        'text-rotator-removebtn8' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),//
                    )
                ),// text Rotator 8 - info
              
                'text-rotator9' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image9' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon9' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text9' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle9' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea9' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),
                        'text-rotator-removebtn9' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),//
                    )
                ),// text Rotator 9 - info
                
                'text-rotator10' => array(
                    'title'   => __('Text Rotator info', TEXTDOMAIN),
                    'tooltip' => __('Upload an image ( best size : 50x50 pixel ) or choose an icon for the slider, enter a title and it\'s description ( subtitle ) in below fields.', TEXTDOMAIN),
                    'fields'  => array(
                        'header-image10' => array(
                            'type' => 'upload',
                            'title' => __('Intro Image', TEXTDOMAIN),
                            'class' => 'text-rotator-image-input',
                            'referer' => 'px-settings-header-image'
                        ),
                        'header-icon10' => array(
                            'type'  => 'icon',
                            'title' => __('Text Rotator Icon', TEXTDOMAIN),
                            'class' => 'text-rotator-icon-input',
                            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
                            'flags' => 'attribute',//CSV
                        ),
                        'home-text10' => array(
                            'type' => 'text',
                            'placeholder' => __('Add your text here', TEXTDOMAIN),
                        ),
                        'home-subtitle10' => array(  
                            'type' => 'text',
                            'class' => 'text-rotator-subtitle-input',
                            'placeholder' => __('Add subtitle text here', TEXTDOMAIN),
                        ),
                        'header-textarea10' => array(
                            'type' => 'textarea',
                            'label' => __('Intro Fixed Text', TEXTDOMAIN),
                            'class' => 'text-rotator-textarea-input',
                            'placeholder' => __('Intro Fixed Text', TEXTDOMAIN),
                        ),
                        'text-rotator-removebtn10' => array(
                            'type' => 'visual-select',
                            'options' => array('style-1'=>1),
                            'class' => 'deleteImageSelect',
                            'value' => 1,
                        ),//
                    )
                ),// text Rotator 10 - info
                
        )
    );//Intro text Rotator And image Panel

    $headerStartBtnPanel = array (
        'title' => __('Start Button', TEXTDOMAIN),
        'sections' => array(
            'home-start-text' => array(
                'title'   => __('Start Button Text', TEXTDOMAIN),
                'tooltip' => __('Add the text for start button. Start button is the link which is shown in intro section', TEXTDOMAIN),
                'fields'  => array(
                    'home-start-text' => array(
                        'type' => 'text',
                        'placeholder' => __('Start Here', TEXTDOMAIN),
                    )
                )
            ),
            'home-start-btn' => array(
                'title'   => __('Start Button Style', TEXTDOMAIN),
                'tooltip' => __('choose the style for start button', TEXTDOMAIN),
                'fields'  => array(
                    'home-start-btn' => array(
                        'type'   => 'select',
                        'options'=> array('style-1' => 'Arrow Style', 'style-2' => 'Box Style'),
                    ),
                )
            ),//sidebar-position sec


        )
    );//Intro Start button Panel

    $blogPanel = array(
        'title' => __('Blog Detail', TEXTDOMAIN),
        'sections' => array(
            'blog-sidebar-position' => array(
                'title'   => __('Blog Detail Sidebar Position', TEXTDOMAIN),
                'tooltip' => __('Here you can disable the sidebar or choose the sidebar position in the blog detail.', TEXTDOMAIN),
                'fields'  => array(
                    'blog-sidebar-position' => array(
                        'type' => 'visual-select',
                        'options' => array('none'=>0, 'right-side'=>1 ),
                        'class' => 'page-sidebar',
                        'value' => 1 ,
                    )
                )
            ),//blog-sidebar-position sec
        )

    );//Blog Panel
    
    $fontsPanel = array(
        'title' => __('Fonts', TEXTDOMAIN),
        'sections' => array(

            'font-body' => array(
                'title'   => __('Theme General Font', TEXTDOMAIN),
                'tooltip' => __('Select your desired font name for most of theme elements', TEXTDOMAIN),
                'fields'  => array(
                    'font-body' => array(
                        'type'   => 'select',
                        'options'=> $fontNames,
                        'value'  => 'Roboto'
                    ),
                )
            ),
            'font-headings' => array(
                'title'   => __('Headings Font', TEXTDOMAIN),
                'tooltip' => __('Select your desired font name for headings and titles', TEXTDOMAIN),
                'fields'  => array(
                    'font-headings' => array(
                        'type'   => 'select',
                        'options'=> $fontNames,
                        'value'  => 'Roboto'
                    ),
                )
            ),
            'font-shortcode' => array(
                'title'   => __('Shortcode Title Font', TEXTDOMAIN),
                'tooltip' => __('Select your desired font name for shortcode title', TEXTDOMAIN),
                'fields'  => array(
                    'font-shortcode' => array(
                        'type'   => 'select',
                        'options'=> $fontNames,
                        'value'  => 'Roboto'
                    ),
                )
            ),
			'font-navigation' => array(
			'title'   => __('Navigation Font', TEXTDOMAIN),
			'tooltip' => __('Select your desired font name for navigation section', TEXTDOMAIN),
			'fields'  => array(
			'font-shortcode' => array(
			'type'   => 'select',
			'options'=> $fontNames,
			'value'  => 'Roboto'
					),
				)
			),
			
        )

    );//$fontsPanel

    $sidebarPanel = array(
        'title' => __('Sidebars', TEXTDOMAIN),
        'sections' => array(
            'custom-sidebar' => array(
                'title'   => __('Custom Sidebar', TEXTDOMAIN),
                'tooltip' => __('Add custom sidebar that can be used in pages. You could customize sidebar widgets in widgets panel', TEXTDOMAIN),
                'fields'  => array(
                    'custom_sidebars' => array(
                        'type' => 'csv',
                        'placeholder' => __('Enter a sidebar name', TEXTDOMAIN),
                    ),
                )
            ),//custom-sidebar sec
            'sidebar-position' => array(
                'title'   => __('Page Sidebar Position', TEXTDOMAIN),
                'tooltip' => __('Choose default sidebar position for pages that has sidebar', TEXTDOMAIN),
                'fields'  => array(
                    'sidebar-position' => array(
                        'type' => 'visual-select',
                        'options' => array(/*'none'=>0,*/ 'left-side'=>1, 'right-side'=>2),
                        'class' => 'page-sidebar',
                        'value' => 2,
                    ),
                )
            ),//sidebar-position sec
        )
    );//$sidebarPanel

    $woocomerceSettingsPanel = array(
        'title' => __('Sidebars', TEXTDOMAIN),
        'sections' => array(
            'shop-sidebar-position' => array(
                'title'   => __('Woocomerce Sidebar Position', TEXTDOMAIN),
                'tooltip' => __('Choose default sidebar position for woocomerce pages', TEXTDOMAIN),
                'fields'  => array(
                    'shop-sidebar-position' => array(
                        'type' => 'visual-select',
                        'options' => array('none'=>0, 'left-side'=>1, 'right-side'=>2),
                        'class' => 'page-sidebar',
                        'value' => 2,
                    ),
                )
            ),//Shop sidebar position sec
            
 
        )
    );//woocomerce Settings Panel
    
    $socialSettingsPanel = array(
        'title' => __('Social', TEXTDOMAIN),
        'sections' => array(
            'socials' => array(
                'title'   => __('Social Network URLs', TEXTDOMAIN),
                'tooltip' => __('Enter your social network addresses in respective fields. You can clear fields to hide icons from the website user interface', TEXTDOMAIN),
                'fields'  => array(

                    'social_open_mode' => array(
                        'type' => 'select',
                        'label' => __('Open Mode', TEXTDOMAIN),
						'options'=>array("_self"=>"Open in same window","_blank"=>"Open in a  new tab"),
						'value'=>"_self"
                    ),
                    'social_facebook_url' => array(
                        'type' => 'text',
                        'label' => __('Facebook', TEXTDOMAIN),
                    ),//Facebook
                    'social_twitter_url' => array(
                        'type' => 'text',
                        'label' => __('Twitter', TEXTDOMAIN),
                    ),//twitter
                    'social_vimeo_url' => array(
                        'type' => 'text',
                        'label' => __('Vimeo', TEXTDOMAIN),
                    ),//vimeo
                    'social_youtube_url' => array(
                        'type' => 'text',
                        'label' => __('YouTube', TEXTDOMAIN),
                    ),//youtube
                    'social_googleplus_url' => array(
                        'type' => 'text',
                        'label' => __('Google+', TEXTDOMAIN),
                    ),//Google+
                    'social_dribbble_url' => array(
                        'type' => 'text',
                        'label' => __('Dribbble', TEXTDOMAIN),
                    ),//dribbble
                    'social_tumblr_url' => array(
                        'type' => 'text',
                        'label' => __('Tumblr', TEXTDOMAIN),
                    ),//Tumblr
                    'social_linkedin_url' => array(
                        'type' => 'text',
                        'label' => __('LinkedIn', TEXTDOMAIN),
                    ),//LinkedIn
                    'social_flickr_url' => array(
                        'type' => 'text',
                        'label' => __('Flickr', TEXTDOMAIN),
                    ),//flickr
                    'social_forrst_url' => array(
                        'type' => 'text',
                        'label' => __('Forrst', TEXTDOMAIN),
                    ),//forrst
                    'social_github_url' => array(
                        'type' => 'text',
                        'label' => __('GitHub', TEXTDOMAIN),
                    ),//GitHub
                    'social_lastfm_url' => array(
                        'type' => 'text',
                        'label' => __('Last.fm', TEXTDOMAIN),
                    ),//Last.fm
                    'social_paypal_url' => array(
                        'type' => 'text',
                        'label' => __('PayPal', TEXTDOMAIN),
                    ),//Paypal
                    'social_rss_url' => array(
                        'type' => 'text',
                        'label' => __('RSS Feed', TEXTDOMAIN),
                        'value' => get_bloginfo('rss2_url'),
                    ),//rss
                    'social_skype_url' => array(
                        'type' => 'text',
                        'label' => __('Skype', TEXTDOMAIN),
                    ),//skype
                    'social_wordpress_url' => array(
                        'type' => 'text',
                        'label' => __('WordPress', TEXTDOMAIN),
                    ),//wordpress
                    'social_yahoo_url' => array(
                        'type' => 'text',
                        'label' => __('Yahoo', TEXTDOMAIN),
                    ),//yahoo
                    'social_deviantart_url' => array(
                        'type' => 'text',
                        'label' => __('deviantART', TEXTDOMAIN),
                    ),//DeviantArt
                    'social_steam_url' => array(
                        'type' => 'text',
                        'label' => __('Steam', TEXTDOMAIN),
                    ),//Steam
                    'social_reddit_url' => array(
                        'type' => 'text',
                        'label' => __('reddit', TEXTDOMAIN),
                    ),//reddit
                    'social_stumbleupon_url' => array(
                        'type' => 'text',
                        'label' => __('StumbleUpon', TEXTDOMAIN),
                    ),//StumbleUpon
                    'social_pinterest_url' => array(
                        'type' => 'text',
                        'label' => __('Pinterest', TEXTDOMAIN),
                    ),//Pinterest
                    'social_xing_url' => array(
                        'type' => 'text',
                        'label' => __('XING', TEXTDOMAIN),
                    ),//XING
                    'social_blogger_url' => array(
                        'type' => 'text',
                        'label' => __('Blogger', TEXTDOMAIN),
                    ),//Blogger
                    'social_soundcloud_url' => array(
                        'type' => 'text',
                        'label' => __('SoundCloud', TEXTDOMAIN),
                    ),//SoundCloud
                    'social_delicious_url' => array(
                        'type' => 'text',
                        'label' => __('Delicious', TEXTDOMAIN),
                    ),//delicious
                    'social_foursquare_url' => array(
                        'type' => 'text',
                        'label' => __('Foursquare', TEXTDOMAIN),
                    ),//Foursquare
                    'social_instagram_url' => array(
                        'type' => 'text',
                        'label' => __('Instagram', TEXTDOMAIN),
                    ),//Instagram
                )
            ),//Favicon sec
        ),
    );

    $footerSettingsPanel = array(
        'title' => __('Footer Settings', TEXTDOMAIN),
        'sections' => array(
            'footer_title' => array(
                'title'   => __('Footer Title And Subtitle', TEXTDOMAIN),
                'tooltip' => __('Enter footer title and subtitle text here. ', TEXTDOMAIN),
                'fields'  => array(
                    'footer_title' => array(
                        'type' => 'text',
                        'label' => __('Title Text', TEXTDOMAIN),
                        'value' => 'CONTACT FORM'
                    ),//footer_title sec
                     'footer_subtitle' => array(
                        'type' => 'text',
                        'label' => __('Subtitle Text', TEXTDOMAIN),
                        'value' => ''
                    ),//footer_subtitle sec
                )
            ),//widget-areas sec
            'widget-areas' => array(
                'title'   => __('Widget Areas', TEXTDOMAIN),
                'tooltip' => __('Choose the style of widget area in footer', TEXTDOMAIN),
                'fields'  => array(
                    'footer_widgets' => array(
                        'type' => 'visual-select',
                        'options' => array('zero' => 0, 'one'=>1, 'Six-Six'=>2, 'eight-four'=>3, 'four-eight'=>4 , 'four-four-four'=>5 ),
                        'class' => 'footer-widgets',
                        'value' => 3,
                    ),
                )
            ),//widget-areas sec
            'footer-widget-banner' => array(
                'title'   => __('Widget Area Background', TEXTDOMAIN),
                'tooltip' => __('Upload an image to be shown as Widget Area background', TEXTDOMAIN),
                'fields'  => array(
                    'footer-widget-banner' => array(
                        'type' => 'upload',
                        'label' => __('Widget Area Background', TEXTDOMAIN),
                        'title' => __('Upload Footer banner', TEXTDOMAIN),
                        'referer' => 'px-settings-footer-banner'
                    ),
                )
            ),//Footer widget banner sec
            'footer-enable-map' => array(
                'title'   => __('Map Display', TEXTDOMAIN),
                'tooltip' => __('Enable or disable footer map', TEXTDOMAIN),
                'fields'  => array(
                    'footer-enable-map' => array(
                        'type'   => 'switch',
                        'state0' => __('Disabled', TEXTDOMAIN),
                        'state1' => __('Enabled', TEXTDOMAIN),
                        'value'  => 1
                    )
                )
            ),
			'footer_map_zoom_control' => array(
                'title'   => __('Display Zoom Controls', TEXTDOMAIN),
                'tooltip' => __('Enable or disable zoom control in google map', TEXTDOMAIN),
                'fields'  => array(
                    'footer_map_zoom_control' => array(
                        'type'   => 'switch',
                        'state0' => __('Disabled', TEXTDOMAIN),
                        'state1' => __('Enabled', TEXTDOMAIN),
                        'value'  => 0
                    )
                )
            )
			
			
			,//google map sec
            'footerStyleMap' => array(
                'title'   => __('Map Style', TEXTDOMAIN),
                'tooltip' => __('You can choose between available map types to be shown in cotact section.', TEXTDOMAIN),
                'fields'  => array(
                    'footerStyleMap' => array(
                        'type'   => 'switch',
                        'state0' => __('Standard', TEXTDOMAIN),
                        'state1' => __('Custom', TEXTDOMAIN),
                        'value'  => 1
                    )
                )
            ),//google map Style sec
            'footer-properties-map' => array(
                'title'   => __('Footer Google Map Properties', TEXTDOMAIN),
                'tooltip' => __('Enter your map address latitude & longitude and zoom levels. Zoom value can be from 1 to 19 where 19 is the greatest and 1 the smallest.', TEXTDOMAIN),
                'fields'  => array(
                    'footerMapLatitude' => array(
                            'type' => 'text',
                            'label' => __('Map latitude', TEXTDOMAIN),
                            'placeholder' => __('Google Maps latitude', TEXTDOMAIN),
                    ),
                    'footerMapLongitude' => array(
                            'type' => 'text',
                            'label' => __('Map longitude', TEXTDOMAIN),
                            'placeholder' => __('Google Maps longitude', TEXTDOMAIN),
                    ),
                    'footerMapZoom' => array(
                        'type'   => 'select',
                        'label' => __('Map Zoom', TEXTDOMAIN),
                        'options'=> array('1' => 'Zoom 1', '2' => 'Zoom 2', '3' => 'Zoom 3', '4' => 'Zoom 4', '5' => 'Zoom 5', '6' => 'Zoom 6', '7' => 'Zoom 7', '8' => 'Zoom 8', '9' => 'Zoom 9', '10' => 'Zoom 10', '11' => 'Zoom 11', '12' => 'Zoom 12', '13' => 'Zoom 13', '14' => 'Zoom 14', '15' => 'Zoom 15', '16' => 'Zoom 16', '17' => 'Zoom 17', '18' => 'Zoom 18', '19' => 'Zoom 19')
                    )
                )

            ),
			'map_marker' => array(
				'title'   => __('Google Map Marker', TEXTDOMAIN),
				'tooltip' => __('Upload an image to be shown as google map marker', TEXTDOMAIN),
				'fields'  => array(
					'map_marker' => array(
					'type' => 'upload',
					'label' => __('Google Map Marker', TEXTDOMAIN),
					'title' => __('Upload Google Map Marker Logo', TEXTDOMAIN),
					),
				)
			),//footer Google Map properties
            'copyright-message' => array(
                'title'   => __('Copyright', TEXTDOMAIN),
                'tooltip' => __('Enter footer copyright text. ', TEXTDOMAIN),
                'fields'  => array(
                    'footer-copyright' => array(
                        'type' => 'text',
                        'label' => __('Copyright Text', TEXTDOMAIN),
                        'value' => '&copy; 2014 PixFlow | Built With The Moon Theme'
                    ),//footer_copyright sec
                )
            ),
			//widget-areas sec
            'footer-logo' => array(
                'title'   => __('Footer logo', TEXTDOMAIN),
                'tooltip' => __('Upload an image to be shown as footer logo', TEXTDOMAIN),
                'fields'  => array(
                    'footer-logo' => array(
                        'type' => 'upload',
                        'label' => __('Footer Logo', TEXTDOMAIN),
                        'title' => __('Upload Footer Logo', TEXTDOMAIN),
                        'referer' => 'px-settings-footer-logo'
                    ),
                )
            ),//Footer banner sec
        ),
    );

    $extraSettingsPanel = array(
        'title' => __('Custom Scripts', TEXTDOMAIN),
        'sections' => array(

            'additional-js' => array(
                'title'   => __('Additional JavaScript', TEXTDOMAIN),
                'tooltip' => __('Enter custom JavaScript code such as Google Analytics code here. Please note that you should not include &lt;script&gt; tags in your scripts.', TEXTDOMAIN),
                'fields'  => array(
                    'additional-js' => array(
                        'type' => 'textarea'
                    ),
                )
            ),//additional-js sec
            'additional-css' => array(
                'title'   => __('Custom CSS', TEXTDOMAIN),
                'tooltip' => __('Enter custom CSS code such as style overrides here. Please note that you should not include &lt;style&gt; tags in your css code.', TEXTDOMAIN),
                'fields'  => array(
                    'additional-css' => array(
                        'type' => 'textarea'
                    ),
                )
            ),//additional-js sec

        ),
    );

    $apiSettingsPanel = array(
        'title' => __('API Keys', TEXTDOMAIN),
        'sections' => array(

            'google-api' => array(
                'title'   => __('Google API Key', TEXTDOMAIN),
                'tooltip' => __('Google API key for services such as Google Maps. Click <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key" target="_blank">here</a> for more information on how to obtain Google API key.', TEXTDOMAIN),
                'fields'  => array(
                    'google-api-key' => array(
                        'type' => 'text'
                    ),
                )
            ),//additional-js sec
        ),
    );

    $importExportSettingsPanel = array(
        'title' => __('Import Dummy Data', TEXTDOMAIN),
        'sections' => array(

            'import-dummy-data' => array(
                'title'   => __('Select a demo website, then choose import and set media and theme setting options. Finally, click the save button in form header. Please note that setting media option to import, will increase the import process significantly.', TEXTDOMAIN),
                'tooltip' => __('If you are new to WordPress or have problems creating posts or pages that look like the theme preview you can import dummy posts and pages here that will definitely help to understand how those tasks are done.', TEXTDOMAIN),
                'fields'  => array(
                    'demo-dummy-data' => array(
                        'label'   => __('Select demo', TEXTDOMAIN),
                        'type'   => 'select',
                        'options'=> array(
                            'mars' => 'Mars',
                            'venus'=> 'Venus',
                            'earth'=> 'Earth',
                        ),
                    ),
                    'import-dummy-data' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t Import', TEXTDOMAIN),
                        'state1' => __('Import', TEXTDOMAIN),
                        'value'  => 0
                    ),
                    'import-media' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t Import Media', TEXTDOMAIN),
                        'state1' => __('Import Media', TEXTDOMAIN),
                        'value'  => 0
                    ),
                    'import-theme-setting' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t Import Theme Settings', TEXTDOMAIN),
                        'state1' => __('Import Theme Settings', TEXTDOMAIN),
                        'value'  => 0
                    ),
                    'import-sliders' => array(
                        'type'   => 'switch',
                        'state0' => __('Don\'t Import Sliders', TEXTDOMAIN),
                        'state1' => __('Import Sliders', TEXTDOMAIN),
                        'value'  => 0
                    ),
                )
            ),//import-dummy-data sec

        ),
    );

    $panels = array(

        'general'    => $generalSettingsPanel,
        'preloader'       => $preloaderPanel,
        'notification'       => $notificationPanel,
        'menu'       => $menuPanel,
        'appearance' => $appearancePanel,
        'header'     => $headerPanel,
        'headerstyle'     => $headerstylePanel,
        'headerStartBtn' => $headerStartBtnPanel,
        'blog' 		 => $blogPanel,
        'fonts'      => $fontsPanel,
        'social'     => $socialSettingsPanel,
        'footer'     => $footerSettingsPanel,
        'woocomerce'     => $woocomerceSettingsPanel,
        'sidebar'    => $sidebarPanel,
        'extra'      => $extraSettingsPanel,
    //    'api'        => $apiSettingsPanel,
        'data'      => $importExportSettingsPanel,
    );

    $tabs = array(
        'general'           => array( 'text' => __('- General Settings', TEXTDOMAIN), 'panel' => 'general'),
        'preloader'         => array( 'text' => __('- PreLoader', TEXTDOMAIN), 'panel' => 'preloader'),
        'notification'      => array( 'text' => __('- Notification', TEXTDOMAIN), 'panel' => 'notification'),
        'menu'              => array( 'text' => __('- Menu', TEXTDOMAIN), 'panel' => 'menu'),
        'appearance'        => array( 'text' => __('- Appearance', TEXTDOMAIN), 'panel' => 'appearance'),
        'header'            => array( 'text' => __('- Intro', TEXTDOMAIN), 'panel'  => 'header'),
        'headerstyle'       => array( 'text' => __('Text Rotator', TEXTDOMAIN), 'panel'  => 'headerstyle'),
        'headerStartBtn'    => array( 'text' => __('Start Button', TEXTDOMAIN), 'panel'  => 'headerStartBtn'),
        'blog'              => array( 'text' => __('- Blog Detail', TEXTDOMAIN), 'panel'  => 'blog'),
        'fonts'             => array( 'text' => __('- Fonts', TEXTDOMAIN), 'panel'  => 'fonts'),
        'footer'            => array( 'text' => __('- Footer', TEXTDOMAIN), 'panel'  => 'footer'),
        'sidebar'           => array( 'text' => __('- Sidebar', TEXTDOMAIN), 'panel' => 'sidebar'),
        'woocomerce'        => array( 'text' => __('- Woocomerce', TEXTDOMAIN), 'panel' => 'woocomerce'),
        'social'            => array( 'text' => __('- Social', TEXTDOMAIN),  'panel' => 'social'),
        'extra'             => array( 'text' => __('Additional Scripts', TEXTDOMAIN),  'panel' => 'extra'),
    //    'api'        => array( 'text' => __('API Keys', TEXTDOMAIN),  'panel' => 'api'),
        'data'              => array( 'text' => __('Dummy Data', TEXTDOMAIN),  'panel' => 'data'),
    );

    $tabGroups = array(
        'theme-settings' => array( 'text' => __('Theme Settings', TEXTDOMAIN), 'tabs' => array('general',  'appearance' , 'preloader', 'notification' ,  'menu',  'header' , 'headerstyle' , 'headerStartBtn' ,  'blog', 'fonts', 'sidebar', 'woocomerce' , 'footer', 'social' /* , 'api' */ ) ),
        'advanced-settings' => array( 'text' => __('Advanced Options', TEXTDOMAIN), 'tabs' => array('extra') ),
        'demo-content' => array( 'text' => __('Demo Content', TEXTDOMAIN), 'tabs' => array('data') )
    );

    $settings = array(
        'document-url' => 'http://demo3.pixflow.net/promo/the-moon/documentation/',
        'support-url'  => 'http://support.pixflow.net/',
        'tabs-title'   => __('Theme Options', TEXTDOMAIN),
        'tab-groups'   => $tabGroups,
        'tabs'         => $tabs,
        'panels'       => $panels,
    );

    return $settings;
}