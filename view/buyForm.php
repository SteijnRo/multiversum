<?php
if (!isset($_GET["confirm"])) {
  echo '
    <form action="?op=buy&confirm=0" method="post">
      Volledige naam:<br>
      <input type="text" name="name" required><br>
      Straat en huisnummer:<br>
      <input type="text" name="adress" required><br>
      Stad:<br>
      <input type="text" name="city" required><br>
      Provincie:<br>
      <input type="text" name="state" required><br>
      Postcode:<br>
      <input type="text" name="postcode" required><br>
      Telefoonnummer:<br>
      <input type="number" name="telNum" required><br>
      E-mail:<br>
      <input type="text" name="email" required><br>
      Product:<br>
      ' . $_POST["productName"] . '<br>
      Prijs:<br>
      ' . $_POST["productPrice"] . '<br>
      <input type="hidden" name="productID" value="' . $_POST["productID"] . '">
      <input type="hidden" name="productName" value="' . $_POST["productName"] . '">
      <input type="hidden" name="productPrice" value="' . $_POST["productPrice"] . '">
      <br>
      <input type="submit" value="Doorgaan">
    </form>
  ';
} else {
  echo "<h1>Zijn alle onderstaande gegevens juist?</h1>";
  echo '
    Volledige naam: ' . $_POST["name"] . '<br>
    Straat en huisnummer: ' . $_POST["adress"] . '<br>
    Stad: ' . $_POST["city"] . '<br>
    Provincie: ' . $_POST["state"] . '<br>
    Postcode: ' . $_POST["postcode"] . '<br>
    Telefoonummer: ' . $_POST["telNum"] . '<br>
    E-mail: ' . $_POST["email"] . '<br>
    Product: ' . $_POST["productName"] . '<br>
    Prijs: ' . $_POST["productPrice"] . '<br>
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
      <input type="submit" value="Nee, pas gegevens aan">
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
      <input type="submit" value="Ja, verzenden naar dit adres">
    </form>
  ';
}

?>