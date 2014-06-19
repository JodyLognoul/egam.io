define(["backbone"], function(Backbone) {

    var EventModel = Backbone.Model.extend({
        initialize: function(){
        	this.set("event_datetime", moment(this.get('event_datetime')).format('YYYY-MM-DD'));
			this.url = (this.id)?'/partyapi/' + this.id : '';
        },
        title: function(){
        	return 'lol';	
        },
        event_datetime: function(){
        	return this.get('event_datetime')+'lol';
        }
    });
    return EventModel;
});