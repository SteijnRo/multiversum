<?php
include 'view/header.php';
$product = $content['result'];
?>
<?php
// <input type="text" name="description" value="' . $product[0]["description"] . '">
echo '
  <div class="container  d-flex justify-content-center" id="ProductDetails">
    <div class="col-md-8 ">
      <h1>Pas hier het product aan</h1>
      <!-- Portfolio Item Heading -->
      <form action="?op=updateGoggle" method="post" onsubmit="succes()" enctype="multipart/form-data">
        <input type="hidden" name="id" value="' . $product[0]["id"] . '">
        <h1 class="my-4">Titel:<br><input type="text" name="name" value="' . $product[0]["name"] . '"><br>
          <small>Merk:<br><input type="text" name="brand" value="' . $product[0]["brand"] . '"></small>
        </h1>

        <!-- Portfolio Item Row -->
        <div class="row">

          <div class="col-md-8">
            <img class="img-fluid"  src="./view/assets/media/' . $product[0]["pic"] . '"750x500" alt="">
            <input type="file" class="form-control" name="pic" value="-" placeholder="Picture">
          </div>

          <div class="col-md-4">
            <h3 class="my-3">Product Description</h3>
            <p><textarea name="description" class="form-control" rows="5" id="comment" name="text">' . $product[0]["description"] . '</textarea></p>
            
          </div>
          <div class="row description">
            <div class="col-md-5">
              <p>Prijs (€):<br><input type="text" name="price" value="' . $product[0]["price"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Platform:<br><input type="text" name="platform" value="' . $product[0]["platform"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Resolutie:<br><input type="text" name="resolution" value="' . $product[0]["resolution"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Refresh rate:<br><input type="text" name="refreshRate" value="' . $product[0]["refreshRate"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Functies (VR-bril):<br><input type="text" name="functions" value="' . $product[0]["functions"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Aansluitingen VR-bril:<br><input type="text" name="physicalConnections" value="' . $product[0]["physicalConnections"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Gezichtsveld (°):<br><input type="text" name="fov" value="' . $product[0]["fov"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Accessoires:<br><input type="text" name="accesories" value="' . $product[0]["accesories"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Fabrieksgarantie:<br><input type="text" name="insurance" value="' . $product[0]["insurance"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Bijzonderheden:<br><input type="text" name="special" value="' . $product[0]["special"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Aantal:<br><input type="text" name="qty" value="' . $product[0]["qty"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Korting?:<br>
                <select class="custom-select" id="inputGroupSelect01" name="sale">
                  <option selected>Korting?</option>
                  <option value="true">Ja</option>
                  <option value="false">Nee</option>
                </select>
              </p>
            </div>
            <div class="col-md-5">
              <p>Percentage korting:<br><input type="text" name="salePercent" value="' . $product[0]["salePercent"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>Archief?:<br>
                <select class="custom-select" id="inputGroupSelect01" name="archive">
                  <option selected>Archief?</option>
                  <option value="true">Ja</option>
                  <option value="false">Nee</option>
                </select>
              </p>
            </div>
            <div class="col-md-5">
              <p>EAN:<br><input type="text" name="EAN" value="' . $product[0]["EAN"] . '"></p>
            </div>
            <div class="col-md-5">
              <p>SKU:<br><input type="text" name="SKU" value="' . $product[0]["SKU"] . '"></p>
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-5 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
';
?>

<script>
function succes() {
  alert("Product succesvol geupdatet!");
}
</script>
<?php include 'view/footer.php'; ?>