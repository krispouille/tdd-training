<?php
namespace Tdd\Test\Homework3;

use Tdd\Homework3\Cashier;

class CashierTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->productMock = $this->getMockBuilder('Tdd\Homework3\Product')->setConstructorArgs(array('label', 16, 'kg'))->getMock();

		//$this->productMock->expects($this->any())->method('getPrice')->will($this->returnValue(16));

		//$this->productMock->expects($this->any())->method('setPrice')->will($this->returnValue(null));

		$this->cashier = new Cashier();
	}

	public function testHasProductsAttribute()
	{
		$this->assertClassHasAttribute('products', 'Tdd\Homework3\Cashier');
	}

	public function testInvalidProductAdded()
	{
		$this->setExpectedException('Exception');
		$this->cashier->addProduct('10');
	}

	public function testAddProduct()
	{
		$this->cashier->addProduct($this->productMock);
	}
}