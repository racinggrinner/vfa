/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {
  'use strict';

  var $loginBox,
      $navGroup,
      $subscriptionBox,
      $subscribeBun,
      $loginBun;

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.site_navigation = {
    attach: function(context, settings) {

      /**
      * TODO FOR PRODUCTION
      *
      * @TODO Hide elements, activated by JavaScript. This is important
      * in order to keep important elements on screen, when JavaScript
      * is disabled.
      */

      $navGroup = $('#nav-group');

      $('.js-nav-toggle').bunbun({
        selector: $navGroup,
        activeClass: 'nav-btn--active',
        toggleClass: 'nav-group--is-closed'
      }).close();

      var $primaryItems = $('.nav--primary > .nav__item'),
          $secondaryNavs = $('.nav--secondary');

      $primaryItems.on('touchdown mousedown', function (e) {
        var $this = $(this),
            $secondaryNav = $this.find('.nav--secondary');

        e.preventDefault();

        if ($this.hasClass('nav__item')) {
          if (!$this.hasClass('item--active')) {
            $secondaryNavs.each(function() {
              $(this).removeClass('nav--open');
            });
            $primaryItems.each(function() {
              $(this).removeClass('item--active');
            });
          }
          $this.toggleClass('item--active');
          $secondaryNav.toggleClass('nav--open');
        } else {
          $this.addClass('item--active');
          $secondaryNav.addClass('nav--open');
        }
      });

      $(document).on('click', function(event) {

        var $secondaryNav = $(event.target).siblings('.nav--secondary');
        var $test = $(event.target).closest('.nav--secondary');
        if (!$secondaryNav.length && !$test.length) {
          $('.nav.nav--secondary.nav-grid').removeClass('nav--open');

          $primaryItems.not(this).removeClass('item--active');
          $secondaryNavs.not($secondaryNav).removeClass('nav--open');
        }
      });
    }
  };

  /**
   * Toggle the sites login form
   *
   * Note: The login and subscribe forms are related from a UX perspective.
   * Therefore when one area is toggled a check is made to hide the other.
   *
   * 1. Toggle the login form
   * 2. Toggle the login form from the bottom bar
   */

  Drupal.behaviors.login_toggle = {
    attach: function(context, settings) {

      $loginBox = $('#login-box');

      $loginBun = $('.js-toggle-sign-in').bunbun({
        selector: $loginBox,
        activeClass: 'top-bar__toggle--is-active',
        toggleClass: 'top-bar--is-closed',
        open: function() {
          $subscribeBun.close();
        }
      }).close();
    }

  };

  /**
   * Toggle the sites subscription form
   */

  Drupal.behaviors.subscribe_toggle = {
    attach: function(context, settings) {

      $subscriptionBox = $('#subscription-box');

      $subscribeBun = $('.js-toggle-subscribe').bunbun({
        selector: $subscriptionBox,
        activeClass: '',
        toggleClass: 'bottom-bar--is-closed',
        open: function(e) {
          $.cookie('bottom_bar_state', 'shown');
        },
        close: function() {
          $.cookie('bottom_bar_state', 'hidden');
        }
      });
    }

  };

}(jQuery, Drupal, window, document));
