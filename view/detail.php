<?php
include 'view/header.php';
$product = $content['result'];
?>
<?php
echo '
  <div class="container  d-flex justify-content-center" id="ProductDetails">
    <div class="col-md-8 ">
      <!-- Portfolio Item Heading -->
      <h1 class="my-4">' . $product[0]["name"] . '
        <small>'. $product[0]["brand"] . '</small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid"  src="./view/assets/media/' . $product[0]["pic"] . '"750x500" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Product Description</h3>
          <p>' . $product[0]["description"] . '</p>
        </div>
        <div class="row description">
          <div class="col-md-5">
            <p>Prijs:<br> €' . $product[0]["price"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Platform:<br> ' . $product[0]["platform"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Resolutie:<br> ' . $product[0]["resolution"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Refresh rate:<br> ' . $product[0]["refreshRate"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Functies (VR-bril):<br> ' . $product[0]["functions"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Aansluitingen VR-bril:<br> ' . $product[0]["physicalConnections"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Gezichtsveld:<br> ' . $product[0]["fov"] . '°</p>
          </div>
          <div class="col-md-5">
            <p>Accessoires:<br> ' . $product[0]["accesories"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Fabrieksgarantie:<br> ' . $product[0]["insurance"] . '</p>
          </div>
          <div class="col-md-5">
            <p>Bijzonderheden:<br> ' . $product[0]["special"] . '</p>
          </div>
          <div class="col-md-5">
            <p>EAN:<br> ' . $product[0]["EAN"] . '</p>
          </div>
          <div class="col-md-5">
            <p>SKU:<br> ' . $product[0]["SKU"] . '</p>
          </div>
        </div>
      </div>
    </div>
  </div>
';
?>


<?php include 'view/footer.php'; ?>