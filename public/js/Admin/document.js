var Document = {
	init: function() {
		Document.Pagination();

      var sort = $('#sortby').val();
      var order = $('#orderby').val();
	},	

  RefreshDocuments: function(el, sort, order, resetPage) {
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
        url: '/documents',
        data: {
          _token: token,
          sort: sort,
          order: order,
          page: page
        },
        success:function(result){
          $('#documents').remove();
          $('#pagination').remove();
          $('#table-section').append(result);

          Document.Pagination();
          Document.tableAfterEdit($('#documents'), sort, order);
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
            Document.Pagination();
            Document.tableAfterEdit($('#documents'), sort, order);
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

    Document.RefreshDocuments(el, sort, order);
  },

	UploadDocument: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#uploadDocument').hide(); 

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/documents/uploadDocument',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#uploadDocument').dialog({
              width: 700,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#uploadDocument').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/documents/uploadDocument',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#uploadDocument').dialog('close');
                          Document.RefreshDocuments(el);
                        },
                        error: function(xhr,status, response) {
                          $('#uploadDocument').remove();
                          Document.UploadDocument(el, xhr.responseText);
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
                  $('#uploadDocument').remove();
              }
            });
        }
     });
  },

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');

    $('#deleteDocument').hide();
    var images_id = $(el).attr('documents-id');
    
    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/documents/deleteDocument',
        dataType: 'html',
        data: {
          error: err,
          id: images_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#deleteDocument').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#deleteDocument').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/documents/deleteDocument',
                        data: data,
                        success:function(result){
                          // refresh grid
                          	$('#deleteDocument').dialog('close');
                        	Document.RefreshDocuments(el);
                        },
                        error: function(xhr,status, response) {
                          $('#deleteDocument').remove();
                          Document.Delete(el, xhr.responseText);
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
                  $('#deleteDocument').remove();
              }
            });
        }
     });
  },
}