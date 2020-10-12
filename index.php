<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    // phpinfo();
    
if(isset($_POST['submit-login'])){
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_pass = htmlspecialchars($_POST['user_password']);
    $sql = $db->query("SELECT * FROM users WHERE email = '$user_email'");
    if($row = $sql->fetch()){
            $db_id = $row['id'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
            $db_role = $row['role'];
        if(password_verify($user_pass,$db_pass)){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['role'] = $db_role;

            header('Location:index.php');
            
        }else{
            $message = "<div class ='alert alert-danger'> Mot de passe incorrect.</div>";
        }
    }else{
        $message = "<div class ='alert alert-danger'> Identifiant inconnu.</div>";
    }
}





?>





<section>
<h1>“Il y a plus de philosophie dans une bouteille de vin que dans un livre”

Louis Pasteur.</h1>

<div class="carousel">

<?php
    displayAllVin();
?>

</div>

</section>

<?php include('app/footer.php'); ?>

  