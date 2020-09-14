<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    ?>

<section>

<h1>table modo</h1>

<?php
    displayAllUsers();
?>

</section>






<?php include('app/footer.php'); ?>