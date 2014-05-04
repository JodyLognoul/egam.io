define(['underscore','collection','viewCollection'],function(_, EventsCollection, ViewEvents) {

	var ControllerEventsIndex = function(options){
		this.initialize(options);
		this.listen();
	};

	_.extend(ControllerEventsIndex.prototype, {
		initialize: function(options){
			this.router				= options.router;
			this.collection			= new EventsCollection();
		},
		listen: function(){
			document.addEventListener('datetimepickerEvents',this.actionDatePicker.bind(this));
		},
		actionDatePicker: function(e){
			this.router.navigate('filter/eventdate/' + e.detail, {trigger: true});
		},
		actionDefault: function(){
			if (this.fetch(this.actionDefault)) {
				var viewEvents = new ViewEvents({ collection: this.collection }, this.router);
				$('.dest-bb-events').empty().append(viewEvents.el);
			}
		},
		fetch: function(callback){
			if (this.collection.length === 0) {
				this.collection.fetch().then(callback.bind(this));
				return false;
			}
			return true;
		}
	});

	return ControllerEventsIndex;
	});

