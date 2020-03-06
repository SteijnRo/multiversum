<?php
require_once 'model/DataHandler.php';

class ProductLogic {
  public function __construct() {
      $this->DataHandler = new Datahandler("localhost", "mysql", "multiverse", "root", "");
      //"Luc@localhost", "kutmvc"
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
      $sql = 'SELECT * FROM products';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function updateContact() { }
  public function deleteContact() { }
}

?>