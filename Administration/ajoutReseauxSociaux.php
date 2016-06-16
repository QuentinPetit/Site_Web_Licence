<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Lien vers les réseaux socialuc</title>
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
			isset($_POST['lien']) &&
			isset($_POST['typeReseau']) &&
			isset($_POST['parcoursSelect'])) {
			if ($_POST['lien']!="") {
				$lien = $_POST['lien'];
				$typeReseau = $_POST['typeReseau'];
				$parcoursSelect = $_POST['parcoursSelect'];

				$sql = "INSERT INTO reseausociaux (Lien, NomReseau, ID_parcours) VALUES ('".utf8_decode($lien)."','".$typeReseau."','".$parcoursSelect."');";
				if ($conn->query($sql) === TRUE) {
					$message="Le réseau social a été ajouté";
				} else {
					$error="Une erreur s'est produite. Veuillez réessayer ultérieurement";
				}
			}
		}
	 ?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="ajoutReseauxSociaux.php" method="POST">
				<h1>Ajouter des liens vers les réseaux sociaux</h1>
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
					<label>Lien de la page</label>
					<textarea class="form-control" name="lien" maxlength="200" placeholder="Lien de la page du réseau" rows="1"></textarea>
				</div>
				<div class="form-group">
					<label>Type de réseau</label>
					<select class="form-control" name="typeReseau">
						<option value="facebook">Facebook</option>
						<option value="twitter">Twitter</option>
						<option value="google-plus">Google +</option>
					</select>
				</div>
				<div class="form-group">
					<label>Choix du parcours</label>
					<select class="form-control" name="parcoursSelect">
						<option disabled="true">Parcours</option>
						<?php 
						$sql = "SELECT * FROM parcours";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {

								echo"<option value=".$row["ID_parcours"].">".utf8_encode($row["Nom"])."</option>";

							}
						}
						?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
			</form>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>