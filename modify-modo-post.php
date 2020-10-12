<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    

if(isset($_POST['submit-modify-user'])){
    $prenom = ($_POST['firstname']);
    $nom = ($_POST['lastname']);
    $email = ($_POST['email']);
    $id = ($_POST['id']);
                $sth = $db->prepare("UPDATE users SET lastname=:nom,firstname=:prenom,email=:email WHERE id=$id");
                $sth->bindValue(':prenom',$prenom);
                $sth->bindValue(':nom',$nom);
                $sth->bindValue(':email',$email);
                $sth->execute();
                header("Location:table-modo.php");
}

?>







<?php include('app/footer.php'); ?>