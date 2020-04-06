<!DOCTYPE html>
<html lang="en">
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
<body>
<nav class="navbar navbar-expand-md  fixed-top navbar-custom" id="navbar">
  <div class="logoText">
    <img class="img-fluid" id="logo"  src="./view/assets/media/logo2.svg" .  alt=""><br>
    <!-- <small>Multiversum</small> -->
  </div>
  <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <?php
        for ($i=0; $i <count($content['header'])-3 ; $i++) { 
          if (isset($_SESSION["perms"]) && $_SESSION["perms"] == $content["header"][$i]["perms"] || $content["header"][$i]["perms"] == "everyone") {
            echo "
              <li class=\"nav-item\">
              <a class=\"nav-link\"  href=\"" . $content['header'][$i]['link'] . "\">" . $content['header'][$i]['name'] . "</a>
              </li>
            ";
          } elseif ($content["header"][$i]["perms"] == "everyone") {
            echo "
              <li class=\"nav-item\">
              <a class=\"nav-link\"  href=\"" . $content['header'][$i]['link'] . "\">" . $content['header'][$i]['name'] . "</a>
              </li>
            ";
          }
          
        }
        ?>
    </ul>
  </div>
</nav>

<!--  btn-outline-secondary -->