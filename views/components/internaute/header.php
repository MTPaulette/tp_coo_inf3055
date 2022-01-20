<header class="row navbar navbar-expand-md bg-dark navbar-dark my-3 container-fluid" >
        <!--L'entête la page web-->
        
        <div class="col-9 collapse navbar-collapse navbar-expand-md">
            <nav>
                <!--barre de navigation-->
                <ul class="navbar-nav  nav-pills">
                    <a href="#" class="navbar-brand">
                        <img src="images/logo-pharmacie.jpg" alt="Logo pharmacie" style = " width: 100px" />
                    </a>
                    <li class="nav-item"><a class="align nav-link"  href="Accueil.php">Accueil</a></li>
                    <li class="nav-item"><a class="align nav-link" href="Medicament.php">Medicaments</a></li>
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
    