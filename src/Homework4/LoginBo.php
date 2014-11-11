<?php
namespace Tdd\Homework4;

class LoginBo
{
	public static function showCaptcha(Login $attempt)
	{
		$showCaptcha = false;

		$userDo = LoginDo::load('username', $attempt->getLoginName());
		$ipDo = LoginDo::load('ip', $attempt->getLoginIp());
		$countryDo = LoginDo::load('country', $attempt->getLoginCountry());

		if ($attempt->getLoginStatus() === true)
		{
			// reset data
			$userDo->setCounter(0);
			$ipDo->setCounter(0);
			$countryDo->setCounter(0);

			$showCaptcha = true;
		}
		else
		{
			$userDo->incrementCounter();
			$ipDo->incrementCounter();
			$countryDo->incrementCounter();

			// compare login logs and attempt
		}

		// save data
		$userDo->save();
		$ipDo->save();
		$countryDo->save();

		return $showCaptcha;
	}
}