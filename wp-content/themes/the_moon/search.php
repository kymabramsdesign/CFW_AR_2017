<?php
/**
 * Search template
 */

    get_header();

    // menu
    get_template_part('templates/section', 'nav');

    $pageHeading = have_posts() ? sprintf(__("Results for '%s'", TEXTDOMAIN), $s) : __('No Results Found', TEXTDOMAIN);
?>
    <!--Content-->
    <div id="blogSingle" class="wrap singlePost">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h2><?php echo esc_attr($pageHeading); ?></h2>
                    <p><?php _e('You can start a new search by using the box below.', TEXTDOMAIN); ?></p>
                    <br/>
                    <?php get_search_form(); ?>
                    <hr/>
                    <?php get_template_part( 'templates/loop', 'search' );
                        px_get_pagination();
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();