var Billing = {
	init: function() {

	},

	Update: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#updateBilling').hide();

    var blog_id = $(el).attr('billing-id');

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/billing/updateBilling',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
          id: blog_id,
        },
        success: function(result) {
          $('body').append(result);
          $('#updateBilling').dialog({
              width: 800,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#updateBilling').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/billing/updateBilling',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#updateBilling').dialog('close');

                          $('#billing-address').html(result);
                        },
                        error: function(xhr,status, response) {
                          // console.log(xhr.responseText);
                          $('#updateBilling').remove();
                          Billing.Update(el, xhr.responseText);
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
                  $('#updateBilling').remove();
              },
              open: function() {

              }
            });
        }
     });
  }

}
