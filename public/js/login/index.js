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
									text: 'Sign In',
									class: 'im-btn lblue-btn update-btn im-left',
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
										class: 'im-btn cancel-btn im-hide',
										click: function() {
												$(this).dialog( "close" );
										}
								},

								reg: {
										text: 'Website registration',
										class: 'im-btn flat-btn im-lblue im-left',
										click: function() {
											location.href = "/register";
										}
								},

								forgot: {
										text: 'Forgotten Password?',
										class: 'im-btn flat-btn im-right',
										click: function() {
											location.href = "/password/reset";
										}
								},

								
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
