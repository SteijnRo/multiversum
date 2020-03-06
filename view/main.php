<?php
$img = "http://www.w3.org/2000/svg";
$description = "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."; 
// pagination
// $productsPerPage = 10;
// $page = "";
// $startProducts = "";

// if (isset($_GET["page"])) {
//   if (!is_null($_GET["page"])) {
//     $page = $_GET["page"];
//   }
// }

// $startProducts = $page * $productsPerPage - 10;

// uitgecomment omdat database nog niet bestaat
// $qry = "SELECT id, name, brand, desc, pic, price, qty, sale, salePercent ";
// $qry .= "FROM products ";

// $result = queryContent($qry);

// while ($row = $result->fetch_assoc()) {
//   $products[] = array($row["id"], $row["name"], $row["brand"], $row["desc"], $row["pic"], $row["price"], $row["qty"], $row["sale"], $row["salePercent"]);
// }
include('view/header.php');
?>
<div class="album py-5" id="main">
    <div class="container">
      <?php
      echo '<div class="row">';
      for ($k = 0; $k < 10; $k++) {
        echo '
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns=' . $img . 'preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">' . $description . '</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      ';
      }
      echo '</div>';
      ?>
    </div>
  </div>