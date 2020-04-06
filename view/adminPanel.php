<?php
include_once "view/header.php";
function d($a)
{
    echo highlight_string("<?php\n\$data =\n" . var_export($a, true) . ";\n?>");
}
?>
<!-- echo "fuck u admin page, feel free to kys"; -->
<br><br><br>
<div class="container">
  <div class="row d-flex justify-content-center">
    <ul class="list-group list-group-horizontal admin-pannel">
      <?php
        for ($i=0; $i <count($content['header']) ; $i++) { 
          if (isset($_SESSION["perms"]) && $_SESSION["perms"] == $content["header"][$i]["perms"]) {
            if ($content['header'][$i]['link'] != "?op=logout") {
              if ($content['header'][$i]['link'] != "?op=adminPanel") {
                echo "
                  <li class=\"list-group\">
                    <a class=\"list-group-item list-group-item-action\"  href=\"" . $content['header'][$i]['link'] . "\">" . $content['header'][$i]['name'] . "</a>
                  </li>
                ";
              }
            }
          }
        }
      ?>
    </ul>
  </div>
</div>

<?php
include_once "view/footer.php";
?>