<?php

class Px_Nav_Walker extends Walker_Nav_Menu
{
    private $navIdPrefix = '';

    public function __construct($idPrefix='menu-item-')
    {
        $this->navIdPrefix = $idPrefix;
    }

    function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {

       global $wp_query;

       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

       $class_names = $value = '';

       $classes = empty( $object->classes ) ? array() : (array) $object->classes;
       $classes = array_slice($classes,1);

       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
       $class_names = ' class="'. esc_attr( $class_names ) . '"';


       $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
       $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
       $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';

       
       if($object->object == 'page') {
            $varpost = get_post($object->object_id);
            $separate_page = get_post_meta($object->object_id, "page-position-switch", true);
           
            $disable_menu = get_post_meta($object->object_id, "show-in-menu-switch", true);
            $current_page_id = get_option('page_on_front');

            if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                $output .= $indent . '<li ' . $value . $class_names .'><span class="spanHover"></span>';

                if ( $separate_page == "1" ) {
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                } else if ( $separate_page == "0"){
                    if (is_front_page())
                        $attributes .= ' class="locallink" href="#' . $varpost->post_name . '"';
                    else
                        $attributes .= ' href="' . home_url() . '#' . $varpost->post_name . '"';
                } else {
                     $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                }
                
                $object_output = $args->before;
                
                $object_output .= '<a'. $attributes .'>';
                $object_output .= $args->link_before .'<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
                
                $object_output .=  ''.$args->after;
                
                $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
                
                $object_output .=  '</li>';
            }
       } else {

            $output .= $indent . '<li ' . $value . $class_names .'><span class="spanHover"></span>';

            $attributes .= ! empty( $object->url ) ? ' href="' . esc_attr( $object->url ) .'"' : '';

            $object_output = $args->before;
            
            $object_output .= '<a'. $attributes .'>';
            $object_output .= $args->link_before . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
            $object_output .= $args->link_after;
            $object_output .= '</a>';
            
            $object_output .=  ''.$args->after;
            
           
            $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
           
            $object_output .=  '</li>';
        }
    }
    
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "";
    }
}