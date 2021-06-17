import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import dropdown from "../part/dropdown";
import search from "../part/search";
import postFilter from "../part/postFilter";
import share from "../part/share";

export default {
	init() {
		// JavaScript to be fired on all pages

		// kick off the polyfill!
		smoothscroll.polyfill();

		// Hamburger event listener
		hamburger();

		// Dropdown
		dropdown();

		// Search 
		search();

		// Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
		const observer = lozad();
		observer.observe();	

		const catMenu = document.getElementById('categoryMenu');
		if (typeof(catMenu ) != 'undefined' && catMenu  != null)
		{
			postFilter();
		}

		const shareSection = document.getElementById('share');
		if (typeof(shareSection ) != 'undefined' && shareSection  != null)
		{
			share();
		}

	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
