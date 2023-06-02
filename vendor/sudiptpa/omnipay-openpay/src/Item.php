<?php

namespace Omnipay\Openpay;

/**
 * Cart Item.
 *
 * This class defines a single cart item in the Omnipay system.
 *
 * @see ItemInterface
 */
class Item extends \Omnipay\Common\Item implements \Omnipay\Common\ItemInterface, ItemInterface
{
    public function getItemGroup()
    {
        return $this->getParameter('itemGroup');
    }

    public function setItemGroup($value)
    {
        return $this->setParameter('itemGroup', $value);
    }

    public function getItemCode()
    {
        return $this->getParameter('itemCode');
    }

    public function setItemCode($value)
    {
        return $this->setParameter('itemCode', $value);
    }

    public function getItemGroupCode()
    {
        return $this->getParameter('itemGroupCode');
    }

    public function setItemGroupCode($value)
    {
        return $this->setParameter('itemGroupCode', $value);
    }

    public function getTotalPrice()
    {
        return $this->parameters->get('totalPrice');
    }

    public function setTotalPrice($value)
    {
        $this->parameters->set('totalPrice', $value);
    }
}
