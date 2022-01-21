<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/verification.js"></script>

</head>
<body>
    <?php include("../../components/internaute/header.php")?>
    <div class="container mb-5">
        <h1 class = "text-center text-primary">
            BIENVENUE SUR PHARMA-CENTER
        </h1>
        <p class="text-center h6">
            Ce site a été créé dans le but de permettre aux personnes ayant urgemment besoin d'achater des medicaments de se les procurer beaucoup plus facilement. Vous pouvez aussi l'utiliser
            vous besoin d'achat d'autres produits pharmaceutiques tel que les produits cosmétiques ou produits alimentaires pour bébé.
        </p>

    </div>
    <section class="container-fluid mb-4">
        <main class="row">
            <?php 
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=tp_coo_inf3055', 'root', '');    
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
                $reponse = $bdd->prepare('SELECT * FROM pharmacie WHERE etat = ? AND ouvert = ?');
                $req = $reponse->execute(array('disponible',1));
                //$req = $reponse->fetchAll();
                //var_dump($req);
                while($req = $reponse->fetch()){
                    if(!empty($req)){

                    
                    $resultat = $bdd -> prepare('SELECT * FROM produit WHERE nomPharmacie = ?');
                    $resultat->execute(array($req['nom']));
                    while($ligne = $resultat -> fetch())
                // echo $ligne['photo'];
                {
                
                
            ?>           
            <section class="my-5">
            </section>
            <div class="col-12 col-md-6 col-lg-4">
                <section class="card">
                    <img src="../../public/employe/upload/<?php echo $ligne['photo'];?>" alt="Coding" class="card-img-top" style= "height: 280px">
                    <div class="card-body">
                        <h1 class="h5 card-title"> Nom du produit: <?php echo $ligne['nomp']?> </h1>
                        <h1 class="h6"> Prix du produit: <?php echo $ligne['prix']?> FCFA</h1>
                        <h1 class="h6"> Quantité en stock : <?php echo $ligne['quantite']?> </h1>
                        <h1 class="h6"> Nom de la pharmacie : <?php echo $ligne['nomPharmacie']?> </h1>
                        <h1 class="h6"> Localisation : <?php 
                        $nomPharmacie = $ligne['nomPharmacie'];
                        $localisation = $bdd -> prepare('SELECT localisation FROM pharmacie WHERE nom = ?');
                        $localisation->execute(array($nomPharmacie));
                        $localisation2 = $localisation->fetch();
                        print_r ($localisation2[0]); ?> </h1>
                     <a href="#" class="btn btn-primary"> lire la suite</a>
                    </div>
            </section>
            </div>
            <?php
                }
                }
            }
             //   $resultat->closeCursor();
            ?>
       
        </main><!--end main.container-fluid-->
    </section>
    <?php include ('../../components/internaute/footer.php');?>
</body>
</html>