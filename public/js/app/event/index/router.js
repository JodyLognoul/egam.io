// /public/js/app/event/index/router.js

define(['jquery', 'backbone','underscore','moment','collection','viewCollection','viewActiveFilterSorting','controller'], function($, Backbone, _, moment, EventsCollection, ViewEvents, ViewActiveFilterSorting,ControllerEventsIndex){

	var AppRouter = Backbone.Router.extend({

		initialize: function(){
			this.controller = new ControllerEventsIndex({router:this});
			this.eventsCollection = new EventsCollection();
		},
		routes: {
			''					: 'defaultRoute',
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
