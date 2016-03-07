<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Brand.php';
    require_once __DIR__ . '/../src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = "Store";
            $id = 1;
            $test_Store = new Store($name, $id);
            // Act
            $result = $test_Store->getName();
            // Assert
            $this->assertEquals("Store", $result);
        }

        function test_setName()
        {
            // Arrange
            $name = "Store";
            $id = 1;
            $test_Store = new Store($name, $id);
            // Act
            $result = $test_Store->getName();
            // Assert
            $this->assertEquals("Store", $result);
        }

        function test_getId()
        {
            // Arrange
            $name = "Store";
            $id = 1;
            $test_Store = new Store($name, $id);
            // Act
            $result = $test_Store->getId();
            // Assert
            $this->assertEquals(1, $result);
        }

        function test_save()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);

            // Act
            $test_store->save();

            // Assert
            $result = Store::getAll();
            $this->assertEquals($test_store, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            Store::deleteAll();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            // Arrange
            $name = "Store";
            $test_brand = new Store($name);
            $test_brand->save();

            $name2 = "Store 2";
            $test_brand2 = new Store($name2);
            $test_brand2->save();

            // Act
            $id = $test_brand->getId();
            $result = Store::find($id);

            // Assert
            $this->assertEquals($test_brand, $result);
        }

        function test_delete()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);
            $test_store->save();
            $name2 = "Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            $test_store->delete();

            // Assert
            $this->assertEquals([$test_store2], Store::getAll());
        }

        function test_update()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);
            $test_store->save();
            $new_name = "Store Updated";

            // Act
            $test_store->update($new_name);
            $result = $test_store->getName();

            // Assert
            $this->assertEquals($new_name, $result);
        }

        function test_addBrand()
        {
            // Arrange
            $name = "Store";
            $id = 2;
            $test_store = new Store($name, $id);
            $test_store->save();

            $name2 = "Brand";
            $id2 = 3;
            $test_brand = new Brand($name2, $id2);
            $test_brand->save();

            // Act
            $test_store->addBrand($test_brand);

            // Assert
            $this->assertEquals([$test_brand], $test_store->getBrands());
        }

        function test_getBrands()
        {
            // Arrange
            $name = "Store";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Brand";
            $test_brand = new Brand($name2);
            $test_brand->save();

            $name3 = "Brand 2";
            $test_brand2 = new Brand($name3);
            $test_brand2->save();

            // Act
            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);
            $brand_results = $test_store->getBrands();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $brand_results);
        }

    }

 ?>
