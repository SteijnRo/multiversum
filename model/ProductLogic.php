<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'model/DataHandler.php';

class ProductLogic {
  public function __construct() {
      $this->DataHandler = new Datahandler("localhost", "mysql", "multiverse", "root", "");
  }
  public function __destruct() { }
  public function createProduct($data, $files) {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $content = array('header' => $header, 'result' => "", 'footer' => $footer);
      if (!isset($data["name"]) || !isset($data["brand"]) || !isset($data["specification"]) || !isset($files["pic"]) || !isset($data["price"]) || !isset($data["qty"]) || !isset($data["sale"]) || !isset($data["salePercent"])) {
        return $content;
      }
      if (!$this->checkData($data)) {
        return $content;
      }
      if (!$this->uploadFile($data, $files)) {
        return $content;
      }
      $sql = 'INSERT INTO products (name, brand, specification, pic, price, qty, sale, salePercent) ';
      $sql .= 'VALUES("'.$data["name"].'", "'.$data["brand"].'", "'.$data["specification"].'", "'.$files["pic"]["name"].'", '.$data["price"].', '.$data["qty"].', '.$data["sale"].', '.$data["salePercent"].') ';
      // INSERT INTO products (name, brand, specification, pic, price, qty, sale, salePercent) VALUES("test", "samsung", "yes", "stonks.jpg", 123, 1, 0, 0);
      $results = $this->DataHandler->createData($sql);
      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }
  public function readProduct($id) { 
    try {
      $sql = "SELECT * FROM products WHERE id = $id";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    } catch (Exception $e) {
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

      $content = array( 'header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
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
    } catch (Exception $e) {
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
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readFooter(){
    try {
      $sql = 'SELECT * FROM footer';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function checkData($array) {
    $return = true;
    foreach ($array as $key => $value) {
      if (empty($value) && $value != 0) {
        $return = false;
        echo "kanker";
        var_dump($value);
        echo $key;
      }
    }
    return $return;
  }

  public function uploadFile($data, $files) {
    $targetDir = "view/assets/media/";
    $targetFile = $targetDir . basename($files["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image (0 bits)
    $check = filesize($files["pic"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    // Check if  file already exists
    if (file_exists($targetFile)) {
      // not uploaded cause file with identical name already exists
      return false;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      // not uploaded
      return false;
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($files["pic"]["tmp_name"], $targetFile)) {
        // file uploaded
        return true;
      } else {
        // not uploaded
        return false;
      }
    }
  }

  public function sendEmail($data) {
    $mail = $data["email"];
    $msg = $data["msg"];
    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mailer = new PHPMailer(false);
    try {
        //Server settings
        $mailer->SMTPDebug = 0;                                       // Enable verbose debug output
        $mailer->isSMTP();                                            // Send using SMTP
        $mailer->Host       = "smtp.gmail.com";                       // Set the SMTP server to send through
        $mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mailer->Username   = 'devmailsr@gmail.com';                  // SMTP username
        $mailer->Password   = '6sgRxk2hiQU7ZMF';                      // SMTP password
        $mailer->SMTPSecure = "TLS";                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mailer->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        $mailer->setFrom("devmailsr@gmail.com", "Dev email");
        $mailer->addAddress("stro2002@hotmail.nl");
        $mailer->addReplyTo($mail);

        // content
        $mailer->isHTML(TRUE);
        $mailer->Subject = "Contact formilier ja toch";
        $mailer->Body = $msg;

        $mailer->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
  }
  
  public function readContacts(){
    $header = $this->readHeader();
    $footer = $this->readFooter();
    $businesshours = $this->readBusinessHours();
    try {
      $qry = "SELECT * ";
      $qry .= "FROM contact ";
      $res = $this->DataHandler->readsData($qry);
      $result = $res->fetchAll();
      // $result= array();
      $content = array('header' => $header, 'result' => $result, 'businesshours' => $businesshours, 'footer' =>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readBusinessHours() {
    try {
    $qry = "SELECT id, weekDay, openH, closeH ";
    $qry .= "FROM buisnesshours ";
    $res = $this->DataHandler->readsData($qry);
    $result = $res->fetchAll();
    // var_dump($result);
    return $result;
    }catch (Exception $e) {
      throw $e;
    }
  }
}

?>