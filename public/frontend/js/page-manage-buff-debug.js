/**
 * Handle page buff
 *
 * @version 	1.0
 * @author 		HaLe
 * @package 	ATL
 */
(function($){
	"use strict";
	var AVT_MANAGE_BUFF = Backbone.View.extend({
		el : '#avt-page-manage-buff',

		events: {
			'click .atl-manage-buff-delete-js' : 'removeBuff',
		},

		initialize: function() {
		},

		/**
         * Handle remove buff
         * 
         * @return void
         */
        removeBuff: function(e){
            var dataID = $( e.currentTarget ).attr('data-id');
            UIkit.modal.confirm('Are you sure?', function(){ 
                var data = { id: dataID };
                $.post(AVTDATA.SITE_URL + '/delete-buff', data, function(result) {

                    $( e.currentTarget ).closest('tr').remove();

                    UIkit.modal.alert('Delete Success!');
                });
            })
            return false;
        },
	});
	new AVT_MANAGE_BUFF;
	
})(jQuery);