var Login = {

	init: function() {

	},

	LoginSubmit: function(el) {
		var token = $('#token').val();

		// App.loadAjax();
		$.ajax({
			type: "POST",
			headers: { 'X-XSRF-TOKEN' : token },
			async: true,
			url: '/login',
			data: {
				username: username,
				password: password,
			},
			success:function(result){
				// App.loadAjax('unmask');
			}			
		});
	}
}