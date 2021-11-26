<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    
    //On essaie de se connection
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
    
    $id = $_GET['id'];
    $sql = 'SELECT * FROM `article` WHERE `id_article`= "'.$id.'"';
    $req = $pdo->query($sql);
    

    /*J'usqu'ici ca marche*/
?>
<? while($row = $req->fetch()) { ?>
    <? $titre_article = $row['titre_article']; ?>
    <? $ref_article = $row['ref_article']; ?>
    <? $prix_article = $row['prix_article']; ?>
    <? $description_article = $row['description_article']?>
    <? $img_url = $row['article_photo'];?>    
<? }   
    $req->closeCursor();   
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <? include 'essentials/head.php' ?>
        <title> <? echo $titre_article ?> </title>
    </head>      
        
        

    <body>
        <!-- Navigation-->
        <? include 'essentials/navbar.php' ?>
        
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<? echo $img_url ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><? echo $ref_article ?></div>
                        <h1 class="display-5 fw-bolder"><? echo $titre_article ?></h1>
                        <div class="fs-5 mb-5">
                            <span><? echo $prix_article ?> €</span>
                        </div>
                        <p class="lead"><? echo $description_article ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
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
        $sql = 'SELECT * FROM article order by RAND() LIMIT 3';   
        $req = $pdo->query($sql); 
    ?>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Produits Similaires</h2>
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
