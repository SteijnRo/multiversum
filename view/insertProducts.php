<?php
include_once "view/header.php";

if ($content['result'] != "") {
  echo "<h1>Toegevoegd</h1>";
}
?>
<div class="album py-5" id="insertForm">
    <form action="?op=addProduct" method="POST" style="margin:50px;" enctype='multipart/form-data'>
    <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" placeholder="Product name">
        <br>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" name="brand" placeholder="Brand name">
        <br>
      </div>
      <div class="col-md-8">
        <input type="file" class="form-control" name="pic" placeholder="Picture">
        <br>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" name="specification" placeholder="Description">
        <br>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" name="price" placeholder="Prijs">
        <br>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" name="qty" placeholder="Aantal producten">
        <br>
      </div>
      <div class="col-md-8">
        <select class="custom-select" id="inputGroupSelect01" name="sale">
          <option selected>Korting?</option>
          <option value="true">Ja</option>
          <option value="false">Nee</option>
        </select>
      </div>
      <div class="col-md-8">
        <br>
        <input type="text" class="form-control" name="salePercent" placeholder="Percentage korting">
      </div>
      <div class="col-md-5">
      <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
      </div>
    </div>
    </div>
  </form>
</div>
<?php
include_once "view/footer.php";
?>