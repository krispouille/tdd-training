<?php
namespace Tdd\Homework4;

class LoginStats
{
	protected $ipCounter = 0;
	protected $ipRangeCounter = 0;
	protected $countryCounter = 0;
	protected $userCounter = 0;
	protected $timestamp = 0;

	public function __construct()
	{
		$this->loadLastStats();
	}

	public function loadLastStats()
	{
		$this->setIpCounter(2);
		$this->setIpRangeCounter(499);
		$this->setCountryCounter(999);
		$this->setUserCounter(2);
		$this->setTimestamp(0);
	}

	public function getIpCounter()
	{
		return $this->ipCounter;
	}

	public function getIpRangeCounter()
	{
		return $this->ipRangeCounter;
	}

	public function getCountryCounter()
	{
		return $this->countryCounter;
	}

	public function getUserCounter()
	{
		return $this->userCounter;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function setIpCounter($ipCounter = 0)
	{
		if (!is_int($ipCounter) || $ipCounter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->ipCounter = $ipCounter;
	}

	public function setIpRangeCounter($ipRangeCounter = 0)
	{
		if (!is_int($ipRangeCounter) || $ipRangeCounter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->ipRangeCounter = $ipRangeCounter;
	}

	public function setCountryCounter($countryCounter = 0)
	{
		if (!is_int($countryCounter) || $countryCounter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->countryCounter = $countryCounter;
	}

	public function setUserCounter($userCounter = 0)
	{
		if (!is_int($userCounter) || $userCounter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->userCounter = $userCounter;
	}

	public function setTimestamp($timestamp = 0)
	{
		if (!is_int($timestamp) || $timestamp < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->timestamp = $timestamp;
	}

	public function addIpCounter()
	{
		$this->ipCounter++;
	}

	public function addIpRangeCounter()
	{
		$this->ipRangeCounter++;
	}

	public function addCountryCounter()
	{
		$this->countryCounter++;
	}

	public function addUserCounter()
	{
		$this->userCounter++;
	}

	public function reset()
	{
		$this->setIpCounter();
		$this->setIpRangeCounter();
		$this->setCountryCounter();
		$this->setUserCounter();
	}
}