<?php

function displayAllUsers(){
        global $db;
        $sql = $db->query("SELECT * FROM users");
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
            ?>
            <div>
                <p><?= $row ['firstname'];?></p>
                <p><?= $row['lastname'];?></p>
                <p><?= $row['email'];?></p>
                <a href="modify-modo.php?id=<?php echo $row['id'];?>"><img src="" alt="">Modifier</a>
                <a href="remove-modo.php?id=<?php echo $row['id'];?>"><img src="" alt="">Supprimer</a>
            </div>
        <?php
        }

    }

?>

<?php

function displayAllVin(){
    global $db;
  
    $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $sql->fetch()){
        ?>
        <div class="">
            <div class="">
                <p>Nom du vin : <?php echo $row['nom'];?></p>
                <p>cépage : <?php echo $row['cepage'];?></p>
                <p>pays : <?php echo $row['pays'];?></p>
                <img src="app/uploads/<?php echo $row['photo'];?>" alt="">
                <a href="pagevin.php?id=<?php echo $row['ids_id'];?>">Voir le produit</a>
            </div>
        </div>
    <?php
    }
}

?>


<?php
function displayOneVin(){
        global $db;
        $ids = $_GET['id'];

        
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id WHERE ids.id = $ids
        ");

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="">
                <div class="">
                    <p>Nom du vin : <?php echo $row['nom'];?></p>
                    <p>année : <?php echo $row['annees'];?></p>
                    <p>cépage : <?php echo $row['cepage'];?></p>
                    <p>pays : <?php echo $row['pays'];?></p>
                    <p>région : <?php echo $row['region'];?></p>
                    <p>description : <?php echo $row['description'];?></p>
                    <img src="app/uploads/<?php echo $row['photo'];?>" alt="">
                </div>
            </div>
        <?php
        }
    }

?>

<?php

function tableauvin(){
    global $db;

    $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");

    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $sql->fetch()){
        ?>
        <div class="">
            <div class="">
                <p>Nom du vin : <?php echo$row['nom'];?></p>
                <p>année : <?php echo $row['annees'];?></p>
                <p>pays : <?php echo $row['pays'];?></p>
               <a href="modify-vin.php?id=<?php echo $row['ids_id'] . "&produitid=" . $row['produit_id'] . "&descriptionid=" . $row['description_id'] . "&localid=" . $row['local_id'] ?>"> <i class="fab fa-accessible-icon"></i></a>
               <a href="remove-vin.php?id=<?php echo $row['ids_id'] . "&produitid=" . $row['produit_id'] . "&descriptionid=" . $row['description_id'] . "&localid=" . $row['local_id'] ?>"><i class="fab fa-acquisitions-incorporated"></i></a>
            </div>
        </div>
    <?php
    }
}
?>


<?php
function suprArticle(){
    global $db;
    $id = $_GET['id'];
    $idproduit = $_GET['produitid'];
    $iddescription = $_GET['descriptionid'];
    $idlocal = $_GET['localid'];

    $sth = $db->prepare("DELETE FROM produit WHERE id = :idproduit; 
        DELETE FROM local WHERE id = :idlocal;
        DELETE FROM description WHERE id = :descriptionid;
        DELETE FROM ids WHERE id = :idsid");
    
    $sth->bindValue(':idproduit',$idproduit,PDO::PARAM_INT);
    $sth->bindValue(':idlocal',$idlocal,PDO::PARAM_INT);
    $sth->bindValue(':descriptionid',$iddescription,PDO::PARAM_INT);
    $sth->bindValue(':idsid',$id,PDO::PARAM_INT);
    $sth->execute();


}

?>

