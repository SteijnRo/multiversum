<?php
// pagination
$productsPerPage = 10;
$page = 1;

if (isset($_GET["page"])) {
  if (!is_null($_GET["page"])) {
    $page = $_GET["page"];
  }
}

$startProducts = $page * $productsPerPage - 10;
$startProductsCount = $startProducts + 10;

include 'view/header.php';
$products = $content['result'];
?>
  <!-- <div class="row justify-content-center " id="banner">
    <div class="col-md-12 ">
      <img src="view/assets/media/banner2.png" class="img-fluid" alt="Responsive image">
    </div>
  </div> -->
  <div class="row justify-content-center " id="banner">
    <div class="col-md-12 ">
      <img src="view/assets/media/banner3.png" class="img-fluid" alt="Responsive image">
      <div class="col-md-4 offset-8">
     <h3>Multiversum, De VR brillen winkel</h3>
      <p>Vind alle Vr-brillen die wij in de winkel/webshop verkoepn.  Zoek hier specificaties op van de Vr-Brill en bestel hem hier of kom even langs bij de winkel!</p>
    </div>
    </div>
  </div>
<div class="album py-5" id="main">
    <div class="container">
      <?php
      echo '<div class="row">';
      for (; $startProducts < $startProductsCount; $startProducts++) {
        if (!isset($products[$startProducts])) {
          break;
        }
        echo '
        <div class="col-md-4">
          <div class="card w-75">
            <div class="card-img-outer">
              <div class="card-img">
                <a href="?op=details&id=' . $products[$startProducts]["id"] . '"><img class="card-img-top" id="product-img" src="./view/assets/media/' . $products[$startProducts]["pic"] . '" alt="pic" height="300px"></a>
              </div>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="?op=details&id=' . $products[$startProducts]["id"] . '">' . $products[$startProducts]["name"] . '</a>
              </h4>
              <h5>€' . $products[$startProducts]["price"] . '</h5>
              <p class="card-text">' . $products[$startProducts]["specification"] . '</p>
            </div>
          </div>
        </div>
        ';
        // rating
        // <div class="card-footer">
        //   <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        // </div>
      }
      echo '</div>';
      ?>
    </div>
  </div>
<?php include 'view/footer.php'; ?>