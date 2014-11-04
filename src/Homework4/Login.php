<?php
namespace Tdd\Homework4;

class Login
{
	protected $loginName;
	protected $loginIp;
	protected $loginCountry;
	protected $loginStatus;

	public function __construct($loginName, $loginIp, $loginCountry, $loginStatus = false)
	{
		$this->loginName = $loginName;
		$this->loginIp = $loginIp;
		$this->loginCountry = $loginCountry;
		$this->loginStatus = $loginStatus;
	}

	public function getLoginName()
	{
		return $this->loginName;
	}

	public function getLoginIp()
	{
		return $this->loginIp;
	}

	public function getLoginCountry()
	{
		return $this->loginCountry;
	}

	public function getLoginStatus()
	{
		return $this->loginStatus;
	}

	public function setLoginName($loginName)
	{
		$this->loginName = $loginName;
	}

	public function setLoginIp($loginIp)
	{
		$this->loginIp = $loginIp;
	}

	public function setLoginCountry($loginCountry)
	{
		$this->loginCountry = $loginCountry;
	}

	public function setLoginStatus($loginStatus)
	{
		$this->loginStatus = $loginStatus;
	}

	public function hasFraud()
	{
		$response = false;

		if ($this->getLoginStatus())
		{
			return $response;
		}

		// fraud tests

		return $response;
	}
}