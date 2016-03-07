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
            // Brand::deleteAll();
            // Store::deleteAll();
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
    }

 ?>
