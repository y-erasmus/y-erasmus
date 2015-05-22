var SITEJS = SITEJS || {};

SITEJS.core = (function () {

    var AjaxManager = AJAX.core

    return {
        init: function () {
            AjaxManager.init();
        }
    };
}());
