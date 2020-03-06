<?php
require_once 'model/ContactsLogic.php';

class ContactsController {
    public function __construct() {
        $this->ContactsLogic =  new ContactsLogic();
    }
    public function __destruct() {}
    public function handleRequest() { 
      try {
        $op = isset($_REQUEST['op'])?$_REQUEST['op']:null;
        switch($op) {
          case 'create':
          $this->collectCreateContact();
          break;
          case 'reads':
          $this->collectReadContacts();
          break;
          case 'read':
          $this-> collectReadContact($_REQUEST['id']);
          break;
          case 'update':
          $this->collectUpdateContact();
          break;
          default:
          $this->collectReadContacts();
        break;
        }
      } catch (Exception $e) {
        throw $e;
      }
    }
  public function collectCreateContact() {}

  public function collectReadContacts() { 
      $contacts = $this->ContactsLogic->readContacts();
      include 'view/reads.php';
  }

  public function collectReadContact($id){
    $contact = $this->ContactsLogic->readContact($id);
    include 'view/read.php';
  }
  public function collectUpdateContact() {}

  public function collectDeleteContact() {}
}
?>