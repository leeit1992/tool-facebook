(function($) {

    window.ATLLIB = {
        validateEmail: function(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        fileReader: function(event, appendTo = '', resize = false) {
            var file = event.target.files[0];
            var img = document.createElement("img");
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    // The file's text will be printed here
                    $(appendTo).attr('src', event.target.result);

                    if (resize) {
                        $(appendTo).css('max-height',100);
                    }

                };
                reader.readAsDataURL(file);
            }
        },
        checkAll: function($el = null) {
            $(".atl-checkbox-primary-js", $el).change(function() {
                if (this.checked) {
                    $(".atl-checkbox-child-js", $el).each(function(index, el) {
                        $(el).prop('checked', true)
                    });
                } else {
                    $(".atl-checkbox-child-js", $el).each(function(index, el) {
                        $(el).prop('checked', false)
                    });
                }
            });

            return false;
        },
        makeid: function() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 5; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        },

        formatPriceInteger: function(int) {
            var newInt = int;
            newInt = newInt.replace("$", "");
            newInt = newInt.replace(",", "");
            newInt = newInt.replace(".00", "");
            newInt = newInt.trim();

            return newInt;
        },

        inputMask: function(args) {
            return '<input type="text" ' + args.dataAttr + ' value="' + args.value + '" name="' + args.name + '" class="masked_input md-input ' + args.class + '" data-inputmask="\'alias\': \'numeric\', \'groupSeparator\': \',\', \'autoGroup\': true, \'digits\': 2, \'digitsOptional\': false, \'prefix\': \'$ \', \'placeholder\': \'0\'" data-inputmask-showmaskonhover="false" />';
        },

        errorFormTpl: _.template('<div class="uk-notify-message <%= classes %>">\
                                        <a class="uk-close"></a>\
                                        <div>\
                                           <%= message %>\
                                        </div>\
                                    </div>'),

        initDatepicker : function(){
            $('.atl-datepicker').datepicker({
                dateFormat: 'yy/mm/dd',
                numberOfMonths: 2,
                minDate : 0
            });
        },

        /**
         * countDay
         * Handle count day by start and end date.
         * 
         * @param  string date1  Start Date.
         * @param  string date2  End date
         * @return int
         */
        countDay: function(date1, date2){
            var each_day = 1000 * 60 * 60 * 24;//milliseconds in a day
            var ms_date1 = date1.getTime();//milliseconds for date1
            var ms_date2 = date2.getTime();//milliseconds for date2
            var ms_date_diff = Math.abs(ms_date1 - ms_date2);//different of the two dates in milliseconds
            var days = Math.round(ms_date_diff / each_day);//divided the different with millisecond in a day
            return days;
        }
    }

    

})(jQuery);