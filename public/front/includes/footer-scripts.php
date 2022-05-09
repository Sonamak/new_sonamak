    <div id="toTop"></div><!-- Back to top button -->
    
    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
    <!-- if page is HOME page -->

	<!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="revolution-slider/js/jquery.themepunch.tools.min.js"></script>
	<script src="revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
            $(".owl-carousel-testmonial").owlCarousel({
                responsive:{
                    0: {
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
	        $(".owl-carousel").owlCarousel({
                responsive:{
                    1000:{
                        items:1
                    }
                }
            });
			var tpj=jQuery;
			
			var revapi44;
			tpj(document).ready(function() {
				 if (tpj("#rev_slider_44").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_44");
        } else {
            revapi44 = tpj("#rev_slider_44").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution-slider/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 4500,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        touchOnDesktop: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        enable: true,
                        style: 'erinyen',
                        tmp: '',
                        rtl: false,
                        hide_onleave: true,
                        hide_onmobile: true,
                        hide_under: 767,
                        hide_over: 9999,
                        hide_delay: 0,
                        hide_delay_mobile: 0,

                        left: {
                            container: 'slider',
                            h_align: 'left',
                            v_align: 'center',
                            h_offset: 60,
                            v_offset: 0
                        },

                        right: {
                            container: 'slider',
                            h_align: 'right',
                            v_align: 'center',
                            h_offset: 60,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: true,
                        style: 'zeus',
                        direction: 'horizontal',
                        rtl: false,

                        container: 'slider',
                        h_align: 'center',
                        v_align: 'bottom',
                        h_offset: 0,
                        v_offset: 30,
                        space: 7,

                        hide_onleave: false,
                        hide_onmobile: false,
                        hide_under: 0,
                        hide_over: 767,
                        hide_delay: 200,
                        hide_delay_mobile: 1200
                    },
                },
                responsiveLevels: [1240, 1025, 778, 480],
                visibilityLevels: [1920, 1500, 1025, 768],
                gridwidth: [1200, 991, 778, 480],
                gridheight: [1025, 1366, 1025, 868],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner4",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "on",
                fullScreenAutoWidth: "on",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "on",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLimit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
				}
			});
	</script>

    <!-- elseif page is Destinations Page -->

    <!-- SPECIFIC SCRIPTS -->
	<script src="js/video_header.js"></script>
	<script>
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>

    <!-- elseif page is Tours Page -->   
    
    <!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/markerclusterer.js"></script>
	<script src="js/map_tours.js"></script>
	<script src="js/infobox.js"></script>
	
	<!-- Masonry Filtering -->
	<script src="js/isotope.min.js"></script>
	<script>
	$(window).on('load', function(){
	  var $container = $('.isotope-wrapper');
	  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
	});
	$('.filters_listing').on( 'click', 'input', 'change', function(){
	  var selector = $(this).attr('data-filter');
	  $('.isotope-wrapper').isotope({ filter: selector });
	});
	</script>
	
	<!-- Range Slider -->
	<script>
		 $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 30,
            max: 180,
            from: 60,
            to: 130,
            type: 'double',
            step: 1,
            prefix: "Min. ",
            grid: false
        });
	</script>

    <!-- elseif page is Tour-details Page -->  

    <!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/map_single_tour.js"></script>
	<script src="js/infobox.js"></script>
	
	<!-- DATEPICKER  -->
	<script>
	$(function() {
	  $('input[name="dates"]').daterangepicker({
		  autoUpdateInput: false,
		  parentEl:'.scroll-fix',
		  minDate:new Date(),
		  opens: 'left',
		  locale: {
			  cancelLabel: 'Clear'
		  }
	  });
	  $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
	  });
	  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });
	});
	</script>
	
	<!-- INPUT QUANTITY  -->
	<script src="js/input_qty.js"></script>

    <!-- SPECIFIC SCRIPTS -->
	<script src="js/tabs.js"></script>
	<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>

    <!-- elseif page is Contacts Page -->  

    <!-- SPECIFIC SCRIPTS -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/mapmarker.jquery.js"></script>
	<script src="js/mapmarker_func.jquery.js"></script>