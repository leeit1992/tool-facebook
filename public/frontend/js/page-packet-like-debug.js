/**
 * Handle page service
 *
 * @version     1.0
 * @author      HaLe
 * @package     ATL
 */
(function($){
    "use strict";
    var ATL_PACKET_LIKE = Backbone.View.extend({
        el : '#avt-page-packet-like',

        formClassError : 'md-input-danger',

        events: {
            'submit #avt-form-packet-like' : 'handleForm',
            'click .atl-manage-packet-like-delete-js' : 'removePacketLike',
            'click .atl-action-apply-js' : 'actionManage',
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

        handleForm: function( event ){
            var self        = this,
                $formData   = $(".avt-required-js", this.el),
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
                this.handlePacketLike( event );
                return false;
            }else{
                return false;
            }
        },

        handlePacketLike: function( event ){
            var data = {
                formData: $('#avt-form-packet-like', this.el).serialize()
            },
            self = this;
            altair_helpers.content_preloader_show();
            // Send to server handle.
            $.ajax({
                url: AVTDATA.SITE_URL + '/validate-packet-like',
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
                    } 
                    else {
                        window.location = location.href = AVTDATA.SITE_URL + '/edit-packet-like/' + dataResult.id;
                    }
                }
            });
        },
        /**
         * Handle remove packet service
         * 
         * @return void
         */
        removePacketLike: function(e){
            var dataID = $( e.currentTarget ).attr('data-id');
            UIkit.modal.confirm('Are you sure?', function(){ 
                var data = { id: dataID };
                $.post(AVTDATA.SITE_URL + '/delete-packet-like', data, function(result) {

                    $( e.currentTarget ).closest('tr').remove();

                    UIkit.modal.alert('Delete Success!');
                });
            })
            return false;
        },

        /**
         * Handle remove multi packet service
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
                $.post(AVTDATA.SITE_URL + '/delete-packet-like', data, function(result) {
                    var dataResult = JSON.parse( result );
                    $.each(argsID,function(i, el){
                        $(".atl-packet-like-item-" + el).remove();
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
    });
    new ATL_PACKET_LIKE;
    
})(jQuery);