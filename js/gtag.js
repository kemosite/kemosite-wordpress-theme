/**
* ver: 20191216
* Function that registers a click on an outbound link in Analytics.
* This function takes a valid URL string as an argument, and uses that URL string
* as the event label. Setting the transport method to 'beacon' lets the hit be sent
* using 'navigator.sendBeacon' in browser that support it.
*/

if (gtag && typeof gtag === 'function') {
	
	var getAmazonLink = function(url) {
	  gtag('event', 'click', {
	    'event_category': 'button-product_type_external',
	    'event_label': url,
	    'transport_type': 'beacon',
	    'event_callback': function() { document.location = url; }
	  });
	}

	var amazon_links = document.querySelectorAll("a.button.product_type_external");

	if (amazon_links) {
		amazon_links.forEach( function(amazon_link) {
			var url = amazon_link.href;
			amazon_link.setAttribute("onfocus", "getAmazonLink('" + url + "'); return false;");
		});
	}

	// console.log(amazon_links);

}