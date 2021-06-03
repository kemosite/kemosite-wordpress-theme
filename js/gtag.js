/**
* ver: 20210515
* Function that registers a click on an outbound link in Analytics.
* This function takes a valid URL string as an argument, and uses that URL string
* as the event label. Setting the transport method to 'beacon' lets the hit be sent
* using 'navigator.sendBeacon' in browser that support it.
*/

if (gtag === undefined ) { var gtag = null; } else {

	if (gtag !== null && typeof gtag === 'function') {
	
		var captureExternalLink = function(url) {
		  gtag('event', 'click', {
		    'event_category': 'button-product_type_external',
		    'event_label': url,
		    'transport_type': 'beacon',
		    'event_callback': function() { document.location = url; }
		  });
		}

		var external_button_links = document.querySelectorAll("a.button.product_type_external");
		var add_to_cart_buttons = document.querySelectorAll("button.single_add_to_cart_button.button");
		var tracking_block_buttons = document.querySelectorAll("a.wp-block-button__link.gtag");

		if (external_button_links) {
			external_button_links.forEach( function(external_link) {
				var url = external_link.href;
				external_link.setAttribute("onclick", "captureExternalLink('" + url + "'); return false;");
			});
		}

		if (add_to_cart_buttons) {
			add_to_cart_buttons.forEach( function(add_to_cart_button) {
				var url = add_to_cart_button.form.action;
				add_to_cart_button.setAttribute("onclick", "captureExternalLink('" + url + "'); return true;");
			});
		}

		if (tracking_block_buttons) {
			tracking_block_buttons.forEach( function(button_link) {
				var url = button_link.href;
				button_link.setAttribute("onclick", "captureExternalLink('" + url + "'); return false;");
			});
		}

	}

}