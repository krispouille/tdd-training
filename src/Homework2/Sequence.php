<?php
/**
 * Created by PhpStorm.
 * User: chrislain.jemba
 * Date: 2014-10-03
 * Time: 2:39 PM
 */

namespace Tdd\Homework2;


class Sequence {

	protected $list = array();

	public function __construct(array $list = array())
	{
		$this->setList($list);
	}

	public function setList(array $list)
	{
		$this->list = $list;
	}

	public function getList()
	{
		return $this->list;
	}

	public function getMinimum()
	{
		return min($this->list);
	}

	public function getMaximum()
	{
		return max($this->list);
	}

	public function getNumberOfElements()
	{
		return count($this->list);
	}

	public function getAverage()
	{
		$total = array_sum($this->list);
		$average = $total / $this->getNumberOfElements();
		return round($average, 6);
	}
} 