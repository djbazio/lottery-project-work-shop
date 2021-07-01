(function () {
	"use strict";

    $(document).ready(function () {
        $('.property-slide-one').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			draggable: false,
			asNavFor: '.property-nav-one'
		});
		$('.property-nav-one').slick({
			slidesToShow: 3,
			asNavFor: '.property-slide-one',
			arrows: false,
			focusOnSelect: true,
			draggable:false
        });
        $('.property-slide-two').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			draggable: false,
			asNavFor: '.property-nav-two'
		});
		$('.property-nav-two').slick({
			slidesToShow: 3,
			asNavFor: '.property-slide-two',
			arrows: false,
			focusOnSelect: true,
			draggable:false
        });
        $('.property-slide-three').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			draggable: false,
			asNavFor: '.property-nav-three'
		});
		$('.property-nav-three').slick({
			slidesToShow: 3,
			asNavFor: '.property-slide-three',
			arrows: false,
			focusOnSelect: true,
			draggable:false
		});
		$('.latest-sale').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 2,
			appendDots: $(".latest-sale-dots"),
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 780,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 650,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		$('.latest-rent').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 2,
			appendDots: $(".latest-rent-dots"),
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 780,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 650,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		$('.team-carousel').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 2,
			appendDots: $(".team-dots"),
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		$('.blog-carousel').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			appendDots: $(".blog-dots"),
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 700,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		
		$('.testimonial-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			appendDots: $(".testimonial-dots"),
			arrows: false,
			dots: true
		});
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			draggable: false,
			asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
			slidesToShow: 3,
			asNavFor: '.slider-for',
			arrows: false,
			focusOnSelect: true,
			draggable:false
		});
		$('.property-list-carousel').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			draggable: false,
			asNavFor: '.property-list-navigation'
		});
		$('.property-list-navigation').slick({
			slidesToShow: 4,
			asNavFor: '.property-list-carousel',
			arrows: false,
			focusOnSelect: true,
			draggable: false
		});
		$('.property-video-carousel-two').slick({
			slidesToShow: 1,
			arrows: false,
			fade: true,
			draggable: false,
			vertical: true,
			asNavFor: '.property-item-carousel'
		});
		$('.property-item-carousel').slick({
			slidesToShow: 4,
			asNavFor: '.property-video-carousel-two',
			arrows: false,
			focusOnSelect: true,
			draggable: false,
			vertical: true,
		});
		$('.img-carousel').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			// autoplay: true,
			arrows: true,
			dots: false,
			prevArrow: "<i class='flaticon-left'></i>",
			nextArrow: "<i class='flaticon-right'></i>",
		});
		$('.img-carousel-dots').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			// autoplay: true,
			arrows: false,
			dots: true,
		});
		$('.video-carousel').slick({
			centerMode: true,
			slidesToShow: 3,
			arrows: true,
			dots: false,
			appendArrows: ".video-arrow",
			prevArrow: "<i class='flaticon-left'></i>",
			nextArrow: "<i class='flaticon-right'></i>",
			responsive: [{
					breakpoint: 768,
					settings: {
						// arrows: false,
						centerMode: true,
						slidesToShow: 1
					}
				}
			]
		});
		$('.feature-carousel-two').slick({
			slidesToShow: 3,
			arrows: true,
			dots: false,
			prevArrow: "<i class='flaticon-left-chevron'></i>",
			nextArrow: "<i class='flaticon-right-chevron'></i>",
			responsive: [{
					breakpoint: 991,
					settings: {
						arrows: false,
						slidesToShow: 2
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1
					}
				}
			]
		});
		$('.explore-carousel').slick({
			slidesToShow: 3,
			slidesToScroll: 2,
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1
					}
				}
			]
		});
		$('.portfolio-carousel').slick({
			slidesToShow: 4,
			slidesToScroll: 2,
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1
					}
				}
			]
		});
		$('.client-carousel').slick({
			centerMode: true,
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			centerPadding: '0',
			arrows: false,
			dots: false,
			responsive: [{
					breakpoint: 800,
					settings: {
						arrows: false,
						centerMode: true,
						slidesToShow: 3
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false,
						centerMode: true,
						slidesToShow: 1
					}
				}
			]
		});
		$('.property-area-carousel').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 2,
			arrows: false,
			dots: true,
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		$('.testimonial-carousel').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			appendArrows: ".testimonial-arrow",
			prevArrow: "<i class='flaticon-left'></i>",
			nextArrow: "<i class='flaticon-right'></i>"
		});
		$('.hero-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			autoplay: true,
			speed: 1000
		});
		$('.gallery-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			autoplay: true,
			speed: 1000
		});
		$('.plan-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			autoplay: true,
			speed: 1000
		});
		$('.property-gallery-slider').slick({
			slidesToShow: 3,
			arrows: true,
			dots: false,
			autoplay: true,
			speed: 1000,
			prevArrow: "<i class='flaticon-left-chevron'></i>",
			nextArrow: "<i class='flaticon-right-chevron'></i>",
			responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1
					}
				}
			]
		});
		var slides = $('.property-slider-home .slider-item');
		$('.property-slider-home').slick({
			slidesToShow: 1,
			arrows: true,
			dots: false,
			prevArrow: "<i class='flaticon-left'></i>",
			nextArrow: "<i class='flaticon-right'></i>",
		});
    })
})()