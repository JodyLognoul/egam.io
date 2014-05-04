// /public/js/app/event/index/router.js

define(['jquery', 'backbone','underscore','moment','collection','viewCollection','viewActiveFilterSorting','viewProgressbar','controller'], function($, Backbone, _, moment, EventsCollection, ViewEvents, ViewActiveFilterSorting, ViewProgressbar,ControllerEventsIndex){

	var AppRouter = Backbone.Router.extend({
		routes: {
			''					:'defaultRoute',
			'sort/:dir/:by'		:'sortRoute',
			'filter/:by/:query'	:'filterRoute',
		},
		initialize: function(){
			this.controller = new ControllerEventsIndex({router:this});
			this.eventsCollection = new EventsCollection();
		},
		defaultRoute: function(){
			this.controller.actionDefault();
			
			// var _this = this;
			// this.appendViewProgressbar();

			// this.eventsCollection.fetch().then(function(){

			// 	_this.removeViewActiveFilterSorting();
			// 	_this.eventsCollection.changeSort('id');
			// 	_this.appendViewEvents(_this.eventsCollection);
			// 	_this.removeViewProgressbar();
			// });
		},
		sortRoute: function(dir, by){
			var _this = this;
			this.appendViewProgressbar();
			this.eventsCollection.fetch().then(function(){

				_this.eventsCollection.changeSort(by);
				_this.appendViewEvents(_this.eventsCollection);
				_this.appendViewActiveFilterSorting(by, 'sort', _this.eventsCollection.length);
				_this.removeViewProgressbar();
			});

		},
		filterRoute: function(by, query){
			var filteredEventsCollection, _this = this;

			this.appendViewProgressbar();
			this.eventsCollection.fetch().then(function(){

				if( by === 'eventdate' ){	// search by event_date
					var event_date = moment(query).format('YYYY-MM-DD');

					filteredEventsCollection = new EventsCollection(_this.eventsCollection.where({ 'event_date': event_date }));
					_this.appendViewActiveFilterSorting(event_date, 'filter.eventdate',filteredEventsCollection.length);

				}else if(by === 's'){		// search by string
					filteredEventsCollection = new EventsCollection(_this.eventsCollection.filterByString(query));
					_this.appendViewActiveFilterSorting(query, 'filter.s',filteredEventsCollection.length);
				}
				_this.appendViewEvents(filteredEventsCollection);
				_this.removeViewProgressbar();
			});

		},
		// View Collection
		appendViewEvents: function(_collection){
			var viewEvents = new ViewEvents({ collection: _collection }, this);
			$('.dest-bb-events').empty().append(viewEvents.el);
		},

		// View ActiveFilterSorting
		appendViewActiveFilterSorting: function(by, type, qty){
			this.viewActivesFilterSorting = new ViewActiveFilterSorting({ model : by }, this, type, qty);
			$('.dest-active-filters').empty().append(this.viewActivesFilterSorting.el);
		},
		removeViewActiveFilterSorting: function(){
			if(this.viewActivesFilterSorting)
				this.viewActivesFilterSorting.remove();
		},

		// View Progressbar
		appendViewProgressbar: function(){
			this.viewProgressbar = new ViewProgressbar();
			$('.dest-active-filters').empty().append(this.viewProgressbar.el);
		},
		removeViewProgressbar: function(){
			if(this.viewProgressbar)
				this.viewProgressbar.remove();
		}
	});
return AppRouter;
});