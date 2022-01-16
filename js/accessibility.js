document.addEventListener("DOMContentLoaded", function() {

	var a_elements = document.querySelectorAll("a");

	if (a_elements) {
		a_elements.forEach( function(a_element) {

			if (a_element.getAttribute("aria-label") === null) {
				a_element.setAttribute("aria-label", "Get more information about " + a_element.innerText);
			}

			if (a_element.getAttribute("tabindex") === null) {
				a_element.setAttribute("tabindex", "0");
			}
			
		});
	}

});