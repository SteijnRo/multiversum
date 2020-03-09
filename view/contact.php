<?php
include 'view/header.php';
?>


<div class="container">
    <div class="row d-flex justify-content-center business-hours">
        <div class="col-sm-6">
        <h2 class="title">Opening Hours</h2>
        <ul class="list-unstyled opening-hours">
            <?php
            for ($i=0; $i < count($content[1]); $i++) { 
            echo "
            <li> ". $content[1][$i]['weekDay'] ." <span class=\"pull-right\"> ". $content[1][$i]['openH'] ." - ". $content[1][$i]['closeH'] ." </span></li>
            ";
            }
            ?>
        </ul>

    </div>
    <!-- AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I -->

    <iframe
  width="450"
  height="250"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I&q=1861+Jan+Pieterszoon+Coenstraat" allowfullscreen>
</iframe>
   <?php
include './view/footer.php'; 
?>