<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * Class OrderResponse.
 */
class OrderResponse extends AbstractResponse
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

    public function getPlanID()
    {
        return (string) $this->data->PlanID;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getStatus() == 0 && $this->getPlanID();
    }
}
