var Media = {
	init: function() {
		$('#close').on('click', function(){
			$(this).parent().parent().removeClass('active');
		});
	},

	RefreshImages: function(el) {
  		var token = $('meta[name="csrf-token"]').attr('content');

  		$.ajax({
  			type: "POST",
  			headers: { 'X-XSRF-TOKEN' : token },
  			async: true,
  			url: '/images',
  			data: {
          _token: token,
  			},
  			success:function(result){
  				$('#img-prev').remove();
          		$('#table-section').append(result);
  			}
  		});
	},

	View: function(el) {
		$('#image-preview').addClass('active');
		$('#image-preview img').attr('src', $(el).attr('image'));
	},	

	UploadImage: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#uploadImage').hide(); 

    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/images/uploadImage',
        dataType: 'html',
        data: {
          error: err,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#uploadImage').dialog({
              width: 700,
              modal: true,
              buttons: {
                Save: {
                  text: 'Save',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#uploadImage').find('form');

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/images/uploadImage',
                        data: new FormData(form[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(result){
                          // refresh grid
                          $('#uploadImage').dialog('close');
                          Media.RefreshImages(el);
                        },
                        error: function(xhr,status, response) {
                          $('#uploadImage').remove();
                          Media.UploadImage(el, xhr.responseText);
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
                  $('#uploadImage').remove();
              }
            });
        }
     });
  },

  Delete: function(el, err) {
    var token = $('meta[name="csrf-token"]').attr('content');

    $('#deleteImage').hide();
    var images_id = $(el).attr('images-id');
    
    $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : token },
        url: '/images/deleteImage',
        dataType: 'html',
        data: {
          error: err,
          id: images_id,
          _token: token,
        },
        success: function(result) {
          $('body').append(result);
          $('#deleteImage').dialog({
              width: 700,
              modal: true,
              buttons: {
                Yes: {
                  text: 'Yes',
                  class: 'btn im-btn lblue-btn update-btn',
                  click: function() {
                    var form = $('#deleteImage').find('form');
                    var data = form.serialize();

                    $.ajax({
                        type: "POST",
                        // async: true,
                        headers: { 'X-XSRF-TOKEN' : token },
                        url: '/images/deleteImage',
                        data: data,
                        success:function(result){
                          // refresh grid
                          	$('#deleteImage').dialog('close');
                        	Media.RefreshImages(el);
                        },
                        error: function(xhr,status, response) {
                          $('#deleteImage').remove();
                          Media.Delete(el, xhr.responseText);
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
                  $('#deleteImage').remove();
              }
            });
        }
     });
  },
}