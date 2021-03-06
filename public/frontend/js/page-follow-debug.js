/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var PAGE_FOLLOW = Backbone.View.extend({
        el : '.pita-page-follow',

        events: {
            'click .pita-start-action' : 'startAction'
        },

        initialize: function() {

        },

        startAction : function(){
            $(".avt-filter-token-live").show();

            var numberS = $(".pita-setinteval").val();
            
            $(".avt-total-token-check").attr('data-total', $("#pita-like-number").val());
            $(".avt-total-token-check").text($("#pita-like-number").val() + ' Follow ');

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
    new PAGE_FOLLOW;
    
})(jQuery);