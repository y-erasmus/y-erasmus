var VIEW = VIEW || {};

VIEW.core = (function () {

    var profil = {
        init: function (){

           var changedate = function() {
               $('.datearri, .datedepa').on('click', function(){
                   $(this).attr('type', 'date');
               });

           }


            changedate();

        }

    }

    return {
        init: function () {
            profil.init();
        }
    };
}());
