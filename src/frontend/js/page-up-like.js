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

        initialize: function() {
            this.changePacket();
        },

        changePacket : function(){
            var data = {
                id : $('#pita-like-number', this.el).val() },
                self = this;

            // Send to server handle.
            $.post(AVTDATA.SITE_URL + '/get-up-like', data, function(result) {
                var dataResult = JSON.parse( result );
                $(".avt-message-limit").text('');
                $(".pita-start-action").show();
                $(".pita-setinteval").val(dataResult.numberS);
                $(".avt_like_numner").val(dataResult.speedTime);
                
            });
        },

        startAction : function(){
            var self = this;
            var data = {
                    id : $('#pita-like-number').val()
                };
            $(".avt-has-filter").attr('data-start', 0);
            $(".avt-has-filter").text('0');
            $(".avt-total-token-check-bar").css('width', '1%' );

            $(".pita-start-action").hide();
            $(".avt-message-limit").text('Đang chạy tools ....');
            $.post(AVTDATA.SITE_URL + '/update-count-using', data, function(result){
                    $(".avt-filter-token-live").show();
                    var numberS = $(".pita-setinteval").val();
            
                    $(".avt-total-token-check").attr('data-total', $(".avt_like_numner").val());
                    $(".avt-total-token-check").text($(".avt_like_numner").val() + ' Like ');

                    var startFilter = $(".avt-has-filter").attr('data-start');
                    var totalToken = $(".avt-total-token-check").attr('data-total');

                    self.ajaxAction(startFilter, 1, totalToken, numberS);
            });
        },

        ajaxAction: function( start = 0, limit = 1, totalToken = 0, timeAction = 2000){
            var self = this;
            var data = {
                type: '',
                start : start,
                limit: limit,
                objectId : $(".pita-id-post").val()
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