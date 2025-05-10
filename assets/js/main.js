document.addEventListener('DOMContentLoaded', function () {
	var hamburgerMenu = document.querySelector('.hamburger-menu');
	var headerNav = document.querySelector('.header-nav');

	hamburgerMenu.addEventListener('click', function () {
		hamburgerMenu.classList.toggle('active');
		headerNav.classList.toggle('active');
	});
});
