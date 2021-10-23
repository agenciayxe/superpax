$(document).ready(function () {
	slideCurrent = $('#AclamadoPeloPovo').bxSlider({
		slideWidth: 300,
		pause:4000,
		minSlides: 1,
		maxSlides: 12,
		auto: true,
		speed:2000,
		controls:true, 
		pager: false
	});
	

	function toggleMenu() {
		$(".hamburger").toggleClass('is-active');
		$("nav").toggleClass('active');
	}
	$(".hamburger").click(function () {
		toggleMenu();
	});
	$(window).on('resize', function () {
		var width = $(this).width();
		if (width > 768) { $(".hamburger").removeClass('is-active'); $("nav").removeClass('active'); }
	});

	var boxBackTop = $("#box-back-top");
	boxBackTop.fadeOut(0);
	$(window).scroll(function () {
		var positionCurrent = $(window).scrollTop();
		if (positionCurrent < 500) { boxBackTop.fadeOut(300); }
		else { boxBackTop.fadeIn(300); }
	});

	boxBackTop.on('click', function () {
		$("html, body").animate({scrollTop: 0}, 300);
	});
	var mySwiper = new Swiper('.swiper-container', {
	    zoom: true,
	    speed: 400,
	    navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
	    },
	    pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
	    renderFraction: function (currentClass, totalClass) {
			return '<span class="' + currentClass + '"></span>' +
				' of ' +
				'<span class="' + totalClass + '"></span>';
		}
	});
	var bannerSlide = new Swiper('.swiper-content', {
	    zoom: true,
	    speed: 400,
	    loop: true,
	    autoplay: {
			delay: 5000,
		},
	    navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
	    }
	});

	var scrollTop = 0;
	$(window).scroll(function () {
		if (scrollTop == 0) {
			scrollTop = 1;
			var positionCurrent = $(window).scrollTop();
			var headerArea = $('.header-area');
			var headerBar = $('.header-bar');
			if (positionCurrent > 50) { headerArea.addClass('fixed'); headerBar.addClass('fixed'); }
			else { headerArea.removeClass('fixed'); headerBar.removeClass('fixed'); }
			scrollTop = 0;
		}
	});
	var listBrand = function () {
		var widthCurrent = $(window).width();
		if (widthCurrent <= 576) { 	 }
		else {  }
		$('.list-brand').flickity({
			wrapAround: true,
			cellAlign: 'left',
			contain: true,
			autoPlay: true,
			zoom: {
				maxRatio: 2,
			},
		});
	}
	listBrand();
	$('.list-brand img').on('load', function () {
		listBrand();
	});
	/*
	var $doc = $('html, body');
	$('nav a').click(function() {
		var tamanhoHeader = $("header").height();
	    $doc.stop().animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);
		$('.hamburger').removeClass('is-active');
		$("nav").removeClass('active');
	    return false;
	});
	*/
});