<?php
// require("./model/dbase/config.php");
// require("./model/dbase/dbopen.php");
// include("./view/assets/functions.php");

// include('./view/header.php');

// switch ($_SERVER["REQUEST_URL"]) {
//   case "contact":
//     require_once("view/contact.php");
//   break;
//   case "main":
//     require_once("view/main.php");
//   break;
//   default:
//     require_once("view/main.php");
//   break;
// }

// include('./view/footer.php');
// require("./model/dbase/dbclose.php");
require_once 'controller/Controller.php';

$controller = new Controller();
$controller->handleRequest();
?>