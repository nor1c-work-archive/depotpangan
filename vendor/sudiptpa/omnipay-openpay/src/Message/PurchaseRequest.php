<?php

namespace Omnipay\Openpay\Message;

/**
 * Class PurchaseRequest.
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Prepare Data for API.
     *
     * @return array
     */
    public function getData()
    {
        $this->validate('merchantId', 'planID', 'purchasePrice');

        return [
            'JamCallbackURL'     => $this->getReturnUrl(),
            'JamCancelURL'       => $this->getCancelUrl(),
            'JamFailURL'         => $this->getFailedUrl(),
            'JamAuthToken'       => $this->getMerchantId(),
            'JamPlanID'          => $this->getPlanID(),
            'JamRetailerOrderNo' => $this->getRetailerOrderNo(),
            'JamPrice'           => $this->getPurchasePrice(),
            'JamFirstName'       => $this->getFirstName(),
            'JamFamilyName'      => $this->getLastName(),
            'JamEmail'           => $this->getEmail(),
            'JamAddress1'        => $this->getAddress1(),
            'JamSuburb'          => $this->getCity(),
            'JamState'           => $this->getState(),
            'JamPostcode'        => $this->getPostcode(),
        ];
    }

    /**
     * @param $data
     *
     * @return \Omnipay\Openpay\Message\PurchaseResponse
     */
    public function sendData($data)
    {
        $redirectUrl = $this->getEndpoint().'?'.http_build_query($data);

        return $this->response = new PurchaseResponse($this, $data, $redirectUrl);
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
