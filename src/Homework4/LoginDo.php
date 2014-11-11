<?php
namespace Tdd\Homework4;

class LoginDo
{
	const LOG_TTL = 3600;

	protected $key;
	protected $value;
	protected $counter;
	protected $timestamp;

	public function __construct($key, $value = null, $counter = 0, $timestamp = 0)
	{
		$this->setKey($key);
		$this->setValue($value);
		$this->setCounter($counter);
		$this->setTimestamp($timestamp);
	}

	/**
	 * Load last state of data from a datasource (database, etc.).
	 * If no entry found, return a new instance.
	 * @param string $key
	 * @param mixed $value
	 *
	 * @return LoginDo
	 */
	public static function load($key, $value)
	{
		$result = self::find($key, $value);

		$loginDo = new LoginDo($key, $value);

		if (!empty($result))
		{
			$loginDo->setTimestamp($result['timestamp']);
			$loginDo->setCounter($result['counter']);
		}
		return $result;
	}

	/**
	 * Get data from a datasource if found. Otherwise returns false.
	 * @param string $key
	 * @param mixed $value
	 *
	 * @return array
	 */
	public static function find($key, $value)
	{
		return false;
	}

	public function save()
	{
		if (time() - $this->timestamp > self::LOG_TTL)
		{
			// save this state
		}
	}

	public function setKey($key)
	{
		$this->key = $key;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function setCounter($counter)
	{
		if (!is_int($counter) || $counter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->counter = $counter;
	}

	public function incrementCounter()
	{
		$this->counter++;
	}

	public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
	}

	public function getKey()
	{
		return $this->key;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getCounter()
	{
		return $this->counter;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}
}
