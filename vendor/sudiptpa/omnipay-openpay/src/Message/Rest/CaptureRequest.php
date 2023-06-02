<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class CaptureRequest.
 */
class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('orderId');

        return [
            'OrderId' => $this->getOrderId(),
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
        return parent::getEndpoint().vsprintf('orders/%s/capturepayment', [$this->getOrderId()]);
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new CaptureResponse($this, $data, $headers, $status);
    }
}
