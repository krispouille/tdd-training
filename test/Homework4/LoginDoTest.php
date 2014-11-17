<?php
namespace Tdd\Test\Homework4;

use Tdd\Homework4\LoginDo;

/**
 * Login Data Object Class Test.
 *
 * @package Tdd\Test\Homework4
 */
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

    /**
     * Data provider that gives turn by turn the expected attributes to test.
     * @return array
     */
	public function getExpectedAttributeList()
	{
		return array(
			array('field'),
			array('value'),
			array('counter'),
			array('timestamp'),
		);
	}

	/**
     * Test HasAttributes methods.
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, get_class($this->loginDo));
	}

	/**
     * Test Getters.
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$this->assertEquals($this->loginDo->$getter(), $this->$attribute);
	}

	/**
     * Test Setters.
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$this->loginDo->$setter($this->$attribute);
		$expected = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, $attribute);
		$this->assertEquals($this->$attribute, $expected);
	}

    /**
     * Test exception raised if non positive integer value for counter.
     */
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

    /**
     * Test counter incrementation.
     */
    public function testIncrementCounter()
	{
		$before = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, 'counter');
		$this->loginDo->incrementCounter();
		$after = \PHPUnit_Framework_Assert::readAttribute($this->loginDo, 'counter');
		$this->assertEquals($after, $before + 1);
	}
}