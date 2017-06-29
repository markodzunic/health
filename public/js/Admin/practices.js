var Practices = {
    init: function() {
      Practices.Pagination();

      var sort = $('#sortby').val();
      var order = $('#orderby').val();
    },

    RefreshPractices: function(el, sort, order, resetPage) {
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
  			url: '/practices',
  			data: {
          _token: token,
  				sort: sort,
  				order: order,
  				page: page
  			},
  			success:function(result){
  				$('#practices').remove();
  				$('#pagination').remove();
          $('#table-section').append(result);

  				Practices.Pagination();
          Practices.tableAfterEdit($('#practices'), sort, order);
  			}
  		});
	},

  RefreshInfo: function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        // async: true,
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/practice_account',
        data: {
            _token: token,
        },
        success: function(result){
          // console.log(JSON.parse(result));
          // refresh grid
          $('#practice-info').html(result);
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
            Users.tableAfterEdit($('#practices'), sort, order);
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

		Practices.RefreshPractices(el, sort, order);
	},  

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#deletePractice').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var practice_id = $(el).attr('practices-id');
    var page = $(el).attr('page');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/practices/deletePractice',
        dataType: 'html',
        data: {
          error: err,
          practice_account: page,
          id: practice_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#deletePractice').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn btn-custom update-btn',
                  click: function() {
                    var form = $('#deletePractice').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/practices/deletePractice',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#deletePractice').dialog('close');
                          if ($('#practices').length > 0)
                            Practices.RefreshPractices(el, sort, order);
                          else
                            location.href='/dashboard';
                        },
                        error: function(xhr,status, response) {
                          $('#deletePractice').remove();
                          Practices.Delete(el, xhr.responseText);
                        }
                    });
                  }
                },
                // closes dialog and cancels action
                No: {
                    text: 'No',
                    class: 'btn btn-custom cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#deletePractice').remove();
              }
            });
        }
     });
  },

  Update: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updatePractice').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var practice_id = $(el).attr('practices-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/practices/updatePractice',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: practice_id,
        },
        success: function(result) {
          $('body').append(result);
          $('#updatePractice').dialog({
              width: 700,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn btn-custom update-btn',
                  click: function() {
                    var form = $('#updatePractice').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/practices/updatePractice',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#updatePractice').dialog('close');

                          if ($('#practices').length > 0) {
                              Practices.RefreshPractices(el, sort, order);
                          } else {
                              Practices.RefreshInfo();
                          }
                        },
                        error: function(xhr,status, response) {
                          console.log(xhr.responseText);
                          $('#updatePractice').remove();
                          Practices.Update(el, xhr.responseText);
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
              close: function() {
                  $(this).dialog( "close" );
                  $('#updatePractice').remove();
              }
            });
        }
     });
  }
}
