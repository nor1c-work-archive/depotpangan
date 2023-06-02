<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class RefundResponse.
 */
class RefundResponse extends AbstractResponse
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
}
