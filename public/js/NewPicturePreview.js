/* ========================================================================
    Input Picture Preview Plugin
 * ========================================================================
    Jody Lognoul	
 * ========================================================================
    Feb 2014	
    * ======================================================================== */
    +function(){
     'use strict';

  // SlotPicture PUBLIC CLASS DEFINITION
  // ===========================================
  var SlotPicture = function () {};
  
  SlotPicture.DEFAULTS = {
    img: 'img-thumbnail',
    target: '.target',
    input: 'input[type=file]'
  };

  SlotPicture.prototype.init = function($content, $container, name){
    console.log(name);
    this.options    = SlotPicture.DEFAULTS;
    this.$content   = $content;
    this.$target    = $content.find(this.options.target);
    this.$input     = $content.find(this.options.input);
    this.isPlusElem = true;
    this.$content.appendTo($container);
    this.$input.attr('name', name);
    this.listen();
  };
  
  SlotPicture.prototype.listen = function(){
    this.$target.on('click', $.proxy(this.trigger, this));
    this.$input.on('change', $.proxy(this.change, this));
  };

  SlotPicture.prototype.trigger = function () {
    this.$input.trigger('click');
  };
  
  SlotPicture.prototype.change = function (e) {
    if (e.target.files === undefined) e.target.files = e.target && e.target.value ? [ {name: e.target.value.replace(/^.+\\/, '')} ] : [];
    if (e.target.files.length === 0) return;
    
    var file = e.target.files[0];
    var reader = new FileReader();
    var self = this;

    reader.onload = function(ev) {
      var $img = $('<img>').attr({
        'src': ev.target.result,
        'class': self.options.img
      });
      e.target.files[0].result = ev.target.result;
      $img.css('max-height', parseInt(self.$target.css('max-height'), 10) - parseInt(self.$target.css('padding-top'), 10) - parseInt(self.$target.css('padding-bottom'), 10)  - parseInt(self.$target.css('border-top'), 10) - parseInt(self.$target.css('border-bottom'), 10));

      self.$target.html($img);

      // If this slot is a PlusElem and modified, we fire the event `npp.new.slot`
      if (self.isPlusElem) {
        document.dispatchEvent(new Event('npp.new.slot'));
      }

      // This slot is not a PlusElem slot anymore
      self.isPlusElem = false;
      console.log(self.$input.val());
    };
    reader.readAsDataURL(file);
  };


  // NewPicturePreview PUBLIC CLASS DEFINITION
  // ===========================================
  var NewPicturePreview = function (element, options) {
    this.init('NewPicturePreview', element, options);
  };

  NewPicturePreview.DEFAULTS = {
    plusElemClass: '.plus-elem',
    rowClass: '.row'
  };

  NewPicturePreview.prototype.init = function (type, element, options) {
    this.no = 0;
    this.$container   = $(element);
    this.options      = this.getOptions(options);
    this.$baseContent = $('<div class="col-xs-6 col-md-4 plus-elem"><input type="file" class="hidden"><div class="target"><span class="glyphicon glyphicon-plus"></span></div></div>');

    // Init the first slot
    new SlotPicture().init(this.$baseContent.clone(), this.$container, 'picture-' + this.no);

    // Listen
    this.listen();
  };

  NewPicturePreview.prototype.listen = function () {
    var self = this;
    document.addEventListener('npp.new.slot', function(){self.addSlot(); }, false); };

  NewPicturePreview.prototype.addSlot = function () {
    this.no++;
    var newSlot = new SlotPicture();
    newSlot.init(this.$baseContent.clone(),this.$container, 'picture-' + this.no);
  };

  NewPicturePreview.prototype.getDefaults = function () {
    return NewPicturePreview.DEFAULTS;
  };

  NewPicturePreview.prototype.getOptions = function (options) {
    options = $.extend({}, this.getDefaults(), options);

    if (options.delay && typeof options.delay == 'number') {
      options.delay = {
        show: options.delay,
        hide: options.delay
      };
    }

    return options;
  };

	// PLUGIN DEFINITION
	// =================

	$.fn.newPicturePreview = function(option) {
		return this.each(function(){
			var $this 	= $(this);
			var options = typeof option == 'object' && option;
			var data = new NewPicturePreview(this, options);

      if (typeof option == 'string') data[option]();

    })
	}

}(jQuery);