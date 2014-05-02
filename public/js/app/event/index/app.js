/*

/public/js/app/event/index/app.js

*/

define(['jquery','underscore', 'backbone'], function($, _, Backbone){
    
    var App =  Backbone.View.extend({
        initialize: function(){
            console.log('Yahou!');
        }
    });
    return App;
});
