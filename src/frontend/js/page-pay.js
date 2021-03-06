/**
 * Handle page pay
 *
 * @version 	1.0
 * @author 		HaLe
 * @package 	ATL
 */
(function($){
	"use strict";
	var AVT_PAY = Backbone.View.extend({
		el : '#avt-page-handle-pay',

		formClassError : 'md-input-danger',

		events: {
			'submit #avt-form-pay' : 'handleForm',
			'click .atl-manage-pay-delete-js' : 'removePay',
			'click .atl-action-apply-js' : 'actionManage',
			'keyup .atl-pay-manage-search-js' : 'searchManage',
		},

		errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
								        <a class="uk-close"></a>\
								        <div>\
								           <%= message %>\
								        </div>\
								    </div>'),

		initialize: function() {
			var self = this;
			$(window).load(function(){
				var message = $( '.atl-notify-js', self.el ).attr('data-notify');
				
				if(message){
					var output = self.errorFormTpl( {message : message, classes: 'uk-notify-message-success'} );
					$('.atl-notify-js', self.el).html( output ).show();
	
					setTimeout( function(){
		    			$('.atl-notify-js', self.el).fadeOut();
		    		},3000 )
				}
			});
			// Auto check all
			AVTLIB.checkAll(this.el);
		},

		/**
	     * Handle form data before save to database.
	     * @return void
	     */
		handleForm: function( event ){
			var self 		= this,
				$formData 	= $(".avt-required-js", this.el),
				error 		= new Array();

			$.each( $formData, function( index, el ){
				var getValInput = $(el).val();

				if( 0 === getValInput.length ){
					$(el).addClass( self.formClassError );
					error.push(index);
				}else{
					$(el).removeClass( self.formClassError );
					error.splice(index, 1);
				}
			});

			if( 0 === error.length ){
				this.handlePay( event );
				return false;
			}else{
				return false;
			}
		},

		/**
		 * handlePay
		 * Handle form submit pay
		 * @return void
		 */
		handlePay: function( event ){
			var data = {
                formData: $('#avt-form-pay', this.el).serialize()
            },
            self = this;
			altair_helpers.content_preloader_show();
			// Send to server handle.
            $.ajax({
			    url: AVTDATA.SITE_URL + '/validate-pay',
			    type: "POST",
			    data: data,
			    success: function ( res ) {
			    	altair_helpers.content_preloader_hide();	
			    	var dataResult = JSON.parse( res );

			    	if( false === dataResult.status ) {

			    		var output = '';
			    		$.each(dataResult.message, function(i, el){
			    			output += self.errorFormTpl( {message : el, classes: 'uk-notify-message-danger'} );
			    		});

			    		$('.atl-notify-js', self.el).html( output ).show();
			    		setTimeout( function(){
			    			$('.atl-notify-js', self.el).fadeOut();
			    		},3000 );
			    	}else{
			    		window.location = location.href = AVTDATA.SITE_URL + '/edit-pay/' + dataResult.id;
			    	}
			    }
			});
		},

		/**
		 * Handle remove Pay
		 * 
		 * @return void
		 */
		removePay: function(e){
			var dataID = $( e.currentTarget ).attr('data-id');
			UIkit.modal.confirm('Are you sure?', function(){ 
				var data = { id: dataID	};
				$.post(AVTDATA.SITE_URL + '/delete-pay', data, function(result) {

					$( e.currentTarget ).closest('tr').remove();

					UIkit.modal.alert('Delete Success!');
	            });
			})
			return false;
		},

		/**
		 * Handle remove multi user
		 * 
		 * @return void
		 */
		actionManage: function( e ){
			// Get action.
			var action = $( e.currentTarget ).closest('.atl-action-manage').find("select[name=atl-action-manage]").val();
			var argsID = new Array;

			if( 'delete' == action ) {
				altair_helpers.content_preloader_show();
				// Get list id remove checked.
				$(".atl-checkbox-child-js", this.el).each(function(){
					if(this.checked){
						argsID.push($(this).val());
					}
				})
				// Send to server handle.
				var data = { id: argsID };
				$.post(AVTDATA.SITE_URL + '/delete-pay', data, function(result) {
					var dataResult = JSON.parse( result );
					$.each(argsID,function(i, el){
						$(".atl-pay-item-" + el).remove();
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
		},

		/**
		 * Handle search user
		 * 
		 * @return void
		 */
		searchManage: function(e){
			var keyup = $(e.currentTarget).val(),
			 	data = {
			 		getBy: "search",
	    			keyup: keyup
	            }; 

            if( 0 < keyup.length ) {
            	$(".atl-list-pay-not-js",this.el).fadeOut();
	            $(".atl-list-pay-js",this.el).fadeIn();
            	altair_helpers.content_preloader_show();
            }else{
            	$(".tl-list-pay-not-js",this.el).fadeIn();
	            $(".tl-list-pay-js",this.el).fadeOut();
            	altair_helpers.content_preloader_hide();
            }
            // Send to server handle.
            $.get(AVTDATA.SITE_URL + '/ajax-manage-pay', data, function(result) {
            	var dataResult = JSON.parse( result );
            	$(".atl-list-pay-js", self.el).html( dataResult.output );
            	altair_helpers.content_preloader_hide();
            });
		}
	});
	new AVT_PAY;
	
})(jQuery);