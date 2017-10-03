<div <?php post_class(); ?>>

  <!--  Portfolio Detail Slider  -->
  <div class="row">
    <div class="span10 postMedia">

      <?php

      $images = px_get_meta('image');

      if(count($images))
      {?>
        <div class="pDFlexslider flexslider">

          <ul class="slides">
            <?php

            $imageSize = 'portfolio-single';

            foreach($images as $img)
            {
              //For getting image size use
              $imgId = px_get_image_id($img);

              if($imgId == -1)//Fallback
              $imgTag = "<img src=\"$img\" />";
              else
                $imgTag = wp_get_attachment_image($imgId, $imageSize);
              ?>
              <li><?php echo $imgTag; ?></li>
            <?php
            }?>
          </ul>
          <div class="slider-nav-controls-container"></div>
        </div>

      <?php
      }?>

    </div>
  </div>

   <!-- Portfolio Detail Title  -->
  <div class="row">
    <div class="span10 pDHeader">
      <!-- Title -->
      <div class="title">
          <?php the_title(); ?>
      </div>

    </div>
  </div>

  <!-- Portfolio Detail content  -->
  <div class="row">
    <div class="span10 post-media">
      <?php the_content();?>
    </div>
  </div>

  <!--Related Stories   -->
  <div class="row">
    <div class="span12 related">
      <h2>Related Stories</h2>
      <p><a href="<?php the_field('link_1');?>"><?php the_field('link_1_title');?></a></p>
      <p><a href="<?php the_field('link_2');?>"><?php the_field('link_2_title');?></a></p>
      <p><a href="<?php the_field('link_3');?>"><?php the_field('link_3_title');?></a></p>
      <p><a href="<?php the_field('link_4');?>"><?php the_field('link_4_title');?></a></p>
    </div>
  </div>
