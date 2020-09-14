          <!--    Made by Erik Terwan    -->
        <!--   24th of November 2015   -->
        <header>   <!--        MIT License        -->
        <nav role="navigation">
        <div id="menuToggle">
            <!--
            A fake / hidden checkbox is used as click reciever,
            so you can use the :checked selector on it.
            -->
            <input type="checkbox" />
            
            <!--
            Some spans to act as a hamburger.
            
            They are acting like a real hamburger,
            not that McDonalds stuff.
            -->
            <span></span>
            <span></span>
            <span></span>
            
            <!--
            Too bad the menu has to be inside of the button
            but hey, it's pure CSS magic.
            -->
            <ul id="menu">
            
            
           

       

        <?php



        if (!empty($_SESSION['email']) && $_SESSION['role'] == "2"){
        ?>
            <a href="index.php"><li>Menu</li></a>
            <a href="table-vin.php"><li>Gérer les bouteilles</li></a>

            <?php
                if (isset($_SESSION['email'])){
            ?>
                <a href="?logout"><li>Se déconnecter</li></a>
            <?php
            }
            ?>
            

        <?php
        }elseif (!empty($_SESSION['email']) && $_SESSION['role'] == "1")  {
        ?>

            
            <a href="index.php"><li>Menu</li></a>
            <a href="table-vin.php"><li>Gérer les bouteilles</li></a>
            <a href="table-modo.php"><li>Gérer les modérateurs</li></a>

            <?php
                if (isset($_SESSION['email'])){
            ?>
                <a href="?logout"><li>Se déconnecter</li></a>
            <?php
            }
            ?>

        <?php    
        }else{
        ?>

            <a href="#"><li>Connexion</li></a>

        <?php    
        }
        ?>

            </ul>
        </div>
        </nav>
        </header>