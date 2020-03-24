<?php
include 'view/header.php';
?>
<div class="container">
  <div class="row d-flex justify-content-center business-hours">
    <form action="?op=updateContact" method="post">
      <input type="hidden" name="formType" value="companyHours">
      <div class="col-sm-12">
      <h2 class="title">Openingstijden</h2>
      <ul class="list-unstyled opening-hours">
        <?php
        for ($i=0; $i < count($content['businesshours']); $i++) { 
          echo "
            <li>". $content['businesshours'][$i]['weekDay'] ." <span class=\"pull-right\"><input type='text' name='businesshours[$i][openH]' value='" . $content['businesshours'][$i]['openH'] . "'> - <input type='text' name='businesshours[$i][closeH]' value='" . $content['businesshours'][$i]['closeH'] . "'> </span></li>
          ";
        }
        ?>
      </ul>
      <input type="submit" value="Verander openingstijden">
    </form>
  </div>
    <div class="col-sm-3">
      <form action="?op=updateContact" method="post">
        <input type="hidden" name="formType" value="companyInfo">
      <h2 class="title">Bedrijfsgegevens</h2>
      Multiverse
      <ul class="list-unstyled opening-hours">
        <?php
        for ($i=0; $i < count($content['result']); $i++) { 
        echo "
          <li><span class=\"pull-right\">Straat: <input type=\"text\" name=\"street\" value=\"" . $content['result'][$i]['street'] . "\"><br>Stad: <input type=\"text\" name=\"city\" value=\"" . $content['result'][$i]['city'] . "\"><br>Postcode: <input type=\"text\" name=\"postcode\" value=\"" . $content['result'][$i]['postcode'] . "\"><br>Provincie: <input type=\"text\" name=\"state\" value=\"" . $content['result'][$i]['state'] . "\"></span></li>
          <li>KvK: <span class=\"pull-right\"><input type=\"text\" name=\"kvk\" value=\"" . $content['result'][$i]['kvk'] . "\"></span></li>
          <li>BTW-Nummer: <span class=\"pull-right\"><input type=\"text\" name=\"BTWNum\" value=\"" . $content['result'][$i]['BTWNum'] . "\"></span></li>
        ";
        }
        ?>
      </ul>
      <input type="submit" value="Verander bedrijfsgegevens">
    </form>
  </div>
</div>
<?php
include './view/footer.php'; 
?>