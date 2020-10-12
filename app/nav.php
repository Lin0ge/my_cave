<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<header>   <!--        MIT License        -->


<!-- HAMBURGER MENU -->
    <nav     role="navigation">

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
<!-- FIN HAMBURGER MENU -->

<!-- MODAL JU -->

<ul id="menudesktop">
            
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

                <div class="box">
                    <a href="#popup" class="button">Connexion</a>
                </div>

            <?php    
                }
            ?>

            </ul>

                
   

    <div id="popup" class="overlay">
        <div class="popup">
            
            <a href="#" class="cross">&times;</a>
            
            <div >
            <?php if (isset($message)){
                echo "<div class='col-12'> ".$message." </div>";
            } ?>
            <div >
                              
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
    </div>

<!-- FIN MODAL JU -->



    </nav>

</header>