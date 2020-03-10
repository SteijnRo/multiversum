<?php
include 'view/header.php';
$product = $content['result'];
?>
<div class="album py-5" id="main">
  <div class="container">
    <?php
    echo '
    <main class="details-container">
 
      <div class="left-column">
        <img class="details-img" src="./view/assets/media/' . $product[0]["pic"] . '" width="100%">
      </div>
      
      <div class="right-column">
        <div class="product-description">
          <h1>' . $product[0]["name"] . '</h1>
          <p>' . $product[0]["specification"] . '</p>
        </div>
        <div class="product-price">
          <span>148$</span>
          <a href="#" class="cart-btn">Add to cart</a>
        </div>
      </div>
    </main>
    ';
    ?>
  </div>
</div>

<?php include 'view/footer.php'; ?>