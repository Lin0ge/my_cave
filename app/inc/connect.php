<?php
    session_start();
    // if (empty($_SESSION) && $page =='annonce' || empty($_SESSION) && $page == 'single-annonce'){
    //     header('Location: index.php');
    //     // PAS DE SESSION DONC ON DOIT SE CONNECTER
    //     exit;
    // }
    if  (isset($_GET['logout'])){
        //  SESSION, PROPOSER BOUTON DELOG
        session_destroy();
        header ('Location:index.php');
    }
    
    $servername = 'localhost'; $dbname='mycave';$user='root'; $pass='';
    try{
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $ex){
        echo "Error : " . $ex->getMessage();
    }
?>