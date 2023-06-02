<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class OrderLimitRequest.
 */
class OrderLimitRequest extends AbstractRequest
{
    public function getOrigin()
    {
        return $this->getParameter('origin');
    }

    public function setOrigin($value)
    {
        return $this->setParameter('origin', $value);
    }

    public function getData()
    {
        return [];
    }

    public function sendData($data = [])
    {
        $response = $this->httpClient->request('GET', $this->getEndpoint(), $this->getHeaders());

        $result = json_decode($response->getBody()->getContents(), true);

        return $this->createResponse($result, $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint()."orders/limits?origin={$this->getOrigin()}";
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new OrderLimitResponse($this, $data, $headers, $status);
    }
}
