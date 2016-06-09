
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
		isset($_POST['dossier']) &&
		isset($_POST['admission'])) 
	{
		if ($_POST['nomParcours']!="" &&
			$_POST['description']!="" &&
			$_POST['objectifs']!="" &&
			$_POST['competences']!="" &&
			$_POST['logiciels']!="" &&
			$_POST['admission']!="" &&
			$_POST['dossier']!="") 
		{
			$nomParcours = $_POST['nomParcours'];
			$description = $_POST['description'];
			$objectifs=$_POST['objectifs'];
			$competences=$_POST['competences'];
			$logiciels=$_POST['logiciels'];
			$admission=$_POST['admission'];
			$dossier=$_POST['dossier'];

			$uploadOk = 1;

			$target_dirBackground = "../Images/backgroundParcours/";
			$target_dirMascotte = "../Images/Mascottes/";
			$target_dirPlaquette = "../Plaquettes/";

			$target_fileBackground=$target_dirBackground.basename($_FILES["fond"]["name"]);
			$target_fileMascotte=$target_dirMascotte.basename($_FILES["mascotte"]["name"]);
			$target_filePlaquette=$target_dirPlaquette.basename($_FILES["plaquette"]["name"]);

			$mascotFileType = pathinfo($target_fileMascotte, PATHINFO_EXTENSION);
			$plaquetteFileType = pathinfo($target_filePlaquette, PATHINFO_EXTENSION);
			$backgroundFileType = pathinfo($target_fileBackground, PATHINFO_EXTENSION);

			if($mascotFileType != "jpg" && $mascotFileType != "png" && $mascotFileType != "jpeg"
			&& $mascotFileType != "gif" ) {
				$error="Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés pour les mascottes.";
				$uploadOk = 0;
			}

			if($backgroundFileType != "jpg" && $backgroundFileType != "png" && $backgroundFileType != "jpeg"
			&& $backgroundFileType != "gif" ) {
				$error="Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés pour les images de fond.";
				$uploadOk = 0;
			}

			if($plaquetteFileType != "pdf" ) {
				$error="Désolé, seuls les fichiers PDF sont autorisés pour les plaquettes.";
				$uploadOk = 0;
			}

			if (file_exists($target_fileBackground)) {
				$error = "Cette image de fond existe déjà";
				$uploadOk = 0;
			}
			if (file_exists($target_fileMascotte)) {
				$error = "Cette mascotte existe déjà";
				$uploadOk = 0;
			}
			if (file_exists($target_filePlaquette)) {
				$error = "Cette plaquette existe déjà";
				$uploadOk = 0;
			}

			if ($uploadOk == 0) {
				$errorUpload = "Désolé, vos messages n'ont pas pu être uploadés";
			} else {
				if (move_uploaded_file($_FILES['fond']['tmp_name'], $target_fileBackground) && move_uploaded_file($_FILES['mascotte']['tmp_name'], $target_fileMascotte) && move_uploaded_file($_FILES['plaquette']['tmp_name'], $target_filePlaquette)) {
					$sql = "INSERT INTO parcours (Nom, Dossier, Description, Objectifs, Competences, Logiciels, Admission, Plaquette, Mascotte, Fond) VALUES ('".utf8_decode($nomParcours)."','".utf8_decode($dossier)."','".utf8_decode($description)."','".utf8_decode($objectifs)."','".utf8_decode($competences)."','".utf8_decode($logiciels)."','".utf8_decode($admission)."','./Plaquettes/".$_FILES["plaquette"]["name"]."','./Images/Mascottes/".$_FILES["mascotte"]["name"]."','./Images/backgroundParcours/".$_FILES["fond"]["name"]."');";
					if ($conn->query($sql) === TRUE) {
						$message="Le parcours a bien été rajouté";
					} else {
						$error="Une erreur s'est produite. Veuillez réessayer ultérieurement.";
					}
				} else {
			        $error="Désolé, une erreur est survenue lors de la mise en ligne de votre fichier";
			    }
			}
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
				if (isset($errorUpload))
				{
					echo "<div class='alert alert-danger'>".$errorUpload."</div>"; 
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
					<label>Nom du dossier</label>
					<textarea class="form-control" placeholder="Dossier du parcours." name="dossier" maxlength="10" rows="1"></textarea>
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