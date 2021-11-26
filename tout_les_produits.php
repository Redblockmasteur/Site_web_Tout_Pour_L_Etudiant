<!DOCTYPE html>
<html lang="fr">

<head>
    <? include 'essentials/head.php' ?>
    <title>Tout les articles</title>

</head>

<body>
    <!-- Navigation-->
    <? include 'essentials/navbar.php' ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tout pour L'étudiant</h1>
                <p class="lead fw-normal text-white-50 mb-0">Trouve un article au hasard</p>
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
        //SQL requests
        $sql = 'SELECT * FROM article order by titre_article';   
        $req = $pdo->query($sql);
    ?>
    <!-- Section article -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <? while($row = $req->fetch()) { ?>

                    <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <? echo '<img class="card-img-top" src="'.$row['article_photo'].'">'; ?>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><? echo $row['titre_article']; ?></h5>
                                <!-- Product price-->
                                <span><? echo $row['prix_article']; ?> €</span>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <? echo '<a class="btn btn-outline-dark mt-auto" href="produit.php?id='.$row['id_article'].'">Voir article</a><br/>'; ?></td>
                            </div>
                        </div>
                    </div>
                </div>

                </tr>
                <? }   
                    $req->closeCursor();   
                ?>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <? include 'essentials/footer.php' ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>