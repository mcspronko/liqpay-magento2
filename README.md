<div align="center">
  <img src="https://img.shields.io/badge/magento-2.X-brightgreen.svg?logo=magento&longCache=true&style=flat-square" alt="Supported Magento Versions" />
  <a href="https://github.com/mcspronko/liqpay-magento2/graphs/commit-activity" target="_blank"><img src="https://img.shields.io/badge/maintained%3F-yes-brightgreen.svg?style=flat-square" alt="Maintained - Yes" /></a>
  <a href="https://opensource.org/licenses/MIT" target="_blank"><img src="https://img.shields.io/badge/license-MIT-blue.svg" /></a>
</div>

# LiqPay Extension for Magento 2
LiqPay payment integration extension for Magento 2.

Check out the [Wiki pages](https://github.com/mcspronko/liqpay-magento2/wiki) for the project details.

# Idea
The idea of this repository and contribution is to learn how to create payment integrations for Magento 2. Each and everyone can contribute.

## About LiqPay
Liqpay – is a payment system that allows easily send money from Visa or MasterCard cards to virtual account in Liqpay system linked to a mobile phone (cell phone) number. Later on you may send money to other phone numbers, withdraw money from Liqpay system to your card or leave money at your account and use it later.

## Screenshots

### Checkout Payment Page

![Checkout Payment Page](https://raw.githubusercontent.com/mcspronko/liqpay-magento2/master/docs/checkout-payment-page.png)

### Payment Information

![Payment Information](https://raw.githubusercontent.com/mcspronko/liqpay-magento2/master/docs/admin-order-view.png)

### Configuration Settings

![Configuration Settings](https://raw.githubusercontent.com/mcspronko/liqpay-magento2/master/docs/admin-config.png)

### Order Transaction Details Page

![Order Transaction Details Page](https://raw.githubusercontent.com/mcspronko/liqpay-magento2/master/docs/order-transaction-details.png)


# How to Contribute
0. Join the Discord [#liqpay-magento2](https://discord.gg/Ukwq3xQ) channel
1. Grab a ticket from the [issues](https://github.com/mcspronko/liqpay-magento-2/issues) page
2. Ask for guidance if needed in the #liqpay-magento2 chat
3. Clone the repository to your local environment
4. Implement changes
5. Create a Pull Request
6. Assign the Pull Request to @maxpronko

# Installation
## Composer

Download composer `wget http://getcomposer.org/composer.phar`

```bash
composer config repositories.pronko-liqpay git git@github.com:mcspronko/liqpay-magento2.git
composer require pronko/liqpay-magento2
```

## Modman
Download [modman](https://github.com/colinmollenhour/modman) `bash < <(wget -q --no-check-certificate -O - https://raw.github.com/colinmollenhour/modman/master/modman-installer)`

In the Magento 2 directory 
```bash
modman init
```

Clone the repository, run the command from Magento 2 root directory: 
```bash
modman clone git@github.com:mcspronko/liqpay-magento2.git
```

In order to update the repository with the changes from remote branch run the command:
```bash
modman update liqpay-magento2
``` 

# Authors

* [Max Pronko](https://www.maxpronko.com)

# Contributors

* Vitaliy Prokopov

# License
LiqPay extension for Magento 2 is licensed under the MIT License - see the LICENSE file for details
