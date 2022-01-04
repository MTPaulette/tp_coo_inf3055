<?php session_start() ?>
<?php
/*****************************Connexion à la base de données ********************************/
	function connecter()
	{
		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=CMS', 'root', '', $pdo_options);
			//echo "Connexion reussi";
			$bdd->query("SET NAMES UTF8");
			return $bdd;
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}

	}
	
/**************************************Checking du login et du mot de passe **********************************************/
	function passwordLogin($login,$password)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT * FROM enseignant WHERE login = ? AND password = PASSWORD(?)');
		$p = $req->execute(array($login,$password));
		$param = $req->fetch();
		if(!$param)
		{
            header("Location:http://localhost/tp_cms/html/dashboard/index.php");
		}
		else
		{
           	header("Location:http://localhost/tp_cms/html/dashboard/presentation.php");
			$_SESSION['enseignant'] = $login;
			$_SESSION['theme'] = 1;
			echo '<p>la variable de session est'.$_SESSION['enseignant'].'</p>';
		}
	}

/******************************Insertion des étudiants dans la base de données *********************/
function insererEnseignant($nom, $login ,$email, $password)
{
	try{
		$bdd = connecter();
	//	$req = $bdd->prepare('INSERT INTO enseignant (nom, login, password) values(?,?,PASSWORD(?))');
		$req = $bdd->prepare('INSERT INTO enseignant (nom, login, email, password) values(?,?,?,PASSWORD(?))');
		$req->execute(array($nom, $login,$email, $password));

		header("Location:http://localhost/tp_cms/html/dashboard/index.php");
	//	$req->execute(array($nom, $login,$password));
		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}
/******************************Insertion des cours dans la base de données *********************/
function insererCours($titre, $contenu)
{
	try{
		$bdd = connecter();
		$req = $bdd->prepare('INSERT INTO cours (titre, contenu, enseignant) values(?,?,?)');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($titre, $contenu,$_SESSION['enseignant']));

		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}

function modifierCours($titre,$contenu, $fileNewName)
{	
	try{
		$bdd = connecter();
		$req = $bdd->prepare('INSERT INTO cours (titre, contenu,fichier, enseignant) values(?,?,?,?)');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($titre, $contenu,addslashes($fileNewName),$_SESSION['enseignant']));

		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}

function modifierArticle($titre,$contenu, $fileNewName)
{	
	try{
		$bdd = connecter();
		$req = $bdd->prepare('INSERT INTO article (titre, contenu,fichier, enseignant) values(?,?,?,?)');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($titre, $contenu,addslashes($fileNewName),$_SESSION['enseignant']));

		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}

/******************************Insertion des articles dans la base de données *********************/
function insererArticle($titre, $contenu)
{
	try{
		$bdd = connecter();
		$req = $bdd->prepare('INSERT INTO article (titre, contenu, enseignant) values(?,?,?)');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($titre, $contenu,$_SESSION['enseignant']));

	//	$enseignant = $_SESSION['enseignant'];
	//	echo "<h1>Enregistrement de l'article <b>$enseignant</b> effectué avec succès</h1>";
		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}
/******************************modification des enseignants de la base de données *********************/
function modifierEnseignant($fonction,$contenu, $fileNewName)
{	
	try{
		$bdd = connecter();
		$req = $bdd->prepare('UPDATE `enseignant` SET fonction = ?, presentation = ?, photo = ? WHERE `enseignant`.`login` = ? ');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($fonction, $contenu,$fileNewName,$_SESSION['enseignant']));
		echo 'modifier enseignant';
		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}
/*********************************** enregistrer les donnees pour le cv ******************************/
function enregistrerCV($localisation,$education, $competences, $experiences, $fileNewName) {	
	try{
		$bdd = connecter();
		$req = $bdd->prepare('UPDATE `enseignant` SET localisation = ?, education = ?, competences = ?, experiences = ?, cv = ? WHERE `enseignant`.`login` = ? ');
	//	$req = $bdd->prepare('INSERT INTO client (nom, prenom, login, password, region, departement, arrondissement) values(?,?,?,PASSWORD(?),?,?,?)');
		$req->execute(array($localisation,$education, $competences, $experiences,$fileNewName,$_SESSION['enseignant']));

		return true;
	}
	catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
	
}
/*******************************Obtention d'un ensemble de tuple*********************************/
	function getTuple($tab,$param,$val)
	{
		$bdd = connecter(); 
		$req = $bdd->prepare('SELECT * FROM '. $tab.' WHERE '.$param. '= ?');
	 
		$req->execute(array($val));
		
		return $req;
	}

/**************************************************** */
    function transfert(){
        $ret        = false;
        $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom  = $_FILES['fic']['name'];
            //connexion a la bd
            $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = "SELECT enseignant (" . 
                                    "photo, img_taille, img_type, img_blob " .
                                    ") VALUES (" .
                                    "'" . $img_nom . "', " .
                                    "'" . $img_taille . "', " .
                                    "'" . $img_type . "', " .
                                    "'" . $img_blob . "') ";
            $ret = mysql_query ($req) or die (mysql_error ());
            return true;
        }
    }
 function photo() {

	$enseignant = $_SESSION['enseignant'];
	$bdd = connecter();
	$req = $bdd->prepare('SELECT photo
	FROM enseignant WHERE login = ?');
	$p = $req->execute(array($enseignant));
	$row = $req->fetch();

	echo $row;
	//return json_encode($row);
 }

?>
