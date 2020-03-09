<nav class="navbar fixed-bottom" id="footer">
  <div class="container">
    <ul class="list-inline mx-auto justify-content-center">
      <?php

      for ($i=0; $i <count($content[2]) ; $i++) { 
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\"  href=\"" . $content[2][$i]['link'] . "\">". $content[2][$i]['name']."</a>
        </li>";
      }

      ?>
      </ul>
  </div>
</nav>
</body>
</html>

