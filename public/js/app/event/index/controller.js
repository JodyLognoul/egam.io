define(['underscore','collection','viewCollection','viewProgressbar','viewActiveFilterSorting'],function(_, EventsCollection, ViewEvents, ViewProgressbar, ViewActiveFilterSorting) {

	var ControllerEventsIndex = function(options){
		this.initialize(options);
		this.listen();
	};

	_.extend(ControllerEventsIndex.prototype, {
		options: {
			defaultSortedBy: 'id'
		},
		initialize: function(options){
			this.router				= options.router;
			this.collection			= new EventsCollection();
		},
		listen: function(){
			document.addEventListener('datetimepickerEvents',this.actionDatePicker.bind(this));
		},
		// ACTIONS
		actionDatePicker: function(e){
			this.router.navigate('filter/eventdate/' + e.detail, {trigger: true});
		},
		actionDefault: function(){
			if (this.fetch(this.actionDefault)) {
				this.collection.changeSort(this.options.defaultSortedBy);
				this.appendViewEvents(this.collection);
				this.removeViewProgressbar(); // Appended in this.fetch()
			}
		},
		actionSort: function(params){
			if (this.fetch(this.actionSort, params)) {
				this.collection.changeSort(params[0]);
				this.appendViewEvents(this.collection);
				this.appendViewActiveFilterSorting(params[0], 'sort' ,this.collection.length);
				this.removeViewProgressbar(); // Appended in this.fetch()
			}
		},
		actionFilter: function(params){
			if (this.fetch(this.actionSort, params)) {
				var filteredCollection;

				// param[0] egale a 'by'  voir (public/js/app/event/index/router.js)
				// param[1] egale a 'query' voir (public/js/app/event/index/router.js)

				if( params[0] === 'eventdate' ){	// search by event_datetime
					var event_datetime = moment(params[1]).format('YYYY-MM-DD');
					filteredCollection = new EventsCollection(this.collection.where({ 'event_datetime': event_datetime }));
					this.appendViewActiveFilterSorting(event_datetime, 'filter.eventdate', filteredCollection.length);

				}else if(params[0] === 's'){				// search by string
					filteredCollection = new EventsCollection(this.collection.filterByString(params[1]));
					this.appendViewActiveFilterSorting(params[1], 'filter.s',filteredCollection.length);
				}

				this.appendViewEvents(filteredCollection);
				this.removeViewProgressbar(); // Appended in this.fetch()
			}
		},
		// APPEND METHODS
		// Events
		appendViewEvents: function(_collection){
			var viewEvents = new ViewEvents({ collection: _collection }, this.router);
			$('.dest-bb-events').empty().append(viewEvents.el);
		},
		// Progressbar
		appendViewProgressbar: function(){
			this.viewProgressbar = new ViewProgressbar();
			$('.dest-active-filters').empty().append(this.viewProgressbar.el);
		},
		removeViewProgressbar: function(){
			if(this.viewProgressbar)
				this.viewProgressbar.remove();
		},
		// ActiveFilterSorting
		appendViewActiveFilterSorting: function(by, type, qty){
			this.viewActivesFilterSorting = new ViewActiveFilterSorting({ model : by }, this.router, type, qty);
			$('.dest-active-filters').empty().append(this.viewActivesFilterSorting.el);
		},
		removeViewActiveFilterSorting: function(){
			if(this.viewActivesFilterSorting)
				this.viewActivesFilterSorting.remove();
		},
		// FETCH
		fetch: function(callback, params){
			this.appendViewProgressbar();
			if (this.collection.length === 0) {
				this.collection.fetch().then(callback.bind(this, params));
				return false;
			}
			return true;
		}
	});

return ControllerEventsIndex;
});

