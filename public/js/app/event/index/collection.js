define(['backbone','model'], function(Backbone, EventModel) {

	var EventsCollection = Backbone.Collection.extend({

		model: EventModel,
		url: '/api/event',
		fetched: false,
		strategies: {
			id:			function (event) {return event.get("id"); },
			title:		function (event) { return event.get("title"); },
			address:	function (event) { return event.get("address").full; },
			host:		function (event) { return event.get("event_user")[0].username; },
			places:		function (event) { return event.get("max_place"); },
			eventdate:	function (event) { return event.get("event_date"); },
		},
		initialize: function(){
			this.listenFetch();
		},
		listenFetch: function(){
			var _this = this;
			this.on('sync', function(){
				_this.fetched = true;
			});
		},
		isFetched: function(){
			return this.fetched;
		},
		changeSort:function(sortProperty){
			this.comparator = this.strategies[sortProperty];
			this.sort();
		},
		filterByString: function(string){
			return this.models.filter( function(c) {
				return	(c.attributes.address.full.toLowerCase().indexOf(string.toLowerCase()) > -1) ||
						(c.attributes.title.toLowerCase().indexOf(string.toLowerCase()) > -1) ||
						(c.attributes.event_user[0].username.toLowerCase().indexOf(string.toLowerCase()) > -1);
			});
		}
	});

	return EventsCollection;

});
