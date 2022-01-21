  
    <div id="container">
        <div class="searchForm">
        <form action="../../../controllers/php/employe/ajouterProduit.php" method="post" name="enregistrement" enctype="multipart/form-data">

            <fieldset>
                <legend>Nouveau produit</legend>
            <label for="nom"><b>nom</b></label>                
            <input type="text" placeholder="Entrer le nom du produit" id="nom" name="nom" required>
            <label for="prix"><b>prix</b></label>                
            <input type="number" placeholder="Entrer le prix du produit" id="prix" name="prix" required>
            <label for="quantite"><b>quantite</b></label>                
            <input type="number" placeholder="Entrer la quantite à ajouter" id="quantite" name="quantite" required>

            <label for="type"><b>type</b></label>                
            <input type="text" placeholder="Entrer le type du produit" id="type" name="type" required> 
            
            <input type="hidden" name="MAX_FILE_SIZE" value="200000000">
            <label for="file"><b>Photo du produit</b></label>
            <input type="file" id="file" name="file" required> <br><br>


            <label><b>Description</b></label>
            <textarea name="description" id="description" cols="7" rows="3" placeholder="..."></textarea>                
            <!--input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required> 
            
            
            <input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()"--> 
            </fieldset>
            <fieldset>
                <input type="submit" name="auth" id="auth" value="ajouter" class="submit" onclick="return validateEnregistrement()"> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset" onclick="return validateEnregistrement()"> 
            </fieldset>                         
        </form>        
    </div>
    </div>
 