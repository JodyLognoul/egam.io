define(['backbone','handlebars', 'underscore','moment'], function(Backbone, Handlebars, _, moment) {

	var activeFilterSortingView = Backbone.View.extend({
		
		// Class
		className: "active-filters-content",
		tagName: "div",
		texts: {
			"title"			: "Sorting By Title",
			"address"		: "Sorting By Address",
			"host"			: "Sorting By Host Name",
			"places"		: "Sorting By Availables Places",
			"eventdate"		: "Sorting By Date",
		},
		buttonClasses: {
			"sort": "btn-success",
			"filter.eventdate": "btn-info",
			"filter.s": "btn-info",
		},

		// Templates
		template: _.template( $('.active-filters-script').html() ),

		initialize: function(model, router, type){
			this.router = router;
			this.type = type;
			this.render();
		},
		events: {
			'click .btn': 'clear',
		},
		render: function() {
			var params = {
				text		:	this.type === 'sort'				? this.texts[this.model] :
								this.type === 'filter.eventdate'	? moment(this.model).format("dddd, MMMM Do YYYY") :
								this.type === 'filter.s'			? 'Contain the text "' + this.model + '"':
								'undifined (activeFilterSortingView)',
				buttonClass : this.buttonClasses[this.type]
			};
			this.$el.html( this.template( params ) );

			return this;
		},
		clear: function(){
			this.remove();
			this.router.navigate('',{trigger: true});
		}
	});

	return activeFilterSortingView;
});

