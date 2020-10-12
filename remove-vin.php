<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    ?>




<h1>remove vin</h1>


<?php
    suprArticle();

    header('Location:table-vin.php');
?>



<?php include('app/footer.php'); ?>
