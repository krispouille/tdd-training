<?php
namespace Tdd\Homework4;

/**
 * Login Class that stores current login attempt data.
 * @package Tdd\Homework4
 */
class Login
{
    /**
     * @var string
     */
    protected $loginName;

    /**
     * @var string
     */
    protected $loginIp;

    /**
     * @var string
     */
    protected $loginCountry;

    /**
     * @var bool
     */
    protected $loginStatus;

    /**
     * Initialize login attempt (with data)
     *
     * @param string $loginName
     * @param string $loginIp
     * @param string $loginCountry
     * @param bool $loginStatus
     */
    public function __construct($loginName, $loginIp, $loginCountry, $loginStatus = false)
	{
		$this->loginName = $loginName;
		$this->loginIp = $loginIp;
		$this->loginCountry = $loginCountry;
		$this->loginStatus = $loginStatus;
	}

    /**
     * Gets login username.
     * @return string
     */
    public function getLoginName()
	{
		return $this->loginName;
	}

    /**
     * Gets login ip.
     * @return string
     */
    public function getLoginIp()
	{
		return $this->loginIp;
	}

    /**
     * Gets login country.
     * @return string
     */
    public function getLoginCountry()
	{
		return $this->loginCountry;
	}

    /**
     * Gets login status.
     * @return bool
     */
    public function getLoginStatus()
	{
		return $this->loginStatus;
	}

    /**
     * Sets login username.
     * @param string $loginName
     */
    public function setLoginName($loginName)
	{
		$this->loginName = $loginName;
	}

    /**
     * Sets login ip.
     * @param string $loginIp
     */
    public function setLoginIp($loginIp)
	{
		$this->loginIp = $loginIp;
	}

    /**
     * Sets login country.
     * @param string $loginCountry
     */
    public function setLoginCountry($loginCountry)
	{
		$this->loginCountry = $loginCountry;
	}

    /**
     * Sets login status.
     * @param bool $loginStatus
     */
    public function setLoginStatus($loginStatus)
	{
		$this->loginStatus = $loginStatus;
	}
}