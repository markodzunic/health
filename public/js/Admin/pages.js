var Pages = {
    init: function() {
      Pages.Pagination();

      var sort = $('#sortby').val();
      var order = $('#orderby').val();
    },

    RefreshPages: function(el, sort, order, resetPage) {
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
  			url: '/pages',
  			data: {
          _token: token,
  				sort: sort,
  				order: order,
  				page: page
  			},
  			success:function(result){
  				$('#pages').remove();
  				$('#pagination').remove();
          $('#table-section').append(result);

  				Pages.Pagination();
          Pages.tableAfterEdit($('#pages'), sort, order);
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
					  Pages.Pagination();
            Pages.tableAfterEdit($('#pages'), sort, order);
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

		Pages.RefreshPages(el, sort, order);
	},

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#deletePage').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var blog_id = $(el).attr('pages-id');
    var page = $(el).attr('page');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/pages/deletePage',
        dataType: 'html',
        data: {
          error: err,
          practice_account: page,
          id: blog_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#deletePage').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#deletePage').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/pages/deletePage',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#deletePage').dialog('close');
                          Pages.RefreshPages(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          $('#deletePage').remove();
                          Pages.Delete(el, xhr.responseText);
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
                  $('#deletePage').remove();
              }
            });
        }
     });
  },


  Update: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updatePage').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var blog_id = $(el).attr('pages-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/pages/updatePage',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: blog_id,
        },
        success: function(result) {
          $('body').append(result);
          $('#updatePage').dialog({
              width: 700,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#updatePage').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/pages/updatePage',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#updatePage').dialog('close');

                          Pages.RefreshPages(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          // console.log(xhr.responseText);
                          $('#updatePage').remove();
                          Pages.Update(el, xhr.responseText);
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
                  $('#updatePage').remove();
              },
              open: function() {
                $('#description').froalaEditor({
                   fullPage: true,
                   theme: 'red',
                   linkList: [
                   {
                     text: 'asd',
                     href: 'https://froala.com',
                     target: '_blank'
                   },
                   {
                     text: 'dsa',
                     href: 'https://google.com',
                     target: '_blank'
                   },
                   {
                     text: 'asda',
                     href: 'https://facebook.com'
                   }
                 ]
                 })
              }
            });
        }
     });
  }
}
