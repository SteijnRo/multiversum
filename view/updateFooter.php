<?php
include 'view/header.php';
if (isset($content["result"])) {
  $copyright = $content['result'];
}
?>
    <ul class="list-inline mx-auto justify-content-center" id="privacy-statement">
    <h3>
      <small>
        <a href="?op=adminPanel">Ga terug</a>
      </small>
    </h3>
        <div class="row">
        <form action="?op=updateFooter" onsubmit="succes()" method="post">
            <div class="col-md-12">
            <input type="hidden" name="id" value="1">
            <p><textarea name="value" class="form-control" rows="5" id="comment" name="text"><?php echo $content["footer"][0]["content"]; ?></textarea></p>
            </div>
            <div class="col-md-12 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Update copyright</button>
            </div>
          </form>
          <form action="?op=updateFooter" onsubmit="succes()" method="post">
            <div class="col-md-12">
            <input type="hidden" name="id" value="2">
            <p><textarea name="value" class="form-control" rows="5" id="comment" name="text"><?php echo $content["footer"][1]["content"]; ?></textarea></p>
            </div>
            <div class="col-md-12 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Update algemene voorwaarden</button>
            </div>
          </form>
          <form action="?op=updateFooter" onsubmit="succes()" method="post">
            <div class="col-md-12">
            <input type="hidden" name="id" value="3">
            <p><textarea name="value" class="form-control" rows="5" id="comment" name="text"><?php echo $content["footer"][2]["content"]; ?></textarea></p>
            </div>
            <div class="col-md-12 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Update privacy</button>
            </div>
          </form>
          <form action="?op=updateFooter" onsubmit="succes()" method="post">
            <div class="col-md-12">
            <input type="hidden" name="id" value="4">
            <p><textarea name="value" class="form-control" rows="5" id="comment" name="text"><?php echo $content["footer"][3]["content"]; ?></textarea></p>
            </div>
            <div class="col-md-12 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Update cookies</button>
            </div>
          </form>
        </div>

    </ul>
<script>
function succes() {
  alert("Footer succesvol geupdatet");
}
</script>
<?php
include 'view/footer.php';
?>