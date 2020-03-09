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
          case 'insertProducts':
            $this->collectInsertFormProducts();
          break;
          default:
            $this->collectReadProducts();
          break;
        }
      } catch (Exception $e) {
        throw $e;
      }
    }
  public function collectCreateProduct() {}

  public function collectInsertFormProducts() {
    $content = $this->ProductLogic->insertFormProducts();
    include_once 'view/insertProducts.php';
  }

  public function collectReadProducts() { 
    $content = $this->ProductLogic->readProducts();
    include_once 'view/main.php';
  }

  public function collectReadContacts() {
    $content = $this->ProductLogic->readContacts();
    include_once 'view/contact.php';
  }

  public function collectReadProduct($id){
    $product = $this->ProductLogic->readProduct($id);
    include_once 'view/read.php';
  }
  public function collectUpdateContact() {}

  public function collectDeleteContact() {}

  public function readHeader() {
    $header = $this->ProductLogic->readHeader();
    include_once 'view/header.php';
  }

  public function readFooter() {
    $footer = $this->ProductLogic->readFooter();
    include_once 'view/footer.php';
  }
}
?>