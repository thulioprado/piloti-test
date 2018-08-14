/**
 * jquery
 **/
window.$ = window.jQuery = require('jquery');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.fn.request = function(type) {
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
        dataType: 'json',
        success: function(response) {
            for (var key in response) {
                $(key).html(response[key]);
            }
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