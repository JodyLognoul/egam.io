define(['backbone','handlebars', 'underscore'], function(Backbone, Handlebars, _) {

	var EventView = Backbone.View.extend({
		tagName: 'div',
		className: 'elem col-sm-6 col-md-3',

		// Templates
		template: _.template( $('.index-grid').html() ),

		initialize: function(){
			this.render();
		},

		render: function() {
			this.$el.html( this.template( this.model.toJSON() ) );
			return this;
		}

	});

	return EventView;
});

