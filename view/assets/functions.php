<?php

function queryContent($qry) {
    include("./model/dbase/config.php");
    include("./model/dbase/dbopen.php");        
    // hoeft geen db te includen omdat dat al gebeurd in index.php

    $preparedquery = $dbaselink->prepare($qry);
    $preparedquery->execute();

    if ($preparedquery->errno) {
      Echo "Er is een fout opgetreden";
    } else {
      $result = $preparedquery->get_result();
      if ($result->num_rows === 0 ) {
        echo "Geen rijen gevonden";
      } else {
        include("./model/dbase/dbclose.php");
        return $result;
      }
    }
  }
  
?>