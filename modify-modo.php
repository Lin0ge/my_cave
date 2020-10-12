<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 

    

$id = $_GET['id'];
$sql = $db->query("SELECT * FROM `users` WHERE id = $id LIMIT 1");
$row = $sql->fetch();

?>



<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Modifier un modérateur</h1>
        <form action="modify-modo-post.php" method="POST" >
            <div class="form-row">
                
                <div class="form-group col-md-6">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row ['lastname'];?>">
                </div>
                <div class="form-group col-md-6">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row ['firstname'];?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="mail">Email</label>
                    <input type="mail" class="form-control" name="email" id="mail" value="<?php echo $row ['email'];?>">
                </div>
               

            </div>
            
            <input type="hidden" name ="id" value="<?= $id; ?> "/>

            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="submit-modify-user" value="Modifier le modérateur"/>
        </form>
    </div>
</section>






<?php include('app/footer.php'); ?>