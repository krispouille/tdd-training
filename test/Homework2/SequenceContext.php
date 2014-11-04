<?php
namespace Tdd\Test\Homework2;

class SequenceContext
{
	protected $list = array();
	protected $count = 0;

	public function __construct()
	{
		$this->count = rand(1, 100);
		for($i = 0; $i < $this->count; $i++)
		{
			$this->list[] = rand(-100,100);
		}
	}

	public function get($functionName)
	{
		return call_user_func(array($this, $functionName));
	}

	public function setUp()
	{
		return $this->list;
	}

	public function testGetList()
	{
		return $this->list;
	}

	public function testGetMinimum()
	{
		return min($this->list);
	}

	public function testGetMaximum()
	{
		return max($this->list);
	}

	public function testGetNumberOfElements()
	{
		return $this->count;
	}

	public function testGetAverage()
	{
		$total = array_sum($this->list);
		$average = $total / $this->count;
		return round($average, 6);
	}
}