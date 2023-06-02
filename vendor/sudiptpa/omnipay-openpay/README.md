# Omnipay: Openpay

**Openpay driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Openpay support for Omnipay.

[![StyleCI](https://github.styleci.io/repos/173117409/shield?branch=master&style=flat)](https://github.styleci.io/repos/173117409)
[![Latest Stable Version](https://poser.pugx.org/sudiptpa/omnipay-openpay/v/stable)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![Total Downloads](https://poser.pugx.org/sudiptpa/omnipay-openpay/downloads)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![License](https://poser.pugx.org/sudiptpa/omnipay-openpay/license)](https://packagist.org/packages/sudiptpa/omnipay-openpay)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require `league/omnipay` and `sudiptpa/omnipay-openpay` with Composer:

```
composer require league/omnipay sudiptpa/omnipay-openpay
```

## Basic Usage

```php
    use Omnipay\Omnipay;

    $gateway = Omnipay::create('Openpay_Shared');

    $gateway->setMerchantId('xxxxxxx|xxxxxxx-xxx-xxxx');
    $gateway->setAuthToken('xxxxxxxx');

    $gateway->setTestMode(true);

    try {
        $response = $gateway->order([
            'purchasePrice' => '409.50',
        ])->send();

        $planID = $response->getPlanID();

        $response = $gateway->purchase([
            'firstName' => 'Sujip',
            'lastName' => 'Thapa',
            'returnUrl' => 'https://example.com/payment/1/complete',
            'cancelUrl' => 'https://example.com/payment/1/cancel',
            'failedUrl' => 'https://example.com/payment/1/failed',
            'retailerOrderNo' => '145000112',
            'email' => 'buy@example.com',
            'postCode' => '1234',
            'city' => 'Test',
            'address1' => 'Test City',
            'state' => 'ABCD',
            'phone' => '99987765555',
            'purchasePrice' => '409.50',
            'planID' => $planID,
        ])->send();

        if ($response->isRedirect()) {
            $response->redirect();
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }

    // Complete Purchase
    $response = $gateway->orderStatus([
        'planID' => $order->transaction_id,
    ])->send();

    if ($response->isApproved()) {
        // success
    }
```
For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Contributing

Contributions are **welcome** and will be fully **credited**.

Contributions can be made via a Pull Request on [Github](https://github.com/sudiptpa/openpay).


## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/sudiptpa/openpay/issues),
or better yet, fork the library and submit a pull request.
