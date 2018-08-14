/**
 * jquery
 **/
window.$ = window.jQuery = require('jquery');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.fn.loadPageOn = function(local) {
    var type, url, data;

    if ($(this).is('form')) {
        type = 'post';
        url  = $(this).attr('action');
        data = $(this).serialize();
    } else {
        type = 'get';
        url  = $(this).attr('href');
        data = {};
    }

    $.ajax({
        method:   type,
        url:      url,
        data:     data,
        success: function(response) {
            $(local).html(response);
        },
        error: function(response) {
            console.error(response.responseText);
        }
    });

    return false;
};

/**
 * pace
 **/
window.paceOptions = {
    ajax: {
        trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE']
    }
};

window.pace = require('./pace');