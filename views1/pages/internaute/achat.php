<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <header class="row navbar navbar-expand-md bg-dark navbar-dark my-3 container-fluid" >
        <!--L'entête la page web-->
        <div class="col-9 collapse navbar-collapse navbar-expand-md">
            <nav>
                <!--barre de navigation-->
                <ul class="navbar-nav  nav-pills">
                    <li class="nav-item"><a class="align nav-link"  href="Accueil.html">Accueil</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Medicament.html">Medicaments</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Cosmetique.html">Cosmétiques</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Alimentaire.html">Alimentaires</a></li>
                </ul>
            </nav>
            <form action="" class="ml-auto">
                <!--Formulaire de recherche-->
                <div class="input-group">
                    <input type="search" name="q" placeholder="Rechercher" class="form-control">
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
    <section class="container">
        <div class="row"> 
            <div class="col-4"></div>
            <div class="col-4">
                <a href="Achat.html">
                    <img src="images/mixing.jpg" alt="mixing" class="card-img-top">
                </a>
                <div class="card-body">
                    <h1 class="h3 card-title">Lorem, ipsum dolor.</h1>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. error, ipsum iure aliquid odio debitis. Veritatis, aperiam harum et officiis impedit temporibus explicabo!
                    </p>
                    <p class="lead text-right">
                        <button class="btn btn-primary" >Commander</button>
                    </p>    
            </div>
        </div>
   
    <footer>

    </footer>
    <table>
        <th>
            
        <!--Formulaire d'inscription-->
    <div class="modal" id="inscription">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <form action="">
                            <div class="text">
                                <h1 class="h3 text-center text-title">FORMULAIRE D'INSCRIPTION</h1>
                            </div>
                            <!--First Name-->
                            <div class="form-group">
                                <label for="fName">Votre prénom</label>
                                <input type="text" name="fName" id="fName" class="form-control" placeholder="Votre prénom" />
                            </div>
                            <!--End First Name-->
                            <!--Last Name-->
                            <div class="form-group">
                                <label for="lName">Votre nom de famille</label>
                                <input type="text" name="lName" id="lName" class="form-control" placeholder="Votre nom de famille" />
                            </div>
                            <!--End Last Name-->
                            <!--login-->
                            <div class="form-group">
                                <label for="login">Votre nom d'utilisateur</label>
                                <input type="text" name="login" id="login" class="form-control" placeholder="Votre nom d'utilisateur" />
                            </div>
                            <!--end login-->
                            <!--mot de passe-->
                            <div class="form-group">
                                <label for="contact">Mot de passe</label>
                                <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Votre Mot de passe" />
                            </div>
                            
                            <!--Contact-->
                            <div class="form-group">
                                <label for="contact">Votre contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Votre contact" />
                            </div>
                            <!--Email-->
                            <div class="form-group">
                                <label for="email">Votre adresse email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Votre adresse email" />
                                <small class="form-text text-muted">Nous ne partagerons pas votre adresse email avec des tiers.</small>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--Submit-->
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
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