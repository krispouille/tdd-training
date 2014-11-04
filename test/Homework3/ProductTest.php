<?php
namespace Tdd\Test\Homework3;

use Tdd\Homework3\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		$this->price = 16;
		$this->unit = 'kg';
		$this->quantity = 12;
		$this->label = 'label';
		$this->product =  new Product($this->label, $this->price, $this->unit, $this->quantity);

		$this->productMock = $this->getMockBuilder('Tdd\Homework3\Product')->setConstructorArgs(array($this->label, $this->price, $this->unit))->getMock();
		$this->productMock->expects($this->any())->method('getPrice')->will($this->returnValue($this->price));
		$this->productMock->expects($this->any())->method('setPrice')->will($this->returnValue(null));
	}

	public function getExpectedAttributeList()
	{
		return array(
			array('quantity'),
			array('price'),
			array('unit'),
		);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testHasAttribute($attribute)
	{
		$this->assertClassHasAttribute($attribute, 'Tdd\Homework3\Product');
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testGetter($attribute)
	{
		$getter = 'get' . ucfirst($attribute);
		$this->assertEquals($this->product->$getter(), $this->$attribute);
	}

	/**
	 * @dataProvider getExpectedAttributeList
	 */
	public function testSetter($attribute)
	{
		$setter = 'set' . ucfirst($attribute);
		$getter = 'get' . ucfirst($attribute);
		$this->product->$setter($this->$attribute);
		$this->assertEquals($this->$attribute, $this->product->$getter());
	}

	public function testInvalidPrice()
	{
		$this->setExpectedException('Exception');
		$this->product->setPrice('16');
	}

	public function testInvalidUnit()
	{
		$this->setExpectedException('Exception');
		$this->product->setUnit(2000);
	}

	public function testInvalidQuantity()
	{
		$this->setExpectedException('Exception');
		$this->product->setQuantity(-10);
	}
}