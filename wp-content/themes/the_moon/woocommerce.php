<?php

    get_header();

    // menu
    get_template_part('templates/section', 'nav');
    
    get_template_part('templates/shop-head');

    //Get the sidebar option
    $sidebarPos = px_opt('shop-sidebar-position');
    
    if ( get_post() )
    {
        // Get Page Post Id
        $post_id = get_the_ID();
    }

    $shopid = get_option('woocommerce_shop_page_id');
    
?>
<!-- Page Content-->
<div class="wrap woocommercepage" id="pageHeight">


    <?php   if(  0 == $sidebarPos ) { ?>
    
        <?php if(is_product()){ ?>
        
            <div class="container pageBottomSpace">
                <div class="row">
            
                    <?php woocommerce_content(); ?>
    
                </div>
            </div>
        
        <?php }  else if(is_shop() || is_product_category() || is_product_tag()) { ?>
	
	        <div class="container pageBottomSpace">
                <div class="row">
            
			        <?php woocommerce_content(); ?>

				
		        </div>
            </div>
		
        <?php } ?>
        
   <!-- has Sidebar -->      
   <?php } else { 
        $contentClass = 'span9';
        $sidebarContainerClass = 'span3';
        if( 1 == $sidebarPos)
            $contentClass .= ' float-right';
    ?>

    <div class="container pageBottomSpace">
        <div class="row">
            <?php if(is_product()){ ?>
                    
                <div class="<?php echo esc_attr($contentClass); ?>">
                <?php woocommerce_content(); ?>
                </div>
                          
                <!-- Sidebar -->    
                <div class="<?php echo esc_attr($sidebarContainerClass); ?>"><?php px_get_sidebar('woocommerce-sidebar'); ?></div>
                          
                          
            <?php }  else if(is_shop() || is_product_category() || is_product_tag()) { ?>
	
                <div class="<?php echo esc_attr($contentClass); ?>">
                    <?php woocommerce_content(); ?>
                </div>
     
                <!-- Sidebar -->  
                <div class="<?php echo esc_attr($sidebarContainerClass); ?>"><?php px_get_sidebar('woocommerce-sidebar'); ?></div>
                
            <?php } ?>
        </div>
    </div>

    <?php } ?> <!-- End has Sidebar --> 
        
</div>
<!-- Page Content End -->
<?php 

    if ( get_post() )
    {
    
        $footerMap = get_post_meta($shopid, "footer-map", true);
        if ($footerMap == "1") {
            //Footer Map
            get_template_part('templates/section', 'location');
        }

        $widgetized_footer = get_post_meta($shopid, "footer-widget-area", true);
        if ($widgetized_footer == "1") {
            //Footer Widgetized Area
            get_template_part('templates/section', 'widgetized_footer');
        }
       
    
    }
?>
<?php get_footer();