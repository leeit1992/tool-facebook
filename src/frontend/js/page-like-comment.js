/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var PAGE_LIKE_COMMENT = Backbone.View.extend({
        el : '.pita-page-like-comment',

        events: {
            'change #pita-like-comment-number' : 'changePacket',
            'click .pita-start-action' : 'startAction'
        },

        initialize: function() {
            this.changePacket();
        },

        changePacket : function(){
            var data = {
                id : $('#pita-like-comment-number', this.el).val() },
                self = this;

            // Send to server handle.
            $.post(AVTDATA.SITE_URL + '/get-packet-like-comment', data, function(result) {
                var dataResult = JSON.parse( result );
                if ( dataResult.status ) {
                    $(".avt-message-limit").text('');
                    $(".pita-start-action").show();
                    $(".pita-setinteval").val(dataResult.numberS);
                    $(".avt_like_number").val(dataResult.speedLike);
                    $(".avt_comment_number").val(dataResult.speedComment);
                } else {
                    $(".avt-message-limit").text('Gói dịch vụ đã dùng giới hạn ngày hôm nay');
                    $(".pita-start-action").hide();
                }
            });
        },

        startAction : function(){
            var self = this;
            var data = {
                    id : $('#pita-like-comment-number').val()
                };
            $(".avt-has-filter-like").attr('data-start', 0);
            $(".avt-has-filter-like").text('0');
            $(".avt-has-filter-comment").attr('data-start', 0);
            $(".avt-has-filter-comment").text('0');
            $(".avt-total-token-check-like-bar").css('width', '1%' );
            $(".avt-total-token-check-comment-bar").css('width', '1%' );

            $(".pita-start-action").hide();
            $(".avt-message-limit").text('Đang chạy tools ....');

            $.post(AVTDATA.SITE_URL + '/update-count-using', data, function(result){
                var dataResult = JSON.parse(result);
                if ( dataResult.status ) {
                    $(".avt-filter-token-live").show();
                    var numberS = $(".pita-setinteval").val();
            
                    $(".avt-total-token-check-like").attr('data-total', $(".avt_like_number").val());
                    $(".avt-total-token-check-like").text($(".avt_like_number").val() + ' Like ');

                    $(".avt-total-token-check-comment").attr('data-total', $(".avt_comment_number").val());
                    $(".avt-total-token-check-comment").text($(".avt_comment_number").val() + ' Comment ');

                    var startFilter = $(".avt-has-filter-like").attr('data-start');
                    var totalToken = $(".avt-total-token-check-like").attr('data-total');
                    self.ajaxActionLike(startFilter, 1, totalToken, numberS);

                    var startFilterC = $(".avt-has-filter-comment").attr('data-start');
                    var totalTokenC = $(".avt-total-token-check-comment").attr('data-total');
                    self.ajaxActionComment(startFilterC, 1, totalTokenC, numberS);
                } else {
                    $(".avt-message-limit").text('Gói dịch vụ đã dùng giới hạn ngày hôm nay');
                    $(".pita-start-action").hide();
                    $(".avt-filter-token-live").hide();
                }
            });
        },

        ajaxActionLike: function( start = 0, limit = 1, totalToken = 0, timeAction = 2000){
            var self = this;
            var data = {
                type: 'likePost',
                start : start,
                limit: limit,
                objectId : $(".pita-id-post").val(),
            };
            setTimeout(function(){
                $.post(AVTDATA.SITE_URL + '/ajax-tool-action', data, function(result){
                    var dataResult = JSON.parse(result);
                    $(".avt-has-filter-like").attr('data-start', dataResult.start);
                    $(".avt-has-filter-like").text(dataResult.start);
                    var recent = dataResult.start / totalToken * 100;
                    $(".avt-total-token-check-like-bar").css('width', recent+'%' );

                    $(".avt-c-token-live").text(dataResult.tokenLive);
                    $(".avt-c-token-die").text(dataResult.tokenDie);

                    if( dataResult.start < totalToken ) {
                        self.ajaxActionLike(dataResult.start, limit, totalToken, timeAction);

                    } else {
                        var stt = $(".avt-message-limit").attr('data-stt');
                        if ( stt == 'yes' ) {
                            $(".avt-message-limit").text('');
                            (".pita-start-action").show();
                        } else {
                            $(".avt-message-limit").attr('data-stt', 'yes');
                        }
                       // $(".avt-filter-token-live").hide();
                    }
                });
            },timeAction);
        },

        ajaxActionComment: function( start = 0, limit = 1, totalToken = 0, timeAction = 2000){
            var self = this;
            var data = {
                type: 'comment',
                start : start,
                limit: limit,
                objectId : $(".pita-id-post").val(),
                packageId : $("#pita-like-comment-number").val(),
            };
            setTimeout(function(){
                $.post(AVTDATA.SITE_URL + '/ajax-tool-action', data, function(result){
                    var dataResult = JSON.parse(result);
                    $(".avt-has-filter-comment").attr('data-start', dataResult.start);
                    $(".avt-has-filter-comment").text(dataResult.start);
                    var recent = dataResult.start / totalToken * 100;
                    $(".avt-total-token-check-comment-bar").css('width', recent+'%' );

                    $(".avt-c-token-live").text(dataResult.tokenLive);
                    $(".avt-c-token-die").text(dataResult.tokenDie);

                    if ( dataResult.start < totalToken ) {
                        self.ajaxActionComment(dataResult.start, limit, totalToken, timeAction);
                    } else {
                        var stt = $(".avt-message-limit").attr('data-stt');
                        if ( stt == 'yes' ) {
                            $(".avt-message-limit").text('');
                            $(".pita-start-action").show();
                        } else {
                            $(".avt-message-limit").attr('data-stt', 'yes');
                        }
                       // $(".avt-filter-token-live").hide();
                    }
                });
            },timeAction);
        }

    });
    new PAGE_LIKE_COMMENT;
    
})(jQuery);