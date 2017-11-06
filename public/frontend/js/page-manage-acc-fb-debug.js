/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var MANAGE_ACC_FB = Backbone.View.extend({
        el : '#page-manage-acc-fb',

        events: {
            'submit #atl-form-file' : 'uploadFile',
        },

        initialize: function() {
        },

         /**
         * Handle upload file
         * @return void
         */
        uploadFile: function() {
            var self     = this;
            var file_data  = $('input[name=atl-upload-file]').prop('files')[0];
            var type = file_data.type;
            var match= ["text/plain","application/msword"];
            if(type == match[0] || type == match[1] || type == match[2])
            {
                //khởi tạo đối tượng form data
                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append('file', file_data);
                $.ajax({
                    url: AVTDATA.SITE_URL + '/upload-acc-fb',
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function ( res ) {    
                        var dataResult = JSON.parse( res );
                        if( dataResult.status === true ) {
                            $('.atl-message-success').text('Upload file thành công');
                        }
                    }
                });
             } else {
                $('.atl-message-danger').text('File sai định dạng');
            }
            return false;
        },

    });
    new MANAGE_ACC_FB;
    
})(jQuery);