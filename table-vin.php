<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    ?>



<section>

<h1>table vin</h1>

<?php
    displayAllVin();
?>

</section>






<?php include('app/footer.php'); ?>