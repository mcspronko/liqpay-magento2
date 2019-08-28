/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list',
        'Pronko_LiqPayCheckout/js/model/config'
    ],
    function (Component, rendererList, renderComponentType) {
        'use strict';

       rendererList.push(renderComponentType.getComponent());

        return Component.extend({
            initialize: function () {
                this._super();
                console.log(window.checkoutConfig.payment);
                return this;
            }
        });
    }
);
