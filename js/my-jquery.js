document.addEventListener("DOMContentLoaded", function() {

	$("a").click( function (event) {
        
        event.preventDefault();
        var url = $(this).attr("href");

	    if (url) {
			if (url.substr(0,1) == "#") {
				
				/*
				$('html, body').animate({
		            scrollTop: $(url).offset().top,
		        }, 1500);
		        */
		        
			} else {
				$(".off-canvas-wrapper").fadeOut("fast").css("display: none");
				document.location.href=url;
			}
		}
        
    });

});

window.onload = function() {
	$(".off-canvas-wrapper").fadeIn().css("display: block");
};