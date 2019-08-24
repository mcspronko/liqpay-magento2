# LiqPay Extension for Magento 2
LiqPay payment integration extension for Magento 2.

Check out the [Wiki pages](https://github.com/mcspronko/liqpay-magento2/wiki) for the project details.

# Idea
The idea of this repository and contribution is to learn how to create payment integrations for Magento 2. Each and everyone can contribute.

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

Install `php composer.phar require mcspronko/liqpay-magento2`

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
