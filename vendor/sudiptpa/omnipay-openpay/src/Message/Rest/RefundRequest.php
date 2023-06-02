<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class RefundRequest.
 */
class RefundRequest extends AbstractRequest
{
    public function getFullRefund()
    {
        return $this->getParameter('fullRefund');
    }

    public function setFullRefund($value)
    {
        return $this->setParameter('fullRefund', $value);
    }

    public function getReducePriceBy()
    {
        return $this->getParameter('reducePriceBy');
    }

    public function setReducePriceBy($value)
    {
        return $this->setParameter('reducePriceBy', $value);
    }

    public function getData()
    {
        $this->validate('fullRefund', 'reducePriceBy');

        return [
            'fullRefund'    => $this->getFullRefund(),
            'reducePriceBy' => $this->getReducePriceBy() * 100,
        ];
    }

    public function sendData($data = [])
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint(), $this->getHeaders(), json_encode($data));

        $result = json_decode($response->getBody()->getContents(), true);

        return $this->createResponse($result, $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s/refund', [$this->getOrderId()]);
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RefundResponse($this, $data, $headers, $status);
    }
}
