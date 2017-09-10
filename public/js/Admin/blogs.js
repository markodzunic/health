var Blogs = {
    init: function() {
      Blogs.Pagination();

      var sort = $('#sortby').val();
      var order = $('#orderby').val();
    },

    RefreshBlogs: function(el, sort, order, resetPage) {
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
  			url: '/blogs',
  			data: {
          _token: token,
  				sort: sort,
  				order: order,
  				page: page
  			},
  			success:function(result){
  				$('#blogs').remove();
  				$('#pagination').remove();
          $('#table-section').append(result);

  				Blogs.Pagination();
          Blogs.tableAfterEdit($('#blogs'), sort, order);
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
					  Blogs.Pagination();
            Blogs.tableAfterEdit($('#blogs'), sort, order);
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

		Blogs.RefreshBlogs(el, sort, order);
	},

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');

    $('#deleteBlog').hide();
    var blog_id = $(el).attr('blogs-id');
    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    
    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/blogs/deleteBlog',
        dataType: 'html',
        data: {
          error: err,
          id: blog_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#deleteBlog').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#deleteBlog').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/blogs/deleteBlog',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#deleteBlog').dialog('close');
                            Blogs.RefreshBlogs(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          $('#deleteBlog').remove();
                          Blogs.Delete(el, xhr.responseText);
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
                  $('#deleteBlog').remove();
              }
            });
        }
     });
  },


  Update: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updateBlog').hide();

    var sort = $('#sortby').val();
		var order = $('#orderby').val();
    var blog_id = $(el).attr('blogs-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/blogs/updateBlog',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: blog_id,
        },
        success: function(result) {
          $('body').append(result);
          $('#updateBlog').dialog({
              width: 1920,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#updateBlog').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/blogs/updateBlog',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#updateBlog').dialog('close');

                          Blogs.RefreshBlogs(el, sort, order);
                        },
                        error: function(xhr,status, response) {
                          console.log(xhr.responseText);
                          $('#updateBlog').remove();
                          Blogs.Update(el, xhr.responseText);
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
                  $('#updateBlog').remove();
              },
              open: function() {
                 $('#edit').froalaEditor({
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

          $('#updateBlog').parent().attr('id', 'update-blog');
        }
     });
  },

  BlogCategory: function(el) {
    var token = $('meta[name="csrf-token"]').attr('content');

    var cat_id = $(el).attr('category-id');

    $.ajax({
      type: "POST",
      headers: { 'X-XSRF-TOKEN' : token },
      async: true,
      url: '/blogCategory',
      data: {
        _token: token,
        cat_id: cat_id,
      },
      success:function(result){

      }
    });
  },

  CreateCategory: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updateCategory').hide();

    var blog_id = $(el).attr('blogs-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/blogs/updateCategory',
        dataType: 'html',
        data: {
          error: err,
          id: blog_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#updateCategory').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#updateCategory').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/blogs/updateCategory',
                        data: data,
                        success:function(result){
                          // refresh grid
                          $('#updateCategory').dialog('close');
                          var blog_id = $(el).attr('blogs-id');

                          $.ajax({
                              type: "POST",
                              // async: true,
                              headers: { 'X-XSRF-TOKEN' : token },
                              url: '/blogs/updateCatBlog',
                              data: data,
                              success:function(result){
                                  $('#cat-update').html(result);
                              }
                          });
                        },
                        error: function(xhr,status, response) {
                          $('#updateCategory').remove();
                          Blogs.CreateCategory(el, xhr.responseText);
                        }
                    });
                  }
                },
                // closes dialog and cancels action
                No: {
                    text: 'Cancel',
                    class: 'btn im-btn lblue-btn cancel-btn',
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }
              },
              close: function() {
                  $(this).dialog( "close" );
                  $('#updateCategory').remove();
              }
            });
        }
     });
  },
}
