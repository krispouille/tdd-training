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
			// reset counters (if they were not already to 0)
			if ($userDo->getCounter() != 0)
			{
				$userDo->setCounter(0);
				$userDo->save();
			}

			if ($ipDo->getCounter() != 0)
			{
				$ipDo->setCounter(0);
				$ipDo->save();
			}

			if ($countryDo->getCounter() != 0)
			{
				$countryDo->setCounter(0);
				$countryDo->save();
			}
		}
		// failure in authentication => log
		else
		{
			// increment counters
			$userDo->incrementCounter();
			$ipDo->incrementCounter();
			$countryDo->incrementCounter();

			// save data
			$userDo->save();
			$ipDo->save();
			$countryDo->save();

			// compare login logs and attempt
			if (
				$userDo->getCounter() === LoginDo::USER_FAILURES
				|| $countryDo->getCounter() === LoginDo::COUNTRY_FAILURES
				|| $ipDo->getCounter() === LoginDo::IP_FAILURES
			) {
				$showCaptcha = true;
			}
		}

		return $showCaptcha;
	}
}