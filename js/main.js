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

}); 
// DOMContentLoaded  end
