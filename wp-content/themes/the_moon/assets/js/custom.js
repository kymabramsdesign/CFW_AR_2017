(function ($) {

    var //(Private)
		Reg_Email = /^\w+([\-\.]\w+)*@([a-z0-9]+(\-+[a-z0-9]+)?\.)+[a-z]{2,5}$/i,
        $window = $(window),
		$windowHeight = $(window).height(),
		$documentHeight = $(document).height(),
		$windowWidth = $(window).width(),
		$wpAdminBarHeight = $('#wpadminbar').height(),
        ua = window.navigator.userAgent,
        msie = ua.indexOf("MSIE "),
		num, // blog page number 
		mainHeight = $('body').height(),
	    $checkFixed = $("#pxHeader").attr("data-fixed"), // Check menu fixed option is enable (1) or disable (0)
		scroll, scrollto,

		//portfolio Options 
		pageRefresh = true,
		content = false,
		ajaxLoading = false,
		projectContainer = $('#portfolioDetailAjax'),
		portfolioGrid = $('#isotopePortfolio'),
		wrapperHeight,
		folderName = 'portfolio-detail',
		loader = $('.portfolioSection #loader'),
        pDError = $('#pDError'),
        pDetailNav = $('.navCloseWrap'),
        hash = $(window.location).attr('hash'),
        root = '#!' + folderName + '/',
        rootLength = root.length,

        //VideO background Section Options
        videoWidthOriginal = 1280,  // original video dimensions
        videoHeightOriginal = 720,
        minW = 1500, // minimum video width allowed
        vidRatio = 1280 / 720,
        //--------------------------
        scrollpals = $("html, body"),
        isTouchDevice = 'ontouchstart' in window || 'onmsgesturechange' in window;// second test works on ie10 (surface)


    /*-----------------------------------------------------------------------------------*/
    /*	Wave Menu
    /*-----------------------------------------------------------------------------------*/

    if ($('.wave-menu').length) {

        var $bodyEl = $("body")
        $content = $('#main'),
        $openbtn = $('#open-button'),
        $isOpen = false,
        $wave_logo = $('.wave-menu .logo'),
        $morphEl = $('#morph-shape'),
        s = Snap(('#morph-shape svg'));
        $path = s.select('path');
        $initialPath = this.$path.attr('d'),
        $pathOpen = $morphEl.attr('data-morph-open'),
        $isAnimating = false;
  
    }

    function wave_menu() {

        if ($('.wave-menu').length) {
            initEvents();
        }
    }

    function initEvents() {

        $openbtn.click(function () {
            toggleMenu();
        });

        $content.click(function () {
		    if ($isOpen) {
		        toggleMenu();
		    }
		});

    }

    function toggleMenu() {
        if ($isAnimating) return false;
        $isAnimating = true;
        if ($isOpen) {

            $openbtn.removeClass('wavemenu_active');
            $wave_logo.removeClass('show_wave_menu_logo');
            

            $bodyEl.removeClass("show-wave-menu");
            // animate path
            setTimeout(function () {
                // reset path
                $path.attr('d', $initialPath);
                $isAnimating = false;
            }, 300);
        }
        else {

            $openbtn.addClass('wavemenu_active');
            $wave_logo.addClass('show_wave_menu_logo');


            $bodyEl.addClass('show-wave-menu');
            // animate path
            $path.animate({ 'path': $pathOpen }, 400, mina.easeinout, function () { $isAnimating = false; });
        }
        $isOpen = !$isOpen;
    }

    /*-----------------------------------------------------------------------------------*/
    /*	particle
    /*-----------------------------------------------------------------------------------*/

    function particle() {

        if ($('#particle').length) {

            var width, height, largeHeader, canvas, ctx, circles, target, animateHeader = true;

            function initHeader() {
                width = window.innerWidth;// Window width
                height = window.innerHeight; // Windows Height
                target = { x: 0, y: height }; // 

                largeHeader = document.getElementById('particle');
                largeHeader.style.height = height + 'px';

                canvas = document.getElementById('particle-canvas');
                canvas.width = width;
                canvas.height = height;
                ctx = canvas.getContext('2d'); // method returns an object that provides methods and properties for drawing on the canvas.

                // create particles
                circles = [];
                for (var x = 0; x < width * .5; x++) {  //amount Of Circles  
                    var c = new Circle();
                    circles.push(c); // Push All Circle in circles  Array
                }
                animate();
            }

            // Event handling
            function addListeners() {
                window.addEventListener('scroll', scrollCheck);
                window.addEventListener('resize', resize);
            }

            function scrollCheck() {
                if (document.body.scrollTop > height) animateHeader = false;
                else animateHeader = true;
            }

            function resize() {
                width = window.innerWidth;
                height = window.innerHeight;
                largeHeader.style.height = height + 'px';
                canvas.width = width;
                canvas.height = height;
            }

            function animate() {
                if (animateHeader) {
                    ctx.clearRect(0, 0, width, height);
                    for (var i in circles) {
                        circles[i].draw();
                    }
                }
                requestAnimationFrame(animate);
            }

            // Canvas manipulation
            function Circle() {
                var _this = this;

                // constructor
                (function () {
                    _this.pos = {};
                    init();
                })();

                function init() {
                    _this.pos.x = Math.random() * width;
                    _this.pos.y = Math.random() * 150;
                    _this.alpha = 0.1 + Math.random() * 0.6;
                    _this.scale = 0.1 + Math.random() * 0.5;
                    _this.velocity = Math.random();
                }

                this.draw = function () {
                    if (_this.alpha <= 0) {
                        init();
                    }
                    _this.pos.y += _this.velocity;
                    _this.alpha -= 0.0005;
                    ctx.beginPath();
                    ctx.arc(_this.pos.x, _this.pos.y, _this.scale * 10, 0, 2 * Math.PI, false);
                    ctx.fillStyle = 'rgba(255,255,255,' + _this.alpha + ')';
                    ctx.fill();
                };
            }

            // Main
            initHeader();
            addListeners();

        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*	select2 For Restyle SELECT OPTION 
    /*-----------------------------------------------------------------------------------*/

    function initSelect2() {

        if ($('.woocommerce-ordering .orderby').length) {
            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: -1
            });
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*	product  detail - magnific Popup 
    /*-----------------------------------------------------------------------------------*/

    function magnificPopup() {

        "use strict";

        if ($('.popup-gallery').length) {
            $('.popup-gallery').magnificPopup({
                delegate: '.woocommerce-thumbnails-image',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function (item) {
                        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                    }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function (element) {
                        return element.find('img');
                    }
                }
            });
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*	carousel Shortcode
    /*-----------------------------------------------------------------------------------*/

    function image_carousel() {

        "use strict";

        if ($('.image_carousel').length) {

            $('.image_carousel').each(function () {

                //get the visible itemes that save in Data-visibleitems
                var $visibleItems = parseInt($(this).attr('data-visibleitems'));

                var itemWidth = ($(this).parents('.grid_section').length == 1) ? 170 : 315;

                var $nextbtn = $(this).find('.next');
                var $prevbtn = $(this).find('.prev');

                $(this).find('.slides').carouFredSel({
                    circular: true,
                    responsive: true,
                    scroll: {
                        items: 1,
                        duration: 700,
                        pauseOnHover: false,
                        easing: "easeInOutSine",
                    },
                    items: {
                        width: itemWidth,
                        visible: {
                            min: $visibleItems,
                            max: 6,
                        }
                    },
                    auto: true,
                    prev: $prevbtn,
                    next: $nextbtn,
                    mousewheel: false,
                    swipe: {
                        onMouse: true,
                        onTouch: true,
                        duration: 600,
                    }

                }).animate({ 'opacity': 1 }, 500);
            });

            // Set Height
            setHeights();
        }

    }

    // crousel items Height
    function setHeights() {

        if ($('.image_carousel').length) {
            $('.image_carousel').each(function () {


                $height = $(this).find('li.item').outerHeight() + 'px';
              
                $(this).find('.caroufredsel_wrapper').css({
                    'height': $height
                });

                //image_carousel class set Heighty
                $(this).css({
                    'height': $height
                });

            });
        }

    }

    /*-----------------------------------------------------------------------------------*/
    /*	Hover :::::: Btn's &  socialBtn's And ImageBox hover  
    /*-----------------------------------------------------------------------------------*/

    function button_hover() {

        "use strict";

        $(".button.button1")
        .mouseenter(function () {
            var $this = $(this);
            $(this).find('.hover-bg').add('.hover-text').removeClass("leave").removeClass("reset").addClass("enter");

            if ($(this).hasClass("fill")) {
                $this.css({ 'background-color': 'transparent' });

                var i = setInterval(function () {

                    $this.find('.hover-bg').add('.hover-text').removeClass("enter").addClass("fillrest");

                    clearInterval(i);

                }, 300);

            }

        })
        .mouseleave(function () {

            var $this = $(this);
            $this.find('.hover-bg').add('.hover-text').removeClass("enter").removeClass("fillrest").addClass("leave");

            if ($(this).hasClass("transparent")) {

                var i = setInterval(function () {

                    $this.find('.hover-bg').add('.hover-text').removeClass("leave").addClass("reset");

                    clearInterval(i);

                }, 1000);
            }

        });

    }

    // social icon And Image Box Hover
    function moon_hover() {

        "use strict";

        $(".socialLinkShortcode , .imageBox , .socialLinkFooter")
        .mouseenter(function () {

            var $this = $(this);
            $(this).find('.hover-bg').add('.hover-text').removeClass("leave").removeClass("reset").addClass("enter");

        })
        .mouseleave(function () {
            var $this = $(this);
            $this.find('.hover-bg').add('.hover-text').removeClass("enter").removeClass("fillrest").addClass("leave");

            var i = setInterval(function () {

                $this.find('.hover-bg').add('.hover-text').removeClass("leave").addClass("reset");

                clearInterval(i);

            }, 250);
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	pixflow Image Slider
    /*-----------------------------------------------------------------------------------*/

    function remove_container_image_slider() {

        "use strict";

        if ($('.pixflow_image_slider').length) {
            $('.pixflow_image_slider').each(function () {
                $(this).closest('.container').removeClass('container');
                $(this).parent().parent().css({
                    'padding-right': '0px',
                    'padding-left': '0px',
                });

            });
        }

        $('.pixflow_image_slider_text').mCustomScrollbar({
            theme: "dark-thick",
            autoHideScrollbar: true
        });

    }

    /*-----------------------------------------------------------------------------------*/
    /*	progress bar with animation Function
    /*-----------------------------------------------------------------------------------*/

    function progressbar() {

        "use strict";

        if ($(window).width() > 1024) {

            var $progressbar = $('.progress_bar').not('.progressbarWithAnimation');

        } else {

            var $progressbar = $('.progress_bar');

        }

        if (!$progressbar.length) return;

        $progressbar.each(function () {

            var $progressbarpercent = $(this).find('.progressbar_percent').attr('data-percentage');
            $progressbarpercent = $progressbarpercent / 100;
            var $add_width = ($progressbarpercent * $(this).width()) + 'px';

            $(this).find('.progressbar_percent').animate({
                'width': $add_width
            }
            , {
                easing: 'easeInOutCubic',
                duration: 1500
            });

        });
    }

    /* progress bar With Animation*/
    function progressbarAnimate() {

        "use strict";

        var $progressbar = $('.progressbarWithAnimation');
        if (!$progressbar.length) return;
        $progressbar.each(function () {

            var $progressbarpercent = $(this).find('.progressbar_percent').attr('data-percentage');
            $progressbarpercent = $progressbarpercent / 100;
            var $add_width = ($progressbarpercent * $(this).width()) + 'px';

            $(this).find('.progressbar_percent').animate({
                'width': $add_width,
            }
            , {
                easing: 'easeInOutCubic',
                duration: 1500
            });

        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	Easy Pie Chart Function
    /*-----------------------------------------------------------------------------------*/

    function piechart() {

        "use strict";

        if ($(window).width() > 1024) {

            var $pieChartBox = $('.pieChartBox').not('.pieChartWithAnimation');

        } else {

            var $pieChartBox = $('.pieChartBox');

        }

        if (!$pieChartBox.length) return;

        $pieChartBox.each(function () {
            $(this).find('.easyPieChart').easyPieChart({
                scaleColor: false,
                barColor: $(this).attr('data-barColor'),
                lineWidth: 12,
                trackColor: 'rgba(0, 0, 0, 0.15)',
                lineCap: 'round',
                easing: 'easeInQuart',
                animate: { duration: 3000, enabled: true },
                size: 145
            });
        });
    }

    /* PieChart With Animation*/
    function piechartAnimate() {

        "use strict";

        var $pieChartBox = $('.pieChartWithAnimation');
        if (!$pieChartBox.length) return;

        $pieChartBox.each(function () {
            $(this).find('.easyPieChart').easyPieChart({
                scaleColor: false,
                barColor: $(this).attr('data-barColor'),
                lineWidth: 12,
                trackColor: 'rgba(0,0,0,0.15)',
                lineCap: 'round',
                easing: 'easeInQuart',
                animate: { duration: 3000, enabled: true },
                size: 145
            });
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Counter Box
    /*-----------------------------------------------------------------------------------*/

    function counterBox() {

        "use strict";
        var $counterBoxContainers = $('.counterBox');

        if (!$counterBoxContainers.length) return;
		
        $counterBoxContainers.each(function () {
			var dec= $(this).attr('data-dec');
			
			if(dec!=0)
			{
				var cto = parseFloat($(this).attr('data-to'));
				var cfrom=parseFloat( $(this).attr('data-from'));
			}
			else
			{
				var cto = Math.abs(parseInt($(this).attr('data-to')));
				var cfrom=Math.abs(parseInt( $(this).attr('data-from')));
			}
            
			
				$(this).find('.counterBoxNumber').countTo({
                from:cfrom,
				to: cto,
                speed: 1250,
                refreshInterval: 100,
				decimals:dec,
				onComplete:function(){
				
				if($(".counterBoxNumber").html()=="-0")
					$(".counterBoxNumber").html("0");
			
					
				}
				
				
            });
			
            
        });
    }

    /* Counter Box With Animation*/
    function counterBoxAnimate() {

        "use strict";

        var $counterBoxContainers = $('.counterWithAnimation');

        if (!$counterBoxContainers.length) return;

		
        $counterBoxContainers.each(function () {
			
			
			var dec= $(this).attr('data-dec');
			
			if(dec!=0)
			{
				var cto = parseFloat($(this).attr('data-to'));
				var cfrom=parseFloat( $(this).attr('data-from'));
			}
			else
			{
				var cto = Math.abs(parseInt($(this).attr('data-to')));
				var cfrom=Math.abs(parseInt( $(this).attr('data-from')));
			}
			
            var countNmber = $(this).attr('data-countNmber');
            $(this).find('.counterBoxNumber').countTo({
                from:cfrom,
                to: cto,
                speed: 1250,
                refreshInterval: 100,
				decimals:dec,
				onComplete:function(){
				if($(".counterBoxNumber").html()=="-0")
					$(".counterBoxNumber").html("0");	
				}
				
            });
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Animation For Image & Text Shortcode
    /*-----------------------------------------------------------------------------------*/

    function shortcodeAnimation() {

        "use strict";

        if ($(window).width() > 1024) {

            $('.imgWithAnimation').add('.textWithAnimation').add('.iconWithAnimation').add('.teamWithAnimation').add('.counterWithAnimation').add('.pieChartWithAnimation').add('.progressbarWithAnimation').add('.testimonialWithAnimation').add('.pixflowHeaderWithAnimation').each(function () {

                var $daly = $(this).attr('data-delay');

                $(this).appear(function () {


                    if ($(this).attr('data-animation') == 'fade-in-left') {

                        var item = this;
                        setTimeout((function () {

                            $(item).animate({
                                avoidTransforms: true,
                                // avoidCSSTransitions:true,
                                useTranslate3d: true,
                                'opacity': 1,
                                'left': '-80px',
                                'right': '0px'
                            }
                            , {
                                complete: function () {
                                    $(this).css({
                                        'right': '0px',
                                        'left': '0px'
                                    });

                                    $(this).addClass('notransitionleft');
                                },
                                easing: 'easeOutSine',
                                duration: 800

                            });

                        }), $daly);

                        //Run Counter Box Animation
                        if ($(item).hasClass("counterBox")) {
                            counterBoxAnimate();
                        }
                        //Run Pie Chart  Animation 
                        if ($(item).hasClass("pieChartBox")) {
                            piechartAnimate();
                        }
                        //Run Progress bar  Animation 
                        if ($(this).hasClass("progress_bar")) {
                            progressbarAnimate();
                        }

                    } else if ($(this).attr('data-animation') == 'fade-in-right') {

                        var item = this;
                        setTimeout((function () {
                            $(item).animate({
                                'opacity': 1,
                                'right': '-80px'
                            }
                           , {
                               complete: function () {
                                   $(this).css({ 'left': '0px' });

                               },
                               easing: 'easeOutSine',
                               duration: 800
                           });
                        }), $daly);

                        //Run Counter Box Animation
                        if ($(item).hasClass("counterBox")) {
                            counterBoxAnimate();
                        }
                        //Run Pie Chart  Animation 
                        if ($(item).hasClass("pieChartBox")) {
                            piechartAnimate();
                        }
                        //Run Progress bar  Animation 
                        if ($(this).hasClass("progress_bar")) {
                            progressbarAnimate();
                        }

                    } else if ($(this).attr('data-animation') == 'fade-in-bottom') {

                        var item = this;
                        setTimeout((function () {

                            $(item).animate({
                                'opacity': 1,
                                'left': '0px'
                            }, 800, 'easeOutSine');


                            $(item).animate({
                                'opacity': 1,
                                'bottom': '-70px'
                            }
                            , {
                                complete: function () {
                                    $(this).css({ 'top': '0px' });
                                    $(this).addClass('notransition');
                                },
                                easing: 'easeOutSine',
                                duration: 800
                            });

                        }), $daly);

                        //Run Counter Box Animation
                        if ($(this).hasClass("counterBox")) {
                            counterBoxAnimate();
                        }
                        //Run Pie Chart  Animation 
                        if ($(this).hasClass("pieChartBox")) {
                            piechartAnimate();
                        }
                        //Run Progress bar  Animation 
                        if ($(this).hasClass("progress_bar")) {
                            progressbarAnimate();
                        }

                    } else if ($(this).attr('data-animation') == 'fade-in-top') {

                        var item = this;
                        setTimeout((function () {

                            $(item).animate({
                                'opacity': 1,
                                'top': '0px'
                            }, 800, 'easeOutSine');

                            //Run Counter Box Animation
                            if ($(item).hasClass("counterBox")) {
                                counterBoxAnimate();
                            }
                            //Run Pie Chart  Animation 
                            if ($(item).hasClass("pieChartBox")) {
                                piechartAnimate();
                            }
                            //Run Progress bar  Animation 
                            if ($(this).hasClass("progress_bar")) {
                                progressbarAnimate();
                            }
                        }), $daly);

                    } else if ($(this).attr('data-animation') == 'fade-in') {

                        var item = this;
                        setTimeout((function () {

                            $(item).animate({
                                'opacity': 1
                            }, 800, 'easeOutSine');

                        }), $daly);


                        //Run Counter Box Animation
                        if ($(item).hasClass("counterBox")) {
                            counterBoxAnimate();
                        }
                        //Run Pie Chart  Animation 
                        if ($(item).hasClass("pieChartBox")) {
                            piechartAnimate();
                        }
                        //Run Progress bar  Animation 
                        if ($(this).hasClass("progress_bar")) {
                            progressbarAnimate();
                        }
                    }

                    else if ($(this).attr('data-animation') == 'grow-in') {
                        var $that = $(this);

                        setTimeout(function () {
                            $that.transition({ scale: 1, 'opacity': 1 }, 900, 'cubic-bezier(0.15, 0.84, 0.35, 1.25)');
                        }, $daly);

                        //Run Counter Box Animation
                        if ($(this).hasClass("counterBox")) {
                            counterBoxAnimate();
                        }
                        //Run Progress bar  Animation 
                        if ($(this).hasClass("progress_bar")) {
                            progressbarAnimate();
                        }

                    }


                }, { accX: 0, accY: -100 }, 'easeInCubic');


                $(this).appear(function () {

                    if ($(this).attr('data-animation') == 'fade-in-top') {

                        var item = this;
                        setTimeout((function () {

                            $(item).animate({
                                'opacity': 1,
                                'top': '0px'
                            }, 800, 'easeOutSine');

                            //Run Counter Box Animation
                            if ($(item).hasClass("counterBox")) {
                                counterBoxAnimate();
                            }
                            //Run Pie Chart  Animation 
                            if ($(item).hasClass("pieChartBox")) {
                                piechartAnimate();
                            }
                            //Run Pie Chart  Animation 
                            if ($(item).hasClass("pieChartBox")) {
                                progressbarAnimate();
                            }
                            //Run Progress bar  Animation 
                            if ($(this).hasClass("progress_bar")) {
                                progressbarAnimate();
                            }

                        }), $daly);

                    }

                }, { accX: 0, accY: 100 }, 'easeInCubic');

            });

        }
    }

    /*----------------------------------------------------*/
    /* full Width colorize section 
    /*----------------------------------------------------*/

    function fullWidthSection() {

        "use strict";

        var $containerWidth = $('.container').width(),
        $windowWidth = $(window).width(),
        $offset_block = (($windowWidth - parseInt($containerWidth)) / 2);
        $('.fullWidth').each(function () {
            if ($windowWidth < 768) {
                $(this).css({
                    'margin-left': -($offset_block + 60),
                    'padding-left': ($offset_block + 60),
                    'padding-right': ($offset_block + 60)
                });
            } else {
                $(this).css({
                    'margin-left': -$offset_block,
                    'padding-left': $offset_block,
                    'padding-right': $offset_block
                });
            }
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  tabs
    /*-----------------------------------------------------------------------------------*/

    function tabs() {

        "use strict";

        var $tabContainers = $('.tabs');

        if (!$tabContainers.length) return;

        $tabContainers.each(function () {
            var $container = $(this),
				$titles = $container.find('.head li'),
				$contents = $container.find('.tab-content');

            //Hide all contents except the first one
            $contents.not(':first-child').hide();

            //Mark the first tab as current one
            $titles.eq(0).addClass('current');

            $titles.click(function (e) {
                var $title = $(this),
					index = $title.index(),
					$curTitle = $titles.filter('.current');

                if ($title.hasClass('current'))
                    return;

                $contents.eq($curTitle.index()).stop().fadeOut({
                    complete: function () {
                        $curTitle.removeClass('current');
                        $title.addClass('current');
                        $contents.eq(index).fadeIn();
                    }
                });

            });
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  accordion
    /*-----------------------------------------------------------------------------------*/

    function accordion() {

        "use strict";

        var $accordion = $('.accordion,.toggle');

        if (!$accordion.length) return;

        function ToggleTab($tab) {
            var $icon = $tab.find('.tab-button span'),
				$body = $tab.find('.body');

            if ($tab.hasClass('closed')) {
                $body.slideDown(function () { $icon.attr('class', 'icon-minus'); });
                $tab.removeClass('closed');
            }
            else {
                $body.slideUp(function () { $icon.attr('class', 'icon-plus'); });
                $tab.addClass('closed');
            }
        }

        $accordion.each(function () {
            var $grp = $(this),
				$tabs = $grp.find('.tab'),
				$header = $tabs.find('.header'),
				isToggle = $grp.hasClass('toggle');

            //Close all tabs
            var keptOneOpen = false, //For accordions only
				tempList = [];
            $tabs.each(function () {
                var $tab = $(this);

                if ($tab.hasClass('keep-open')) {
                    if (isToggle) {
                        return;
                    }
                    else if (!keptOneOpen) {
                        keptOneOpen = true;
                        return;
                    }
                }

                tempList.push($tab);
            });

            //Accordion: if none was opened open the first one
            if (!isToggle && !keptOneOpen && tempList.length) {
                tempList.shift();
                keptOneOpen = true;
            }

            for (var i = 0; i < tempList.length; i++)
                ToggleTab(tempList[i]);

            $header.click(function () {
                var $head = $(this),
					$tab = $head.parent();

                if (!isToggle) {
                    //Close all other tabs
                    $tabs.not($tab).each(function () {
                        if (!$(this).hasClass('closed'))
                            ToggleTab($(this));
                    });
                }

                ToggleTab($tab);
            });

        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	google map
    /*-----------------------------------------------------------------------------------*/

    //Footer Google Map
    function googleMap() {
		
		var latarray=pixflowJsMap.cityMapCenterLat.split(',');
		var lngarray=pixflowJsMap.cityMapCenterLng.split(',');
		var len=latarray.length;
		arr=[];
		for (var i = 0; i < len; i++) {
			arr.push({
				latLng: [latarray[i],lngarray[i]]
			});
		}
		
		var address=(JSON.stringify(arr, null, 4));
		
		

        "use strict";

        if ($("#googleMap").length) {

			
            $("#googleMap").gmap3({
                map: {
                    options: {
                        zoom: parseInt(pixflowJsMap.zoomLevel),
                        disableDefaultUI: true, //  disabling zoom in touch devices
                        disableDoubleClickZoom: true, //  disabling zoom by double click on map 
                        center: arr[0],
                        draggable: false, //  disable map dragging 
                        mapTypeControl: true,
                        navigationControl: true,
                        scrollwheel: false,
                        streetViewControl: false,
                        panControl: false,
                        zoomControl: pixflowJsMap.footermapzoomcontrol,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "Gray"]
                        }
                    }
                },
                styledmaptype: {
                    id: "Gray",
                    options: {
                        name: "Gray"
                    },
                    styles: [
							{
							    featureType: "water",
							    elementType: "geometry",
							    stylers: [
									{ color: "#1d1d1d" }
							    ]
							}, {
							    featureType: "landscape",
							    stylers: [
									{ color: "#3e3e3e" },
									{ lightness: 7 }
							    ]
							}, {
							    featureType: "administrative.country",
							    elementType: "geometry.stroke",
							    stylers: [
									{ color: "#5f5f5f" },
									{ weight: 1 }
							    ]
							}, {
							    featureType: "landscape.natural.terrain",
							    stylers: [
									{ color: "#4f4f4f" }
							    ]
							}, {
							    featureType: "road",
							    stylers: [
									{ color: "#393939" }
							    ]
							}, {
							    featureType: "administrative.country",
							    elementType: "labels",
							    stylers: [
									{ visibility: "on" },
									{ weight: 0.4 },
									{ color: "#686868" }
							    ]
							}, {
							    eatureType: "administrative.locality",
							    elementType: "labels.text.fill",
							    stylers: [
									{ weigh: 2.4 },
									{ color: "#9b9b9b" }
							    ]
							}, {
							    featureType: "administrative.locality",
							    elementType: "labels.text",
							    stylers: [
									{ visibility: "on" },
									{ lightness: -80 }
							    ]
							}, {
							    featureType: "poi",
							    stylers: [
									{ visibility: "off" },
									{ color: "#d78080" }
							    ]
							}, {
							    featureType: "administrative.province",
							    elementType: "geometry",
							    stylers: [
									{ visibility: "on" },
									{ lightness: -80 }
							    ]
							}, {
							    featureType: "water",
							    elementType: "labels",
							    stylers: [
									{ color: "#adadad" },
									{ weight: 0.1 }
							    ]
							}, {
							    featureType: "administrative.province",
							    elementType: "labels.text.fill",
							    stylers: [
									{ color: "#3a3a3a" },
									{ weight: 4.8 },
									{ lightness: -69 }
							    ]
							}

                    ]
                },
                marker: {
                    values: arr,
                    options: {'icon': new google.maps.MarkerImage(pixflowJsMap.iconMap)}
                }
            });

            if ((parseInt(pixflowJsMap.customMap)) == 1) {
                $('#googleMap').gmap3('get').setMapTypeId("Gray");//Display Gray Map On Load  if we don't have this line map loads in default
            }

        }
    }

    //home Google Map	
    function homegoogleMap() {

        "use strict";

        if ($("#homeGoogleMap").length) {

            $("#homeGoogleMap").gmap3({
                map: {
                    options: {
                        zoom: parseInt(pixflowJsMap.homeZoomLevel),
                        disableDefaultUI: true, //  disabling zoom in touch devices 
                        disableDoubleClickZoom: true, //  disabling zoom by double click on map  
                        center: arr[0],
                        draggable: false, //  disable map dragging 
                        mapTypeControl: true,
                        navigationControl: false,
                        scrollwheel: false,
                        streetViewControl: false,
                        panControl: false,
                        zoomControl: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "Gray"]
                        }
                    }
                },
                styledmaptype: {
                    id: "Gray",
                    options: {
                        name: "Gray"
                    },
                    styles: [
							{
							    featureType: "water",
							    elementType: "geometry",
							    stylers: [
									{ color: "#1d1d1d" }
							    ]
							}, {
							    featureType: "landscape",
							    stylers: [
									{ color: "#3e3e3e" },
									{ lightness: 7 }
							    ]
							}, {
							    featureType: "administrative.country",
							    elementType: "geometry.stroke",
							    stylers: [
									{ color: "#5f5f5f" },
									{ weight: 1 }
							    ]
							}, {
							    featureType: "landscape.natural.terrain",
							    stylers: [
									{ color: "#4f4f4f" }
							    ]
							}, {
							    featureType: "road",
							    stylers: [
									{ color: "#393939" }
							    ]
							}, {
							    featureType: "administrative.country",
							    elementType: "labels",
							    stylers: [
									{ visibility: "on" },
									{ weight: 0.4 },
									{ color: "#686868" }
							    ]
							}, {
							    eatureType: "administrative.locality",
							    elementType: "labels.text.fill",
							    stylers: [
									{ weigh: 2.4 },
									{ color: "#9b9b9b" }
							    ]
							}, {
							    featureType: "administrative.locality",
							    elementType: "labels.text",
							    stylers: [
									{ visibility: "on" },
									{ lightness: -80 }
							    ]
							}, {
							    featureType: "poi",
							    stylers: [
									{ visibility: "off" },
									{ color: "#d78080" }
							    ]
							}, {
							    featureType: "administrative.province",
							    elementType: "geometry",
							    stylers: [
									{ visibility: "on" },
									{ lightness: -80 }
							    ]
							}, {
							    featureType: "water",
							    elementType: "labels",
							    stylers: [
									{ color: "#adadad" },
									{ weight: 0.1 }
							    ]
							}, {
							    featureType: "administrative.province",
							    elementType: "labels.text.fill",
							    stylers: [
									{ color: "#3a3a3a" },
									{ weight: 4.8 },
									{ lightness: -69 }
							    ]
							}

                    ]
                },
                marker: {
                    values: arr,
                    options: {
                        'icon': new google.maps.MarkerImage(pixflowJsMap.homeIconMap)
                    }
                }
            });


            if ((parseInt(pixflowJsMap.homeCustomMap)) == 1) {
                $('#homeGoogleMap').gmap3('get').setMapTypeId("Gray");//Display Gray Map On Load  if we don't have this line map loads in default
            }
        }

    }

    /*-----------------------------------------------------------------------------------*/
    /*	Navigation
    /*-----------------------------------------------------------------------------------*/

    function nav() {

        "use strict";
		
		

        //Superfish Effect
        $('.navigation > ul').superfish({
            animation: { opacity: 'show', height: 'show' },
            delay: 100,
            disableHI: true,
            speed: 150,
            onShow: function () {

                $(this).css({
                    opacity: 1
                });
            }
        });


        //woocomerce drop down cart Widget
        $('.wc_cart_outer').superfish({
            animation: { opacity: 'show', height: 'show' },
            delay: 0,
            disableHI: true,
            speed: 150,
            onShow: function () {

                $(this).css({
                    opacity: 1
                });
            }
        });


        if ( $documentHeight > 500 && $checkFixed === 'scroll-sticky' && $(window).width() > 1024) {

            var $window_y = $(window).scrollTop();
            if ($window_y > 500) {
                $("#pxHeader").fadeIn(300);
            } else {
                $("#pxHeader").fadeOut(300);
            }

        } else if ( $documentHeight > 500 && $checkFixed === 'scooter-menu' && $(window).width() > 1024) {
            $window_y = $(window).scrollTop();
						


            if ($window_y > 500) {

                $("#logoMenuHeader").fadeIn('fast');
                $("#logoHeader").fadeOut('fast');
                $('#pxHeader').removeClass('hideHeaderShadow');

            } else {

                $("#logoHeader").fadeIn('fast');
                $("#logoMenuHeader").fadeOut('fast');
                $("#pxHeader").addClass('hideHeaderShadow');

            }

        } else {
            $("#pxHeader").fadeIn(300);
        };

    }

    /*-----------------------------------------------------------------------------------*/
    /* FullScreen Slider
    /*-----------------------------------------------------------------------------------*/

    function fullScreenSlider() {

        "use strict";

        if (pixflowJsSlider.SliderMode === '0') {
            var $animation = 'fade'; //set Fade mode For Full Screen Slider
        } else if (pixflowJsSlider.SliderMode === '1') {
            var $animation = 'slide'; //set Slide mode For Full Screen Slider
        }

        // Full Screen Slider
        $('#slides').flexslider({
            animation: $animation,
            selector: ".slides-container .header-slide",
            controlsContainer: '.home-slides-navigation',
            controlNav: false,
            directionNav: true,
            smoothHeight: true,
            prevText: "",
            nextText: "",
        });

    }

    /*-----------------------------------------------------------------------------------*/
    /*	home Text Slider
    /*-----------------------------------------------------------------------------------*/

    var quotes = $(".textSliderHome .textSlide");
    var quoteIndex = -1;

    function showNextQuote() {

        // "use strict";

        if (quotes.length !== 1) {
            ++quoteIndex;
            var $quoteItem = quotes.eq(quoteIndex % quotes.length);

            // text rotator display block
            $quoteItem.css({
                opacity: 0,
                display: 'block',
            });

            //calculate text rotator height 
            var $textSliderHomeHeight = parseInt($(".textSliderHome").height());

            $textSliderHomeHeight = (-($textSliderHomeHeight / 2));
            $textSliderHomeHeightPx = $textSliderHomeHeight + "px";

            var $textSliderPosition1 = $textSliderHomeHeight + 60 + "px"; // position 1 : element start visible from this position

            // show text Rotator
            $quoteItem.css({
                marginTop: $textSliderPosition1
            }).stop().animate({
                opacity: '1',
                marginTop: $textSliderHomeHeightPx,
            }, 900, 'easeOutQuart');

            // }, 500, 'easeInOutQuart');

            // hide text Rotator  
            setTimeout((function () {
                $quoteItem.fadeOut(1000, function () {
                    showNextQuote();
                    $(this).css({
                        marginTop: '0',// rest text rotator top margin 
                    })
                });
            }), 3100); // text rotator delay

        } else {

            //calculate text rotator height 
            var $textSliderHomeHeight = parseInt($(".textSliderHome").height());

            $textSliderHomeHeight = (-($textSliderHomeHeight / 2));
            $textSliderHomeHeightPx = $textSliderHomeHeight + "px";

            quotes.eq(0).css({
                marginTop: $textSliderHomeHeightPx
            });

            quotes.eq(0).fadeIn(800);

        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*	blog toggle & blog toggle load more 
    /*-----------------------------------------------------------------------------------*/

    // blog toggle click 
    function blogToggleClick(postVar) {

        "use strict";

        var $toggleMode = parseInt(postVar.$accordion.attr("data-value"));

        if ($toggleMode === 0) {

            // toggle Close Mode To Open Mode 
            postVar.$accordion.css({
                height: "520px",
            });

            postVar.$accordion_box10.add(postVar.$accordionBox).animate(
				{ height: postVar.$imgHeight },
				{
				    queue: false,
				    duration: 500,
				    complete: function () {
				        postVar.$content.fadeIn();
				        parallaxImg();
				    }
				}
			),

            postVar.$frameTitle.css({
                opacity: 0.3,
                'background-color': '#fff',
                height: '160px'
            }),

            //post title And Date animation css
            postVar.$day.css({
                opacity: 0.15,
            }),

            postVar.$monthTitle.css({
                'border-left-color': 'transparent',
            });


            if ($(window).width() < 768) {

                postVar.$monthTitle.find('.monthYear').css({
                    left: '-55px',
                });

                postVar.$monthTitle.find('.blogTitle').css({
                    left: '-55px',
                });

            } else {

                postVar.$monthTitle.find('.monthYear').css({
                    left: '-165px',
                });

                postVar.$monthTitle.find('.blogTitle').css({
                    left: '-165px',
                });

            }


            postVar.$titleImage.toggleClass('accordion_closed'),
			postVar.$accordion.toggleClass('accordionClosed'),

			postVar.$minus.css("display", 'block'),
			postVar.$plus.css("display", 'none');

            // change data Value 
            postVar.$accordion.attr("data-value", "1");

        } else if ($toggleMode === 1 || isNaN($toggleMode)) {

            // toggle Open Mode To Close Mode   
            postVar.$accordion.add(postVar.$accordionBox).animate(
				{ height: "160px" },
				{
				    queue: false,
				    duration: 500,
				    complete: function () {
				        parallaxImg();
				    }
				}
			),

			postVar.$content.fadeOut('fast');
            postVar.$frameTitle.css({
                opacity: 1,
                'background-color': 'transparent',
                height: '100%'
            })

            //post title And Date animation css
            postVar.$day.css({
                opacity: 1,
            }),

            postVar.$monthTitle.css({
                'border-left-color': '#fff',
            }),

            postVar.$monthTitle.find('.monthYear').css({
                left: '0px',
            }),

            postVar.$monthTitle.find('.blogTitle').css({
                left: '0px',
            });


            if ($(window).width() < 768) {

                postVar.$monthTitle.find('.monthYear').css({
                    left: '-55px',
                });

                postVar.$monthTitle.find('.blogTitle').css({
                    left: '-55px',
                });

            } else {

                postVar.$monthTitle.find('.monthYear').css({
                    left: '-165px',
                });

                postVar.$monthTitle.find('.blogTitle').css({
                    left: '-165px',
                });
            }


            postVar.$titleImage.toggleClass('accordion_closed');
            postVar.$accordion.toggleClass('accordionClosed'),

			postVar.$minus.css("display", 'none');
            postVar.$plus.css("display", 'block'),

            // change data Value 	
			postVar.$accordion.attr("data-value", "0");
        }

    };

    // blog toggle default set 
    function blogToggleSet(postVar) {

        "use strict";

        if (postVar.$flag === 0) {
            // Set Close Mode 
            postVar.$content.slideUp(function () {
                parallaxImg();
            });
            postVar.$accordion_box10.add(postVar.$accordionBox).animate(
				{ height: "160px" },
				{
				    queue: false,
				    duration: 500
				}
			),

            postVar.$titleImage.toggleClass('accordion_closed');

            postVar.$minus.css("display", 'none');
            postVar.$plus.css("display", 'block');

        } else if (postVar.$flag === 1 || isNaN(postVar.$flag)) {

            postVar.$accordion.css({
                height: "520px",
            });

            if (postVar.$noImage.length !== 0) {
                postVar.$imgHeight = "160px";
            } else if (postVar.$noImage.length !== 0) {
                postVar.$imgHeight = "520px";
            }

            postVar.$accordion_box10.add(postVar.$accordionBox).animate(
				{ height: postVar.$imgHeight },
				{
				    queue: false,
				    duration: 500
				})

            postVar.$frameTitle.css({
                opacity: 0.3,
                'background-color': '#fff',
                height: '160px'
            })

            postVar.$minus.css("display", 'block'),
            postVar.$plus.css("display", 'none');

        }

    };

    function blogToggleArray($thisAccordion) {

        "use strict";

        var $accordion = $thisAccordion,
		$titleImage = $accordion.find('.image'),
		$imgH = $titleImage.find('img'),
		$noImage = $titleImage.find('.noImage'),
		$content = $accordion.find('.accordion_content'),
		$accordion_box2 = $accordion.find('.accordion_box2'),
		$accordion_box10 = $accordion.find('.accordion_box10'),
		$flag = parseInt($accordion.attr("data-value")),
		$blogClose = $accordion.find('.blogClose'),
		$minus = $accordion.find('.minus'),
		$plus = $accordion.find('.plus'),
		$accordionBox = $accordion.find('.accordionBox'),
		$frameTitle = $accordion.find('.frameTitle'),
        $day = $accordion.find('.accordion_title'),
        $monthTitle = $accordion.find('.leftBorder');


        var postVar = {
            $accordion: $accordion,
            $titleImage: $titleImage,
            $imgH: $imgH,
            $noImage: $noImage,
            $content: $content,
            $accordion_box2: $accordion_box2,
            $accordion_box10: $accordion_box10,
            $flag: $flag,
            $minus: $minus,
            $plus: $plus,
            $accordionBox: $accordionBox,
            $frameTitle: $frameTitle,
            $day: $day,
            $monthTitle: $monthTitle,
        };

        return postVar;
    }

    // blog toggle
    function blogToggle() {

        "use strict";

        $('.blogAccordion').each(function () {

            var $accordion = $(this),
				$titleImage = $accordion.find('.image'),
				$imgH = $titleImage.find('img'),
				$noImage = $titleImage.find('.noImage'),
				$content = $accordion.find('.accordion_content'),
				$accordion_box2 = $accordion.find('.accordion_box2'),
				$accordion_box10 = $accordion.find('.accordion_box10'),
				$flag = parseInt($accordion.attr("data-value")),
				$blogClose = $accordion.find('.blogClose'),
				$minus = $accordion.find('.minus'),
				$plus = $accordion.find('.plus'),
				$accordionBox = $accordion.find('.accordionBox'),
                $frameTitle = $accordion.find('.frameTitle'),
                $day = $accordion.find('.accordion_title'),
                $monthTitle = $accordion.find('.leftBorder');

            var postVar = {
                $accordion: $accordion,
                $titleImage: $titleImage,
                $imgH: $imgH,
                $noImage: $noImage,
                $content: $content,
                $accordion_box2: $accordion_box2,
                $accordion_box10: $accordion_box10,
                $flag: $flag,
                $minus: $minus,
                $plus: $plus,
                $accordionBox: $accordionBox,
                $frameTitle: $frameTitle,
                $day: $day,
                $monthTitle: $monthTitle,
            };

            // set toggle mode When Page Loaded
            blogToggleSet(postVar);

            $minus.add($plus).add($blogClose).click(function () {
                // toggle Post When Click Event Occur 
                blogToggleClick(postVar);
            });

        });

    }

    /* blog toggle loadmore */
    function blogToggleLoadmore() {

        "use strict";

        $(".posts-page-" + num).find('.blogAccordion').each(function () {
            var $accordion = $(this),
                $title = $accordion.find('.accordion_title'),
                $titleImage = $accordion.find('.image'),
                $imgH = $titleImage.find('img'),
                $noImage = $titleImage.find('.noImage'),
                $content = $accordion.find('.accordion_content'),
                $accordion_box2 = $accordion.find('.accordion_box2'),
                $accordion_box10 = $accordion.find('.accordion_box10'),
                $flag = parseInt($accordion.attr("data-value")),
                $blogClose = $accordion.find('.blogClose'),
                $minus = $accordion.find('.minus'),
                $plus = $accordion.find('.plus'),
                $accordionBox = $accordion.find('.accordionBox'),
                $frameTitle = $accordion.find('.frameTitle'),
                $day = $accordion.find('.accordion_title'),
                $monthTitle = $accordion.find('.leftBorder');

            var postLoadVar = {
                $accordion: $accordion,
                $titleImage: $titleImage,
                $imgH: $imgH,
                $noImage: $noImage,
                $content: $content,
                $accordion_box2: $accordion_box2,
                $accordion_box10: $accordion_box10,
                $flag: $flag,
                $minus: $minus,
                $plus: $plus,
                $accordionBox: $accordionBox,
                $frameTitle: $frameTitle,
                $day: $day,
                $monthTitle: $monthTitle,
            };

            // set toggle mode When Page Loaded
            blogToggleSet(postLoadVar);

            $minus.add($plus).add($blogClose).click(function () {
                // toggle Post When Click Event Occur 
                blogToggleClick(postLoadVar);
            });

        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Blog Load More Function 
    /*-----------------------------------------------------------------------------------*/

    function blogLoadMore() {

        "use strict";

        var $loadBTN = $('.pageNavigation'),
            $blog = $('#blogLoop');

        if (typeof paged_data == 'undefined' || $loadBTN.length < 1)
            return;

        var startPage = parseInt(paged_data.startPage),
            nextPage = startPage + 1,
            max = parseInt(paged_data.maxPages),
            isLoading = false;

        if (max < 2) return;

        //Replace links with load more button
        $loadBTN.html('<div class="container clearfix"><div class="readmore"><span class="text"><span class="blogtext">' + paged_data.loadMoreText + '</span></span></div>');

        var $btn = $loadBTN.find('.readmore'),
            $btnText = $btn.find('.blogtext');

        if (nextPage > max)
            $btnText.text(paged_data.noMorePostsText);

        $btn.click(function () {
            if (nextPage > max || isLoading)
                return;

            isLoading = true;

            //Set loading text
            $btnText.text(paged_data.loadingText);

            var $pageContainer = $('<div class="posts-page-' + nextPage + '"></div>');

            paged_data.nextLink = paged_data.nextLink.replace(/\/page\/[0-9]+/, '/?postpage=' + nextPage);
            paged_data.nextLink = paged_data.nextLink.replace(/paged=[0-9]+/, 'postpage=' + nextPage);

            $pageContainer.load(paged_data.nextLink + ' .post', function () {

                //Insert the posts container before the load more button
                $pageContainer.waitForImages(function () {

                    $pageContainer.hide().appendTo($blog).fadeIn('slow', function () {

                        parallaxImg();

                    });

                    // Update page number and nextLink.
                    nextPage++;

                    if (/\/page\/[0-9]+/.test(paged_data.nextLink))
                        paged_data.nextLink = paged_data.nextLink.replace(/\/page\/[0-9]+/, '/page/' + nextPage);
                    else
                        paged_data.nextLink = paged_data.nextLink.replace(/postpage=[0-9]+/, 'postpage=' + nextPage);

                    if (nextPage <= max) {
                        $btnText.text(paged_data.loadMoreText);
                    } else if (nextPage > max) {
                        $btnText.text(paged_data.noMorePostsText);
                    }

                    isLoading = false;

                    num = nextPage;
                    num--;

                    blogToggleLoadmore();
                    flexslider();
                    fitVideo();

                });


            });

        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	Home Height 
    /*-----------------------------------------------------------------------------------*/

    function homeHeight(callback) {

        "use strict";

        //Wordpress Admin Bar Height
        function checkWpBar() {
            var $HSlMHeight = $windowHeight;
            if (!isNaN($wpAdminBarHeight)) {
                $HSlMHeight = $HSlMHeight - $wpAdminBarHeight;
            }
            return $HSlMHeight;
        }

        var $HSlMVal = checkWpBar();

        var i = setInterval(function () {
            // Image Fullscreen 
            if ($('.fullScreenImage').length !== 0) {
                clearInterval(i);
                $("#fullScreenImage").css({ height: $HSlMVal + 'px' });
            }

            // FullScreen Slider
            if ($('#slides').length !== 0) {
                clearInterval(i);
                $("#slides.flexslider").css({ height: $HSlMVal + 'px' });
            }

            if ($(window).width() > 1024) {
                // Layer Slider & master Slider 
                if ($('#homeHeight').height() > 0) {
                    clearInterval(i);

                    var $LHeight = $('#homeHeight').height();
                    $LHeight = $LHeight - 6;

                    if (!isNaN($wpAdminBarHeight)) {
                        $LHeight = $LHeight - $wpAdminBarHeight;
                    }

                    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // If Internet Explorer, Margin-top 0
                        $("#main").css({ marginTop: 0 + 'px' });


                    } else {
                        $("#main").css({ marginTop: $LHeight + 'px' });
                    }

                    $LHeight = 0;
                    // FullScreen Slider -- FullScreen Video  -- FullScreen GoolgeMap 
                } else if ($('#fullScreenSlider').length !== 0 || $('#fullScreenImage').length !== 0 || $('#homeGoogleMap').length !== 0 || $('#homeVideoHeight').length !== 0) {
                    clearInterval(i);

                    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // If Internet Explorer, Margin-top 0
                        $("#main").css({ marginTop: 0 + 'px' });
                        $("#home").css({ height: $HSlMVal + 'px' });
                    } else {
                        $("#main").css({ marginTop: $HSlMVal + 'px' });
                    }


                    if ($('#fullScreenImage').length !== 0) {

                        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // If Internet Explorer, Margin-top 0
                          
                            $('#home .homeWrap .fullScreenImage').css({ position:'static'})
                        }
                    }
                  
                    //parallaxImg();
                    $HSlMVal = 0;
                }

            } else {
                $('#main').css({ marginTop: 0 });
                // FullScreen GoolgeMap 
                if ($('#homeGoogleMap').length !== 0) {
                    clearInterval(i);
                    $("#home").css({ height: $HSlMVal + 'px' });
                    $("#homeGoogleMap").css({ height: $HSlMVal + 'px' });
                    $HSlMVal = 0;
                    // FullScreen Video 
                } else if ($('#homeVideoHeight').length !== 0) {
                    clearInterval(i);
                    $("#home").css({ height: $HSlMVal + 'px' });
                    $("#homeVideoHeight").css({ height: $HSlMVal + 'px' });
                    $HSlMVal = 0;

                }
            }

        }, 100);

        return true;

    }

    /*------------------------------------------------------------------------------*/
    /*  phone Navigation 
    /*------------------------------------------------------------------------------*/

    function phoneNav() {

        "use strict";

        var $phoneNavBtn = $('a#phoneNav');
        $(document).click(
			function (e) {
			    var $phoneNavIcon = $('#phoneNavIcon');
			    if (e.target != $phoneNavIcon.get(0) && $phoneNavBtn.hasClass('active'))
			        $phoneNavBtn.click();
			}
		)

        $phoneNavBtn.click(function (e) {
            var $this = $(this),
				$menu = $('nav#phoneNavItems');

            if ($this.hasClass('active')) {
                $menu.slideUp('fast');
                $this.removeClass('active');
            }
            else {
                $menu.slideDown('fast');
                $this.addClass('active');
            }

            e.preventDefault();
        });
        
    
        phoneNavContainerHeight();

    }

    function phoneNavContainerHeight() {

        // This Code Use When Menu Item Height Heigher than Device Height
         var nav_new_width = $(window).width(),
        nav_new_height = $(window).outerHeight();

        $("#phoneNavItems").height(nav_new_height);
        $(".phone_menu_container").height(nav_new_height);

    }

    /*-----------------------------------------------------------------------------------*/
    /*	parallax  
    /*-----------------------------------------------------------------------------------*/

    function parallaxImg() {

        "use strict";

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // If Internet Explorer, Disale Parallax

            var $parallaxContainers = $('.parallax');
            $parallaxContainers.each(function () {
                var $parallax = $(this);
                $parallax.addClass('noparallaxie');
            });

        } else { // If another browser , run Parallax 

            if ($windowWidth > 1024 && !isTouchDevice) {
                var $parallaxContainers = $('.parallax');
                $parallaxContainers.each(function () {
                    var $parallax = $(this);
                    var $pSpeed = parseInt($(this).attr('data-speed')) / 100;
                    //Run parallax script
                    $parallax.parallax("50%", $pSpeed);
                });
            }
        }
    }

    function parallaxHomeImg() {

        "use strict";

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // If Internet Explorer, Disale Parallax

            $('.homeParallax').addClass('noparallaxie');

        } else { // If another browser , run Parallax 

            if ($windowWidth > 1024 && !isTouchDevice) {

                // Home Parallax When we have One Slide
                $('.homeParallax').parallax("50%", ".25");
            }
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /* 	Flex Slider 
    /*-----------------------------------------------------------------------------------*/

    function flexslider() {

        "use strict";

        //Don't load flex slider for less than two slides and check if portfolio slide not exist return
        if ($('.flexslider').find('.slides > li').add('.portfolioFlexslider').length < 2)
            return;

        // blog detail slider
        $('.flexslider').not('.portfolioSlider').flexslider({
            animation: "fade",
            smoothHeight: true
        });

    }

    function pixflowImageSliderFlexslider() {

        "use strict";

        //generate random value for slide show Speed
        var $slideshowSpeed = 5500 + Math.floor(Math.random() * 4000);

        // pixflow Image Slider
        $('.flexslider.wpb_gallery_slides').each(function () {

            //Don't load flex slider for less than two slides and check if portfolio slide not exist return
            if ($(this).find('.slides > li').length < 2) {

                $(this).find('.slides > li').css('display', 'block');
                return;

            }

            //generate random value for slide show Speed
            var $slideshowSpeed = 5500 + Math.floor(Math.random() * 4000);
            var $animationMode = $(this).attr('data-animation');

            $(this).flexslider({
                animation: $animationMode,
                selector: ".slides .image_slide",
                smoothHeight: true,
                slideshow: true,
                animationSpeed: 950,
                touch: false,
                easing: "easeOutQuint",
                slideshowSpeed: $slideshowSpeed,
                after: function (slider) {
                    if (!slider.playing) {
                        slider.play();// this snipper Code Couse Pixflow image slider Slides After next/Prev Btn click
                    }
                }
            });
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /* 	portfolio feature Images flex Slider 
    /*-----------------------------------------------------------------------------------*/

    function pfflexslider() {
        "use strict";

        //portfolio feature images slider
        $('.portfolioFlexslider').each(function () {

            //Don't load flex slider for less than two slides usefull For Not Flex Slider In Ipad!
            if ($(this).find('.pSlide').length < 2) {
                return;
            }

            //generate random value for slide show Speed
            var $slideshowSpeed = 5500 + Math.floor(Math.random() * 4000);

            $(this).flexslider({
                animation: "fade",
                selector: ".pSlide",
                controlNav: false,
                directionNav: false,
                keyboard: false,
                slideshowSpeed: $slideshowSpeed,
                animationSpeed: 2000
            });
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  portfolio Detail flexSlider
    /*-----------------------------------------------------------------------------------*/

    function pDFlexslider() {

        "use strict";

        if ($('.pDFlexslider').length < 1)
            return;

        //portfolio detail Flex slider
        $('.pDFlexslider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: true,
            keyboard: false,
            smoothHeight: true,
            controlsContainer: ".slider-nav-controls-container",
            prevText: "",
            nextText: "",

            start: function (slider) {

                if (slider.count == 1) {
                    $('.slider-nav-controls-container').css('display', 'none');

                } else {

                    $('.slider-nav-controls-container').css('display', 'block');
                    var navControlsContainer = $(this.controlsContainer);
                    navControlsContainer.append('<div class="slider-status"><span class="current-slide-number"></span>/<span class="total-slides-count"></span></div>');
                    $(this.controlsContainer + ' .current-slide-number').html(slider.currentSlide + 1);
                    $(this.controlsContainer + ' .total-slides-count').html(slider.count);

                }

            },

            before: function (slider) {

                if (slider.count > 1) {

                    var MySlideNumber;
                    if (slider.direction == "next") {
                        MySlideNumber = slider.currentSlide + 2;
                    }
                    else {
                        MySlideNumber = slider.currentSlide;
                        if (MySlideNumber == 0) {
                            MySlideNumber = slider.count;
                        }
                    }
                    if (MySlideNumber > slider.count) {
                        MySlideNumber = 1;
                    }
                    $(this.controlsContainer + ' .current-slide-number').html(MySlideNumber);

                }
            }

        });

    }

    /*-----------------------------------------------------------------------------------*/
    /*  testimonial flexSlider
    /*-----------------------------------------------------------------------------------*/

    function testimonial() {

        "use strict";

        var $testimonialfade = $('.testimonialsFade'); //Slide testimonial

        var $testimonialslide = $('.testimonialsSlide');//Fade testimonial

        if (!$testimonialfade.length && !$testimonialslide.length) return;

        $testimonialslide.flexslider({
            animation: "slide",
            direction: "horizontal",
            selector: ".item-list > .testimonial",
            slideshow: false,
            slideshowSpeed: 3500,
            animationDuration: 500,
            directionNav: false,
            controlNav: true
        });


        if ($(window).width() > 1024) {
            var $smoothHeight = false;
        } else {
            var $smoothHeight = true;
        }

        $testimonialfade.flexslider({
            animation: "fade",
            direction: "horizontal",
            selector: ".item-list > .testimonial",
            slideshow: false,
            slideshowSpeed: 3500,
            animationDuration: 500,
            directionNav: true,
            controlNav: false,
            smoothHeight: $smoothHeight
        });


        $('.quote blockquote').mCustomScrollbar({
            theme: "dark-thick",
            autoHideScrollbar: true
        });

    }

    /*-----------------------------------------------------------------------------------*/
    /* 	Comment Respond
    /*-----------------------------------------------------------------------------------*/

    function commentRespond() {

        "use strict";

        var $respond = $('#respond'), $respondWrap = $('#respond-wrap'),
			$cancelCommentReply = $respond.find('#cancel-comment-reply-link'),
			$commentParent = $respond.find('input[name="comment_parent"]');

        $('.comment-reply-link').each(function () {
            var $this = $(this),
                $parent = $this.parents().eq(2);

            $this.click(function () {
                var commId = $this.parents('.comment').attr('data-id');

                $commentParent.val(commId);
                $respond.insertAfter($parent);
                $cancelCommentReply.show();

                return false;
            });
        });

        $cancelCommentReply.click(function (e) {
            e.preventDefault();

            $cancelCommentReply.hide();

            $respond.appendTo($respondWrap);
            $commentParent.val(0);
        });
    }//End commentRespond

    /*-----------------------------------------------------------------------------------*/
    /*	Forms 
    /*-----------------------------------------------------------------------------------*/

    function Forms() {

        "use strict";

        var $respond = $('#respond'), $respondWrap = $('#respond-wrap'), $cancelCommentReply = $respond.find('#cancel-comment-reply-link'),
            $commentParent = $respond.find('input[name="comment_parent"]');

        $('.comment-reply-link').each(function () {
            var $this = $(this),
                $parent = $this.parent().parent();

            $this.click(function () {
                var commId = $this.parents('.comment').find('.comment_id').html();

                $commentParent.val(commId);
                $respond.insertAfter($parent);
                $cancelCommentReply.show();

                return false;
            });
        });

        $cancelCommentReply.click(function (e) {
            $cancelCommentReply.hide();

            $respond.appendTo($respondWrap);
            $commentParent.val(0);

            e.preventDefault();
        });

        ContactForm('#respond');

    }//End Forms()

    /*-----------------------------------------------------------------------------------*/
    /*	Scrolling function 
    /*-----------------------------------------------------------------------------------*/

    function scroll_to(location, introCheck) {

        "use strict";

        if (location !== "#") {

            if (introCheck !== 3) {
                var offsetTop = $(location).offset().top;
                var done = $(location).closest('.layout').offset().top;
                var offsetTop = offsetTop - done;
                if ($('#main .homeWrap').length !== 0 && $(window).width() > 1024) {

                    if ($("#homeHeight.layerSlider").length) {

                        var $layersliderHeight = $("#homeHeight").height();

                        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // if ie - in ie Home Is not Parallax 
                            
                            scrollto = offsetTop - 82; // 83 is Menu Height

                        } else {

                            scrollto = ($layersliderHeight + offsetTop) - 82; // 83 is Menu Height

                        }

                   } else if ($("#particle").length) {

                       scrollto = (offsetTop) - 81; // 83 is Menu Height

                   } else {

                       if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // if ie - in ie Home Is not Parallax 
                           scrollto =  offsetTop - 82; // 82 is Menu Height ;
                       } else { // not ie 
                           scrollto = ($windowHeight + offsetTop) - 82; // 83 is Menu Height ;
                       }
                        
                    }

                } else {
                    scrollto = (offsetTop - 56);
                }
            }


            if (introCheck === 1) {
                //scroll to inside id 
                scrollpals.animate(
                    {
                        scrollTop: scrollto
                    }, {
                        duration: parseInt(pixflowJsSpeed.scrolling_speed),
                        easing: pixflowJsSpeed.scrolling_easing,
                        queue: false
                    }
                );

            } else if (introCheck === 2 || introCheck === 3) {
                //scroll to top of page	
                scrollpals.animate(
                    {
                        scrollTop: 0
                    }, {
                        duration: 2500,
                        easing: pixflowJsSpeed.scrolling_easing,
                        queue: false
                    }
                );
            }
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*	fitvid 
    /*-----------------------------------------------------------------------------------*/

    function fitVideo() {
        $(".container").fitVids();
    }

    /*-----------------------------------------------------------------------------------*/
    /*	portfolio Isotope function
    /*-----------------------------------------------------------------------------------*/

    function portfolioIsotope($pIsotopeContainer) {

        "use strict";

        if ($pIsotopeContainer === 0) {
            // first load 
            $pIsotopeContainer = $('.isotope');

        } else if ($pIsotopeContainer === 1) { // id 1 for Resizing

            // resizing
            var $firstTimeLoad = false;
            $pIsotopeContainer = $('.isotope');

        } else {

            // when click load more button 
            $pIsotopeContainer = $($pIsotopeContainer);
        }

        $pIsotopeContainer.each(function () {

            var $this = $(this),
			$uniqueId = parseInt($(this).closest('.portfolioSection').attr('data-id')),
			$portfolioId = '#portfolio_'.concat($uniqueId),
			isotopeItem = $('.isotope-item');

            // Remove margins
            isotopeItem.css({
                'margin-left': 0,
                'margin-right': 0
            });

            // Sets column number depending on window width  
            function setColNum() {
                var w = $(window).width(),
					columnNum = 1;

                if (w > 1200) {
                    columnNum = 6;
                } else if (w > 999) {
                    columnNum = 4;
                } else {
                    columnNum = 2;
                }

                return columnNum;
            }

            // Gets column number and divides to get column width 
            function getColWidth() {

                var $device_width = $(window).width();

                if ($("body").hasClass('vertical_menu_enabled')) {
                    $device_width = $device_width - 255;
                }


                // body width based on horizonal scroolbar Enable or Disable .
                if ($("body").height() > $(window).height()) {
                    var w = $device_width;
                } else {
                    if ($window.width() > 1024) {
                        var w = $device_width - 17;
                    } else {
                        var w = $device_width;
                    }
                }

                var columnNum = setColNum(),
					colWidth = Math.floor(w / columnNum);

                return colWidth;
            }

            // Run isotope plugin
            function callIsotope() {
                var colWidth = getColWidth();
                $this.isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'perfectMasonry',
                    liquid: true,
                    perfectMasonry: {
                        layout: 'vertical',
                        columnWidth: colWidth,
                        rowHeight: colWidth * .769,
                    },

                });
            }

            // Sets dynamic size of isotope brick 
            function setBrickSize($isotopeItem) {
                var colWidth = getColWidth();
                var w = $(window).width();

                // Set width of each brick
                $this.find('.isotope-item').each(function () {
                    var $brick = $(this),
						$brickphoto = $brick.find('.postphoto');

                    if ($brick.hasClass('big')) {
                        $brickphoto.css({
                            'width': (colWidth * 2) + 'px',
                            'height': ((colWidth * 2) * .769) + 'px'
                        });

                    } else if ($brick.hasClass('slim')) {

                        if (w > 600) {

                            $brickphoto.css({
                                'width': colWidth + 'px',
                                'height': ((colWidth * 2) * .769) + 'px'
                            });

                        } else {

                            $brickphoto.css({
                                'width': (colWidth * 2) + 'px',
                                'height': ((colWidth * 3) * .769) + 'px'
                            });

                        }

                    } else if ($brick.hasClass('hslim')) {

                        $brickphoto.css({
                            'width': (colWidth * 2) + 'px',
                            'height': (colWidth * .769) + 'px'
                        });

                    } else {

                        if (w > 600) {

                            $brickphoto.css({
                                'width': colWidth + 'px',
                                'height': (colWidth * .769) + 'px'
                            });

                        } else {

                            $brickphoto.css({
                                'width': (colWidth * 2) + 'px',
                                'height': ((colWidth * 2) * .769) + 'px'
                            });

                        }

                    }
                });
            }

            // Call isotope functions in correct order
            function runIsotope() {

                setBrickSize($this.find('.isotope-item'));
                callIsotope();

            }

            // Run Isotope on load
            runIsotope();


            //portfolio Filter
            if ($window.width() > 979) { // if Desktop
                var $pFilter = $portfolioId.concat(' #filters a');
            } else {
                var $pFilter = $portfolioId.concat(' #filterstablet a');
            }

            var $pThis = $portfolioId.concat(' .isotope');
            $($pFilter).click(function () {
                
                if ($window.width() > 979) { // if Desktop
                    var $pFilter = $portfolioId.concat(' #filters a');
                } else {
                    var $pFilter = $portfolioId.concat(' #filterstablet a');
                }

                var $pFilterText = $portfolioId.concat(' .portfolio-filter span.text');
                $($pFilter).removeClass("active");
                $($pFilter).find('.filterlinebottom').hide();
                $($pFilter).find('.filterlinetop').hide();

                var $selector = $(this).attr('data-filter');

                $($pFilter).each(function () {
                    var $filterselect = $(this).attr('data-filter');
                    if ($filterselect == $selector) {
                        $(this).addClass("active");
                        $(this).find('.filterlinebottom').fadeIn('fast');
                        $(this).find('.filterlinetop').fadeIn('fast');
                    }
                });

                $this.isotope({ filter: $selector });
                $($pFilterText).html($(this).html());
                parallaxImg();
                return false;

            });

        });

    }

    /*-----------------------------------------------------------------------------------*/
    /*	initialize portfolio functions
    /*-----------------------------------------------------------------------------------*/

    function portfolioDHashChange() {

        $(window).bind('hashchange', function () {

            pDInitialize();
            pageRefresh = false;

        });
    };

    function pDInitialize() {

        hash = $(window.location).attr('hash');
        var href = location.href.replace(location.hash, "");
        root = '#!' + folderName + '/';
        var rootLength = root.length;


        if (hash.substr(0, rootLength) != root) {

            return;

        } else {

            hash = $(window.location).attr('hash');
            var url = hash.replace(/[#\!]/g, '');

            portfolioGrid.find('.ajaxPDetail .isotope-item.current').removeClass('current');

            // if Url has Portfolio Detail Address
            if (pageRefresh == true && hash.substr(0, rootLength) == root) {

                $('html,body').stop().animate(
                    { scrollTop: (projectContainer.offset().top - 160) + 'px' },
                    800,
                    'easeOutExpo',
                    function () {
                        loadPortfolioDetail(url, href);
                        pDetailNav.fadeOut('100');
                    }
                );

                // open Portfolio Detail When Click On Portfolio Items or trough portfolio navigation
            } else if (pageRefresh == false && hash.substr(0, rootLength) == root) {

                $('html,body').stop().animate(
                    { scrollTop: (projectContainer.offset().top - 90) + 'px' },
                    800,
                    'easeOutExpo',
                    function () {
                        if (content == false) {
                            loadPortfolioDetail(url, href);
                        } else {
                            projectContainer.animate({ opacity: 0, height: wrapperHeight }, function () {
                                loadPortfolioDetail(url, href);
                            });
                        }
                        pDetailNav.fadeOut('100');
                    }
                );

            }


            // ADD ACTIVE CLASS TO CURRENTLY CLICKED PROJECT 
            portfolioGrid.find('.ajaxPDetail .isotope-item a[href$="' + hash + '"]').parents('.isotope-item').addClass('current');

        }

    }

    // load portfolio detail 
    function loadPortfolioDetail(url, href) {
        if ($('#portfolioDetailAjax').height() < 500) {

            projectContainer.animate(
                    { height: '500px' },
                    {
                        queue: false,
                        duration: 250
                    }
		    );
        }

        loader.fadeIn();

        url = url.replace("portfolio-detail/", "");
        url = href + '?portfolio=' + url + ' #ajaxPDetail';


        if (!ajaxLoading) {
            ajaxLoading = true;

            projectContainer.load(url, function (xhr, statusText, request) {

                if (statusText == "success") {

                    ajaxLoading = false;
                    pDError.hide();

                    $('#ajaxPDetail').waitForImages(function () {
                        pDFlexslider();// Call Flex Slider 
                        hideLoader();
                    });

                    fitVideo();

                    //shortcodes
                    pxShortcode();
                    shortcodeAnimation();
                    social_share_pop_up();

                }

                if (statusText == "error") {

                    pDError.show();
                    hideLoader();

                }

            });

        }
    }

    function hideLoader() {
        loader = $('.portfolioSection #loader');
        loader.delay(400).fadeOut('fast', function () {
            showProject();
        });
    }

    function showProject() {

        if (content == false) {

            //load  portfolio detail by click on portfolio items
            wrapperHeight = projectContainer.children('#ajaxPDetail').outerHeight() + 'px';
            projectContainer.animate({ opacity: 1, height: wrapperHeight }, function () {

                var scrollPostition = $('html,body').scrollTop();
                pDetailNav.fadeIn(400);
                content = true;

                parallaxImg();

            });

        } else {
            //load next and prev portfolio detail by Click navigation 
            wrapperHeight = projectContainer.children('#ajaxPDetail').outerHeight() + 'px';
            projectContainer.animate({ opacity: 1, height: wrapperHeight }, function () {

                var scrollPostition = $('html,body').scrollTop();
                pDetailNav.fadeIn(400);

                parallaxImg();

            });
        }


        var portfolioIndex = portfolioGrid.find('.ajaxPDetail .isotope-item.current').index();
        var portfolioLength = $('.ajaxPDetail .isotope-item').length - 1;


        if (portfolioIndex == portfolioLength) {

            $('.pDNavigation .next').css('display', 'none');
            $('.pDNavigation .previous').css('display', 'block');

        } else if (portfolioIndex == 0) {

            $('.pDNavigation .previous').css('display', 'none');
            $('.pDNavigation .next').css('display', 'block');

        } else {

            $('.pDNavigation .next,.pDNavigation .previous').css('display', 'block');

        }

    }

    function deletePortfolioDetail() {

        projectContainer.animate(
			{ height: '0px' },
			{
			    queue: false,
			    duration: 1000,
			    complete: function () {
			        projectContainer.empty();
			        parallaxImg();// reset parallax image positions
			    }
			}
		);

        projectContainer.animate(
			{ opacity: 0 },
			{
			    queue: false,
			    duration: 600
			}
		);

        pDetailNav.fadeOut(600);
        parallaxImg();

        location = '#_'; // remove URL hash 
        portfolioGrid.find('.ajaxPDetail .isotope-item.current').removeClass('current');

    }

    // linking to Next Portfolio Detail 
    function pDNavigationNext() {

        $('.pDNavigation .next a').click(function (e) {

            var current = portfolioGrid.find('.ajaxPDetail .isotope-item.current');
            var next = current.next('.ajaxPDetail .isotope-item');
            var target = $(next).find('a.overlay').attr('href');
            $(this).attr('href', target);

            location = target;

            if (next.length === 0) {
                return false;
            }

            current.removeClass('current');
            next.addClass('current');
            //e.preventDefault();

        });

    }

    // linking to previous Portfolio Detail 
    function pDNavigationPrevious() {

        $('.pDNavigation .previous a').click(function (e) {

            var current = portfolioGrid.find('.ajaxPDetail .isotope-item.current');
            var prev = current.prev('.ajaxPDetail .isotope-item');
            var target = $(prev).find('a.overlay').attr('href');
            $(this).attr('href', target);

            location = target;

            if (prev.length === 0) {
                return false;
            }

            current.removeClass('current');
            prev.addClass('current');

            e.preventDefault();

        });

    }

    // Closing the Portfolio detail 
    function pDCloseProject() {

        $('#pDClose a').click(function (e) {
            deletePortfolioDetail();
            loader.fadeOut();
            e.preventDefault();
        });

    }

    /*-----------------------------------------------------------------------------------*/
    /*	Portfolio Load More Function 
    /*-----------------------------------------------------------------------------------*/

    function portfolioLoadMore() {

        "use strict";

        var $index = 0;
        var $nextPageIndex = []; // array for save for each portfolio index
        var $maxPPgae = [];// array for save maximum pages For each portfolio sextions

        $('.portfolioSection').each(function () {

            $(this).attr('data-index', $index);
            var $portfolioId = $(this).attr('data-value'),
			$uniqueId = $(this).attr('data-id'),
			$pLoadMore = '.pLoadMore_'.concat($uniqueId),
			$pLoadMoreBtnWrap = $(this).find($pLoadMore),

			$portfolioIdOb = null;
            eval('$portfolioIdOb = ' + $portfolioId);

            if (typeof $portfolioIdOb == 'undefined' || $pLoadMoreBtnWrap.length < 1)
                return;

            var startPage = parseInt($portfolioIdOb.startPage);
            $nextPageIndex[$index] = startPage + 1;

            $maxPPgae[$index] = parseInt($portfolioIdOb.maxPages);

            var isLoading = false;

            if (parseInt($maxPPgae[$index].toString()) < 2) {

                $pLoadMoreBtnWrap.html('<div class="container clearfix"><div class="loadMore" data-id=' + $uniqueId + '><span class="text">' + $portfolioIdOb.noMorePostsText + '</span></div>');
                $pLoadMoreBtnWrap.fadeOut();

                return;
            };

            //Replace links with load more button
            $pLoadMoreBtnWrap.html('<div class="container clearfix"><div class="loadMore" data-id=' + $uniqueId + '><span class="text">' + $portfolioIdOb.loadMoreText + '</span></div></div>');

            '  ' + paged_data.loadMoreText + '</span></span>' + paged_data.loadMoreText + '</span></div>'

            var $pLoadMoreBtn = $pLoadMoreBtnWrap.find('.loadMore'),
				$btnText = $pLoadMoreBtn.find('.text');

            if (parseInt($nextPageIndex[$index].toString()) > parseInt($maxPPgae[$index].toString())) {
                $btnText.closest('.pLoadMore').fadeOut();
            }

            var resTimer = 0;

            $pLoadMoreBtn.click(function () {

                var $dataIndex = parseInt($(this).closest('.portfolioSection').attr('data-index'));

                if (parseInt($nextPageIndex[$dataIndex].toString()) > parseInt($maxPPgae[$dataIndex].toString()) || isLoading)
                    return;

                isLoading = true;
                $uniqueId = $(this).attr('data-id');
                var $portfolioLoop = '#pLoop_'.concat($uniqueId);
                var $pagedNum = 'paged_'.concat($uniqueId);
                var $pItemsWrap = $portfolioLoop;

                //Set loading text
                $btnText.text($portfolioIdOb.loadingText);

                var $pageContainer = $('<div class="loadItemsWrap"></div>');

                $portfolioIdOb.nextLink = $portfolioIdOb.nextLink.replace(/\/page\/[0-9]+/, '/?' + $pagedNum + '=' + parseInt($nextPageIndex[$dataIndex].toString()));
                $portfolioIdOb.nextLink = $portfolioIdOb.nextLink.replace(/paged=[0-9]+/, $pagedNum + '=' + parseInt($nextPageIndex[$dataIndex].toString()));
                $portfolioIdOb.nextLink = $portfolioIdOb.nextLink.replace(/paged_[0-9]+=[0-9]+/, $pagedNum + '=' + parseInt($nextPageIndex[$dataIndex].toString()));

                $pageContainer.load($portfolioIdOb.nextLink + ' ' + $portfolioLoop + ' .isotope-item', function () {

                    // remove loadItemsWrap div From Loaded items 
                    $pageContainer = $pageContainer.find('.isotope-item').unwrap();

                    //Insert the posts container before the load more button
                    $pageContainer.appendTo($pItemsWrap);

                    // Update page number and nextLink.
                    $nextPageIndex[$dataIndex]++;

                    if (/\/page\/[0-9]+/.test($portfolioIdOb.nextLink))
                        $portfolioIdOb.nextLink = $portfolioIdOb.nextLink.replace(/\/page\/[0-9]+/, '/page/' + parseInt($nextPageIndex[$dataIndex].toString()));
                    else {

                        var str1 = $pagedNum.concat('=[0-9]+');
                        var re = new RegExp(str1);

                        $portfolioIdOb.nextLink = $portfolioIdOb.nextLink.replace(re, $pagedNum + '=' + parseInt($nextPageIndex[$dataIndex].toString()));

                    }
                    if (parseInt($nextPageIndex[$dataIndex].toString()) <= parseInt($maxPPgae[$dataIndex].toString()))
                        $btnText.text($portfolioIdOb.loadMoreText);
                    else if (parseInt($nextPageIndex[$dataIndex].toString()) > parseInt($maxPPgae[$dataIndex].toString())) {
                        $btnText.closest('.pLoadMore').fadeOut();
                    }

                    isLoading = false;

                    num = parseInt($nextPageIndex[$dataIndex].toString());
                    num--;

                    var $items = $($pItemsWrap).find('.isotope-item');
                    var $container = $($pItemsWrap).closest('.isotope');

                    $container.isotope('appended', $items, function () {
                        $container.isotope('reLayout');
                    });

                    var $pIsotopeContainer = '#portfolio_'.concat($uniqueId).concat(' .isotope');
                    portfolioIsotope($pIsotopeContainer);
                    parallaxImg(); // reset parallax image positions
                    pfflexslider();//feature image flex slider
                    pxShortcode();// call shorcode functions 
                    shortcodeAnimation();
                    social_share_pop_up();


                });
            });

            $index++;

        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	portfolio filter - tablet & mibilesize
    /*-----------------------------------------------------------------------------------*/

    function pfilter() {

        "use strict";

        $('ul.portfolio-filter').superfish({
            delay: 100,               // one second delay on mouseout
            animation: { height: 'show' },  	// fade-in and slide-down animation
            animationOut: { height: 'hide' },
            speed: 'fast',            // faster animation speed
            autoArrows: false              // disable generation of arrow mark-up
        });
    }

    /*----------------------------------------------------------------------------------*/
    /*	call Shortcode functions
    /*-----------------------------------------------------------------------------------*/

    function pxShortcode() {
        testimonial();
        piechart();
        counterBox();
        fullWidthSection();
        tabs();
        accordion();
        progressbar();
    }


    /*----------------------------------------------------------------------------------*/
    /*	Video background
    /*-----------------------------------------------------------------------------------*/

    function initVideoBackground() {

        "use strict";

        $('.video').mediaelementplayer({
            enableKeyboard: false,
            iPadUseNativeControls: false,
            pauseOtherPlayers: false,
            iPhoneUseNativeControls: false,
            AndroidUseNativeControls: false
        });


        //mobile check
        if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
            videoBackgroundSize();
            $('.videoHomePreload').show();
            $('.videoWrap').remove();
        }
    }

    /*----------------------------------------------------------------------------------*/
    /*	Video background size
    /*-----------------------------------------------------------------------------------*/

    function videoBackgroundSize() {

        "use strict";

        $('.videoWrap').each(function (i) {

            var $sectionWidth = $(this).closest('.videoHome ').outerWidth();
            var $vcVideoWrap = $(this).parents('.vc_videowrap');

            if ($vcVideoWrap.length) {

                var $sectionHeight = $vcVideoWrap.find('.vc_videocontent').outerHeight();

                $(this).width($sectionWidth);
                $vcVideoWrap.height($sectionHeight);

            } else {

                var $sectionHeight = $(this).closest('.videoHome').outerHeight();
                $(this).width($sectionWidth);
                $(this).height($sectionHeight);

            }

            // calculate scale ratio
            var scale_h = $sectionWidth / videoWidthOriginal;
            var scale_v = ($sectionHeight) / videoHeightOriginal;
            var scale = scale_h > scale_v ? scale_h : scale_v;

            // limit minimum width
            minW = vidRatio * ($sectionHeight + 20);

            if (scale * videoWidthOriginal < minW) { scale = minW / videoWidthOriginal; }

            $(this).find('video').width(Math.ceil(scale * videoWidthOriginal + 2));
            $(this).find('video').height(Math.ceil(scale * videoHeightOriginal + 2));

            $(this).scrollLeft(($(this).find('video').width() - $sectionWidth) / 2);
            $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - ($sectionHeight)) / 2);
            $(this).scrollTop(($(this).find('video').height() - ($sectionHeight)) / 2);

        });

    }

    /*----------------------------------------------------------------------------------*/
    /*	 top space for blog and portfolio in main page
    /*-----------------------------------------------------------------------------------*/

    function mainTopSpace() {

        "use strict";
        if ($windowWidth > 1024) {

            if (!($('.homeWrap').length) && $('.page-template-main-page-php').length) {

                var variable = $('.scooterSection');
                variable = variable.first();
                if (variable.hasClass('blogSection') || variable.hasClass('portfolioSection') || variable.hasClass('customSection')) {
                    variable.css('padding-top', '83px');
                }
            }
        }

    }

    /*----------------------------------------------------------------------------------*/
    /*	set min-height For Blog and blog Detail 
    /*-----------------------------------------------------------------------------------*/

    function minPageHeightSet() {

        if ($windowWidth > 1024) {

            $pageFooterHeight = $('.footer-bottom').height();

            // Add Google Map Height  too fooret height
            if ($('#googleMap').length) {
                $pageFooterHeight = $pageFooterHeight + $('#googleMap').height();
            }

            // Add Footer Widget section height too Footer height
            if ($('.footer-widgetized').length) {
                $pageFooterHeight = $pageFooterHeight + $('.footer-widgetized').height();
            }


            if ($('#main').length) {

                $pageMainHeight = $('#main').height();
                $wholePageHeight = $pageMainHeight + $pageFooterHeight;
                $pageMainHeight2 = $windowHeight - $pageFooterHeight;


                if ($windowHeight > $wholePageHeight) {
                    $('#main').css({
                        'min-height': $pageMainHeight2 + "px",
                    });
                }


            } else if ($('#blogSingle').length) {

                $pageMainHeight = $('#blogSingle').height();
                $wholePageHeight = $pageMainHeight + $pageFooterHeight;
                $pageMainHeight2 = $windowHeight - $pageFooterHeight;


                if ($windowHeight > $wholePageHeight) {
                    $('#blogSingle').css({
                        'min-height': $pageMainHeight2 + "px"
                    });
                }

            } else if ($('#pageHeight').length) {

                $pageMainHeight = $('#pageHeight').height();
                $wholePageHeight = $pageMainHeight + $pageFooterHeight + 68;
                $pageMainHeight2 = $windowHeight - $pageFooterHeight - 68;

                if ($windowHeight > $wholePageHeight) {
                    $('#pageHeight').css({
                        'min-height': $pageMainHeight2 + "px"
                    });
                }

            }

        }
    }

    /*----------------------------------------------------------------------------------*/
    /*	socail share icon
    /*-----------------------------------------------------------------------------------*/

    function socailshare() {
        // Google Plus like button
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

    }

    /*-----------------------------------------------------------------------------------*/
    /*	social share's pop up 
    /*-----------------------------------------------------------------------------------*/

    function social_share_pop_up() {

        $(".social_links a").click(function (e) {

            $url = $(this).attr('href');;
            $title = $(this).attr('title');;

            newwindow = window.open($url, $title, 'height=300,width=600');
            if (window.focus) { newwindow.focus() }
            return false;

        });
    }

    /*----------------------------------------------------------------------------------*/
    /*	WPML
    /*-----------------------------------------------------------------------------------*/

    function wpml_menu() {

        if ($('.headerWrap .menu-item-language').length) {
            $('.headerWrap .menu-item-language').append($("<span class='spanHover'></span>"));
        }
    }


    $(function () {

        /*!
        * jQuery Transit - CSS3 transitions and transformations
        * (c) 2011-2012 Rico Sta. Cruz <rico@ricostacruz.com>
        * MIT Licensed.
        *
        * http://ricostacruz.com/jquery.transit
        * http://github.com/rstacruz/jquery.transit
        */

        (function (k) { k.transit = { version: "0.9.9", propertyMap: { marginLeft: "margin", marginRight: "margin", marginBottom: "margin", marginTop: "margin", paddingLeft: "padding", paddingRight: "padding", paddingBottom: "padding", paddingTop: "padding" }, enabled: true, useTransitionEnd: false }; var d = document.createElement("div"); var q = {}; function b(v) { if (v in d.style) { return v } var u = ["Moz", "Webkit", "O", "ms"]; var r = v.charAt(0).toUpperCase() + v.substr(1); if (v in d.style) { return v } for (var t = 0; t < u.length; ++t) { var s = u[t] + r; if (s in d.style) { return s } } } function e() { d.style[q.transform] = ""; d.style[q.transform] = "rotateY(90deg)"; return d.style[q.transform] !== "" } var a = navigator.userAgent.toLowerCase().indexOf("chrome") > -1; q.transition = b("transition"); q.transitionDelay = b("transitionDelay"); q.transform = b("transform"); q.transformOrigin = b("transformOrigin"); q.transform3d = e(); var i = { transition: "transitionEnd", MozTransition: "transitionend", OTransition: "oTransitionEnd", WebkitTransition: "webkitTransitionEnd", msTransition: "MSTransitionEnd" }; var f = q.transitionEnd = i[q.transition] || null; for (var p in q) { if (q.hasOwnProperty(p) && typeof k.support[p] === "undefined") { k.support[p] = q[p] } } d = null; k.cssEase = { _default: "ease", "in": "ease-in", out: "ease-out", "in-out": "ease-in-out", snap: "cubic-bezier(0,1,.5,1)", easeOutCubic: "cubic-bezier(.215,.61,.355,1)", easeInOutCubic: "cubic-bezier(.645,.045,.355,1)", easeInCirc: "cubic-bezier(.6,.04,.98,.335)", easeOutCirc: "cubic-bezier(.075,.82,.165,1)", easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)", easeInExpo: "cubic-bezier(.95,.05,.795,.035)", easeOutExpo: "cubic-bezier(.19,1,.22,1)", easeInOutExpo: "cubic-bezier(1,0,0,1)", easeInQuad: "cubic-bezier(.55,.085,.68,.53)", easeOutQuad: "cubic-bezier(.25,.46,.45,.94)", easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)", easeInQuart: "cubic-bezier(.895,.03,.685,.22)", easeOutQuart: "cubic-bezier(.165,.84,.44,1)", easeInOutQuart: "cubic-bezier(.77,0,.175,1)", easeInQuint: "cubic-bezier(.755,.05,.855,.06)", easeOutQuint: "cubic-bezier(.23,1,.32,1)", easeInOutQuint: "cubic-bezier(.86,0,.07,1)", easeInSine: "cubic-bezier(.47,0,.745,.715)", easeOutSine: "cubic-bezier(.39,.575,.565,1)", easeInOutSine: "cubic-bezier(.445,.05,.55,.95)", easeInBack: "cubic-bezier(.6,-.28,.735,.045)", easeOutBack: "cubic-bezier(.175, .885,.32,1.275)", easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)" }; k.cssHooks["transit:transform"] = { get: function (r) { return k(r).data("transform") || new j() }, set: function (s, r) { var t = r; if (!(t instanceof j)) { t = new j(t) } if (q.transform === "WebkitTransform" && !a) { s.style[q.transform] = t.toString(true) } else { s.style[q.transform] = t.toString() } k(s).data("transform", t) } }; k.cssHooks.transform = { set: k.cssHooks["transit:transform"].set }; if (k.fn.jquery < "1.8") { k.cssHooks.transformOrigin = { get: function (r) { return r.style[q.transformOrigin] }, set: function (r, s) { r.style[q.transformOrigin] = s } }; k.cssHooks.transition = { get: function (r) { return r.style[q.transition] }, set: function (r, s) { r.style[q.transition] = s } } } n("scale"); n("translate"); n("rotate"); n("rotateX"); n("rotateY"); n("rotate3d"); n("perspective"); n("skewX"); n("skewY"); n("x", true); n("y", true); function j(r) { if (typeof r === "string") { this.parse(r) } return this } j.prototype = { setFromString: function (t, s) { var r = (typeof s === "string") ? s.split(",") : (s.constructor === Array) ? s : [s]; r.unshift(t); j.prototype.set.apply(this, r) }, set: function (s) { var r = Array.prototype.slice.apply(arguments, [1]); if (this.setter[s]) { this.setter[s].apply(this, r) } else { this[s] = r.join(",") } }, get: function (r) { if (this.getter[r]) { return this.getter[r].apply(this) } else { return this[r] || 0 } }, setter: { rotate: function (r) { this.rotate = o(r, "deg") }, rotateX: function (r) { this.rotateX = o(r, "deg") }, rotateY: function (r) { this.rotateY = o(r, "deg") }, scale: function (r, s) { if (s === undefined) { s = r } this.scale = r + "," + s }, skewX: function (r) { this.skewX = o(r, "deg") }, skewY: function (r) { this.skewY = o(r, "deg") }, perspective: function (r) { this.perspective = o(r, "px") }, x: function (r) { this.set("translate", r, null) }, y: function (r) { this.set("translate", null, r) }, translate: function (r, s) { if (this._translateX === undefined) { this._translateX = 0 } if (this._translateY === undefined) { this._translateY = 0 } if (r !== null && r !== undefined) { this._translateX = o(r, "px") } if (s !== null && s !== undefined) { this._translateY = o(s, "px") } this.translate = this._translateX + "," + this._translateY } }, getter: { x: function () { return this._translateX || 0 }, y: function () { return this._translateY || 0 }, scale: function () { var r = (this.scale || "1,1").split(","); if (r[0]) { r[0] = parseFloat(r[0]) } if (r[1]) { r[1] = parseFloat(r[1]) } return (r[0] === r[1]) ? r[0] : r }, rotate3d: function () { var t = (this.rotate3d || "0,0,0,0deg").split(","); for (var r = 0; r <= 3; ++r) { if (t[r]) { t[r] = parseFloat(t[r]) } } if (t[3]) { t[3] = o(t[3], "deg") } return t } }, parse: function (s) { var r = this; s.replace(/([a-zA-Z0-9]+)\((.*?)\)/g, function (t, v, u) { r.setFromString(v, u) }) }, toString: function (t) { var s = []; for (var r in this) { if (this.hasOwnProperty(r)) { if ((!q.transform3d) && ((r === "rotateX") || (r === "rotateY") || (r === "perspective") || (r === "transformOrigin"))) { continue } if (r[0] !== "_") { if (t && (r === "scale")) { s.push(r + "3d(" + this[r] + ",1)") } else { if (t && (r === "translate")) { s.push(r + "3d(" + this[r] + ",0)") } else { s.push(r + "(" + this[r] + ")") } } } } } return s.join(" ") } }; function m(s, r, t) { if (r === true) { s.queue(t) } else { if (r) { s.queue(r, t) } else { t() } } } function h(s) { var r = []; k.each(s, function (t) { t = k.camelCase(t); t = k.transit.propertyMap[t] || k.cssProps[t] || t; t = c(t); if (k.inArray(t, r) === -1) { r.push(t) } }); return r } function g(s, v, x, r) { var t = h(s); if (k.cssEase[x]) { x = k.cssEase[x] } var w = "" + l(v) + " " + x; if (parseInt(r, 10) > 0) { w += " " + l(r) } var u = []; k.each(t, function (z, y) { u.push(y + " " + w) }); return u.join(", ") } k.fn.transition = k.fn.transit = function (z, s, y, C) { var D = this; var u = 0; var w = true; if (typeof s === "function") { C = s; s = undefined } if (typeof y === "function") { C = y; y = undefined } if (typeof z.easing !== "undefined") { y = z.easing; delete z.easing } if (typeof z.duration !== "undefined") { s = z.duration; delete z.duration } if (typeof z.complete !== "undefined") { C = z.complete; delete z.complete } if (typeof z.queue !== "undefined") { w = z.queue; delete z.queue } if (typeof z.delay !== "undefined") { u = z.delay; delete z.delay } if (typeof s === "undefined") { s = k.fx.speeds._default } if (typeof y === "undefined") { y = k.cssEase._default } s = l(s); var E = g(z, s, y, u); var B = k.transit.enabled && q.transition; var t = B ? (parseInt(s, 10) + parseInt(u, 10)) : 0; if (t === 0) { var A = function (F) { D.css(z); if (C) { C.apply(D) } if (F) { F() } }; m(D, w, A); return D } var x = {}; var r = function (H) { var G = false; var F = function () { if (G) { D.unbind(f, F) } if (t > 0) { D.each(function () { this.style[q.transition] = (x[this] || null) }) } if (typeof C === "function") { C.apply(D) } if (typeof H === "function") { H() } }; if ((t > 0) && (f) && (k.transit.useTransitionEnd)) { G = true; D.bind(f, F) } else { window.setTimeout(F, t) } D.each(function () { if (t > 0) { this.style[q.transition] = E } k(this).css(z) }) }; var v = function (F) { this.offsetWidth; r(F) }; m(D, w, v); return this }; function n(s, r) { if (!r) { k.cssNumber[s] = true } k.transit.propertyMap[s] = q.transform; k.cssHooks[s] = { get: function (v) { var u = k(v).css("transit:transform"); return u.get(s) }, set: function (v, w) { var u = k(v).css("transit:transform"); u.setFromString(s, w); k(v).css({ "transit:transform": u }) } } } function c(r) { return r.replace(/([A-Z])/g, function (s) { return "-" + s.toLowerCase() }) } function o(s, r) { if ((typeof s === "string") && (!s.match(/^[\-0-9\.]+$/))) { return s } else { return "" + s + r } } function l(s) { var r = s; if (k.fx.speeds[r]) { r = k.fx.speeds[r] } return o(r, "ms") } k.transit.getTransitionValue = g })(jQuery);

        // Flex Slider
        if ($('#portfoliSingle').length) {

            $('#portfoliSingle').waitForImages(function () {
                pDFlexslider();// portfolio Detail flex Slider
            });

        } else if ($('#blogSingle').length || $('.cblog').length) {
            flexslider();// blog detail flex Slider
            socailshare(); // socail share
        }

        pfflexslider();//portfolio Feature Image Flex Slider

        //shortcodes
        pxShortcode();

        //portfolio & portfolio details Functions
        var $pIsotopeContainer = 0;
        portfolioIsotope($pIsotopeContainer);
        portfolioDHashChange();//Portfolio Detail Run When Hash Change functions
        portfolioLoadMore();//portfolio Load more Function
        pDNavigationNext();// linking to Next Portfolio Detail 
        pDNavigationPrevious();	// linking to Previous Portfolio Detail 
        pDCloseProject(); // close Portfolio Detail
        pfilter();

        if (hash.substr(0, rootLength) == root) { // if URl Call portfolio Detail Run pDInitialize Function 
            pDInitialize();
        }

        minPageHeightSet();

        //blog Functions 
        blogLoadMore();//Blog Load More Function
        blogToggle();//Blog Toggle

        parallaxHomeImg();
        parallaxImg();//section parallax
        particle();//particle

        initVideoBackground();
        videoBackgroundSize();

        fitVideo();//video Fit To All Screen
        commentRespond();

        // WPML MENU
        wpml_menu();

        nav();
        showNextQuote();//Home text rotator

        // wave menu
        wave_menu();
		
		
		

        image_carousel();
        remove_container_image_slider();
        button_hover();//Button's hover
        moon_hover();
        pixflowImageSliderFlexslider();
        shortcodeAnimation();

        //woocomerce
        initSelect2();
        magnificPopup();// magnificPopup woocomerce producet Detail

        if ($('#fullScreenSlider').length)
            fullScreenSlider();

        homeHeight();

        //top space For Blog And Portfolio In Main Page
        mainTopSpace();

        if ($('#googleMap').length)
            googleMap(); // Footer Google Map
        if ($('#homeGoogleMap').length)
            homegoogleMap(); // Home Google Map

        phoneNav();

        /*----------------------------------------------------------------------------------*/
        /*   wpadminbar And Notification
        /*-----------------------------------------------------------------------------------*/

        if ($("#wpadminbar").size() != 0 && $windowWidth > 1024) {

            if ($("#notification").size() != 0 && $(".page-template-main-page-php").size() != 0) {

                // notification bar Enable With wpadminbar 

                $("#pxHeader").add(".navigation-mobile").add("#homeHeight").addClass('menuSpaceWpNoti');
                $("#notification").addClass('notificationSpaceWp');

            } else {

                // notification bar disable With wpadminbar 
                $("#pxHeader").add("#homeHeight").addClass('menuSpaceWp');
            }
        } else if ($("#notification").size() != 0 && $(".page-template-main-page-php").size() != 0) {

            // notification bar Enable
            $("#pxHeader").add("#homeHeight").addClass('menuSpaceNoti');
        }

        //notification close
        $("#notification a.closebtn ").click(function (e) {

            //$("#notification").hide('slow');
            $("#notification").slideUp('460');

            // wpadminbar And Notification
            if ($("#wpadminbar").size() != 0 && $windowWidth > 1024) {

                // notification bar Enable With wpadminbar 
                $("#pxHeader").add("#homeHeight").removeClass('menuSpaceWpNoti').addClass('menuSpaceWp');

            } else if ($("#notification").size() != 0) {

                // notification bar Enable
                $("#pxHeader").add("#homeHeight").removeClass('menuSpaceNoti');
            }

            e.preventDefault();
        });

        //Run extra scripts here
        if ('' != pixflowAdditionalJs.additionaljs)
            eval(pixflowAdditionalJs.additionaljs);

        //scrolling function 
        $(".navigation li a ,.scrollDown a , #phoneNavItems li a ").click(function (e) {
            $(".navigation li ,.scrollDown, #phoneNavItems li").removeClass('active');
            $(this).parent().addClass('active');
            scroll = $(this).attr("href");
            scroll = scroll.substring(scroll.indexOf("#"), scroll.length);
            scroll_to(scroll, 1); //scroll to inside id 
            e.preventDefault();
        });
		
		$(".button,.readmorebtn,.image_carousel a").click(function (e) {
            $(this).parent().addClass('active');
            scroll = $(this).attr("href");
            scroll = scroll.substring(scroll.indexOf("#"), scroll.length);
            scroll_to(scroll, 1); //scroll to inside id 
            e.preventDefault();
        });
		
		
		
		

        $("header .logo").click(function (e) {
            scroll = $(this).attr("href");
            scroll = scroll.substring(scroll.indexOf("#"), scroll.length);
            scroll_to(scroll, 2);  //scroll to top of page
            e.preventDefault();
        });

        var pathname = window.location.href;

        if (!window.location.origin) { // Internet Explorer Origion
            window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
        }

        var $originpathname = window.location.origin + window.location.pathname;

        pathname = pathname.substring(pathname.indexOf("#"), pathname.length);
        if ($originpathname !== pathname && pathname !== '#home') {
            if ($(".page-template-main-page-php").length) {
                scroll_to(pathname, 1);
            }
        }
        //scrolling function End

        // Disable parallax In Touch Device 
        if (isTouchDevice) {

            $('#home, .footer-bottom').css('cssText', 'position: static !important');
            $('#main').css('cssText', 'margin-bottom: 0 !important');

        }

        // social share's pop up 
        social_share_pop_up();

    });
    //End $(document).ready

    $(window).load(function () {

        //Hide Website PreLoader
        $("#preloader").addClass('preloader_animation');

        //remove Preloader div 
        setTimeout(function(){
            $('#preloader').remove();
        }, 2000);
       
        $("#spinner").fadeOut(250);

        // crousel items Height
        setTimeout(function(){
            setHeights();
        }, 1000);

    });

    $(window).scroll(function () {

        /* add active class for menu when page Scrolling */
        var aChildren = $("#pxHeader .navigation li a"); // find the a children of the list items
        var aArray = []; // create the empty aArray
        for (var i = 0; i < aChildren.length; i++) {
            var aChild = aChildren[i];
            if ($(aChild).hasClass('locallink')) {

                var ahref = $(aChild).attr('href');
                aArray.push(ahref);

            }
        } // this for loop fills the aArray with attribute href values

        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i = 0; i < aArray.length; i++) {
            var theID = aArray[i];

            if ($(theID).length) {

                var divPos = $(theID).offset().top; // get the offset of the div from the top of page
                var divHeight = $(theID).height(); // get the height of the div in question

                var menusize = 87;

                if ($("#wpadminbar").size() != 0) { // wpadminbar 
                    menusize = 123;
                }

                if (windowPos >= (divPos - menusize) && windowPos < (divPos + divHeight - menusize)) {
                    $("a[href='" + theID + "']").parent().addClass("active");
                } else {
                    $("a[href='" + theID + "']").parent().removeClass("active");
                }
            }
        }


        var $window_y = $(window).scrollTop();
        var $ffheight = $windowHeight + 700;


        /* scroll to top page  */
        if ($window_y > 2500 && !($("#scrollToTop").hasClass('visibleTopButton'))) {

            $("#scrollToTop").fadeIn('fast');
            $("#scrollToTop").addClass('visibleScrollTop');

        } else if ($window_y < 2500 && $("#scrollToTop").hasClass('visibleTopButton')) {

            $("#scrollToTop").fadeOut('fast');
            $("#scrollToTop").removeClass('visibleScrollTop');

        }

        $("#scrollToTop a").click(function (e) {
            scroll = $(this).attr("href");
            scroll = scroll.substring(scroll.indexOf("#"), scroll.length);
            scroll_to(scroll, 3);  //scroll to top of page
            e.preventDefault();
        });

        function homeParallax() {

            //background home parallax
            $('#home').css({
                'top': ($window_y * -0.2) + "px"
            });


            var $textSliderHomeHeight = parseInt($(".textSliderHome").height());
            $textSliderHomeHeight = (-($textSliderHomeHeight));

            // home text slider parallax 
            $('.textSliderHome').css({
                'margin-top': (($window_y * -0.4) + (($textSliderHomeHeight / 2) + 60)) + "px",
                'opacity': (1 - ($window_y / 550))
            });

            // start here parallax
            $('.scrollDownWrap').css({
                'bottom': (($window_y * 0.8) + 50) + "px",
                'opacity': (1 - ($window_y / 600))
            });

        }

        function headerTransform() {

            var $hideMeunScrollHeight = $windowHeight * 0.08;

            if ($window_y > $hideMeunScrollHeight && $checkFixed === 'scroll-sticky') {

                $("#pxHeader").fadeIn(300);

            } else if ($window_y > $hideMeunScrollHeight && $checkFixed === 'scooter-menu') {
                var $checkShowMenu = $('#pxHeader').hasClass('hideHeaderShadow');
                if ($checkShowMenu) {

                    /*$('#logoMenuHeader').fadeIn('fast', function () {
                        $('#logoHeader').fadeOut('fast');
                    });*/

                    $('#pxHeader').removeClass('hideHeaderShadow');

                }


            } else {

                if ($checkFixed === 'scroll-sticky') {

                    $("#pxHeader").fadeOut(300);

                } else if ($checkFixed === 'scooter-menu') {

                    var $checkShowMenu = $('#pxHeader').hasClass('hideHeaderShadow');
                    if (!$checkShowMenu) {

                        /*$('#logoHeader').fadeIn('fast', function () {
                            $('#logoMenuHeader').fadeOut('slow');
                        });*/

                        $('#pxHeader').addClass('hideHeaderShadow');

                    }

                }

                /* slide up the menu List if open */
                var $menu = $('#phoneNavItems');
                var $phoneNavIcon = $('#phoneNavIcon');

                $menu.slideUp('fast');
                $phoneNavIcon.removeClass('active');

            }

        }

        function footerFixed() {
            if ($window_y > $ffheight) {
                $("#main").css('margin-bottom', '115px');
                $('.footer-bottom').addClass('ffooter-bottom');
            } else {
                $('.footer-bottom').removeClass('ffooter-bottom');
            }
        }

        if ( $(window).width() > 1024) {
            if ($documentHeight > 500 && $checkFixed != 'fixed-menu') {
                headerTransform();
            }

            homeParallax();
        }


        if (mainHeight > $ffheight && $window.width() > 768 && $(".page-template-main-page-php").size() != 0 && !isTouchDevice) {
            footerFixed();
        }

    });

    $(window).resize(function () {

        fullWidthSection(); // FullWidth colorize Section - shortcode

        homeHeight();

        // crousel items Height
        setHeights();

        // blog toggle
        $('.blogAccordion').each(function () {
            var postVar = blogToggleArray($(this));
            // set toggle mode When Page Loaded
            blogToggleSet(postVar);
        });

        nav();

        var $pIsotopeContainer = 1; // id 1 Portfolio Resize 
        portfolioIsotope($pIsotopeContainer);

        videoBackgroundSize();

        // Mobile Menu
        phoneNavContainerHeight();

    });


    /* Add an "M" at the end of the counter box */

    //Have to do it this way because simply appending the "M" messes up the counter's own javascript animation
    $('#counter-2').find('.counterBoxNumber').eq(2).wrap('<span class="counter-million"></span>');
    $('.counter-million').append(" M");

    

    var centerPanel = $('#center-panel');

    removeCenterPanel();

     $( window ).resize(function() {
        console.log($(window).width());
        removeCenterPanel();
     })   

     function removeCenterPanel(){

       if($(window).width() < 1200){
            //Remove the center panel if it exists
            if(centerPanel.length){
                centerPanel.detach();    
            }
        }else if($(window).width() > 1200){
            //Restore the center panel if it doesn't already exist 
            if($('#center-panel').length == 0){
                $('.isotope-item').eq(6).after(centerPanel);
            }
        }
     }

})(jQuery);