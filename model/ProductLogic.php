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
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "insertProducts";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $content = array('header' => $header, 'result' => "", 'view'=>$view, 'footer' => $footer);
      if (!isset($data["name"]) || !isset($data["brand"]) || !isset($data["description"]) || !isset($files["pic"]) || !isset($data["price"]) || !isset($data["qty"]) || !isset($data["sale"]) || !isset($data["salePercent"])) {
        return $content;
      }
      if (!$this->checkData($data)) {
        return $content;
      }
      if (!$this->uploadFile($data, $files)) {
        return $content;
      }
      $sql = 'INSERT INTO products (name, brand, description, pic, price, platform, resolution, refreshRate, functions, physicalConnections, fov, accesories, insurance, special, qty, sale, salePercent, archive, EAN, SKU) ';
      $sql .= 'VALUES("' . $data["name"] . '", "' . $data["brand"] . '", "' . $data["description"] . '", "' . $files["pic"]["name"] . '", "' . $data["price"] . '", "' . $data["platform"] . '", "' . $data["resolution"] . '", "' . $data["refreshRate"] . '", "' . $data["functions"] . '", "' . $data["physicalConnections"] . '", "' . $data["fov"] . '", "' . $data["accesories"] . '", "' . $data["insurance"] . '", "' . $data["special"] . '", "' . $data["qty"] . '", "' . $data["sale"] . '", "' . $data["salePercent"] . '", "' . $data["archive"] . '", "' . $data["EAN"] . '", "' . $data["SKU"] . '") ';
      $results = $this->DataHandler->createData($sql);
      $content = array('header' => $header, 'result' => $results, 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function createOrder($data) {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $content = array('header' => $header, 'result' => "", 'footer' => $footer);
      
      if (!isset($data["productID"]) || !isset($data["name"]) || !isset($data["adress"]) || !isset($data["city"]) || !isset($data["state"]) || !isset($data["postcode"]) || !isset($data["telNum"]) || !isset($data["email"])) {
        return "Lege velden tegen gekomen.";
      }

      $emailCheck = !preg_replace("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", "", $data["email"]);

      if (!$emailCheck) {
        return "Foutief e-mail adres opgegeven.";
      }

      $emailData["subject"] = "Confirmatie bestelling Multiversum";
      $emailData["email"] = $data["email"];
      $emailData["msg"] = '
        <h3>Beste klant,</h3>
        <p>
          Nogmaals hartelijk dank voor uw bestelling bij multiversum. Wij hopen dat u tevreden bent met uw<br>
          aankoop en deze volledig aan uw verwachtingen voldoet. Uw bestelling is met de grootste zorg<br>
          uitgevoerd en wij streven dan ook naar een perfecte kwaliteit voor alle artikelen die u ontvangt.<br>
          In de bijlage zult u de bon kunnen downloaden.<br>
          <br>
          <br>
          Met vriendelijke groet,
          <br>
          Multiversum.
        </p>
        <br>
        <br>
        <p class="disclaimer">
          Indien dit bericht kennelijk bij vergissing aan u is verzonden, verzoeken wij u het onverwijld te retourneren aan de verzender, het origineel te verwijderen en geen kopieën te behouden. Dit e-mailbericht gaat uit multiversum en/of gelieerde werkmaatschappijen en is uitsluitend bestemd voor geadresseerde(n). Dit bericht kan informatie bevatten die vertrouwelijk is, door beroepsaansprakelijkheid gedekt of om auteurrechtelijke of andere redenen beschermd is. Indien u niet als geadresseerde bent aangeduid, dient u zich te onthouden van kennisneming, gebruikmaking, openbaarmaking, verveelvoudiging of verdere verspreiding van de inhoud van dit bericht en/of de eventuele bijlagen. Aan de inhoud van dit bericht kan geen enkel recht worden ontleend, tenzij dit specifiek in de e-mail of bijlage wordt vermeld. 
        </p>
        <footer class="footer">(C) Multiversum | All Rights Reserved</footer>
      ';

      $emailSent = $this->sendEmail($emailData);

      $productIDs = "";
      // foreach ($data["productID"] as $value) {
      //   $productIDs .= $value . "*";
      // }
      // $productIDs = rtrim($productIDs, "*");
      $productIDs = $data["productID"];
      // for ($i = 0; $i < count($productIDArray))
      $headsetData = $this->readProduct($productIDs);
      
      $paidPrice = $headsetData["result"][0]["price"];
      $datetime = date("Y-m-d H:i:s");
      $sql = 'INSERT INTO orders (productIDs, paidPrice, name, adress, city, state, postcode, telNum, email, date) ';
      $sql .= 'VALUES("' . $productIDs . '", "' . trim($paidPrice) . '", "' . trim($data["name"]) . '", "' . trim($data["adress"]) . '", "' . trim($data["city"]) . '", "' . trim($data["state"]) . '", "' . trim($data["postcode"]) . '", "' . trim($data["telNum"]) . '", "' . trim($data["email"]) . '", "' . trim($datetime) . '") ';
      $results = $this->DataHandler->createData($sql);
      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readProduct($id) { 
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $sql = "SELECT * FROM products ";
      $sql .= "WHERE id = $id ";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      $content = array("header"=>$header, "result"=>$results, "footer"=>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readProductAdmin($id) { 
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateGoggle";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $sql = "SELECT * FROM products ";
      $sql .= "WHERE id = $id ";
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();
      $content = array("header"=>$header, "result"=>$results, 'view'=> $view, "footer"=>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readProducts() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT * ";
      $qry .= "FROM products ";
      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readOrders() {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "readOrders";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT * ";
      $qry .= "FROM orders ";
      $res = $this->DataHandler->readsData($qry);
      $orders = $res->fetchAll();

      $productDetailsArray = array();
      for ($i = 0; $i < count($orders); $i++) {
        $productIDArray = explode("*", $orders[$i]["productIDs"]);
        for ($j = 0; $j < count($productIDArray); $j++) {
          $qry = "SELECT id, name, price ";
          $qry .= "FROM products ";
          $qry .= "WHERE id = " . $productIDArray[$j];
          $res = $this->DataHandler->readsData($qry);
          $productDetailsArray[] = $res->fetchAll();
        }
      }

      $results = array("orders"=>$orders, "products"=>$productDetailsArray);

      $content = array('header' => $header, 'result' => $results, 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function insertFormProducts() {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "insertProducts";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      // nothing as of yet
      $content = array('header' => $header, 'result' => "", 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateGoggle($data, $files) {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateGoggle";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      if (empty($data)) {
        return $content = array('header' => $header, 'result' => "Geen waardes meegegeven", 'footer' => $footer);
      }
      foreach ($data as $key => $value) {
        if ($data[$key] == "") {
          $data[$key] = "-";
        }
      }

      if ($data["sale"] == "true") {
        $data["sale"] = 1;
      } else {
        $data["sale"] = 0;
      }

      if ($data["archive"] == "true") {
        $data["archive"] = 1;
      } else {
        $data["archive"] = 0;
      }

      if (isset($files) && !empty($files["pic"]["name"])) {
        $resultUpload = $this->uploadFile($data, $files);
          if ($resultUpload !== true) {
            return $resultUpload;
          }
          $sql = 'UPDATE products ';
          $sql .= 'SET name="' . $data["name"] . '", brand="' . $data["brand"] . '", description="' . $data["description"] . '", pic="' . $files["pic"]["name"] . '", price="' . $data["price"] . '", platform="' . $data["platform"] . '", resolution="' . $data["resolution"] . '", refreshRate="' . $data["refreshRate"] . '", functions="' . $data["functions"] . '", physicalConnections="' . $data["physicalConnections"] . '", fov="' . $data["fov"] . '", accesories="' . $data["accesories"] . '", insurance="' . $data["insurance"] . '", special="' . $data["special"] . '", qty="' . $data["qty"] . '", sale="' . $data["sale"] . '", salePercent="' . $data["salePercent"] . '", archive="' . $data["archive"] . '", EAN="' . $data["EAN"] . '", SKU="' . $data["SKU"] . '" ';
          $sql .= 'WHERE id = ' . $data["id"];
      } else {
        $sql = 'UPDATE products ';
        $sql .= 'SET name="' . $data["name"] . '", brand="' . $data["brand"] . '", description="' . $data["description"] . '", price="' . $data["price"] . '", platform="' . $data["platform"] . '", resolution="' . $data["resolution"] . '", refreshRate="' . $data["refreshRate"] . '", functions="' . $data["functions"] . '", physicalConnections="' . $data["physicalConnections"] . '", fov="' . $data["fov"] . '", accesories="' . $data["accesories"] . '", insurance="' . $data["insurance"] . '", special="' . $data["special"] . '", qty="' . $data["qty"] . '", sale="' . $data["sale"] . '", salePercent="' . $data["salePercent"] . '", archive="' . $data["archive"] . '", EAN="' . $data["EAN"] . '", SKU="' . $data["SKU"] . '" ';
        $sql .= 'WHERE id = ' . $data["id"];
      }
      $result = $this->DataHandler->updateData($sql);
      $formContent = $this->readProduct($data["id"]);
      $content = array('header' => $header, 'result' => $formContent["result"], 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateContacts($data) {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateContact";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      if (empty($data)) {
        $view = "updateContact";
        $formContent = $this->readContacts();
        return $content = array('header' => $header, 'result' => "Geen waardes meegegeven", 'view'=>$view, 'footer' => $footer);
      }
      foreach ($data as $key => $value) {
        if ($data[$key] == "") {
          $data[$key] = "-";
        }
      }
      
      if ($data["formType"] == "companyHours") {
        $result = array();
        for ($i = 0; $i < count($data["businesshours"]); $i++) {
          $iPlusOne = $i+1;
          $sql = 'UPDATE businesshours ';
          $sql .= 'SET openH = "' . $data["businesshours"][$i]["openH"] . '", closeH = "' . $data["businesshours"][$i]["closeH"] . '"';
          $sql .= 'WHERE id = ' . $iPlusOne;
          $this->DataHandler->updateData($sql);
        }
      } else {
        $sql = 'UPDATE contact ';
        $sql .= 'SET kvk = "' . $data["kvk"] . '", BTWNum = "' . $data["BTWNum"] . '", street = "' . $data["street"] . '", city = "' . $data["city"] . '", state = "' . $data["state"] . '", postcode = "' . $data["postcode"] . '"';
        $sql .= 'WHERE id = 1';
        $this->DataHandler->updateData($sql);
      }
      $formContent = $this->readContacts();
      $content = array('header' => $header, 'result' => $formContent["result"], 'businesshours'=>$formContent["businesshours"], 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readBuyForm() {
    $header = $this->readHeader();
    $footer = $this->readFooter();
    return $content = array('header' => $header, 'result' => "", 'footer' => $footer);
  }

  public function archiveProduct($id) {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateGoggle";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $sql = 'UPDATE product ';
      $sql .= 'SET ';
      $sql .= 'WHERE id = 1';
      $deleteResult['sqlResult'] = $this->DataHandler->deleteData($sql);
      $deleteResult['deleteId'] = $id;
      $products = $this->readProducts();
      $content = array('header' => $header, 'result' => $deleteResult, 'products'=>$products, 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function deleteProduct($id) {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "adminPanel";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $sql = "DELETE FROM products ";
      $sql .= "WHERE id = \"$id\"";
      $deleteResult['sqlResult'] = $this->DataHandler->deleteData($sql);
      $deleteResult['deleteId'] = $id;
      $products = $this->readProducts();

      $content = array('header' => $header, 'products'=>$products["result"], 'deleteResult' => $deleteResult, 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

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
      $sql = 'SELECT * FROM footer ';
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
      return "Bestand met de zelfde naam bestaal al";
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
        return "Er is iets fout gegaan bij het uploaden van het bestand.";
      }
    }
  }

  public function sendEmail($data) {
    $subject = $data["subject"];
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
        $mailer->addCC($mail);

        // content
        $mailer->isHTML(TRUE);
        $mailer->Subject = $subject;
        $mailer->Body = $msg;

        $mailer->send();
        return "E-mail verstuurd";
    } catch (Exception $e) {
        return "E-mail versturen mislukt";
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

  public function readContactsForm(){
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateContact";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $businesshours = $this->readBusinessHours();
      $qry = "SELECT * ";
      $qry .= "FROM contact ";
      $res = $this->DataHandler->readsData($qry);
      $result = $res->fetchAll();
      // $result= array();
      $content = array('header' => $header, 'result' => $result, 'businesshours' => $businesshours, 'view'=>$view, 'footer' =>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readBusinessHours() {
    try {
    $qry = "SELECT id, weekDay, openH, closeH ";
    $qry .= "FROM businesshours ";
    $res = $this->DataHandler->readsData($qry);
    $result = $res->fetchAll();
    // var_dump($result);
    return $result;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function updateFooterForm() { 
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateFooter";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $content = array("header"=>$header, 'view'=>$view, "footer"=>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateFooterData($data) { 
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "updateFooter";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $sql = "UPDATE footer ";
      $sql .= "SET content=\"" . $data["value"] . "\" ";
      $sql .= "WHERE id = \"" . $data["id"] . "\" ";
      $updateResult = $this->DataHandler->updateData($sql);
      $results = $this->readProducts($sql);
      $content = array("header"=>$header, "result"=>$results["result"], "updateResult"=>$updateResult, 'view'=>$view, "footer"=>$footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readPrivacyStatement() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT content ";
      $qry .= "FROM footer ";
      $qry .= "WHERE id = 3";

      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function readCopyright() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT content ";
      $qry .= "FROM footer ";
      $qry .= "WHERE id = 1";

      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function readAlgemeneVoorwaarden() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT content ";
      $qry .= "FROM footer ";
      $qry .= "WHERE id = 2";

      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function readCookies() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $qry = "SELECT content ";
      $qry .= "FROM footer ";
      $qry .= "WHERE id = 4";

      $res = $this->DataHandler->readsData($qry);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'footer' => $footer);
      return $content;
    }catch (Exception $e) {
      throw $e;
    }
  }

  public function readAdminPanel() {
    try {
      $sessionCheckResult = $this->sessionCheck();
      if ($sessionCheckResult != "continue") {
        return $sessionCheckResult;
      } else {
        $view = "adminPanel";
      }
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $products = $this->readProducts();
      $sql = 'SELECT * FROM header';
      $res = $this->DataHandler->readsData($sql);
      $results = $res->fetchAll();

      $content = array('header' => $header, 'result' => $results, 'products' => $products['result'], 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readLoginForm() {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();

      $content = array('header' => $header, 'result' => "meme", 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readLoginSubmit($data) {
    try {
      $header = $this->readHeader();
      $footer = $this->readFooter();
      $products = $this->readProducts();
      if (isset($data["username"]) && isset($data["password"])) {
        $sql = 'SELECT * FROM users WHERE username = "' . $data["username"] . '"';
        $res = $this->DataHandler->readsData($sql);
        $results = $res->fetchAll();
        
        if (!empty($results)) {
          $passwordCheck = password_verify($data["password"], $results[0]["password"]);
          if ($passwordCheck) {
            $_SESSION["username"] = $results[0]["username"];
            $_SESSION["perms"] = $results[0]["perms"];
            $view = "adminpanel";
          } else {
            $view = "login";
          }
        } else {
          $view = "login";
        }
      } else {
        $view = "login";
      }
      $content = array('header' => $header, 'result'=>$results, 'products'=>$products["result"], 'view'=>$view, 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function readLogout() {
    try {
      session_destroy();
      $header = $this->readHeader();
      $footer = $this->readFooter();
      
      $products = $this->readProducts();


      $content = array('header' => $header, 'result'=>$products["result"], 'footer' => $footer);
      return $content;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function sessionCheck() {
    try {
      if (isset($_SESSION["perms"]) && $_SESSION["perms"] == "admin") {
        return "continue";
      } else {
        $header = $this->readHeader();
        $footer = $this->readFooter();
        $mainContent = $this->readProducts();
        $view = "main";
        $content = array('header' => $header, 'result'=>$mainContent["result"], 'view'=>$view, 'footer' => $footer);
        return $content;
      }
    } catch (Exception $e) {
      throw $e;
    }
  }
}

?>