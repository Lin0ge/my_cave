<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    


if (isset($_POST['submit-signup'])){
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);
    $roles = "2";
    if($sql = $db->query("SELECT * FROM users WHERE email = '$mail'")){
        $compteur = $sql->rowCount();
        if($compteur != 0){
            $message = "<div class ='alert1'> Il y a déja un compte possédant cet e-mail </div>";
        }elseif(!empty($mail) && !empty($mail)){
            if($password1 == $password2){
                $password1 = password_hash($password1, PASSWORD_DEFAULT);
                $sth = $db->prepare("INSERT INTO users (lastname, firstname, email, password, role) VALUES (:lastname, :firstname, :mail, :password1, :roles)");
                $sth->bindValue(':lastname',$lastname);
                $sth->bindValue(':firstname',$firstname);
                $sth->bindValue(':mail',$mail);
                $sth->bindValue(':password1',$password1);
                $sth->bindValue(':roles',$roles);
                if($sth->execute()){
                    header("Location:table-modo.php");
                    $message = "<div class ='alert alert-success'> Votre compte a bien été crée </div>";
                }
            }else{
                $message = "<div class ='alert alert-danger'> Les mots de passes ne concordent pas </div>";
            }
        }else{
            $message = "<div class ='alert alert-danger'> Veuillez remplir les champs correspondants </div>";
        }
}else{
    $message = "<div class ='alert alert-danger'> Une erreur vient de se produire.</div>";
}
}

?>

<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Ajouter un modérateur</h1>
        <form action="add-modo.php" method="POST" >
            <div class="form-row">
                
                <div class="form-group col-md-6">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>
                <div class="form-group col-md-6">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required >
                </div>
                <div class="form-group col-md-12">
                    <label for="mail">Email</label>
                    <input type="mail" class="form-control" name="mail" id="mail" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="password1">Mot de passe</label> 
                    <input type="password" class="form-control" name="password1" id="password1" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="password2">Vérification mot de passe</label>
                    <input type="password" class="form-control" name="password2" id="password2" required>
                </div>

            </div>
            
           
            
                
            </div>
            
            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="submit-signup" value="Ajouter le modérateur"/>
        </form>
        </div>
</section>



<?php include('app/footer.php'); ?>