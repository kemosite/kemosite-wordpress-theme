window.addEventListener("DOMContentLoaded", function() {

    // FIND ALL THE LINKS
    document.querySelectorAll("a").forEach( function(link) {

    	// Add a listener to all links
		link.addEventListener("click", function(event) {

			// Prevent default behaviour -- namely clicking
			event.preventDefault();

			// Get link properties.
			if ( link.getAttribute("href") ) { var url = link.getAttribute("href"); }

			// Take action is a URL is defined
			if (url) {
				
				// Look for local link
				if (url.substr(0,1) == "#") {
					var local_link = document.querySelector("a[name='"+url.substr(1)+"']");
					console.log(local_link);
					window.scrollTo({
					  top: local_link.offsetTop,
					  behavior: 'smooth'
					});

				// link away
				} else { 
					document.location.href=url;
				}

			}

		});
    });

});