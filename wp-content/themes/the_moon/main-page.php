<?php
/*
Template Name: Main Page
*/

get_header();

// menu
get_template_part('templates/section', 'nav');

$current_page_id = get_option('page_on_front');

if ( ( $locations = get_nav_menu_locations() ) && $locations['primary-nav'] ) {

  // When Primary Navigation is active

  $menu = wp_get_nav_menu_object( $locations['primary-nav'] );
  $menu_items = wp_get_nav_menu_items( $menu-> term_id);

  $menu_list = array();
  foreach($menu_items as $item) {
    if($item->object == 'page')
      $menu_list[] = $item -> object_id;
    }

    if( function_exists('CPTOrderPosts') )
      remove_filter('posts_orderby', 'CPTOrderPosts', 99, 2);

    $main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $menu_list, 'posts_per_page' => count($menu_list), 'orderby' => 'post__in' ) );

    if( function_exists('CPTOrderPosts') )
      add_filter('posts_orderby', 'CPTOrderPosts', 99, 2);

} else {

// When Primary Navigation is not active

  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1'
  );

  $main_query = new WP_Query($args);

}
?>


<div id="main">
<?php
  // Home Section
  if ( px_opt('home-display-switch')) {
    get_template_part( 'templates/section', 'home' );
  } else {
    echo '<div id="home"></div>';
  }
  $blogCount = 0;
  $pDAjaxIndex =0;

  if( have_posts() ) :
  while ($main_query->have_posts()) : $main_query -> the_post();
    global $post;
    $post_name = $post ->post_name;

    $post_id = get_the_ID();
    $vc_shortcode_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
    $separate_page = get_post_meta($post_id, "page-position-switch", true);
    ?>
  <style><?php echo($vc_shortcode_css); ?></style>
  <?php
    if (($separate_page !== "1" )&& ($post_id != $current_page_id )) {

    // custom section
      if ( get_post_meta( $post_id, "page-type-switch", true ) == "custom-section") {

      get_template_part( 'templates/section', 'custom' );

      if($post_name == 'the-activists'){
        //After "President's Letter" post, do the portfolio section

        $portfolio = get_page_by_title('portfolio');

        $pDAjaxCheck  = get_post_meta($portfolio->ID, "portfolio-detail-ajax", true);

        if ($pDAjaxCheck == 1) {
          $pDAjaxIndex++;
        }

        if ( $pDAjaxIndex > 1) {
          $pDAjaxCheck = 0; // portfolio detail Ajax disable
        }

        if ( $pDAjaxCheck == 1) {

          get_template_part( 'templates/section', 'bio-ajax' );

        } else {

          get_template_part( 'templates/section', 'bio' );

        }

      }

    }

    //Blog Section
    else if ( get_post_meta( $post_id, "page-type-switch", true ) == "blog-section" &&  $blogCount== 0 ) {

      get_template_part( 'templates/section', 'blog' );
      $blogCount++;

      }
      // Portfolio section
      else if ( get_post_meta( $post_id, "page-type-switch", true ) == "portfolio-section") {

      /* THIS SECTION WAS MOVED TO INSIDE THE "CUSTOM" SECTION AS PER CLIENT DESIGN */

      }
    }

endwhile;
endif;
wp_reset_query();

// Footer Widget bar
get_template_part('templates/section', 'widgetized_footer');

?>
</div>
<?php get_footer();
