<?php
include_once "view/header.php";
?>

<?php
if ($content[1] != "") {
  echo "<h1>Toegevoegd</h1>";
}
?>

<div class="album py-5" id="main">
<form action="?op=addProduct" method="POST" style="margin:50px;" enctype='multipart/form-data'>
  <div class="row align-self-center">
    <div class="col-md-4">
      <input type="text" class="form-control" name="name" placeholder="Bril naam">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="brand" placeholder="Brand name">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="specification" placeholder="Beschrijving">
    </div>
    <div class="col-md-4">
      <input type="file" class="form-control" name="pic" placeholder="Picture">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="price" placeholder="Prijs">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="qty" placeholder="Aantal producten">
    </div>
    <div class="col-md-4">
      <select class="custom-select" id="inputGroupSelect01" name="sale">
        <option selected>Korting?</option>
        <option value="true">Ja</option>
        <option value="false">Nee</option>
      </select>
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="salePercent" placeholder="Kortingpercentage">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
</form>
</div>
<?php
include_once "view/footer.php";
?>