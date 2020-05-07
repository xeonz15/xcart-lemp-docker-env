/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Qiwi mobile phone input controller
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

function checkQiwiPhoneNumber(field, rules, i, options)
{
  var value = jQuery.trim(field.val()).replace(/[^\+0-9]/g, '');

  if (-1 === value.search(/^\+[0-9]{2,15}$/)) {
    return core.t('The phone number must be in international format (e.g. +7-111-111-11-11)');

  } else if (field.val() != value) {
    field.val(value);
  }
}

core.bind(
  'checkout.common.anyChange',
  function() {
    var addressPhoneVal = jQuery('#shippingaddress-phone').val();
    var qiwiPhone = jQuery('#payment-qiwi-phone-number');

    if (qiwiPhone.length && addressPhoneVal && !qiwiPhone.val()) {
      qiwiPhone.val(addressPhoneVal);
      qiwiPhone.get(0).commonController.validate();
    }
  }
);

core.bind(
  'checkout.paymentTpl.postprocess',
  function() {
    var qiwiPhone = jQuery('#payment-qiwi-phone-number');
    if (qiwiPhone.length) {
      qiwiPhone.get(0).commonController.validate();
    }
  }
);

