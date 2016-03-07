<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Brand.php';
    // require_once __DIR__ . '/../src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        function test_getName()
        {
            // Arrange
            $name = "Nike";
            $id = 1;
            $test_Client = new Brand($name, $id);
            // Act
            $result = $test_Client->getName();
            // Assert
            $this->assertEquals("Nike", $result);
        }
    }

 ?>
