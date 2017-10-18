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
            'click .avt-action-filter' : 'filterToken'
        },

        initialize: function() {
        },

        filterToken: function(){
            $(".avt-filter-token-live").show();
            var startFilter = $(".avt-has-filter").attr('data-start');
            var totalToken = $(".avt-total-token-check").attr('data-total')

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
                $(".avt-has-filter").attr('data-start', dataResult.start);
                $(".avt-has-filter").text(dataResult.start);
                var recent = dataResult.start / totalToken * 100;
                $(".avt-total-token-check-bar").css('width', recent+'%' );

                $(".avt-c-token-live").text(dataResult.tokenLive);
                $(".avt-c-token-die").text(dataResult.tokenDie);

                if( dataResult.start < totalToken ) {
                    self.ajajxCheckToken(dataResult.start, limit, totalToken);
                }else{
                   // $(".avt-filter-token-live").hide();
                }
            });
        }

    });
    new MANAGE_TOKEN;
    
})(jQuery);