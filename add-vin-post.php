<?php

    require('app/inc/connect.php');
 

// pour compléter la table ids avec les id dans autres table
$sth1 = $db->query("SELECT id FROM local ORDER BY id DESC LIMIT 0,1");
$sth1->setFetchMode(PDO::FETCH_ASSOC);
$sth2 = $db->query("SELECT id FROM description ORDER BY id DESC LIMIT 0,1");
$sth2->setFetchMode(PDO::FETCH_ASSOC);
$sth3 = $db->query("SELECT id FROM produit ORDER BY id DESC LIMIT 0,1");
$sth3->setFetchMode(PDO::FETCH_ASSOC);
$t = $sth3->fetch();
$t2 = $sth2->fetch();
$t3 = $sth1->fetch();
    // echo $t['id'];
$req = $db->prepare("INSERT INTO ids (`idproduit`, `iddescription`, `idlocal`) VALUES (:idproduit, :iddescription, :idlocal)");
$req->bindValue(':idproduit', $t['id']);
$req->bindValue(':iddescription', $t2['id']);
$req->bindValue(':idlocal', $t3['id']);
$req->execute();
header("Location:table-vin.php");


?>