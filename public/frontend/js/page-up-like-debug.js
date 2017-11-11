/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var PAGE_UP_LIKE = Backbone.View.extend({
        el : '.pita-page-up-like',

        events: {
            'change #pita-like-number' : 'changePacket',
            'click .pita-start-action' : 'startAction'
        },

        errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
                                        <a class="uk-close"></a>\
                                        <div>\
                                           <%= message %>\
                                        </div>\
                                    </div>'),

        initialize: function() {
            this.changePacket();
        },

        changePacket : function(){
            var data = {
                id : $('#pita-like-number', this.el).val() },
                self = this;
            $(".pita-start-action").show();
            // Send to server handle.
            $.post(AVTDATA.SITE_URL + '/get-up-like', data, function(result) {
                var dataResult = JSON.parse( result );
                $(".avt-message-limit").text('');
                $(".pita-start-action").show();
                $(".pita-setinteval").val( dataResult.numberS );
                $(".avt_total_like").val( dataResult.total );

                if ( dataResult.total < 1 ) {
                    $(".pita-start-action").hide();
                    $(".avt-message-limit").text('Đã hết lượt sử dụng, vui lòng mua thêm....');
                }
            });
        },

        startAction : function(){
            var self = this;
            var numberLike = $('.avt_like_number').val();
            var totalLike = $('.avt_total_like').val();
            
            if ( parseInt(numberLike) <= parseInt(totalLike) ) {

                $(".avt-has-filter").attr('data-start', 0);
                $(".avt-has-filter").text('0');
                $(".avt-total-token-check-bar").css('width', '1%' );

                $(".pita-start-action").hide();
                $(".avt-message-limit").text('Đang chạy tools ....');
                
                $(".avt-filter-token-live").show();
                var numberS = $(".pita-setinteval").val();
        
                $(".avt-total-token-check").attr('data-total', numberLike );
                $(".avt-total-token-check").text( numberLike + ' Like ');

                var startFilter = $(".avt-has-filter").attr('data-start');
                var totalToken = $(".avt-total-token-check").attr('data-total');

                self.ajaxAction(startFilter, 1, totalToken, numberS);
                
            } else {
                $(".avt-filter-token-live").hide();
                var output = self.errorFormTpl( {message : 'Vui lòng điền số lượt hoặc số lượt không đủ', classes: 'uk-notify-message-danger'} );
                $('.atl-notify-js', self.el).html( output ).show();
                setTimeout( function(){
                    $('.atl-notify-js', self.el).fadeOut();
                },3000 );
            }
            
        },

        ajaxAction: function( start = 0, limit = 1, totalToken = 0, timeAction = 2000){
            var self = this;
            var data = {
                type: 'upLike',
                start : start,
                limit: limit,
                objectId : $(".pita-id-post").val(),
                id : $('#pita-like-number').val()
            };

            setTimeout(function(){
                $.post(AVTDATA.SITE_URL + '/ajax-tool-action', data, function(result){
                    var dataResult = JSON.parse(result);
                    $(".avt-has-filter").attr('data-start', dataResult.start);
                    $(".avt-has-filter").text(dataResult.start);
                    var recent = dataResult.start / totalToken * 100;
                    $(".avt-total-token-check-bar").css('width', recent+'%' );

                    $(".avt-c-token-live").text(dataResult.tokenLive);
                    $(".avt-c-token-die").text(dataResult.tokenDie);

                    var numberTotal = $(".avt_total_like").val();
                    $(".avt_total_like").val( numberTotal - 1 );

                    if( dataResult.start < totalToken ) {
                        self.ajaxAction(dataResult.start, limit, totalToken, timeAction);
                    }else{
                        $(".avt-message-limit").text('');
                        $(".pita-start-action").show();
                       // $(".avt-filter-token-live").hide();
                    }
                });
            },timeAction);
        }

    });
    new PAGE_UP_LIKE;
    
})(jQuery);