<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/plugins/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"-->
	<!--link rel="stylesheet" type="text/css" href="views/styles/css/searchComponent.css" /-->
	
	<title>PHARMA-CENTER</title>
</head>
<body>
		<div class="main">
            <div class='card'>
            <div class='mysearch-dark row no-gutters'>
                <div class='img'> 
                    <p class='pasDePhoto'><img src='views/plugins/icons/person-circle.svg'></p> 
                </div> 
            <div class='card-body'>
                <h5 class='card-title'> Nom</h5>
                <p class='card-text'>Description: ".$search['description'] </p>
                <p class='card-text'>Prix: ".$search['prix'] Francs CFA</p>
                <p class='card-text'> <small class='text-muted'>Quantite en stock: ".$search['quantite'] </small></p>
                <p class='card-text'> <small class='text-muted'>Type du produit: ".$search['type'] </small></p>
                <p class='card-text'> <small class='text-muted'>Pharmacie: ".$search['nomPharmacie'] </small></p>
                <p class='card-text'> <small class='text-muted'> ajouté le: ".$search['createdAt'] </small></p>
                <p class='card-text'> <small class='text-muted'> modifié le: ".$search['modifiedAt'] </small></p>
                <p class='card-text'> <small class='text-muted'> par: ".$search['loginEmploye'] </small></p>
                <a href="#" class="btn btn-primary">se connecter</a>
             </div> 			
		</div>

		<script src="views/plugins/jquery-3.3.1.slim.min.js"></script>
    	<script src="views/plugins/bootstrap.bundle.min.js"></script>
</body>
</html