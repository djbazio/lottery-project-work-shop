(function () {
	"use strict";

	$(document).ready(function () {

		// Menuzord Navigation Menu Option
		jQuery("#menuzord").menuzord();

		// Back to Top
		var btn = $('#top-button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });

		// Serach Overlay
        if ($('.search-overlay').length) {
            $('.close-overlay').click(function (e) {
                $('.search-overlay').fadeOut();
                e.preventDefault();
            });
            $('.open-search').click(function (e) {
                $('.search-overlay').fadeIn();
                e.preventDefault();
            });
		}
		
		// Sidebar
        if ($('.sidenav').length) {
            var openclick = $('.off-canvas-btn');
            var closeclick = $('.closebtn');
            openclick.on('click', function (e) {
                e.preventDefault();
                $('#mySidenav').fadeIn();
                document.getElementById("innar-side").style.right = "0";
            });
            closeclick.on('click', function (e) {
                e.preventDefault();
                $('#mySidenav').fadeOut();
                document.getElementById("innar-side").style.right = "-350px";
            });
            $(document).click(function () {
                $('#mySidenav').fadeOut();
                document.getElementById("innar-side").style.right = "-350px";
            });
            $(".sidenav-menu").click(function (e) {
                e.stopPropagation();
            });
            $(".off-canvas-btn").click(function (e) {
                e.stopPropagation();
            });
		}
		if ($('.advance-search-offcanvas').length) {
            var openclick = $('.show-filter');
            var closeclick = $('.close-search');
            openclick.on('click', function (e) {
                e.preventDefault();
                $('.advance-search-offcanvas').fadeIn();
            });
            closeclick.on('click', function (e) {
                e.preventDefault();
                $('.advance-search-offcanvas').fadeOut();
            });
            $(document).click(function () {
                $('.advance-search-offcanvas').fadeOut();
            });
            $(".advance-search-offcanvas").click(function (e) {
                e.stopPropagation();
            });
            $(".show-filter").click(function (e) {
                e.stopPropagation();
            });
		}
		
		// Active Item on Hover
		if ($(".hover-active").length > 0) {
            $(".hover-active").on("mouseenter mouseleave", function (event) {
                if (event.type === "mouseenter") {
                    $('.hover-active > div').removeClass('active')
                    $(this)
                        .children()
                        .addClass("active");
                }

                if (event.type === "mouseleave") {
                    $(".hover-active")
                        // .not(this)
                        $(this).children()
                        .addClass("active");
                }
            });
        }

		// Show Advanced Search
		$('.show-advance').on('click', function (e) {
			$('.advance-search').slideToggle('fast')
			e.preventDefault();
		});
		$('.show-switcher').on('click', function (e) {
			$('.advance-search').slideToggle('fast')
			$(this).toggleClass('active')
			e.preventDefault();
		});
		$('.view-advance-search').on('click', function (e) {
			$('.property-advance').slideToggle('fast')
			e.preventDefault();
		});

		// Property Switcher
		$('.show-list').on('click', function (e) {
			$('.show-grid').removeClass('active');
			$('.property-gridwise').hide()
			$('.property-listwise').show()
			$(this).addClass('active');
			e.preventDefault();
		});
		$('.show-grid').on('click', function (e) {
			$('.show-list').removeClass('active');
			$('.property-listwise').hide()
			$('.property-gridwise').show()
			$(this).addClass('active');
			e.preventDefault();
		});

		// Social Left Bar
		$('.close-button').on('click', function (e) {
			$('.header-left').css('left', '-400px')
			$('.hero-layout-four .open-button').css('opacity', '1')
			e.preventDefault();
		});
		$('.open-button').on('click', function (e) {
			$('.header-left').css('left', '0')
			$('.hero-layout-four .open-button').css('opacity', '0')
			e.preventDefault();
		});

		// Feature-Details
		$(document).on("click", function () {
			$(".house-feature").fadeOut('fast');
			$('.footer-content .advanced').removeClass('active')
		});
		$('.footer-content .advanced').on('click', function (e) {
			$(this).toggleClass('active');
			$(this).parent().parent().parent().children('.house-feature').slideToggle('fast');
			e.preventDefault();
			e.stopPropagation();
		});

		// Map Location
		$('.show-location').on('click', function (e) {
			$('.show-location').removeClass('active')
			$(this).addClass('active');
			$('.map-pin .location-item').removeClass('show')
			$(this).parent().children('.location-item').addClass('show');
			e.preventDefault();
		});

		// Feature Tab
		if($('.feature-layout-eight').length){
			$('.feature-tab-control .rent-tab').on('click', function () {
				$('.feature-tab-control').children().children().removeClass('active')
				$(this).addClass('active');
				$('#feature .sale-lists').hide();
				$('#feature .buy-lists').hide();
				$('#feature .rent-lists').show();
			});
			$('.feature-tab-control .sale-tab').on('click', function () {
				$('.feature-tab-control').children().children().removeClass('active')
				$(this).addClass('active');
				$('#feature .buy-lists').hide();
				$('#feature .rent-lists').hide();
				$('#feature .sale-lists').show();
			});
			$('.feature-tab-control .buy-tab').on('click', function () {
				$('.feature-tab-control').children().children().removeClass('active')
				$(this).addClass('active');
				$('#feature .rent-lists').hide();
				$('#feature .sale-lists').hide();
				$('#feature .buy-lists').show();
			});

			$('.tab-titles .rent-tab').on('click', function () {
				$('.tab-titles').children().removeClass('active')
				$(this).addClass('active');
				$('#property .sale-lists').hide();
				$('#property .buy-lists').hide();
				$('#property .rent-lists').show();
			});
			$('.tab-titles .sale-tab').on('click', function () {
				$('.tab-titles').children().removeClass('active')
				$(this).addClass('active');
				$('#property .buy-lists').hide();
				$('#property .rent-lists').hide();
				$('#property .sale-lists').show();
			});
			$('.tab-titles .buy-tab').on('click', function () {
				$('.tab-titles').children().removeClass('active')
				$(this).addClass('active');
				$('#property .rent-lists').hide();
				$('#property .sale-lists').hide();
				$('#property .buy-lists').show();
			});
		}

		// Map Layout One
		if($('.map-layout-one').length){
			$('.item-dot').on('click', function () {
				$('.map-item').children().removeClass('item-dot-active')
				$(this).addClass('item-dot-active');
				$('.item-details').removeClass('show')
				$(this).parent().children('.item-details').addClass('show');
			});
		}

		// Property Single accordion
		if($('.property-collapse').length){
			$('.collapse-click').on('click', function (e) {
				$('.collapse-item').children().children().children().removeClass('active')
				$(this).addClass('active');
				$('.collapse-item').removeClass('show')
				$(this).parent().parent().parent().addClass('show');
				e.preventDefault();
			});
		}

		// Featured Property Tab
		$('.show-sale').on('click', function(e){
			$('#feature .button-small').removeClass('active');
			$(this).addClass('active')
			$('.rent-tab').fadeOut('fast')
			$('.sale-tab').fadeIn('fast')
			e.preventDefault();
		});
		$('.show-rent').on('click', function(e){
			$('#feature .button-small').removeClass('active');
			$(this).addClass('active')
			$('.sale-tab').fadeOut('fast')
			$('.rent-tab').fadeIn('fast')
			e.preventDefault();
		});

		// Latest Property Tab
		$('.show-latest-sale').on('click', function(e){
			$('#latest-property .button-small').removeClass('active');
			$(this).addClass('active')
			$('.latest-rent-tab').css('opacity', '0');
			$('.latest-rent-tab').css('height', '0');
			$('.latest-sale-tab').css('opacity', '1');
			$('.latest-sale-tab').css('height', '550px');
			e.preventDefault();
		});
		$('.show-latest-rent').on('click', function(e){
			$('#latest-property .button-small').removeClass('active');
			$(this).addClass('active')
			$('.latest-sale-tab').css('opacity', '0');
			$('.latest-sale-tab').css('height', '0');
			$('.latest-rent-tab').css('opacity', '1');
			$('.latest-rent-tab').css('height', '550px');
			e.preventDefault();
		});

		// Counter Up
		if ($('.counterup').length) {
			$('.counterup').counterUp();
		}

		// Range Sliders
		$(function () {
			$("#range-location").slider({
				range: "max",
				min: 1,
				max: 100,
				value: 50,
				slide: function( event, ui ) {
					$( "#amount" ).val( ui.value + " Miles" );
				}
			});
			$( "#amount" ).val( $( "#range-location" ).slider( "value" ) + " Miles" );
		});

		$(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 15000,
				values: [1000, 10000],
				slide: function (event, ui) {
					$("#amount-two").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount-two").val("$" + $("#slider-range").slider("values", 0) +
				" - $" + $("#slider-range").slider("values", 1));
		});

		// Case Filter 
		if ($('.portfolio-items').length) {
			var $grid = $('.portfolio-items').isotope({
				itemSelector: '.mix',
				layoutMode: 'fitRows',
			});

			// bind filter button click
			$('.filters-button-group').on('click', 'button', function () {
				var filterValue = $(this).attr('data-filter');
				$grid.isotope({
					filter: filterValue
				});
			});

			// change is-checked class on buttons
			$('.filters-button-group').each(function (i, buttonGroup) {
				var $buttonGroup = $(buttonGroup);
				$buttonGroup.on('click', 'button', function () {
					$buttonGroup.find('.is-checked').removeClass('is-checked');
					$(this).addClass('is-checked');
				});
			});
		}

		// Skill Chart
		if($('#skill-canvas').length){
			var config = {
				type: 'line',
				data: {
					labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
					datasets: [{
						label: 'Profit Margin',
						backgroundColor: '#fb5252',
						borderColor: '#fb5252',
						borderWidth: 1,
						data: ['10', '12', '13', '25', '00', '30', '10'],
						fill: false,
						
					}]
				},
				options: {
					responsive: true,
					title: {
						display: false
					},
					legend: {
						display: false,
					},
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						x: {
							display: true,
						},
						y: {
							display: false,
							max: 40
						}
					}
				}
			};
	
			window.onload = function() {
				var ctx = document.getElementById('skill-canvas').getContext('2d');
				window.myLine = new Chart(ctx, config);
			};
		}
	});
	// Navigation
	jQuery(window).on('scroll', function () {
		'use strict';
		if (jQuery(window).scrollTop() > 60) {
			jQuery('#header-bottom').addClass('animated fadeInDown sticky');
			jQuery('.halfmap-fixed').addClass('top-bigger');
		} else {
			jQuery('#header-bottom').removeClass('animated fadeInDown sticky');
			jQuery('.halfmap-fixed').removeClass('top-bigger');
		}
		if (jQuery(window).scrollTop() > 200) {
			jQuery('#header-bottom-two').addClass('animated fadeInDown sticky');
		} else {
			jQuery('#header-bottom-two').removeClass('animated fadeInDown sticky');
		}
	});

	// Custom Scroll
	$(window).on("load", function () {
		if ($('.custom-scroll').length) {
			$(".custom-scroll").mCustomScrollbar({
				theme: "inset-3"
			});
		}
	});

	if ($('.preloader-layout').length) {
        $(window).on('load', function () { // makes sure the whole site is loaded 
            $('.cube-wrapper').fadeOut('slow');
            $('.preloader-layout').delay(400).fadeOut('slow');
        });
    }

})()