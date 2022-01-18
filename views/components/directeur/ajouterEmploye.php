  
    <div id="container">
    <div class="searchForm">
        <form action="../../../controllers/php/directeur/ajouterEmploye.php" method="post" name="enregistrement" enctype="multipart/form-data">

            <fieldset>
                <legend>Employe de la pharmacie</legend>
            <label for="nom"><b>nom</b></label>                
            <input type="text" placeholder="Entrer le nom de l'employe" id="nom" name="nom" required>
            <label for="prenom"><b>prenom</b></label>                
            <input type="text" placeholder="Entrer votre prenom" id="prenom" name="prenom" required>

            <label for="telephone"><b>telephone</b></label>                
            <input type="text" placeholder="Entrer votre telephone" id="telephone" name="telephone" required>
            <label for="adresse"><b>adresse</b></label>                
            <input type="text" placeholder="Entrer votre adresse" id="adresse" name="adresse" required>

            <input type="hidden" name="MAX_FILE_SIZE" value="200000000">
            <label for="file"></label>
            <input type="file" id="file" name="file" required> <br>

            <label for="login"><b>login</b></label>                
            <input type="text" placeholder="Entrer votre login" id="login" name="login" required>

            <label><b>Mot de passe</b></label>                
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required> 
            
            
            <!--input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()"--> 
            </fieldset>
            <fieldset>
                <input type="submit" name="auth" id="auth" value="ajouter" class="submit" onclick="return validateEnregistrement()"> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset" onclick="return validateEnregistrement()"> 
            </fieldset>                         
        </form>        
    </div>
    </div>