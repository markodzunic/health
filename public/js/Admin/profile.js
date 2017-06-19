var Profile = {
  init: function() {

  },

  OpenProfile: function(err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#editUserInfo').hide();

    $.ajax({
				type: "GET",
				headers: { 'X-XSRF-TOKEN' : token },
				url: '/updateUser',
				dataType: 'html',
				data: {
          error: err,
          _token: token,
        },
				success: function(result) {
          $('body').append(result);
          $('#editUserInfo').dialog({
              width: 700,
              modal: true,
              buttons: {
                Update: {
                  text: 'Update',
                  class: 'btn btn-custom update-btn',
                  click: function() {
                    var form = $('#editUserInfo').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/updateUser',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#editUserInfo').dialog('close');
                          Profile.RefreshInfo();
                        },
                        error: function(xhr,status, response) {
                          $('#editUserInfo').remove();
                          Profile.OpenProfile(xhr.responseText);
                        }
                    });
                  }
                },
                // closes dialog and cancels action
                Cancel: {
                    text: 'Cancel',
                    class: 'btn btn-custom cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              // on initialization open add config
              open: function() {

              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#editUserInfo').remove();
              }
            });
        }
     });
  },

  RefreshInfo: function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        // async: true,
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/user_account',
        data: {
            _token: token,
        },
        success: function(result){
          // console.log(JSON.parse(result));
          // refresh grid
          $('#personal-info').html(result);
        }
    });
  }
}
