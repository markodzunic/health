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
	},

	SelectImage: function() {
		var token = $('meta[name="csrf-token"]').attr('content');
		// App.loadAjax();
		$.ajax({
			type: "POST",
			headers: { 'X-XSRF-TOKEN' : token },
			url: '/uploadAvatar',
			data: {
				_token: token,
				image: image,
			},
			success: function(result){

			}
		});
	},

	LogoutDialog: function(el) {
		var token = $('meta[name="csrf-token"]').attr('content');
    $('#logoutDialog').hide();

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/users/logoutDialog',
        dataType: 'html',
        data: {
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#logoutDialog').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    location.href = 'logout';
                  }
                },
                // closes dialog and cancels action
                No: {
                    text: 'No',
                    class: 'btn im-btn lblue-btn cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#logoutDialog').remove();
              }
            });
        }
     });
	}
}
