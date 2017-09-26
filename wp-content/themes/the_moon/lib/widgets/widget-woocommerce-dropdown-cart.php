<?php

// Widget class
class PixFlow_Woocommerce_Dropdown_Cart_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'woocommerce-dropdown-cart', // Base ID
            'Woocommerce Dropdown Cart', // Name
            array( 'description' => __( 'Woocommerce Dropdown Cart.', TEXTDOMAIN ) ) // Args
        );
    }

    function widget( $args, $instance ) {
        
		global $post;
		extract( $args );
		global $woocommerce;

        // Before widget (defined by theme functions file)
        echo $before_widget;
		?>
		
        <div class="shopping_cart_outer">
		<div class="shopping_cart_inner">
		<div class="shopping_cart_header">
        
		<ul class="wc_cart_outer">
            <li class="wc_shop">
                <a class="header_cart" href="<?php echo esc_url($woocommerce-> cart->get_cart_url()); ?>">
                    <span class="header_cart_span">
                        <?php echo esc_attr($woocommerce->cart->cart_contents_count); ?>
                    </span>

                    <div class="triangle"></div>
                </a>
		
                <?php
	                $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
	                $list_class = array( 'cart_list', 'product_list_widget' );
                ?>

	                <ul class="<?php echo implode(' ', $list_class); ?>">
                                                
		                <?php if ( !$cart_is_empty ) { ?>

			                <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

				                $_product = $cart_item['data'];

				                // Only display if allowed
				                if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
					                continue;
				                }

				                // Get price
				                $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

				                $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
				                ?>

				                <li>
					                <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

						                <?php echo $_product->get_image(); ?>
                                                    
                                        <div class="wc_cart_product_info">
                                            <div class="wc_cart_product_name">
									                <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                            </div>

                                            <?php echo esc_attr($woocommerce->cart->get_item_data( $cart_item )); ?>
                                                        
                                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price">'. sprintf( 'Price: %s', $product_price) . '</span><span class="quantity">' . sprintf( 'quantity: %s',  $cart_item['quantity']) , $cart_item, $cart_item_key ); ?>
                                            
                                        </div>
                                                    
					                </a>
                                </li>

			                <?php endforeach; ?>

		                <?php  } else { ?>

			                <li class="no_products">
                                <span class="no_products_span">
                                    <?php _e( 'No products in the cart.', 'woocommerce' ); ?>
                                </span>
                            </li>

		                <?php }; ?>

                        <li>
                            
                            <div class="total"><?php _e( 'SUBTOTAL ', 'woocommerce' ); ?> : <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></div>
                             
                            <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="cartbtn qbutton white">
                                <?php _e( 'VIEW CART', 'woocommerce' ); ?>
                            </a>
                            
                             <a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="chckoutbtn qbutton white">
                                <?php _e( 'CHECKOUT', 'woocommerce' ); ?>
                            </a>
                            
                        </li>
	                </ul>
            </li>
		</ul>
        
        </div>
        </div>
        </div>

        <?php
        // After widget (defined by theme functions file)
        echo $after_widget;
    }
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_Woocommerce_Dropdown_Cart_Widget" );' ) );