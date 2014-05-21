// /public/js/app/event/index/router.js

define(['jquery', 'backbone','underscore','collection','controller'], function($, Backbone, _, EventsCollection, ControllerEventsIndex){

	var AppRouter = Backbone.Router.extend({

		initialize: function(){
			this.controller = new ControllerEventsIndex({router:this});
			this.eventsCollection = new EventsCollection();
		},
		routes: {
			''					: 'defaultRoute',
			'_=_'				: 'defaultRoute',
			'sort/:dir/:by'		: 'sortRoute',
			'filter/:by/:query'	: 'filterRoute',
		},
		defaultRoute: function(){
			this.controller.actionDefault();
		},
		sortRoute: function(dir, by){
			this.controller.actionSort([by, dir]);
		},
		filterRoute: function(by, query){
			this.controller.actionFilter([by, query]);
		}
	});
return AppRouter;
});
