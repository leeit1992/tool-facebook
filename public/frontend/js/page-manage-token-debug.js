/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var MANAGE_TOKEN = Backbone.View.extend({
        el : '#page-manage-token',

        events: {
            'click .avt-action-filter' : 'filterToken',
            'submit #atl-form-file' : 'uploadFile',
        },
        errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
                                        <a class="uk-close"></a>\
                                        <div>\
                                           <%= message %>\
                                        </div>\
                                    </div>'),

        initialize: function() {

        },

        filterToken: function(){
            $(".avt-filter-token-live").show();
            $(".avt-upload-token-live").hide();
            var startFilter = $(".avt-filter-token-live .avt-has-filter").attr('data-start');
            var totalToken = $(".avt-filter-token-live .avt-total-token-check").attr('data-total');

            this.ajajxCheckToken(startFilter, 1, totalToken);
        },

        ajajxCheckToken: function( start = 0, limit = 1, totalToken = 0){
            var self = this;
            var data = {
                start : start,
                limit: limit
            };

            $.post(AVTDATA.SITE_URL + '/ajax-check-token', data, function(result){
                var dataResult = JSON.parse(result);
                $(".avt-filter-token-live .avt-has-filter").attr('data-start', dataResult.start);
                $(".avt-filter-token-live .avt-has-filter").text(dataResult.start);
                var recent = dataResult.start / totalToken * 100;
                $(".avt-filter-token-live .avt-total-token-check-bar").css('width', recent+'%' );

                if( dataResult.start < totalToken ) {
                    self.ajajxCheckToken(dataResult.start, limit, totalToken);
                }else{
                   // $(".avt-filter-token-live").hide();
                }
            });
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
                    url: AVTDATA.SITE_URL + '/upload-token-fb',
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function ( res ) {    
                        var dataResult = JSON.parse( res );
      
                        if(  dataResult.data ) {
                            
                            var output = self.errorFormTpl( {message : 'Upload file thành công và bắt đầu tự động lọc token.', classes: 'uk-notify-message-success'} );
                            $('.atl-notify-js', self.el).html( output ).show();
                            setTimeout( function(){

                                $('.atl-notify-js', self.el).fadeOut();
                                $(".avt-upload-token-live").show();
                                var startFilter = $(".avt-upload-token-live  .avt-has-filter").attr('data-start');
                                $(".avt-upload-token-live .avt-total-token-check").attr('data-total', dataResult.data);
                                $(".avt-upload-token-live .avt-total-token-check").text(dataResult.data);
                                self.ajaxAction(startFilter, 1, dataResult.data);

                            },2000 );
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

        ajaxAction: function( start = 0, limit = 1, totalToken = 0){
            var self = this;
            var data = {
                start : start,
                limit: limit
            };

            $.post(AVTDATA.SITE_URL + '/auto-check-token-upload', data, function(result){
                var dataResult = JSON.parse(result);
                $(".avt-upload-token-live .avt-has-filter").attr('data-start', dataResult.start);
                $(".avt-upload-token-live .avt-has-filter").text(dataResult.start);
                var recent = dataResult.start / totalToken * 100;
                $(".avt-upload-token-live .avt-total-token-check-bar").css('width', recent+'%' );

                if( dataResult.start < totalToken ) {
                    self.ajaxAction(dataResult.start, limit, totalToken);

                }else{
                    $(".avt-message-limit").text('');
                    $(".pita-start-action").show();
                   // $(".avt-upload-token-live").hide();
                }
            });
        },


    });
    new MANAGE_TOKEN;
    
})(jQuery);