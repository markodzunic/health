var Login = {

	init: function() {

	},

	Login: function(el, err) {
		var token = $('meta[name="csrf-token"]').attr('content');
		$('#login').hide();

		$.ajax({
				type: "GET",
				headers: { 'X-XSRF-TOKEN' : token },
				url: '/login/getLogin',
				dataType: 'html',
				data: {
					errors: err,
					_token: token,
				},
				success: function(result) {
					$('body').append(result);
					$('#login').dialog({
							width: 700,
							modal: true,
							buttons: {
								Yes: {
									text: 'Login',
									class: 'btn btn-custom update-btn',
									click: function() {
										var form = $('#login').find('form');
										var data = form.serialize();

										$.ajax({
												type: "POST",
												// async: true,
												headers: { 'X-XSRF-TOKEN' : token },
												url: '/login',
												data: data,
												success:function(result){
													// refresh grid
													$('#login').dialog('close');
													location.href = "/dashboard";
												},
												error: function(xhr,status, response) {
													console.log(xhr.responseText);
													$('#login').remove();
													Login.Login(el, xhr.responseText);
												}
										});
									}
								},
								// closes dialog and cancels action
								No: {
										text: 'Cancel',
										class: 'btn btn-custom cancel-btn',
										click: function() {
												$(this).dialog( "close" );
										}
								}
							},
							close: function() {
									$(this).dialog( "close" );
									$('#login').remove();
							}
						});
				}
		 });
	 }
}
