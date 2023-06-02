<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * Class OrderStatusResponse.
 */
class OrderStatusResponse extends AbstractResponse
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
     * @return string
     */
    public function getPlanID()
    {
        return (string) $this->data->PlanID;
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return (string) $this->data->OrderStatus;
    }

    /**
     * @return int
     */
    public function getPurchasePrice()
    {
        return $this->data->PurchasePrice;
    }

    /**
     * @return string
     */
    public function getPlanStatus()
    {
        return (string) $this->data->PlanStatus;
    }

    /**
     * @return bool
     */
    public function isPlanActive()
    {
        return in_array($this->getPlanStatus(), ['Active']);
    }

    /**
     * @return bool
     */
    public function isPlanRefunded()
    {
        return in_array($this->getPlanStatus(), ['Refunded']);
    }

    /**
     * @return bool
     */
    public function isPlanFinished()
    {
        return in_array($this->getPlanStatus(), ['Finished']);
    }

    /**
     * @return bool
     */
    public function isApproved()
    {
        return in_array($this->getOrderStatus(), ['Approved']);
    }
}
