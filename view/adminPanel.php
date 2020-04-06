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
        for ($i=0; $i <count($content['header']) ; $i++) { 
          if (isset($_SESSION["perms"]) && $_SESSION["perms"] == $content["header"][$i]["perms"]) {
            if ($content['header'][$i]['link'] != "?op=logout") {
              if ($content['header'][$i]['link'] != "?op=adminPanel") {
                echo "
                  <li class=\"list-group\">
                    <a class=\"list-group-item list-group-item-action\"  href=\"" . $content['header'][$i]['link'] . "\">" . $content['header'][$i]['name'] . "</a>
                  </li>
                ";
              }
            }
          }
        }
      ?>
    </ul>
  </div>
</div>

<?php
$productsPerPage =25;
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
        <div class="col-md-12">
        <ul class="list-group AdminProductsList">
          <li class="list-group-item AdminProductsList">' . $products['result'][$startProducts]["name"] . '</li>
          <a href="?op=updateGoggleForm&id=' . $products['result'][$startProducts]["id"] . '">Pas Product Aan </a>
          <form action="?op=deleteProduct" method="post">
            <input type="hidden" name="id" value="' . $products['result'][$startProducts]["id"] . '">
            <input type="submit" value="Verwijder product">
          </form>
        </ul>
        </div>
        
        ';
        // rating
      }
      ?>
    </div>
  </div>
<?php
include_once "view/footer.php";
// <div class="col-md-3">
//           <div class="card w-75">
//             <div class="card-body">
//               <h4 class="card-title">
//                 <a href="?op=details&id=' . $products['result'][$startProducts]["id"] . '">' . $products['result'][$startProducts]["name"] . '</a>
//               </h4>
//             </div>
//             <div class="card-footer">
//               <a href="?op=updateGoggleForm&id=' . $products['result'][$startProducts]["id"] . '">Pas Product Aan </a>
//               <form action="?op=deleteProduct" method="post">
//                 <input type="hidden" name="id" value="' . $products['result'][$startProducts]["id"] . '">
//                 <input type="submit" value="Verwijder product">
//               </form>
//             </div>
//           </div>
//         </div>
?>