<?php
require_once 'model/DataHandler.php';

class ProductLogic {
  public function __construct() {
      $this->DataHandler = new Datahandler("localhost", "mysql", "multiverse", "root", "");
  }
  public function __destruct() { }
  public function createProduct($data) {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      if (!isset($data["name"]) || !isset($data["brand"]) || !isset($data["specification"]) || !isset($data["pic"]) || !isset($data["price"]) || !isset($data["qty"]) || !isset($data["sale"]) || !isset($data["salePercent"])) {
        $content = array($header, "", $footer);
        return $content;
      }
      if (!$this->checkData($data)) {
        $content = array($header, "", $footer);
        return $content;
      }
      $sql = 'INSERT INTO products (name, brand, specification, pic, price, qty, sale, salePercent) ';
      $sql .= 'VALUES("'.$data["name"].'", "'.$data["brand"].'", "'.$data["specification"].'", "'.$data["pic"].'", '.$data["price"].', '.$data["qty"].', '.$data["sale"].', '.$data["salePercent"].') ';
      // INSERT INTO products (name, brand, specification, pic, price, qty, sale, salePercent) VALUES("test", "samsung", "yes", "stonks.jpg", 123, 1, 0, 0);
      $result = $this->DataHandler->createData($sql);
      $content = array($header, $result, $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }
  public function readProduct($id) { 
    try {
      $sql = "SELECT * FROM products WHERE id = $id";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }
  public function readProducts() {
    $header = $this->readHeader();
    $footer = $this->readFooter();
    try {
      $qry = "SELECT id, name, brand, specification, pic, price, qty, sale, salePercent ";
      $qry .= "FROM products ";
      // SELECT id, name, brand, specification, pic, price, qty, sale, salePercent FROM products;
      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array($header, $results, $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function insertFormProducts() {
    $header = $this->readHeader();
    $footer = $this->readFooter();
    try {
      // nothing as of yet
      $content = array($header, "", $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateContact() { }
  public function deleteContact() { }

  public function readHeader(){
    try {
      $sql = 'SELECT * FROM header';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readFooter(){
    try {
      $sql = 'SELECT * FROM footer';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function checkData($array) {
    $return = true;
    foreach ($array as $key => $value) {
      if (empty($value) && $value != 0) {
        $return = false;
        echo "kanker";
        var_dump($value);
        echo $key;
      }
    }
    return $return;
  }
  
  public function readContacts(){
    try {
      
    } catch (Exception $e) {
      throw $e;
    }
  }
}

?>