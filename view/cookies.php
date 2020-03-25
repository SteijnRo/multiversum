<?php
include 'view/header.php';
?>
    <ul class="list-inline mx-auto justify-content-center text-center" id="privacy-statement">
    <?php
        $cookies = $content['result'];
        echo $cookies[0]['content'];
        // var_dump($privacy);
    ?>
    </ul>

 <?php
include 'view/footer.php';
?>