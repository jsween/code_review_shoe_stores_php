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
            $test_Client = new Brand($name, $id);
            // Act
            $result = $test_Client->getName();
            // Assert
            $this->assertEquals("Store", $result);
        }

        function test_getId()
        {
            // Arrange
            $name = "Store";
            $id = 1;
            $test_Client = new Brand($name, $id);
            // Act
            $result = $test_Client->getId();
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
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "Store 2";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            // Act
            $id = $test_brand->getId();
            $result = Brand::find($id);

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


    }

 ?>
