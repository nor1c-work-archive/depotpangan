<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class RefundResponse.
 */
class RefundResponse extends AbstractResponse
{
    /**
     * @param RequestInterface $request
     * @param $data
     */
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getStatus() == 0;
    }
}
