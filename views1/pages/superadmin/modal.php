<?php session_start() ;
	if(!$_SESSION['superadmin']) {
    	header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugins/bootstrap.min.css">
	
	<title>dashbord-adminPharmacie</title>
</head>
<body>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">open modal</button>
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">modal heading</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">modal body</div>

				<div class="modal-footer">
					<button type="button" class="btn-danger" data-dismiss="modal">close</button>
				</div>
			</div>
		</div>
	</div>

		<script src="../../plugins/jquery-3.3.1.slim.min.js"></script>
    	<script src="../../plugins/bootstrap.bundle.min.js"></script>
</body>
</html