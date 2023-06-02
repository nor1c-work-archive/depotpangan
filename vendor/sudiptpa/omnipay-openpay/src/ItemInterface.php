<?php

namespace Omnipay\Openpay;

interface ItemInterface extends \Omnipay\Common\ItemInterface
{
    public function getItemGroup();

    public function getItemCode();

    public function getItemGroupCode();

    public function getTotalPrice();
}
