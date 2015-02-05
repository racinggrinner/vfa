/**
 * Bunbun jQuery Plugin
 *
 * A healthy hamburger menu
 *
 * @TODO Add unfocus functionality to elements (optional for each instance)
 */
;(function ($, document) {
  'use strict';

  $.fn.bunbun = function(opts) {
    var $this = $(this),
        self = this;

    var defaults = {
        selector: $('.bunbun-element'),
        activeClass: 'bunbun-btn-active',
        toggleClass: 'bunbun-element-open',
        clickEvent: 'touchstart mousedown',

        open: function() {},
        close: function() {},
        toggle: function() {},
        unfocus: function() {}
      };

    var options = $.extend({}, defaults, opts);

    var isClosed = false;
    var $element = options.selector;

    var close = function(e) {
      $this.removeClass(options.activeClass);
      $element.addClass(options.toggleClass);

      isClosed = true;

      if(e && 'function' === typeof options.close) {
        options.close.call(self, e, $this, $element);
      }
    };

    var open = function(e) {
      $this.addClass(options.activeClass);
      $element.removeClass(options.toggleClass);

      isClosed = false;

      if(e && 'function' === typeof options.open) {
        options.open.call(self, e, $this, $element);
      }
    };

    var toggle = function(e) {
      if(isClosed) {
        open(e);
      } else {
        close(e);
      }

      if(e && 'function' === typeof options.toggle) {
        options.toggle.call(self, e, $this, $element);
      }
    };

    $this.on(options.clickEvent, function (e) {
      e.stopPropagation();
      toggle(e);
    });

    return {
      open: open,
      close: close,
      toggle: toggle
    };
  };


}(jQuery, document));
