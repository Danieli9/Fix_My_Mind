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


function initMobileMenu() {
	(function($) {

		// Toggle the mobile menu hamburger and add class
		$(".navbar-toggler").click( function(event) {
			event.preventDefault();
			
			$(".navbar-collapse").slideToggle();
			$(this).toggleClass('is-active');
			$(".navbar").toggleClass('is-active');
	
			if ( $(this).hasClass('is-active') ) {
				$(this).addClass('open');
			}
			else
				{
					$(this).removeClass('open');
					$('.nav-link').removeClass('show');
					$('.dropdown-menu').removeClass('active');
					$('.dropdown-menu .menu-item').removeClass('borders');

				}
		});

		$(".have_dropdown > a").on('click touchend', function(event){
			event.preventDefault();

			var parent = $(this).closest('li');

			var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders
			var pOffset = $(this).offset(); 
			var x = event.pageX - pOffset.left;
			 
			if(pWidth/1.2 > x) {
				// silenc is golden
			} else {
				$(parent).find('> .dropdown-menu').removeClass('active');
				// $(parent).removeClass('borders');
				// $(this).parent('li').removeClass('borders');
			}	


			if ( ! $(parent).find('> .dropdown-menu').hasClass('active') ) {

				// hasn't been clicked yet — open
				$(parent).find('> .dropdown-menu').addClass('active');
				$(parent).addClass('borders');
				
			} else {
				// has already been expanded — redirect to href
				window.location = this.href;
				
			}

			if(pWidth/1.2 > x) {
				// silenc is golden
			} else {
				$(parent).find('> .dropdown-menu').removeClass('active');
				
				if($(parent).hasClass('borders')) {
					$(parent).removeClass('borders');
				} else {
					$(parent).addClass('borders');
				}
			}	
		
		});
			
	})(jQuery);

	(function($) {

		// Reverse
		// =============================================
		$.fn.reverse = [].reverse;
	  
		// jQuery Extended Family Selectors
		// =============================================
		$.fn.cousins = function(filter) {
		  return $(this).parent().siblings().children(filter);
		};
	  
		$.fn.piblings = function(filter) {
		  return $(this).parent().siblings(filter);
		};
	  
		$.fn.niblings = function(filter) {
		  return $(this).siblings().children(filter);
		};
	  
		// Update
		// =============================================
		$.fn.update = function() {
		  return $(this);
		};
	  
		// Dropdown
		// =============================================
		$.fn.dropdown = function(options) {
	  
		  // Store object
		  var $this = $(this);
	  
		  // Settings
		  var settings = $.extend({
			className : 'show',
		  }, options);
	  
		  // Simplify variable names
		  var className = settings.className;
	  
		  // List selectors
		  var $ul = $this.find('ul'),
			  $li = $this.find('li'),
			  $a  = $this.find('a');
	  
		  // Menu selectors
		  var $drawers = $a.next($ul),      // All unordered lists after anchors are drawers
			  $buttons = $drawers.prev($a), // All anchors previous to drawers are buttons
			  $links   = $a.not($buttons);  // All anchors that are not buttons are links
	  
		  // Toggle menu on-click
		  $buttons.on('click touchend', function() {
			var $button = $(this),
				$drawer = $button.next($drawers),
				$piblingDrawers = $button.piblings($drawers);
	  
			// Toggle button and drawer
			$button.toggleClass(className);
			$drawer.toggleClass(className);
	  
			// Reset children
			$drawer.find($buttons).removeClass(className);
			$drawer.find($drawers).removeClass(className);
			$drawer.find($drawers).removeClass('borders');
	  
			// Reset cousins
			$piblingDrawers.find($buttons).removeClass(className);
			$piblingDrawers.find($drawers).removeClass(className);
			$piblingDrawers.find($drawers).removeClass('active');
			$piblingDrawers.find($drawers).removeClass('borders');
			$('.dropdown-menu .menu-item').removeClass('borders');
	  
			// Animate height auto
			$drawers.update().reverse().each(function() {
			  var $drawer = $(this);
			  if($drawer.hasClass(className)) {
				var $clone = $drawer.clone().css('display', 'none').appendTo($drawer.parent()),
					height = $clone.css('height', 'auto').height() + 'px';
				$clone.remove();
				// $drawer.css('height', '').css('height', height);
			  }
			  else {
				$drawer;
			  }
			});
		  });
	  
		  // Close menu
		  function closeMenu() {
			$buttons.removeClass(className);
			$drawers.removeClass(className);
			$drawers.removeClass('borders');
			$('.dropdown-menu .menu-item').removeClass('borders');
		  }
	  
		  // Close menu after link is clicked
		  $links.click(function() {
			closeMenu();
		  });
	  
		  // Close menu when off-click and focus-in
		  $(document).on('click focusin', function(event) {
			if(!$(event.target).closest($buttons.parent()).length) {
			  closeMenu();
			}
		  });
		};
	})(jQuery);
	  
	$('#navbarNavDropdown').dropdown();
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
			768: {
			spaceBetween: 30,	
			slidesPerView: 2,
			spaceBetween: 40
			},
			1200: {
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
			$(".icon").addClass('is-active');
			document.getElementById("play-bar").play()
		});
	})(jQuery);
}

function initDesktopMenu() {
	// navmenu
	document.querySelectorAll('.nav-item').forEach(function(everyitem){
		everyitem.addEventListener('mouseover', function(e){
			
			let el_link = this.querySelector('.dropdown-menu');
			let el_link_anchor = this.querySelector('.nav-link');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.add('show');
				el_link_anchor.classList.add('show');
			}

		});
		everyitem.addEventListener('mouseleave', function(e){
			let el_link = this.querySelector('.dropdown-menu');
			let el_link_anchor = this.querySelector('.nav-link');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.remove('show');
				el_link_anchor.classList.remove('show');
				// el_link_anchor_next.classList.remove('show');
			}

		})
	});

	
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


// POPUP
// Handle opening the popup
var randomSelector = Math.floor((Math.random() * 10) + 1);

if (randomSelector > 5) {

	setTimeout(function() {
		var modal_id = $('.js-modal').attr("id");
		if ( Cookies.get(modal_id) === undefined ) {
			$('.js-modal').addClass('is-active');

			window.dataLayer = window.dataLayer || [];
			window.dataLayer.push({
				'event':'popup'
			});
		}
	}, 45 * 1000);
}

// Closing the Popup Box
$('.js-modal-close').click(function(e){
	e.preventDefault();
	$(this).closest(".js-modal").fadeOut();
	var modal_id = $(this).closest(".js-modal").attr('id');
	Cookies.set(modal_id, true);
});