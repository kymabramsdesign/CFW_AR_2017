<?php
$acc    = px_opt('style-accent-color');//Accent color
$accRgb = implode(', ', PxColor::Px_HexToRgb($acc));
$hc     = px_opt('style-highlight-color');//Highlight color
$lc     = px_opt('style-link-color');//Link color
$lhc    = px_opt('style-link-hover-color');//Link hover color
$preloaderbarcolor = px_opt('preloader-bar-color');// preloader bar color
$preloaderbackgroundcolor  = px_opt('preloader-background-color');// preloader background color

//Fonts
$bodyFont = px_opt('font-body');
$navFont  = px_opt('font-navigation');
$headFont = px_opt('font-headings');
$ShortcodeFont = px_opt('font-shortcode');


// Menu Styles 
$menuBgColor = px_opt('menu-background-color') ;
$menuTextColor =  px_opt('menu-text-color');
$MenuHoverColor    = px_opt('menu-text-hover-color');//menu hover color

$menuOpacity=  px_opt('menu-opacity'); 
if ((isset($menuOpacity) && !empty($menuOpacity)) || ($menuOpacity == 0) ) {
        
    $menuOpacity=  px_opt('menu-opacity')/100;
} else {
    $menuOpacity = 0.98;
}

/* initial menu value */
$initialMenuBgColor = px_opt('initial-menu-background-color');
$initialMenuTextColor = px_opt('initial-menu-text-color');
$initialMenuHoverColor =  px_opt('initial-menu-text-hover-color');//initial menu hover color

$initialMenuOpacity = px_opt('initial-menu-opacity');

if ((isset($initialMenuOpacity) && !empty($initialMenuOpacity)) || ($initialMenuOpacity == 0) ) {
    $initialMenuOpacity=  px_opt('initial-menu-opacity')/100;
} else {
    $initialMenuOpacity = 0.98;
}

?>

#menuBgColor
{
	background-color: <?php echo esc_attr($menuBgColor); ?>;
	opacity: <?php echo esc_attr($menuOpacity); ?>;
}

header .navigation > ul > li > a
{
	color: <?php echo esc_attr($menuTextColor); ?>;
}
                
header .navigation > ul > li .spanHover { 
    background-color:<?php echo esc_attr($MenuHoverColor); ?>;
}
                
header.borderhover .navigation li:hover a , header.borderhover .navigation li.active a , header.borderhover .navigation > ul > li.current_page_item a {
    color:<?php echo esc_attr($MenuHoverColor); ?>;
}

header.borderhover .navigation > ul > li:hover, header.borderhover .navigation > ul > li.active , header.borderhover .navigation > ul > li.current_page_item {
    border:3px solid <?php echo esc_attr($MenuHoverColor); ?>;
}
                
#logoHeader .menuBgColor
{
	background-color: <?php echo esc_attr($initialMenuBgColor); ?>;
	opacity: <?php echo esc_attr($initialMenuOpacity); ?>;
}

header a.trigger {
    background-color : <?php echo esc_attr($menuBgColor); ?>;
}

header .morph-shape {
    fill : <?php echo esc_attr($menuBgColor); ?>;
}

.wave-menu .menu-list a span {
    color: <?php echo esc_attr($menuTextColor); ?>;
}

#logoHeader .navigation li a
{
	color: <?php echo esc_attr($initialMenuTextColor); ?>;
}
               
header #logoHeader .navigation > ul > li .spanHover {
    background-color:<?php echo esc_attr($initialMenuHoverColor); ?>;
}
                
header.borderhover  #logoHeader .navigation li:hover a , header.borderhover #logoHeader .navigation li.active a , header.borderhover #logoHeader .navigation > ul > li.current_page_item a {
    color:<?php echo esc_attr($initialMenuHoverColor); ?>;
}

header.borderhover #logoHeader .navigation > ul > li:hover, header.borderhover #logoHeader .navigation > ul > li.active , header.borderhover #logoHeader .navigation > ul > li.current_page_item {
    border:3px solid <?php echo esc_attr($initialMenuHoverColor); ?>;
}


/* Text Selection */

::-moz-selection { background: <?php echo esc_attr($hc); ?>; /* Firefox */ }
::selection { background: <?php echo esc_attr($hc); ?>; /* Safari */ }

/* Anchor */

a{ color:<?php echo esc_attr($lc); ?>; }
a:hover{ color:<?php echo esc_attr($lhc); ?>; }


/* accent color  */ 

/* Headings */

h1, h2, h3, h4, h5, h6{ margin:0 0 10px; color: <?php echo esc_attr($acc); ?> }

.search-form input[type="submit"]:hover{
	background-color: <?php echo esc_attr($acc); ?>;
}

header .navigation-button:hover{
	color: <?php echo esc_attr($acc); ?>;
}

.navigation-mobile a:hover{
	color: <?php echo esc_attr($acc); ?>;
}

.scrollDown a:hover{
	color:<?php echo esc_attr($acc); ?>;
}

header .navigation li li:hover > a{
	color:<?php echo esc_attr($acc); ?>;
}

.social-icons a:hover span  , .socialLinkShortcode a:hover span {
	background-color: <?php echo esc_attr($acc); ?>;
	border-color: <?php echo esc_attr($acc); ?>;
}	

.widget-area a:hover {
    color:<?php echo esc_attr($acc); ?>;
}

.widget-area .search-form input[type="submit"]:hover {
	background-color: <?php echo esc_attr($acc); ?>;
}

.tagcloud a:hover {
	color:<?php echo esc_attr($acc); ?>;
}

.iconbox .glyph {
	color: <?php echo esc_attr($acc); ?>;
}

.iconbox:hover .title {
	color:<?php echo esc_attr($acc); ?>;
}

.iconbox .more-link a:hover {
	color: <?php echo esc_attr($acc); ?>;
}

.team-member .job-title {
    color:<?php echo esc_attr($acc); ?>;                                                                    
}                                                                      


.team-member .icons a:hover {
	color:<?php echo esc_attr($acc); ?>;
}

.progressbar .progress-inner {
	background-color: <?php echo esc_attr($acc); ?>;
}

.search-item .count {
    color: <?php echo esc_attr($acc); ?>;
}

.post-pagination a:hover,
.post-pagination .this-page {
    background-color: <?php echo esc_attr($acc); ?>;
    border-color: <?php echo esc_attr($acc); ?>;
}

.sticky .accordion_box10 .blogTitle , .sticky .accordion_box2 .accordion_title  {
    color: <?php echo esc_attr($acc); ?> !important;
}

.sticky .blogAccordion .rightBorder {
    border-right: 2px solid <?php echo esc_attr($acc); ?> !important;
}

.widget.widget_woocommerce-dropdown-cart .header_cart .header_cart_span {
    background-color: <?php echo esc_attr($acc); ?> !important;
}

/* woocomerce */
.woocommercepage .page-title {
    border-left-color: <?php echo esc_attr($acc); ?>;
}

.woocommerce #content div.product form.cart .button, .woocommerce div.product form.cart .button, .woocommerce-page #content div.product form.cart .button, .woocommerce-page div.product form.cart .button {
    background-color: <?php echo esc_attr($acc); ?> !important;
}
.woocommerce #content div.product form.cart .button:hover, .woocommerce div.product form.cart .button:hover, .woocommerce-page #content div.product form.cart .button:hover, .woocommerce-page div.product form.cart .button:hover {
    background-color: <?php echo esc_attr($acc); ?> !important;
}

.woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale {
    background-color:<?php echo esc_attr($acc); ?> !important;
}

.woocommerce .product .summary .price, .woocommerce-page .product .summary .price {
     color: <?php echo esc_attr($acc); ?>;
}

.woocommerce .product .summary  .star-rating span:before, .woocommerce-page .product .summary  .star-rating span:before {
    color:<?php echo esc_attr($acc); ?> !important;
}

.woocommerce .product .summary  .star-rating:before, .woocommerce-page .product .summary  .star-rating:before {
    color:<?php echo esc_attr($acc); ?> !important;
}

.widget.widget_woocommerce-dropdown-cart li .qbutton.cartbtn {
    background-color:<?php echo esc_attr($acc); ?> !important;
    border-color:<?php echo esc_attr($acc); ?> !important;
}

.subnavigation .filterlinebottom, .subnavigation .filterlinetop {
    background-color:<?php echo esc_attr($acc); ?>;
}

/* portfolio Load more */ 
.pLoadMore .loadMore:hover {
    color:<?php echo esc_attr($acc); ?>;
}

/* Blog Load more */ 
.pageNavigation .readmore:hover {
    color:<?php echo esc_attr($acc); ?>;
}

.title h3 {
    border-left: solid <?php echo esc_attr($acc); ?> 8px;
}

.post-meta .hr-extra-small.hr-margin-small {
    background-color:<?php echo esc_attr($acc); ?> !important;
}

/* PreLoader */
#preloader {
  background-color:<?php echo esc_attr($preloaderbackgroundcolor); ?>;
}

#circle:before {
    border-top: 3px solid <?php echo esc_attr($preloaderbarcolor); ?>;
}

body , .button,form input[type="submit"]  , .imageBox .content .subtitle  ,  .pieChartBox .title , .pieChartBox .subtitle , .postphoto .skills , .project-detail li.project , .subnavigation a { font-family:'<?php echo esc_attr($bodyFont); ?>', sans-serif; }


/* Headings */

h1, h2, h3, h4, h5, h6 , .desktopBlog .blogAccordion  .accordion_box10  .blogTitle  , .tabletBlog  .blogAccordion  .blogTitle , .title h3  , #ajaxPDetail .pDHeader .title { font-family:'<?php echo esc_attr($headFont); ?>', sans-serif; }

/* Navigation */

header .navigation { font-family:'<?php echo esc_attr($navFont); ?>', sans-serif; }

/* Shortcode Font */ 

<?php if ( $ShortcodeFont !== 'Oswald') { ?>
 
    .imageBox .content .subtitle , .pieChartBox .title , .pieChartBox .subtitle , .testimonial .talkerName , .counterBoxDetails , .postphoto .title {
         font-family:'<?php echo esc_attr($ShortcodeFont); ?>', sans-serif;
    }

<?php } ?>

.imageBox .content .title ,.textBox .title , .iconbox.iconbox-top .title, .iconbox.iconbox-left .title , .team-member .name , .team-member .job-title , .counterBox  .counterBoxNumber  , .pieChart .perecent , .testimonial .name , .pixflowHeader {
    font-family:'<?php echo esc_attr($ShortcodeFont); ?>', sans-serif;
}

/* notification */

<?php

$notification_bg_color = px_opt('notification_bg_color');
if ( px_opt('notification_bg_color')) {  ?>

#notification {
    background-color: <?php echo esc_attr($notification_bg_color); ?>
}

<?php } ?>
        
/* Widgetized Styles*/

<?php 

$footerwidgetbanner = px_opt('footer-widget-banner');
if (px_opt('footer-widget-banner')) { 

?>

.footer-widgetized {
    min-height:680px;
    background: transparent url(<?php echo esc_url($footerwidgetbanner); ?>) repeat bottom center;
    background-size: cover;
}

.footer-widgetized-gradient {
    min-height:800px;
}
        
.footer-widgetized-wrap {
    padding-top:240px;
}
  
<?php } ?>

/*==== Style Overrides ====*/

<?php px_eopt('additional-css'); ?>