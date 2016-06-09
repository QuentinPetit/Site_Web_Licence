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
		if (isset($_POST['editer'])) {
			header("location: modifActu.php?actuID=".$_POST['actuSelect']);
		}
		if (isset($_POST['supprimer'])) {
			$actuSelect = $_POST['actuSelect'];
			$sql = "DELETE FROM actualites WHERE ID_actualites=".$actuSelect;
			$conn -> query($sql);
		} 
	?>
	<div class=" container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="" method="POST">
				<?php 
				$sql="SELECT * FROM actualites ORDER BY DateCreation DESC";
				$result = $conn->query($sql);
				if ($result->num_rows>0) {
					while ($row=$result->fetch_assoc()) {
						echo "<div class='row'>
							<div class='col-xs-1'>
								<input type='radio' name='actuSelect' checked='false' value='".$row['ID_actualites']."'></input>
							</div>
							<div class='col-xs-3'>
								<label>

									".utf8_encode($row['Titre'])."

								</label>
							</div>
							<div class='col-xs-8'>
								<label>

									".utf8_encode($row['Article'])."

								</label>
							</div>
						</div>";
				}
			} else {
				echo "0 Result";
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