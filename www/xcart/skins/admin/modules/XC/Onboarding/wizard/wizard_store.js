/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * store.js
 *
 * Copyright (c) 2001-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */
define('wizard/store',
  [
    'vue/vue',
    'vue/vuex',
  ],
  function(Vue, Vuex) {

    function accessLastLogo() {
      return jQuery.cookie('Wizard_lastLogo') || null;
    }

    function persistLastLogo(url) {
      jQuery.cookie('Wizard_lastLogo', url);
    }

    return new Vuex.Store({
      state: {
        product: null,
        demoCatalog: null,
        demoRemovalSkip: false,
        logo: accessLastLogo(),
        logoParams: null
      },
      mutations: {
        UPDATE_PRODUCT: function (state, value) {
          state.product = value;
        },
        UPDATE_LOGO: function (state, value) {
          state.logo = value;
          persistLastLogo(value);
        },
        UPDATE_LOGO_PARAMS: function (state, value) {
          state.logoParams = value;
        },
        UPDATE_DEMO_CATALOG_FLAG: function (state, value) {
          state.demoCatalog = value;
        },
        MARK_DEMO_REMOVAL_SKIP: function (state, value) {
          state.demoRemovalSkip = value;
        }
      }
    });
  });