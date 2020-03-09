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
    <a href="https://www.google.com/maps/place/Jan+Pieterszoon+Coenstraat+1861/"><img src="https://maps.googleapis.com/maps/api/staticmap?center=Jan+Pieterszoon+Coenstraat+1861&zoom=19&scale=1&size=600x300&maptype=roadmap&key=AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:1%7CJan+Pieterszoon+Coenstraat" alt="Google Map of Jan Pieterszoon Coenstraat 1861"></a>
<?php
include './view/footer.php'; 
?>