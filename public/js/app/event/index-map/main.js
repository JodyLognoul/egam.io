// Author: Thomas Davis <thomasalwyndavis@gmail.com>
// Filename: main.js

// Require.js allows us to configure shortcut alias
// Their usage will become more apparent futher along in the tutorial.
require.config({
    shim: {
        'handlebars': {
            exports: 'Handlebars'
        }
    },
    paths: {
        jquery          : '../../../vendor/jquery/dist/jquery',
        underscore      : '../../../vendor/underscore-amd/underscore-min',
        backbone        : '../../../vendor/backbone-amd/backbone-min',
        text            : '../../../vendor/text/text',
        handlebars      : '../../../vendor/handlebars/handlebars',
        moment          : '../../../vendor/moment/moment',
        mapbox          : 'https://api.tiles.mapbox.com/mapbox.js/v1.6.2/mapbox'
    },
    urlArgs: "bust=" +  (new Date()).getTime() // avoid cache issues
});

require(['mapbox'], function(mapbox){

      var map = L.mapbox.map('map', 'examples.map-vyofok3q', {
        center: [38.8896, -77.0417],
        zoom: 15
    });

});
