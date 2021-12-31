<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../styles/css/global.css" />
	<link rel="stylesheet" type="text/css" href="../styles/css/component.css" />
    <link rel="stylesheet" href="../plugins/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"-->
    <link rel="stylesheet" href="../styles/css/footer.css">
	
	<script src="../js/modernizr.custom.js"></script>
	<title>dashbord-adminPharmacie</title>
</head>
<body>
<br /><br />
	<p class="tt">Menu d�pliant la google nexus</p><br /><br />
		<div class="main">
    		<?php include("../components/headerIcon.html"); ?>  

			<div class="main-content">
				<h1>Menu du site du Google Nexus 7<span>Menu barre lat�rale comme sur le site <a href="http://www.google.com/nexus/index.html">Google Nexus 7</a> en haut � gauche :-)</span></h1>	
</div> 



			<?php include("../components/footer.html"); ?> 			
		</div><!-- /container -->

		<script src="../plugins/jquery.min.js"></script>
    	<script src="../plugins/bootstrap.bundle.min.js"></script>

		<script src="../js/classie.js"></script>
		<script src="../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html>