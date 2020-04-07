<?php
include_once "view/header.php";
function d($a)
{
  echo highlight_string("<?php\n\$data =\n" . var_export($a, true) . ";\n?>");
}
?>
<!-- echo "fuck u admin page, feel free to kys"; -->
<br><br><br>
<div class="container">
  <div class="row d-flex justify-content-center">
    <ul class="list-group list-group-horizontal admin-pannel">
      <?php
      for ($i = 0; $i < count($content['header']); $i++) {
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
$productsPerPage = 999999999;
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
<div class="album py-5 adminPanelBox" id="main">
  <div class="container">
    <?php
    echo '<div class="row">';
    for (; $startProducts < $startProductsCount; $startProducts++) {
      if (!isset($products[$startProducts])) {
        break;
      }
      echo '
      <div class="col-md-2">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class=" adminCardTitle">'. $products[$startProducts]["name"] . '</h6>
          <div class="media text-muted pt-3 deleteCardTitle">
            <img class="bd-placeholder-img mr-2 rounded" width="64" height="50" src="./view/assets/media/' . $products[$startProducts]["pic"] . '" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" ><title>Placeholder</title><rect width="100%" height="100%" ></rect></img>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark"></strong>
              </div>
              <a href="?op=updateGoggleForm&id=' . $products[$startProducts]["id"] . '">Pas Product Aan </a>
              <button type="button" class="btn btn-danger btn-sm deleteProductAdminPanelButton" data-toggle="modal" data-target="#deleteProduct-' . $products[$startProducts]["id"] . '">
                Product verwijderen                
              </button>
              
            </div>
          </div>
        </div>
        </div>
        <div class="modal fade deleteProductModal" id="deleteProduct-' . $products[$startProducts]["id"] . '" tabindex="-1" role="dialog" aria-labelledby="deleteProductTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Product verwijderen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Weet je zeker dat je het product wil verwijderen?<br>
              Dit kan niet ontdaan worden.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Product niet verwijderen</button>
              <form action="?op=deleteProduct" method="post">
                <input type="hidden" name="id" value="' . $products[$startProducts]["id"] . '">
                <input type="submit" class="btn btn-danger" value="Verwijder product">
              </form>
            </div>
          </div>
        </div>
      </div>
        ';
      // rating
    }
    ?>
  </div>
</div>
<?php
include_once "view/footer.php";
//v2
// <div class="col-md-2">
// <ul class="list-group AdminProductsList">
//   <li class="list-group-item flex-column align-items-start AdminProductsList">' . $products['result'][$startProducts]["name"] . '
//    <br><a href="?op=updateGoggleForm&id=' . $products['result'][$startProducts]["id"] . '">Pas Product Aan </a>
//     <form action="?op=deleteProduct" method="post">
//       <input type="hidden" name="id" value="' . $products['result'][$startProducts]["id"] . '">
//       <input class="btn btn-danger" type="submit" value="Verwijder product">
//     </form>
//   </li>
// </ul>
// </div>
// v1
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