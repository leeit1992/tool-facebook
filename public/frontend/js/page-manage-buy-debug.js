/**
 * Handle page buy
 *
 * @version 	1.0
 * @author 		HaLe
 * @package 	ATL
 */
(function($){
	"use strict";
	var AVT_MANAGE_BUY = Backbone.View.extend({
		el : '#avt-page-manage-buy',

		events: {
			'click .atl-manage-buy-delete-js' : 'removeBuy',
		},
		initialize: function() {
		},

		/**
         * Handle remove buy
         * 
         * @return void
         */
        removeBuy: function(e){
            var dataID = $( e.currentTarget ).attr('data-id');
            UIkit.modal.confirm('Are you sure?', function(){ 
                var data = { id: dataID };
                $.post(AVTDATA.SITE_URL + '/delete-buy', data, function(result) {

                    $( e.currentTarget ).closest('tr').remove();

                    UIkit.modal.alert('Delete Success!');
                });
            })
            return false;
        },
	});
	new AVT_MANAGE_BUY;
	
})(jQuery);