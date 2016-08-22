$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});

$(document).ready(function(){

    var $registerButton = $('#registerBtn');
    var $cancelButton = $('#cancel');
    var $registerClass = $('.register');
    var $loginForm = $('.form-signin');

    $registerButton.on({
        click: function() {

            if( $registerClass.is(':visible') ) {

                //var $validator = $loginForm.validator({
                //    errors: {
                //        minlength: 'Not long enough'
                //    }
                //});
                if( $loginForm.validator('validate').has('.has-error').length == 0 ) {

                    $.post( "/register", $loginForm.serialize(), function( data ) {

                        var $loginMsgBox = $( '.login-box-msg' );
                        /** @namespace data.classes */
                        $loginMsgBox.html( data.infoMsg );
                        /** @namespace data.infoMsg */
                        $loginMsgBox.addClass( data.classes );

                        if(data.success) {

                            $loginForm[0].reset();
                            $cancelButton.click();
                        }
                    });
                }

            } else {
                $('#inputFullName').attr('required', 'required');
                $('#inputRetypePassword').attr('required', 'required');
            }

            $registerClass.each(function() {
                if( $(this).hasClass('hidden') ) {
                    $(this).removeClass('hidden');
                    $('#cancel').removeClass('hidden');
                    $registerButton.removeClass('btn-block');
                }
            });


        }
    });

    $cancelButton.on({
        click: function() {

            $('#inputFullName').removeAttr('required');
            $('#inputRetypePassword').removeAttr('required');
            $loginForm.validator('destroy');

            $registerClass.each(function(){
                $(this).addClass('hidden');
            });

            $(this).addClass('hidden');
            $registerButton.addClass('btn-block');
        }
    });
});