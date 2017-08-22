var Profile = {
  init: function() {

  },

  DeleteDialog: function(err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#deleteUser').hide();

    $.ajax({
				type: "GET",
				headers: { 'X-XSRF-TOKEN' : token },
				url: '/deleteUser',
				dataType: 'html',
				data: {
          error: err,
          _token: token,
        },
				success: function(result) {
          $('body').append(result);
          $('#deleteUser').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#deleteUser').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/deleteUser',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#deleteUser').dialog('close');
                        },
                        error: function(xhr,status, response) {
                          $('#deleteUser').remove();
                          Profile.DeleteDialog(xhr.responseText);
                        }
                    });
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
                  $('#deleteUser').remove();
              }
            });
        }
     });
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
                  class: 'btn im-btn lblue-btn update-btn',
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
                          Profile.RefreshSidebar();
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
                    class: 'btn im-btn lblue-btn cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              // on initialization open add config
              open: function() {
                  $('#date_of_birth').datetimepicker({ format: 'MM/DD/YYYY' });

                  $('#med-reg').hide();


                  if ($('#editUserInfo').find('#role_id').val() == 7 || $('#editUserInfo').find('#role_id').val() == 2)
                    $('#med-reg').show();
                  else {
                    $('#editUserInfo').find('#med-reg input').val('0');
                  }

                  $('#editUserInfo').find('#role_id').change(function(){
                      if (this.value == 2 || this.value == 7) {
                        $('#med-reg').show();
                      } else {
                        $('#editUserInfo').find('#med-reg input').val('0');
                        $('#med-reg').hide();
                      }
                  });

              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#editUserInfo').remove();
              }
            });
        }
     });
  },

  RefreshSidebar: function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/getUserInfo',
        dataType: 'html',
        data: {
          _token: token,
        },
        success: function(result) {
            $('#info-inside').html(result);
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
  },

  UpdatePassword: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#editPassword').hide();

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/updatePassword',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#editPassword').dialog({
              width: 700,
              modal: true,
              buttons: {
                Update: {
                  text: 'Update',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#editPassword').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/updatePassword',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#editPassword').dialog('close');

                          if (result) {
                            console.log(result);
                            $('#editPassword').remove();
                            Profile.UpdatePassword([], result);
                          }
                        },
                        error: function(xhr,status, response) {
                          $('#editPassword').remove();
                          Profile.UpdatePassword([], xhr.responseText);
                        }
                    });
                  }
                },
                // closes dialog and cancels action
                Cancel: {
                    text: 'Cancel',
                    class: 'btn im-btn lblue-btn cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#editPassword').remove();
              }
            });
        }
     });
  }
}
