<?php

namespace App\Services\Web\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans {
	protected $order;

	public function __construct($order)
	{
		parent::__construct();

		$this->order = $order;
	}

	public function getSnapToken()
	{
		$this->order = (object)$this->order;

		$params = [
			'transaction_details' => [
				'order_id' => $this->order->order_id,
				'gross_amount' => $this->order->gross_amount,
			],
			'item_details' => $this->order->items,
			'customer_details' => $this->order->customer
		];

		$snapToken = Snap::getSnapToken($params);

		return $snapToken;
	}
}