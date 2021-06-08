window.addEventListener("DOMContentLoaded", function() {

	$("a").click( function (event) {
        
      event.preventDefault();
      var url = $(this).attr("href");
		var offset = $(this).offset();

	   if (url) {

			if (url.substr(0,1) == "#") {
				$('html, body').animate({ scrollTop: offset.top });		          
			} else { 
				document.location.href=url;
			}

		}
        
    });

});