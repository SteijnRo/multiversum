<?php
include_once "view/header.php";

if ($content['result'] != "") {
  echo '
  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Product toegevoegd.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  ';
}
?>
<div class="container  d-flex justify-content-center" id="ProductDetails">
  <div class="col-md-8 ">
    <h3>
      <small>
        <a href="?op=adminPanel">Ga terug</a>
      </small>
    </h3>
    <h1>Voeg product toe</h1>
    <!-- Portfolio Item Heading -->
    <form action="?op=addProduct" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id">
      <h1 class="my-4">Titel:<br><input type="text" name="name"><br>
        <small>Merk:<br></small><input type="text" name="brand">
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <h3>Plaatje: <br></h3>
          <input type="file" class="form-control" name="pic" value="-" placeholder="Picture">
        </div>
        
        <div class="col-md-8">
          <h3 class="my-3">Product Description</h3>
          <p><textarea name="description" class="form-control" rows="5" id="comment" name="text"></textarea></p>
        </div>
        <div class="row description">
          <div class="col-md-5">
            <p>Prijs (€):<br><input type="text" name="price"></p>
          </div>
          <div class="col-md-5">
            <p>Platform:<br><input type="text" name="platform"></p>
          </div>
          <div class="col-md-5">
            <p>Resolutie:<br><input type="text" name="resolution"></p>
          </div>
          <div class="col-md-5">
            <p>Refresh rate:<br><input type="text" name="refreshRate"></p>
          </div>
          <div class="col-md-5">
            <p>Functies (VR-bril):<br><input type="text" name="functions"></p>
          </div>
          <div class="col-md-5">
            <p>Aansluitingen VR-bril:<br><input type="text" name="physicalConnections"></p>
          </div>
          <div class="col-md-5">
            <p>Gezichtsveld (°):<br><input type="text" name="fov"></p>
          </div>
          <div class="col-md-5">
            <p>Accessoires:<br><input type="text" name="accesories"></p>
          </div>
          <div class="col-md-5">
            <p>Fabrieksgarantie:<br><input type="text" name="insurance"></p>
          </div>
          <div class="col-md-5">
            <p>Bijzonderheden:<br><input type="text" name="special"></p>
          </div>
          <div class="col-md-5">
            <p>Aantal:<br><input type="text" name="qty"></p>
          </div>
          <div class="col-md-5">
            <p>Korting?:<br>
              <select class="custom-select" id="inputGroupSelect01" name="sale">
                <option selected>Korting?</option>
                <option value="true">Ja</option>
                <option value="false">Nee</option>
              </select>
            </p>
          </div>
          <div class="col-md-5">
            <p>Percentage korting:<br><input type="text" name="salePercent"></p>
          </div>
          <div class="col-md-5">
            <p>EAN:<br><input type="text" name="EAN"></p>
          </div>
          <div class="col-md-5">
            <p>SKU:<br><input type="text" name="SKU"></p>
          </div>
          <div class="col-md-5">
          </div>
          <div class="col-md-5 updateProduct">
            <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include_once "view/footer.php";
?>