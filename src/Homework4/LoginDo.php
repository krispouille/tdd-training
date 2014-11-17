<?php
namespace Tdd\Homework4;

/**
 * Login Data Object class to get/store a state on a datasource.
 *
 * @package Tdd\Homework4
 */
class LoginDo
{
	const LOG_TTL = 3600;
	const USER_FAILURES = 3;
	const IP_FAILURES = 3;
	const IP_RANGE_FAILURES = 500;
	const COUNTRY_FAILURES = 1000;

    /**
     * Field in datasource (username | ip | country ...).
     * @var string
     */
    protected $field;

    /**
     * Value in datasource.
     * @var mixed
     */
    protected $value;

    /**
     * Counter.
     * @var int
     */
    protected $counter;

    /**
     * Timestamp.
     * @var int
     */
    protected $timestamp;

	public function __construct($field, $value = null, $counter = 0, $timestamp = 0)
	{
		$this->setField($field);
		$this->setValue($value);
		$this->setCounter($counter);
		$this->setTimestamp($timestamp);
	}

	/**
	 * Load last state of data from a datasource (database, etc.).
	 * If no entry found, return a new instance.
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return LoginDo
	 */
	public static function load($field, $value)
	{
		$result = self::find($field, $value);

		$loginDo = new LoginDo($field, $value);

		if (!empty($result))
		{
			$loginDo->setTimestamp($result['timestamp']);
			$loginDo->setCounter($result['counter']);
		}
		return $result;
	}

	/**
	 * Get data from a datasource if found. Otherwise returns false.
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return array
	 */
	public static function find($field, $value)
	{
		return false;
	}

    /**
     * Save data in datasource (depending on TTL).
     */
    public function save()
	{
		if (time() - $this->timestamp > self::LOG_TTL)
		{
			// save data state in datasource
		}
	}

    /**
     * Sets field.
     *
     * @param string $field
     */
    public function setField($field)
	{
		$this->field = $field;
	}

    /**
     * Sets value.
     *
     * @param mixed $value
     */
    public function setValue($value)
	{
		$this->value = $value;
	}

    /**
     * Sets counter.
     *
     * @param $counter
     * @throws \Exception
     */
    public function setCounter($counter)
	{
		if (!is_int($counter) || $counter < 0)
		{
			throw new \Exception('Unexpected attribute type. ONLY int expected');
		}
		$this->counter = $counter;
	}

    /**
     * Increment counter.
     */
    public function incrementCounter()
	{
		$this->counter++;
	}

    /**
     * Sets timestamp.
     *
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
	}

    /**
     * Gets field.
     * @return string
     */
    public function getField()
	{
		return $this->field;
	}

    /**
     * Gets value.
     * @return mixed
     */
    public function getValue()
	{
		return $this->value;
	}

    /**
     * Gets counter.
     * @return int
     */
    public function getCounter()
	{
		return $this->counter;
	}

    /**
     * Gets timestamp.
     * @return int
     */
    public function getTimestamp()
	{
		return $this->timestamp;
	}
}
