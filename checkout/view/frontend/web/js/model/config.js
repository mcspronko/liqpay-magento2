/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
/*browser:true*/
/*global define*/
define([], function () {
    return {
        /**
         * @return JSON
         */
        getComponent: function () {
            let component = {};
            let connectionType = this.getConnectionType();

            switch (connectionType) {
                case 'built_in_form':
                    component = {
                        type: 'pronko_liqpay',
                        component: 'Pronko_LiqPayCheckout/js/view/payment/method-renderer/cc-form'
                    };
                    break;
                case 'redirect':
                    component = {
                        type: 'pronko_liqpay',
                        component: 'Pronko_LiqPayCheckout/js/view/payment/method-renderer/redirect-form'
                    };
                    break;
                    //TODO Have to change for widget payment type
                case 'widget':
                    component = {};
                    break;
            }

            return component;
        },

        /**
         * @return string
         */
        getConnectionType: function () {
            return window.checkoutConfig.payment.pronko_liqpay.connection_type;
        }
    };
});
