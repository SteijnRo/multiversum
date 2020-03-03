<nav class="navbar fixed-bottom" id="footer">
  <div class="container">
    <ul class="list-inline mx-auto justify-content-center">
      <?php
      $q = "SELECT * FROM footer";
      $result = queryContent($q);

      while ($row = $result->fetch_assoc()) {
        echo "<li class=\"list-inline-item\">
        <a class=\"nav-link\"  href=\"$row[link]\">$row[name]</a>

        </li>";
      }

      ?>  
      </ul>
  </div>
</nav>
</body>
</html>

