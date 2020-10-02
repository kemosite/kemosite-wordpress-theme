document.addEventListener("DOMContentLoaded", function() {

	var a_elements = document.querySelectorAll("a");

	if (a_elements) {
		a_elements.forEach( function(a_element) {

			if (a_element.getAttribute("aria-label") === null) {
				a_element.setAttribute("aria-label", "Read more about " + a_element.innerText);
			}
			
		});
	}

});