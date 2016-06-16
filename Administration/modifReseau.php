<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Modification des  </title>
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

				$sql = "UPDATE reseausociaux SET Lien='".utf8_decode($lien)."', NomReseau='".$typeReseau."', ID_parcours='".$parcoursSelect."' WHERE ID_reseausociaux=".$_GET['reseauID'];
				if ($conn->query($sql) === TRUE) {
					$message="Le réseau social a été modifié";
				} else {
					$error="Une erreur s'est produite. Veuillez réessayer ultérieurement";
				}
			}
		}
	 ?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="modifReseau.php?reseauID=<?php echo $_GET['reseauID'] ?>" method="POST">
				<h1>Modifié des liens vers les réseaux sociaux</h1>
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
				<?php  
					if (isset($_GET['reseauID'])) {
						$sqlReseau = "SELECT * FROM reseausociaux WHERE ID_reseausociaux=".$_GET['reseauID'];
						$resultReseau = $conn->query($sqlReseau);
						$rowReseau=$resultReseau->fetch_assoc(); ?>

						<div class="form-group">
							<label>Lien de la page</label>
							<textarea class="form-control" name="lien" maxlength="200" placeholder="Lien de la page du réseau" rows="1"><?php echo $rowReseau['Lien']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Type de réseau</label>
							<select class="form-control" name="typeReseau">
								<?php 
									if (utf8_encode($rowReseau['NomReseau'])=="twitter") {?>
										<option value="facebook">Facebook</option>
										<option value="twitter" selected="true">Twitter</option>
										<option value="google-plus">Google +</option>
									<?php
									}
									if (utf8_encode($rowReseau['NomReseau'])=="facebook") {?>
										<option value="facebook" selected="true">Facebook</option>
										<option value="twitter">Twitter</option>
										<option value="google-plus">Google +</option>
									<?php
									}
									if (utf8_encode($rowReseau['NomReseau'])=="google-plus") {?>
										<option value="facebook">Facebook</option>
										<option value="twitter">Twitter</option>
										<option value="google-plus" selected="true">Google +</option>
									<?php
									}
								 ?>
							</select>
						</div>
						<div class="form-group">
							<label>Choix du parcours</label>
							<select class="form-control" name="parcoursSelect">
								<option disabled="true">Parcours</option>
								<?php 
								$sqlParcours = "SELECT * FROM parcours";
								$resultParcours = $conn->query($sqlParcours);
								if ($resultParcours->num_rows > 0) {
									while ($rowParcours = $resultParcours->fetch_assoc()) {
										if (utf8_encode($rowReseau['ID_parcours'])==utf8_encode($rowParcours['ID_parcours'])) {
											echo"<option value=".$rowParcours["ID_parcours"]. " selected='true'>".utf8_encode($rowParcours["Nom"])."</option>";
										} else {
											echo"<option value=".$rowParcours["ID_parcours"].">".utf8_encode($rowParcours["Nom"])."</option>";
										}
									}
								}
								?>
							</select>
						</div>
						<?php 
					}
				?>
				
				<button type="submit" class="btn btn-primary" name="submit">Modifier</button>
			</form>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>