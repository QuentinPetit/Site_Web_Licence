<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Liens vers les réseaux sociaux</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Ressources/jquery-ui-1.11.4.custom/jquery-ui.min.css">
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
	if (isset($_POST['editer'])) {
		header("location: modifReseau.php?reseauID=".$_POST['reseauSociauSelect']);
	}
	if (isset($_POST['supprimer'])) {
		$reseauSociauSelect = $_POST['reseauSociauSelect'];
		$sql = "DELETE FROM reseausociaux WHERE reseausociaux.ID_reseausociaux=".$reseauSociauSelect;
		$conn -> query($sql);
	} 
	?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="" method="POST">
				<div id="accordion">
					<?php 
					$isfirst = true;
					$sql="SELECT parcours.ID_parcours AS ParcoursID, parcours.Nom AS NomParcours, reseausociaux.NomReseau AS NomReseau, reseausociaux.ID_reseausociaux AS ReseauID FROM parcours, reseausociaux WHERE parcours.ID_parcours = reseausociaux.ID_parcours ORDER BY parcours.ID_parcours";
					$result = $conn->query($sql);
					$inti = false;
					$IDParc;
					if ($result->num_rows>0) {
						while ($row=$result->fetch_assoc()) {
							if ($inti == false) {
								$inti=true;
								echo "<h2>".utf8_encode($row['NomParcours'])."</h2>";
								$IDParc = $row['ParcoursID'];
								echo "<div>";
							} else {
								if ($row['ParcoursID']!=$IDParc) {
									$IDParc=$row['ParcoursID'];
									echo "</div>";
									echo "<h2>".utf8_encode($row['NomParcours'])."</h2>";
									echo "<div>";
								}
							}
							if ($isfirst == true) {
								$isfirst = false;
								echo "<div class='row'>
								<div class='col-xs-1'>
									<input type='radio' name='reseauSociauSelect' checked='true' value='".$row['ReseauID']."'></input>
								</div>
								<div class='col-xs-11'>
									<label>
										".utf8_encode($row['NomReseau'])."
									</label>
								</div>
							</div>";					
						} else {
							echo "<div class='row'>
							<div class='col-xs-1'>
								<input type='radio' name='reseauSociauSelect' value='".$row['ReseauID']."'></input>
							</div>
							<div class='col-xs-8'>
								<label>
									".utf8_encode($row['NomReseau'])."
								</label>
							</div>
						</div>";
					}
				} 
				echo "</div>";
			}
			?>					
		</div>

		<button type="submit" class="btn btn-primary" name="editer">Éditer</button>
		<button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
	</form>
</div>
</div>
<?php include('../PHP/deconnexion.php'); ?>
<script>
	$(function() {
		$( "#accordion" ).accordion({
			heightStyle: "content"
		});
	});
</script>
</body>
</html>