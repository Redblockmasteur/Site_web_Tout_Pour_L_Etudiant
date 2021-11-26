<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Boutique Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Tout pour l'étudiant</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/Site_web_Tout_Pour_L_Etudiant/pagecontact.php">A propos</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="http://localhost/Site_web_Tout_Pour_L_Etudiant/pagecontact.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Boutique</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Tous les Produits</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Les plus populaires</a></li>
                                <li><a class="dropdown-item" href="#!">Nouveaux</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
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
            <td><a href="http://localhost/Site_web_Tout_Pour_L_Etudiant/contact.php" <button type="submit"> Cliquer ici </button> </a></td>
        </tr>
    </table>
   
    </section>





    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Tout pour l'étudiant 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>