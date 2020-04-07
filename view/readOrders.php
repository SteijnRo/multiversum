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
                <th>Datum <small><b>(YYYY/MM/DD)</b></small></th>
              </tr>
            ';
            for ($i = 0; $i < count($orders); $i++) {
              echo '
              <tr>
              ';
              for ($j = 0; $j < count($products[$i]); $j++) {
                echo '
                <td>' . $orders[$i]["id"] . '</td>
                <td>' . $products[$i][$j]["name"] . '</td>
                <td>' . $orders[$i]["paidPrice"] . '</td>
                <td>' . $orders[$i]["date"] . '</td>
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