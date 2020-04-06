<?php
include_once "view/header.php";
function d($a){
  echo highlight_string("<?php\n\$data =\n" . var_export($a, true) . ";\n?>");
}
?>
<!-- echo "fuck u admin page, feel free to kys"; -->
<br><br><br>
<div class="container">
  <div class="row d-flex justify-content-center">
    <ul class="list-group list-group-horizontal admin-pannel">
      <?php
      for ($i = 2; $i < count($content['result']); $i++) {
        // d($content['result']);
        // print_r($content['result']);
        echo "
          <li class=\"list-group\">
          <a class=\"list-group-item list-group-item-action\"  href=\"" . $content['result'][$i]['link'] . "\">" . $content['result'][$i]['name'] . "</a>
          </li>
        ";
      }
      ?>
    </ul>
  </div>
</div>

<?php
$productsPerPage =9;
$page = 1;

if (isset($_GET["page"])) {
  if (!is_null($_GET["page"])) {
    $page = $_GET["page"];
  }
}

$startProducts = $page * $productsPerPage - $productsPerPage;
$startProductsCount = $startProducts + $productsPerPage;
$products = $content['products'];
// print_r($products['result']);
// print_r($products);
?>
<div class="album py-5" id="main">
    <div class="container">
      <?php
      echo '<div class="row">';
      for (; $startProducts < $startProductsCount; $startProducts++) {
        if (!isset($products['result'][$startProducts])) {
          break;
        }
        echo '
        <div class="col-md-4">
          <div class="card w-75">
            <div class="card-img-outer">
              <div class="card-img">
                <a href="?op=details&id=' . $products['result'][$startProducts]["id"] . '"><img class="card-img-top" id="product-img" src="./view/assets/media/' . $products['result'][$startProducts]["pic"] . '" alt="pic" height="300px"></a>
              </div>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="?op=details&id=' . $products['result'][$startProducts]["id"] . '">' . $products['result'][$startProducts]["name"] . '</a>
              </h4>
              <h5>€' . $products['result'][$startProducts]["price"] . '</h5>
              <p class="card-text">' . $products['result'][$startProducts]["description"] . '</p>
            </div>
            <div class="card-footer">
              <a href="?op=updateGoggleForm&id=' . $products['result'][$startProducts]["id"] . '">Pas Product Aan </a>
              <form action="?op=deleteProduct" method="post">
                <input type="hidden" name="id" value="' . $products['result'][$startProducts]["id"] . '">
                <input type="submit" value="Verwijder product">
              </form>
            </div>
          </div>
        </div>
        ';
        // rating
      }
      echo '</div>';
      $buttonAmount = count($products)/$productsPerPage;
      $buttonAmount = round($buttonAmount,0,PHP_ROUND_HALF_UP);
      echo '<div class="col-md-12 center-block text-center paginationDiv">';
      for ($i = 0; $i < $buttonAmount; $i++) {
        $iPlusOne = $i + 1;
        echo "<a href=\"?page=$iPlusOne\" class=\"btn btn-primary btn-lg\">$iPlusOne</a>\t";
      }
      echo '</div>';
      ?>
    </div>
  </div>
<?php
include_once "view/footer.php";
?>