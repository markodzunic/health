var App = {
	init: function() {

	},

	Logout: function() {
		var token = $('meta[name="csrf-token"]').attr('content');

		// App.loadAjax();
		$.ajax({
			type: "POST",
			headers: { 'X-XSRF-TOKEN' : token },
			url: '/logout',
			data: {
				_token: token
			},
			success: function(result){
				location.href = '/login';
			}			
		});
	}
}