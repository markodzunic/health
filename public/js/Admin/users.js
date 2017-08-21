var Users = {
    init: function() {
      Users.Pagination();

      var sort = $('#sortby').val();
      var order = $('#orderby').val();
    },

    RefreshUsers: function(el, sort, order, resetPage) {
  		var token = $('meta[name="csrf-token"]').attr('content');

  		$('#sortby').val(sort);
  		$('#orderby').val(order);

  		var page = $('#pagination').find('.active span').text();
  		if (resetPage)
  			page = 1;

  		$.ajax({
  			type: "POST",
  			headers: { 'X-XSRF-TOKEN' : token },
  			async: true,
  			url: '/users',
  			data: {
          _token: token,
  				sort: sort,
  				order: order,
  				page: page
  			},
  			success:function(result){
  				$('#users').remove();
  				$('#pagination').remove();
          $('#table-section').append(result);

  				Users.Pagination();
          Users.tableAfterEdit($('#users'), sort, order);
  			}
  		});
	},

	Pagination: function() {
		var token = $('meta[name="csrf-token"]').attr('content');
		var sort = $('#sortby').val();
		var order = $('#orderby').val();

		$('#pagination a').on('click', function(e){
			e.preventDefault();

			var url = $(this).attr('href');

			$.ajax({
				type: "POST",
				headers: { 'X-XSRF-TOKEN' : token },
				data: {
          _token: token,
        },
				url: url,
				success: function(data){
            $('#pagination').remove();
				    $('#table-section').html(data);
					  Users.Pagination();
            Users.tableAfterEdit($('#users'), sort, order);
			    }
			});
		});
	},

  /* table reset edit features
   * params: table which is reseting
   * author: marko dzunic, marko.d@scopicsoftware.com
   */
  tableAfterEdit: function (table, sort, order) {

      table.find('#' + sort + ' .sort_' + order).addClass('sort_' + order);

      order == 'desc' ? 'asc' : 'desc';

      table.find('#' + sort + ' .sort_' + order).removeClass('sort_' + order);
      table.find('#' + sort).attr('order-by', order);
  },

	sort: function(el) {
		var sort = $(el).attr('id');
		var order = $(el).attr('order-by');

		if (typeof order == 'undefined' || order == 'desc') {
			order = 'asc';
		} else {
			order = 'desc'
		}

		Users.RefreshUsers(el, sort, order);
	},

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#deleteUser').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var users_id = $(el).attr('users-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/users/deleteUser',
        dataType: 'html',
        data: {
          error: err,
          id: users_id,
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
                        url: '/users/deleteUser',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#deleteUser').dialog('close');
                          Users.RefreshUsers(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          $('#deleteUser').remove();
                          Users.Delete(el, xhr.responseText);
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

  Update: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updateUser').hide();
    var practice_id = $(el).attr('practice-id');
    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var users_id = $(el).attr('users-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/users/updateUser',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: users_id,
          practice_id: practice_id,
        },
        success: function(result) {
          $('body').append(result);

          $('#updateUser').dialog({
              width: 700,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#updateUser').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/users/updateUser',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#updateUser').dialog('close');
                          if ($('#users').length > 0)
                            Users.RefreshUsers(el, sort, order);
                          else {
                            $('#add-user').html(result);
                            if ($('#practice-stuff').length > 0) {
                                Users.RefreshPracticeStuff();
                                Users.RefreshPracticeAdmin();
                            }
                          }

                          Users.RefreshSidebar();
                        },
                        error: function(xhr,status, response) {
                          $('#updateUser').remove();
                          Users.Update(el, xhr.responseText);
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
              open: function() {
                  $('#date_of_birth').datetimepicker({ format: 'MM/DD/YYYY' });
              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#updateUser').remove();
              }
            });
        }
     });
  },

  RefreshPracticeStuff: function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/practiceStuff',
        dataType: 'html',
        data: {
          _token: token,
        },
        success: function(result) {
            $('#practice-stuff').html(result);
        }
      });
  },

  SelectAdmin: function(el) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var user_id = $(el).attr('users-id');
    var is_admin = $(el).attr('is-admin');

    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/selectAdmin',
        dataType: 'html',
        data: {
          _token: token,
          is_admin: is_admin,
          id: user_id,
        },
        success: function(result) {
          Users.RefreshPracticeStuff();
          Users.RefreshPracticeAdmin();
          $('#update-admin').remove();
        }
      });
  },

  RefreshPracticeAdmin: function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/practiceAdmin',
        dataType: 'html',
        data: {
          _token: token,
        },
        success: function(result) {
            $('#admin-staff').html(result);
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

  SendMessage: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#messageUser').hide();
    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var users_id = $(el).attr('users-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/users/messageUser',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: users_id,
        },
        success: function(result) {
          $('body').append(result);

          $('#messageUser').dialog({
              width: 700,
              title: 'Send message',
              modal: true,
              buttons: {
                Save: {
                  text: 'Send',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#messageUser').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/users/messageUser',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#messageUser').dialog('close');
                          Users.RefreshUsers(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          $('#messageUser').remove();
                          Users.SendMessage(el, xhr.responseText);
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
                  $('#messageUser').remove();
              }
            });
        }
     });
  }
}
