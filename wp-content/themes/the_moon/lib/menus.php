<?php

function px_register_menus() {
    register_nav_menu( 'primary-nav', __( 'Primary Navigation', TEXTDOMAIN ) );
    register_nav_menu( 'top-nav', __( 'Top Navigation', TEXTDOMAIN ) );
    register_nav_menu( 'mobile-nav', __( 'Mobile Navigation', TEXTDOMAIN ) );
}

add_action( 'init', 'px_register_menus' );

add_filter( 'wp_nav_menu_items', 'px_custom_menu_item', 10, 2 );

function px_custom_menu_item ( $items, $args ) {
    if(px_opt("menu_footer_link"))
	{
		$footer_link_text=(px_opt("menu_footer_link_text")!="")?px_opt("menu_footer_link_text"):"Footer";
		if ($args->theme_location == 'primary-nav')
		{
        $items .="'<li class='menu-item menu-item-type-post_type menu-item-object-page'><span class='spanHover'></span><a class='locallink' href='#widfooter'><span>$footer_link_text</span></a></li>";
		}
	}
	
    return $items;
}