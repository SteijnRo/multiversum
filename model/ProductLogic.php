<?php
require_once 'model/DataHandler.php';

class ContactsLogic {
  public function __construct() {
      $this->DataHandler = new Datahandler("localhost", "mysql", "multiverse", "root", "");
      //"Luc@localhost", "kutmvc"
  }
  public function __destruct() { }
  public function createContacts() { }
  public function readContact($id) { 
    try {
      $sql = "SELECT * FROM contacts WHERE id = $id";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    }catch (Exception $e) {
      throw $e;
    }
  }
  public function readContacts() {
    try {
      $sql = 'SELECT * FROM contacts';
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