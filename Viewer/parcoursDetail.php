<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>
	<header>
		<?php include('../PHP/header.php') ?>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					include('../PHP/connexion.php');

					$parcoursId=$_GET['parcoursId'];

					include('../PHP/deconnexion.php');

				?>
			</div>
		</div>
	</body>
	<footer>
		
	</footer>
</html>