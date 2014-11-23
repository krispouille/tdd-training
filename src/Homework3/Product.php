<?php
namespace Tdd\Homework3;

class Product
{
	protected $price;
	protected $unit;
	protected $quantity;
	protected $label;

	public function __construct($label, $price, $unit, $quantity = 1)
	{
		$this->setLabel($label);
		$this->setPrice($price);
		$this->setUnit($unit);
		$this->setQuantity($quantity);
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getUnit()
	{
		return $this->unit;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getLabel()
	{
		return $this->label;
	}

	public function setPrice($price)
	{
		if (!is_int($price))
		{
			throw new \Exception('unexcepted price type : int expected');
		}
		$this->price = $price;
	}

	public function setUnit($unit)
	{
		if (!is_string($unit))
		{
			throw new \Exception('unexcepted unit type : string expected');
		}
		$this->unit = $unit;
	}

	public function setQuantity($quantity)
	{
		if (
			is_int($quantity)
			&& $quantity > 0
		) {
			$this->quantity = $quantity;
		}
		else
		{
			throw new \Exception('invalid quantity : positive int expected');
		}
	}

	public function setLabel($label)
	{
		if (!is_string($label))
		{
			throw new \Exception('invalid label : string expected');
		}
        $this->label = $label;
	}
}