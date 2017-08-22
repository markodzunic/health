var Messages = {
    init: function() {
      $('.im-toggle-menu-item').click(function(e) {
          e.preventDefault();
          Messages.Read(this);
          var item = $(this).next();

          if (!item.hasClass('im-active')) {
            item.parent().parent().find('.im-toggle-content').hide('fast');
            item.parent().parent().find('.im-toggle-content').removeClass('im-active');
            item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');
            item.parent().parent().find('.im-toggle-menu-item').removeClass('not-read');
            item.parent().parent().find('.im-toggle-menu-item').addClass('read');

            $(this).addClass('bg-lblue im-open');
            item.addClass('im-active')
            item.toggle('fast');
          } else {
            item.parent().parent().find('.im-toggle-content').hide('fast');
            item.parent().parent().find('.im-toggle-content').removeClass('im-active');
            item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');
          }
      });
    },

    RefreshMessages: function(el) {
  		var token = $('meta[name="csrf-token"]').attr('content');

  		$.ajax({
  			type: "POST",
  			headers: { 'X-XSRF-TOKEN' : token },
  			async: true,
  			url: '/messages',
  			data: {
          _token: token,
  			},
  			success:function(result){
  				$('#messages').remove();
          $('#table-section').append(result);

          $('.im-toggle-menu-item').click(function(e) {
              e.preventDefault();
              Messages.Read(this);
              var item = $(this).next();

              if (!item.hasClass('im-active')) {
                item.parent().parent().find('.im-toggle-content').hide('fast');
                item.parent().parent().find('.im-toggle-content').removeClass('im-active');
                item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');

                $(this).addClass('bg-lblue im-open');
                item.addClass('im-active')
                item.toggle('fast');
              } else {
                item.parent().parent().find('.im-toggle-content').hide('fast');
                item.parent().parent().find('.im-toggle-content').removeClass('im-active');
                item.parent().parent().find('.im-toggle-content').removeClass('not-read');
                item.parent().parent().find('.im-toggle-content').addClass('read');
                item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');
              }
          });

  			}
  		});
    },

    Read: function(el) {
      var token = $('meta[name="csrf-token"]').attr('content');

      var messages_id = $(el).attr('messages-id');

      $.ajax({
          type: "POST",
          headers: { 'X-XSRF-TOKEN' : token },
          url: '/messages/readMessage',
          dataType: 'html',
          data: {
            _token: token,
            id: messages_id,
          },
          success: function(result) {
              $(el).find('#'+ messages_id).removeClass('not-read').addClass('read');
          }
       });
    },

    Delete: function(el) {
      var token = $('meta[name="csrf-token"]').attr('content');
      $('#deleteMessagesN').hide();

      var users_id = $(el).attr('messages-id');

      $.ajax({
          type: "POST",
          headers: { 'X-XSRF-TOKEN' : token },
          url: '/messages/deleteMessage',
          dataType: 'html',
          data: {
            _token: token,
            id: users_id,
          },
          success: function(result) {
              Messages.RefreshMessages(el);
          }
       });
    }
}
