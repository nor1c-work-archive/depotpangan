<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * Class AbstractResponse.
 */
class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
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

    public function isSuccessful()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return false;
    }

    public function getMessage()
    {
        return (string) $this->data->reason;
    }

    public function getStatus()
    {
        return (string) $this->data->status;
    }
}
