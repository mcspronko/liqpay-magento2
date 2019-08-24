/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component, rendererList) {
        'use strict';

        rendererList.push({
            type: 'pronko_liqpay',
            component: 'Pronko_LiqPayCheckout/js/view/payment/method-renderer/cc-form'
        });

        return Component.extend({});
    }
);
