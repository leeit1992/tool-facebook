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
            'click .avt-auto-add-acc-js' : 'autoAccFb',
        },

        errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
                                        <a class="uk-close"></a>\
                                        <div>\
                                           <%= message %>\
                                        </div>\
                                    </div>'),

        initialize: function() {
        },

         /**
         * Handle upload file
         * @return void
         */
        uploadFile: function() {
            var self = this;
            var file_data  = $('input[name=atl-upload-file]').prop('files')[0];
            var type = file_data.type;
            var match= ["text/plain","application/msword"];
            if(type == match[0] || type == match[1])
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
                            var output = self.errorFormTpl( {message : 'Upload file thành công', classes: 'uk-notify-message-success'} );
                            $('.atl-notify-js', self.el).html( output ).show();
                            setTimeout( function(){
                                $('.atl-notify-js', self.el).fadeOut();
                            },3000 );
                            $('.avt-btn-auto', self.el).show();
                        }
                    }
                });
            } else {
                var output = self.errorFormTpl( {message : 'File sai định dạng', classes: 'uk-notify-message-danger'} );
                $('.atl-notify-js', self.el).html( output ).show();
                setTimeout( function(){
                    $('.atl-notify-js', self.el).fadeOut();
                },3000 );
            }
            return false;
        },

        autoAccFb: function() {
            var self = this,
                data = { abc : '123'};
            $.ajax({
                url: AVTDATA.SITE_URL + '/auto-acc-fb',
                type: "POST",
                data: data,
                success: function ( res ) {    
                    var dataResult = JSON.parse( res );
                    if( dataResult.status === true ) {
                        var output = self.errorFormTpl( {message : 'Upload file thành công', classes: 'uk-notify-message-success'} );
                        $('.atl-notify-js', self.el).html( output ).show();
                        setTimeout( function(){
                            $('.atl-notify-js', self.el).fadeOut();
                        },3000 );
                        $('.avt-btn-auto', self.el).show();
                    } else {
                        var output = self.errorFormTpl( {message : 'Có lỗi xảy ra', classes: 'uk-notify-message-danger'} );
                        $('.atl-notify-js', self.el).html( output ).show();
                        setTimeout( function(){
                            $('.atl-notify-js', self.el).fadeOut();
                        },3000 );
                    }
                }
            });
        },
    });
    new MANAGE_ACC_FB;
    
})(jQuery);