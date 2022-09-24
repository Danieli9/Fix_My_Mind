document.addEventListener("DOMContentLoaded", function(){
	
	function navMenu() {
		if (window.innerWidth > 992) {
		
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
		// make it as accordion for bigger screens
	}
	navMenu();
	
	function footerMenu() {

		if (window.innerWidth < 992) {
		
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
		// make it as accordion for smaller screens
	}
	footerMenu();

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
	swiper();

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
	removeTopMenu();

	function mobileMenu() {
		(function($) {

			if (window.innerWidth < 992) {

				// Toggle the mobile menu visibility, active class and change button text
				$(".navbar-toggler").click( function(event) {
					event.preventDefault();
					$(".navbar-collapse").slideToggle();
					$(this).toggleClass('is-active');
					$(".navbar ").toggleClass('is-active');
			
					if ( $(this).hasClass('is-active') ) {
						$(this).addClass('close');
						$(this).removeClass('open');
					}
					else
					{
						$(this).removeClass('close');
						$(this).addClass('open');
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
				

			}
			// make it as accordion for bigger screens
		})(jQuery);
	}
	mobileMenu();

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
	filter();
}); 
// DOMContentLoaded  end






