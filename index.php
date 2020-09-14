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
    <div >
        <div >
            <?php if (isset($message)){
                echo "<div class='col-12'> ".$message." </div>";
            } ?>
            <div >
                <h1>Se connecter</h1>
                
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div >
                        <label for="exampleInputEmail1">Adresse e-mail</label>
                        <input type="text" name="user_email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail...">
                    </div>
                    <div>
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="user_password"  id="exampleInputPassword1" placeholder="Entrez votre mot de passe...">
                    </div>
                    <button type="submit" name="submit-login" >Connexion</button>
                </form>
            </div>
            <div>
            
        </div>
    </div>
</section>


<?php include('app/footer.php'); ?>

  