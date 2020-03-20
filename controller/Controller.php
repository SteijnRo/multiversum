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
          case 'details':
            $this->collectReadProduct($_GET["id"]);
          break;
          case 'contact':
            $this->collectReadContacts();
          break;
          case 'insertProducts':
            $this->collectInsertFormProducts();
          break; 
          case 'addProduct':
            $this->collectCreateProduct();
          break;
          case 'updateGoggleForm':
            $this->collectReadProductUpdate($_GET["id"]);
          break;
          case 'updateGoggle':
            $this->collectUpdateGoggle($_POST, $_FILES);
          break;
          case 'sendEmail':
            $this->collectSendEmail($_POST);
          break;
          default:
            $this->collectReadProducts();
          break;
        }
      } catch (Exception $e) {
        throw $e;
      }
    }
  public function collectCreateProduct() {
    $content = $this->ProductLogic->createProduct($_POST, $_FILES);
    include_once 'view/insertProducts.php';
  }

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

  public function collectReadProduct($id) {
    $content = $this->ProductLogic->readProduct($id);
    include_once 'view/detail.php';
  }

  public function collectReadProductUpdate($id) {
    $content = $this->ProductLogic->readProduct($id);
    include_once 'view/updateGoggle.php';
  }

  public function collectUpdateGoggle($data, $files) {
    print_r($data);
    var_dump($this->ProductLogic->updateGoggle($data, $files));
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

  public function collectSendEmail($data){
    $this->ProductLogic->sendEmail($data);
    $this->collectReadProducts();
    include_once 'view/main.php';
  }
}
?>