<?php
include 'view/header.php';
?>
<form class="form-signin"  action="?op=loginSubmit" method="post">
    <div class="form-label-group">
        <label for="inputEmail">Username</label>
        <input type="username" name="username"  class="form-control" placeholder="Email address"  autofocus="" autocomplete="off">
    </div>
    <div class="form-label-group">
        <label for="inputPassword">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="" autocomplete="off">
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted text-center">Multiversum</p>
</form>
<?php 
include 'view/footer.php'; 
?>