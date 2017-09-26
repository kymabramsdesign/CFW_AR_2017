<?php 

	$uniqueId = get_the_ID();
	$options=get_post_meta($uniqueId);
	
    $checkTitle = $options["title-bar"][0];	
	$pDAjaxCheck  =$options["portfolio-detail-ajax"][0]; 
    $pPostPerPage  = $options["portfolio-posts-page"][0];
    $pfilterNav  = $options["portfolio-filter-nav"][0];
    $pfilter  = $options["portfolio-filter"][0];
	$porder  = $options["order"][0];
	$pordering  = $options["ordering"][0];

   
    $portfolioId = 'portfolio_'.$uniqueId;
    $portfolioLoop =  'pLoop_'.$uniqueId;
    $pLoadMore = 'pLoadMore_'.$uniqueId;
    $pagedNum = 'paged_'.$uniqueId;
	
	
	$porder  = get_post_meta(get_the_ID(), "order", true);
	$pordering  = get_post_meta(get_the_ID(), "ordering", true);
	

    /* get Portfolio Skills */
    $portfolioTerms = get_terms('skills');
    $selectSkill  = '';

    foreach($portfolioTerms as $term ) {
        $skill = $term-> term_id;
        $skillTerm = 'term-'.$skill;

        $checkSkill = get_post_meta( get_the_ID(), $skillTerm , true);

        if ( $checkSkill == 'visible' ) {
            $selectSkill .= $skill . ',';
        }
    }

    $catArr  = explode(',', $selectSkill) ;

    if(count($catArr) == 0 || count($catArr) > 1)
    {

        if ( $pfilter == 1 ) {
            // Generate  Selected Taxonomy
            $listCatsArgs = array('title_li' => '', 'taxonomy' => 'skills', 'walker' => new px_portfolio_walker(), 'echo' => 0, 'include' => $selectSkill );
        } else {
            // Generate All Filter Taxonomy
            $listCatsArgs = array('title_li' => '', 'taxonomy' => 'skills', 'walker' => new px_portfolio_walker(), 'echo' => 0, 'include' => '' );
        }

        $catList = '<li class="current"><a class="active" data-filter="*" href="#">'.__('All', TEXTDOMAIN)."<span class='filterlinetop'></span><span class='filterlinebottom'></span></a></li>";
        $catList .= wp_list_categories($listCatsArgs);

    } else {
        $catList = "";
    }

    if ( $pfilter == 1 ) {

        // Add some parameters for the JS - portfolio load more .
        $queryArgs = array (
            'post_type'      => 'portfolio',//post type, I used 'product'
            'post_status'   => 'publish', // just tried to find all published post
            'posts_per_page' =>   -1,
            'pageVar' => 'list1',
			'orderby'=>$porder,
			'order'=>$pordering,
            'tax_query' => array(
                array(
                    'taxonomy' => 'skills',
                    'field'    => 'id',
                    'terms'    => $catArr
                )
            )
        );

    } else {

        // Add some parameters for the JS - portfolio load more .
        $queryArgs = array (
            'post_type'      => 'portfolio',//post type, I used 'product'
            'post_status'   => 'publish', // just tried to find all published post
            'posts_per_page' =>   -1,
            'pageVar' => 'list1',
			'order'=>$pordering,
			'orderby'=>$porder
        );
    }

    $query = new WP_Query($queryArgs);
    $ppaged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
    $pMax = $query-> max_num_pages;
    $countPosts = $query -> post_count;
    $maxPages =  ceil ($countPosts / $pPostPerPage)  ;

    wp_localize_script (
        'custom',
        $portfolioId ,
        array (
            'startPage' => $ppaged,
            'maxPages' => $maxPages,
            'nextLink' => next_posts($pMax, false),
            'loadingText' => __('Loading...', TEXTDOMAIN),
            'loadMoreText' => __('Load More', TEXTDOMAIN),
            'noMorePostsText' => __('No More Posts', TEXTDOMAIN)
        )
    );

?>

<!-- Portfolio Section  -->
<section id="<?php echo $portfolioId; ?>" data-value="<?php echo $portfolioId; ?>"  data-id="<?php echo $uniqueId; ?>" class="portfolioSection">	
    <span class="menuSpace" id="<?php echo esc_attr($post->post_name);?>"></span>
    <div class="wrap">
	

        <div class="container clearfix <?php  if ( $pfilterNav == 1 || $checkTitle != 0 ){	?> exPageTitleSpace <?php } ?>">

            <?php get_template_part( 'templates/page-title' ); ?>

        </div>

        <?php  if ( $pfilterNav == 1 ){	?>

            <!-- portfolio filter - desktop -->
            <div class="container visible-desktop clearfix">
                <div class="span12 portfolio-header">
                    <ul id="filters" class="option-set subnavigation clearfix" data-option-key="filter">

                        <?php echo $catList; ?>

                    </ul>
                </div>
            </div>

            <!-- portfolio filter - tablet & phone -->
            <div class="hidden-desktop clearfix">
                <ul id="filterstablet" class="portfolio-filter" data-option-key="filter">
                    <li class="">
                        <div>
                            <span class="text"><?php _e('All', TEXTDOMAIN) ?></span>
                            <span class="icon icon-angle-down"></span>
                        </div>
                        <ul class="portfolio-filter-items">
                            <?php echo $catList; ?>
                        </ul>
                    </li>
                </ul>
            </div>

        <?php }  else if ( $pfilterNav == 0 ) { ?>

        <?php } ?>

        <!-- portfolio items  -->
        <div class="isotope">
		
            <div id="<?php echo $portfolioLoop; ?>">

                <?php

                    $paged1 = isset( $_GET[$pagedNum] ) ? (int) $_GET[$pagedNum] : 1;

                    $queryArgs = array(

                        'post_type'      => 'portfolio',
                        'posts_per_page' => $pPostPerPage,
                        'paged'          => $paged1,
						'orderby'=>$porder,
						'order'=>$pordering,
                    );

                    if ( $pfilter == 1 ) {

                        //Taxonomy filter
                        if(count($catArr))
                        {

                            $queryArgs['tax_query'] =  array(
                                // Note: tax_query expects an array of arrays!
                                array(
                                    'taxonomy' => 'skills',
                                    'field'    => 'id',
                                    'terms'    => $catArr
                                ));
                        }
                    }

                    $count = 1;
                    $query = new WP_Query($queryArgs);

                    while ($query->have_posts()) {

                        $query->the_post();

                        include(locate_template('templates/portfolio-thumbnail.php'));

                        $count++;
                    }

                ?>
            </div>
        </div>

        <?php

            $query = new WP_Query($queryArgs);
            if ( $query-> have_posts()) { ?>

                <!-- portfolio load more button -->
                <div class="pLoadMore <?php echo esc_attr($pLoadMore); ?>  clearfix"></div>
				 

        <?php } ?>

        <?php wp_reset_query(); ?>

    </div>
</section>
<!-- End Portfolio Section  -->