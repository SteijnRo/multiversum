<?php
include 'view/header.php';
?>


<div class="container">
    <div class="row d-flex justify-content-center business-hours">
        <div class="col-sm-4">
        <h2 class="title">Opening Hours</h2>
        <ul class="list-unstyled opening-hours">
            <?php
            for ($i=0; $i < count($content['businesshours']); $i++) { 
            echo "
            <li> ". $content['businesshours'][$i]['weekDay'] ." <span class=\"pull-right\"> ". $content['businesshours'][$i]['openH'] ." - ". $content['businesshours'][$i]['closeH'] ." </span></li>
            ";
            }
            ?>
        </ul>
        </div>
        <div class="col-sm-4">
        <h2 class="title">Bedrijfsgegevens</h2>
        <ul class="list-unstyled opening-hours">
            <?php
            for ($i=0; $i < count($content['result']); $i++) { 
            echo "
            Bedrijfsgegevens
            <li><span class=\"pull-right\">". $content['result'][$i]['company'] ."</span></li>
            <li><span class=\"pull-right\">". $content['result'][$i]['street'] .", ". $content['result'][$i]['city'] .", ". $content['result'][$i]['postcode'] .",". $content['result'][$i]['state'] ."</span></li>
            <li>KvK: <span class=\"pull-right\">". $content['result'][$i]['kvk'] ."</span></li>
            <li>BTW-Nummer: <span class=\"pull-right\">". $content['result'][$i]['BTWNum'] ."</span></li>
            ";
            }
            ?>
        </ul>
    </div>
    
    <iframe
        width="450" 
        height="250"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I&q=1861+Jan+Pieterszoon+Coenstraat" allowfullscreen>
    </iframe>
</div>

    <!-- </div> -->
    <!-- AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I -->

   <?php
include './view/footer.php'; 
?>