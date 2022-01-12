<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/css/authentification.css" />
	<title>signin</title>

</head>
<body>
    <!--?php session_start() ?-->
    <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL|E_STRICT);
        require("../../php/traitement.php");
        if(isset($_POST['nom'])and isset($_POST['login'])and isset($_POST['email'])and isset($_POST['password'])){
            $nom          = $_POST['nom'];
            $login        = $_POST['login'];
            $email        = $_POST['email'];
            $password     = $_POST['password'];
            insererEnseignant($nom, $login ,$email, $password);
            echo "<h1>Enrégistrement de <b>$login </b> effectué avec succès</h1>";
        }
    ?>
    <div id="container">
    <!-- zone de connexion -->
        <form action="enregistrement.php" method="post" name="enregistrement">
            <h1>S'enregistrer</h1>
            <p id="error"></p>
            <label for="nom"><b>nom</b></label>                
            <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required>
            <label for="login"><b>login</b></label>                
            <input type="text" placeholder="Entrer votre login" id="login" name="login" required>
            <label for="email"><b>email</b></label>                
            <input type="email" placeholder="Entrer votre email" id="email" name="email" required>                
            <label><b>Mot de passe</b></label>                
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>                
            <input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()">
            <a href="index.php" >se connecter<a>                           
        </form>        
    </div>
<script src="../../js/connexion_enregistrement.js"></script>
<script src="../../ajax/dynamique.js"></script>
</body>
</html>