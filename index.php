<?php
require("./model/dbase/config.php");
require("./model/dbase/dbopen.php");

include('./view/header.php');

include('./view/main.php');

include('./view/footer.php');
require("./model/dbase/dbclose.php");

?>