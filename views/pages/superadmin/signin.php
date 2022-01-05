<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../styles/css/authentification.css" />
    <link rel="stylesheet" href="../../plugins/bootstrap.min.css">
	<title>sign in</title>

</head>
<body>    
    <div id="container">
    <!-- zone de connexion -->
        <form action="../../../controllers/php/superadmin/signin.php" method="post" name="enregistrement">
            <p class="icon"><img src="../../plugins/icons/person-circle.svg"></p>
            <!--h1><img src="../plugins/icons/person-circle.svg">S'enregistrer</h1-->
            <p id="error"></p>
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
            <input type="submit" id='submit' name="auth" id="auth" value="creer compte" class="submit" onclick="return validateEnregistrement()">
            <a href="login.php" >se connecter<a>                           
        </form>        
    </div>
    <style>
        .icon {
          /* background-color: pink;*/
        }
        .icon > img {
            margin: auto 37%;
            width: 90px;
            height: 90px;
        }
    </style>
<script src="../../../controllers/js/authentification.js"></script>
<script src="../../../controllers/ajax/dynamic_authentification.js"></script>
</body>
</html>