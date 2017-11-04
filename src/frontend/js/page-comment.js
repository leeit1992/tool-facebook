/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var PAGE_COMMENT = Backbone.View.extend({
        el : '.pita-page-comment',

        events: {
            'change #pita-comment-number' : 'changePacket',
            'click .pita-start-action' : 'startAction'
        },

        initialize: function() {
            this.changePacket();
        },

        changePacket : function(){
            var data = {
                id : $('#pita-comment-number', this.el).val() },
                self = this;

            // Send to server handle.
            $.post(AVTDATA.SITE_URL + '/get-packet-comment', data, function(result) {
                var dataResult = JSON.parse( result );
                $(".pita-setinteval").val(dataResult.numberS);
                $(".avt_comment_number").val(dataResult.speedTime);
            });
        },

        startAction : function(){
            $(".avt-filter-token-live").show();

            var numberS = $(".pita-setinteval").val();
            
            $(".avt-total-token-check").attr('data-total', $(".avt_comment_number").val());
            $(".avt-total-token-check").text($(".avt_comment_number").val() + ' Comments ');

            var startFilter = $(".avt-has-filter").attr('data-start');
            var totalToken = $(".avt-total-token-check").attr('data-total');

            this.ajaxAction(startFilter, 1, totalToken, numberS);
        },

        ajaxAction: function( start = 0, limit = 1, totalToken = 0, timeAction = 2000){
            var self = this;
            var data = {
                start : start,
                limit: limit
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
                       // $(".avt-filter-token-live").hide();
                    }
                });
            },timeAction);
        }

    });
    new PAGE_COMMENT;
    
})(jQuery);