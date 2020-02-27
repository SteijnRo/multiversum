<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Multiverse</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <?php 
        require_once 'model/dbase/config.php';
        require_once 'model/dbase/dbopen.php';
        $query = "SELECT * ";
        $query .= "FROM header ";
        
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
              echo "<li class=\"nav-item\">
              <a class=\"nav-link\"  href=\"$row[link]\">$row[name]</a>

              </li>";
            }
          }
        }
          require_once 'model/dbase/dbclose.php';
          // <a class=\"nav-link\"  href=\"$row[contact]\">Contact</a>
        ?>
    </ul>
  </div>
</nav>
</body>
</html>

