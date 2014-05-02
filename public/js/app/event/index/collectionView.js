define(['backbone','jquery','modelView'],function(Backbone, $, EventView) {
	var PartiesView = Backbone.View.extend({
        tagName: 'div',
        className: 'row',
        initialize: function(collection, router) {
            this.router = router;
            this.collection.each(this.render, this);
            this.listenSearch();
        },
        render: function( eventsCollection ) {
            var eventView = new EventView({ model: eventsCollection });
            this.$el.append( eventView.el );
        },
        listenSearch: function(){
            var _this = this,
                delayedCallback;

            $('.search-query').on('keyup',function(){
                var query = $(this).val();
                
                clearTimeout( delayedCallback );
                delayedCallback = setTimeout(function(){
                    _this.router.navigate(query.length > 1 ? '#/filter/s/' + query : '', {trigger: true});
                },500);
            });
        }
    });

	return PartiesView;
});