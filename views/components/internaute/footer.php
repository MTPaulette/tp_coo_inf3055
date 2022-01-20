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
