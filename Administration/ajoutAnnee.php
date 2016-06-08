
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
		isset($_POST['dateDebut']) &&
		isset($_POST['dateFin'])) {
		
		if ($_POST['dateDebut']!="" &&
			$_POST['dateFin']!="") {
			$dateDebut = $_POST['dateDebut'];
			$dateFin = $_POST['dateFin'];

			$sql = "INSERT INTO anneescolaire (DateDebut, DateFin) VALUES ('".$dateDebut."','".$dateFin."');";
			if($conn->query($sql)===TRUE) { 
				$StartYear = date("Y", strtotime($dateDebut));
				$EndYear = date("Y", strtotime($dateFin));
				mkdir("../Projets/".$StartYear."-".$EndYear);
				mkdir("../Projets/".$StartYear."-".$EndYear."/Common");
				$sqlParcours = "SELECT * FROM parcours;";
				$resultParcours = $conn->query($sqlParcours);
				while ($rowParcours = $resultParcours->fetch_assoc()) {
					mkdir("../Projets/".$StartYear."-".$EndYear."/".$rowParcours['Dossier']);
				}
				$message = "Année scolaire crée !";
			} else {
				$error = "Une erreur est survenue, veuiliiez réessayer ultérieurement";
			}
		}
	}
	 ?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="ajoutAnnee.php" method="POST">
				<h1>Ajouter une année scolaire</h1>
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
					<label>Date du début de l'année scolaire</label>
					<input type="date" class="form-control" name="dateDebut" value= <?php echo date('Y-m-d') ?> ></input>
				</div>
				<div class="form-group">
					<label>Date de fin</label>
					<input type="date" class="form-control" name="dateFin" value= <?php echo date('Y-m-d') ?> ></input>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
			</form>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>