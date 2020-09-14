<?php

function displayAllUsers(){
        global $db;
        $sql = $db->query("SELECT * FROM users");
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
            ?>
            <div>
                <p class="coucou"><?= $row ['firstname'];?></p>
                <p><?= $row['lastname'];?></p>
                <p><?= $row['email'];?></p>
                <a href=""><img src="" alt="">la</a>
                <a href=""><img src="" alt="">ou la</a>
            </div>
        <?php
        }

    }

?>

<?php

function displayAllVin(){
        global $db;
        $sql = $db->query("SELECT * FROM vin");
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
            ?>
            <div>
                <p><?= $row ['nom'];?></p>
                <p><?= $row['cepage'];?></p>
                
                <a href=""><img src="" alt="">la</a>
                <a href=""><img src="" alt="">ou la</a>
            </div>
        <?php
        }

    }

?>

