<?php 
		$options=get_post_meta(get_the_ID());
		$checkTitle = $options["title-bar"][0];
	    $porder  = $options["order"][0];
		 $pordering  = $options["ordering"][0];
?>

<!-- Blog -->
<section  id="blog" class="blogSection">
  <span class="menuSpace" id="<?php echo esc_attr($post->post_name);?>"></span>
    <div class="wrap">

        <div class="container clearfix <?php  if ( $checkTitle != 0 ){	?> exPageTitleSpace <?php } ?>">

            <?php get_template_part( 'templates/page-title' ); ?>

        </div>

        <!-- blog post items -->
        <div id="content">
            <div id="blogLoop">
                <?php

                    $postpage = isset( $_GET['postpage'] ) ? (int) $_GET['postpage'] : 1;

                    $args2=array(
                        'post_type' => 'post',
                        'paged'          => $postpage,
						'orderby'=>$porder,
						'order'=>$pordering,
                        );

                    $main_query = new WP_Query($args2);

					if ( have_posts() ) {
                    while ($main_query->have_posts()) { $main_query -> the_post();

                            get_template_part( 'templates/loop', 'blog' );
                        }
                    }
                ?>
            </div>

            <?php if (have_posts()) { ?>

                <!-- Single Page Navigation-->
                <div class="pageNavigation clearfix">
                    <div class="navNext"><?php next_posts_link(__('&larr; Older Entries', TEXTDOMAIN)) ?></div>
                    <div class="navPrevious"><?php previous_posts_link(__('Newer Entries &rarr;', TEXTDOMAIN)) ?></div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
<!-- End Blog -->