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

        return Component.extend({
            /**
             *  @returns this
             */
            initialize: function () {
                this._super();

                rendererList.push(
                    renderComponentType.getComponent(this.connection_types)
                );

                return this;
            },
        });
    }
);
