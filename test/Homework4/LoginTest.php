<?php
namespace Tdd\Test\Homework4;

use Tdd\Homework4\Login;

class LoginTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->loginName = 'username';
		$this->loginIp = '192.168.1.12';
		$this->loginCountry = 'LU';
		$this->loginStatus = false;

		$this->login = new Login($this->loginName, $this->loginIp, $this->loginCountry, $this->loginStatus);

		$this->loginMock = $this->getMockBuilder('Tdd\Homework4\Login')->setConstructorArgs(array($this->loginName, $this->loginIp, $this->loginCountry, $this->loginStatus))->getMock();

		$this->loginMock->expects($this->any())->method('setLoginName')->will($this->returnValue(null));
		$this->loginMock->expects($this->any())->method('setLoginIp')->will($this->returnValue(null));
		$this->loginMock->expects($this->any())->method('setLoginCountry')->will($this->returnValue(null));
		$this->loginMock->expects($this->any())->method('setLoginStatus')->will($this->returnValue(null));

		$this->loginMock->expects($this->any())->method('getLoginName')->will($this->returnValue($this->loginName));
		$this->loginMock->expects($this->any())->method('getLoginIp')->will($this->returnValue($this->loginIp));
		$this->loginMock->expects($this->any())->method('getLoginCountry')->will($this->returnValue($this->loginCountry));
		$this->loginMock->expects($this->any())->method('getLoginStatus')->will($this->returnValue(false));
	}

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
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, get_class($this->login));
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$this->assertEquals($this->login->$getter(), $this->$attribute);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$getter = 'get' . ucfirst($attribute);
		$this->login->$setter($this->$attribute);
		$this->assertEquals($this->$attribute, $this->login->$getter());
	}

	public function testCheckNoFraudIfAuthenticationSucceeds()
	{
		$this->login->setLoginStatus(true);
		$this->assertFalse($this->login->hasFraud());
	}
}
