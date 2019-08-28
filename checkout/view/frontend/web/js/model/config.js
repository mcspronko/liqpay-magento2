/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
/*browser:true*/
/*global define*/
define([], function () {
    return {
        /**
         * @return {component: string, type: string}
         */
        getComponent: function (connectionTypes) {
            let connectionType = this.getConnectionType();

            let component = {
                type: 'pronko_liqpay',
                component: connectionTypes[connectionType]
            };

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
