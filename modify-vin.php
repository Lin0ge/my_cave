<?php

    require('app/inc/connect.php');
    require('app/head.php');
    require('app/inc/functions.php');
    include('app/nav.php'); 



$sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");
   $idids = ($_GET['id']);
   $idproduit = ($_GET['produitid']);
   $iddescription = ($_GET['descriptionid']);
   $idlocal = ($_GET['localid']);
   $sql2 = $db->query("SELECT * FROM `description` WHERE id = $iddescription");
   $rowdes = $sql2->fetch();
   $sql3 = $db->query("SELECT * FROM `local` WHERE id = $idlocal");
   $rowloc = $sql3->fetch();
   $sql4 = $db->query("SELECT * FROM `produit` WHERE id = $idproduit");
   $rowprod = $sql4->fetch();
?>

<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Modifier un vin</h1>
        <form action="modify-vin-post.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nom-vin">Nom du vin</label>
                    <input type="text" class="form-control" name="modifynom" id="nom-vin" value="<?php echo $rowprod ['nom'];?>" >
                </div>
                <div class="form-group col-md-6">
                <label for="cepage">Cépage</label>
                <input type="text" class="form-control" name="modifycepage" id="cepage" value="<?php echo $rowprod ['cepage'];?>" >
                </div>
                <div class="form-group col-md-6">
                <label for="annees">Année</label>
                <input type="text" class="form-control" name="modifyannees" id="annees" value="<?php echo $rowdes ['annees'];?>">
                </div>
                <div class="form-group col-md-6">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" name="modifypays" id="pays"value="<?php echo $rowloc ['pays'];?>" >
                </div>
                <div class="form-group col-md-6">
                <label for="region">Région</label>
                <input type="text" class="form-control" name="modifyregion" id="region"value="<?php echo $rowloc ['region'];?>" >
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="modifydescription" rows="3"  id="Description" ><?php echo $rowdes ['description'];?></textarea>
                </div>
            </div>
            
                <div class="form-group">
                    <label for="photo">Choisissez une photo</label>
                    <input type="file" name="modifyphoto" id="photo" accept=".png,.jpeg,.jpg,.gif">
                </div>
                
            </div>
            
            <input type="hidden" name ="idids" value="<?= $idids; ?> "/>
            <input type="hidden" name ="idproduit" value="<?=  $idproduit ; ?> "/>
            <input type="hidden" name ="localid" value="<?= $iddescription; ?> "/>
            <input type="hidden" name ="iddescription" value="<?= $idlocal;?> ">

            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="btnmodify" value="Modifier les informations"/>
        </form>
        </div>
</section>








<?php include('app/footer.php'); ?>