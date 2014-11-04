<?php
namespace Tdd\Homework3;

use Tdd\Homework3\Product;

class Cashier
{
	protected $products = array();

	public function addProduct(Product $product)
	{
		if (!$product instanceof Product)
		{
			throw new \Exception('invalid product. Expected Product instance');
		}

		$this->products[] = $product;
	}
}