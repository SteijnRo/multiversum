<?php
include_once "view/header.php";
?>
<div class="album py-5" id="main">
  <div class="container">
    <div class="col-md-4">
      <div class="card w-75">
        <form action="?op=addProduct" method="post">
          Naam:<br>
          <input type="text" name="name"><br>
          Merk:<br>
          <input type="text" name="brand"><br>
          Plaatje bril:<br>
          <input type="file" name="pic"><br>
          Merk:<br>
          <input type="text" name="brand"><br>
          Beschrijving:<br>
          <input type="text" name="specification"><br>
          Prijs:<br>
          <input type="text" name="price"><br>
          Aantal in voorraad:<br>
          <input type="text" name="qty"><br>
          Product op uitverkoop:<br>
          <select name="sale">
            <option value="true">Ja</option>
            <option value="false">Nee</option>
          </select>
          Procent korting: (als van toepassing)<br>
          <input type="text" name="salePercent"><br>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include_once "view/footer.php";
?>