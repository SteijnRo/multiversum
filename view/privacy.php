<?php
include 'view/header.php';
?>
    <ul class="list-inline mx-auto justify-content-center text-center" id="privacy-statement">
    <?php
        $privacy = $content['result'];
        echo $privacy[0]['content'];
        // var_dump($privacy);
    ?>
    </ul>

 <?php
include 'view/footer.php';
?>