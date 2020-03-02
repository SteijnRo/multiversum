<nav class="navbar fixed-bottom" id="footer">
  <div class="container">
    <ul class="list-inline mx-auto justify-content-center">
      <?php
        // hoeft geen db te includen omdat dat al gebeurd in index.php
        $query = "SELECT * ";
        $query .= "FROM footer ";

        $preparedquery = $dbaselink->prepare($query);
        $preparedquery->execute();

        if ($preparedquery->errno) {
          Echo "Er is een fout opgetreden";
        } else {
          $result = $preparedquery->get_result();
          if ($result->num_rows === 0 ) {
            echo "Geen rijen gevonden";
          } else {
            while ($row = $result->fetch_assoc()) {
              echo "<li class=\"list-inline-item\">
              <a class=\"nav-link\"  href=\"$row[link]\">$row[name]</a>

              </li>";
            }
          }
        }
      ?>
      </ul>
  </div>
</nav>
</body>
</html>

