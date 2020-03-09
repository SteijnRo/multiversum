<nav class="navbar fixed-bottom" id="footer">
  <div class="container">
    <ul class="list-inline mx-auto justify-content-center">
      <?php
      $footer = $content[2];
      for ($i=0; $i <count($footer) ; $i++) { 
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\"  href=\"" . $footer[$i]['link'] . "\">". $footer[$i]['name']."</a>
        </li>";
      }

      ?>
      </ul>
  </div>
</nav>
</body>
</html>

