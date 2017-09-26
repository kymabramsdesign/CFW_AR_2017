<?php 

   $headerStyle = px_opt('header-style'); 
   $heaerStyleDefault = 'fixed-menu';

   //get menu hover Style option
   if (px_opt('menu-hover-style') == 0) {
        $menuHoverStyle = 'borderhover';
   } else {
        $menuHoverStyle = 'fillhover';
   }

?>


<?php 

	$imgUrl = '/content/img/logo.png';

	if(is_single()){
		$imgUrl = '/content/img/logo-dark.png';
	}

?>

<?php if ( $headerStyle == 'wave-menu') { ?>

    <!-- Header Navigation  -->
    <header id="pxHeader" class="wave-menu-header">
	    <div class="wrap headerWrap">

            <div class="wave-menu  hidden-tablet hidden-phone">  
		        <div class="menu-wrap">

                    <nav class="navigation menu">


                        <!-- Secound Logo -->
				        <?php 

				        	if(!is_single()){
				        		$logoSecond = px_opt('logo-second') == "" ? THEME_ASSETS_URI . $imgUrl : px_opt('logo-second');
				        	}else{
				        		$logoSecond = THEME_ASSETS_URI . $imgUrl;
				        	}
				        
				        ?>



				        <a class="logo" href="<?php echo get_site_url(); ?>/#home">
					        <img  class="secoundLogo" src="<?php echo esc_url($logoSecond); ?>" alt="Logo" />
				        </a>

                        <div class="menu-list">

                            <?php
                            /* CUSTOM NAV MENU */

                           wp_nav_menu(array(
								            'container' =>'',
								            'menu_class' => 'clearfix',
								            'before'     => '',
		                                    'menu_class' => 'menu-list',
								            'theme_location' => 'top-nav',
								            'fallback_cb' => false , 
		                                    'after' => ''
							            ));
                      /* 
													ORIGINAL MENU

							            wp_nav_menu(array(
								            'container' =>'',
								            'menu_class' => 'clearfix',
								            'before'     => '',
		                                    'menu_class' => 'menu-list',
								            'theme_location' => 'primary-nav',
								            'walker'     => new Px_Nav_Walker(),
								            'fallback_cb' => false , 
		                                    'after' => ''
							            ));
					            */
					        ?>
                    
                        </div>

			        </nav>

			        <div class="morph-shape" id="morph-shape" data-morph-open="M0,100h1000V0c0,0-136.938,0-224,0C583,0,610.924,0,498,0C387,0,395,0,249,0C118,0,0,0,0,0V100z">
				        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1000 100" preserveAspectRatio="none">

                            <path d="m1,100.5l1000,0l0,0c0,0-136.93799,-102-224,-102c-156,-3 -195.23499,27.74399 -260,54c-72.76501,30.25601-120,48-236,47c-116,1-280,1-280,1l0,0z" transform="rotate(180 499,46.375)"/>
  
                        </svg>
			        </div>

		        </div>
            </div> 

            <div class="container clearfix">
			    <a id="phoneNav" class="navigation-button hidden-desktop" href="#">
				    <span id="phoneNavIcon" class="icon-list"></span>
			    </a>
		    </div>

		    <!-- menu button -->
            <a id="open-button" class=" hidden-tablet hidden-phone link-menu trigger"><span>Menu</span></a>
     
            <?php
                //Because it pushes the entire content to a side, it should be placed outside of layout element
                get_template_part( 'templates/navigation-mobile' );
            ?>

        </div>
    </header>

<?php }  else  {   // if Menu style is Sticky - hybrid - Scroll to Fade_in ?>


    <!-- Header Navigation  -->
    <header id="pxHeader" data-fixed="<?php  if ( isset($headerStyle) ) { echo esc_attr($headerStyle); } else { echo $heaerStyleDefault; } ?>"  class="<?php echo $menuHoverStyle ; ?> <?php px_eopt('header-style'); ?>" >
	    <div class="wrap headerWrap">
		    <div id="logoMenuHeader">
	
			    <!--menu background color -->
			    <div id="menuBgColor"></div>
		
			    <div class="container clearfix">

				    <!-- Secound Logo -->
				    <?php 
				    
				    if(!is_single()){
				    	$logoSecond = px_opt('logo-second') == "" ? THEME_ASSETS_URI . $imgUrl : px_opt('logo-second'); 
				    }else{
				    	$logoSecond = THEME_ASSETS_URI . $imgUrl; 
				    }


				    ?>


				    <a class="logo" href="<?php echo get_site_url(); ?>/#home">
					    <img  class="secoundLogo" src="<?php echo esc_url($logoSecond); ?>" alt="Logo" />
				    </a>
				    
                    <?php   
           
                        /**
                        * Check if WooCommerce is active
                        **/
                        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            
                                /*  woocomerce drop down cart widget */
                                dynamic_sidebar( 'woocommerce_dropdown_cart' );
                        }
            
                    ?>
                
				    <natcasesort(array)v class="navigation hidden-tablet hidden-phone">

                    <?php
                            /* CUSTOM NAV MENU */

                         wp_nav_menu(array(
							            'container' =>'',
							            'menu_class' => 'clearfix',
							            'before'     => '',
	                                    'menu_class' => 'menu-list',
							            'theme_location' => 'top-nav',
							            'fallback_cb' => false , 
	                                    'after' => ''
						            ));
                      /* 
													ORIGINAL MENU

							            wp_nav_menu(array(
								            'container' =>'',
								            'menu_class' => 'clearfix',
								            'before'     => '',
		                                    'menu_class' => 'menu-list',
								            'theme_location' => 'primary-nav',
								            'walker'     => new Px_Nav_Walker(),
								            'fallback_cb' => false , 
		                                    'after' => ''
							            ));
					            */
					        ?>

				    </nav>
                
				  <!--  <a	id="phoneNav" class="navigation-button hidden-desktop" href="#">
					    <span id="phoneNavIcon" class="icon-list"></span>
				    </a> -->

			    </div>
		    </div>	
		
		    <?php  if ( isset($headerStyle)) { 
				    if ( $headerStyle == 'scooter-menu' ) { ?>  
				
				    <div id="logoHeader">
				
				    <!--menu background color -->
				    <div class="menuBgColor"></div>
			
					    <div class="container clearfix">
						
						    <!-- First Logo -->
						    <?php 

						    if(!is_single()){
						    	$logo = px_opt('logo') == "" ? THEME_ASSETS_URI . $imgUrl : px_opt('logo'); 
						    }else{
						    	$logo = THEME_ASSETS_URI . $imgUrl;
						    }
						    

						    ?>

						    <a class="logo" href="<?php echo get_site_url(); ?>/#home">
							    <img  class="firstLogo" src="<?php echo esc_url($logo); ?>" alt="Logo" />
						    </a>
                        
                            <?php   
           
                                /**
                                * Check if WooCommerce is active
                                **/
                                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            
                                        /*  woocomerce drop down cart widget */
                                        dynamic_sidebar( 'woocommerce_dropdown_cart' );
                                }
            
                            ?>
                
				            <nav class="navigation hidden-tablet hidden-phone">

                           <?php
                            /* CUSTOM NAV MENU */

                           wp_nav_menu(array(
								            'container' =>'',
								            'menu_class' => 'clearfix',
								            'before'     => '',
		                                    'menu_class' => 'menu-list',
								            'theme_location' => 'top-nav',
								            'fallback_cb' => false , 
		                                    'after' => ''
							            ));
                      /* 
													ORIGINAL MENU

							            wp_nav_menu(array(
								            'container' =>'',
								            'menu_class' => 'clearfix',
								            'before'     => '',
		                                    'menu_class' => 'menu-list',
								            'theme_location' => 'primary-nav',
								            'walker'     => new Px_Nav_Walker(),
								            'fallback_cb' => false , 
		                                    'after' => ''
							            ));
					            */
					        ?>

				            </nav>
                
				            <a id="phoneNav" class="navigation-button hidden-desktop" href="#">
					            <span id="phoneNavIcon" class="icon-list"></span>
				            </a>
                

					    </div>
				    </div>	
				
			    <?php  } 
		     } ?>
         
         
            <?php
                //Because it pushes the entire content to a side, it should be placed outside of layout element
                get_template_part( 'templates/navigation-mobile' );

            ?>

	    </div>
    </header>
    <!-- Header Navigation End -->
    
<?php } ?>