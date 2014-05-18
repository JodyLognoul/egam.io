define(['backbone','handlebars', 'underscore','moment'], function(Backbone, Handlebars, _, moment) {

	var viewProgressbar = Backbone.View.extend({
		
		// Class
		className: "progress progress-striped active",
		tagName: "div",

		// Templates
		template: Handlebars.compile( $('.progressbar-script').html() ),

		initialize: function(){
			var val = 1;
			var _this = this;

			setInterval( function(){
				_this.render( (val)%110 );
				val++;
			}, 10 );  // run
		},
		render: function(value) {
			var params = {
				value: value
			};
			this.$el.html( this.template( params ) );

			return this;
		}
	});

	return viewProgressbar;
});

