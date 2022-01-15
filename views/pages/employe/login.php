<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../styles/css/authentification.css" />
    <link rel="stylesheet" href="../../plugins/bootstrap.min.css">
	<title>log in</title>
</head>
<body>
	<div id="container">
	<!-- zone de connexion -->
        <form action="../../../controllers/php/employe/login.php" method="post" name="connexion">
            <p class="icon"><img src="../../plugins/icons/authentification.svg"></p>
			<!--h1>Connexion</h1-->
			<p id="error"></p>
			<label for="login"><b>login</b></label>             
			<input type="text" placeholder="Entrer votre login" id="login" name="login" required>                
			<label><b>Mot de passe</b></label>                
			<input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>                
			<input type="submit" id='submit' name="auth" id="auth" value="s'authentifier" class="submit" onclick="return validateConnexion()">
			<a href="signin.php" >nouveau<a>                           
		</form>        
	</div>
	<script src="../../../controllers/js/authentification.js"></script>
</body>
</html>
