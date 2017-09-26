(function ($) {


	function ImageFields()
    {
        var $imageSec    = $('.section-page-type-switch2'),
            $fields      = $imageSec.find('.text-input '),
            $dupBtn      = $('<a class="duplicate-button" href="#">Add Image</a>'),
            $remBtn      = $('<a class="remove-button" href="#">Remove</a>');

        //Click handler for remove button
        $remBtn.click(function(e){
            e.preventDefault();

            var $this = $(this);

            $this.parent().remove();

            $fields = $imageSec.find('.text-input');

            if($fields.length < 2)
            //Remove the button
                $fields.find('.remove-button').remove();
        });


        //Add remove button if there is more than one image field
        if($fields.length > 1)
            $fields.append($remBtn.clone(true));

        //Add duplicate button after last upload field
        $fields.filter(':last').after($dupBtn);

        $dupBtn.click(function(e){
            e.preventDefault();

            //Don't try to reuse $fields var above ;)
            $fields        = $imageSec.find('.text-input ');
            var $lastField = $fields.filter(':last'),
                $clone     = $lastField.clone(true);

            //Clear the value (if any)
            $clone.find('input[type="text"]').val('');

            $lastField.after($clone);

            //Refresh
            $fields        = $imageSec.find('.text-input ');
            //Add 'remove' button to all fields
            //Rest of 'remove' buttons will get cloned
            if($fields.length == 2)
                $fields.append($remBtn.clone(true));
        });
    }


    function PageTemplateSections()
    {
        var $templates  = $('select#page_template'),
            $blogMetaBox    = $('#blog_meta_box'),
            $postdivrich = $('#postdivrich');
			
        function changeHandler()
        {
            var selected = $templates.find(':selected').val();

            if('main-page.php' == selected)
            {
                $postdivrich.slideUp('fast');
				$blogMetaBox.slideUp('fast');
				
            }
            else {
			
			
				var $container = $('.px-main'),
					$pageType = $container.find('select[name="page-type-switch"]'),  
					$selected = $pageType.find('option:selected'),
					val = $selected.val();
			
				if ( val === 'blog-section' || val === 'portfolio-section' )  {
					$postdivrich.slideUp('fast');
					$blogMetaBox.slideDown('fast');
				} else {
				
					$postdivrich.slideDown('fast');
					$blogMetaBox.slideDown('fast');
				}
			
            }
        }

        $templates.change(changeHandler);
        changeHandler();
    }
	
	function pageType()
    {
        var $container = $('.px-main'),
            $pageType = $container.find('select[name="page-type-switch"],select[name="page-position-switch"],select[name="blog-type-switch"]'),
            $sec = $container.find('.section-ordering,.section-order,.section-page-position-switch,.section-show-in-menu-switch,.section-page-sidebar, .section-blog-sidebar ,.section-portfolio-skill,.section-footer-widget-area,.section-layerslider,.section-footer-map,.section-parallax-options,.section-blog-type-switch,.section-Overlay-options,.section-video-options,.section-portfolio-detail-ajax,.section-portfolio-posts-page,.section-portfolio-filter-nav'),
			$postdivrich = $('#postdivrich'),
            $vcForm = $('#wpb_visual_composer'),
			$titleShow = $container.find('select[name="title-bar"]'),
			$titleSec = $container.find('#field-title-text,#field-subtitle-text').parent(),
			$pagePositionType = $container.find('select[name="page-position-switch"]');
            $blogType = $container.find('select[name="blog-type-switch"]');
	
	
		//  Slide Up/Down Title Options
		$titleShow.change(function(){
			var $titleSelected = $titleShow.find('option:selected'),
			tVal = $titleSelected.val();
			
			if( tVal === "1" )
			{
				$titleSec.slideDown('fast');
			}
			else if ( tVal === "0" || tVal === "2" ) {
				$titleSec.slideUp('fast');
			}
		}).change();
		//End Slide Up/Down Title Options
		
        $pageType.change(function(){
            var $selected = $pageType.find('option:selected'),
                val = $selected.val(),
                $vcbtn = $('#poststuff .composer-switch'),
                $selected = $container.find('.section-'+val),
				
				$positionSelected = $pagePositionType.find('option:selected'),
				positionVal = $positionSelected.val();
                
                // Blog Type option    Creative - Toggle
                $blogTypeSelected = $blogType.find('option:selected'),
				blogTypeVal = $blogTypeSelected.val();

				/*  Slide Up/Down Editor For Blog and Portfolio Section */ 
				if( val === 'blog-section' || val === 'portfolio-section' )
				{
				    $postdivrich.slideUp('fast');
				    $vcForm.slideUp('fast');
				    $vcbtn.slideUp('fast');
				}
				else {
				    $postdivrich.slideDown('fast');
				    $vcbtn.slideDown('fast');
				}

				if ( val == 'custom-section' && positionVal == '0' )
				{
					$selected = $container.find('.section-page-position-switch,.section-show-in-menu-switch');	
				}
				else if ( val == 'custom-section'  && positionVal == '1' )
				{
					$selected = $container.find('.section-page-position-switch,.section-show-in-menu-switch,.section-page-sidebar,.section-footer-widget-area,.section-footer-map,.section-layerslider');
				}
				else if ( val == 'portfolio-section'  && positionVal == '0' )
				{
					$selected = $container.find('.section-ordering,.section-order,.section-page-position-switch,.section-portfolio-detail-ajax,.section-show-in-menu-switch,.section-portfolio-skill,.section-portfolio-posts-page,.section-portfolio-filter-nav');
				}
				else if ( val == 'portfolio-section'  && positionVal == '1' )
				{
					$selected = $container.find('.section-ordering,.section-order,.section-order,.section-page-position-switch,.section-show-in-menu-switch,.section-portfolio-skill,.section-footer-widget-area,.section-layerslider,.section-footer-map,.section-portfolio-posts-page,.section-portfolio-filter-nav');
				}
				else if ( val == 'blog-section' && positionVal == '0' )
				{
					$selected = $container.find('.section-ordering,.section-order,.section-page-position-switch,.section-show-in-menu-switch');	
				}
				else if (val == 'blog-section' && positionVal == '1' && blogTypeVal == '0' )
				{
				    $selected = $container.find('.section-ordering,.section-order,.section-page-position-switch,.section-blog-type-switch ,.section-footer-widget-area,.section-footer-map,.section-layerslider');
				}
				else if (val == 'blog-section' && positionVal == '1' && blogTypeVal == '1')
				{
				    $selected = $container.find('.section-ordering,.section-order,.section-page-position-switch,.section-blog-sidebar,.section-blog-type-switch,.section-footer-widget-area,.section-footer-map,.section-layerslider');
				}
				
            $sec.not($selected).slideUp('fast').next('hr').hide();
            $selected.slideDown('fast').next('hr').show();
			
			$positionSelected.not($selected).slideUp('fast').next('hr').hide();
			$positionSelected.slideDown('fast').next('hr').show();
			
        }).change();

    }

	// portfolio filter - show All category Or select category 
	function portfolioSkill()
    {
		var $portfolioSkill = $('.section-portfolio-skill'),
			$skillCheckBox =  $portfolioSkill.find('.checkbox-input');
			
			$portfolioSkill.change(function(){
				
				var $portfoliofilter = $portfolioSkill.find('select[name="portfolio-filter"]'),
				$selected = $portfoliofilter.find('option:selected'),
				$val = $selected.val();
			
				if ( $val == '0' ) {
					// Show All Category 
					$skillCheckBox.slideUp('fast');
				} else {
					// Select Category 
					$skillCheckBox.slideDown('fast');
				}
			
			}).change();
	}
	
	function colorInput() {
	
		$('#blog_meta_box .colorinput').each(function () {
            var $input  = $(this),
                $parent = $input.parent(),
				$picker = $('<div class="color-selector"><div></div></div>'),
				col     = $input.val();
                $parent.append($picker);

            $picker.find('div').css('backgroundColor', col);

            $picker.ColorPicker({
                color: col,
                onChange: function (hsb, hex, rgb) {
                    $picker.find('div').css('backgroundColor', '#' + hex);
                    $input.val('#' + hex);
                }
            });
        });
	
	}
    $(document).ready(function () {
        PageTemplateSections();
		ImageFields();
		pageType();
		portfolioSkill();
		colorInput();
    });

})(jQuery);