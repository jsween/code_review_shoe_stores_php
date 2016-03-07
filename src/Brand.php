<?php
    class Brand
    {
        private $name;
        private $id;

        function __construct($name, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach ($returned_brands as $brand) {
                $name = $brand['name'];
                $id = $brand['id'];
                $new_brand = new Brand($name, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM brands;");
            $GLOBALS['DB']->query("DELETE FROM brands_stores;");
        }

        static function find($search_id)
        {
            $found_brand = NULL;
            $brands = Brand::getAll();
            foreach ($brands as $brand) {
                if ($brand->getId() == $search_id) {
                    $found_brand = $brand;
                }
            }
            return $found_brand;
        }

        function addStore($store)
        {
            $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
        }

        function getStores()
        {
            $query = $GLOBALS['DB']->query("SELECT store_id FROM stores_brands WHERE brand_id = {$this->getId()};");
            $store_ids = $query->fetchAll(PDO::FETCH_ASSOC);

            $stores = array();
            foreach($store_ids as $id) {
                $store_id = $id['store_id'];
                $result = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id = {$store_id};");
                $returned_store = $result->fetchAll(PDO::FETCH_ASSOC);

                $name = $returned_store[0]['name'];
                $id = $returned_store[0]['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }


    }
 ?>
