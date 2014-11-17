<?php
namespace Tdd\Test\Homework4;

use Tdd\Homework4\Login;

/**
 * Login Class Test.
 *
 * @package Tdd\Test\Homework4
 */
class LoginTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->loginName = 'username';
		$this->loginIp = '192.168.1.12';
		$this->loginCountry = 'LU';
		$this->loginStatus = false;

		$this->login = new Login($this->loginName, $this->loginIp, $this->loginCountry, $this->loginStatus);
	}

    /**
     * Data provider that gives turn by turn the expected attributes to test.
     * @return array
     */
    public function getExpectedAttributeList()
	{
		return array(
			array('loginName'),
			array('loginIp'),
			array('loginCountry'),
			array('loginStatus'),
		);
	}

	/**
     * Test all HasAttribute... methods.
     *
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, get_class($this->login));
	}

	/**
     * Test all getters.
     *
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$this->assertEquals($this->login->$getter(), $this->$attribute);
	}

	/**
     * Test all setters.
     *
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$getter = 'get' . ucfirst($attribute);
		$this->login->$setter($this->$attribute);
		$this->assertEquals($this->$attribute, $this->login->$getter());
	}
}
