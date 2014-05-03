// /public/js/app/event/index/router.js

define(['jquery', 'backbone','underscore','moment','collection','viewCollection','viewActiveFilterSorting','viewProgressbar'], function($, Backbone, _, moment, EventsCollection, ViewEvents, ViewActiveFilterSorting, ViewProgressbar){

	var AppRouter = Backbone.Router.extend({
		routes: {
			''					:'defaultRoute',
			'sort/:dir/:by'		:'sortRoute',
			'filter/:by/:query'	:'filterRoute',
		},
		initialize: function(){
			this.listen();
			this.eventsCollection = new EventsCollection();
		},
		listen:function(){
			document.addEventListener('datetimepickerEvents',this.datePickerAction.bind(this));
		},
		datePickerAction: function(e){
			this.navigate('filter/eventdate/' + e.detail, {trigger: true});
		},
		defaultRoute: function(){
			var _this = this;
			this.appendViewProgressbar();
			this.eventsCollection.fetch().then(function(){

				_this.removeViewActiveFilterSorting();
				_this.eventsCollection.changeSort('id');
				_this.appendViewEvents(_this.eventsCollection);
				_this.removeViewProgressbar();
			});
		},
		sortRoute: function(dir, by){
			var _this = this;
			this.appendViewProgressbar();
			this.eventsCollection.fetch().then(function(){

				_this.viewAppendActiveFilterSorting(by, 'sort');
				_this.eventsCollection.changeSort(by);
				_this.appendViewEvents(_this.eventsCollection);
				_this.removeViewProgressbar();
			});

		},
		filterRoute: function(by, query){
			var filteredEventsCollection, _this = this;

			this.appendViewProgressbar();
			this.eventsCollection.fetch().then(function(){

				if( by === 'eventdate' ){	// search by event_date
					var event_date = moment(query).format('YYYY-MM-DD');

					_this.viewAppendActiveFilterSorting(event_date, 'filter.eventdate');
					filteredEventsCollection = new EventsCollection(_this.eventsCollection.where({ 'event_date': event_date }));

				}else if(by === 's'){		// search by string
					_this.viewAppendActiveFilterSorting(query, 'filter.s');
					filteredEventsCollection = new EventsCollection(_this.eventsCollection.filterByString(query));
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
		viewAppendActiveFilterSorting: function(by, type){
			this.viewActivesFilterSorting = new ViewActiveFilterSorting({ model : by }, this, type);
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