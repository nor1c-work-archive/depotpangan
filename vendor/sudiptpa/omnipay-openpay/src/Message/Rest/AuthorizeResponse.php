<?php

namespace Omnipay\Openpay\Message\Rest;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class AuthorizeResponse.
 */
class AuthorizeResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return [];
    }

    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    public function getOrderId()
    {
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

    public function getBlackListMatch()
    {
        return isset($this->data['blackListMatch']) ? $this->data['blackListMatch'] : null;
    }

    public function getNextAction()
    {
        return isset($this->data['nextAction']) ? $this->data['nextAction'] : null;
    }

    public function getTransactionToken()
    {
        if ($this->isRequestFormPost()) {
            $stack = $this->data['nextAction']['formPost']['formFields'];

            foreach ($stack as $field) {
                if ($field['fieldName'] == 'TransactionToken') {
                    return $field['fieldValue'];
                }
            }
        }
    }

    public function getPlanID()
    {
        if ($this->isRequestFormPost()) {
            $stack = $this->data['nextAction']['formPost']['formFields'];

            foreach ($stack as $field) {
                if ($field['fieldName'] == 'JamPlanID') {
                    return $field['fieldValue'];
                }
            }
        }
    }

    public function isRequestFormPost()
    {
        return isset($this->data['nextAction']['type']) && $this->data['nextAction']['type'] == 'FormPost';
    }

    public function isRedirect()
    {
        return $this->isRequestFormPost();
    }

    public function getRedirectUrl()
    {
        if ($this->isRequestFormPost()) {
            $url = $this->data['nextAction']['formPost']['formPostUrl'];

            return $url.'?TransactionToken='.$this->getTransactionToken();
        }
    }
}
