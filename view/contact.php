<?php
include 'view/header.php';
?>


<div class="container">
    <div class="row d-flex justify-content-center business-hours">
        <div class="col-sm-4">
        <h2 class="title">Openingstijden</h2>
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
<!-- <div class="input-group col-sm-4">

  <input type="text" name="email" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="basic-addon1">
  <input type="text" name="msg" class="form-control" placeholder="Bericht" aria-label="Bericht" aria-describedby="basic-addon1">
  <input  class="form-control" type="submit" value="Verzend">
</div> -->
    
    <iframe
        width="450" 
        height="250"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I&q=1861+Jan+Pieterszoon+Coenstraat" allowfullscreen>
    </iframe>
</div>
</div>
<div class="container justify-content-center" id="contact">
	<div class="row">
      <div class="col-md-6 offset-4">
        <div class="well well-sm">
          <form class="form-horizontal" action="?op=sendEmail" method="post">
          <fieldset>
            <legend class="text-left">Contacteer ons</legend>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">naam</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Uw naam" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Uw email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message"> Uw Bericht </label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="msg" placeholder="Schrijf uw bericht hier..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-1 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Verzend</button>
              </div>
            </div>
            <br><br>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>


    <!-- AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I -->
    <!-- <iframe
  width="450"
  height="250"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAwupTiz9gVsP1FPO9WEnpwM9wV5DYJi0I&q=1861+Jan+Pieterszoon+Coenstraat" allowfullscreen>
</iframe> -->
   <?php
include './view/footer.php'; 
?>