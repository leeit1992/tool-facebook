/**
 * Handle 
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var NAME = Backbone.View.extend({
        el : '',
        formClassError : 'md-input-danger',
        events: {},
        template: _.template(),

        initialize: function() {
            ATLLIB.checkAll( this.el );
        },

        /**
         * handleForm
         * Handle form submit location
         * @return void
         */
        handleForm: function( event ){
            var self        = this,
                $formData   = $(".atl-required-js", this.el),
                error       = new Array();

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
                this.handleLocation( event );
                return false;
            }else{
                return false;
            }
        }
    });
    new NAME;
    
})(jQuery);