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
    <header class="row navbar navbar-expand-md bg-dark navbar-dark my-3 container-fluid" >
        <!--L'entête la page web-->
        
        <div class="col-9 collapse navbar-collapse navbar-expand-md">
            <nav>
                <!--barre de navigation-->
                <ul class="navbar-nav  nav-pills">
                    <a href="#" class="navbar-brand">
                        <img src="images/logo-pharmacie.jpg" alt="Logo pharmacie" style = " width: 100px" />
                    </a>
                    <li class="nav-item "><a class="align nav-link"  href="Accueil.php">Accueil</a></li>
                    <li class="nav-item active"><a class="align nav-link" href="Medicament.php">Medicaments</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Cosmetique.php"> Cosmétiques</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Alimentaire.php">Alimentaires</a></li>
                </ul>
            </nav>
            <form action="../../../controllers/php/internaute/rechercherProduit.php" class="ml-auto" method = "post">
                <!--Formulaire de recherche-->
                <div class="input-group">
                    <input type="search" id = "search" name="search" placeholder="Rechercher" class="form-control">
                    <div class ="input-group-append">
                        <button class="btn btn-primary"><span class="fas fa-search"></span></button>
        
                    </div>
                </div>
            </form>
        </div >
        <div class="col-3 ml-5">
            <!--inscription connection-->
            <ul class="nav nav-pills ">
                <li class="nav-item ml-5"><button class="btn btn-success align  nav-link" data-toggle="modal" data-target="#inscription">S'inscrire</button></li>
                <li class="nav-item ml-1"><button class="btn btn-danger align nav-link"  data-toggle="modal" data-target="#authentification">S'authentifier</button></li>
            </ul>
        </div>
        
    </header>
    <div class="container mb-5">
        <h1 class = "text-center text-primary">
            BIENVENUE SUR LA PAGE DES MEDICAMENTS
        </h1>

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
                $resultat = $bdd -> query('SELECT * FROM produit');
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
                $resultat->closeCursor();
            ?>
       
        </main><!--end main.container-fluid-->
    </section>
    <footer class="row mt-5 bg-dark text-light">
        <div class="col-4">
            <div class="ml-5">           
                <h1 class="h5 mt-3"> SERVICE CLIENT</h1>
                <p>Comment utiliser ce site</p>
                <p>Contatez nous </p>
                <p>Politque d'utilisation</p>
            </div>
        </div>
        <div class="col-4 mt-3">
            <h1 class="h5 "> BESOIN D'AIDE</h1>
                <p>Votre compte</p>
                <p>vos vos commandes</p>
                <p>Autres aides</p>
        </div>
        <div class="col-4 mt-3">
            <h1 class="h5"> QUI SOMMES NOUS</h1>
                <p>A propos</p>
                <p>Comment poster sur ce site </p>
                <p>Autres informations</p>
        </div>
        
    </footer>
    <table>
        <th>
            
        <!--Formulaire d'inscription-->
    <div class="modal" id="inscription">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <form action="" onsubmit = "return verifForm(this)">
                            <div class="text">
                                <h1 class="h3 text-center text-title">FORMULAIRE D'INSCRIPTION</h1>
                            </div>
                            <!--First Name-->
                            <div class="form-group">
                                <label for="fName">Prénom</label>
                                <input type="text" name="fName" id="fName" class="form-control" placeholder="Votre prénom" required>
                            </div>
                            <!--End First Name-->
                            <!--Last Name-->
                            <div class="form-group">
                                <label for="lName"> Nom</label>
                                <input type="text" name="lName" id="lName" class="form-control" placeholder="Votre nom de famille" required/>
                            </div>
                            <!--End Last Name-->
                            <!--login-->
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" class="form-control" placeholder="Votre nom d'utilisateur" onblur="verifLogin(this)" required />
                            </div>
                            <!--end login-->
                            <!--mot de passe-->
                            <div class="form-group">
                                <label for="contact">Mot de passe</label>
                                <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Votre Mot de passe"  required/>
                            </div>
                            
                            <!--Contact-->
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Votre contact" onblur = "verifContact(this)" required/>
                            </div>
                            <!--Email-->
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Votre adresse email" onblur = "verifEmail(this)" />
                                <small class="form-text text-muted">Nous ne partagerons pas votre adresse email avec des tiers.</small>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--Submit-->
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                    <button type="reset" value = "annuler" class="btn btn-danger">Annuler</button>

                </div>
            </div>
        </div>
        <!--end formulaire inscription-->
        </th>
        <th>
                    <!--formulaire d'authentification-->
    <div class="modal" id="authentification">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <form action="">
                            <div class="text">
                                <h1 class="h3 text-center text-title">FORMULAIRE D'AUTHENTIFICATION</h1>
                            </div>
                            <!--login-->
                            <div class="form-group">
                                <label for="login">Votre nom d'utilisateur</label>
                                <input type="text" name="login" id="login" class="form-control" placeholder="Votre nom d'utilisateur" />
                            </div>
                            <!--end login-->
                            <!--mot de passe-->
                            <div class="form-group">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Votre Mot de passe" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <!--Submit-->
                    <button type="submit" class="btn btn-primary">S'authentifier</button>
                </div>
            </div>
        </div>

        </th>
    </table>

</body>
</html>