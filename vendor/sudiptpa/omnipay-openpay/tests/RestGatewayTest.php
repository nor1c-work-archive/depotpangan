<?php

namespace Omnipay\Openpay;

use Omnipay\Openpay\Message\Rest\AuthorizeResponse;
use Omnipay\Openpay\Message\Rest\CaptureResponse;
use Omnipay\Openpay\Message\Rest\FetchTransactionResponse;
use Omnipay\Openpay\Message\Rest\OrderLimitResponse;

class RestGatewayTest extends \Omnipay\Tests\GatewayTestCase
{
    /** @var RestGateway */
    protected $gateway;

    public function getApiKey()
    {
        return '3-373';
    }

    public function getApiToken()
    {
        return '180D731A-F9C8-437B-8FC0-8341196D9CF0';
    }

    public function getTestMode()
    {
        return true;
    }

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new RestGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->initialize([
            'apiKey'   => $this->getApiKey(),
            'apiToken' => $this->getApiToken(),
            'testMode' => $this->getTestMode(),
        ]);
    }

    public function testOrderLimit()
    {
        $this->setMockHttpResponse('RestOrderLimitResponse.txt');

        /** @var OrderLimitResponse $response */
        $response = $this->gateway->orderLimit()->send();
        $this->assertInstanceOf(OrderLimitResponse::class, $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertEquals(5000, $response->getMinPrice());
        $this->assertEquals(500000, $response->getMaxPrice());
    }

    public function testAuthorize()
    {
        $this->setMockHttpResponse('RestAuthorizeResponse.txt');

        /** @var AuthorizeResponse $response */
        $response = $this->gateway->authorize($this->getOptionsForAuthorize())->send();

        $this->assertInstanceOf(AuthorizeResponse::class, $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertNotEmpty($response->getOrderId());
        $this->assertEquals('https://retailer.myopenpay.com.au/websalestraining/?TransactionToken=Al5dE65ZExKP8jDF53iQKmFKocB24McXntfc3c4iJI21uQjH6YAK%2BGFnH4Npi7coFvf%2BMYGgXr4WwrCoDFS%2FHoqLtu9Ulbe2G4%2F0cly%2BBeI%3D', $response->getRedirectUrl());
    }

    public function testCapture()
    {
        $this->setMockHttpResponse('RestCaptureResponse.txt');

        /** @var CaptureResponse $response */
        $response = $this->gateway->capture(['orderId' => 3000000071096])->send();

        $this->assertInstanceOf(CaptureResponse::class, $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('3000000071096', $response->getOrderId());
    }

    public function testOrderStatus()
    {
        $this->setMockHttpResponse('RestFetchTransactionResponse.txt');

        /** @var FetchTransactionResponse $response */
        $response = $this->gateway->fetchTransaction(['orderId' => 3000000071096])->send();

        $this->assertInstanceOf(FetchTransactionResponse::class, $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('3000000071096', $response->getOrderId());
        $this->assertEquals('Active', $response->getPlanStatus());
        $this->assertEquals('Approved', $response->getOrderStatus());
    }

    public function getOptionsForAuthorize()
    {
        return [
            'amount'          => '200.00',
            'card'            => $this->getValidAUCard(),
            'returnUrl'       => 'https://example.com/return',
            'cancelUrl'       => 'https://example.com/cancel',
            'failedUrl'       => 'https://example.com/fail',
            'retailerOrderNo' => (string) rand(10000, 99999),
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
                    'itemCode'   => '-',
                    'quantity'   => 1,
                    'price'      => '110.00',
                    'totalPrice' => '110.00',
                ]),
            ],
        ];
    }

    public function getValidAUCard()
    {
        return [
            'firstName'        => 'Example',
            'lastName'         => 'User',
            'email'            => 'customer@gmail.com',
            'phone'            => '0400123123',
            'billingAddress1'  => '123 Billing St',
            'billingAddress2'  => 'Billsville',
            'billingCity'      => 'Billstown',
            'billingPostcode'  => '3133',
            'billingState'     => 'VIC',
            'billingCountry'   => 'AU',
            'billingPhone'     => '0400 123 123',
            'shippingAddress1' => '123 Shipping St',
            'shippingAddress2' => 'Shipsville',
            'shippingCity'     => 'Shipstown',
            'shippingPostcode' => '3000',
            'shippingState'    => 'VIC',
            'shippingCountry'  => 'AU',
            'shippingPhone'    => '03 8500 0000',
        ];
    }
}
