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
    $header = $this->readHeader();
    $footer = $this->readFooter();
    try {
      $qry = "SELECT id, name, brand, specification, pic, price, qty, sale, salePercent ";
      $qry .= "FROM products ";
      // SELECT id, name, brand, specification, pic, price, qty, sale, salePercent FROM products;
      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array( $header, $results, $footer);
      return $content;
    }catch (Exception $e) {
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

  public function readFooter(){
    try {
      $sql = 'SELECT * FROM footer';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    }catch (Exception $e) {
      throw $e;
    }
  }
  
  public function readContacts(){
    try {
      
    }catch (Exception $e) {
      throw $e;
    }
  }
}

?>