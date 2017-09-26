<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name=”format-detection” content=”telephone=no”>
	
    <title><?php wp_title('-', true , 'right'); ?></title>

    <?php if(px_opt('favicon') != ""){ ?>
    <link rel="shortcut icon" href="<?php px_eopt('favicon'); ?>"  />
    <?php } else { ?>
    <link rel="shortcut icon" href="<?php echo THEME_IMAGES_URI ?>/favicon.png" />
    <?php } ?>
	
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]><script src="<?php echo THEME_JS_URI ?>/html5shiv.js"></script><![endif]-->

    <!-- Theme Hook -->
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <div id="top"></div>
    
    <div id="scrollToTop" class="visible-desktop">
        <a href="#top"></a>
    </div>
    
    <div class="layout">

    <!-- Preloader -->
    <?php if( px_opt('loader_display') == 1 ) { ?>
    
	    <div id="preloader">
	        <div class="preloader-image" style="background-image:url(<?php pixflow_preloader(); ?>);">
                <div id="circle"></div>
            </div>
	    </div>
        
    <?php } ?>

    <?php if ( px_opt('notification_display') == 1) {  ?>

        <!-- notification bar  -->
        <div id="notification" class="visible-desktop">
            <div class="container">
        
                <!-- notification bar - message  -->
                <div class="notificationMessage">
                    
                    
                    <?php if ( px_opt('notification_icon') ) { ?> 
                        <!-- notification bar - icon  -->
                        <div class="notificationIcon icon-<?php px_eopt('notification_icon'); ?>"></div> 
                    <?php } ?>
                    
                    <?php if ( px_opt('notification_title') ) { ?>
                         <!-- notification bar - title  -->
                         <div class="notificationTitle">
                            <?php px_eopt('notification_title'); ?>
                         </div>
                    <?php } ?>
                    
                    <?php if ( px_opt('notification_text') ) { ?>
                         <!-- notification bar - text  -->
                         <div class="notificationText">
                            <?php px_eopt('notification_text'); ?>
                         </div>
                    <?php } ?>

                </div>

                <!-- notification bar - buttons  -->
                <div class="notificationBtns">
                
                <?php if ( px_opt('notification_more_info') ) { ?>
                    <!-- notification bar - More Info button   -->
                    <a class="readmorebtn" target="<?php px_eopt('notification_target'); ?>" href="<?php px_eopt('notification_more_URL'); ?>">
                        <?php px_eopt('notification_more_info'); ?>
                    </a>
                <?php } ?>

                    <a class="closebtn icon-close" href="#"></a>
                    
                </div>
            </div>
        </div>

    <?php } ?>