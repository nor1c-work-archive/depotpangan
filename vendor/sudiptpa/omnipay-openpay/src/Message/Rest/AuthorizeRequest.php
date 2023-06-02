<?php

namespace Omnipay\Openpay\Message\Rest;

use Omnipay\Common\ItemBag;
use Omnipay\Openpay\Enums\DeliveryMethod;
use Omnipay\Openpay\Enums\OriginType;
use Omnipay\Openpay\Enums\PlanCreationType;

/**
 * Class AuthorizeRequest.
 */
class AuthorizeRequest extends AbstractRequest
{
    public function getOrigin()
    {
        return $this->getParameter('origin');
    }

    public function setOrigin($value)
    {
        return $this->setParameter('origin', $value);
    }

    public function getSource()
    {
        return $this->getParameter('source');
    }

    public function setSource($value)
    {
        return $this->setParameter('source', $value);
    }

    public function getFailedUrl()
    {
        return $this->getParameter('failedUrl');
    }

    public function setFailedUrl($value)
    {
        return $this->setParameter('failedUrl', $value);
    }

    public function getPlanCreationType()
    {
        return $this->getParameter('planCreationType');
    }

    public function setPlanCreationType($value)
    {
        return $this->setParameter('planCreationType', $value);
    }

    public function getDeliveryMethod()
    {
        return $this->getParameter('deliveryMethod');
    }

    public function setDeliveryMethod($value)
    {
        return $this->setParameter('deliveryMethod', $value);
    }

    public function getEmployeeCode()
    {
        return $this->getParameter('employeeCode');
    }

    public function setEmployeeCode($value)
    {
        return $this->setParameter('employeeCode', $value);
    }

    public function getCustomerId()
    {
        return $this->getParameter('customerId');
    }

    public function setCustomerId($value)
    {
        return $this->setParameter('customerId', $value);
    }

    public function getDateOfBirth()
    {
        return $this->getParameter('dateOfBirth');
    }

    public function setDateOfBirth($value)
    {
        return $this->setParameter('dateOfBirth', $value);
    }

    public function setItems($items)
    {
        if ($items && !$items instanceof ItemBag) {
            $items = new ItemBag($items);
        }

        return $this->setParameter('items', $items);
    }

    public function getGoodsDescription()
    {
        return $this->getParameter('goodsDescription');
    }

    public function setGoodsDescription($value)
    {
        return $this->setParameter('goodsDescription', $value);
    }

    public function getRetailerOrderNo()
    {
        return $this->getParameter('retailerOrderNo');
    }

    public function setRetailerOrderNo($value)
    {
        return $this->setParameter('retailerOrderNo', $value);
    }

    public function getCustomerDetails()
    {
        return [
            'firstName'          => $this->getCard()->getFirstName(),
            'familyName'         => $this->getCard()->getLastName(),
            'email'              => $this->getCard()->getEmail(),
            'dateOfBirth'        => $this->getDateOfBirth(),
            'gender'             => $this->getCard()->getGender(),
            'phoneNumber'        => $this->getCard()->getPhone(),
            'deliveryAddress'    => $this->getDeliveryAddress(),
            'residentialAddress' => $this->getResidentialAddress(),
        ];
    }

    public function getDeliveryAddress()
    {
        $card = $this->getCard();

        return [
            'line1'    => $card->getShippingAddress1(),
            'line2'    => $card->getShippingAddress2(),
            'suburb'   => $card->getShippingCity(),
            'state'    => $card->getShippingState(),
            'postCode' => $card->getShippingPostcode(),
        ];
    }

    public function getResidentialAddress()
    {
        $card = $this->getCard();

        return [
            'line1'    => $card->getBillingAddress1(),
            'line2'    => $card->getBillingAddress2(),
            'suburb'   => $card->getBillingCity(),
            'state'    => $card->getBillingState(),
            'postCode' => $card->getBillingPostcode(),
        ];
    }

    public function getDataForOnline()
    {
        return [
            'online' => [
                'callbackUrl'      => $this->getReturnUrl(),
                'cancelUrl'        => $this->getCancelUrl(),
                'failUrl'          => $this->getFailedUrl(),
                'planCreationType' => $this->getPlanCreationType() ?: PlanCreationType::CREATE_INSTANT,
                'deliveryMethod'   => $this->getDeliveryMethod() ?: DeliveryMethod::DELIVERY,
                'customerDetails'  => $this->getCustomerDetails(),
            ],
        ];
    }

    public function getDataForPosApp()
    {
        return [
            'posApp' => [
                'employeeCode' => $this->getEmployeeCode(),
                'customerId'   => $this->getCustomerId(),
            ],
        ];
    }

    public function getCustomerJourney()
    {
        $origin = $this->getOrigin() ?: OriginType::ORIGIN_ONLINE;

        $method = "getDataFor{$origin}";

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        return [];
    }

    public function getCartItems()
    {
        $stack = [];

        foreach ($this->getItems()->all() as $item) {
            $stack[] = [
                'itemName'            => $item->getName(),
                'itemGroup'           => $item->getItemGroup(),
                'itemCode'            => $item->getItemCode(),
                'itemGroupCode'       => $item->getItemGroupCode(),
                'itemRetailUnitPrice' => $this->getCentAmount($item->getPrice()),
                'itemQty'             => $item->getQuantity(),
                'itemRetailCharge'    => $this->getCentAmount($item->getTotalPrice()),
            ];
        }

        return $stack;
    }

    public function getData()
    {
        $this->validate('card', 'returnUrl', 'cancelUrl', 'failedUrl', 'amount');

        $stack = array_merge([
            'customerJourney' => $this->getCustomerJourney(),
        ], [
            'purchasePrice'    => $this->getCentAmount($this->getAmount()),
            'retailerOrderNo'  => $this->getRetailerOrderNo(),
            'goodsDescription' => $this->getGoodsDescription(),
            'cart'             => $this->getCartItems(),
        ]);

        if ($source = $this->getSource()) {
            $stack['source'] = $source;
        }

        return $stack;
    }

    public function getCentAmount($amount)
    {
        return (int) $amount * 100;
    }

    public function sendData($data = [])
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint(), $this->getHeaders(), json_encode($data));

        $result = json_decode($response->getBody()->getContents(), true);

        return $this->createResponse($result, $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().'orders';
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new AuthorizeResponse($this, $data, $headers, $status);
    }
}
