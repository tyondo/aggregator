/*
 * Outsider v2.0 HTML5 Bootstrap 4 Template
 * Copyright 2017, Filip Greksa
 * www.filipgreksa.com
 * 03/02/2017
 */

/*jslint browser: true*/
/*jslint devel: true */
/*global $, jQuery,
 navClass, postsMasonry, archiveList, isoFilter, niceXsFilter,
 basicSlider, svgSyncSlider, homeSlider,
 twitterFeed, instagramFeed, rightMenu, chocoLightbox, scrollFnc
 */
(function ($) {
	"use strict";
	
	$(window).on('load', function () {
		// Preloader
		setTimeout(function () {
			$('.preloader').fadeOut(600);
		}, 800);
		// Reset form fields on load
		$('form').each(function () {
			this.reset();
		});
	});
	
	$(document).ready(function () {
		
		navClass();
		rightMenu();
		postsMasonry();
		archiveList();
		isoFilter();
		niceXsFilter();
		basicSlider();
		svgSyncSlider();
		homeSlider();
		chocoLightbox();
		scrollFnc();
		twitterFeed();
	
	}); // documentReady end

// -----------------------------
// Functions
// -----------------------------
// -----------------------------

	// ----------------------------
	// Navbar - change class on scroll
	// ----------------------------
	function navClass() {
		var navbar = $('.navbar');
		if (navbar.hasClass('faded')) {
			$(window).on('scroll', function () {
				if (navbar.offset().top > 25) {
					navbar.addClass("navbar-light").removeClass("navbar-inverse");
				} else {
					navbar.addClass("navbar-inverse").removeClass("navbar-light");
				}
			});
		}
	}
	
	// ----------------------------
	// Right Menu
	// ----------------------------
	function rightMenu() {
		$("#menu-button, .page-cover, .search-close").on("click", function (e) {
			e.preventDefault();
			$("body").toggleClass("search-opened search-closed");
		});
	}
	
	// ----------------------------
	// Masonry
	// ----------------------------
	
	// Posts masonry
	function postsMasonry() {
		var $container = $('.masonry'),
			loadMore = $('#load-more');
		// init
		$container.imagesLoaded(function () {
			$container.isotope({
				itemSelector: ".item",
				percentPosition: true,
				masonry: {
					columnWidth: ".grid-sizer"
				}
			});
		});
		
		$container.infinitescroll({
			navSelector  : '.page-nav .pagination',
			nextSelector : '.page-nav .pagination a:last',
			itemSelector : '.item',
			loading: {
				finished: undefined,
				finishedMsg: 'No more pages to load.',
				msgText: "Loading the next set of posts...",
				img: '',
				speed: 'slow',
				start: undefined,
				animate: true
			}
		}, function (arrayOfNewElems) {
			var $newElems = $(arrayOfNewElems).css({ opacity: 0 });
			$newElems.imagesLoaded(function () {
				$newElems.animate({ opacity: 1 });
				$container.isotope('appended', $newElems);
				setTimeout(function () {
					$container.isotope('layout');
				}, 500);
			});
		});
		
		/**
		* Load new pages by clicking a link
		* https://gist.github.com/gregrickaby/10383879
		*/
		if (loadMore.length) {
			// Pause Infinite Scroll
			$(window).off('.infscr');
			// Resume Infinite Scroll
			$('#load-more').click(function () {
				$container.infinitescroll('retrieve');
				return false;
			});
			
		}
		
		// filter items when filter link is clicked
		$('#filter').on('click', 'a', function () {
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
		
	}
	
	// Archive list masonry vertical
	function archiveList() {
		var $archive = $('.archive-list');
		// init
		$archive.imagesLoaded(function () {
			$archive.isotope({
				itemSelector: ".archive-list > li",
				layoutMode: 'vertical',
				getSortData: {
					category: function (itemElem) {
						var category = $(itemElem).find('.meta.category').text().toLowerCase();
						return category;
					},
					oldest: function (itemElem) {
						var oldest = $(itemElem).find('time').attr('datetime');
						return oldest;
					}
				},
				sortAscending: {
					oldest: true
				}
			});
		});
		
		// sort items when filter link is clicked
		$('#sort').on('click', 'a', function () {
			var sortByValue = $(this).attr('data-sort-by');
			$archive.isotope({ sortBy: sortByValue });
			return false;
		});
		
	}
	
	// ----------------------------
	// Filter buttons for isotope
	// ----------------------------
	function isoFilter() {
		var buttonGroup = [];
		$('.filter, .sort').each(function (i, buttonGroup) {
			var $buttonGroup = $(buttonGroup);
			$buttonGroup.on('click', 'a, button', function () {
				$buttonGroup.find('.active').removeClass('active');
				$(this).addClass('active');
			});
		});
	}
	
	
	// -----------------------------
	// Filter / Sort / to Dropdown in xs
	// ----------------------------
	function niceXsFilter() {
		$('<select class="filter-select custom-select mb-3" />').insertAfter(".filter");
		$("#filter a, #sort a").each(function () {
			var el = $(this);
			$("<option />", {
				"data-filter"   : el.attr("data-filter"),
				"data-sort-by"   : el.attr("data-sort-by"),
				"text"    : el.text()
			}).appendTo(".custom-select");
		});
		$(".filter-select").change(function () {
			var selector = $(".filter-select option:selected").attr('data-filter'),
				sortByValue = $(".filter-select option:selected").attr('data-sort-by');
			$('.masonry').isotope({ filter: selector });
			$('.archive-list').isotope({ sortBy: sortByValue });
			return false;
		});
	}
	
	// ----------------------------
	// Slick Slider
	// ----------------------------
	
	// Basic slider
	function basicSlider() {
		$(".slider").slick({
			slide: 'ul>li',
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			touchThreshold: 120,
			dots: true
		});
	}
	
	// Slider for gradient home page with svg
	function svgSyncSlider() {
		$('.slider-for').slick({
			slide: 'ul>li',
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.svg-slider'
		});
		$(".svg-slider").slick({
			slide: 'ul>li',
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			touchThreshold: 120,
			dots: false,
			fade: true,
			asNavFor: '.slider-for'
		});
	}
	
	// Featured posts slider for slider home page
	function homeSlider() {
		$(".fc-slider").slick({
			slide: 'ul>li',
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			touchThreshold: 120,
			dots: false
		});
	}
	
	// ----------------------------
	// Chocolat lightbox
	// ----------------------------
	function chocoLightbox() {
		$('.gallery, .project').Chocolat();
	}
	
	// ----------------------------
	// Scroll functions
	// ----------------------------
	function scrollFnc() {
		// ----------------------------
		// ScrollTop
		// -----------------------------
		$(window).scroll(function () {
			if ($(this).scrollTop() > $(window).height() * 0.7) {
				$('.scroll-top').fadeIn();
			} else {
				$('.scroll-top').fadeOut();
			}
		});
		//Click event to scroll to top
		$('.scroll-top').click(function () {
			$('html, body').animate({scrollTop : 0}, 800);
			return false;
		});
		
		// -----------------------------
		// ScrollBottom
		// -----------------------------
		$('.scroll-down').click(function (sd) {
			sd.preventDefault();
			$('html, body').animate({
				scrollTop: $('.main').offset().top - 30
			}, 1000);
		});
	}
	
	// -----------------------------
	// Twitter
	// -----------------------------
	function twitterFeed() {
		var tF = $('.twitter-feed');
		if (tF.length) {
			tF.tweet({
				join_text: "auto",
				username: ["CreativeMarket"],
				modpath: "php/twitter/",
				count: 6,
				//avatar_size: "42px", //if avatar is used
				retweets: false,
				loading_text: "Loading tweets...",
				//template: "{text}{time}{user}",//{avatar}{join}
				template: '<p>{text}</p><time class="d-block"{time}</time>{user}',
				auto_join_text_default: " ", //We said,
				auto_join_text_ed: " ", //We
				auto_join_text_ing: " ", //We were
				auto_join_text_reply: " ", //We replied
				auto_join_text_url: " " //We were checking out
			});
			
			//Carousel for tweets
			$('.tweet_list').slick({
				fade: true,
				slide: 'ul>li',
				autoplay: true,
				autoplaySpeed: 5000,
				pauseOnHover: false,
				arrows: false,
				dots: false,
				adaptiveHeight: false
			});
		}
	}
	
	/*A jQuery plugin which add loading indicators into buttons
	* By Minoli Perera
	* https://github.com/Minoli/button-loader
	* MIT Licensed.
	* modified
	*/
	function loaderBtn(btn) {
		$(btn).attr("disabled", false);
		$.fn.buttonLoader = function (action) {
			var self = $(this),
				text;
			if (action === 'start') {
				if ($(self).attr("disabled") === "disabled") {
					return false;
				}
				$(self)
					.attr("disabled", true)
					.attr('data-btn-text', $(self).text());
				text = 'Loading';
				if ($(self).attr('data-loading-text') !== undefined && $(self).attr('data-loading-text') !== "") {
					text = $(self).attr('data-loading-text');
				}
				$(self)
					.html(text)
					.addClass('active');
			}
			if (action === 'stop') {
				$(self)
					.html($(self).attr('data-btn-text'))
					.removeClass('active')
					.attr("disabled", false);
			}
		};
	}
	loaderBtn();
	
}(jQuery));