<?php
include 'view/header.php';
?>
    <ul class="list-inline mx-auto justify-content-center" id="privacy-statement">
    <?php
        $copyright = $content['result'];
        echo $copyright[0]['content'];
        // var_dump($privacy);
    ?>
    </ul>

 <?php
include 'view/footer.php';
?>