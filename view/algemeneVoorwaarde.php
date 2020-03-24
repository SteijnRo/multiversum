<?php
include 'view/header.php';
?>
    <ul class="list-inline mx-auto justify-content-center" id="privacy-statement">
    <?php
        $algemeneVoorwaarden = $content['result'];
        echo $algemeneVoorwaarden[0]['content'] ;
        // var_dump($algemeneVoorwaarden);
    ?>
    </ul>

 <?php
include 'view/footer.php';
?>