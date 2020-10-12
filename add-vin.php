<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 


if(isset($_POST['submit-signup'])){
        // déclaration des variables pour l'ajout de vin
    $nom = htmlspecialchars ($_POST['nom']);
    $cepage = htmlspecialchars ($_POST['cepage']);
    $annees = htmlspecialchars ($_POST['annees']);
    $photo= $_FILES['photo'];
    $pays = htmlspecialchars ($_POST['pays']);
    $region = htmlspecialchars ($_POST['region']);
    $user_id = htmlspecialchars ($_SESSION['id']);
    $description = htmlspecialchars ($_POST['description']);
    if($photo['size'] <= 1000000){
// vérification pour la photo, poid et format
        $valid_ext = array('jpg','jpeg','gif','png');
        $check_ext = strtolower(substr(strrchr($photo['name'], '.'),1));
        if(in_array($check_ext, $valid_ext)){
            // dossier d'upload de la photo et nom définitif de cette derniere
        $imgname = uniqid() . '_' . $photo['name'];
        $upload_dir = "./app/uploads/";
        $upload_name = $upload_dir . $imgname;
        $move_result = move_uploaded_file($photo['tmp_name'], $upload_name);
            if($move_result){ 
                // si la photo est uploadé alors ajoute les informations dans les table produit, local et description
                $sth = $db->prepare("INSERT INTO produit(nom,cepage) VALUES (:nom,:cepage)
                ");
                $sth->bindValue(':nom',$nom);
                $sth->bindValue(':cepage',$cepage);
                $sth->execute();
                $sth = $db->prepare("INSERT INTO local(pays,region) VALUES (:pays,:region)
                ");
                $sth->bindValue(':pays',$pays);
                $sth->bindValue(':region',$region);
                $sth->execute();
                $sth = $db->prepare("INSERT INTO description(annees,description,photo) VALUES (:annees,:description,:photo)
                ");
                $sth->bindValue(':annees',$annees);
                $sth->bindValue(':description',$description);
                $sth->bindValue(':photo',$imgname);
                $sth->execute();
                // redirection pour compléter la table ids qui regroupe les id des produit pour jointure de table
                header("Location:add-vin-post.php");
            }
        }
    }else{
        // message d'erreur pour l'upload de photo
        echo "vérifier le format ou le poid de votre photo";
    }
}
    ?>

<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Ajouter un vin</h1>
        <form action="add-vin.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nom-vin">Nom du vin</label>
                    <input type="text" class="form-control" name="nom" id="nom-vin" required>
                </div>
                <div class="form-group col-md-6">
                <label for="cepage">Cépage</label>
                <input type="text" class="form-control" name="cepage" id="cepage" required>
                </div>
                <div class="form-group col-md-6">
                <label for="annees">Année</label>
                <input type="text" class="form-control" name="annees" id="annees" required >
                </div>
                <div class="form-group col-md-6">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" name="pays" id="pays" required>
                </div>
                <div class="form-group col-md-6">
                <label for="region">Région</label>
                <input type="text" class="form-control" name="region" id="region" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="description" rows="3"  id="Description" required></textarea>
                </div>
            </div>
            
                <div class="form-group">
                    <label for="photo">Choisissez une photo</label>
                    <input type="file" name="photo" id="photo" accept=".png,.jpeg,.jpg,.gif">
                </div>
                
            </div>
            
            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="submit-signup" value="Ajouter la bouteille"/>
        </form>
        </div>
</section>


<?php include('app/footer.php'); ?>