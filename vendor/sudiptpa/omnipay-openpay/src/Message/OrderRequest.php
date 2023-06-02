<?php

namespace Omnipay\Openpay\Message;

use SimpleXMLElement;

/**
 * Class OrderRequest.
 */
class OrderRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $liveEndpoint = 'https://retailer.myopenpay.com.au/ServiceLive/JAMServiceImpl.svc/';

    /**
     * @var string
     */
    protected $testEndpoint = 'https://retailer.myopenpay.com.au/ServiceTraining/JAMServiceImpl.svc/';

    /**
     * @var string
     */
    protected $methodName = 'NewOnlineOrder';

    /**
     * @return array
     */
    public function getRequestHeaders()
    {
        return [
            'Content-Type'  => 'application/xml',
            'Cache-Control' => 'no-cache',
        ];
    }

    /**
     * @return string
     */
    public function getData()
    {
        $xml = new SimpleXMLElement('<NewOnlineOrder/>');

        $xml->addChild('JamAuthToken', $this->getMerchantId());
        $xml->addChild('AuthToken', $this->getAuthToken());
        $xml->addChild('PurchasePrice', $this->getPurchasePrice());

        return $xml;
    }

    /**
     * @param $data
     *
     * @return \Omnipay\Openpay\Message\OrderResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->getEndpoint(),
            $this->getRequestHeaders(),
            $data->asXML()
        );

        $data = new SimpleXMLElement($httpResponse->getBody()->getContents());

        return $this->response = new OrderResponse($this, $data);
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        $endPoint = $this->liveEndpoint;

        if ($this->getTestMode()) {
            $endPoint = $this->testEndpoint;
        }

        return $endPoint.$this->methodName;
    }
}
