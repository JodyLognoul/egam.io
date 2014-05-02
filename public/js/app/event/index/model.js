define(["backbone"], function(Backbone) {

    var EventModel = Backbone.Model.extend({
        initialize: function(){
			this.url = (this.id)?'/partyapi/' + this.id : '';
        }
    });
    return EventModel;
});