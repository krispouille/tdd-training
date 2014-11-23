<?php
namespace Tdd\Test\Homework5;

use Tdd\Homework5\Product;

/**
 * Product  Object Class Test.
 *
 * @package Tdd\Test\Homework5
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->product = new Product();
    }

    /**
     * Returns list of expected attributes for a product.
     * @return array
     */
    public function getExpectedAttributes()
    {
        return array(
            array('id'),
            array('ean'),
            array('name'),
        );
    }

    /**
     * Tests existence of given attributes.
     *
     * @dataProvider       getExpectedAttributes
     * @param $attribute   Expected attribute that a product is supposed to have.
     */
    public function testHasExpectedAttributes($attribute)
    {
        $this->assertClassHasAttribute($attribute, get_class($this->product));
    }
}