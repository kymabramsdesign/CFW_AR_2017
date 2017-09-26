<?php

if ( !function_exists('register_sidebar') )
    return;

$defaults = array(
    'name' => __('Main Sidebar', TEXTDOMAIN),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4><hr class="hr-medium" />',
);

//Main sidebar
register_sidebar(array_merge($defaults, array('id'=> 'main-sidebar')));

//Page sidebar
register_sidebar(array_merge($defaults, array('name'=>__('Page Sidebar', TEXTDOMAIN), 'id' => 'page-sidebar')));

//Footer widgets 1
register_sidebar(array_merge($defaults, array('name'=>__('Footer Widget 1', TEXTDOMAIN), 'id'   => 'footer-widget-1' )));

//Footer widgets 2
register_sidebar(array_merge($defaults, array('name'=>__('Footer Widget 2', TEXTDOMAIN), 'id'   => 'footer-widget-2' )));

//Footer widgets 3
register_sidebar(array_merge($defaults, array('name'=>__('Footer Widget 3', TEXTDOMAIN), 'id'   => 'footer-widget-3' )));

//Woocommerce Sidebar 
register_sidebar(array_merge($defaults, array('name'=>__('Woocommerce Sidebar', TEXTDOMAIN), 'id'   => 'woocommerce-sidebar')));

// WooCommerce Drop Down Cart 
register_sidebar(array_merge($defaults, array('name'=>__('Woocommerce Drop Down cart', TEXTDOMAIN), 'id'   => 'woocommerce_dropdown_cart', 'description' => esc_html__('This widget area should be used only for WooCommerce dropdown cart widget'))));

//Custom Sidebars
if(px_opt('custom_sidebars') != '')
{
    $sidebars = explode(',', px_opt('custom_sidebars'));
    $i=0;

    foreach($sidebars as $bar)
    {
        register_sidebar(array_merge($defaults, array(
            'id'   => "custom-$i",
            'name' => str_replace('%666', ',', $bar),
        )));

        $i++;
    }
}