  
    <div id="container">
        <div class="searchForm">
        <form action="../../../controllers/php/employe/vendreProduit.php" method="post" name="enregistrement" enctype="multipart/form-data">

            <fieldset>
                <legend>Employe de la pharmacie</legend>
            <!--label for="nom"><b>nom</b></label>                
            <input type="text" placeholder="Entrer le nom du produit" id="nom" name="nom" required-->
            
			<select name="nom" id="nom" class="form-select" aria-label="Default select example">
            </select>
            <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Quantité à acheter" required>
            <!--label for="quantite"><b>quantite</b></label>                
            <input type="number" placeholder="Quantité à acheter" id="quantite" name="quantite" required-->
            
            
            <!--input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()"--> 
            </fieldset>
            <fieldset>
                <input type="submit" name="auth" id="auth" value="vendre" class="submit" onclick="return validateEnregistrement()"> 
                <input type="reset" name="auth" id="auth" value="annuler" class="reset" onclick="return validateEnregistrement()"> 
            </fieldset>                         
        </form>        
    </div>
</div>