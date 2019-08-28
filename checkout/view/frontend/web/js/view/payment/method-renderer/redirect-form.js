/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
/*browser:true*/
/*global define*/
define([
    'Magento_Checkout/js/view/payment/default'
], function(Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Pronko_LiqPayCheckout/payment/redirect-form',
            code: 'pronko_liqpay'
        },

        /**
         * @returns {String}
         */
        getCode: function () {
            return this.code;
        },

        /**
         * @returns {Boolean}
         */
        isActive: function () {
            return this.getCode() === this.isChecked();
        },

        /**
         * @param {String} field
         * @returns {String}
         */
        getSelector: function (field) {
            return '#' + this.getCode() + '_' + field;
        },
    })
});
