<?php

require __DIR__.'/vendor/autoload.php';

use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;
use Omnipay\Openpay\Enums\OriginType;
use Omnipay\Openpay\Item;

$gateway = Omnipay::create('Openpay_Rest');

$gateway->setApiKey('3-373');
$gateway->setApiToken('180D731A-F9C8-437B-8FC0-8341196D9CF0');
$gateway->setApiVersion('1.20210320');
$gateway->setTestMode(true);

$card = new CreditCard([
    'billingFirstName'  => 'Example',
    'billingLastName'   => 'User',
    'email'             => 'example@example.com',
    'billingPhone'      => '1234567890',
    'billingAddress1'   => '6 Test Street',
    'billingAddress2'   => 'Test',
    'billingCity'       => 'Test',
    'billingState'      => 'TST',
    'billingPostcode'   => '1234',
    'billingCountry'    => 'AU',
    'shippingFirstName' => 'Example',
    'shippingLastName'  => 'User',
    'shippingPhone'     => '1234567890',
    'shippingAddress1'  => '6 Test Street',
    'shippingAddress2'  => 'Test',
    'shippingCity'      => 'Test',
    'shippingState'     => 'TST',
    'shippingPostcode'  => '1234',
    'shippingCountry'   => 'AU',
]);

$response = $gateway->authorize([
    'amount'          => 1000,
    'card'            => $card,
    'retailerOrderNo' => time(),
    'items'           => [
        new Item([
            'name'       => 'Item 1',
            'itemCode'   => '12345',
            'quantity'   => 3,
            'price'      => '30.00',
            'totalPrice' => '90.00',
        ]),
        new Item([
            'name'       => 'Shipping',
            'itemCode'   => '12345',
            'quantity'   => 1,
            'price'      => '110.00',
            'totalPrice' => '110.00',
        ]),
    ],
    'returnUrl' => 'https://example.com/return',
    'cancelUrl' => 'https://example.com/cancel',
    'failedUrl' => 'https://example.com/fail',
])->send();

var_dump($response->getData());
exit();

$response = $gateway->orderLimit([
    'origin' => OriginType::QUERY_ORIGIN_ONLINE,
])->send();

var_dump($response->getData());
exit();
