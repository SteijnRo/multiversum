<?php 
include 'view/header.php';
$orders = $content["result"]["orders"];
$products = $content["result"]["products"];
?>
<div class="album py-5" id="main">
  <div class="container">
    <?php
    echo '
    <div class="row">
      <div class="col-md-8">
        <div class="card w-75">
          <div class="card-body">
            <table class="orderOverviewTable">
              <tr>
                <th>Order #</th>
                <th>Verkocht product</th>
                <th>Totaal prijs inclusief BTW</th>
              </tr>
            ';
            for ($i = 0; $i < count($orders); $i++) {
              echo '
              <tr>
              ';
              for ($j = 0; $j < count($products[$i]); $j++) {
                echo '
                <th>' . $orders[$i]["id"] . '</th>
                <th>' . $products[$i][$j]["name"] . '</th>
                <th>' . $products[$i][$j]["price"] . '</th>
                ';
              }
              echo '
              </tr>
              ';
            }
    echo '
            </table>
          </div>
          <h3>
            <small>
              <a href="?op=adminPanel">Ga terug</a>
            </small>
          </h3>
        </div>
      </div>
    </div>
    ';
    ?>
  </div>
</div>
<?php include 'view/footer.php'; ?>