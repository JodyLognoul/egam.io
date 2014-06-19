/* ========================================================================
	Input Picture Preview Plugin
 * ========================================================================
 	Jody Lognoul	
 * ========================================================================
 	Feb 2014	
 * ======================================================================== */

+function(){
	'use strict';

	// INPUTPICTUREPREVIEW PUBLIC CLASS DEFINITION
  // ===========================================

	var InputPicturePreview = function (element, options) {
		this.init('InputPicturePreview', element, options);
	};

  InputPicturePreview.DEFAULTS = {
    imgClass: 'img-thumbnail',
    targetClass: '.target',
    plusElemClass: '.plus-elem',
    rowClass: '.row'
  };

	InputPicturePreview.prototype.init = function (type, element, options) {
    this.$row           = $(element);
    this.options        = this.getOptions(options);
    this.refreshTarget();
  };
  
  InputPicturePreview.prototype.refreshTarget = function () {
    this.$currentElem   = this.$row.find(this.options.plusElemClass);
    
    this.$currentElem.removeClass('plus-elem');
    
    this.$target        = this.$currentElem.find(this.options.targetClass);
    this.$input         = this.$currentElem.find('input[type=file]');
    this.listen();
    this.$plusElem      = this.$currentElem.clone(true);
  };
  
  InputPicturePreview.prototype.listen = function () {
    this.$target.on('click', $.proxy(this.trigger, this));
    this.$input.on('change', $.proxy(this.change, this));
  };
  
  InputPicturePreview.prototype.change = function (e) {
    if (e.target.files === undefined) e.target.files = e.target && e.target.value ? [ {name: e.target.value.replace(/^.+\\/, '')} ] : [];
    if (e.target.files.length === 0) return;
    
    var file = e.target.files[0];
    var reader = new FileReader();
    var self = this;

    reader.onload = function(ev) {
      var $img = $('<img>').attr({
        'src': ev.target.result,
        'class': self.options.imgClass
      });
      e.target.files[0].result = ev.target.result;
      $img.css('max-height', parseInt(self.$target.css('max-height'), 10) - parseInt(self.$target.css('padding-top'), 10) - parseInt(self.$target.css('padding-bottom'), 10)  - parseInt(self.$target.css('border-top'), 10) - parseInt(self.$target.css('border-bottom'), 10));

      self.$target.html($img);
      self.refreshTarget();
    };
    this.appendPlusElem();
    reader.readAsDataURL(file);
  };
  InputPicturePreview.prototype.appendPlusElem = function () {
    this.$plusElem.appendTo(this.$row);
  };
  
  InputPicturePreview.prototype.trigger = function () {
    this.$input.trigger('click');
  };

  InputPicturePreview.prototype.getDefaults = function () {
    return InputPicturePreview.DEFAULTS;
  };

  InputPicturePreview.prototype.getOptions = function (options) {
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

	$.fn.inputPicturePreview = function(option) {
		return this.each(function(){
			var $this 	= $(this);
			var options = typeof option == 'object' && option;
			var data = new InputPicturePreview(this, options);

      if (typeof option == 'string') data[option]();

		})
	}

}(jQuery);