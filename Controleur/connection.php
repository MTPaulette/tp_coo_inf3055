<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Connexion</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
	<h1>Formulaire de connexion</h1>
</center>
<div id="general">
	<form action="connection.php"  method="post">
	<table align="center">
		<tr>
		    <td>Login :</td>
			<td><input type="text" name="login"/></td>
		</tr>
		<tr>
		    <td>Mot de passe:</td>
			<td><input type="password" name="motDePasse"/></td>
		</tr>
		<tr>
		    <td>Se connecter en tant que? :</td>
			<td><input type="text" name="type"/></td>
		</tr>
		<tr>
		   <td><input type="reset" value="Annuler" name="annuler"/></td>
		   <td><input type="submit" name="auth" id="auth" value="Connexion"/>
			<a href="nouveau_patient.php" >s'Inscrire en tant que patient<a>
		   </td>
		</tr>
	</table>
	</form>
	<table>
	<?php
	// Afficher les UTILISATEURS enrégistrés
	require("all_use_cases.php");
	if(isset($_POST['auth']) and isset($_POST['login']) and isset($_POST['motDePasse']) and isset($_POST['type'])){
		$login = $_POST['login'];
		$motDePasse = $_POST['motDePasse'];
		$type = $_POST['type'];
		$tmp = 0;
		$tableauLogin = Array();
		$tableauMotDePasse = Array();
		if ($type == "patient"){
			$tableauLogin = afficherLoginPatients($login);
			$tableauMotDePasse = afficherMotDePassePatients($login);
		}
		if ($type == "employe"){
			$tableauLogin = afficherLoginEmploye($login);
			$tableauMotDePasse = afficherMotDePasseEmploye($login);
		}
		if ($type == "directeur"){
			$tableauLogin = afficherLoginDirecteur($login);
			$tableauMotDePasse = afficherMotDePasseDirecteur($login);
		}
		if ($type == "superadmin"){
			$tableauLogin = afficherLoginSuperAdmin($login);
			$tableauMotDePasse = afficherMotDePasseSuperAdmin($login);
		}
		else{
			echo '<h1>????'.$type.'</h1>';
			echo "<h1>Ce type n'est pas pris en compte</h1>";
		}
		

		if (in_array($login, $tableauLogin) && in_array($motDePasse,$tableauMotDePasse)){
			echo "<h1>Vous etes bien connecté @: ".$login."</h1>";
			echo '<h1><a href="accueil.html">Acceder au site</a></h1>';
		}
		else{
			echo '<h1><a href="accueil1.html">Voir la page Accueil</a></h1>';
		}
	}
	?>
	</table>
</div>
</body>
</html>
