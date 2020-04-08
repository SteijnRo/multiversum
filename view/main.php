<?php
// pagination
$productsPerPage = 9;
$page = 1;

if (isset($_GET["page"])) {
  if (!is_null($_GET["page"])) {
    $page = $_GET["page"];
  }
}

$startProducts = $page * $productsPerPage - $productsPerPage;
$startProductsCount = $startProducts + $productsPerPage;

include 'view/header.php';
$products = $content['result'];
?>
<div class="row justify-content-center" id="banner">
  <div class="container col-md-12" >
    <div class="img-fluid" id="header-img"></div>
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
        if ($products[$startProducts]["archive"] == 0) {
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
                <p class="card-text">' . $products[$startProducts]["description"] . '</p>
              </div>
              <div class="card-footer">
                <form action="?op=buy" method="post">
                  <input type="hidden" name="productPrice" value="' . $products[$startProducts]["price"] . '">
                  <input type="hidden" name="productName" value="' . $products[$startProducts]["name"] . '">
                  <input type="hidden" name="productID" value="' . $products[$startProducts]["id"] . '">
                  <input type="submit" value="Koop nu">
                </form>
              </div>
            </div>
          </div>
          ';
        } else {
          $startProductsCount++;
        }
        // rating
      }
      echo '</div>';
      $buttonAmount = count($products)/$productsPerPage;
      $buttonAmount = round($buttonAmount,0,PHP_ROUND_HALF_UP);
      echo '<div class="col-md-12 center-block text-center paginationDiv">';
      for ($i = 0; $i < $buttonAmount; $i++) {
        $iPlusOne = $i + 1;
        echo "<a href=\"?page=$iPlusOne\" class=\"btn btn-secondary btn-lg\">$iPlusOne</a>\t";
      }
      echo '</div>';
      ?>
    </div>
  </div>
<?php include 'view/footer.php'; ?>