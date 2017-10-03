<div <?php post_class(); ?>>

  <div class="row">
    <div class="span10 postMedia">

      <img src="<?php the_field('headshot'); ?>" />

    </div>
  </div>

<!-- Portfolio Detail Title  -->
  <div class="row">
    <div class="span10 pDHeader">

      <!-- Title -->
      <div class="title">
        <?php the_title(); ?>
      </div>

      <br />
      <br />

      <!-- Position -->
      <div class="position">
        <h6><?php the_field(position); ?></h6>
      </div>

    </div>
  </div>

  <!-- Portfolio Detail content  -->
  <div class="row">
    <div class="span10 post-media">
      <?php the_content();?>
    </div>
  </div>

  <?php
  // get portfolio social share
  $portfolio_social_share = px_get_meta('portfolio-social-share');
  ?>

  <ul class="socailshare project-detail">

    <?php get_template_part('templates/project', 'detail'); ?>

    <?php if( $portfolio_social_share == 1 ) { ?>

    <!-- portfolio Socail share -->
    <li class="project portfolio_social_share">

      <span class="project-title social_share_title">
      <?php  _e('Share :', TEXTDOMAIN) ?>
      </span>

      <?php get_template_part('templates/social-share'); ?>

    </li>

    <?php } ?>

  </ul>
</div>
