<?php
require_once 'model/DataHandler.php';

class ProductLogic {
  public function __construct() {
      $this->DataHandler = new Datahandler("localhost", "mysql", "multiverse", "root", "");
  }
  public function __destruct() { }
  public function createContacts() { }
  public function readProduct($id) { 
    try {
      $sql = "SELECT * FROM products WHERE id = $id";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    }catch (Exception $e) {
      throw $e;
    }
  }
  public function readProducts() {
    try {
      $qry = "SELECT id, name, brand, desc, pic, price, qty, sale, salePercent ";
      $qry .= "FROM products ";
      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();
      return $results;
    }catch (Exception $e) {
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
    }catch (Exception $e) {
      throw $e;
    }
  }
}

?>