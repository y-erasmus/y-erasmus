var SITEJS = SITEJS || {};

SITEJS.core = (function () {

    var AjaxManager = AJAX.core,
        viewManager = VIEW.core

    return {
        init: function () {
            AjaxManager.init();
            viewManager.init();

        }
    };
}());
