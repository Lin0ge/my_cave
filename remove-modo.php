<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    



$id = $_GET['id'];
       $sth = $db->prepare("DELETE FROM users WHERE id = $id");
       $sth->execute();
       header("Location:table-modo.php");
        ?>







<?php include('app/footer.php'); ?>