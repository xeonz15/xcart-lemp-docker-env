/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Extensions menu node
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

core.microhandlers.add(
  'ExtensionsNode',
  '#leftMenu .extensions',
  function () {
    $('body').tooltip({
      selector: '.compressed .extensions .link',
      placement: 'right',
      container: 'body'
    })
  }
);

function PopupButtonHotAddons() {
  PopupButtonHotAddons.superclass.constructor.apply(this, arguments);
}

extend(PopupButtonHotAddons, PopupButton);

PopupButtonHotAddons.prototype.pattern = '.action-widget .extensions';

core.autoload(PopupButtonHotAddons);
