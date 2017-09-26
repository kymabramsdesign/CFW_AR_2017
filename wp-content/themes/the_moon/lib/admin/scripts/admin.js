(function ($) {

    var utility = {
        //Checks if element as desired attribute
        HasAttr: function ($elm, attr) {
            return typeof $elm.attr(attr) != 'undefined';
        },
        GetAttr: function ($elm, attr, def){
            return this.HasAttr($elm, attr) ? $elm.attr(attr) : def;
        }
    };

    //Show/hide fields based on selected value
    function FieldSelector() {
        $('.field-selector select').each(function () {
            var $select   = $(this),
                $section  = $select.parents('.section'),
                fieldList = utility.GetAttr($select, 'data-fields', ''),
                $fields   = $section.find(fieldList);

            $select.change(function () {
                var $selected = $select.find('option:selected');

                if (!utility.HasAttr($selected, 'data-show')) {
                    $fields.slideUp('fast');
                    return;
                }
                
                var show   = $selected.attr('data-show'),
                    $items = $section.find(show);

                $fields.not($items).slideUp('fast');
                $items.slideDown('fast');
            }).change();
        });
    }

    //Handles icon selector
    function iconSelect() {

        $('input[name^=header-icon]').add('input[name^=notification_icon]').each(function () {

            var $iconInput = $(this);
            var $pxInputIcon = $iconInput.parents('.px-input-icon');
			
			if ($iconInput.attr('value') !== '' ){
				$pxInputIcon.find('.px-icon[data-name=' + $iconInput.attr('value') + ']').addClass('selected');
			}           

            $pxInputIcon.find('.px-icon').click(function () {
              
                    $iconInput.attr('value', $(this).attr('data-name'));
                    $pxInputIcon.find('.px-icon').removeClass('selected');
                    $(this).addClass('selected');

            });

        });
    }

    function CSVInput() {

        $('.csv-input').each(function () {
            var $container = $(this),
                $hidden = $container.find('input[type="hidden"]'),
                $input = $container.find('input[type="text"]'),
                $addBtn = $container.find('.btn-add'),
                $list = $container.find('.list');

            var values = $hidden.val().length > 0 ? $hidden.val().split(',') : [];
            
            //Add current items to our list
            for (i = 0; i < values.length; i++) {
                var val  = values[i],
                    text = val.replace('%666', ','),//Evil char 
                    $item = GetNewItem(val, text);

                $list.append($item);
                HandleCloseBtn($item);
            }

            AssembleList();

            //Handle add button
            $addBtn.click(function (e) {
                e.preventDefault();

                var val = $input.val();
                val = $.trim(val);
                $input.val('');//Clear

                if (val.length < 1)
                    return;

                var $item = GetNewItem(val.replace(",", "%666"), val);
                HandleCloseBtn($item);
                $item.hide();

                $list.prepend($item);

                AssembleList();

                $item.slideDown('fast', function () { $(window).resize(); });
            });

            function AssembleList() {
                $hidden.val('');//Clear the current list
                var vals = [];

                $list.find('.value').each(function () {
                    var value = $(this).attr('data-val');
                    vals.push(value);
                });

                $hidden.val(vals.join(','));
            }

            function HandleCloseBtn($item) {
                //Remove item on click
                $item.find('.btn-close').click(function (e) {
                    e.preventDefault();

                    $item.slideUp('fast', function () { $item.remove(); AssembleList(); $(window).resize(); });
                });
            }

            function GetNewItem(val, text) {
                return $('<div class="value" data-val="' + val + '"><span>' + text + '</span><a href="#" class="btn-close"></a></div>');
            }

        });


    }

    function ImageSelect() {
        var $controls = $('.imageSelect');

        $controls.each(function () {
            var $select = $(this),
                $input = $select.find('input'),
                $options = $select.find('a');

            //Hide input control
            $input.hide();

            $options.click(function (e) {
                e.preventDefault();

                var $ctl = $(this);

                if ($ctl.hasClass('selected'))
                    return;

                $options.removeClass('selected');
                $ctl.addClass('selected');

                $input.val($ctl.html());
            });
        });
    }

    function Chosen() {
        if (!$.fn.chosen)
            return;

        $('.chosen').chosen();
    }

    function Combobox() {
        $('.select').each(function () {
            var $this = $(this),
                $overlay = $this.find('div'),
                $select = $this.find('select');

            $select.change(function () {
                $overlay.html($select.find('option:selected').text());
            });

            $select.change();
        });
    }

    function ColorPicker() {
        if (!$.fn.ColorPicker)
            return;

        $('#appearance .colorinput').each(function () {
            var $input = $(this),
                $parent = $input.parent(),
				$picker = $('<div class="color-selector"><div></div></div>'),
                $view = $parent.find('.color-view'),
				col = $input.val();
            $parent.append($picker);

            $picker.find('div').css('backgroundColor', col);
            $view.css('backgroundColor', col);

            var $style = $('select[name="style-preset-color"]'),
                styleName = $style.find(':selected').val();
            if ($style.length) {
                if (styleName == "custom") {
                    $view.css({ "display": "none" });
                    $picker.css({ "display": 'block' });
                    $input.prop("readonly", false);
                    $input.css({ 'cursor': 'text', 'font-style': 'normal', 'color': '#666666' });

                } else {
                    $view.css({ "display": "block" });
                    $picker.css({ "display": 'none' });
                    $input.prop("readonly", true);
                    $input.css({ 'cursor': 'not-allowed', 'font-style': 'italic', 'color': '#9B9B9B' });

                }

            }

            $picker.ColorPicker({
                color: col,
                onChange: function (hsb, hex, rgb) {
                    $picker.find('div').css('backgroundColor', '#' + hex);
                    $input.val('#' + hex);
                }
            });

        });
		
        $('#preloader .colorinput , #header .colorinput , #menu .colorinput , #headerstyle .colorinput , #headerStartBtn .colorinput , #footer .colorinput , #notification .colorinput').each(function () {
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

    function Sliders() {
        if (!$.fn.noUiSlider)
            return;

        var $sliders = $('input[type="range"]');

        $sliders.each(function () {
            var $this      = $(this),
                $parent    = $this.parent(),
                $label     = $('<span></span>'),
                min        = 0,
                max        = 100,
                start      = 0,
                isSwitch   = $this.hasClass('switch'),
                sliderCls  = isSwitch ? 'switch' : 'slider',
                $slider    = $('<div class="' + sliderCls + '"></div>'),
                states     = ['Off', 'On'],
                setupState = true;//For switches
                
            
            //Set label
            $parent.find('.label').prepend($label);

            if ('value' in this.attributes)
                $label.html(this.attributes['value'].value);
            
            //Set values
            if (isSwitch) {
                min = 0;
                max = 1;

                if ($this.attr('data-state0') !== undefined)
                    states[0] = $this.attr('data-state0');

                if ($this.attr('data-state1') !== undefined)
                    states[1] = $this.attr('data-state1');

            }
            else {

                if ($this.attr('min') !== undefined)
                    min = parseInt($this.attr('min'));

                if ($this.attr('max') !== undefined)
                    max = parseInt($this.attr('max'));

            }

            if ('value' in this.attributes && 
                this.attributes['value'].value.length > 0)
                start = parseInt(this.attributes['value'].value);
            else
                start = min + max * 0.5;

            $this.hide();
            $slider.appendTo($parent);

            $slider.noUiSlider('init', {
                knobs: 1,
                start: [start, start],
                scale: [min, max],
                connect: "lower",
                change: Handle_Change
            });

            function Handle_Change(e) {
                var value = Get_Value();

                if (isNaN(value) || (setupState && isSwitch && start > 0 && start < 1))
                    value = min;

                if (isSwitch) 
                    $label.html(states[value]);
                else
                    $label.html(value);

                $this.val(value);

                setupState = false;
            }

            function Get_Value() {
                return $slider.noUiSlider('value')[1];
            }
            
            var $midbar = $slider.find('.noUi-midBar'),
                left = $midbar.css('left'),
                right = $midbar.css('right');

            if (left == '0px' && right == '0px' && Get_Value() != max) {
                $midbar.css({ right: $this.width() });
            }

            var $sliderHandle = $slider.find('.noUi-handle');


            if (isSwitch) {
                var currentValue = Get_Value(),
                    isMouseDown = false;
                    
                
                $(document).mouseup(function () {
                    if (!isMouseDown) 
                        return;
                        
                    var value = Get_Value();
                    $slider.noUiSlider('move', { knob: 'upper', to: value, scale: [0, 1] });

                    isMouseDown = false;
                });

                $sliderHandle.find('div').mousedown(function () {
                    isMouseDown = true;
                });
                
                $slider.click(function () {
                    currentValue = currentValue == 0 ? 1 : 0;

                    $slider.noUiSlider('move', { knob: 'upper', to: currentValue, scale: [0, 1] });
                });
                
                Handle_Change();
            }


        });

    }

    function Tooltips() {


        $('.section-tooltip').each(function () {
            var $this = $(this),
                text = $this.html(),
                $icon = $('<a href="#" class="icon"></a>'),
                $wrap = $('<div class="tip_wrapper"><div class="text">' + text + '</div><div class="arrow_shade"></div><div class="arrow"></div></div>'); 
              
            $this.html('');
            $this.append($icon);
            $this.append($wrap);
            $wrap.css({opacity:0, display:'none'});

            function Adjust_Tooltip() {
                $wrap.css({ right: 0, top: -($wrap.outerHeight() - $icon.outerHeight() * 0.5) });
            }

            Adjust_Tooltip();
            
            $icon.click(function (e) {
                e.preventDefault();
            });

            if ($.fn.hoverIntent)
                $this.hoverIntent(InHandler, OutHandler);
            else
                $this.hover(InHandler, OutHandler);
            
            function InHandler() {
                $wrap.css({ display: 'block' });
                Adjust_Tooltip();
                $wrap.stop().animate({ opacity: 1 }, 200);
            }

            function OutHandler() {
                $wrap.stop().animate({ opacity: 0, }, { duration: 200, complete: function () { $wrap.css({ display: 'none' }); } });
            }

        });

    }

    function Save_Button() {
        var $btns = $('.px-main .save-button'),
            $loadingIcons = $btns.find('.loading-icon'),
            $saveIcons = $btns.find('.save-icon'),
            $form = $('.px-container'),
            $dummyData = $('.px-main input[name="import_dummy_data"]');

        $btns.click(function (e) {
            var $btn     = $(this);

            if ($btn.hasClass('loading')) {
                e.preventDefault();
                return;
            }

            var data = $form.find('input,textarea,select').serialize();

            $loadingIcons.css({ display: 'inline' });
            $saveIcons.hide();

            $btns.addClass('loading');


            //Todo: Save the settings
            //Test ajax call
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: data,
                success: function (data, textStatus, jqXHR) {
                    //TODO: Show proper saved message
                    if('imported' == data){
                        window.location.reload();
                    }
                    OnSaveComplete();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    OnSaveComplete();

                    alert('Error occured in saving data');
                }
            });

            function OnSaveComplete() {
                $loadingIcons.hide();
                $saveIcons.css({ display: 'inline' });
                $btns.removeClass('loading');

                //Reload page if import dummy data option is selected
                if ($dummyData.length && $dummyData.val() == '1')
                    document.location.reload(true);
            }

            e.preventDefault();
        });


    }

    function Tabs() {
        var $tabs = $('.px-tab a'),
            $active = $();

        $tabs.each(function () {
            var $this = $(this),
                href = $this.attr('href'),
                $container = $(href);

            $this.click(function (e) {
                e.preventDefault();

                if ($this.hasClass('active'))
                    return;

                $tabs.removeClass('active');
                $this.addClass('active');

                $active.hide();
                $container.show();

                $active = $container;

                $(window).resize();
            });

            if ($this.hasClass('active')) {
                $this.removeClass('active');
                $this.click();
                $active = $container;
            }
            else {
                $container.hide();
            }

        });

    }

    function Sidebar_Accordion() {
        var $panels = $('#px-sidebar-accordion > div'),
            $head = $('#px-sidebar-accordion > h3 a');

        $panels.hide();

        var $active = $('#px-sidebar-accordion > h3 a.active'),
            $target = $();

        if ($active.length > 0) {
            $target = $active.parent().next();
            $target.show();
        }


        $head.click(function (e) {
            var $this = $(this);

            $target = $this.parent().next();

            if (!$this.hasClass('active')) {
                var $prev = $('#px-sidebar-accordion > h3 a.active').parent().next();

                $head.removeClass('active');

                $prev.slideUp('slow', 'easeOutQuad');
                $target.slideDown('slow', 'easeOutQuad');
                $this.addClass('active');

            }

            e.preventDefault();
        });
    }

    function Thickbox() {
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        $('.upload-button,.add_media').click(function(e) {
            e.preventDefault();
            parent=$(this).parent();
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(this);
            var id = button.attr('data-ref');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media ) {
                    parent.find('[type="text"]').val(attachment.url);
                } else {
                    return _orig_send_attachment.apply( this, [props, attachment] );
                };
            }
            wp.media.editor.open(button);

            return false;
        });

    }



	function ImageFields()
    {
        var $imageSec    = $('.section-home-slides'),
            $fields      = $imageSec.find('.upload-field'),
            $dupBtn      = $('<a class="duplicate-button" href="#">Add Image</a>'),
            $remBtn      = $('<a class="remove-button" href="#">Remove</a>');

        //Click handler for remove button
        $remBtn.click(function(e){
            e.preventDefault();

            var $this = $(this);

            $this.parent().remove();

            $fields = $imageSec.find('.upload-field');

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
            $fields        = $imageSec.find('.upload-field');
            var $lastField = $fields.filter(':last'),
                $clone     = $lastField.clone(true);

            //Clear the value (if any)
            $clone.find('input[type="text"]').val('');

            $lastField.after($clone);

            //Refresh
            $fields        = $imageSec.find('.upload-field');
            //Add 'remove' button to all fields
            //Rest of 'remove' buttons will get cloned
            if($fields.length == 2)
                $fields.append($remBtn.clone(true));
        });
    }

	function HomeType()
    {
	    var $container = $('#header'),
			$hContainer = $('#menu'),
			$menuStyle = $hContainer.find('select[name="header-style"]'),
            $mediaType = $container.find('select[name="home-type-switch"]'),
			$menuSec   = $container.find('.section-logo,.section-logo-second'),
            $sec = $container.find('.section-home-video,.section-home-map,.section-home-layerSlider,.section-home-slider,.section-home-MasterSlider,.section-home-particle');
				
		// media style	
		$mediaType.change(function(){

            var $selected = $mediaType.find('option:selected'),
                val = $selected.val(),
                $selected = $container.find('.section-'+val);
				
            if ( val == 'home-layerSlider' || val == 'home-MasterSlider' ) {
				$(".section-home-slider-overlay").slideUp('fast').next('hr').hide();
            } else if (val == 'home-particle') {
                $(".section-home-slider-overlay").slideUp('fast').next('hr').hide();
				//$(".section-home-slider-overlay").slideUp('fast');
			} else {
				$(".section-home-slider-overlay").slideDown('fast');
			}

			if (val == 'home-slider') {
			    $(".section-animation-mode").slideDown('fast').next('hr').show();
			} else {
			    $(".section-animation-mode").slideUp('fast').next('hr').hide();
			}
			
            $sec.not($selected).slideUp('fast').next('hr').hide();
            $selected.slideDown('fast').next('hr').show();
        }).change();
		
		// menu style 
        $menuStyle.change(function(){

            var $selected = $menuStyle.find('option:selected'),
                val = $selected.val(),
                $selected = $hContainer.find('.section-'+val);
				
            if (val == 'fixed-menu' || val == 'scroll-sticky' || val == 'wave-menu') {

			    $(".section-logo").slideUp('fast').next('hr').hide();
			    $(".section-initial-menu-color").slideUp('fast').next('hr').hide();


			    if (val == 'wave-menu') {

			        $(".section-menu-style").slideUp('fast').next('hr').hide();

			        $(".section-menu-color").find('.field').eq(2).hide();
			        $(".section-menu-color").find('.field').eq(3).hide();

			    } else if ((val == 'fixed-menu' || val == 'scroll-sticky')) {

			        $(".section-menu-style").slideDown('fast').next('hr').show();
			        $(".section-menu-color").find('.field').eq(2).show();
			        $(".section-menu-color").find('.field').eq(3).show();
			    }

			} else if ( val == 'scooter-menu' ) {
			    $(".section-logo-second , .section-logo , .section-initial-menu-color ").slideDown('fast').next('hr').show();
			}
			
            $menuSec.not($selected).slideUp('fast').next('hr').hide();
            $selected.slideDown('fast').next('hr').show();
        }).change();

    }
	
	function homeTextRotator() {

	    $('.section-text-rotator1').prev('hr').css('height', '2px');
	    $('[class*=section-text-rotator]').next('hr').css('height', '2px');

	    // hide empty text Rotator When Load Page except first item
	    var $TextRotatorInput = $('.section-text-rotator1'),
        $allTextRotatorInput = $('[class*=section-text-rotator]');

	    // this Code Cause First text Rotator be Visible 
	    $textRotatorInputNotFirst = $allTextRotatorInput.not(':first');
	    $allTextRotatorInput.first().find('.deleteImageSelect input').attr('value', '2');

	    $textRotatorInputNotFirst.each(function () {
	        $DISValue = $(this).find('.deleteImageSelect input').attr('value');
	        if ($DISValue == "1") {
	            $(this).hide().next('hr').hide();
	        }

	    });



        // Add New Text More BTN 
	    $tDupBtn = $('<a class="duplicate-text-button" href="#"> <span class="plus"> + </span> <span class="add"> Add </span> </a>');

	    var $filTRCounter = 0;
	    $textRotatorInputNotFirst.each(function () {

	        var $this = $(this);
	        var $inputValue = $this.find('.deleteImageSelect input').attr('value');
	        if ( $inputValue === "2") {
	            $filTRCounter++;
	        }

	    });

	    if ( $filTRCounter < 9) {

	        //Add duplicate button after last text field
	        $allTextRotatorInput.filter(':last').after($tDupBtn);

	    }

	    var $homeStyleSection = $('.section-home-text-slider'),
	    $emptyTextRotatorInput = $homeStyleSection.find('input:text[value=""]').parent('.text-input'),
        $textRotatorInput = $homeStyleSection.find('input:text').parent('.text-input'),
        $tDupBtn = $('<a class="duplicate-text-button" href="#"><span class="plus"> + </span> <span class="add"> Add </span> </a>');

	    if ((10 - $emptyTextRotatorInput.length) < 9) {
	        //Add duplicate button after last text field
	        $textRotatorInput.filter(':last').after($tDupBtn);

	    }

	    $('.duplicate-text-button').click(function (e) {

	        e.preventDefault();

	        var $emptytextRotator = $('.section-text-rotator1');

	        $textRotatorInputNotFirst.each(function () {

	            var $this = $(this);
	            if ($this.find('.deleteImageSelect input').attr('value') === "1") {
	                $emptytextRotator = $emptytextRotator.add($this);
	            }

	        });


	        $emptytextRotator = $emptytextRotator.not(':first');



	        if ($emptytextRotator.length < 10 && $emptytextRotator.length > 0) {

	            $emptytextRotator.first().show().next('hr').show();;
	            $emptytextRotator.first().find('.deleteImageSelect input').attr('value', '2 ');

	            if ($emptytextRotator.length == 1) {

	                $('.duplicate-text-button').hide();

	            }
	        }

	        $allTextRotatorInput.find('.deleteImageSelect input').filter();


	    })

	    $emptyTextRotatorInput.not(':first').hide();


	    // remover text roter by Click On Remove Btn And Set deleteImageSelect value = 1 (empty) 
	    $(document).on('click', '.imageSelect.deleteImageSelect', function () {

	        var $this = $(this);
	        $this.find('input').attr('value', '1');
	        $this.parents('.section').slideUp('fast').next('hr').hide();

	        $parent = $this.parent('[class*=section-text-rotator]');

	        $input = $parent.find('[id*=field-home-text]');
	        $inputSubtitle = $parent.find('[id*=field-home-subtitle]');
	        $imageInput = $parent.find('[id*=field-header-image]');
	        $textArea = $parent.find('.text-rotator-textarea-input').find('textarea');
	        $iconInput = $parent.find('.text-rotator-icon-input input')

	        $iconInput.removeAttr('value');// empty iconbox 
	        var $pxInputIcon = $parent.find('.px-input-icon');
	        $pxInputIcon.find('.px-icon').removeClass('selected');

	        $input.removeAttr('value');//empty title box
	        $imageInput.removeAttr('value');//empty Image box
	        $inputSubtitle.removeAttr('value');// empty subtitle 
	        $textArea.val('');// empty textarea

	    });



	}

	function headerStyle() {
	    var $container = $('#headerstyle'),
			$headerStyle = $container.find('input[name="home-text-style"]'),
	        $headerStyleVal = $headerStyle.val();

	    $mediaType = $container.find('select[name="text-head-type"]'),

        $imagesec = $container.find('.text-rotator-image-input');
	    $iconsec = $container.find('.text-rotator-icon-input');
	    $textareasec = $container.find('.text-rotator-textarea-input');
	    $subtitlesec = $container.find('.text-rotator-subtitle-input');


	    if ($headerStyleVal == 1 || $headerStyleVal == 2 || $headerStyleVal == 3 || $headerStyleVal == 4) {

	        $subtitlesec.add($iconsec).slideUp('fast');
	        $imagesec.add($textareasec).slideDown('fast');


	    } else if ($headerStyleVal == 5 || $headerStyleVal == 6 || $headerStyleVal == 7 || $headerStyleVal == 8) {

	        $subtitlesec.add($iconsec).slideDown('fast');
	        $imagesec.add($textareasec).slideUp('fast');

	    }

	    // media style	
	    $mediaType.change(function () {

	        var $selected = $mediaType.find('option:selected'),
                val = $selected.val(),
                $selected = $container.find('.section-' + val);

	        if (val == 'image') {

	            $imagesec.slideDown('fast');
	            $iconsec.slideUp('fast');

	        } else if (val == 'icon') {

	            $imagesec.slideUp('fast');
	            $iconsec.slideDown('fast');

	        }

	    }).change();

	    $(document).on('click', '.imageList a', function () {

	        var $select = $(this),
			$headerStyleVal = parseInt($(this).text());

	        if ($headerStyleVal == 1 || $headerStyleVal == 2 || $headerStyleVal == 3 || $headerStyleVal == 4) {

	            $subtitlesec.slideUp('fast');
	            $textareasec.slideDown('fast');

	        } else if ($headerStyleVal == 5 || $headerStyleVal == 6 || $headerStyleVal == 7 || $headerStyleVal == 8) {

	            $subtitlesec.slideDown('fast');
	            $textareasec.slideUp('fast');

	        }

	    });

	}
	
	
	
	
	

      
	
    $(document).ready(function () {

        FieldSelector();
        CSVInput();
        ImageSelect();
        Save_Button();
        Thickbox();
        Tooltips();
        Sliders();
        ColorPicker();
        Combobox();
        Chosen();
        Tabs();
        Sidebar_Accordion();
		ImageFields();
		HomeType();
		homeTextRotator();
		iconSelect();
		headerStyle();
		
		
		

    });

})(jQuery);