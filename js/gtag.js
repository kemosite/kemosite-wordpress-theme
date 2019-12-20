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
	var amazon_buttons = document.querySelectorAll("button.single_add_to_cart_button.button");

	if (amazon_links) {
		amazon_links.forEach( function(amazon_link) {
			var url = amazon_link.href;
			amazon_link.setAttribute("onclick", "getAmazonLink('" + url + "'); return false;");
		});
	}

	if (amazon_buttons) {
		amazon_buttons.forEach( function(amazon_button) {
			var url = amazon_button.form.action;
			amazon_button.setAttribute("onclick", "getAmazonLink('" + url + "'); return true;");
		});
	}

}