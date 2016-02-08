$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});

$(document).ready(function(){

    var $registerButton = $('#registerBtn');

    $registerButton.on({
        click: function() {

            var $registerClass = $('.register');

            if( $registerClass.is(':visible') ) {
                $.post( "ajax/test.html", function( data ) {
                    $( ".result" ).html( data );
                });
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

    $('#cancel').on({
        click: function() {

            var $registerClass = $('.register');

            $registerClass.each(function(){
                $(this).addClass('hidden');
            });

            $(this).addClass('hidden');
            $registerButton.addClass('btn-block');
        }
    });
});