<?php
include 'view/header.php';
?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#orderConfirmModal').modal('show');
    });
</script>

<div class="modal" tabindex="-1" role="dialog" id="orderConfirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Uw bestelling is bevestigd</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
include 'view/footer.php';
?>