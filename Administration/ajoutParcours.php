
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil </title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../CSS/customNavbar.css">
	<link type="text/css" rel="stylesheet" href="../CSS/style.css">		
</head>
<header>
	<?php include('../PHP/headerAdmin.php') ?>
	<?php include('../PHP/navbarAdmin.php') ?>
</header>
<body>
	<?php include('../PHP/connexion.php'); ?>
	<?php 
	if (isset($_POST['submit']) &&
		isset($_POST['nomParcours']) &&
		isset($_POST['description']) &&
		isset($_POST['objectifs']) &&
		isset($_POST['competences']) &&
		isset($_POST['logiciels']) &&
		isset($_POST['admission']) 
		) 
	{
		if ($_POST['nomParcours']!="" &&
			$_POST['description']!="" &&
			$_POST['objectifs']!="" &&
			$_POST['competences']!="" &&
			$_POST['logiciels']!="" &&
			$_POST['admission']!="" &&) 
		{
			
		}
	}
	?>
	<div class="container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="ajoutParcours.php" method="POST" enctype="multipart/form-data">
				<h1>Ajouter un parcours</h1>
				<?php
				if (isset($error))
				{
					echo "<div class='alert alert-danger'>".$error."</div>"; 
				}
				if (isset($message)) 
				{
					echo "<div class='alert alert-success'>".$message."</div>";
				}
				?>
				<div class="form-group">
					<label>Nom du parcours</label>
					<textarea class="form-control" placeholder="Nom" maxlength="40" name="nomParcours" rows="1"></textarea>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" placeholder="Description du parcours." name="description" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>Objectifs</label>
					<textarea class="form-control" placeholder="Objectifs du parcours." name="objectifs" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>Compétences</label>
					<textarea class="form-control" placeholder="Compétences visées" name="competences" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>Logiciels</label>
					<textarea class="form-control" placeholder="Logiciels utilisés" name="logiciels" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>Admission</label>
					<textarea class="form-control" placeholder="Conditions d'admission au parcours." name="admission" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>Plaquette</label>
					<input type="file" class="form-control" name="plaquette"></input>
				</div>
				<div class="form-group">
					<label>Mascotte</label>
					<input type="file" class="form-control" name="mascotte"></input>
				</div>
				<div class="form-group">
					<label>Image de fond</label>
					<input type="file" class="form-control" name="fond"></input>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
			</form>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>