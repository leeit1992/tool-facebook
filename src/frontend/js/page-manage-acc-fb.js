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
            'click .atl-action-apply-js' : 'actionManage',
            'click .avt-delete-acc' : 'deleteFBacc',
        },

        errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
                                        <a class="uk-close"></a>\
                                        <div>\
                                           <%= message %>\
                                        </div>\
                                    </div>'),

        initialize: function() {
            $('.avt-facebook-acc-check-primary').on('ifChecked', function(event){
                $(".avt-facebook-acc-check-child").iCheck('check');
            });

            $('.avt-facebook-acc-check-primary').on('ifUnchecked', function(event){
                $(".avt-facebook-acc-check-child").iCheck('uncheck');
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
                    url: AVTDATA.SITE_URL + '/upload-acc-fb',
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function ( res ) {    
                        var dataResult = JSON.parse( res );
      
                        if(  dataResult.data ) {
                            
                            var output = self.errorFormTpl( {message : 'Upload file thành công và bắt đầu tự động lấy token.', classes: 'uk-notify-message-success'} );
                            $('.atl-notify-js', self.el).html( output ).show();
                            setTimeout( function(){

                                $('.atl-notify-js', self.el).fadeOut();
                                $(".avt-filter-token-live").show();
                                var startFilter = $(".avt-has-filter").attr('data-start');
                                $(".avt-total-token-check").attr('data-total', dataResult.data);
                                $(".avt-total-token-check").text(dataResult.data);
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

        ajaxAction: function( start = 0, limit = 1, totalToken = 0){
            var self = this;
            var data = {
                start : start,
                limit: limit
            };

            $.post(AVTDATA.SITE_URL + '/auto-acc-fb', data, function(result){
                var dataResult = JSON.parse(result);
                $(".avt-has-filter").attr('data-start', dataResult.start);
                $(".avt-has-filter").text(dataResult.start);
                var recent = dataResult.start / totalToken * 100;
                $(".avt-total-token-check-bar").css('width', recent+'%' );

                $(".avt-c-token-live").text(dataResult.tokenLive);
                $(".avt-c-token-die").text(dataResult.tokenDie);

                if( dataResult.start < totalToken ) {
                    self.ajaxAction(dataResult.start, limit, totalToken);

                }else{
                    $(".avt-message-limit").text('');
                    $(".pita-start-action").show();
                   // $(".avt-filter-token-live").hide();
                }
            });
        },

        actionManage: function(e){
            var action = $( e.currentTarget ).closest('.atl-action-manage').find("select[name=atl-action-manage]").val();
            var argsID = new Array;

            if( 'delete' == action ) {
                $(".avt-facebook-acc-check-child", this.el).each(function(){
                    if(this.checked){
                        argsID.push($(this).val());
                    }
                })

                // Send to server handle.
                var data = { id: argsID };
                $.post(AVTDATA.SITE_URL + '/delete-facebook-acc', data, function(result) {
                    var dataResult = JSON.parse( result );
                    $.each(argsID,function(i, el){
                        $(".avt-fb-acc-item-" + el).remove();
                    })
                    altair_helpers.content_preloader_hide();
                    if( dataResult.status ){
                        UIkit.modal.alert('Delete Success!');
                    }else{
                        UIkit.modal.alert('Delete False!');
                    }
                });
            }else{
                UIkit.modal.alert('Please choose Action!');
            }

            return false;
        },

        deleteFBacc: function(e){
            var itemId = $( e.currentTarget ).attr('data-id');

            var data = { id: itemId };

            $.post(AVTDATA.SITE_URL + '/delete-facebook-acc', data, function(result) {
                var dataResult = JSON.parse( result );
                $(".avt-fb-acc-item-" + itemId).remove();
                altair_helpers.content_preloader_hide();
                if( dataResult.status ){
                    UIkit.modal.alert('Delete Success!');
                }else{
                    UIkit.modal.alert('Delete False!');
                }
            });

            return false;
        }

    });
    new MANAGE_ACC_FB;
    
})(jQuery);