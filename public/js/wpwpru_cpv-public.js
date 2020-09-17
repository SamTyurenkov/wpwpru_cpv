window.onload = function() {

		var nonce = wpwpru_cpv_ajax_object.nonce;
		var ajax_url = wpwpru_cpv_ajax_object.ajax_url;
		var postid = wpwpru_cpv_ajax_object.postid;

		var pageview = jQuery.ajax({
				type: 'POST',
				url: ajax_url,
				cache: false,
				data:{
				id: postid,
				nonce: nonce,
				action: 'wpwpru_cpv_pageviewer',
				},
				success: function(data, textStatus, jqXHR) {	
					console.log('data ' + data + ' ' + textStatus + ' '+ jqXHR);
					},
				error: function(jqXHR, textStatus, errorThrown){ 	
					console.log('data ' + data + ' ' + textStatus + ' '+ errorThrown);
					}
			});

}
