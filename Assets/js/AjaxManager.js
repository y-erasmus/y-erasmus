var AJAX = AJAX || {};

AJAX.core = (function () {

    var login = {
        init: function (){
            console.log('JS AJAX INIT');

            var $loginForm = $('.xhrForm');

            $(document).on('submit','.xhrForm', function(e){
                e.preventDefault();
                login.ajax($(this));
            });

            $('.xhrForm.correction input').on('change', function(e){
                //Reponse id
                $id = $(this).data('id');
                $(this).parents("form").find("input[name='id']").val($id);
                $(this).parents("form").submit();
            });

            $(document).on('click', '.logout', function(){
                $('.logout').addClass('loading').html('');
                login.ajax($('.logoutForm'));
            });
        },
        ajax: function(form){
            var btnText;
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                beforeSend: function(){
                    btnText = $('.formbutton').text();

                    $('.formbutton').addClass('loading').html('');
                    $('.formError').fadeOut().html('');
                    $('input').removeClass('error').siblings('.outer-select').removeClass('error');
                },
                success: function(response) {
                    var data = false;
                    try {
                        data = $.parseJSON(response);
                    }catch (e){}
                    if(data){
                        setTimeout(function(){
                            $.each(data, function(index, message){
                                if(message.type == 'erreur'){
                                    $('.formError').html(message.msg).fadeIn(1000);
                                    if(message.field){
                                        $('input[name='+message.field+'], select[name='+message.field+']').addClass('error').parent('.outer-select').addClass('error');

                                    }
                                }
                                if(message.type == 'redirect'){
                                    $('body').fadeOut(150, function(){
                                        $(this).html(message.msg);
                                        $(this).fadeIn(500);
                                    });
                                }

                                if(message.type == 'adduserok'){
                                    //message ok ajout
                                }

                                if(message.type == 'logout'){
                                    window.location = message.msg;
                                }
                                setTimeout(function(){
                                    $('.formbutton').removeClass('loading').html(btnText);
                                },150);

                            });
                        },1000);
                    }
                }
            });
        }
    }

    return {
        init: function () {
            login.init();
        }
    };
}());
