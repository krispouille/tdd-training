<?php
namespace Tdd\Test\Homework4;

use Tdd\Homework4\LoginDo;

class LoginDoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->key = 'username';
		$this->value = 'jchrislain';
		$this->counter = 0;
		$this->timestamp = time();

		$this->loginDo = new LoginDo($this->key, $this->value, $this->counter, $this->timestamp);
	}

	public function getExpectedAttributeList()
	{
		return array(
			array('key'),
			array('value'),
			array('counter'),
			array('timestamp'),
		);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, get_class($this->loginDo));
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$this->assertEquals($this->loginDo->$getter(), $this->$attribute);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$this->loginDo->$setter($this->$attribute);
		$expected = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, $attribute);
		$this->assertEquals($this->$attribute, $expected);
	}

	public function testSetCounterExceptionIfNotPositiveInteger()
	{
		$invalidValues = array(
			-1,
			"aaa",
			new \stdClass(),
		);
		$this->setExpectedException('Exception');
		$this->loginDo->setCounter($invalidValues[rand(0, count($invalidValues))]);
	}

	public function testIncrementCounter()
	{
		$before = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, 'counter');
		$this->loginDo->incrementCounter();
		$after = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, 'counter');
		$this->assertEquals($after, $before + 1);
	}
}