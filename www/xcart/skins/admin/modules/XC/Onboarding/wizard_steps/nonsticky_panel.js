/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Controller
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

define('form_model/sticky_panel/non_sticky', ['js/vue/vue', 'form_model/sticky_panel'], function (XLiteVue) {

  XLiteVue.component('xlite-sticky-panel', {
    methods: {
      processChange: function(newValue, oldValue) {
        if (newValue !== oldValue) {
          var buttons = jQuery(this.$el).find('button').not('.always-enabled');

          buttons
            .removeClass('disabled')
            .removeAttr('disabled');

          if (newValue) {
            buttons.each(function() {
              $(this).removeClass('pristine').addClass('dirty');
              $(this).text($(this).data('dirty'));
            });
          } else if (this.formState.pristine) {
            buttons.each(function() {
              $(this).removeClass('dirty').addClass('pristine');
              $(this).text($(this).data('pristine'));
            });
          } else {
            buttons
              .addClass('disabled')
              .prop('disabled', 'disabled');
          }
        }
      },
      processReposition: function () {
      },
    }
  });

});
