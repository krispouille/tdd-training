<?php
namespace Tdd\Homework5;
/**
 * my app
 */

define('PRODUCTION_DATABASE_FILE', '/home/krispouille/Documents/tdd-training/src/Homework5/product.db');

use PDO;
require_once("ProductDao.php");
require_once("Product.php");


try {
    $dsn = sprintf("sqlite:%s", PRODUCTION_DATABASE_FILE);
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->prepare("DELETE FROM product")->execute();

    //- add my product
    $product = new Product();
    $product->ean = '1234';
    $product->name = 'Chicken';

    $result = ProductDao::create($product);
    var_export($result);

    //- add my product - will delete
    $product = new Product();
    $product->ean = '878789';
    $product->name = 'Turkey';

    $result = ProductDao::create($product);
    var_export($result);

    $productToUpdate = ProductDao::getByEan('878789');
    $productToUpdate->name = 'Updated product turkey';
    $productToUpdate->ean = '9999';
    $result = ProductDao::modify($productToUpdate);
    var_export($result);

    $result = ProductDao::getByEan('9999');
    var_export($result);

    $result = ProductDao::getById(9);
    var_export($result);

    $result = ProductDao::getById(1);
    var_export($result);

    $productToDelete = ProductDao::getByEan('878789');
    var_dump($productToDelete);
    $result = ProductDao::delete($productToDelete);
    var_export($result);

    /*$result = ProductDao::getByEan('878789');
    var_export($result);*/


}
catch (\Exception $e) {
    echo "Exception: " . $e->getMessage()."\n";
}




