<?php
include 'view/header.php';
$product = $content['result'];
var_dump($product);
?>

<div class="container">
    <div class="row d-flex justify-product-center business-hours">
        <div class="col-sm-4">
        <h2 class="title">Openingstijden</h2>
        <form action="?op=updateContact">
        <ul class="list-unstyled opening-hours">
            <?php
            for ($i=0; $i < count($product['businesshours']); $i++) { 
            echo "
            <li> ". $product['businesshours'][$i]['weekDay'] ." <span class=\"pull-right\"> ". $product['businesshours'][$i]['openH'] ." - ". $product['businesshours'][$i]['closeH'] ." </span></li>
            ";
            }
            ?>
        </ul>
        </form>
        </div>
        <div class="col-sm-4">
        <h2 class="title">Bedrijfsgegevens</h2>
        <ul class="list-unstyled opening-hours">
            <?php
            for ($i=0; $i < count($product['result']); $i++) { 
            echo "
            Bedrijfsgegevens
            <li><span class=\"pull-right\">". $product['result'][$i]['company'] ."</span></li>
            <li><span class=\"pull-right\">". $product['result'][$i]['street'] .", ". $product['result'][$i]['city'] .", ". $product['result'][$i]['postcode'] .",". $product['result'][$i]['state'] ."</span></li>
            <li>KvK: <span class=\"pull-right\">". $product['result'][$i]['kvk'] ."</span></li>
            <li>BTW-Nummer: <span class=\"pull-right\">". $product['result'][$i]['BTWNum'] ."</span></li>
            ";
            }
            ?>
        </ul>
    </div>
    </div>
</div>

   <?php
include './view/footer.php'; 
?>