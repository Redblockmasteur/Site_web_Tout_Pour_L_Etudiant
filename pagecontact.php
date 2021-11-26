<!DOCTYPE html>
<html lang="fr">

<head>
    <? include'essentials/head.php' ?>
    <title>Contact</title>

</head>

<body>
    <!-- Navigation-->
    <? include'essentials/navbar.php' ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tout pour L'étudiant</h1>
                <p class="lead fw-normal text-white-50 mb-0">Trouve ce dont tu as besoin</p>
            </div>
        </div>
    </header>
    

    <?php
			//connection a la bdd
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On essaie de se connecter
            try{
                $pdo = new PDO("mysql:host=$servername;dbname=site_tpe", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
                *les informations relatives à celle-ci*/
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            /*requête SQL*/
            $sql = 'SELECT * FROM article';   
            $req = $pdo->query($sql); 
        ?>



    <!-- Section article -->
    <section class="py-5">
    <h1> Pour nous contacter, Vous pouvez par: </h1>
    <!--tableau qui comporte toutes les informtations pour contacter le personelle de la page-->
    <table>
        <tr>
            <td>Numero de telephone:</td>
            <td>06 11 22 33 44</td>
        </tr>
        <tr>
            <td>Adresse :</td>
            <td>toutpourletudiant@junia.fr</td>
        </tr>
        <tr>
            <td>Fixe:</td>
            <td>03 28 66 77 88</td>
        </tr>
        <tr>
            <td>Adresse:</td>
            <td>5966 Boulevard Vauban 59000 Lille</td>
        </tr>
        <tr>
            <td>Pour nous contacter directement: </td>
            <td>
                <a class="btn btn-outline-dark" href="contact.php">
                    Nous contacter
                </a>
            </td>

        </tr>
    </table>
   
    </section>





    <!-- Footer-->
    <? include'essentials/footer.php' ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>