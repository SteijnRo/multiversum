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
        case 'deleteProduct':
          $this->collectDeleteProduct($_POST["id"]);
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
        case 'orderOverview':
          $this->collectReadOrders();
        break;
        case 'updateFooterForm':
          $this->collectUpdateFooterForm();
        break;
        case 'updateFooter':
          $this->collectUpdateFooterData($_POST);
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
        case 'adminPanel':
          $this->collectReadAdminPanel();
        break;
        case 'login':
          $this->collectReadLoginForm();
        break;
        case 'loginSubmit':
          $this->collectReadLoginSubmit($_POST);
        break;
        case 'logout':
          $this->collectReadLogout();
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
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectCreateOrder() {
    $content = $this->ProductLogic->createOrder($_POST);
    include_once 'view/success.php';
  }

  public function collectInsertFormProducts() {
    $content = $this->ProductLogic->insertFormProducts();
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectReadProducts() { 
    $content = $this->ProductLogic->readProducts();
    include_once 'view/main.php';
  }

  public function collectReadOrders() { 
    $content = $this->ProductLogic->readOrders();
    include_once 'view/readOrders.php';
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
    $content = $this->ProductLogic->readProductAdmin($id);
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectUpdateGoggle($data, $files) {
    $content = $this->ProductLogic->updateGoggle($data, $files);
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectUpdateContactData() {
    $content = $this->ProductLogic->readContactsForm();
    include_once 'view/' . $content["view"] . '.php';
  }
  public function collectUpdateFooterForm() {
    $content = $this->ProductLogic->updateFooterForm();
    // $content = $this->ProductLogic->collectReadCopyright();
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectUpdateFooterData($data) {
    $content = $this->ProductLogic->updateFooterData($data);
    // $content = $this->ProductLogic->collectReadCopyright();
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectUpdateContact($data) {
    $content = $this->ProductLogic->updateContacts($data);
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectReadBuyForm() {
    // $content = $this->ProductLogic->readBuyForm();
    include_once 'view/buyForm.php';
  }

  public function collectDeleteProduct() {
    $content = $this->ProductLogic->deleteProduct($_POST["id"]);
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectReadHeader() {
    $header = $this->ProductLogic->readHeader();
    include_once 'view/header.php';
  }

  public function collectReadAdminPanel() {
    $content = $this->ProductLogic->readAdminPanel();
    include_once 'view/' . $content["view"] . '.php';
  }
  
  public function collectReadLoginForm() {
    $content = $this->ProductLogic->readLoginForm();
    include_once 'view/login.php';
  }

  public function collectReadLogout() {
    $content = $this->ProductLogic->readLogout();
    include_once 'view/main.php';
  }
  
  public function collectReadLoginSubmit($data) {
    $content = $this->ProductLogic->readLoginSubmit($data);
    include_once 'view/' . $content["view"] . '.php';
  }

  public function collectReadFooter() {
    $footer = $this->ProductLogic->readFooter();
    include_once 'view/footer.php';
  }

  public function collectSendEmail($data){
    $this->ProductLogic->sendEmail($data);
    $content = $this->collectReadProducts();
    include_once 'view/main.php';
  }
}
?>