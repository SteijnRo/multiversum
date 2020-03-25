<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiverse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<?php
if (!isset($_GET["confirm"])) {
  echo '
  <section class="order-form my-4 mx-4" id="BuyForm">
    <div class="row justify-content-center">
        <form action="?op=buy&confirm=0" method="post">
          <div class="col-sm-12">
            <h1>Bestel Nu!</h1>
            <span>Vul hier uw gegevens in voor het bestellen!</span>
          </div>
          <div class="col-sm-12">
            <label class="order-form-label"><br>Volledige naam:</label>
          </div>
          <div class="col-sm-12">
            <input class="order-form-input" type="text" name="name" required><br>
          </div>
          <div class="col-sm-12">
            Straat en huisnummer:<br>
            <input class="order-form-input" type="text" name="adress" required><br>
          </div>
          <div class="col-sm-12">
            Stad:<br>
            <input class="order-form-input" type="text" name="city" required><br>
          </div>
          <div class="col-sm-12">
            Provincie:<br>
            <input class="order-form-input" type="text" name="state" required><br>
          </div>
          <div class="col-sm-12">
            Postcode:<br>
            <input class="order-form-input" type="text" name="postcode" required><br>
          </div>
          <div class="col-sm-12">
            Telefoonnummer:<br>
            <input class="order-form-input" type="number" name="telNum" required><br>
          </div>
          <div class="col-sm-12">
            E-mail:<br>
            <input class="order-form-input" type="text" name="email" required><br>
          </div>
          <div class="col-sm-12">
            Product Naam:<br>
            ' . $_POST["productName"] . '<br>
            Product Prijs:<br>
            ' . $_POST["productPrice"] . '<br>
            <input type="hidden" name="productID" value="' . $_POST["productID"] . '">
            <input type="hidden" name="productName" value="' . $_POST["productName"] . '">
            <input type="hidden" name="productPrice" value="' . $_POST["productPrice"] . '">
            <br>
          </div>
          <div class="form-group">
          <div class="col-md-1 offset-6 text-left">
            <button type="submit" class="btn btn-primary btn-lg">Next</button>
          </div>
        </div>
        </div>
      </form>
    </div>
</div>
</section>
  ';
} else {
  echo "<section class=\"order-form my-4 mx-4\" id=\"BuyForm\">
      <div class=\"row justify-content-center text-center\">
          <div class=\"col-sm-12\">
            <h1>Is alles goed ingevuld?</h1>
            <span>Check even of u alle gegevens correct hebt ingevuld</span>
          </div><br>
          </div>";
  echo '
  <div class="d-flex"> 
  <ul class="list-group confirm-order-input mx-auto justify-content-center">
    <li class="list-group-item list-group-item-dark  flex-column align-items-start"> Volledige naam: ' . $_POST["name"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Straat en huisnummer: ' . $_POST["adress"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Stad: ' . $_POST["city"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Provincie: ' . $_POST["state"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Postcode: ' . $_POST["postcode"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Telefoonummer: ' . $_POST["telNum"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> E-mail: ' . $_POST["email"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Product: ' . $_POST["productName"] . '<br></li>
    <li class="list-group-item list-group-item-dark"> Prijs: ' . $_POST["productPrice"] . '<br></li>
  <ul>
  </div>
  <div class="row d-flex"> 
  <div class="mx-auto justify-content-center confirm-form">
    <br>
    <form action="?op=buy" method="post">
      <input type="hidden" name="name" value="' . $_POST["name"] . '">
      <input type="hidden" name="adress" value="' . $_POST["adress"] . '">
      <input type="hidden" name="city" value="' . $_POST["city"] . '">
      <input type="hidden" name="state" value="' . $_POST["state"] . '">
      <input type="hidden" name="postcode" value="' . $_POST["postcode"] . '">
      <input type="hidden" name="telNum" value="' . $_POST["telNum"] . '">
      <input type="hidden" name="email value="' . $_POST["email"] . '"">
      <input type="hidden" name="productID" value="' . $_POST["productID"] . '">
      <input type="hidden" name="productName" value="' . $_POST["productName"] . '">
      <input type="hidden" name="productPrice" value="' . $_POST["productPrice"] . '">
      <button type="submit" class="btn btn-danger confirm-button">Nee, pas gegevens aan</button>
    </form>
    <form action="?op=placeOrder" method="post">
      <input type="hidden" name="name" value="' . $_POST["name"] . '">
      <input type="hidden" name="adress" value="' . $_POST["adress"] . '">
      <input type="hidden" name="city" value="' . $_POST["city"] . '">
      <input type="hidden" name="state" value="' . $_POST["state"] . '">
      <input type="hidden" name="postcode" value="' . $_POST["postcode"] . '">
      <input type="hidden" name="telNum" value="' . $_POST["telNum"] . '">
      <input type="hidden" name="email" value="' . $_POST["email"] . '"">
      <input type="hidden" name="productID" value="' . $_POST["productID"] . '">
      <button type="submit" class="btn btn-success confirm-button">Ja, verzenden naar dit adres</button>
    </form>
    </div>
    </section>';
}

?>