<?php
include 'view/header.php';
?>
<br><br><br><br><br>
<form action="?op=loginSubmit" method="post">
    Gebruikersnaam:<br>
    <input type="text" name="username"><br>
    Wachtwoord:<br>
    <input type="password" name="password"><br>
    <br>
    <br>
    <input type="submit" value="Inloggen">
</form>
<?php 
include 'view/footer.php'; 
?>