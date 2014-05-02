// /public/js/app/event/index/router.js

define(['jquery', 'backbone','underscore','moment','collection','collectionView','activeFilterSortingView'], function($, Backbone, _, moment, EventsCollection, EventsView, ActiveFilterSortingView){

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

			this.eventsCollection.fetch().then(function(){

				_this.removeActiveFilterSortingView();
				_this.eventsCollection.changeSort('id');
				_this.appendEventsView(_this.eventsCollection);

			});
		},
		sortRoute: function(dir, by){
			var _this = this;

			this.eventsCollection.fetch().then(function(){

				_this.appendActiveFilterSortingView(by, 'sort');
				_this.eventsCollection.changeSort(by);
				_this.appendEventsView(_this.eventsCollection);

			});

		},
		filterRoute: function(by, query){
			var filteredEventsCollection, _this = this;

			this.eventsCollection.fetch().then(function(){

				if( by === 'eventdate' ){	// search by event_date
					var event_date = moment(query).format('YYYY-MM-DD');

					_this.appendActiveFilterSortingView(event_date, 'filter.eventdate');
					filteredEventsCollection = new EventsCollection(_this.eventsCollection.where({ 'event_date': event_date }));

				}else if(by === 's'){		// search by string
					_this.appendActiveFilterSortingView(query, 'filter.s');
					filteredEventsCollection = new EventsCollection(_this.eventsCollection.filterByString(query));
				}
				_this.appendEventsView(filteredEventsCollection);

			});

		},
		appendEventsView: function(_collection){
			var eventsView = new EventsView({ collection: _collection }, this);
			$('.dest-bb-events').empty().append(eventsView.el);
		},
		appendActiveFilterSortingView: function(by, type){
			this.activesFilterSortingView = new ActiveFilterSortingView({ model : by }, this, type);
			$('.dest-active-filters').empty().append(this.activesFilterSortingView.el);
		},
		removeActiveFilterSortingView: function(){
			if(this.activesFilterSortingView)
				this.activesFilterSortingView.remove();
		}
	});
return AppRouter;
});