<?php
$img = "http://www.w3.org/2000/svg";
$description = "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.";
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
$products = $content[1];
?>
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
          <a href="#"><img class="card-img-top" src="./assets/media/' . $products[$startProducts]["pic"] . '" alt="pic"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">' . $products[$startProducts]["name"] . '</a>
            </h4>
            <h5>' . $products[$startProducts]["price"] . '</h5>
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