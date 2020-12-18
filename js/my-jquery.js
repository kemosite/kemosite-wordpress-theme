document.addEventListener("DOMContentLoaded", function() {

	$("a").click( function (event) {
        
        event.preventDefault();
        var url = $(this).attr("href");
		var offset = $(this).offset();

	    if (url) {

			if (url.substr(0,1) == "#") {

		        $('html, body').animate({
				    scrollTop: offset.top,
				});		        
		        
			} else {

				$(".off-canvas-wrapper").fadeOut("fast").css("display: none");
				document.location.href=url;
				
			}
		}
        
    });

    $(".off-canvas-wrapper").fadeIn().css("display: block");

});

/*
window.onload = function() {
	$(".off-canvas-wrapper").fadeIn().css("display: block");
};
*/