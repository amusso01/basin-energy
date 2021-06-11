export default function hamburger() {
	const burger = document.getElementById("hamburger");
	const mainMenu = document.querySelector(".site-header__menu");
	const htmlElement = document.querySelector("html");
	const form = document.getElementById('fdSearchContainer');

	burger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("active");
		burger.classList.toggle("is-active");
		form.classList.toggle('search-active');
		
		// prevent content scrolling
		htmlElement.classList.toggle("noscroll");
	});
}
