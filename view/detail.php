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
          <p>' . $product[0]["specification"] . '</p>
          <p>Prijs €' . $product[0]["price"] . ',-</p>
          <i class="fas fa-shopping-cart"></i>
        </div>
      </div>
    </div>
  ';
  ?>


<?php include 'view/footer.php'; ?>