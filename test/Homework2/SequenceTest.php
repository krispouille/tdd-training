<?php
namespace Tdd\Test\Homework2;

use Tdd\Homework2\Sequence;

/**
 * Homework 2
 *
 * Your task is to process a sequence of integer numbers to determine the following statistics:
 * minimum value
 * maximum value
 * number of elements in the sequence
 * average value

 * For example: [6, 9, 15, -2, 92, 11]
 * minimum value = -2
 * maximum value = 92
 * number of elements in the sequence = 6
 * average value = 21.833333
 *
 */
class SequenceTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->context = new SequenceContext();
		$this->sequence = new Sequence($this->context->get(__FUNCTION__));
	}

	public function testGetList()
	{
		$list0 = $this->sequence->getList();
		$list1 = $this->context->get(__FUNCTION__);

		$isValid = true;
		foreach ($list0 as $i => $number)
		{
			if ($number !== $list1[$i])
			{
				$isValid = false;
				break;
			}
		}
		$this->assertTrue($isValid);
	}

	public function testGetMinimum()
	{
		$expected = $this->context->get(__FUNCTION__);
		$this->assertEquals($expected, $this->sequence->getMinimum());
	}

	public function testGetMaximum()
	{
		$expected = $this->context->get(__FUNCTION__);
		$this->assertEquals($expected, $this->sequence->getMaximum());
	}

	public function testGetNumberOfElements()
	{
		$expected = $this->context->get(__FUNCTION__);
		$this->assertEquals($expected, $this->sequence->getNumberOfElements());
	}

	public function testGetAverage()
	{
		$expected = $this->context->get(__FUNCTION__);
		$this->assertEquals($expected, $this->sequence->getAverage());
	}

}