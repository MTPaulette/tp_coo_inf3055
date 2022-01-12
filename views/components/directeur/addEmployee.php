  
    <div id="container">
    <!-- zone de connexion -->
        <form action="../../../controllers/php/directeur/signin.php" method="post" name="enregistrement">
            <!--p class="icon"><img src="../../plugins/icons/person-circle.svg"></p>
            <h1><img src="../plugins/icons/person-circle.svg">S'enregistrer</h1-->
            <p id="error"></p>
            <!--fieldset>
                <legend>Nouvelle pharmacie</legend>
                <label for="nom"><b>nom</b></label>                
                <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required>
                <label for="prenom"><b>localisation</b></label>                
                <input type="text" placeholder="Entrer votre prenom" id="prenom" name="prenom" required>
            </fieldset-->


            <fieldset>
                <legend>Nouvel employé</legend>
            <label for="nom"><b>nom</b></label>                
            <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required>
            <label for="prenom"><b>prenom</b></label>                
            <input type="text" placeholder="Entrer votre prenom" id="prenom" name="prenom" required>

            <label for="telephone"><b>telephone</b></label>                
            <input type="text" placeholder="Entrer votre telephone" id="telephone" name="telephone" required>
            <label for="adresse"><b>adresse</b></label>                
            <input type="text" placeholder="Entrer votre adresse" id="adresse" name="adresse" required>

            <label for="login"><b>login</b></label>                
            <input type="text" placeholder="Entrer votre login" id="login" name="login" required>
            <!--label for="email"><b>email</b></label>                
            <input type="email" placeholder="Entrer votre email" id="email" name="email" required-->                
            <label><b>Mot de passe</b></label>                
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>                
            <!--input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()"--> 
            </fieldset>
            <fieldset>
                <input type="submit" name="auth" id="auth" value="creer" class="submit" onclick="return validateEnregistrement()"--> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset" onclick="return validateEnregistrement()"--> 
                <!--a href="#" class="btn btn-success">creer</a>
                <a href="#" class="btn btn-danger">annuler</a-->
            </fieldset>                         
        </form>        
    </div>
 