<?php
/***************************** Fonctions utilis ********************************/
	function connecter()
	{
		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$baseDeDonnees = new PDO('mysql:host=localhost;dbname=tpcoo', 'root', '', $pdo_options);
			//echo "Connexion reussi";
			$baseDeDonnees -> query("SET NAMES UTF8");
			return $baseDeDonnees;
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
	}

	function getTuple($table,$param,$val)
	{
		$bdd = connecter(); 
		$req = $bdd->prepare('SELECT * FROM '. $table.' WHERE '.$param. '= ?');
	 
		$req -> execute(array($val));
		
		return $req;
	}
/************************************** Fonctionalitées du patient **********************************************/
	function insererPatient($nom ,$prenom ,$tel ,$adresse ,$date ,$login ,$motDePasse)
	{
		try{
			$bdd = connecter();
			$req = $bdd -> prepare('INSERT INTO internaute ( nom, prenom,tel ,adresse ,date, login, motDePasse) values(?,?,?,?,?,?,PASSWORD(?))');
			$req -> execute(array($nom ,$prenom ,$tel ,$adresse ,$date ,$login ,$motDePasse));
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	function connecterPatient($login,$motDePasse)
	{
		$baseDeDonnees = connecter();
		$requete = $baseDeDonnees -> prepare('SELECT * FROM internaute WHERE login = ? AND motDePasse = PASSWORD(?)');
		$p = $requete -> execute(array($login,$motDePasse));
		$param = $requete -> fetch();
		if(!$param)
		{
			$chaine = 'Compte inexistant';
		}
		else
		{
		   $patient_obj = getTuple("internaute","login", $param['login']);
		   $patient = $patient_obj->fetch();
		   
		   $chaine = 'Bonjour '.$patient['nom'];
		}
	    return $chaine;
	}
	
	function afficherPatients()
	{
		$bdd = connecter();
		$req = $bdd -> prepare('SELECT * FROM internaute ORDER BY nom DESC');
		$p = $req -> execute();
		$row = $req -> fetch();
		$chaine="";
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['id']."</td>";
			 $chaine=$chaine."<td>".$row['nom']."</td>";
			 $chaine=$chaine."<td>".$row['prenom']."</td>";
			 $chaine=$chaine."<td>".$row['tel']."</td>";
			 $chaine=$chaine."<td>".$row['adresse']."</td>";
			 $chaine=$chaine."<td>".$row['date']."</td>";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		return $chaine;
	}
	function afficherLoginPatients($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT login FROM internaute');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 array_push($tableauLogin,$row['login']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherLoginEmploye($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT login FROM employe');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 array_push($tableauLogin,$row['login']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherLoginDirecteur($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT login FROM directeur');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 array_push($tableauLogin,$row['login']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherLoginSuperAdmin($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT login FROM superadmin');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 array_push($tableauLogin,$row['login']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherMotDePassePatients($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT motDePasse FROM internaute');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['motDePasse']."</td>";
			 array_push($tableauLogin,$row['motDePasse']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherMotDePasseEmploye($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT motDePasse FROM employe');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['motDePasse']."</td>";
			 array_push($tableauLogin,$row['motDePasse']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherMotDePasseDirecteur($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT motDePasse FROM directeur');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['motDePasse']."</td>";
			 array_push($tableauLogin,$row['motDePasse']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	function afficherMotDePasseSuperAdmin($login)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT motDePasse FROM superadmin');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
		$tableauLogin = array();
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['motDePasse']."</td>";
			 array_push($tableauLogin,$row['motDePasse']);
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		
		return $tableauLogin;
	}
	
?>