<?php
namespace Tdd\Test\Homework5;

use Tdd\Homework5\Product;
use Tdd\Homework5\NullProduct;
use Tdd\Homework5\ProductDao;
use PDO;
/**
 * ProductDao  Object Class Test.
 *
 * @package Tdd\Test\Homework5
 */
class ProductDaoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $dsn = sprintf("sqlite:%s", '/home/krispouille/Documents/tdd-training/src/Homework5/product.db');
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->products = array(
          array(
              'id' => 1,
              'ean' => '1234',
              'name' => 'Chicken',
          ),
            array(
                'id' => 2,
                'ean' => '9999',
                'name' => 'Updated product turkey',
            ),
            array(
                'id' => 3,
                'ean' => '878789',
                'name' => 'Turkey',
            ),
        );

        // empty current Table
        $pdo->prepare("DELETE FROM product")->execute();

        // add products manually
        foreach ($this->products as $product)
        {
            $pdo->prepare("INSERT INTO product(`ean`, `name`) VALUES (:ean, :name)")->execute(
                array(
                    ':ean' => $product['ean'],
                    ':name' => $product['name'],
                )
            );
        }
    }

    public function testGetByIdReturnsProductIfFound()
    {
        $product = ProductDao::getById(1);
        $this->assertTrue($product instanceof Product);
    }

    public function testGetByIdReturnsNullProductIfNotFound()
    {
        $product = ProductDao::getById(0);
        $this->assertTrue($product instanceof NullProduct);
    }

    public function testGetByEanReturnsProductIfFound()
    {
        $product = ProductDao::getByEan('1234');
        $this->assertTrue($product instanceof Product);
    }

    public function testGetByEanReturnsNullProductIfNotFound()
    {
        $product = ProductDao::getByEan('');
        $this->assertTrue($product instanceof NullProduct);
    }

    public function testCreateProductReturnsFalseIfProductExists()
    {
        $product = new Product();
        $product->ean = '1234';
        $product->name = 'Chicken';
        $response = ProductDao::create($product);
        $this->assertFalse($response);
    }

    public function testCreateProductReturnsTrueIfSuccess()
    {
        $product = new Product();
        $product->ean = '007';
        $product->name = 'def bond';
        $response = ProductDao::create($product);
        $this->assertTrue($response);
    }

    public function testDeleteProductReturnsTrueIfProductExists()
    {
        $product = new Product();
        $product->ean = '007';
        $product->name = 'def bond';

        if (ProductDao::create($product))
        {
            $response = ProductDao::delete($product);
            $this->assertTrue($response);
        }
    }

    public function testModifyReturnsTrueIfSuccess()
    {
        $product = new Product();
        $product->ean = '1234';
        $product->name = 'Chicken1';
        $response = ProductDao::modify($product);
        $this->assertTrue($response);
    }

    public function testModifyReturnsFalseIfProductNotExists()
    {
        $product = new Product();
        $product->ean = 0;
        $response = ProductDao::modify($product);
        $this->assertFalse($response);
    }
}