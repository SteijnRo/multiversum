<?php
include 'view/header.php';
$copyright = $content['result'];
?>
    <ul class="list-inline mx-auto justify-content-center" id="privacy-statement">
    
        <div class="row">
          <form action="?op=updateCopyright" method="post">
            <div class="col-md-5">
            <input type="text" name="copyright" value="<?php echo $content["result"][0]["content"]; ?>" placeholder="<?php echo $content["result"][0]["content"]; ?>">
            </div>
            <div class="col-md-5 updateProduct">
              <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
            </div>
          </form>
        </div>

    </ul>

 <?php
include 'view/footer.php';
?>