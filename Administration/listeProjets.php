<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil </title>
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
		header("location: modifProjets.php?projetID=".$_POST['projetsSelect']);
	}
	if (isset($_POST['supprimer'])) {
		$projetsSelect = $_POST['projetsSelect'];
		$sql = "DELETE FROM projetstoparcours WHERE ID_projets=".$projetsSelect;
		$conn -> query($sql);
		$sql = "DELETE FROM matierestoprojet WHERE ID_projets=".$projetsSelect;
		$conn -> query($sql);
		$sql = "DELETE FROM elevestoprojet WHERE ID_projets=".$projetsSelect;
		$conn -> query($sql);
		$sql = "DELETE FROM data WHERE ID_projets=".$projetsSelect;
		$conn -> query($sql);
		$sql = "DELETE FROM projets WHERE ID_projets=".$projetsSelect;
		$conn -> query($sql);
	} 
	?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="" method="POST">
				<div id="accordion">
					<?php 
					$isfirst = true;
					$sql="SELECT projets.ID_projets AS ID_Projets, parcours.ID_parcours AS ID_Parcours, projets.Nom AS NomProjet, projets.Date AS DateCrea, parcours.Nom AS NomParcours FROM projets, parcours, projetstoparcours WHERE projets.ID_projets=projetstoparcours.ID_projets AND parcours.ID_parcours=projetstoparcours.ID_parcours ORDER BY parcours.ID_parcours,projets.Date DESC";
					$result = $conn->query($sql);
					$inti = false;
					$IDParc;
					if ($result->num_rows>0) {
						while ($row=$result->fetch_assoc()) {
							if ($inti == false) {
								$inti=true;
								echo "<h2>".utf8_encode($row['NomParcours'])."</h2>";
								$IDParc = $row['ID_Parcours'];
								echo "<div>";
							} else {
								if ($row['ID_Parcours']!=$IDParc) {
									$IDParc=$row['ID_Parcours'];
									echo "</div>";
									echo "<h2>".utf8_encode($row['NomParcours'])."</h2>";
									echo "<div>";
								}
							}
							if ($isfirst == true) {
								$isfirst = false;
								echo "<div class='row'>
								<div class='col-xs-1'>
									<input type='radio' name='projetsSelect' checked='true' value='".$row['ID_Projets']."'></input>
								</div>
								<div class='col-xs-8'>
									<label>
										".utf8_encode($row['NomProjet'])."
									</label>
								</div>
								<div class='col-xs-3'>
									<label>
										".date('Y-m-d h:i:s',strtotime($row['DateCrea']))."
									</label>
								</div>
							</div>";					
						} else {
							echo "<div class='row'>
							<div class='col-xs-1'>
								<input type='radio' name='projetsSelect' value='".$row['ID_Projets']."'></input>
							</div>
							<div class='col-xs-8'>
								<label>
									".utf8_encode($row['NomProjet'])."
								</label>
							</div>
							<div class='col-xs-3'>
								<label>
									".date('Y-m-d h:i:s',strtotime($row['DateCrea']))."
								</label>
							</div>
						</div>";
					}
				} 
				echo "</div>";
			} else {
				echo "0 Result";
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