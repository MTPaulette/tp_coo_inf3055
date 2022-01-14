  
    <div id="container">
    <!-- zone de connexion -->
        <form action="../../../controllers/php/superadmin/ajouterDirecteur.php" method="post" name="enregistrement" enctype="multipart/form-data">
            <!--p class="icon"><img src="../../plugins/icons/person-circle.svg"></p>
            <h1><img src="../plugins/icons/person-circle.svg">S'enregistrer</h1-->
            <p id="error"></p>
            <fieldset>
                <legend>Nouvelle pharmacie</legend>
                <label for="nomp"><b>nom</b></label>                
                <input type="text" placeholder="Entrer le nom de la pharmacie" id="nomp" name="nomp" required>
                <label for="localisation"><b>localisation</b></label>                
                <input type="text" placeholder="Entrer votre prenom" id="localisation" name="localisation" required>   <div class="photo bloc">
                <input type="hidden" name="MAX_FILE_SIZE" value="200000000">
                <label for="file">fichier</label><br>
                <input type="file" id="file" name="file" required>      
          </div>
            </fieldset>


            <fieldset>
                <legend>Directeur de la pharmacie</legend>
            <label for="nomD"><b>nom</b></label>                
            <input type="text" placeholder="Entrer le nom du directeur" id="nomD" name="nomD" required>
            <label for="prenom"><b>prenom</b></label>                
            <input type="text" placeholder="Entrer votre prenom" id="prenom" name="prenom" required>

            <label for="telephone"><b>telephone</b></label>                
            <input type="text" placeholder="Entrer votre telephone" id="telephone" name="telephone" required>
            <label for="adresse"><b>adresse</b></label>                
            <input type="text" placeholder="Entrer votre adresse" id="adresse" name="adresse" required>

            <label for="login"><b>login</b></label>                
            <input type="text" placeholder="Entrer votre login" id="login" name="login" required>

            <label><b>Mot de passe</b></label>                
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required> 
            
            
            <!--input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()"--> 
            </fieldset>
            <fieldset>
                <input type="submit" name="auth" id="auth" value="creer" class="submit" onclick="return validateEnregistrement()"> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset" onclick="return validateEnregistrement()"> 
                
                <!--input type="submit" name="auth" id="auth" value="creer" class="submit"> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset"-->
            </fieldset>                         
        </form>        
    </div>
 