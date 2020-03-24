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
          case 'updateContactForm':
            $this->collectUpdateContactData($_POST);
          break;
          case 'updateContact':
            $this->collectUpdateContact($_POST);
          break;
          case 'buy':
            $this->collectReadBuyForm();
          break;
          case 'placeOrder':
            $this->collectCreateOrder();
          break;
          case 'updateCopyrightForm':
            $this->collectUpdateCopyrightData($_POST);
          break;
          case 'updateCopyright':
            $this->UpdateCopyright($data);
          break;
          case 'privacy':
            $this->collectReadPrivacy();
          break;
          case 'copyright':
            $this->collectReadCopyright();
          break;
          case 'algemenevoorwaarden':
            $this->collectReadAlgemeneVoorwaarden();
          break;
          case 'cookies':
            $this->collectReadCookies();
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

  public function collectCreateOrder() {
    $content = $this->ProductLogic->createOrder($_POST);
    include_once 'view/success.php';
  }

  public function collectInsertFormProducts() {
    $content = $this->ProductLogic->insertFormProducts();
    include_once 'view/insertProducts.php';
  }

  public function collectReadProducts() { 
    $content = $this->ProductLogic->readProducts();
    include_once 'view/main.php';
  }

  public function collectReadPrivacy() {
    $content = $this->ProductLogic->readPrivacyStatement();
    include_once 'view/privacy.php';
  }
  public function collectReadCookies() {
    $content = $this->ProductLogic->readCookies();
    include_once 'view/cookies.php';
  }
  public function collectReadCopyright() {
    $content = $this->ProductLogic->readCopyright();
    include_once 'view/copyright.php';
  }
  public function collectReadAlgemeneVoorwaarden() {
    $content = $this->ProductLogic->readAlgemeneVoorwaarden();
    include_once 'view/algemeneVoorwaarde.php';
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
    $content = $this->ProductLogic->updateGoggle($data, $files);
    print_r($content);
  }

  public function collectUpdateContactData($data) {
    $content = $this->ProductLogic->readContacts();
    include_once 'view/updateContact.php';
  }
  public function collectUpdateCopyrightData($data) {
    $content = $this->ProductLogic->readCopyright();
    // $content = $this->ProductLogic->collectReadCopyright();
    include_once 'view/updateCopyright.php';
  }

  public function collectUpdateContact($data) {
    $content = $this->ProductLogic->updateContacts($data);
    print_r($content);
  }

  public function collectReadBuyForm() {
    // $content = $this->ProductLogic->readBuyForm();
    include_once 'view/buyForm.php';
  }

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