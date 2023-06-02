<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class AbstractRequest.
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndpoint = 'https://api.myopenpay.com.au/v1/merchant/';

    protected $testEndpoint = 'https://api.training.myopenpay.com.au/v1/merchant/';

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getApiToken()
    {
        return $this->getParameter('apiToken');
    }

    public function setApiToken($value)
    {
        return $this->setParameter('apiToken', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    public function getApiVersion()
    {
        return $this->getParameter('apiVersion');
    }

    public function setApiVersion($value)
    {
        return $this->setParameter('apiVersion', $value);
    }

    public function getHeaders()
    {
        $token = base64_encode("{$this->getApiKey()}:{$this->getApiToken()}");

        return [
            'Content-Type'    => 'application/json',
            'Accept'          => 'application/json',
            'openpay-version' => $this->getApiVersion(),
            'Authorization'   => "Basic {$token}",
            'Cache-Control'   => 'no-cache',
            'Connection'      => 'close',
        ];
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new AbstractResponse($this, $data, $headers, $status);
    }
}
