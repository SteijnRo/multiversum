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
        for ($i=0; $i < count($content); $i++) { 
          // d($content['result']);
          // print_r($content['result']);
          echo "
          <li class=\"list-group\">
            <a class=\"list-group-item list-group-item-action\"  href=\"" . $content['result'][$i]['link'] . "\">" . $content['result'][$i]['name'] . "</a>
          </li>";
        } 
      ?>
    </ul>
  </div>
</div>

<?php
include_once "view/footer.php";
?>