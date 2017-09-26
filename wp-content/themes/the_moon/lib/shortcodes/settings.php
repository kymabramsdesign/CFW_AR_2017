<?php
/*row span6 span6 row*/
$pxScTemplate['row66'] = array(
    'shortcode' =>  '[row {attr}]<br />[span6][/span6]<br />[span6][/span6]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/*row span4 span4 span4 row*/
$pxScTemplate['row444'] = array(
    'shortcode' =>  '[row {attr}]<br />[span4][/span4]<br />[span4][/span4]<br />[span4][/span4]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/*row span8 span4 row*/
$pxScTemplate['row84'] = array(
    'shortcode' =>  '[row {attr}]<br />[span8][/span8]<br />[span4][/span4]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/*row span3 span3 span3 span3 row*/
$pxScTemplate['row3333'] = array(
    'shortcode' =>  '[row {attr}]<br />[span3][/span3]<br />[span3][/span3]<br />[span3][/span3]<br />[span3][/span3]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/*row span9 span3 row*/
$pxScTemplate['row93'] = array(
    'shortcode' =>  '[row {attr}]<br />[span9][/span9]<br />[span3][/span3]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);


/*row*/
$pxScTemplate['row'] = array(
    'shortcode' => '[row {attr}]<br />[/row]',
    'fields' => array(
        'topSpace' => array(
            'type'  => 'text',
            'title' => __('Top Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row top margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'bottomSpace' => array(
            'type'  => 'text',
            'title' => __('Bottom Margin', TEXTDOMAIN),
            'desc'  => __('Enter the row bottom margin (e.g 100)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* Color section */

$pxScTemplate['section_alt'] = array(
    'shortcode' => '[section_alt {attr}][/section_alt]',
    'fields' => array(
        'background_color' => array(
            'type'  => 'color',
            'title' => __('Background\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* Separator */

$pxScTemplate['vc_separator'] = array(
    'shortcode' => '[vc_separator {attr}/]',
    //'flags'     => 'preview',//Has preview

    'fields' => array(
        'size' => array(
            'type' => 'select',
            'title' => __('Separator size', TEXTDOMAIN),
            'desc'  => __('Choose the size of separator', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('full' => 'Full Width', 'small' => 'Small', 'small-center' => 'Small Center', 'medium' => 'Medium', 'medium-center' => 'Medium Center'),
            'option-flags' => array('full' => 'default'),
        ),
        'margin' => array(
            'type' => 'select',
            'title' => __('Vertical Spacing', TEXTDOMAIN),
            'desc'  => __('Select size of vertical space', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('default' => 'Default', 'small' => 'Small', 'medium' => 'Medium'),
            'option-flags' => array('default' => 'default'),
        ),
        'thickness' => array(
            'type' => 'select',
            'title' => __('Thickness', TEXTDOMAIN),
            'desc'  => __('Select thickness of separator', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('thick' => 'Thick', 'thin' => 'Thin'),
            'option-flags' => array('thin' => 'default'),
        ),
        'color' => array(
            'type'  => 'color',
            'title' => __('Separator\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* Separator with title */

$pxScTemplate['title_separator'] = array(
    'shortcode' => '[vc_text_separator {attr}/]',
    //'flags'     => 'preview',//Has preview

    'fields' => array(
        'title' => array(
            'type' => 'text',
            'title' => __('Title Text', TEXTDOMAIN),
            'desc'  => __('add a title for your separator', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'style' => array(
            'type' => 'select',
            'title' => __('Separator style', TEXTDOMAIN),
            'desc'  => __('Select separator title position', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('left' => 'Left', 'center' => 'Center'),
            'option-flags' => array('left' => 'default'),
        ),
    )
);

/* Team member */

$pxScTemplate['team_member'] = array(
    'shortcode' => '[team_member {attr}][/team_member]',

    'fields' => array(
        'name' => array(
            'type' => 'text',
            'title' => __('Name', TEXTDOMAIN),
            'desc'  => __('Name of the team member', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'title' => array(
            'type' => 'text',
            'title' => __('Job Title', TEXTDOMAIN),
            'desc'  => __('Team member\'s job title', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'image' => array(
            'type' => 'upload',
            'title' => __('Image Address', TEXTDOMAIN),
            'desc'  => __('Optional URL of the person\'s image', TEXTDOMAIN),
            'flags' => 'attribute',
        ),
        'style' => array(
            'type'  => 'select',
            'title' => __('style', TEXTDOMAIN),
            'desc'  => __('Choose between dark and light styles', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('dark' => 'Dark', 'light' => 'Light'),
            'option-flags' => array('dark' => 'default'),
        ),
        'team_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select team member\'s animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'team_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay', TEXTDOMAIN),
            'desc'  => __('Enter animation delay (in milliseconds)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('Optional url to another web page', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'target' => array(
            'type' => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same page or a blank browser window', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Same window', '_blank' => 'New window'),
            'option-flags' => array('_self' => 'default'),
        ),
        'description' => array(
            'type' => 'textarea',
            'title' => __('Description', TEXTDOMAIN),
            'desc'  => __('Small description text about the person', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
    )
);

/* Team member icon */

$pxScTemplate['team_icon'] = array(
    'shortcode' => '[team_icon {attr}/]',

    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Icon title text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('Optional url to another web page', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'target' => array(
            'type' => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same page or a blank browser window', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Same window', '_blank' => 'New window'),
            'option-flags' => array('_self' => 'default'),
        ),
        'icon' => array(
            'type'  => 'icon',
            'title' => __('Choose an icon', TEXTDOMAIN),
            'desc'  => __('Select an icon for team member', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
    )
);

/* Accordion tab */

$pxScTemplate['accordion_tab'] = array(
    'shortcode' => '[accordion_tab {attr}]{content}[/accordion_tab]',

    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Tab title text', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'keepopen' => array(
            'type' => 'select',
            'title' => __('Keep Open', TEXTDOMAIN),
            'desc'  => __('Keep the tab content open', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('' => 'No, don\'t show content', 'yes' => 'Yes, show contents'),
            'option-flags' => array('' => 'default'),
        ),
        'content' => array(
            'type'  => 'textarea',
            'title' => __('Content', TEXTDOMAIN),
            'desc'  => __('Enter some description for your tab', TEXTDOMAIN),
        ),
    )
);

/* Toggle tab */

$pxScTemplate['toggle_tab'] = $pxScTemplate['accordion_tab'];
$pxScTemplate['toggle_tab']['shortcode'] = '[toggle_tab {attr}]{content}[/toggle_tab]';

/* Testimonials Group */ 

$pxScTemplate['testimonial_group'] = array(
    'shortcode' => '[testimonial_group {attr}]<br />[/testimonial_group]',

    'fields' => array(
       'animation' => array(
            'type'  => 'select',
            'title' => __('Animation Mode', TEXTDOMAIN),
            'desc'  => __('Choose between Fade and Slide Mode', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('fade' => 'Fade', 'slide' => 'Slide'),
            'option-flags' => array('fade' => 'default'),
        ),
        'skin' => array(
            'type'  => 'select',
            'title' => __('Skin', TEXTDOMAIN),
            'desc'  => __('Choose between dark and light skins', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('dark' => 'Dark', 'light' => 'Light'),
            'option-flags' => array('dark' => 'default'),
        ),
    )
);

/* Textbox */

$pxScTemplate['textbox'] = array(
    'shortcode' => '[textbox {attr}][/textbox]',

    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Enter title text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title_color' => array(
            'type'  => 'color',
            'title' => __('Title\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title_fontsize' => array(
            'type'  => 'select',
            'title' => __('Tilte Font Size', TEXTDOMAIN),
            'desc'  => __('Select Title Font Size', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( '20' => '20', '25' => '25', '32' => '32' , '38' => '38' , '45' => '45' , '56' => '56' , '123' => '123' ),
            'option-flags' => array('none' => 'default'),
        ),
        'text_align' => array(
            'type'  => 'select',
            'title' => __('Text Align', TEXTDOMAIN),
            'desc'  => __('Select text align', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( 'left' => 'Left', 'right' => 'Right', 'center' => 'Center'),
            'option-flags' => array('left' => 'default'),
        ),
        'text_title_style' => array(
            'type'  => 'select',
            'title' => __('Tilte Style', TEXTDOMAIN),
            'desc'  => __('Select Title style', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( 'none' => 'None', 'border' => 'Border', 'underline' => 'Underline'),
            'option-flags' => array('none' => 'default'),
        ),
        'text_border_underline_color' => array(
            'type'  => 'color',
            'title' => __('Tile\'s Border/Underline Color', TEXTDOMAIN),
            'desc'  => __('Enter optional border or underline\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'text_under_align' => array(
            'type'  => 'select',
            'title' => __('Text Underline\'s Align', TEXTDOMAIN),
            'desc'  => __('Select text Underline\'s  align', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( 'left' => 'Left', 'right' => 'Right', 'center' => 'Center'),
            'option-flags' => array('left' => 'default'),
        ),
        'text_content' => array(
            'type'  => 'textarea',
            'title' => __('Content', TEXTDOMAIN),
            'desc'  => __('Enter Content Here', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'content_fontsize' => array(
            'type'  => 'select',
            'title' => __('Content\'s Font Size', TEXTDOMAIN),
            'desc'  => __('Select Content Font Size', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( '12' => '12', '13' => '13', '14' => '14' , '16' => '16'),
            'option-flags' => array('none' => 'default'),
        ),
        'text_content_color' => array(
            'type'  => 'color',
            'title' => __('Content\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional Content\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'text_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select text animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'text_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay  (in milliseconds)', TEXTDOMAIN),
            'desc'  => __('Enter animation delay', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('Optional url to another web page', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'target' => array(
            'type'  => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same tab or a blank browser tab', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Open in same window', '_blank' => 'Open in new window'),
            'option-flags' => array('_self' => 'default'),
        ),
    )
);


/* Imagebox */

$pxScTemplate['imagebox'] = array(
    'shortcode' => '[imagebox {attr}][/imagebox]',

    'fields' => array(
        'image_url' => array(
            'type' => 'upload',
            'title' => __('Image Address', TEXTDOMAIN),
            'desc'  => __('Optional URL of the image', TEXTDOMAIN),
            'flags' => 'attribute',
        ),
        'image_hover' => array(
            'type'  => 'select',
            'title' => __('Image Box hover', TEXTDOMAIN),
            'desc'  => __('Enable or Disbale Image Box Hover', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('disable' => 'Disable','enable' => 'Enable',),
            'option-flags' => array('disable' => 'default'),
        ),
        'image_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select image\'s animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'image_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay', TEXTDOMAIN),
            'desc'  => __('Enter animation delay (in milliseconds)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Enter title text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title_color' => array(
            'type'  => 'color',
            'title' => __('Title\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'subtitle' => array(
            'type'  => 'text',
            'title' => __('Subtitle', TEXTDOMAIN),
            'desc'  => __('Enter subtitle text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'subtitle_color' => array(
            'type'  => 'color',
            'title' => __('Subtitle\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional subtitle\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'content' => array(
            'type' => 'textarea',
            'title' => __('Text', TEXTDOMAIN),
            'desc'  => __('Enter your text content here', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'image_text_color' => array(
            'type'  => 'color',
            'title' => __('Text\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional text\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'image_text_align' => array(
            'type'  => 'select',
            'title' => __('Text Align', TEXTDOMAIN),
            'desc'  => __('Select text align', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array( 'left' => 'Left', 'right' => 'Right', 'center' => 'Center'),
            'option-flags' => array('left' => 'default'),
        ),
        'image_text_background_color' => array(
            'type'  => 'color',
            'title' => __('Text\'s Background Color', TEXTDOMAIN),
            'desc'  => __('Enter optional text\'s  background color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'image_text_border' => array(
            'type'  => 'select',
            'title' => __('Image Box border', TEXTDOMAIN),
            'desc'  => __('Enable or Disbale Image Box border', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('disable' => 'Disable','enable' => 'Enable',),
            'option-flags' => array('disable' => 'default'),
        ),
        'image_text_border_color' => array(
            'type'  => 'color',
            'title' => __('Image Box Border\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional border\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('Optional url to another web page', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'target' => array(
            'type'  => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same tab or a blank browser tab', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Open in same window', '_blank' => 'Open in new window'),
            'option-flags' => array('_self' => 'default'),
        ),
    )
);

/* Iconbox */

$pxScTemplate['iconbox_top_noborder'] = array(
    'shortcode' => '[iconbox_top_noborder {attr}]{content}[/iconbox_top_noborder]',

    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Enter title text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title_color' => array(
            'type'  => 'color',
            'title' => __('Title\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'icon_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select iconBox\'s animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'icon_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay', TEXTDOMAIN),
            'desc'  => __('Enter animation delay (in milliseconds)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        //'icon_position' => array(
        //    'type'  => 'select',
        //    'title' => __('Icon Position', TEXTDOMAIN),
        //    'desc'  => __('Select icon\'s position (left or top of the box)', TEXTDOMAIN),
        //    'flags' => 'attribute',//CSV
        //    'options' => array('left' => 'Left', 'top' => 'Top'),
        //    'option-flags' => array('left' => 'default'),
        //),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('Optional url to another web page', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'url_text' => array(
            'type' => 'text',
            'title' => __('Link Text', TEXTDOMAIN),
            'desc'  => __('Enter link\'s text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'target' => array(
            'type'  => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same tab or a blank browser tab', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Open in same window', '_blank' => 'Open in new window'),
            'option-flags' => array('_self' => 'default'),
        ),
        'content_text' => array(
            'type'  => 'textarea',
            'title' => __('Content', TEXTDOMAIN),
            'desc'  => __('Enter some description for your IconBox', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'content_color' => array(
            'type'  => 'color',
            'title' => __('Content\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional content\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'icon' => array(
            'type'  => 'icon',
            'title' => __('Choose an icon', TEXTDOMAIN),
            'desc'  => __('Select an icon for the top of the box', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'icon_color' => array(
            'type'  => 'color',
            'title' => __('Icon\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional icon\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* PieChart */

$pxScTemplate['piechart'] = array(
    'shortcode' => '[piechart {attr}][/piechart]',

    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'title' => __('Piechart Title', TEXTDOMAIN),
            'desc'  => __('Enter Piechart title text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'title_color' => array(
            'type'  => 'color',
            'title' => __('Title\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional title\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'subtitle' => array(
            'type'  => 'text',
            'title' => __('Piechart Subtitle', TEXTDOMAIN),
            'desc'  => __('Enter Piechart subtitle text', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'subtitle_color' => array(
            'type'  => 'color',
            'title' => __('Subtitle\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional subtitle\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'piechart_percent' => array(
            'type'  => 'text',
            'title' => __('Piechart Percent', TEXTDOMAIN),
            'desc'  => __('Enter the number showing your progress in related skill here.', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'piechart_color' => array(
            'type'  => 'color',
            'title' => __('Piechart Color', TEXTDOMAIN),
            'desc'  => __('Enter optional Pie Chart\'s color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'piechart_icon' => array(
            'type'  => 'icon',
            'title' => __('Choose an icon', TEXTDOMAIN),
            'desc'  => __('Select an icon for the top of the box', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
        ),
        'piechart_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select piechart\'s animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'piechart_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay', TEXTDOMAIN),
            'desc'  => __('Enter animation delay (in milliseconds)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* SocailLink */

$pxScTemplate['socialLink'] = array(
    'shortcode' => '[socialLink {attr}][/socialLink]',
    'fields' => array(
        'sociallink_url' => array(
            'type'  => 'text',
            'title' => __('Socail Network URL', TEXTDOMAIN),
            'desc'  => __('Enter SocailLink URL', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'sociallink_type' => array(
            'type'  => 'select',
            'title' => __('Social Network Type', TEXTDOMAIN),
            'desc'  => __('Select socail link type)', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'vimeo' => 'Vimeo',
                'youtube' => 'YouTube',
                'googleplus' => 'Google+',
                'dribbble' => 'Dribbble',
                'tumblr' => 'Tumblr',
                'linkedin' => 'linkedin',
                'flickr4' => 'Flickr',
                'forrst' => 'forrst',
                'github5' => 'github',
                'lastfm' => 'lastfm',
                'paypal' => 'paypal',
                'feed2' => 'RSS',
                'skype' => 'skype',
                'wordpress' => 'wordpress',
                'yahoo' => 'yahoo',
                'steam' => 'steam',
                'reddit' => 'reddit',
                'stumbleupon2' => 'stumbleupon',
                'pinterest' => 'pinterest',
                'deviantart' => 'deviantart',
                'xing2' => 'xing',
                'blogger' => 'blogger',
                'soundcloud' => 'soundcloud',
                'delicious' => 'delicious',
                'foursquare' => 'foursquare',
                'instagram' => 'instagram',
                ),
            'option-flags' => array('default' => 'default'),
        ),
        'sociallink_style' => array(
            'type' => 'select',
            'title' => __('social link style', TEXTDOMAIN),
            'desc'  => __('Choose between Dark and Light', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('dark' => 'Dark', 'light' => 'Light'),
            'option-flags' => array('dark' => 'Dark'),
        ),
    )
);

/* Conter Box */

$pxScTemplate['conterbox'] = array(
    'shortcode' => '[conterbox {attr}]{content}[/conterbox]',
    'fields' => array(
        'counter_number' => array(
            'type'  => 'text',
            'title' => __('Number', TEXTDOMAIN),
            'desc'  => __('enter number which will be shown in counter', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'counter_number_color' => array(
            'type'  => 'color',
            'title' => __('counter\'s number Color', TEXTDOMAIN),
            'desc'  => __('Enter optional counter\'s number color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'counter_text' => array(
            'type' => 'text',
            'title' => __('Counter title', TEXTDOMAIN),
            'desc'  => __('Enter counter title', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'counter_text_color' => array(
            'type'  => 'color',
            'title' => __('Counter title color', TEXTDOMAIN),
            'desc'  => __('Enter optional counter\'s text color (e.g #CCCCCC or gray)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'counter_animation' => array(
            'type'  => 'select',
            'title' => __('Animation', TEXTDOMAIN),
            'desc'  => __('Select counter\'s animation', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('none' => 'None','fade-in' => 'Fade in','fade-in-top' => 'Fade in from top', 'fade-in-left' => 'Fade in form left', 'fade-in-right' => 'Fade in form right', 'fade-in-bottom' => 'Fade in form bottom' , 'grow-in' => 'Grow in' ),
            'option-flags' => array('top' => 'default'),
        ),
        'counter_animation_delay' => array(
            'type'  => 'text',
            'title' => __('Animation Delay', TEXTDOMAIN),
            'desc'  => __('Enter animation delay (in milliseconds)', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* video vimeo */

$pxScTemplate['video_vimeo'] = array(
    'shortcode' => '[video_vimeo {attr}][/video_vimeo]',
    'fields' => array(
        'vimeo_id' => array(
            'type'  => 'text',
            'title' => __('vimeo ID', TEXTDOMAIN),
            'desc'  => __('Enter vimeo ID', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        //'vimeo_height' => array(
        //    'type' => 'text',
        //    'title' => __('vimeo height', TEXTDOMAIN),
        //    'desc'  => __('Enter vimeo height', TEXTDOMAIN),
        //    'flags' => 'attribute,empty-remove'//CSV
        //),
        //'vimeo_width' => array(
        //    'type' => 'text',
        //    'title' => __('vimeo width', TEXTDOMAIN),
        //    'desc'  => __('Enter vimeo width', TEXTDOMAIN),
        //    'flags' => 'attribute,empty-remove'//CSV
        //),
    )
);

/* video YouTube  */

$pxScTemplate['video_youtube'] = array(
    'shortcode' => '[video_youtube {attr}][/video_youtube]',
    'fields' => array(
        'youtube_id' => array(
            'type'  => 'text',
            'title' => __('YouTube ID', TEXTDOMAIN),
            'desc'  => __('Enter YouTube ID', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        //'youtube_height' => array(
        //    'type' => 'text',
        //    'title' => __('youtube height', TEXTDOMAIN),
        //    'desc'  => __('Enter youtube height', TEXTDOMAIN),
        //    'flags' => 'attribute,empty-remove'//CSV
        //),
        //'youtube_width' => array(
        //    'type' => 'text',
        //    'title' => __('youtube width', TEXTDOMAIN),
        //    'desc'  => __('Enter youtube width', TEXTDOMAIN),
        //    'flags' => 'attribute,empty-remove'//CSV
        //),
    )
);

/* Audio Soundcloud  */

$pxScTemplate['audio_soundcloud'] = array(
    'shortcode' => '[audio_soundcloud {attr}][/audio_soundcloud]',
    'fields' => array(
        'soundcloud_id' => array(	
            'type'  => 'text',
            'title' => __('SoundCloud ID', TEXTDOMAIN),
            'desc'  => __('Enter SoundCloud ID', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'soundcloud_height' => array(
            'type' => 'text',
            'title' => __('SoundCloud height', TEXTDOMAIN),
            'desc'  => __('Enter SoundCloud height', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'soundcloud_width' => array(
            'type' => 'text',
            'title' => __('SoundCloud width', TEXTDOMAIN),
            'desc'  => __('Enter SoundCloud width', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* Button */

$pxScTemplate['button'] = array(
    'shortcode' => '[button {attr}/]',
    //'flags'     => 'preview',//Has preview
    
    'fields' => array(
        'text' => array(
            'type'  => 'text',
            'title' => __('Text', TEXTDOMAIN),
            'desc'  => __('Button text', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'title' => array(
            'type'  => 'text',
            'title' => __('Title', TEXTDOMAIN),
            'desc'  => __('Text that will be shown in tool tip on the button', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
       'text_color' => array(
            'type'  => 'color',
            'title' => __('button text Color', TEXTDOMAIN),
            'desc'  => __('Enter optional button\'s text color', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
       'button_color' => array(
            'type'  => 'color',
            'title' => __('button\'s Color', TEXTDOMAIN),
            'desc'  => __('Enter optional button\'s color', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'url' => array(
            'type' => 'text',
            'title' => __('Link', TEXTDOMAIN),
            'desc'  => __('URL to another web page', TEXTDOMAIN),
            'flags' => 'attribute'//CSV
        ),
        'target' => array(
            'type' => 'select',
            'title' => __('Link\'s target', TEXTDOMAIN),
            'desc'  => __('Open the link in the same page or a blank browser window', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('_self' => 'Same window', '_blank' => 'New window'),
            'option-flags' => array('_self' => 'default'),
        ),
        'size' => array(
            'type' => 'select',
            'title' => __('Size', TEXTDOMAIN),
            'desc'  => __('Choose between three button sizes', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('standard' => 'Standard', 'small' => 'Small', 'large' => 'Large'),
            'option-flags' => array('standard' => 'default'),
        ),
    )
);

/* LayerSlider */

$pxScTemplate['layerslider'] = array(
    'shortcode' => '[layerslider {attr}/]',

    'fields' => array(
        'id' => array(
            'type'  => 'select',
            'title' => __('Slider', TEXTDOMAIN),
            'desc'  => __('Select a slider that is created in LayerSlider WP panel', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => px_get_layerSlider_slides(),
            'option-flags' => array('no-slider' => 'default'),
        ),
    )
);

/* Contact Form 7 */

$pxScTemplate['cf7'] = array(
    'shortcode' => '[contact-form-7 {attr}/]',

    'fields' => array(
        'id' => array(
            'type'  => 'select',
            'title' => __('Form', TEXTDOMAIN),
            'desc'  => __('Select a form that is created in "Contact" panel', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => px_get_contact_form7_forms(),
            'option-flags' => array('no-form' => 'default'),
        ),
    )
);


/* Google Map */

$gmapZoom = array();

for($i=1; $i<=19;$i++)
    $gmapZoom[$i] = $i;

$pxScTemplate['gmap'] = array(
    'shortcode' => '[gmap {attr}][/gmap]',

    'fields' => array(
        'address' => array(
            'type'  => 'text',
            'title' => __('Address', TEXTDOMAIN),
            'desc'  => __('Specify an address on the map or use latitude and longitude fields below', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'lat' => array(
            'type'  => 'text',
            'title' => __('Latitude', TEXTDOMAIN),
            'desc'  => __('Enter Latitude here, if you enter this value you must enter longitude as well', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'lng' => array(
            'type'  => 'text',
            'title' => __('Longitude', TEXTDOMAIN),
            'desc'  => __('Enter Longitude here, if you enter this value you must enter latitude as well', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'zoom' => array(
            'type'  => 'select',
            'title' => __('Zoom', TEXTDOMAIN),
            'desc'  => __('Select a zoom level', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => $gmapZoom,
        ),
        'controls' => array(
            'type'  => 'select',
            'title' => __('Map Controls', TEXTDOMAIN),
            'desc'  => __('Should map controls be visible or hidden', TEXTDOMAIN),
            'flags' => 'attribute',//CSV
            'options' => array('show'=>'Visible', 'hidden'=>'Hidden'),
            'option-flags' => array('show' => 'default'),
        ),
        'height' => array(
            'type'  => 'text',
            'title' => __('Map Height', TEXTDOMAIN),
            'desc'  => __('Optional map height in pixels. Default value is 300', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);

/* Google Map Marker */

$pxScTemplate['gmap_marker'] = array(
    'shortcode' => '[gmap_marker {attr}/]',

    'fields' => array(
        'address' => array(
            'type'  => 'text',
            'title' => __('Address', TEXTDOMAIN),
            'desc'  => __('Specify an address on the map or use latitude and longitude fields below', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'lat' => array(
            'type'  => 'text',
            'title' => __('Latitude', TEXTDOMAIN),
            'desc'  => __('Enter Latitude here, if you enter this value you must enter longitude as well', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'lng' => array(
            'type'  => 'text',
            'title' => __('Longitude', TEXTDOMAIN),
            'desc'  => __('Enter Longitude here, if you enter this value you must enter latitude as well', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
        'icon' => array(
            'type'  => 'text',
            'title' => __('Icon', TEXTDOMAIN),
            'desc'  => __('Optional marker icon url', TEXTDOMAIN),
            'flags' => 'attribute,empty-remove'//CSV
        ),
    )
);
