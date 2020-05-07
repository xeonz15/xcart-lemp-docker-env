/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Shipping rates
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

define('wizard/steps/location', ['js/vue/vue'], function (XLiteVue) {
  XLiteVue.component('xlite-wizard-step-payment-yandex-money', {
    ready: function () {
    },

    data: function () {
      return {}
    },

    events: {},

    methods: {
      getRootElement: function () {
        return $(this.$el).closest('.online.yandex-money');
      },
      addMethod: function (method_id) {
        this.$dispatch('blockBody');

        var data = {
          id: method_id
        };

        data[xliteConfig.form_id_name] = xliteConfig.form_id;

        core.post(
          {
            target: 'payment_settings',
            action: 'add'
          },
          this.handleResponse,
          data
        );
      },
      handleResponse: function (xhr, status, response) {
        this.$dispatch('unblockBody');

        if (status === 'success') {
          this.getRootElement().addClass('added');
        }
      },
      switchMethod: function (method_id, event) {
        var switcher = $(event.currentTarget).closest('.switcher');

        switcher.addClass('loading');

        var url = {
          target: 'payment_settings',
          action: 'enable'
        };

        if (switcher.hasClass('enabled')) {
          url['action'] = 'disable';
        } else {
          url['action'] = 'enable';
        }

        switcher.toggleClass('enabled');

        var data = {
          id: method_id
        };

        data[xliteConfig.form_id_name] = xliteConfig.form_id;

        core.post(
          url,
          _.partial(this.handleSwitchResponse, switcher),
          data
        );
      },
      handleSwitchResponse: function (switcher, xhr, status, response) {
        switcher.removeClass('loading');

        if (status !== 'success') {
          switcher.toggleClass('enabled');
        }
      }
    }
  });
});