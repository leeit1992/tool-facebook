/**
 * Handle page buy share
 *
 * @version 	1.0
 * @author 		HaLe
 * @package 	ATL
 */
(function($){
	"use strict";
	var AVT_BUY_SHARE = Backbone.View.extend({
		el : '#avt-page-buy-share',

		formClassError : 'md-input-danger',

		events: {
			'submit #avt-form-buy-share' : 'handleForm'
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
                formData: $('#avt-form-buy-share', this.el).serialize()
            },
            self = this;
			altair_helpers.content_preloader_show();
			// Send to server handle.
            $.ajax({
			    url: AVTDATA.SITE_URL + '/validate-buy-share',
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
			    		window.location = location.href = AVTDATA.SITE_URL + '/buy-share';;
			    	}
			    }
			});
		}
	});
	new AVT_BUY_SHARE;
	
})(jQuery);