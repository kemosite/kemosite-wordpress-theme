document.addEventListener("DOMContentLoaded", function() {

	var a_elements = document.querySelectorAll("a");

	if (a_elements) {
		a_elements.forEach( function(a_element) {

			if (a_element.getAttribute("aria-label") === null && a_element.getAttribute("aria-labelledby") === null) {
				a_element.setAttribute("aria-labelledby", a_element.innerText);
			}
			
		});
	}

});