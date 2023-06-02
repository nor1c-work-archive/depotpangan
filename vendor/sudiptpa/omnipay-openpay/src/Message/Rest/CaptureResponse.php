<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class CaptureResponse.
 */
class CaptureResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    public function getOrderId()
    {
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

    public function getPurchasePrice()
    {
        return isset($this->data['purchasePrice']) ? $this->data['purchasePrice'] : null;
    }
}
