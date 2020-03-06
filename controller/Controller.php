<?php
require_once 'model/ProductLogic.php';

class Controller {
    public function __construct() {
        $this->ProductLogic =  new ProductLogic();
    }
    public function __destruct() {}
    public function handleRequest() { 
      try {
        $op = isset($_REQUEST['op'])?$_REQUEST['op']:null;
        switch($op) {
          case 'main':
            $this->collectReadProducts();
          break;
          case 'contact':
            $this->collectReadContacts();
          break;
          default:
            $this->collectReadProducts();
          break;
        }
      } catch (Exception $e) {
        throw $e;
      }
    }
  public function collectCreateContact() {}

  public function collectReadProducts() { 
      $products = $this->ProductLogic->readProducts();
      include_once 'view/main.php';
  }

  public function collectReadProduct($id){
    $product = $this->ProductLogic->readProduct($id);
    include_once 'view/read.php';
  }
  public function collectUpdateContact() {}

  public function collectDeleteContact() {}
}
?>