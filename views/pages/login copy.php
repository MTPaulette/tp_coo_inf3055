<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/css/authentification.css" />
	<title>login</title>
</head>
<body>
    <!--?php include("header.html"); ?--> 
	<?php
    	ini_set('display_errors', 1);
    	error_reporting(E_ALL|E_STRICT);
    	require("../../php/traitement.php");
		if(isset($_POST['login'])and isset($_POST['password'])){
		$login    = $_POST['login'];
		$password = $_POST['password'];
		$nom = passwordLogin($login,$password);
   	}
	?>
	<div id="container">
	<!-- zone de connexion -->
		<form action="index.php?"  method="post" name="connexion">
			<h1>Connexion</h1>
			<p id="error"></p>
			<label for="login"><b>login</b></label>                
			<input type="text" placeholder="Entrer votre login" id="login" name="login" required>                
			<label><b>Mot de passe</b></label>                
			<input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>                
			<input type="submit" id='submit' name="auth" id="auth" value="s'authentifier" class="submit" onclick="return validateConnexion()">
			<a href="enregistrement.php" >nouveau<a>                           
		</form>        
	</div>
<script src="../../js/connexion_enregistrement.js"></script>
</body>
</html>
