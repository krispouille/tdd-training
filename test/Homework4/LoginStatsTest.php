<?php
namespace Tdd\Test\Homework4;

use Tdd\Homework4\LoginStats;

class LoginStatsTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->ipCounter = 2;
		$this->ipRangeCounter = 499;
		$this->countryCounter = 999;
		$this->userCounter = 2;
		$this->timestamp = 0;

		$this->loginName = 'username';
		$this->loginIp = '192.168.1.12';
		$this->loginCountry = 'LU';
		$this->loginStatus = false;

		$this->loginMock = $this->getMockBuilder('Tdd\Homework4\Login')
								->setConstructorArgs(
									array(
										$this->loginName,
										$this->loginIp,
										$this->loginCountry,
										$this->loginStatus
									)
								)
								->getMock();

		$this->stats = new LoginStats($this->loginMock);
	}

	public function getExpectedAttributeList()
	{
		return array(
			array('ipCounter'),
			array('ipRangeCounter'),
			array('countryCounter'),
			array('userCounter'),
			array('timestamp'),
		);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, get_class($this->stats));
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testLastDataIsLoadedByDefault($attribute)
	{
		$this->assertEquals(\PHPUnit_Framework_Assert::readAttribute($this->stats, $attribute), $this->$attribute);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$this->stats->$setter($this->$attribute);
		$this->assertEquals($this->$attribute, \PHPUnit_Framework_Assert::readAttribute($this->stats, $attribute));
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetterExceptionIfAttributeIsNotPositiveInteger($attribute)
	{
		$invalidValues = array(
			-1,
			"aaa",
			new \stdClass(),
		);

		$setter = 'set' . ucfirst($attribute);
		$this->setExpectedException('Exception');
		$this->stats->$setter($invalidValues[rand(0, count($invalidValues))]);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$setter = 'set' . ucfirst($attribute);
		$this->stats->$setter($this->$attribute);
		$this->assertEquals($this->stats->$getter(), $this->$attribute);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testAddCounter($attribute)
	{
		// exclude unecessary attributes
		if (in_array($attribute, array('timestamp')))
		{
			return;
		}

		$current = \PHPUnit_Framework_Assert::readAttribute($this->stats, $attribute);
		$add = 'add' . ucfirst($attribute);
		$this->stats->$add();
		$this->assertEquals(\PHPUnit_Framework_Assert::readAttribute($this->stats, $attribute), $current + 1);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testReset($attribute)
	{
		$this->stats->reset();
		$this->assertEquals(\PHPUnit_Framework_Assert::readAttribute($this->stats, $attribute), 0);
	}
}