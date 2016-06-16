<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Parcours - liste</title>
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
		if (isset($_POST['editer'])) {
			header("location: modifParcours.php?parcoursID=".$_POST['parcoursSelect']);
		}
		if (isset($_POST['supprimer'])) {
			$parcoursSelect = $_POST['parcoursSelect'];
			$sql = "DELETE FROM projetstoparcours WHERE ID_parcours=".$parcoursSelect;
			$conn -> query($sql);
			$sql = "DELETE FROM reseausociaux WHERE ID_parcours=".$parcoursSelect;
			$conn -> query($sql);
			$sql = "DELETE FROM parcours WHERE ID_parcours=".$parcoursSelect;
			$conn -> query($sql);
			
		} 
	?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="" method="POST">
				<?php 
				$isfirst=true;
				$sql="SELECT * FROM parcours";
				$result = $conn->query($sql);
				if ($result->num_rows>0) {
					while ($row=$result->fetch_assoc()) {
						if ($isfirst == true) {
							$isfirst = false;
							echo "<div class='row'>
								<div class='col-xs-1'>
									<input type='radio' name='parcoursSelect' checked='true' value='".$row['ID_parcours']."'></input>
								</div>
								<div class='col-xs-11'>
									<label>

										".utf8_encode($row['Nom'])."

									</label>
								</div>
							</div>";					
						} else {
							echo "<div class='row'>
								<div class='col-xs-1'>
									<input type='radio' name='parcoursSelect' value='".$row['ID_parcours']."'></input>
								</div>
								<div class='col-xs-11'>
									<label>

										".utf8_encode($row['Nom'])."

									</label>
								</div>
							</div>";
						}
				}
			}

			?>
			<button type="submit" class="btn btn-primary" name="editer">Éditer</button>
			<button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
		</form>
	</div>
</div>
<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>