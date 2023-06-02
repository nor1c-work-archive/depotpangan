<?php

namespace Omnipay\Openpay;

use Omnipay\Common\AbstractGateway;

/**
 * Class RestGateway.
 */
class RestGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Openpay Rest';
    }

    public function getDefaultParameters()
    {
        return [
            'apiKey'   => '',
            'apiToken' => '',
            'testMode' => true,
        ];
    }

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

    public function getApiVersion()
    {
        return $this->getParameter('apiVersion');
    }

    public function setApiVersion($value)
    {
        return $this->setParameter('apiVersion', $value);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\Rest\OrderLimitRequest
     */
    public function orderLimit(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\Rest\OrderLimitRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\Rest\AuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\Rest\AuthorizeRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\Rest\CaptureRequest
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\Rest\CaptureRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\Rest\FetchTransactionRequest
     */
    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\Rest\FetchTransactionRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\Rest\RefundRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\Rest\RefundRequest', $parameters);
    }
}
