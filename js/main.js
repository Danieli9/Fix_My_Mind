function footerMenu() {

	
	const buttons = document.querySelectorAll('.footer--links');
	for (const button of buttons) {
		button.addEventListener('click', function(event) {
		if (event.target.matches('.btn--footer')) { 

			button.querySelector('.footer--slide').classList.toggle('show');
			button.querySelector('.btn--footer').classList.toggle('show');
		}
		})
	}
	// on outside click, close all dropdowns
	document.addEventListener('click', function(event) {

		const clickedElement = event.target;
		const dropdowns = document.querySelectorAll('.footer--slide');
		const dropdownssvg = document.querySelectorAll('.btn--footer');

		if (clickedElement.closest('.btn--footer') === null) {

		for (const dropdown of dropdowns) {
			dropdown.classList.remove('show');
		}

		for (const dropdownsvg of dropdownssvg) {
			dropdownsvg.classList.remove('show');
		}

		}
	})
	
}

function swiper() {
	var swiper = new Swiper(".mySwiper", {
		slidesPerView: 1,
		spaceBetween: 50,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		autoplay: {
			delay: 2000,
		},
			// Responsive breakpoints
		breakpoints: {
			// when window width is >= 640px
			576: {
			spaceBetween: 30,	
			slidesPerView: 2,
			spaceBetween: 40
			},
			992: {
			slidesPerView: 3,
			spaceBetween: 40
			}
		}
	});
}

function removeTopMenu() {

	window.onscroll = function() {
	var body = document.querySelector("body");

	if ( window.pageYOffset > 200 ) {
		body.classList.add("remove_top_menu");
	} else {
		body.classList.remove("remove_top_menu");
	}
}
}

function filter() {
	(function($) {
		$('#post_filters_cat').on('change', function () {
			var url = $(this).val(); // get selected value
			if (url) { // require a URL
				window.location = url; // redirect
			}
			return false;
		});
	})(jQuery);
}

function radio() {
	(function($) {
		$("#play-button").click( function(event) {
			event.preventDefault();
			$(this).addClass('is-active');
			$("#play-bar").addClass('is-active');
			document.getElementById("play-bar").play()
		});
	})(jQuery);
}

function initDesktopMenu() {
	// navmenu
	document.querySelectorAll('.nav-item').forEach(function(everyitem){

		everyitem.addEventListener('mouseover', function(e){

			let el_link = this.querySelector('.dropdown-menu');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.add('show');
			}

		});
		everyitem.addEventListener('mouseleave', function(e){
			let el_link = this.querySelector('.dropdown-menu');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.remove('show');
			}


		})
	});

	
}

function initMobileMenu() {
	(function($) {

		// Toggle the mobile menu visibility, active class and change button text
		$(".navbar-toggler").click( function(event) {
			event.preventDefault();
			$(".navbar-collapse").slideToggle();
			$(this).toggleClass('is-active');
			$(".navbar ").toggleClass('is-active');
	
			if ( $(this).hasClass('is-active') ) {
				$(this).addClass('open');
			}
			else
			{
				$(this).removeClass('open');
			}
		});
		$(".menu-item").click( function(event) {
			var parent = $(this).closest('a');
			var parents = $(this).closest('.menu-item');
			$(parent).find('> .dropdown-menu').toggleClass('show');
			$(parents).find('> .nav-link').addClass('show');
	
		});

		$(".have_dropdown > a").on('click touchend', function(event){
			event.preventDefault();

			var parent = $(this).closest('li');
	
			if ( ! $(parent).find('> .dropdown-menu').hasClass('show') ) {

				// hasn't been clicked yet — open
				$(parent).find('> .dropdown-menu').toggleClass('show');
				$(parent).toggleClass('borders');
				// $(parent).find('> .c-mobile-nav__sub-indicator').toggleClass('show');
			} else {
				// has already been expanded — redirect to href
				window.location = this.href;
			}
		});
			
	})(jQuery);
}
function init(){
	
	filter();
	removeTopMenu();
	swiper();
	radio();
	footerMenu();

}

window.addEventListener('load', function(){
	init();
	if (window.innerWidth < 992 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		// mobile
		initMobileMenu();
	
		} else {
		// desktop
		initDesktopMenu();
	
	}
});